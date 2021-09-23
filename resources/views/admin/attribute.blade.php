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
                <form action="/dashboard/attribute/add" method="POST">
                    @csrf
                    <div class="p-5">
                        <form action=""></form>
                        <label for="attr_hy">Hy</label>
                        <input id="attr_hy" class="form-control" name="attr_hy" required/>
                        <select name="room_id" id="">
                            @foreach($rooms as $room)
                                <option value="{{$room->id}}">{{$room->name}}</option>
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
                        <th scope="col">Room</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $j = 1;
                    @endphp
                    @foreach($rooms as $k => $room )
                        @foreach($room->roomAttr as $attr)
                            <tr>
                                <td>{{$j++}}</td>
                                @foreach($attr->allAttrTrans as $m => $attrTrans)
                                    @if(count($attr->allAttrTrans) == 1)
                                        <td>

                                        </td>
                                        <td>
                                            {{$attrTrans->name}}
                                        </td>
                                        <td>

                                        </td>
                                    @else
                                        <td>
                                            {{$attrTrans->name}}
                                        </td>
                                    @endif

                                @php($attrId = $attrTrans->attr_id)
                                @endforeach
                                <td>
                                    {{$room->name}}
                                </td>
                                <td>
                                    <a href="{{route("admin.attr.edit", $attrId)}}">Edit</a>
                                    <a href="{{route("admin.attr.delete", $attrId)}}">Delete</a>
                                </td>

                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
