@extends('admin.layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul>
                    <li><a href="/dashboard/attributes">Attributes</a></li>
                    <li><a href="/dashboard/other-attributes">Other Attributes</a></li>
                    <li><a href="/dashboard/rooms">Rooms</a></li>
                    <li><a href="/dashboard/blogs">Blog</a></li>

                </ul>
                <form action="/dashboard/blog/update" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="pt-5 pb-5">
                        <label for="header">Header hy</label>
                        <input id="header" value="{{$blogHy->header}}" class="form-control mt-2 mb-2" name="header_hy" required/>
                        <label for="attr_hy">Content First hy</label>
                        <input id="attr_hy" value="{{$blogHy->content_first}}" class="form-control mt-2 mb-2" name="content_first_hy" required/>
                        <label for="attr_hy1">Content Second hy</label>
                        <input id="attr_hy1" value="{{$blogHy->content_second}}" class="form-control mt-2 mb-2" name="content_second_hy" required/>

                        <label for="header">Header en</label>
                        <input id="header" value="<?=(isset($blogEn->header)) ? $blogEn->header : "";?>" class="form-control mt-2 mb-2" name="header_en" required/>
                        <label for="attr_hy">Content First en</label>
                        <input id="attr_hy" value="<?=(isset($blogEn->content_first)) ? $blogEn->content_first : "";?>" class="form-control mt-2 mb-2" name="content_first_en" required/>
                        <label for="attr_hy1">Content Second en</label>
                        <input id="attr_hy1" value="<?=(isset($blogEn->content_second)) ? $blogEn->content_second : "";?>" class="form-control mt-2 mb-2" name="content_second_en" required/>


                        <label for="header">Header ru</label>
                        <input id="header" value="<?=(isset($blogRu->header)) ? $blogRu->header : "";?>" class="form-control mt-2 mb-2" name="header_ru" required/>
                        <label for="attr_hy">Content First ru</label>
                        <input id="attr_hy" value="<?=(isset($blogRu->content_first)) ? $blogRu->content_first : "";?>" class="form-control mt-2 mb-2" name="content_first_ru" required/>
                        <label for="attr_hy1">Content Second ru</label>
                        <input id="attr_hy1" value="<?=(isset($blogRu->content_second)) ? $blogRu->content_second : "";?>" class="form-control mt-2 mb-2" name="content_second_ru" required/>





                        <input type="file" id="attr_hy" class="form-control mt-2 mb-2" name="img_first" required/>
                        @if(isset($blog->img_first))
                            <img src="/img/blogs/{{$blog->img_first}}" alt="" width="200">
                        @endif
                        <input type="file" id="attr_hy" class="form-control mt-2 mb-2" name="img_second" required/>
                        @if(isset($blog->img_second))
                            <img src="/img/blogs/{{$blog->img_second}}" alt="" width="200">
                        @endif
                        <select name="theme" id="" class="form-control mt-2 mb-2">
                            <option value="0">A</option>
                            <option value="1">B</option>
                        </select>
                        <select name="tags" id=""  class="form-control mt-2 mb-2">
                            <option value="0">A</option>
                            <option value="1">B</option>
                        </select>
                        <input type="text" value="{{$blog->id}}" name="number" hidden>
                        <button class="btn btn-primary" type="submit"> Submit</button>
                    </div>


                </form>


            </div>
        </div>
    </div>
@endsection
