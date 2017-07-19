<?php

namespace OceanProject\Http\Controllers\Bot;

use Validator;
use Illuminate\Http\Request;
use OceanProject\Models\Bot;
use OceanProject\Models\CustomCmd;
use OceanProject\Models\Minrank;
use OceanProject\Http\Controllers\Controller;

class CustomCmdController extends Controller
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

    public function showCustomCmdForm()
    {
        $customcmds = Bot::find(Session('onBotEdit'))->customcmd;
        $minranks = Minrank::pluck('name', 'id')->toArray();

        return view('bot.customcmd')
            ->with('customcmds', $customcmds)
            ->with('minranks', $minranks);
    }

    public function createCustomCmd(Request $request)
    {
        $data = $request->all();

        $rules = [
            'command' => 'max:255|required',
            'response'   => 'max:255|required'
        ];

        $validator = Validator::make($data, $rules);

        $validator->after(
            function ($validator) use ($data) {
                if (!in_array($data['minrank'], Minrank::pluck('id')->toArray())) {
                    $validator->errors()->add('minrank', 'This minrank is not valid!');
                }
            }
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $customcmd = new CustomCmd;

        $customcmd->bot_id   = Session('onBotEdit');
        $customcmd->command  = $data['command'];
        $customcmd->response = $data['response'];
        $customcmd->minrank_id  = $data['minrank'];

        $customcmd->save();

        return redirect()
            ->back()
            ->withSuccess('Custom command added!');
    }

    public function editCustomCmd(Request $request)
    {
        $data = $request->all();

        $customcmd = CustomCmd::find($data['customcmd_id']);

        if ($customcmd->customcmdBot->id != Session('onBotEdit')) {
            return redirect()
                ->back()
                ->withError('You are trying to cheat!');
        }

        $rules = [
            'command' => 'max:255|required',
            'response'   => 'max:255|required'
        ];

        $validator = Validator::make($data, $rules);

        $validator->after(
            function ($validator) use ($data) {
                if (!in_array($data['minrank'], Minrank::pluck('id')->toArray())) {
                    $validator->errors()->add('minrank', 'This minrank is not valid!');
                }
            }
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $customcmd->command     = $data['command'];
        $customcmd->response    = $data['response'];
        $customcmd->minrank_id  = $data['minrank'];

        $customcmd->save();

        return redirect()
            ->back()
            ->withSuccess('Custom command updated!');
    }

    public function deleteCustomCmd(Request $request)
    {
        $data = $request->all();

        $customcmd = CustomCmd::find($data['customcmd_id']);

        if ($customcmd->customcmdBot->id != Session('onBotEdit')) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'You are trying to cheat, you do not own this alias!',
                    'header' => 'Error!'
                ]
            );
        }

        $customcmd->delete();

        return response()->json(
            [
                'status' => 'success',
                'message' => 'Alias deleted!',
                'header' => 'Deleted!'
            ]
        );
    }
}
