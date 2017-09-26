<?php

namespace OceanProject\Http\Controllers\Page;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use OceanProject\Models\Log;
use OceanProject\Models\Bot;
use OceanProject\Utilities\IPC;
use OceanProject\Http\Controllers\Controller;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bot = Bot::find(Session('onBotEdit'));

        if ($bot) {
            $logs = Log::where([
                ['chatid', '=', $bot->chatid],
                ['created_at', '>=', Carbon::now()->subDay()]
            ])->select('typemessage', DB::raw('count(*)'))->groupBy('typemessage')->get()->toArray();

            $logs = array_column($logs, 'count', 'typemessage');

            if ($bot->botStatus->id == 1) {
                IPC::init();
                IPC::connect(strtolower($bot->server->name) . '.sock');
                IPC::write(sprintf("%s %d", 'users_count', Session('onBotEdit')));
                $packet = IPC::read(1024);
                IPC::close();
            }
            $logs[6] = $packet ?? 'NaN';
        } else {
            for ($i = 0; $i < 6; $i++) {
                $logs[$i] = 'NaN';
            }
        }


        $bots = \Auth::user()->bots;
        return view('page.home')
                ->with('logs', $logs)
                ->with('bots', $bots);
        ;
    }
}
