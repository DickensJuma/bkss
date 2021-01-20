<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->user()->hasRole('super_admin')){
            return redirect()->route('superhome');
        }
        if ($request->user()->hasRole('admin')){
            return redirect()->route('adminhome');
        }
        if ($request->user()->hasRole('vendor')) {
            return redirect()->route('vendorhome');
        }
        if ($request->user()->hasRole('user')) {
            return redirect()->route('userhome');
        }
    }
}
