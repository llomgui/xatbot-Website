<?php

namespace OceanProject\Http\Controllers\Page;

use Illuminate\Http\Request;
use OceanProject\Models\Minrank;
use Illuminate\Support\Facades\DB;
use OceanProject\Http\Controllers\Controller;

class CommandsController extends Controller
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
    public function index($botid = null)
    {
        if ($botid == false) {
            $commands = DB::table('commands')
                ->join('minranks', 'commands.default_level', '=', 'minranks.level')
                ->orderBy('commands.default_level', 'ASC')
                ->orderBy('commands.name', 'ASC')
                ->select(
                    'commands.name',
                    'commands.description',
                    'minranks.name as rank',
                    'commands.default_level'
                )
                ->get();
        } else {
            $commands = DB::table('commands')
                ->leftJoin('bot_command_minrank', function ($leftjoin) use ($botid) {
                    $leftjoin->on('bot_command_minrank.command_id', '=', 'commands.id')
                        ->on('bot_command_minrank.bot_id', '=', DB::raw($botid));
                })
                ->leftjoin('minranks', 'bot_command_minrank.minrank_id', '=', 'minranks.id')
                ->orderBy('level', 'ASC')
                ->orderBy('commands.name', 'ASC')
                ->select(
                    'commands.name',
                    'commands.description',
                    'minranks.name as rank',
                    'commands.default_level',
                    DB::raw(
                        '(CASE WHEN minranks.level IS NULL THEN commands.default_level ELSE minranks.level END)
                        AS level'
                    )
                )
                ->get();

            $minranks = Minrank::all()->toArray();

            foreach ($commands as $command) {
                if ($command->rank == null) {
                    for ($i = 0; $i < sizeof($minranks); $i++) {
                        if ($command->default_level == $minranks[$i]['level']) {
                            $command->rank = $minranks[$i]['name'];
                            break;
                        }
                    }
                }
            }
        }

        return view('page.commands')->with('commands', $commands);
    }
}
