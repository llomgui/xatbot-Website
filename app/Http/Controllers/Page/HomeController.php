<?php

namespace OceanProject\Http\Controllers\Page;

use OceanProject\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        $bots = \Auth::user()->bots;
        return view('page.home')->with('bots', $bots);
        ;
    }
}
