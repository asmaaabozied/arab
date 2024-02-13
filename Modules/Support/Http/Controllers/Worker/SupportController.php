<?php

namespace Modules\Support\Http\Controllers\Worker;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Support\Entities\SupportSection;
use Modules\Support\Entities\TicketStatus;
use Modules\Support\Entities\WorkerTicket;
use Modules\Support\Entities\WorkerTicketAnswer;
use Modules\Support\Entities\WorkerTicketStatuses;
use Modules\Support\Http\Requests\WorkerSendTicketAnswerRequest;
use Modules\Support\Http\Requests\WorkerSendTicketRequest;

class SupportController extends Controller
{
    public function showTickets()
    {
        $page_name = "ArabWorkers | Workers - Support Section";
        $main_breadcrumb = "Workers Panel";
        $sub_breadcrumb = "Support Section - Tickets";

        $data = WorkerTicket::withoutTrashed()->where([
            ['worker_id', auth()->user()->id],
        ])->with(['support_section', 'statuses'])->orderByDesc('created_at')->get();
//        dd($data);
        return view('worker::layouts.support.myTickets', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',

        ]));
    }

    public function showTicketDetails($ticket){
        $page_name = "ArabWorkers | Worker - Support Section";
        $main_breadcrumb = "Worker Panel";
        $sub_breadcrumb = "Support Section - Tickets Details";

        $data = WorkerTicket::withoutTrashed()->where([
            ['worker_id', auth()->user()->id],
        ])->with(['support_section','statuses.name'])->findOrFail($ticket);

        $messages = WorkerTicketAnswer::withoutTrashed()->where('worker_ticket_id', $ticket)->get();
//        dd($messages);
        return view('worker::layouts.support.ticketDetails', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',
            'messages',

        ]));

    }
    public function showCreateTicketForm(){
        $page_name = "ArabWorkers | Workers - Support Section";
        $main_breadcrumb = "Worker Panel";
        $sub_breadcrumb = "Support Section - Create Tickets";
        $sections = SupportSection::withoutTrashed()->get();

        return view('worker::layouts.support.createTicketForm', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'sections',


        ]));
    }
    public function fetchSectionDetails(Request $request){
        $lang = app()->getLocale();
        if ($lang == "ar") {
            $details = SupportSection::withoutTrashed()->select("id","ar_description")->find($request->section_id);
        } else {
            $details = SupportSection::withoutTrashed()->select("id","en_description")->find($request->section_id);

        }
        return response()->json($details);
    }

    public function sendTicket(WorkerSendTicketRequest $request){
        $validated = $request->validated();
        if (array_key_exists('worker_attached_file', $validated)) {
            $worker_attached_file = $validated['worker_attached_file']->store('Ticket/WorkerFiles', 'public');
        } else {
            $worker_attached_file = null;
        }
        $random_ticket_number = "WTik" . Carbon::now()->format('ym') . Str::random(1) . Carbon::now()->format('s') . Str::random(2) . random_int(10, 99);
        $pending = TicketStatus::withoutTrashed()->where('name', 'Pending')->firstOrFail();
        $ticket = WorkerTicket::create([
            'ticket_number'=>$random_ticket_number,
            'worker_id'=>auth()->user()->id,
            'support_section_id'=>$validated['section'],
            'subject'=>$validated['subject'],
            'description'=>$validated['description'],
            'attached_files'=>$worker_attached_file,
        ]);
        WorkerTicketStatuses::create([
            'worker_ticket_id'=>$ticket->id,
            'ticket_status_id'=>$pending->id,
        ]);
//        alert()->toast(trans('worker::ticket.The ticket has been created successfully'), 'success');

        alert()->success('Success',trans('worker::ticket.The ticket has been created successfully'));


        return redirect()->route('worker.show.my.tickets');

    }

    public function sendAnswer(WorkerSendTicketAnswerRequest $request, $ticket){
        $validated = $request->validated();
        $data = WorkerTicket::withoutTrashed()->where('worker_id',auth()->user()->id)->findOrFail($ticket);
        if ($data->statuses()->with('name')->latest()->first()->name->name == "AdminAnswered"){

            if (array_key_exists('worker_attached_file', $validated)) {
                $worker_attached_file = $validated['worker_attached_file']->store('Ticket/WorkerFiles', 'public');
            } else {
                $worker_attached_file = null;
            }
            $worker_answered = TicketStatus::withoutTrashed()->where('name', 'WorkerAnswered')->firstOrFail();
            $answer = WorkerTicketAnswer::withoutTrashed()->where([
                ['worker_ticket_id', $data->id],

            ])->latest()->first();
            if ($answer->worker_answer == null){
                $answer->update([
                    'worker_answer'=>$validated['worker_answer'],
                    'worker_attached_file'=>$worker_attached_file,
                    'worker_answered_at'=>Carbon::now(),
                ]);
            }else{
                WorkerTicketAnswer::create([
                    'worker_answer'=>$validated['worker_answer'],
                    'worker_attached_file'=>$worker_attached_file,
                    'worker_answered_at'=>Carbon::now(),
                ]);
            }

            WorkerTicketStatuses::create([
                'worker_ticket_id'=>$data->id,
                'ticket_status_id'=>$worker_answered->id,
            ]);
//            alert()->toast(trans('worker::ticket.The answer ticket has been created successfully'), 'success');
            alert()->success('Success',trans('worker::ticket.The answer ticket has been created successfully'));


            return redirect()->route('worker.show.ticket.details',$data->id);
        }




    }
}
