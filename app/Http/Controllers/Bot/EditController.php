<?php

namespace xatbot\Http\Controllers\Bot;

use Auth;
use Validator;
use Illuminate\Http\Request;
use xatbot\Models\Bot;
use xatbot\Utilities\Xat;
use xatbot\Http\Controllers\Controller;

class EditController extends Controller
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

    public function editNickname(Request $request)
    {
        $data = $request->all();
        if (!Auth::user()->hasBot($data['pk'])) {
            return response()->json(
                [
                'status' => 'error',
                'message' => 'You are trying to cheat, you do not own this bot!'
                ]
            );
        } else {
            $validator = Validator::make($data, ['value' => 'max:255']);

            if ($validator->fails()) {
                    return response()->json(
                        [
                        'status' => 'error',
                        'message' => 'Nickname is too long!'
                        ]
                    );
            }

            $bot = Bot::find($data['pk']);
            $bot->nickname = $data['value'];
            $bot->save();

            return response()->json(
                [
                'status' => 'success',
                'message' => 'Nickname updated!'
                ]
            );
        }
    }

    public function showEditForm()
    {
        $bot = Bot::find(Session('onBotEdit'));
        return view('bot.edit')->with('bot', $bot);
    }


    public function edit(Request $request)
    {
        $data = $request->all();

        $toggles = ['autorestart', 'gameban_unban', 'togglelinkfilter', 'togglemoderation'];

        foreach ($toggles as $toggle) {
            if (array_key_exists($toggle, $data)) {
                $data[$toggle] = true;
            } else {
                $data[$toggle] = false;
            }
        }

        $rules = [
            'chatname'          => 'max:50|required',
            'nickname'          => 'max:255',
            'avatar'            => 'max:255',
            'homepage'          => 'max:255',
            'botstatus'         => 'max:255',
            'pcback'            => 'max:255',
            'autowelcome'       => 'max:255',
            'ticklemessage'     => 'max:255',
            'customcommand'     => 'max:1|required',
            'gameban_unban'     => 'boolean',
            'togglelinkfilter'  => 'boolean',
            'togglemoderation'  => 'boolean',
            'maxkick'           => 'integer',
            'maxkickban'        => 'integer',
            'maxflood'          => 'integer',
            'maxchar'           => 'integer',
            'maxsmilies'        => 'integer',
            'automessage'       => 'max:255',
            'automessagetime'   => 'nullable|integer',
            'autorestart'       => 'boolean',
            'toggleautowelcome' => 'max:2|required',
            'automember'        => 'max:255',
            'toggleradio'       => 'max:255',
            'minstaffautotemp'  => 'integer',
            'kickafk_minutes'   => 'integer'
        ];

        $validator = Validator::make($data, $rules);

        $data['chatid'] = Xat::isChatExist($data['chatname']);

        $validator->after(
            function ($validator) use ($data) {
                if (!empty($data['chatname'])) {
                    if (!$data['chatid']) {
                        $validator->errors()->add('chatname', 'This chat does not exist!');
                    } elseif (!Bot::where(
                        [
                        ['chatid', '=', $data['chatid']],
                        ['id', '<>', Session('onBotEdit')]
                        ]
                    )->get()->isEmpty()
                    ) {
                        $validator->errors()->add('chatname', 'This chat is taken!');
                    }
                }
            }
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withError('Bot failed to update!')
                ->withInput();
        }

        $bot = Bot::find(Session('onBotEdit'));

        $bot->chatid   = $data['chatid'];
        $bot->chatname = $data['chatname'];
        $bot->status   = $data['botstatus'];

        $fields = [
            'nickname', 'avatar', 'homepage',
            'pcback', 'autowelcome', 'ticklemessage',
            'maxkick', 'maxkickban', 'maxflood',
            'maxchar', 'maxsmilies', 'automessage',
            'automessagetime', 'autorestart', 'gameban_unban',
            'customcommand', 'toggleautowelcome','togglelinkfilter',
            'togglemoderation', 'automember', 'toggleradio',
            'minstaffautotemp', 'kickafk_minutes'
        ];

        foreach ($fields as $field) {
            if (is_null($data['autowelcome'])) {
                $data['autowelcome'] = '';
            }
             $bot->$field = $data[$field];
        }

        $bot->save();

        return redirect()
                ->back()
                ->withSuccess('Bot updated!');
    }
}
