@extends('admin.layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul>
                    <li><a href="/dashboard/attributes">Attributes</a></li>
                    <li><a href="/dashboard/other-attributes">Other Attributes</a></li>
                    <li><a href="/dashboard/rooms">Rooms</a></li>

                </ul>
                <form action="/dashboard/attribute/add" method="POST">
                    @csrf
                    <div class="p-5">
                        <form action=""></form>
                        <label for="attr_hy">Hy</label>
                        <input id="attr_hy" class="form-group" name="attr_hy" required/>
                        <select name="room_id" id="">
                            @foreach($roomTrans as $room)
                                <option value="{{$room->room_id}}">{{$room->name}}</option>
                            @endforeach
                        </select>

                        <select name="valueable" id="">
                            <option value="0">Արժեք առկա Չէ</option>
                            <option value="1">Արժեք առկա է</option>
                        </select>
                        <button class="btn btn-primary" type="submit"> Submit</button>
                    </div>


                </form>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">En</th>
                        <th scope="col">Hy</th>
                        <th scope="col">Ru</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $j = 1;
                    @endphp
                    @foreach($attrsHy as $k => $attr )
                        <tr>
                            <td>{{$j++}}</td>
                            <td>
                                <?=(isset($attrsEn[$k])) ? $attrsEn[$k]->name : "" ?>
                            </td>
                            <td>
                                {{$attr->name}}
                            </td>
                            <td>
                                <?=(isset($attrsRu[$k])) ? $attrsEn[$k]->name : "" ?>
                            </td>
                            <td>
                                <a href="{{route("admin.attr.edit", $attr->attr_id)}}">Edit</a>
                                <a href="{{route("admin.attr.delete", $attr->attr_id)}}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
