<?php

namespace xatbot\Http\Controllers\Page;

use Session;
use xatbot\Models\Userinfo;
use Illuminate\Support\Facades\DB;
use xatbot\Utilities\Powers;
use xatbot\Utilities\XatUser;
use xatbot\Http\Controllers\Controller;

class HasmostController extends Controller
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

    public function index($pow = null)
    {
        if (empty($pow)) {
            \Session::put('notfound', 'Set a power please!');
            return view('page.404');
        }

        $bool = false;
        $powers = Powers::getPowers();
        if (is_numeric($pow)) {
            if (isset($powers[$pow])) {
                $bool = true;
            }
        } else {
            foreach ($powers as $power) {
                if ($pow == $power['name']) {
                    $pow = $power['id'];
                    $bool = true;
                    break;
                }
            }
        }

        if ($bool) {
            $users = Userinfo::where(DB::raw('packet->>\'po\''), 'like', '%' . $pow . '=%')
                    ->select('xatid', 'regname', DB::raw('packet->>\'po\' as po'))
                    ->get();

            if (sizeof($users) < 1) {
                \Session::put('notfound', 'No one have more than one of this power.');
                return view('page.404');
            }
            
            $regex  = '/^.*[^0-9]' . $pow . '=([0-9]*).*$/';
            $res = [];

            foreach ($users as $user) {
                if (!preg_match($regex, '|'.$user->po)) {
                    continue;
                }

                $amount = (int)preg_replace($regex, '$1', '|'.$user->po);
                $res[] = ['max' => $amount, 'regname' => $user->regname, 'xatid' => $user->xatid];
            }

            rsort($res);

            return view('page.hasmost')
                ->with('users', $res);
        } else {
            \Session::put('notfound', 'This power was not found');
            return view('page.404');
        }
    }
}
