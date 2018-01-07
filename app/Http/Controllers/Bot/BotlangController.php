<?php

namespace xatbot\Http\Controllers\Bot;

use Validator;
use Illuminate\Http\Request;
use xatbot\Models\Bot;
use Illuminate\Support\Facades\DB;
use xatbot\Models\BotlangSentences;
use xatbot\Http\Controllers\Controller;

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
                    ->rightJoin('botlang_sentences', 'botlang.botlang_sentences_id', '=', 'botlang_sentences.id')
                    ->where('botlang.bot_id', Session('onBotEdit'))
                    ->orWhereNull('botlang.bot_id')
                    ->select(
                        'botlang_sentences.name',
                        'botlang.value',
                        'botlang_sentences.sentences',
                        'botlang.id',
                        'botlang_sentences.id as botlang_sentences_id'
                    )
                    ->orderBy('botlang_sentences.id', 'ASC')
                    ->get();

        $currentLanguage = Bot::find(Session('onBotEdit'))->language->code;

        return view('bot.botlang')
                ->with('botlangs', $botlangs)
                ->with('language', $currentLanguage);
    }

    public function editBotlang(Request $request)
    {
        $data = $request->all();
        $bot = Bot::find(Session('onBotEdit'));

        $rules = [
            'botlang_sentences_id' => 'integer:required'
        ];

        if ($data['botlang_id'] == null) {
            $bot->botlang()->save(
                BotlangSentences::find($data['botlang_sentences_id']),
                ['value' => $data['custom_value']]
            );

            return response()->json(
                [
                    'status'  => 'success',
                    'message' => 'Custom Message updated!'
                ]
            );
        }

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

        $bot->botlang()->updateExistingPivot($data['botlang_sentences_id'], ['value' => $data['custom_value']]);

        return response()->json(
            [
            'status'  => 'success',
            'message' => 'Custom Message updated!'
            ]
        );
    }
}
