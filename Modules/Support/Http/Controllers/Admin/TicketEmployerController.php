<?php

namespace Modules\Support\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Support\Entities\EmployerTicket;
use Modules\Support\Entities\EmployerTicketAnswer;
use Modules\Support\Entities\EmployerTicketStatuses;
use Modules\Support\Entities\TicketStatus;
use Modules\Support\Http\Requests\AdminSendEmployerTicketAnswerRequest;

class TicketEmployerController extends Controller
{
    public function showEmployerTickets()
    {
        $page_name = "ArabWorkers | Admin - Support Section - Employer Tickets";
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Support Section - Employer Tickets";

        $data = EmployerTicket::withoutTrashed()->where([
        ])->with(['support_section', 'statuses', 'employer'])->orderByDesc('created_at')->get();
        return view('admin::layouts.support.employer.index', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',

        ]));
    }


    public function showTicketDetails($ticket)
    {
        $page_name = "ArabWorkers | Admin - Support Section - Employer Ticket Details";
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Support Section - Employer Tickets Details";
        $data = EmployerTicket::withoutTrashed()->where([
        ])->with(['support_section', 'statuses.name'])->findOrFail($ticket);
        $messages = EmployerTicketAnswer::withoutTrashed()->where('employer_ticket_id', $ticket)->get();

        $underVerification = TicketStatus::withoutTrashed()->where('name', 'UnderVerification')->first();
        $pending = TicketStatus::withoutTrashed()->where('name', 'Pending')->first();
        if ($data->statuses()->latest()->count() == 1 and $data->statuses()->latest()->first()->ticket_status_id == $pending->id){
            EmployerTicketStatuses::create([
                'employer_ticket_id'=>$data->id,
                'ticket_status_id'=>$underVerification->id,
            ]);
            alert()->toast(trans('admin::ticket.The status of this ticket has been switched to UnderVerification'), 'success');
        }
        $new_status_data = EmployerTicket::withoutTrashed()->where([
        ])->with(['statuses.name'])->findOrFail($data->id);
        return view('admin::layouts.support.employer.ticketDetails', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',
            'messages',
            'new_status_data',

        ]));
    }


    public function sendAnswer(AdminSendEmployerTicketAnswerRequest $request, $ticket){
        $validated = $request->validated();
        $data = EmployerTicket::withoutTrashed()->findOrFail($ticket);
        if ($data->statuses()->with('name')->latest()->first()->name->name != "Done"){
            if (array_key_exists('admin_attached_file', $validated)) {
                $admin_attached_file = $validated['admin_attached_file']->store('Ticket/AdminEmployerFiles', 'public');
            } else {
                $admin_attached_file = null;
            }

            $admin_answered = TicketStatus::withoutTrashed()->where('name', 'AdminAnswered')->firstOrFail();
                EmployerTicketAnswer::create([
                    'employer_ticket_id'=>$data->id,
                    'admin_id'=>auth()->user()->id,
                    'admin_answer'=>$validated['admin_answer'],
                    'admin_attached_file'=>$admin_attached_file,
                    'admin_answered_at'=>Carbon::now(),
                ]);
            EmployerTicketStatuses::create([
                'employer_ticket_id'=>$data->id,
                'ticket_status_id'=>$admin_answered->id,
            ]);
            alert()->toast(trans('admin::ticket.The answer ticket has been created successfully'), 'success');
            return redirect()->route('admin.show.employer.ticket.details',$data->id);
        }

    }

    public function adminDoneEmployerTicket($ticket){

        $data = EmployerTicket::withoutTrashed()->where([
        ])->with(['statuses.name'])->findOrFail($ticket);
        $pending = TicketStatus::withoutTrashed()->where('name', 'Pending')->first();
        $done = TicketStatus::withoutTrashed()->where('name', 'Done')->first();
        if ($data->statuses()->latest()->count() > 1 and $data->statuses()->latest()->first()->ticket_status_id != $pending->id){
            EmployerTicketStatuses::create([
                'employer_ticket_id'=>$data->id,
                'ticket_status_id'=>$done->id,
            ]);
            alert()->toast(trans('admin::ticket.The status of the ticket has been successfully switched to Expired'), 'success');
            return redirect()->route('admin.show.employer.tickets');
        }else{
            alert()->toast(trans('admin::ticket.The ticket cannot be completed in the current state, make sure that you have viewed it or checked its contents and try again'), 'info');
            return redirect()->route('admin.show.employer.ticket.details',$data->id);
        }
    }
}
