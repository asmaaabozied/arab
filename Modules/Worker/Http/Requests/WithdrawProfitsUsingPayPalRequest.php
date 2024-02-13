<?php

namespace Modules\Worker\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Worker\Entities\Worker;

class WithdrawProfitsUsingPayPalRequest extends FormRequest
{
    public function worker(){
        $worker = Worker::withoutTrashed()->select('wallet_balance')->findOrFail(auth()->user()->id);
        return $worker;
    }
    public function rules()
    {
        $worker = $this->worker();
        return [
            'amount'=>['required','numeric','min:0.5','not_in:0','lte: '.$worker->wallet_balance ],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    public function messages(): array
    {
        return [
            'amount.required' => trans('dashboard::validation.required'),
            'amount.numeric' => trans('dashboard::validation.numeric'),
            'amount.min' => trans('dashboard::validation.min'),
            'amount.not_in' => trans('dashboard::validation.not_in'),
            'amount.lte' => trans('worker::worker.Your balance is not sufficient to withdraw this amount'),

        ];

    }
}
