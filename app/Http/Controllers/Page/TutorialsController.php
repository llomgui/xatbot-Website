<?php

namespace OceanProject\Http\Controllers\Page;

use Illuminate\Http\Request;
use OceanProject\Http\Controllers\Controller;

class TutorialsController extends Controller
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

    public function getPremium()
    {
        return view('page.getpremium');
    }

    public function setUpBot()
    {
        return view('page.setupbot');
    }
}
