<?php

namespace OceanProject\Http\Controllers\Support;

use Auth;
use Validator;
use Illuminate\Http\Request;
use OceanProject\Models\User;
use OceanProject\Models\Ticket;
use Illuminate\Support\Facades\DB;
use OceanProject\Models\TicketMessage;
use OceanProject\Models\TicketDepartment;
use OceanProject\Http\Controllers\Controller;

class TicketController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showList()
    {
        $user = Auth::user();
        $departments = TicketDepartment::pluck('name', 'id')->toArray();
        return view('support.list')
            ->with('tickets', $user->tickets)
            ->with('departments', $departments);
    }

    public function showTicket($id)
    {
        $ticket = Ticket::find($id);
        if ($ticket->user_id != Auth::id()) {
            return redirect()
                ->back()
                ->withError('You cannot access to this ticket!');
        } else {
            $ticket_messages = $ticket->ticketMessages()->orderBy('updated_at', 'asc')->get();

            foreach ($ticket_messages as $key => $value) {
                $ticket_messages[$key]['role'] = User::find($value['user_id'])->getRoles()->first()->name;
            }

            return view('support.ticket')
                ->with('ticket', $ticket)
                ->with('ticket_messages', $ticket_messages);
        }
    }

    public function create(Request $request)
    {
        $data = $request->all();

        $rules = [
            'subject'    => 'max:255|required',
            'message'    => 'required',
            'department' => 'integer|required'
        ];

        $validator = Validator::make($data, $rules);

        $validator->after(
            function ($validator) use ($data) {

                if (!TicketDepartment::where('id', $data['department'])->exists()) {
                    $validator->errors()->add('department', 'The department does not exist!');
                }
            }
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $ticket = new Ticket();

        $ticket->user_id       = Auth::id();
        $ticket->subject       = $data['subject'];
        $ticket->state         = true;
        $ticket->department_id = $data['department'];

        $ticket->save();

        $ticketMessage = new TicketMessage();

        $ticketMessage->user_id   = Auth::id();
        $ticketMessage->ticket_id = $ticket->id;
        $ticketMessage->message   = nl2br(htmlspecialchars($data['message']));

        $ticketMessage->save();

        return redirect()
            ->back()
            ->withSuccess('Ticket created!');
    }

    public function reply(Request $request)
    {
        $data = $request->all();

        $rules = [
            'message'   => 'required',
            'ticket_id' => 'integer'
        ];

        $validator = Validator::make($data, $rules);
        $ticket    = Ticket::find($data['ticket_id']);

        $validator->after(
            function ($validator) use ($data, $ticket) {
                if ($ticket->user_id != Auth::id()) {
                    $validator->errors()->add('ticket_id', 'Cheater!');
                }
            }
        );

        if ($validator->fails()) {
            return response()->json(
                [
                'header'  => 'Error!',
                'status'  => 'error',
                'message' => 'You are trying to cheat!'
                ]
            );
        }

        $data['message'] = str_replace(['<div>', '<br>'], '', $data['message']);
        $data['message'] = str_replace('</div>', PHP_EOL, $data['message']);

        $ticketMessage = new TicketMessage();

        $ticketMessage->user_id   = Auth::id();
        $ticketMessage->ticket_id = $ticket->id;
        $ticketMessage->message   = nl2br(htmlspecialchars($data['message']));

        $ticketMessage->save();

        return response()->json(
            [
            'header'  => 'Success!',
            'status'  => 'success',
            'message' => 'Ticket message sent!'
            ]
        );
    }
}
