<?php

namespace OceanProject\Http\Controllers\Page;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $staffList = DB::table('role_user')
                    ->leftjoin('roles', 'role_user.role_id', '=', 'roles.id')
                    ->leftjoin('users', 'role_user.user_id', '=', 'users.id')
                    ->orderby('role_id', 'asc')
                    ->select(
                        'role_user.role_id',
                        'roles.slug',
                        'users.regname',
                        'users.xatid'
                    )
                    ->where('role_user.role_id', '!=', 5)
                    ->get();

        return view('page.staff')
                ->with('staffList', $staffList);
    }
}
