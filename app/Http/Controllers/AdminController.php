<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogTrans;
use App\Models\HouseAttr;
use App\Models\HouseAttrTrans;
use App\Models\HouseOtherAttrCat;
use App\Models\HouseOtherAttrCatTrans;
use App\Models\Room;
use App\Models\RoomTrans;
use App\Scopes\LanguageScope;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function rooms()
    {
        $roomsHy = Room::select("rooms.*", "rooms_trans.name as name_trans", "rooms_trans.lang", "rooms_trans.room_id")
            ->leftjoin("rooms_trans", "rooms_trans.room_id", "=", "rooms.id")
            ->where("rooms_trans.lang", "hy")
            ->orderBy("rooms_trans.room_id")
            ->get();
        $roomsRu = Room::select("rooms.*", "rooms_trans.name as name_trans", "rooms_trans.lang", "rooms_trans.room_id")
            ->leftjoin("rooms_trans", "rooms_trans.room_id", "=", "rooms.id")
            ->where("rooms_trans.lang", "ru")
            ->orderBy("rooms_trans.room_id")
            ->get();
        $roomsEn = Room::select("rooms.*", "rooms_trans.name as name_trans", "rooms_trans.lang", "rooms_trans.room_id")
            ->leftjoin("rooms_trans", "rooms_trans.room_id", "=", "rooms.id")
            ->where("rooms_trans.lang", "en")
            ->orderBy("rooms_trans.room_id")
            ->get();

        return view("admin.rooms")->with([
            "roomsHy" => $roomsHy,
            "roomsEn" => $roomsEn,
            "roomsRu" => $roomsRu,
        ]);
    }

    public function roomEdit($id)
    {
        $roomTrans = RoomTrans::withoutGlobalScope(LanguageScope::class)->where("room_id", $id)->orderBy("lang", "asc")->get();

        return view("admin.room_edit")->with([
            "roomTrans" => $roomTrans
        ]);
    }

    public function roomUpdate(Request $request)
    {
        RoomTrans::withoutGlobalScope(LanguageScope::class)->where("room_id", $request->room_id)->delete();

        foreach ($this->lang as $lang) {
            RoomTrans::insert([
                "room_id" => $request->room_id,
                "name" => $request->{"room_$lang"},
                "lang" => $lang
            ]);
        }

        return redirect("/dashboard/rooms");
    }

    public function attributes()
    {

        $rooms = Room::with('roomAttr')->get();

        return view("admin.attribute")->with([
            "rooms" => $rooms
        ]);
    }

    public function addAttribute(Request $request)
    {
        $attr = new HouseAttr();
        $attr->name = $request->attr_hy;
        $attr->room_id = $request->room_id;
        $attr->valueable = $request->valueable;
        $attr->save();

        HouseAttrTrans::insert([
            "lang" => "hy",
            "attr_id" => $attr->id,
            "name" => $request->attr_hy
        ]);

        return redirect()->back();
    }

    public function attributeEdit($id)
    {
        $roomTrans = RoomTrans::withoutGlobalScope(LanguageScope::class)->where("lang", "hy")->get();

        $attr = HouseAttrTrans::withoutGlobalScope(LanguageScope::class)
            ->select("house_attr_trans.*", "house_attr.room_id")
            ->leftjoin("house_attr", "house_attr_trans.attr_id", "=", "house_attr.id")
            ->where("house_attr_trans.attr_id", $id)->get();

        return view("admin.attr_edit")->with([
            "attr" => $attr,
            "roomTrans" => $roomTrans
        ]);
    }

    public function attributeUpdate(Request $request)
    {
        HouseAttr::withoutGlobalScope(LanguageScope::class)->where("id", $request->attr_id)->update([
            "name" => $request->attr_hy,
            "room_id" => $request->room_id,
            "valueable" => $request->valueable,
        ]);

        HouseAttrTrans::withoutGlobalScope(LanguageScope::class)->where("attr_id", $request->attr_id)->delete();

        foreach ($this->lang as $lang) {
            HouseAttrTrans::insert([
                "attr_id" => $request->attr_id,
                "name" => $request->{"attr_$lang"},
                "lang" => $lang
            ]);
        }

        return redirect("/dashboard/attributes");
    }

    public function attributeDelete($id)
    {
        HouseAttrTrans::withoutGlobalScope(LanguageScope::class)->where("attr_id", $id)->delete();
        HouseAttr::withoutGlobalScope(LanguageScope::class)->where("id", $id)->delete();

        return redirect("/dashboard/attributes");
    }


    public function otherAttributes()
    {
        $attrs = HouseOtherAttrCat::withoutGlobalScope(LanguageScope::class)->get();
        $parents = HouseOtherAttrCat::withoutGlobalScope(LanguageScope::class)->where("parent_id", null)->get();

        $attrsHy = HouseOtherAttrCatTrans::withoutGlobalScope(LanguageScope::class)->where("lang", "hy")->orderBy("attr_cat_id", "asc")->get();
        $attrsEn = HouseOtherAttrCatTrans::withoutGlobalScope(LanguageScope::class)->where("lang", "en")->orderBy("attr_cat_id", "asc")->get();
        $attrsRu = HouseOtherAttrCatTrans::withoutGlobalScope(LanguageScope::class)->where("lang", "ru")->orderBy("attr_cat_id", "asc")->get();


        return view("admin.other_attribute")->with([
            "attrs" => $attrs,
            "attrsHy" => $attrsHy,
            "attrsEn" => $attrsEn,
            "attrsRu" => $attrsRu,
            "parents" => $parents,
        ]);
    }

    public function addOtherAttribute(Request $request)
    {
        $attr = new HouseOtherAttrCat();
        if ($request->parent_id != null && $request->parent_id != "") {
            $attr->type = $request->type;
            $attr->value = $request->value;
        }
        $attr->name = $request->attr_hy;
        $attr->parent_id = $request->parent_id;

        $attr->save();

        HouseOtherAttrCatTrans::insert([
            "lang" => "hy",
            "attr_cat_id" => $attr->id,
            "name" => $request->attr_hy
        ]);

        return redirect()->back();
    }

    public function otherAttributeEdit($id)
    {
        $parents = HouseOtherAttrCat::withoutGlobalScope(LanguageScope::class)->where("parent_id", null)->get();
        $attr = HouseOtherAttrCat::withoutGlobalScope(LanguageScope::class)->where("id", $id)->get();

        return view("admin.other_attr_edit")->with([
            "attr" => $attr,
            "parents" => $parents,
        ]);
    }

    public function otherAttributeUpdate(Request $request)
    {
        $attr = new HouseOtherAttrCat();
        if ($request->parent_id != null && $request->parent_id != "") {
            $attr->type = $request->type;
            $attr->value = $request->value;
        }
        $attr->name = $request->attr_hy;
        $attr->parent_id = $request->parent_id;

        $attr->save();

        HouseOtherAttrCatTrans::insert([
            "lang" => "hy",
            "attr_cat_id" => $attr->id,
            "name" => $request->attr_hy
        ]);

        return redirect()->back();
    }

    public function otherAttributeDelete($id)
    {

        HouseOtherAttrCatTrans::withoutGlobalScope(LanguageScope::class)->where("attr_cat_id", $id)->delete();
        HouseOtherAttrCat::withoutGlobalScope(LanguageScope::class)->where("id", $id)->delete();

        return redirect("/dashboard/other-attributes");
    }

    public function blogs()
    {

        $blogs = Blog::all();

        return view("admin.blogs")->with([
            "blogs" => $blogs
        ]);
    }

    public function addBlog(Request $request)
    {

        if (isset($request->img_first)) {
            $imgFirst = $request->img_first;
            $imageNameFirst = time() . '.' . $imgFirst->extension();
            $imgFirst->move(public_path('img/blogs'), $imageNameFirst);
        } else {
            $imageNameFirst = "";
        }

        if (isset($request->img_second)) {
            $imgSecond = $request->img_second;
            $imageNameSecond = time() . '.' . $imgSecond->extension();
            $imgSecond->move(public_path('img/blogs'), $imageNameSecond);
        } else {
            $imageNameSecond = "";
        }

        $blog = new Blog();
        $blog->theme = $request->theme;
        $blog->tags = $request->tags;
        $blog->header = $request->header;
        $blog->content_first = $request->content_first;
        $blog->content_second = $request->content_second;
        $blog->img_first = $imageNameFirst;
        $blog->img_second = $imageNameSecond;
        $blog->save();

        BlogTrans::insert([
            "blog_id" => $blog->id,
            "header" => $request->header,
            "content_first" => $request->content_first,
            "content_second" => $request->content_second,
            "theme" => $request->theme,
            "tags" => $request->tags,
            "lang" => "hy"
        ]);

        return redirect()->back();
    }

    public function blogEdit($id)
    {
        $blog = Blog::where("id", $id)->first();
        $blogHy = BlogTrans::withoutGlobalScope(LanguageScope::class)->where("blog_id", $id)->where("lang", "hy")->first();
        $blogEn = BlogTrans::withoutGlobalScope(LanguageScope::class)->where("blog_id", $id)->where("lang", "en")->first();
        $blogRu = BlogTrans::withoutGlobalScope(LanguageScope::class)->where("blog_id", $id)->where("lang", "ru")->first();

        return view("admin.blog_edit")->with([
            "blog" => $blog,
            "blogHy" => $blogHy,
            "blogEn" => $blogEn,
            "blogRu" => $blogRu,
        ]);
    }

    public function blogUpdate(Request $request)
    {
        $blogUpdated = Blog::where("id", $request->number)->first();

        $blog = Blog::find($request->number);

        if (isset($request->img_first)) {
            if (File::exists(public_path('img/blogs/' . $blogUpdated->image_first))) {
                File::delete(public_path('img/blogs/' . $blogUpdated->image_first));
            }
            $imgFirst = $request->img_first;
            $imageNameFirst = time() . '0.' . $imgFirst->extension();
            $imgFirst->move(public_path('img/blogs'), $imageNameFirst);
        } else {
            $imageNameFirst = $blogUpdated->img_first;
        }

        if (isset($request->img_second)) {
            if (File::exists(public_path('img/blogs/' . $blogUpdated->image_second))) {
                File::delete(public_path('img/blogs/' . $blogUpdated->image_second));
            }
            $imgSecond = $request->img_second;
            $imageNameSecond = time() . '1.' . $imgSecond->extension();
            $imgSecond->move(public_path('img/blogs'), $imageNameSecond);
        } else {
            $imageNameSecond = $blogUpdated->img_second;
        }


        $blog->theme = $request->theme;
        $blog->tags = $request->tags;
        $blog->header = $request->header_hy;
        $blog->content_first = $request->content_first_hy;
        $blog->content_second = $request->content_second_hy;
        $blog->img_first = $imageNameFirst;
        $blog->img_second = $imageNameSecond;
        $blog->save();

        BlogTrans::withoutGlobalScope(LanguageScope::class)->where("blog_id", $request->number)->delete();

        foreach ($this->lang as $lang) {
            BlogTrans::insert([
                "blog_id" => $request->number,
                "header" => $request->{"header_$lang"},
                "content_first" => $request->{"content_first_$lang"},
                "content_second" => $request->{"content_second_$lang"},
                "theme" => $request->theme,
                "tags" => $request->tags,
                "lang" => $lang
            ]);
        }

        return redirect("/dashboard/blogs");
    }

    public function blogDelete($id)
    {
        $blog = Blog::where("id", $id)->first();
        if (File::exists(public_path('img/blogs/' . $blog->image_first))) {
            File::delete(public_path('img/blogs/' . $blog->image_first));
        }
        if (File::exists(public_path('img/blogs/' . $blog->image_second))) {
            File::delete(public_path('img/blogs/' . $blog->image_second));
        }

        $result = BlogTrans::withoutGlobalScope(LanguageScope::class)->where("blog_id", $id)->delete();

        if ($result) {
            Blog::where("id", $id)->delete();
        }


        return redirect("/dashboard/blogs");
    }

}
