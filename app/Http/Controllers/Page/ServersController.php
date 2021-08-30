<?php

namespace xatbot\Http\Controllers\Page;

use xatbot\Http\Controllers\Controller;
use Illuminate\Http\Request;
use xatbot\Utilities\IPC;
use xatbot\Models\Server;

class ServersController extends Controller
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
        $servers = Server::all()->toArray();

        $temp = [
            'totalBots' => 0,
            'totalMemory' => 0,
            'totalCPU' => 0,
            'totalTimestarted' => 0
        ];
        
        foreach ($servers as $server) {
            IPC::init();
            IPC::connect(strtolower($server['name']) . '.sock');
            IPC::write(sprintf("%s", 'server_status'));
            $packet = IPC::read(1024);
            IPC::close();
            echo $packet;
	    echo $server['name'];
	    //$packet = '';

            if (!empty($packet)) {
                $infos[$server['name']] = json_decode($packet, true);
                $infos[$server['name']]['timestarted'] -= time();

                $temp['totalBots']        += $infos[$server['name']]['bots'];
                $temp['totalMemory']      += $infos[$server['name']]['memory'];
                $temp['totalCPU']         += $infos[$server['name']]['cpu'];
                $temp['totalTimestarted'] += $infos[$server['name']]['timestarted'];

                $infos[$server['name']]['timestarted'] = $this->sec2dhms(abs($infos[$server['name']]['timestarted']));
            }
        }

        // $temp['averageMemory']      = ($temp['totalMemory'] / sizeof($servers));
        // $temp['averageCPU']         = ($temp['totalCPU'] / sizeof($servers));
        $temp['averageTimestarted'] = $this->sec2dhms(abs($temp['totalTimestarted'] / sizeof($servers)));

        return view('page.servers')
            ->with('temp', $temp)
            ->with('infos', $infos);
    }

    private function sec2dhms($s, $j = ' ')
    {
        $r = [];
        foreach (['d' => 86400, 'h' => 3600, 'm' => 60, 's' => 1] as $k => $v) {
            if ($s >= $v) {
                $r[] = floor($s / $v) . $k;
                $s = $s % $v;
            }
        }

        return implode(' ', $r);
    }
}
