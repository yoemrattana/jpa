<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

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
        if( Auth::user()->isActive() ) {
            //return view('admin/home/index');
            return redirect('/home');
        } else {
            Session::flash('message', 'Your account is blocked');
            Auth::logout();
            return redirect('/login');
        }

        //return view('admin/home/index');

        //return view('home');
    }
}
