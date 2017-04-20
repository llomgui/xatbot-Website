<?php

namespace OceanProject\Http\Controllers\Bot;

use Auth;
use Validator;
use OceanProject\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use OceanProject\Utilities\xat;
use OceanProject\Models\Bot;
use OceanProject\Models\Server;
use OceanProject\Models\Command;

class BotController extends Controller
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
            return response()->json([
                'status' => 'error',
                'message' => 'You are trying to cheat, you do not own this bot!'
            ]);
        } else {

            $validator = Validator::make($data, ['value' => 'max:255']);

            if ($validator->fails()) {
                    return response()->json([
                    'status' => 'error',
                    'message' => 'Nickname is too long!'
                ]);
            }

            $bot = Bot::find($data['pk']);
            $bot->nickname = $data['value'];
            $bot->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Nickname updated!'
            ]);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $rules = [
            'chatname' => 'max:50|unique:bots|required',
            'nickname' => 'max:255',
            'avatar'   => 'max:255',
            'homepage' => 'max:255'
        ];

        $validator = Validator::make($data, $rules);

        $data['chatid'] = xat::isChatExist($data['chatname']);
        $validator->after(function($validator) use ($data) {
            if (!empty($data['chatname'])) {
                if (!$data['chatid']) {
                    $validator->errors()->add('chatid', 'This chat does not exist!');
                }
            }
        });

        if ($validator->fails()) {
            return redirect()
                ->route('panel')
                ->withErrors($validator)
                ->withInput();
        }

        $bot     = new \OceanProject\Models\Bot;
        $user    = Auth::user();
        $servers = Server::all();

        $bot->bot_status_id = DB::table('bot_statuses')
                ->select('id')
                ->where('name', 'Offline')
                ->get()[0]->id;

        $bot->server_id = $servers->random()->id;
        $bot->chatid    = $data['chatid'];
        $bot->chatname  = $data['chatname'];

        if (!empty($data['nickname'])) {
            $bot->nickname = $data['nickname'];
        }

        if (!empty($data['avatar'])) {
            $bot->avatar = $data['avatar'];
        }

        if (!empty($data['homepage'])) {
            $bot->homepage = $data['homepage'];
        }

        $bot->creator_user_id = $user->id;

        $bot->save();
        $bot->users()->attach($user->id);

        $commands = Command::all();

        foreach ($commands as $command) {
            $minrank = DB::table('minranks')
                    ->where('level', $command->default_level)
                    ->get()[0];

            $bot->commands()->save($command, ['minrank_id' => $minrank->id]);
        }

        return redirect()
                ->route('panel')
                ->withSuccess('Congratulations, your bot is now created!');
    }
}
