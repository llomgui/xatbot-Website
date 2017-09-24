<?php

namespace OceanProject\Http\Controllers\Staff;

use Validator;
use OceanProject\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OceanProject\Models\Bot;
use OceanProject\Utilities\Xat;

class BotsController extends Controller
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

    public function showBots(Request $request)
    {
        $bots = Bot::orderBy('id', 'asc')->paginate(25);
        return view('staff.bots', compact('bots'));
    }

    public function showEditBot(Bot $bot)
    {
        $botCheck = Bot::find($bot->id);

        if (!is_object($botCheck)) {
            return view('staff.bots');
        }

        if (session('onBotEdit') == $bot->id) {
            return redirect()
                ->back()
                ->withSuccess('You are already editing the Ocean ID ' . $bot->id . '.');
        }

        session(['onBotEdit' => $bot->id]);
        return redirect()
            ->back()
            ->withSuccess('You are now editing OceanID: ' . $bot->id . ' as helper.');
    }
}
