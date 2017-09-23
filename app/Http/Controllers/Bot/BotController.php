<?php

namespace OceanProject\Http\Controllers\Bot;

use Auth;
use Illuminate\Http\Request;
use OceanProject\Models\Bot;
use OceanProject\Models\Log;
use OceanProject\Utilities\IPC;
use OceanProject\Http\Controllers\Controller;

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

    public function setBotID($botid)
    {
        if (!Auth::user()->hasBot($botid)) {
            return redirect()
                    ->back()
                    ->withError('You are trying to cheat, you do not own this bot!');
        } else {
            session(['onBotEdit' => $botid]);
            return redirect()
                ->back()
                ->withSuccess('You are now editing OceanID: ' . $botid . '!');
        }
    }

    public function actionBot(Request $request)
    {
        $data = $request->all();
        if (!Auth::user()->hasBot($data['botid'])) {
            return response()->json(
                [
                'status' => 'error',
                'message' => 'You are trying to cheat, you do not own this bot!']
            );
        } elseif (!in_array($data['action'], ['start', 'restart', 'stop'])) {
            return response()->json(
                [
                'status' => 'error',
                'message' => 'You are trying to cheat, this action is not allowed!']
            );
        } else {
            $bot = Bot::find($data['botid']);

            IPC::init();
            IPC::connect(strtolower($bot->server->name) . '.sock');
            IPC::write(sprintf("%s %d", $data['action'], $data['botid']));
            $packet = IPC::read(1024);
            IPC::close();

            return response()->json(
                [
                'status' => 'success',
                'message' => 'OceanID ' . $data['botid'] . ' ' . $data['action'] .
                (($data['action'] == 'stop') ? 'ped' : 'ed') . ' !']
            );
        }
    }

    public function showLogs($botid, $amount = 200)
    {
        $bot = Bot::find($botid);

        if ($bot) {
            $logs = Log::where('chatid', '=', $bot->chatid)
                ->orderBy('created_at', 'DESC')
                ->limit($amount)
                ->get();

            return view('bot.logs')
                ->with('logs', $logs);
        } else {
            \Session::put('notfound', 'This bot does not exist!');
            return view('page.404');
        }
    }
}
