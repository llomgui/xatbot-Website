<?php

namespace xatbot\Http\Controllers\Auth;

use xatbot\Models\Userinfo;
use xatbot\Http\Controllers\Controller;
use xatbot\Utilities\Functions;
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
        $bots = $user->bots;
        $botsID = [];
        foreach ($bots as $bot) {
            $botsID[] = $bot->id;
        }

        if (!in_array(Session('onBotEdit'), $botsID)) {
            if ($user->level() == 1 || is_null(Session('onBotEdit'))) {
                session(['onBotEdit' => (!empty($botsID[0]) ? $botsID[0] : null)]);
            }
        }

        $userinfo = Userinfo::where('xatid', $user->xatid)->get();

        if (sizeof($userinfo) > 0) {
            $packet = $userinfo[0]->packet;
            if (!empty($packet)) {
                $avatar = json_decode($packet, true)['a'];
                $user->avatar = (is_numeric($avatar)) ? 'https://xat.com/web_gear/chat/av/' . $avatar . '.png' : $avatar;
            } else {
                $user->avatar = 'https://xat.com/web_gear/chat/av/1.png';
            }
        }

        if ($user->share_key == '') {
            $user->share_key = Functions::generateRandomString(60);
        }

        $user->ip = $request->ip();
        $user->save();
    }
}
