<?php

namespace App\Http\Controllers;

use App\Models\HouseAttr;
use App\Models\HouseAttrTrans;
use App\Models\Room;
use App\Models\RoomTrans;
use App\Scopes\LanguageScope;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $lang = ["hy", "ru", "en"];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }

    public function index()
    {

        return view("admin.dashboard");
    }

    public function attributes()
    {
        $roomTrans = RoomTrans::withoutGlobalScope(LanguageScope::class)->where("lang","hy")->get();

        $attrs = HouseAttr::withoutGlobalScope(LanguageScope::class)->get();

        $attrsHy = HouseAttrTrans::withoutGlobalScope(LanguageScope::class)->where("lang","hy")->orderBy("attr_id","asc")->get();
        $attrsEn = HouseAttrTrans::withoutGlobalScope(LanguageScope::class)->where("lang","en")->orderBy("attr_id","asc")->get();
        $attrsRu = HouseAttrTrans::withoutGlobalScope(LanguageScope::class)->where("lang","ru")->orderBy("attr_id","asc")->get();


        return view("admin.attribute")->with([
            "attrs"     => $attrs,
            "roomTrans" => $roomTrans,
            "attrsHy"   => $attrsHy,
            "attrsEn"   => $attrsEn,
            "attrsRu"   => $attrsRu,
        ]);
    }

    public function rooms()
    {
        $roomsHy = Room::select("rooms.*","rooms_trans.name as name_trans","rooms_trans.lang","rooms_trans.room_id")
            ->leftjoin("rooms_trans","rooms_trans.room_id","=","rooms.id")
            ->where("rooms_trans.lang","hy")
            ->orderBy("rooms_trans.room_id")
            ->get();
        $roomsRu = Room::select("rooms.*","rooms_trans.name as name_trans","rooms_trans.lang","rooms_trans.room_id")
            ->leftjoin("rooms_trans","rooms_trans.room_id","=","rooms.id")
            ->where("rooms_trans.lang","ru")
            ->orderBy("rooms_trans.room_id")
            ->get();
        $roomsEn = Room::select("rooms.*","rooms_trans.name as name_trans","rooms_trans.lang","rooms_trans.room_id")
            ->leftjoin("rooms_trans","rooms_trans.room_id","=","rooms.id")
            ->where("rooms_trans.lang","en")
            ->orderBy("rooms_trans.room_id")
            ->get();

        return view("admin.rooms")->with([
            "roomsHy" =>$roomsHy,
            "roomsEn" =>$roomsEn,
            "roomsRu" =>$roomsRu,
        ]);
    }

    public function roomEdit($id)
    {
        $roomTrans = RoomTrans::withoutGlobalScope(LanguageScope::class)->where("room_id",$id)->orderBy("lang","asc")->get();

        return view("admin.room_edit")->with([
            "roomTrans" =>$roomTrans
        ]);
    }

    public function roomUpdate(Request $request)
    {
        RoomTrans::withoutGlobalScope(LanguageScope::class)->where("room_id",$request->room_id)->delete();

        foreach ($this->lang as $lang){
            RoomTrans::insert([
                "room_id" => $request->room_id,
                "name"    => $request->{"room_$lang"},
                "lang"    => $lang
            ]);
        }

        return redirect("/dashboard/rooms");
    }

    public function addAttribute(Request $request)
    {
        $attr = new HouseAttr();
        $attr->name      = $request->attr_hy;
        $attr->room_id   = $request->room_id;
        $attr->valueable = $request->valueable;
        $attr->save();

        HouseAttrTrans::insert([
            "lang"    => "hy",
            "attr_id" => $attr->id,
            "name"    => $request->name
        ]);

        return redirect()->back();
    }

    public function attributeEdit ($id)
    {
        $attr = HouseAttrTrans::withoutGlobalScope(LanguageScope::class)->where("attr_id", $id)->get();

        return view("admin.attr_edit")->with([
            "attr" => $attr
        ]);
    }

    public function attributeUpdate(Request $request)
    {
        HouseAttrTrans::withoutGlobalScope(LanguageScope::class)->where("attr_id",$request->attr_id)->delete();

        foreach ($this->lang as $lang){
            HouseAttrTrans::insert([
                "attr_id" => $request->attr_id,
                "name"    => $request->{"attr_$lang"},
                "lang"    => $lang
            ]);
        }

        return redirect("/dashboard/attributes");
    }

    public function attributeDelete($id)
    {
        HouseAttrTrans::withoutGlobalScope(LanguageScope::class)->where("attr_id",$id)->delete();

        return redirect("/dashboard/attributes");
    }
}
