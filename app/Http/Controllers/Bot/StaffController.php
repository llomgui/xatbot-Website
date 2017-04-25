<?php

namespace OceanProject\Http\Controllers\Bot;

use Validator;
use Illuminate\Http\Request;
use OceanProject\Models\Bot;
use OceanProject\Models\Staff;
use OceanProject\Utilities\xat;
use OceanProject\Models\Minrank;
use OceanProject\Http\Controllers\Controller;

class StaffController extends Controller
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

    public function showStaffForm()
    {
    	$staffs = Bot::find(Session('onBotEdit'))->staffs;
    	$minranks = Minrank::pluck('name', 'id')->toArray();

        return view('bot.staff')
        		->with('staffs', $staffs)
        		->with('minranks', $minranks);
    }

    public function createStaff(Request $request)
    {
    	$data = $request->all();

    	$rules = [
			'regname' => 'max:255|required',
			'xatid'   => 'integer|required'
        ];

        $validator = Validator::make($data, $rules);

        $validator->after(function($validator) use ($data) {

        	if (!in_array($data['minrank'], Minrank::pluck('id')->toArray())) {
        		$validator->errors()->add('minrank', 'This minrank is not valid!');
        	}

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

            if ($regname != $data['regname']) {
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

        $staff = new Staff;

		$staff->bot_id     = Session('onBotEdit');
		$staff->regname    = $data['regname'];
		$staff->xatid      = $data['xatid'];
		$staff->minrank_id = $data['minrank'];

		$staff->save();

		return redirect()
                ->back()
                ->withSuccess('Staff added!');
    }

    public function editStaff(Request $request)
    {
    	$data = $request->all();

    	$staff = Staff::find($data['staff_id']);

    	if ($staff->staff_bot->id != Session('onBotEdit')) {
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

        	if (!in_array($data['minrank'], Minrank::pluck('id')->toArray())) {
        		$validator->errors()->add('minrank', 'This minrank is not valid!');
        	}

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

            if ($regname != $data['regname']) {
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

		$staff->regname    = $data['regname'];
		$staff->xatid      = $data['xatid'];
		$staff->minrank_id = $data['minrank'];

		$staff->save();

		return redirect()
                ->back()
                ->withSuccess('Staff updated!');
    }

    public function deleteStaff(Request $request)
    {
    	$data = $request->all();

    	$staff = Staff::find($data['staff_id']);

    	if ($staff->staff_bot->id != Session('onBotEdit')) {
    		return response()->json([
                'status' => 'error',
                'message' => 'You are trying to cheat, you do not own this staff!',
                'header' => 'Error!'
            ]);
    	}

    	$staff->delete();

    	return response()->json([
            'status' => 'success',
            'message' => 'Staff deleted!',
            'header' => 'Deleted!'
        ]);
    }
}
