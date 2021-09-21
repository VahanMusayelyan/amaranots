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
                <div class="p-5">
                    <form action="/dashboard/attribute/update" method="POST">
                        @csrf
                        <div class="form-group">
                            <select name="parent_id" id="">
                                <option value=""></option>
                                @foreach($parents as $parent)
                                    <option value="{{$parent->id}}" <?=($attr[0]->parent_id == $parent->id) ? "selected" : ""; ?> >{{$parent->name}}</option>
                                @endforeach
                            </select>
                            <div class="d-flex pt-3">
                                @if(count($attr) > 1)
                                    @foreach($attr as $item)
                                        <span>{{$item->lang}}</span>
                                        <input type="text" value="{{$item->name}}" name="attr_{{$item->lang}}">
                                    @endforeach
                                @else
                                    <span>{{$attr[0]->lang}}</span>
                                    <input type="text" value="{{$attr[0]->name}}"
                                           name="attr_{{$attr[0]->lang}}">
                                    <span>En</span>
                                    <input type="text" value="" name="attr_en" required>
                                    <span>Ru</span>
                                    <input type="text" value="" name="attr_ru" required>
                                @endif

                                <input type="text" name="attr_id" value="{{$attr[0]->attr_cat_id}}" hidden>
                            </div>
                            <button class="btn btn-primary mt-3" type="submit">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
