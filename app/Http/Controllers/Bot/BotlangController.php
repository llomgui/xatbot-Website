<?php

namespace OceanProject\Http\Controllers\Bot;

use Validator;
use Illuminate\Http\Request;
use OceanProject\Models\Bot;
use Illuminate\Support\Facades\DB;
use OceanProject\Http\Controllers\Controller;

class BotlangController extends Controller
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

    public function showBotlangForm()
    {
        $botlangs = DB::table('botlang')
                    ->join('botlang_sentences', 'botlang.botlang_sentences_id', '=', 'botlang_sentences.id')
                    ->where('botlang.bot_id', Session('onBotEdit'))
                    ->select(
                        'botlang_sentences.name',
                        'botlang.value',
                        'botlang_sentences.default_value',
                        'botlang.id',
                        'botlang_sentences.id as botlang_sentences_id'
                    )
                    ->orderBy('botlang_sentences.id', 'ASC')
                    ->get();

        return view('bot.botlang')
                ->with('botlangs', $botlangs);
    }

    public function editBotlang(Request $request)
    {
        $data = $request->all();

        $rules = [
            'botlang_id' => 'integer:required',
            'botlang_sentences_id' => 'integer:required',
            'custom_value' => 'filled'
        ];

        $validator = Validator::make($data, $rules);

        $validator->after(
            function ($validator) use ($data) {
                if (!empty($data['botlang_id'])) {
                    if (!$data['botlang_id']) {
                        $res = DB::table('botlang')
                                ->where('bot_id', Session('onBotEdit'))
                                ->where('id', $data['botlang_id'])
                                ->select('id')
                                ->get();

                        if (empty($res)) {
                            $validator->errors()->add('botlang_id', 'Cheater!');
                        }
                    }
                }
            }
        );

        if ($validator->fails()) {
            return response()->json(
                [
                'status'  => 'error',
                'message' => 'This field cannot be empty!'
                ]
            );
        }

        $bot = Bot::find(Session('onBotEdit'));
        $bot->botlang()->updateExistingPivot($data['botlang_sentences_id'], ['value' => $data['custom_value']]);

        return response()->json(
            [
            'status'  => 'success',
            'message' => 'Custom Message updated!'
            ]
        );
    }
}
