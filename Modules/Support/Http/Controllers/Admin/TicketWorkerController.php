<?php

namespace Modules\Support\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Support\Entities\TicketStatus;
use Modules\Support\Entities\WorkerTicket;
use Modules\Support\Entities\WorkerTicketAnswer;
use Modules\Support\Entities\WorkerTicketStatuses;
use Modules\Support\Http\Requests\AdminSendWorkerTicketAnswerRequest;

class TicketWorkerController extends Controller
{
    public function showWorkerTickets()
    {
        $page_name = "ArabWorkers | Admin - Support Section - Worker Tickets";
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Support Section - Worker Tickets";

        $data = WorkerTicket::withoutTrashed()->where([
        ])->with(['support_section', 'statuses', 'worker'])->orderByDesc('created_at')->get();
//        dd($data);
        return view('admin::layouts.support.worker.index', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',

        ]));
    }

    public function showTicketDetails($ticket)
    {
        $page_name = "ArabWorkers | Admin - Support Section - Worker Ticket Details";
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Support Section - Worker Tickets Details";
        $data = WorkerTicket::withoutTrashed()->where([
        ])->with(['support_section', 'statuses.name'])->findOrFail($ticket);

        $messages = WorkerTicketAnswer::withoutTrashed()->where('worker_ticket_id', $ticket)->get();
        $underVerification = TicketStatus::withoutTrashed()->where('name', 'UnderVerification')->first();
        $pending = TicketStatus::withoutTrashed()->where('name', 'Pending')->first();
        if ($data->statuses()->latest()->count() == 1 and $data->statuses()->latest()->first()->ticket_status_id == $pending->id){
            WorkerTicketStatuses::create([
                'worker_ticket_id'=>$data->id,
                'ticket_status_id'=>$underVerification->id,
            ]);
            alert()->success('success',trans('admin::ticket.The status of this ticket has been switched to UnderVerification'));
        }
        $new_status_data = WorkerTicket::withoutTrashed()->where([
        ])->with(['statuses.name'])->findOrFail($data->id);
        return view('admin::layouts.support.worker.ticketDetails', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',
            'messages',
            'new_status_data',

        ]));
    }

    public function sendAnswer(AdminSendWorkerTicketAnswerRequest $request, $ticket){
        $validated = $request->validated();
        $data = WorkerTicket::withoutTrashed()->findOrFail($ticket);
        if ($data->statuses()->with('name')->latest()->first()->name->name != "Done"){
            if (array_key_exists('admin_attached_file', $validated)) {
                $admin_attached_file = $validated['admin_attached_file']->store('Ticket/AdminWorkerFiles', 'public');
            } else {
                $admin_attached_file = null;
            }

            $admin_answered = TicketStatus::withoutTrashed()->where('name', 'AdminAnswered')->firstOrFail();
            WorkerTicketAnswer::create([
                'worker_ticket_id'=>$data->id,
                'admin_id'=>auth()->user()->id,
                'admin_answer'=>$validated['admin_answer'],
                'admin_attached_file'=>$admin_attached_file,
                'admin_answered_at'=>Carbon::now(),
            ]);
            WorkerTicketStatuses::create([
                'worker_ticket_id'=>$data->id,
                'ticket_status_id'=>$admin_answered->id,
            ]);
            alert()->success('Success',trans('admin::ticket.The answer ticket has been created successfully'));
            return redirect()->route('admin.show.worker.ticket.details',$data->id);
        }

    }

    public function adminDoneWorkerTicket($ticket){

        $data = WorkerTicket::withoutTrashed()->where([
        ])->with(['statuses.name'])->findOrFail($ticket);
        $pending = TicketStatus::withoutTrashed()->where('name', 'Pending')->first();
        $done = TicketStatus::withoutTrashed()->where('name', 'Done')->first();
        if ($data->statuses()->latest()->count() > 1 and $data->statuses()->latest()->first()->ticket_status_id != $pending->id){
            WorkerTicketStatuses::create([
                'worker_ticket_id'=>$data->id,
                'ticket_status_id'=>$done->id,
            ]);
            alert()->success('success',trans('admin::ticket.The status of the ticket has been successfully switched to Expired'));
            return redirect()->route('admin.show.worker.tickets');
        }else{
            alert()->info('info',trans('admin::ticket.The ticket cannot be completed in the current state, make sure that you have viewed it or checked its contents and try again'));
            return redirect()->route('admin.show.worker.ticket.details',$data->id);
        }
    }

}
