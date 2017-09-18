<?php

namespace OceanProject\Http\Controllers\Page;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use OceanProject\Models\Userinfo;
use OceanProject\Utilities\Powers;
use OceanProject\Http\Controllers\Controller;

class UserinfoController extends Controller
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
        
        if ($userData[0]['optout'] == true) {
            \Session::put('optout', 'This user has chosen to opt out of userinfo');
            return view('page.404');
        }
        
        $userDatas = json_decode($userData[0]['packet']);
        $newPowersList = array();
        $powersList = array();
        $doublesList = 0;
        $cdouble = 0;
        $minXats = 0;
        $maxXats = 0;
        
        // User has power!
        if ($userDatas->q == 3) {
            for ($i = 0; $i < 22; $i++) {
                if (isset($userDatas->{'p' . $i})) {
                    $powersList[$i] = $userDatas->{'p' . $i};
                }
            }
            
            $powers = Powers::getPowers();
            foreach ($powers as $id => $value) {
                $section = $id >> 5;
                if (isset($powersList[$section])) {
                    if ($powersList[$section] & pow(2, ($id % 32))) {
                        if ($id == 95) {
                            continue;
                        }
                        $minXats += $value['minCost'];
                        $maxXats += $value['maxCost'];
                        $newPowersList[$id] = [
                            'name' => $value['name']
                        ];
                    }
                }
            }
            
            // Checking for doubles ..
            if (isset($userDatas->po)) {
                $userDatas->po = explode('|', $userDatas->po);
                for ($i = 0; $i < sizeof($userDatas->po); $i++) {
                    $pos = strpos($userDatas->po[$i], '=');
                    if ($pos !== false) {
                        $id     = (int)substr($userDatas->po[$i], 0, $pos);
                        $amount = (int)substr($userDatas->po[$i], $pos + 1);
                    } else {
                        $id     = (int)$userDatas->po[$i];
                        $amount = 1;
                    }

                    if (!(isset($powers[$id]))) {
                        continue;
                    }
                    
                    $cdouble += $amount;
                    $minXats += $powers[$id]['minCost'] * $amount;
                    $maxXats += $powers[$id]['maxCost'] * $amount;
                    $newPowersList[$id]['doubles'] = $amount;
                    $doublesList++;
                }
            }
        }
    
        return view('page.userinfo')
                ->with('chatname', $userData[0]['chatname'])
                ->with('userData', $userData)
                ->with('xatDatas', $userDatas)
                ->with('minXats', $minXats)
                ->with('maxXats', $maxXats)
                ->with('doubles', $cdouble)
                ->with('powersList', sizeof($newPowersList) > 0 ? $newPowersList : false);
    }
}
