<?php

namespace xatbot\Http\Controllers\Auth;

use Input;
use Auth;
use Hash;
use Validator;
use Illuminate\Http\Request;
use xatbot\Models\User;
use xatbot\Http\Controllers\Controller;
use xatbot\Utilities\Xat;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showUpdateForm()
    {
        $user = Auth::user();

        return view('auth.profile')->with('user', $user);
    }

    public function update(Request $request)
    {

        $user = Auth::user();
        $data = $request->all();

        $rules = [
            'email'        => 'email|max:50|nullable|iunique:users,email',
            'xatid'        => 'integer|nullable|unique:users',
            'regname'      => 'max:50|nullable|iunique:users,regname',
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

        $validator->after(
            function ($validator) use ($data, $user) {

                if (!empty($data['old_password'])) {
                    if (!Hash::check($data['old_password'], $user->password)) {
                        $validator->errors()->add('old_password', 'Wrong password!');
                    }
                }

                if (!is_null($data['xatid']) || !is_null($data['regname'])) {
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
            }
        );

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
        
        if (!empty($data['togglebotstat'])) {
            $user->botstat = ['toggle' => $data['togglebotstat']];
        }

        $user->save();

        return redirect()
                ->route('profile')
                ->withSuccess('Information updated!');
    }

    public function steam(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();

        $rules = [
            'steam' => 'integer|nullable'
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

        $validator->after(
            function ($validator) use ($data) {
                if (!empty($data['steam'])) {
                    $ctx = stream_context_create(['http' => ['timeout' => 1]]);
                    $json = json_decode(file_get_contents(
                        'https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v2/?key=' .
                            env('STEAM_API_KEY') . '&steamids=' . $data['steam'],
                        false,
                        $ctx
                    ), true);

                    if (empty($json['response']['players'])) {
                        $validator->errors()->add('steam', 'The steamid is not valid!');
                    }
                }
            }
        );

        if ($validator->fails()) {
            return redirect()
                ->route('profile')
                ->withErrors($validator)
                ->withInput();
        }

        if (!empty($data['steam'])) {
            $user->steam = $data['steam'];
        }

        $user->save();

        return redirect()
                ->route('profile')
                ->withSuccess('Steam updated!');
    }
}
