<?php

namespace OceanProject\Http\Controllers\Page;

use Auth;
use Illuminate\Http\Request;
use OceanProject\Models\Language;
use OceanProject\Http\Controllers\Controller;

class TopbarController extends Controller
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

    public function getBots()
    {
        $bots = Auth::user()->bots;
        $botsID = [];
        foreach ($bots as $bot) {
            $botsID[] = $bot->id;
        }

        if (!in_array(Session('onBotEdit'), $botsID)) {
            if (Auth::user()->level() == 1 || is_null(Session('onBotEdit'))) {
                session(['onBotEdit' => (!empty($botsID[0]) ? $botsID[0] : null)]);
            }
        }

        return $botsID;
    }

    public function getLanguages()
    {
        $languages = Language::all();
        return $languages;
    }
}
