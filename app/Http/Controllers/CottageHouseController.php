<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class CottageHouseController extends Controller
{
    public function index(){
        $rooms = Room::all();

        return view("cottage_house.index")->with(["rooms" => $rooms]);
    }
}
