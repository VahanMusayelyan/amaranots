<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomTrans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($locale = null)
    {
        if ($locale != null && in_array($locale, config('app.locales'))) {
            App::setlocale($locale);
            Session::put("applocale", App::getLocale($locale));
        } else {
            Session::put("applocale", config('app.fallback_locale'));
            App::setlocale(config('app.fallback_locale'));
            $locale = '';
        }

        $roomTrans = Room::select()->get();

        return view('home')->with([
            "roomTrans" => $roomTrans
        ]);
    }
}
