<?php

namespace Modules\Worker\Http\Controllers\Transaction;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\Setting;
use Modules\Transaction\Entities\WorkerPaypalTransaction;
use Modules\Worker\Entities\Worker;
use Modules\Worker\Http\Requests\WithdrawProfitsUsingPayPalRequest;
use PayPal\Api\Currency;
use PayPal\Api\Payout;
use PayPal\Api\PayoutItem;
use PayPal\Api\PayoutSenderBatchHeader;
use PayPal\Exception\PayPalConfigurationException;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Exception\PayPalInvalidCredentialException;
use PayPal\Exception\PayPalMissingCredentialException;

class PayPalController extends Controller
{
    public function showWithdrawUsingPaypalPage()
    {
        $page_name = "ArabWorkers | Worker - Wallet History - Withdraw Using Paypal Page";
        $main_breadcrumb = "Worker Panel";
        $sub_breadcrumb = "Wallet History - Withdraw Using Paypal Page";
        $worker = Worker::withoutTrashed()->findOrFail(auth()->user()->id);
        $setting = Setting::select('min_withdraw_limit', 'fees_per_withdraw_wallet_using_paypal')->first();
        $min_withdraw = $setting->min_withdraw_limit;
        $fees_per_withdraw_wallet_using_paypal = $setting->fees_per_withdraw_wallet_using_paypal;

        return view('worker::layouts.transaction.withdrawWalletBalanceUsingPaypal', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'worker',
            'min_withdraw',
            'fees_per_withdraw_wallet_using_paypal',
        ]));

    }


    public function withdrawProfitsUsingPayPal(WithdrawProfitsUsingPayPalRequest $request)
    {
        $validated = $request->validated();
        $setting = Setting::select('min_withdraw_limit', 'fees_per_withdraw_wallet_using_paypal')->first();
        $worker = Worker::withoutTrashed()->findOrFail(auth()->user()->id);
        if ($worker->wallet_balance < $setting->min_withdraw_limit) {
            alert()->toast(trans('worker::worker.The minimum account amount is 10 USD'), 'error');
            return redirect()->route('worker.show.my.withdraw.using.paypal.form');
        } else {
//            todo change PAYPAL_SANDBOX_CLIENT_ID and PAYPAL_SANDBOX_CLIENT_SECRET To Live Mode From .env File
            $PAYPAL_CLIENT_ID = env('PAYPAL_SANDBOX_CLIENT_ID');
            $PAYPAL_CLIENT_SECRET = env('PAYPAL_SANDBOX_CLIENT_SECRET');
            if ($worker->wallet_balance >= $validated['amount'] and $PAYPAL_CLIENT_ID != null and $PAYPAL_CLIENT_SECRET != null) {
                $apiContext = new \PayPal\Rest\ApiContext(
                    new \PayPal\Auth\OAuthTokenCredential(
                        $PAYPAL_CLIENT_ID,
                        $PAYPAL_CLIENT_SECRET,
                    )
                );
//                dd($apiContext);
                $amount_request_to_withdraw = $validated['amount'];
                $fees_per_withdraw_paypal = $setting->fees_per_withdraw_wallet_using_paypal;
                $final_amount_with_fees = $validated['amount'] - ($validated['amount'] * ($fees_per_withdraw_paypal / 100));

                // Set up the payout details
                $payout = new Payout();
                $senderBatchHeader = new PayoutSenderBatchHeader();
                $senderBatchHeader->setSenderBatchId(uniqid())
                    ->setEmailSubject("$" . trans('worker::worker.You have a payment from ArabWorkers!') . $final_amount_with_fees);
                $payout->setSenderBatchHeader($senderBatchHeader);

                $item = new PayoutItem();
                $item->setRecipientType('Email')
                    ->setReceiver($worker->paypal_account)
                    ->setAmount(new Currency(array('value' => $final_amount_with_fees, 'currency' => 'USD')))
                    ->setSenderItemId(uniqid());
                $payout->addItem($item);


                try {
                    $payoutBatch = $payout->create(null, $apiContext);
                    // Save payout information to database
                    $payout = [
                        'worker_id' => $worker->id,
                        'payout_batch_id' => $payoutBatch->batch_header->payout_batch_id,
                        'sender_batch_id' => $payoutBatch->batch_header->sender_batch_header->sender_batch_id,
                        'amount_requested' => $amount_request_to_withdraw,
                        'amount_payed' => $item->amount->value,
                        'paypal_fees' => $fees_per_withdraw_paypal,
                        'currency' => $item->amount->currency,
                        'receiver_email' => $item->receiver,
                        'note' => $payoutBatch->batch_header->sender_batch_header->email_subject,
                        'href' => $payoutBatch->links[0]->href,
//                        'payed_at' => Carbon::now(),
                    ];
//                    dd($payout);
                    WorkerPaypalTransaction::create($payout);
//                    update worker wallet balance
                    $worker->update([
                        'wallet_balance' => $worker->wallet_balance - $amount_request_to_withdraw,
                    ]);

                    alert()->success('success',trans('worker::worker.The money has been transferred to your PayPal account successfully'));
                    return redirect()->route('worker.show.my.wallet.history');
                } catch (PayPalConnectionException $e) {
//                    dd($e,1);
                    if ($e->getCode() == 422) {
//                       This means that the (ArabWorkers) wallet balance does not have enough money to pay the required amount
                        alert()->error('Error',trans('worker::worker.The payment process was not possible for some reason. Please try again later. If the status continues for more than 24 hours, inform the support department immediately.'));
                        return redirect()->route('worker.show.my.wallet.history');
                    } else {
                        alert()->error('Error',trans('worker::worker.The payment process was not possible for some reason. Please try again later. If the status continues for more than 24 hours, inform the support department immediately.'));
                        return redirect()->route('worker.show.my.wallet.history');
                    }
                } catch (PayPalInvalidCredentialException $e) {
//                    dd($e,2);
                    // Handle invalid API credentials
                    alert()->error('Error',trans('worker::worker.The payment process was not possible for some reason. Please try again later. If the status continues for more than 24 hours, inform the support department immediately.'));
                    return redirect()->route('worker.show.my.wallet.history');
                } catch (PayPalMissingCredentialException $e) {
//                    dd($e,3);
                    // Handle missing API credentials
                    alert()->error('Error',trans('worker::worker.The payment process was not possible for some reason. Please try again later. If the status continues for more than 24 hours, inform the support department immediately.'));
                    return redirect()->route('worker.show.my.wallet.history');
                } catch (PayPalConfigurationException $e) {
                    // Handle configuration errors
//                    dd($e,3);
                    alert()->error('Error',trans('worker::worker.The payment process was not possible for some reason. Please try again later. If the status continues for more than 24 hours, inform the support department immediately.'));
                    return redirect()->route('worker.show.my.wallet.history');
                } catch (\Exception $e) {
//                    dd($e,4);
                    // Handle other errors
                    alert()->error('Error',trans('worker::worker.The payment process was not possible for some reason. Please try again later. If the status continues for more than 24 hours, inform the support department immediately.'));
                    return redirect()->route('worker.show.my.wallet.history');
                }
            } else {
                alert()->error('Error',trans('worker::worker.Your balance is not sufficient to withdraw this amount'));
                return redirect()->route('worker.show.my.withdraw.using.paypal.form');
            }
        }


    }
}
