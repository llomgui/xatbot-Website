<?php

namespace OceanProject\Http\Controllers\Auth;

use OceanProject\Models\User;
use OceanProject\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use OceanProject\Utilities\Xat;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/panel/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator = Validator::make(
            $data,
            [
            'name'     => 'required|max:50|iunique:users,name|alpha_num',
            'email'    => 'required|email|max:50|iunique:users,email',
            'regname'  => 'required|max:50|iunique:users,regname',
            'xatid'    => 'required|integer|unique:users',
            'password' => 'required|min:6|confirmed'
            ]
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

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  Request $request
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create(
            [
            'name'     => $data['name'],
            'email'    => $data['email'],
            'xatid'    => $data['xatid'],
            'regname'  => $data['regname'],
            'password' => bcrypt($data['password']),
            'ip'       => \Request::ip()
            ]
        );

        $user->attachRole(5);

        return $user;
    }
}
