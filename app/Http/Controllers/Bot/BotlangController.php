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
                    ->leftJoin('botlang_sentences', 'botlang.botlang_sentences_id', '=', 'botlang_sentences.id')
                    ->where('botlang.bot_id', Session('onBotEdit'))
                    ->orWhere('botlang.bot_id', '=', null)
                    ->select('botlang_sentences.name', 'botlang.value', 'botlang_sentences.default_value', 'botlang.id', 'botlang_sentences.id as botlang_sentences_id')
                    ->orderBy('botlang_sentences.id', 'ASC')
                    ->get();

        return view('bot.botlang')
                ->with('botlangs', $botlangs);
    }

    public function editBotlang(Request $request)
    {
        $data = $request->all();

        if ($data['botlang_id'] == null) {
            $rules = [
                'botlang_sentences_id' => 'integer:required',
                'custom_value' => 'present'
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                return response()->json(
                    [
                    'status'  => 'error',
                    'message' => 'You are trying to cheat!'
                    ]
                );
            }

            $bot = Bot::find(Session('onBotEdit'));
            $botlang_sentence = BotlangSentences::find($data['botlang_sentences_id']);

            $bot->botlang()->save($botlang_sentence, ['value' => $data['custom_value']]);

            return response()->json(
                [
                'status'  => 'success',
                'message' => 'Custom Message added!'
                ]
            );
        } else {
            $rules = [
                'botlang_id' => 'integer:required',
                'botlang_sentences_id' => 'integer:required',
                'custom_value' => 'present'
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
                    'message' => 'You are trying to cheat!'
                    ]
                );
            }

            $bot = Bot::find(Session('onBotEdit'));
            $bot->botlang()->updateExistingPivot($data['botlang_id'], ['value' => $data['custom_value']]);

            return response()->json(
                [
                'status'  => 'success',
                'message' => 'Custom Message updated!'
                ]
            );
        }
    }
}
