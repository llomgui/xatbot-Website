<?php

namespace OceanProject\Http\Controllers\Bot;

use Auth;
use Illuminate\Http\Request;
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

}