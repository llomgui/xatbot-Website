<?php

namespace xatbot\Http\Controllers\Bot;

use Auth;
use Validator;
use xatbot\Utilities\Xat;
use Illuminate\Http\Request;
use xatbot\Models\Bot;
use xatbot\Utilities\Powers;
use xatbot\Http\Controllers\Controller;

class TakenController extends Controller
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

    public function show()
    {
        return view('bot.taken');
    }

    public function check(Request $request)
    {
        $data = $request->all();

        $rules = [
            'chatname' => 'max:255|required',
            'chatpw'   => 'max:255|required'
        ];

        $validator = Validator::make($data, $rules);

        $data['chatname'] = str_replace([' ', 'xat.com/', 'https://', 'http://'], ['_', '', '', ''], $data['chatname']);
        $data['chatid'] = Xat::isChatExist($data['chatname']);
        $validator->after(
            function ($validator) use ($data) {
                if (!empty($data['chatname'])) {
                    if (!$data['chatid']) {
                        $validator->errors()->add('chatname', 'This chat does not exist!');
                    }
                }
            }
        );

        if ($validator->fails()) {
            return redirect()
                ->route('panel')
                ->withErrors($validator)
                ->withInput();
        }

        $getmain = Xat::getMain($data['chatname'], $data['chatpw']);
        if (is_numeric($getmain)) {
            $bot = Bot::where('chatid', $data['chatid'])->first();
            $bot->creator_user_id = Auth::user()->id;
            $bot->users()->detach();
            $bot->users()->attach(Auth::user()->id);
            $bot->save();
            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'This bot is now moved to your account!'
                ]
            );
        } else {
            return response()->json(
                [
                    'status' => 'warning',
                    'message' => $getmain
                ]
            );
        }
    }
}
