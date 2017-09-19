<?php

namespace OceanProject\Http\Controllers\Staff;

use Validator;
use OceanProject\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OceanProject\Models\User;
use OceanProject\Utilities\Xat;

class UsersController extends Controller
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

    public function showUsers(Request $request)
    {
        $users = User::orderBy('id', 'asc')->paginate(25);
        return view('staff.users', compact('users'));
    }

    public function showEditUser(User $user)
    {
        return view('staff.showedituser', compact('user'));
    }

    public function editUser(Request $request)
    {
        $data = $request->all();

        $rules = [
            'user_id' => 'integer',
            'email'   => 'email|max:50|iunique:users,email',
            'xatid'   => 'integer|unique:users',
            'regname' => 'max:50|iunique:users,regname',
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

        $user = User::find($data['user_id']);

        if ($validator->fails()) {
            return redirect()
                ->route('staff.edituser', ['user' => $user->id])
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

        $user->save();

        return redirect()
                ->route('staff.edituser', ['user' => $user->id])
                ->withSuccess('Information updated!');
    }
}
