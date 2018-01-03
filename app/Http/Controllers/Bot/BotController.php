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
                ->withSuccess('You are now editing ' . env('BOTID_NAME') . ': ' . $botid . '!');
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
            if (IPC::connect(strtolower($bot->server->name) . '.sock') == false) {
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => 'The socket is offline, please contact an administrator!'
                    ]
                );
            }

            IPC::write(sprintf("%s %d", $data['action'], $data['botid']));
            $packet = IPC::read(1024);

            if (empty($packet)) {
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => 'Packet is empty, please contact an administrator!'
                    ]
                );
            }

            IPC::close();

            return response()->json(
                [
                'status' => 'success',
                'message' => env('BOTID_NAME') . ' ' . $data['botid'] . ' ' . $data['action'] .
                (($data['action'] == 'stop') ? 'ped' : 'ed') . ' !']
            );
        }
    }

    public function showLogs($botid, $amount = 200)
    {
        if (!is_numeric($botid)) {
            \Session::put('notfound', 'This bot does not exist!');
            return view('page.404');
        }

        $bot = Bot::find($botid);
        $amount = $amount < 1 || !is_numeric($amount) ? 200 : $amount;

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
