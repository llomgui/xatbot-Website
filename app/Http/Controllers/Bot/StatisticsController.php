<?php

namespace xatbot\Http\Controllers\Bot;

use xatbot\Models\Bot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use xatbot\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    public function show()
    {
        $bot = Bot::find(Session('onBotEdit'));
        $statistics24Hours = DB::table('user_events')
            ->select(
                'userinfo.regname',
                'userinfo.xatid',
                DB::raw('MAX(rank) as rank'),
                DB::raw('SUM(amount_commands + amount_messages) as messages'),
                DB::raw('SUM(amount_ranks + amount_bans + amount_kicks) as events'),
                DB::raw('SUM(left_at - connected_at) as time_spent')
            )
            ->join('userinfo', 'user_events.xatid', '=', 'userinfo.xatid')
            ->where([
                ['user_events.chatid', $bot->chatid],
                ['left_at', '>=', DB::raw('NOW() - INTERVAL \'24\' hour')]
            ])
            ->groupBy('userinfo.regname', 'userinfo.xatid')
            ->orderBy('rank', 'DESC')
            ->orderBy('time_spent', 'DESC')
            ->get();

        $statistics7Days = DB::table('user_events')
            ->select(
                'userinfo.regname',
                'userinfo.xatid',
                DB::raw('MAX(rank) as rank'),
                DB::raw('SUM(amount_commands + amount_messages) as messages'),
                DB::raw('SUM(amount_ranks + amount_bans + amount_kicks) as events'),
                DB::raw('SUM(left_at - connected_at) as time_spent')
            )
            ->join('userinfo', 'user_events.xatid', '=', 'userinfo.xatid')
            ->where([
                ['user_events.chatid', $bot->chatid],
                ['left_at', '>=', DB::raw('NOW() - INTERVAL \'7\' day')]
            ])
            ->groupBy('userinfo.regname', 'userinfo.xatid')
            ->orderBy('rank', 'DESC')
            ->orderBy('time_spent', 'DESC')
            ->get();

        $statistics30Days = DB::table('user_events')
            ->select(
                'userinfo.regname',
                'userinfo.xatid',
                DB::raw('MAX(rank) as rank'),
                DB::raw('SUM(amount_commands + amount_messages) as messages'),
                DB::raw('SUM(amount_ranks + amount_bans + amount_kicks) as events'),
                DB::raw('SUM(left_at - connected_at) as time_spent')
            )
            ->join('userinfo', 'user_events.xatid', '=', 'userinfo.xatid')
            ->where([
                ['user_events.chatid', $bot->chatid],
                ['left_at', '>=', DB::raw('NOW() - INTERVAL \'30\' day')]
            ])
            ->groupBy('userinfo.regname', 'userinfo.xatid')
            ->orderBy('rank', 'DESC')
            ->orderBy('time_spent', 'DESC')
            ->get();

        $statisticsAllTime = DB::table('user_events')
            ->select(
                'userinfo.regname',
                'userinfo.xatid',
                DB::raw('MAX(rank) as rank'),
                DB::raw('SUM(amount_commands + amount_messages) as messages'),
                DB::raw('SUM(amount_ranks + amount_bans + amount_kicks) as events'),
                DB::raw('SUM(left_at - connected_at) as time_spent')
            )
            ->join('userinfo', 'user_events.xatid', '=', 'userinfo.xatid')
            ->where('user_events.chatid', $bot->chatid)
            ->groupBy('userinfo.regname', 'userinfo.xatid')
            ->orderBy('rank', 'DESC')
            ->orderBy('time_spent', 'DESC')
            ->get();

        return view('bot.statistics')
            ->with('statistics30Days', $statistics30Days)
            ->with('statistics7Days', $statistics7Days)
            ->with('statistics24Hours', $statistics24Hours)
            ->with('statisticsAllTime', $statisticsAllTime);
    }
}
