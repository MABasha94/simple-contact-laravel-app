<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Phone;

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
    public function index()
    {
        $phone = Phone::all();
         return view('/home',['phonelist' => $phone]);
    }
}
