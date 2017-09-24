<?php

namespace OceanProject\Http\Controllers\Staff;

use Validator;
use Illuminate\Support\Facades\DB;
use OceanProject\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OceanProject\Models\BotlangSentences;

class BotsMessagesController extends Controller
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

    public function showBotsMessages()
    {
        $botsMessages = BotlangSentences::orderby('id', 'asc')->paginate(25);
        return view('staff.showbotsmessages')
                ->with('botsmessage', $botsMessages);
    }

    public function addBotsMessages(Request $request)
    {
        $data = $request->all();

        $rules = [
            'name' => 'max:255|required',
            'default_value' => 'max:255|required'
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['name'] = strtolower($data['name']);
        $checkCommand = BotlangSentences::where('name', $data['name'])->first();

        if (is_object($checkCommand)) {
            return redirect()
                ->back()
                ->withError('This message name is already added.');
        }

        $botsmessages = new BotlangSentences;
        $botsmessages->name = $data['name'];
        $botsmessages->default_value = $data['default_value'];
        $botsmessages->save();

        return redirect()
            ->back()
            ->withSuccess('Message added!');
    }

    public function editBotsMessages(Request $request)
    {
        $data = $request->all();
        $messageData = BotlangSentences::find($data['message_id']);

        if (!is_object($messageData)) {
            return redirect()
                ->back()
                ->withError('This message does not exist!');
        }

        $rules = [
            'name' => 'max:255|required',
            'default_value' => 'max:255'
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $messageData->name = strtolower($data['name']);
        $messageData->default_value = $data['default_value'];
        $messageData->save();

        return redirect()
            ->back()
            ->withSuccess('Message updated!');
    }

    public function deleteBotsMessages(Request $request)
    {
        $data = $request->all();
        $messageData = BotlangSentences::find($data['message_id']);

        if (!is_object($messageData)) {
            return response()->json(
                [
                    'status'  => 'error',
                    'message' => 'You are trying to cheat ! This message does not exist.',
                    'header'  => 'Error!'
                ]
            );
        }

        $messageData->delete();

        return response()->json(
            [
                'status'  => 'success',
                'message' => 'Message deleted!',
                'header'  => 'Deleted!'
            ]
        );
    }
}
