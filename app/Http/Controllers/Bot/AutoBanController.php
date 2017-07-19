<?php

namespace OceanProject\Http\Controllers\Bot;

use Validator;
use Illuminate\Http\Request;
use OceanProject\Models\Bot;
use OceanProject\Models\AutoBan;
use OceanProject\Utilities\Xat;
use OceanProject\Http\Controllers\Controller;

class AutoBanController extends Controller
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

    public function showAutoBanForm()
    {
        $autoban = Bot::find(Session('onBotEdit'))->autoban;
        $methods  = [
            'ban'         => 'Ban',
            'snakeban'    => 'Snakeban',
            'spaceban'    => 'Spaceban',
            'matchban'    => 'Matchban',
            'codeban'     => 'Codeban',
            'mazeban'     => 'Mazeban',
            'slotban'     => 'Slotban'
        ];

        return view('bot.autoban')
            ->with('methods', $methods)
            ->with('autoban', $autoban);
    }

    public function createAutoBan(Request $request)
    {
        $data = $request->all();

        $rules = [
            'xatid'   => 'integer',
            'regname' => 'max:255|required',
            'method'  => 'max:255|required',
            'hours'   => 'integer'
        ];

        $validator = Validator::make($data, $rules);

        $validator->after(
            function ($validator) use ($data) {

                $regname = Xat::isXatIDExist($data['xatid']);
                if (!Xat::isValidXatID($data['xatid'])) {
                    $validator->errors()->add('xatid', 'The xatid is not valid!');
                } elseif (!$regname) {
                    $validator->errors()->add('xatid', 'The xatid does not exist!');
                }

                if (!Xat::isValidRegname($data['regname'])) {
                    $validator->errors()->add('regname', 'The regname is not valid!');
                } elseif (!Xat::isRegnameExist($data['regname'])) {
                    $validator->errors()->add('regname', 'The regname does not exist!');
                }

                if (strtolower($regname) != strtolower($data['regname'])) {
                    $validator->errors()->add('regname', 'Regname and xatid do not match!');
                    $validator->errors()->add('xatid', 'Regname and xatid do not match!');
                }
            }
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $autoban = new autoban;

        $autoban->bot_id  = Session('onBotEdit');
        $autoban->xatid   = $data['xatid'];
        $autoban->regname = $data['regname'];
        $autoban->method  = $data['method'];
        $autoban->hours   = $data['hours'];

        $autoban->save();

        return redirect()
            ->back()
            ->withSuccess('AutoBan added!');
    }

    public function editAutoBan(Request $request)
    {
        $data = $request->all();

        $autoban = autoban::find($data['autoban_id']);

        if ($autoban->autobanBot->id != Session('onBotEdit')) {
            return redirect()
                ->back()
                ->withError('You are trying to cheat!');
        }

        $rules = [
            'xatid'   => 'integer',
            'regname' => 'max:255|required',
            'method'  => 'max:255|required',
            'hours'   => 'integer'
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $autoban->xatid   = $data['xatid'];
        $autoban->regname = $data['regname'];
        $autoban->method  = $data['method'];
        $autoban->hours   = $data['hours'];

        $autoban->save();

        return redirect()
            ->back()
            ->withSuccess('AutoBan updated!');
    }

    public function deleteAutoBan(Request $request)
    {
        $data = $request->all();

        $autoban = autoban::find($data['autoban_id']);

        if ($autoban->autobanBot->id != Session('onBotEdit')) {
            return response()->json(
                [
                    'status'  => 'error',
                    'message' => 'You are trying to cheat, you do not own this autoban!',
                    'header'  => 'Error!'
                ]
            );
        }

        $autoban->delete();

        return response()->json(
            [
                'status'  => 'success',
                'message' => 'autoban deleted!',
                'header'  => 'Deleted!'
            ]
        );
    }
}
