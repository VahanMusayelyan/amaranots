<?php

namespace App\Http\Controllers;

use App\Models\HouseOtherAttrCat;
use App\Models\Room;
use Illuminate\Http\Request;

class CottageHouseController extends Controller
{
    public function index()
    {
        $rooms = Room::all();

        $otherAttr = HouseOtherAttrCat::where("parent_id", null)->get();

        return view("cottage_house.index")->with([
            "rooms" => $rooms,
            "otherAttr" => $otherAttr,
        ]);
    }
}
