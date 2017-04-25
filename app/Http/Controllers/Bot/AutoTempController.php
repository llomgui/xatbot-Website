<?php

namespace OceanProject\Http\Controllers\Bot;

use Validator;
use Illuminate\Http\Request;
use OceanProject\Models\Bot;
use OceanProject\Models\AutoTemp;
use OceanProject\Utilities\xat;
use OceanProject\Http\Controllers\Controller;

class AutotempController extends Controller
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

    public function showAutoTempForm()
    {
        $autotemps = Bot::find(Session('onBotEdit'))->autotemps;
        return view('bot.autotemp')->with('autotemps', $autotemps);
    }

    public function createAutoTemp(Request $request)
    {
        $data = $request->all();

        $rules = [
            'regname' => 'max:255|required',
            'xatid'   => 'integer|required',
            'hours'   => 'integer'
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

        $autotemp = new AutoTemp;

        $autotemp->bot_id  = Session('onBotEdit');
        $autotemp->regname = $data['regname'];
        $autotemp->xatid   = $data['xatid'];
        $autotemp->hours   = $data['hours'];

        $autotemp->save();

        return redirect()
                ->back()
                ->withSuccess('AutoTemp added!');
    }

    public function editAutoTemp(Request $request)
    {
        $data = $request->all();

        $autotemp = AutoTemp::find($data['autotemp_id']);

        if ($autotemp->autotemp_bot->id != Session('onBotEdit')) {
            return redirect()
                ->back()
                ->withError('You are trying to cheat!');
        }

        $rules = [
            'regname' => 'max:255|required',
            'xatid'   => 'integer|required',
            'hours'   => 'integer'
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

        $autotemp->regname = $data['regname'];
        $autotemp->xatid   = $data['xatid'];
        $autotemp->hours   = $data['hours'];

        $autotemp->save();

        return redirect()
                ->back()
                ->withSuccess('AutoTemp updated!');
    }

    public function deleteAutoTemp(Request $request)
    {
        $data = $request->all();

        $autotemp = AutoTemp::find($data['autotemp_id']);

        if ($autotemp->autotemp_bot->id != Session('onBotEdit')) {
            return response()->json([
                'status' => 'error',
                'message' => 'You are trying to cheat, you do not own this autotemp!',
                'header' => 'Error!'
            ]);
        }

        $autotemp->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'AutoTemp deleted!',
            'header' => 'Deleted!'
        ]);
    }
}
