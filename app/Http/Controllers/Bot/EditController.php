<?php

namespace OceanProject\Http\Controllers\Bot;

use Auth;
use Validator;
use Illuminate\Http\Request;
use OceanProject\Models\Bot;
use OceanProject\Http\Controllers\Controller;

class EditController extends Controller
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

    public function editNickname(Request $request)
    {
        $data = $request->all();
        if (!Auth::user()->hasBot($data['pk'])) {
            return response()->json([
                'status' => 'error',
                'message' => 'You are trying to cheat, you do not own this bot!'
            ]);
        } else {

            $validator = Validator::make($data, ['value' => 'max:255']);

            if ($validator->fails()) {
                    return response()->json([
                    'status' => 'error',
                    'message' => 'Nickname is too long!'
                ]);
            }

            $bot = Bot::find($data['pk']);
            $bot->nickname = $data['value'];
            $bot->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Nickname updated!'
            ]);
        }
    }

}