<?php

namespace xatbot\Http\Controllers\Bot;

use Auth;
use Validator;
use Illuminate\Http\Request;
use xatbot\Models\Bot;
use xatbot\Utilities\Xat;
use xatbot\Models\Server;
use xatbot\Models\Command;
use xatbot\Models\BotlangSentences;
use Illuminate\Support\Facades\DB;
use xatbot\Http\Controllers\Controller;

class CreateController extends Controller
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

    public function store(Request $request)
    {
        $data = $request->all();

        $rules = [
            'chatname' => 'max:50|iunique:bots,chatname|required',
            'nickname' => 'max:255',
            'avatar'   => 'max:255',
            'homepage' => 'max:255'
        ];

        $validator = Validator::make($data, $rules);

        $data['chatname'] = str_replace([' ', 'xat.com/', 'https://', 'http://'], ['_', '', '', ''], $data['chatname']);
        $data['chatid'] = Xat::isChatExist($data['chatname']);
        $validator->after(
            function ($validator) use ($data) {
                if (!empty($data['chatname'])) {
                    if (!$data['chatid']) {
                        $validator->errors()->add('chatid', 'This chat does not exist!');
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

        $bot     = new Bot;
        $user    = Auth::user();
        $servers = Server::all();

        $bot->bot_status_id = DB::table('bot_statuses')
            ->select('id')
            ->where('name', 'Offline')
            ->get()[0]->id;

        $bot->server_id = $servers->random()->id;
        $bot->chatid    = $data['chatid'];
        $bot->chatname  = $data['chatname'];

        $ctx = stream_context_create(['http' => ['timeout' => 5]]);
        $premium = 1;
        //file_get_contents('https://oceanproject.fr/getpremium.php?chatid=' . $data['chatid'], false, $ctx);

        if (!empty($premium) && is_numeric($premium)) {
            $bot->premium = $premium;
        }

        if (!empty($data['nickname'])) {
            $bot->nickname = $data['nickname'];
        }

        if (!empty($data['avatar'])) {
            $bot->avatar = $data['avatar'];
        }

        if (!empty($data['homepage'])) {
            $bot->homepage = $data['homepage'];
        }

        $bot->powersdisabled = json_encode([93]);
        $bot->creator_user_id = $user->id;
        $bot->language_id = $user->language_id;

        $bot->save();
        $bot->users()->attach($user->id);

        $commands = Command::all();

        foreach ($commands as $command) {
            $minrank = DB::table('minranks')
                    ->where('level', $command->default_level)
                    ->get()[0];

            $bot->commands()->save($command, ['minrank_id' => $minrank->id]);
        }

        $botlangSentences = BotlangSentences::all();

        foreach ($botlangSentences as $botlangSentence) {
            $bot->botlang()->save($botlangSentence);
        }

        return redirect()
                ->route('panel')
                ->withSuccess('Congratulations, your bot is now created!');
    }
}
