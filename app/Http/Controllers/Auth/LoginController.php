<?php

namespace OceanProject\Http\Controllers\Auth;

use OceanProject\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function username()
    {
        return 'name';
    }

    protected function authenticated(\Illuminate\Http\Request $request, $user)
    {
        $botsID = [];
        foreach ($user->bots as $bot) {
            $botsID[] = $bot->id;
        }
        session(['botsID' => $botsID]);
        session(['onBotEdit' => (!empty($botsID[0]) ?? null)]);
        $user->ip = $request->ip();
        $user->save();
    }
}
