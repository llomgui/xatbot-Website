<?php

namespace OceanProject\Http\Controllers\Bot;

use Validator;
use Illuminate\Http\Request;
use OceanProject\Models\Bot;
use OceanProject\Models\Snitch;
use OceanProject\Utilities\xat;
use OceanProject\Http\Controllers\Controller;

class SnitchController extends Controller
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

    public function showSnitchForm()
    {
        $snitchs = Bot::find(Session('onBotEdit'))->snitchs;

        return view('bot.snitch')->with('snitchs', $snitchs);
    }

    public function createSnitch(Request $request)
    {
        $data = $request->all();

        $rules = [
            'regname' => 'max:255|required',
            'xatid'   => 'integer|required'
        ];

        $validator = Validator::make($data, $rules);

        $validator->after(function($validator) use ($data) {

            $regname = xat::isXatIDExist($data['xatid']);
            if (!xat::isValidXatID($data['xatid'])) {
                $validator->errors()->add('xatid', 'The xatid is not valid!');
            } elseif (!$regname) {
                $validator->errors()->add('xatid', 'The xatid does not exist!');
            }

            if (!xat::isValidRegname($data['regname'])) {
                $validator->errors()->add('regname', 'The regname is not valid!');
            } elseif (!xat::isRegnameExist($data['regname'])) {
                $validator->errors()->add('regname', 'The regname does not exist!');
            }

            if (strtolower($regname) != strtolower($data['regname'])) {
                $validator->errors()->add('regname', 'Regname and xatid do not match!');
                $validator->errors()->add('xatid', 'Regname and xatid do not match!');
            }

        });

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $snitch = new Snitch;

        $snitch->bot_id  = Session('onBotEdit');
        $snitch->regname = $data['regname'];
        $snitch->xatid   = $data['xatid'];

        $snitch->save();

        return redirect()
                ->back()
                ->withSuccess('Snitch added!');
    }

    public function editSnitch(Request $request)
    {
        $data = $request->all();

        $snitch = Snitch::find($data['snitch_id']);

        if ($snitch->snitch_bot->id != Session('onBotEdit')) {
            return redirect()
                ->back()
                ->withError('You are trying to cheat!');
        }

        $rules = [
            'regname' => 'max:255|required',
            'xatid'   => 'integer|required'
        ];

        $validator = Validator::make($data, $rules);

        $validator->after(function($validator) use ($data) {

            $regname = xat::isXatIDExist($data['xatid']);
            if (!xat::isValidXatID($data['xatid'])) {
                $validator->errors()->add('xatid', 'The xatid is not valid!');
            } elseif (!$regname) {
                $validator->errors()->add('xatid', 'The xatid does not exist!');
            }

            if (!xat::isValidRegname($data['regname'])) {
                $validator->errors()->add('regname', 'The regname is not valid!');
            } elseif (!xat::isRegnameExist($data['regname'])) {
                $validator->errors()->add('regname', 'The regname does not exist!');
            }

            if (strtolower($regname) != strtolower($data['regname'])) {
                $validator->errors()->add('regname', 'Regname and xatid do not match!');
                $validator->errors()->add('xatid', 'Regname and xatid do not match!');
            }

        });

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $snitch->regname = $data['regname'];
        $snitch->xatid   = $data['xatid'];

        $snitch->save();

        return redirect()
                ->back()
                ->withSuccess('Snitch updated!');
    }

    public function deleteSnitch(Request $request)
    {
        $data = $request->all();

        $snitch = Snitch::find($data['snitch_id']);

        if ($snitch->snitch_bot->id != Session('onBotEdit')) {
            return response()->json([
                'status' => 'error',
                'message' => 'You are trying to cheat, you do not own this snitch!',
                'header' => 'Error!'
            ]);
        }

        $snitch->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Snitch deleted!',
            'header' => 'Deleted!'
        ]);
    }
}
