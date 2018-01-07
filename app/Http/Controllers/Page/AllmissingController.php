<?php

namespace xatbot\Http\Controllers\Page;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use xatbot\Models\Userinfo;
use xatbot\Utilities\Powers;
use xatbot\Utilities\XatUser;
use xatbot\Http\Controllers\Controller;

class AllmissingController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user = null)
    {
        $currentUser = \Auth::user();
        $user = $user ?? $currentUser->regname;
        
        if (is_numeric($user)) {
            $userData = Userinfo::where('xatid', $user)->get();
        } else {
            $userData = Userinfo::where('regname', $user)->get();
        }
        
        if (!isset($userData[0]['chatid'])) {
            \Session::put('notfound', 'This user was not found');
            return view('page.404');
        }
        
        $userData = json_decode($userData[0]['packet'], true);
        $minXats = 0;
        $maxXats = 0;
        $allmissing = array();
        
        $user = new XatUser($userData);
        
        if ($user->hasDays()) {
            $powers = Powers::getPowers();
            foreach ($powers as $key => $value) {
                if ($key == 95) {
                    continue;
                }
                if ((isset($value['isAllPower'])) && ($value['isAllPower'] == true) && !($user->hasPower($key))) {
                    $minXats += $value['minCost'];
                    $maxXats += $value['maxCost'];
                    $allmissing[] = [
                        'name' => $value['name'],
                        'min' => $value['minCost'],
                        'max' => $value['maxCost']
                    ];
                }
            }
        } else {
            \Session::put('notfound', 'This user has no days!');
            return view('page.404');
        }
        
        return view('page.allmissing')
                ->with('datas', $user)
                ->with('allmissing', $allmissing)
                ->with('minxats', $minXats)
                ->with('maxxats', $maxXats);
    }
}
