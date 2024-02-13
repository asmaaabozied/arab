<?php

namespace Modules\Support\Http\Controllers\Employer;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Support\Entities\EmployerTicket;
use Modules\Support\Entities\EmployerTicketAnswer;
use Modules\Support\Entities\EmployerTicketStatuses;
use Modules\Support\Entities\SupportSection;
use Modules\Support\Entities\TicketStatus;
use Modules\Support\Http\Requests\SendTicketAnswerRequest;
use Modules\Support\Http\Requests\SendTicketRequest;

class TicketController extends Controller
{
    public function showTickets()
    {
        $page_name = "ArabWorkers | Employers - Support Section - Tickets";
        $main_breadcrumb = "Employer Panel";
        $sub_breadcrumb = "Support Section - Tickets";

        $data = EmployerTicket::withoutTrashed()->where([
            ['employer_id', auth()->user()->id],
        ])->with(['support_section', 'statuses'])->orderByDesc('created_at')->get();
        return view('employer::layouts.support.myTickets', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',

        ]));
    }

    public function showTicketDetails($ticket)
    {
        $page_name = "ArabWorkers | Employers - Support Section - Ticket Details";
        $main_breadcrumb = "Employer Panel";
        $sub_breadcrumb = "Support Section - Tickets Details";

        $data = EmployerTicket::withoutTrashed()->where([
            ['employer_id', auth()->user()->id],
        ])->with(['support_section', 'statuses.name'])->findOrFail($ticket);

        $messages = EmployerTicketAnswer::withoutTrashed()->where('employer_ticket_id', $ticket)->get();
//         dd($messages);
        return view('employer::layouts.support.ticketDetails', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',
            'messages',

        ]));

    }

    public function showCreateTicketForm()
    {
        $page_name = "ArabWorkers | Employers - Support Section - Create Tickets";
        $main_breadcrumb = "Employer Panel";
        $sub_breadcrumb = "Support Section - Create Tickets";
        $sections = SupportSection::withoutTrashed()->get();
//        dd($sections);
        return view('employer::layouts.support.createTicketForm', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'sections',


        ]));
    }

    public function fetchSectionDetails(Request $request)
    {
        $lang = app()->getLocale();
        if ($lang == "ar") {
            $details = SupportSection::withoutTrashed()->select("id", "ar_description")->find($request->section_id);
        } else {
            $details = SupportSection::withoutTrashed()->select("id", "en_description")->find($request->section_id);

        }
        return response()->json($details);
    }

    public function sendTicket(SendTicketRequest $request)
    {
        $validated = $request->validated();

        if (array_key_exists('employer_attached_file', $validated)) {
            $employer_attached_file = $validated['employer_attached_file']->store('Ticket/EmployerFiles', 'public');
        } else {
            $employer_attached_file = null;
        }
        $random_ticket_number = "ETik" . Carbon::now()->format('ym') . Str::random(1) . Carbon::now()->format('s') . Str::random(2) . random_int(10, 99);
        $pending = TicketStatus::withoutTrashed()->where('name', 'Pending')->firstOrFail();
        $ticket = EmployerTicket::create([
            'ticket_number' => $random_ticket_number,
            'employer_id' => auth()->user()->id,
            'support_section_id' => $validated['section'],
            'subject' => $validated['subject'],
            'description' => $validated['description'],
            'attached_files' => $employer_attached_file,
        ]);
        EmployerTicketStatuses::create([
            'employer_ticket_id' => $ticket->id,
            'ticket_status_id' => $pending->id,
        ]);
//        alert()->toast(trans('employer::ticket.The ticket has been created successfully'), 'success');
        alert()->success('Success',trans('employer::ticket.The ticket has been created successfully'));

        return redirect()->route('employer.show.my.tickets');

    }

    public function sendAnswer(SendTicketAnswerRequest $request, $ticket)
    {
        $validated = $request->validated();

        $data = EmployerTicket::withoutTrashed()->where('employer_id', auth()->user()->id)->findOrFail($ticket);
        if ($data->statuses()->with('name')->latest()->first()->name->name == "AdminAnswered") {

            if (array_key_exists('employer_attached_file', $validated)) {
                $employer_attached_file = $validated['employer_attached_file']->store('Ticket/EmployerFiles', 'public');
            } else {
                $employer_attached_file = null;
            }
            $employer_answered = TicketStatus::withoutTrashed()->where('name', 'EmployerAnswered')->firstOrFail();
            $answer = EmployerTicketAnswer::withoutTrashed()->where([
                ['employer_ticket_id', $data->id],

            ])->latest()->first();
            if ($answer->employer_answer == null) {
                $answer->update([
                    'employer_answer' => $validated['employer_answer'],
                    'employer_attached_file' => $employer_attached_file,
                    'employer_answered_at' => Carbon::now(),
                ]);
            } else {
                EmployerTicketAnswer::create([
                    'employer_answer' => $validated['employer_answer'],
                    'employer_attached_file' => $employer_attached_file,
                    'employer_answered_at' => Carbon::now(),
                ]);
            }

            EmployerTicketStatuses::create([
                'employer_ticket_id' => $data->id,
                'ticket_status_id' => $employer_answered->id,
            ]);
//            alert()->toast(trans('employer::ticket.The answer ticket has been created successfully'), 'success');

            alert()->success('Success',trans('employer::ticket.The answer ticket has been created successfully'));

            return redirect()->route('employer.show.ticket.details', $data->id);
        } else {
//            alert()->toast(trans('employer::ticket.You cannot send any response to this ticket unless you receive an answer from the support team first'), 'error');

            alert()->error('error',trans('employer::ticket.You cannot send any response to this ticket unless you receive an answer from the support team first'));

            return redirect()->route('employer.show.ticket.details', $data->id);

        }


    }
}
