<?php

namespace xatbot\Http\Controllers\Bot;

use Validator;
use Illuminate\Http\Request;
use xatbot\Models\Bot;
use xatbot\Utilities\Powers;
use xatbot\Http\Controllers\Controller;

class PowersController extends Controller
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

    public function showPowersForm()
    {
        $powersDisabled = Bot::find(Session('onBotEdit'))->powersdisabled;
        $powersDisabled = (is_null($powersDisabled) ? ['93'] : json_decode($powersDisabled, true));
        $powers = Powers::getPowers();
        $data = [];

        foreach ($powers as $id => $power) {
            $data[$id]['id'] = $id;
            $data[$id]['name'] = $power['name'];
            if (in_array($id, $powersDisabled) || $id == 93) {
                $data[$id]['disabled'] = true;
            } else {
                $data[$id]['disabled'] = false;
            }
        }

        return view('bot.powers')->with('powers', array_values($data));
    }

    public function editPowers(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, ['power_id' => 'integer']);

        if ($validator->fails()) {
                return response()->json(
                    [
                    'status' => 'error',
                    'message' => 'You are trying to cheat!'
                    ]
                );
        }

        $bot = Bot::find(Session('onBotEdit'));
        $powersDisabled = $bot->powersdisabled;
        $powersDisabled = (is_null($powersDisabled) ? ['93'] : json_decode($powersDisabled, true));

        if ($data['checked'] == 'true') {
            if (in_array($data['power_id'], $powersDisabled)) {
                unset($powersDisabled[array_search($data['power_id'], $powersDisabled)]);
            }
        } else {
            if (!in_array($data['power_id'], $powersDisabled)) {
                $powersDisabled[] = $data['power_id'];
            }
        }

        $bot->powersdisabled = json_encode($powersDisabled);
        $bot->save();

        return response()->json(
            [
            'status' => 'success',
            'message' => 'Powers updated!'
            ]
        );
    }
}
