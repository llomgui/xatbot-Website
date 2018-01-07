<?php

namespace xatbot\Http\Controllers\Staff;

use Validator;
use Illuminate\Support\Facades\DB;
use xatbot\Http\Controllers\Controller;
use Illuminate\Http\Request;
use xatbot\Models\Bot;
use xatbot\Models\BotlangSentences;

class BotMessagesController extends Controller
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

    public function showBotMessages()
    {
        $botMessages = BotlangSentences::orderby('id', 'asc')->paginate(25);
        return view('staff.botmessages')
                ->with('botmessages', $botMessages);
    }

    public function addBotMessages(Request $request)
    {
        $data = $request->all();

        $rules = [
            'name' => 'max:255|required',
            'sentences' => 'max:255|required'
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

        $botmessages = new BotlangSentences;
        $botmessages->name = $data['name'];
        $botmessages->sentences = ['en' => $data['sentences']];
        $botmessages->save();

        $bots = Bot::all();
        foreach ($bots as $bot) {
            $bot->botlang()->save($botmessages);
        }

        return redirect()
            ->back()
            ->withSuccess('Message added!');
    }

    public function editBotMessages(Request $request)
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
            'sentences' => 'max:255'
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $messageData->name = strtolower($data['name']);
        $messageData->sentences = ['en' => $data['sentences']];
        $messageData->save();

        return redirect()
            ->back()
            ->withSuccess('Message updated!');
    }

    public function deleteBotMessages(Request $request)
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

        DB::table('botlang')->where('botlang_sentences_id', $data['message_id'])->delete();

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
