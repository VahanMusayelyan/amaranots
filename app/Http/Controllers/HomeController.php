<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
    public function index($lang)
    {
        $array = ['en','ru','hy'];

        if(in_array($lang, $array)){
            Session()->put('locale', $lang);
            App::setLocale($lang);
        }

        return view('home');
    }

    public function home(){

        return view('home');
    }
    public function main(){

        return view('main');
    }
}
