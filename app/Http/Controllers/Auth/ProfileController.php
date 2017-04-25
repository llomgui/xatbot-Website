<?php

namespace OceanProject\Http\Controllers\Auth;

use Input;
use Auth;
use Hash;
use Validator;
use Illuminate\Http\Request;
use OceanProject\Models\User;
use OceanProject\Http\Controllers\Controller;
use OceanProject\Utilities\xat;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showUpdateForm() {
        $user = Auth::user();

        return view('auth.profile')->with('user', $user);
    }

    public function update(Request $request) {

        $user = Auth::user();
        $data = $request->all();

        $rules = [
            'email'        => 'email|max:50|unique:users',
            'xatid'        => 'integer|unique:users',
            'regname'      => 'max:50|unique:users',
            'old_password' => 'min:6|required_with:new_password',
            'new_password' => 'min:6|different:old_password|required_with:old_password',
        ];

        $inputs = [];
        foreach ($data as $key => $value) {

            if ($key == '_token' || is_null($value)) {
                continue;
            }

            $inputs[$key] = $value;
        }

        $validator = Validator::make(
            $inputs,
            $rules
        );

        $validator->after(function($validator) use ($data, $user) {

            if (!empty($data['old_password'])) {
                if (!Hash::check($data['old_password'], $user->password)){
                    $validator->errors()->add('old_password', 'Wrong password!');
                }
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

            if (strtolower($regname) != strtolower($data['regname'])) {
                $validator->errors()->add('regname', 'Regname and xatid do not match!');
                $validator->errors()->add('xatid', 'Regname and xatid do not match!');
            }

        });

        if ($validator->fails()) {
            return redirect()
                ->route('profile')
                ->withErrors($validator)
                ->withInput();
        }

        if (!empty($data['regname'])) {
            $user->regname = $data['regname'];
        }

        if (!empty($data['xatid'])) {
            $user->xatid = $data['xatid'];
        }

        if (!empty($data['email'])) {
            $user->email = $data['email'];
        }

        if (!empty($data['old_password'])) {
            $user->password = Hash::make($data['new_password']);
        }

        $user->save();

        return redirect()
                ->route('profile')
                ->withSuccess('Information updated!');

    }
}