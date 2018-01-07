<?php

namespace xatbot\Http\Controllers\Staff;

use Validator;
use Illuminate\Http\Request;
use xatbot\Models\Language;
use xatbot\Models\BotlangSentences;
use xatbot\Http\Controllers\Controller;

class TranslateBotMessagesController extends Controller
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

    public function show()
    {
        $botmessages = BotlangSentences::orderby('id', 'asc');
        $languages = Language::all();

        return view('staff.translatebotmessages')
            ->with('botmessages', $botmessages)
            ->with('languages', $languages);
    }
}
