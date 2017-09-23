<?php

namespace OceanProject\Http\Controllers\Staff;

use Auth;
use Validator;
use Illuminate\Http\Request;
use OceanProject\Models\User;
use OceanProject\Models\Ticket;
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
        $tickets = Ticket::where('state', true)->get();
        return view('staff.ticketslist')
            ->with('tickets', $tickets);
    }

    public function showTicket($ticketid)
    {
        $ticket = Ticket::find($ticketid);
        if ($ticket) {
            $ticketMessages = $ticket->ticketMessages()->orderBy('updated_at', 'asc')->get();

            foreach ($ticketMessages as $key => $value) {
                $ticketMessages[$key]['role'] = User::find($value['user_id'])->getRoles()->first()->name;
            }

            return view('staff.ticket')
                ->with('ticket', $ticket)
                ->with('ticketMessages', $ticketMessages);
        } else {
            \Session::put('notfound', 'This ticket does not exist!');
            return view('page.404');
        }
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

        if ($validator->fails()) {
            return response()->json(
                [
                'header'  => 'Error!',
                'status'  => 'error',
                'message' => 'You are trying to cheat!'
                ]
            );
        }

        $data['message'] = str_replace('<div>', '', $data['message']);
        $data['message'] = str_replace(['</div>', '<br>'], PHP_EOL, $data['message']);

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

    public function close(Request $request)
    {
        $data = $request->all();

        $rules = [
            'ticket_id' => 'integer'
        ];

        $validator = Validator::make($data, $rules);
        $ticket    = Ticket::find($data['ticket_id']);

        if ($validator->fails()) {
            return response()->json(
                [
                'header'  => 'Error!',
                'status'  => 'error',
                'message' => 'You are trying to cheat!'
                ]
            );
        }

        $ticket->state = false;
        $ticket->save();

        return response()->json(
            [
            'header'  => 'Success!',
            'status'  => 'success',
            'message' => 'Ticket closed!'
            ]
        );
    }
}
