<?php

namespace OceanProject\Http\Controllers\Page;

use OceanProject\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OceanProject\Utilities\IPC;
use OceanProject\Models\Server;

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
        $servers = [['name' => 'Saturn']]; //Server::all()->toArray();
        
        foreach ($servers as $server) {
            IPC::init();
            IPC::connect(strtolower($server['name']) . '.sock');
            IPC::write(sprintf("%s", 'server_status'));
            $packet = IPC::read(1024);
            IPC::close();

            if (!empty($packet)) {
                $infos[$server['name']] = json_decode($packet, true);
                $infos[$server['name']]['timestarted'] -= time();
                $infos[$server['name']]['timestarted'] = $this->sec2dhms(abs($infos[$server['name']]['timestarted']));
            }
        }

        return view('page.servers')->with('infos', $infos);
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
