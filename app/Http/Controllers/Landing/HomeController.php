<?php

namespace xatbot\Http\Controllers\Landing;

use Illuminate\Http\Request;
use xatbot\Models\Bot;
use xatbot\Models\Log;
use xatbot\Models\Command;
use xatbot\Utilities\LineCounter;
use xatbot\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lineCounter = new LineCounter('/opt/xatbot-Bot/src/');
        $totalLines = $lineCounter->totalLines();
        $totalMessageHandled = Log::count();
        $totalCommands = Command::count();
        $totalBots = Bot::count();

        return view('landing.home')->with(
            [
                'totalLines' => $totalLines,
                'totalMessageHandled' => $totalMessageHandled,
                'totalCommands' => $totalCommands,
                'totalBots' => $totalBots,
            ]
        );
    }
}
