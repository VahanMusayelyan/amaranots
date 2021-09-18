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

                <div class="p-5">
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
                        @foreach($roomsHy as $k => $room )
                                        <tr>
                                            <td>{{$j++}}</td>
                                                    <td>
                                                        <?=(isset($roomsEn[$k])) ? $roomsEn[$k]->name_trans : "" ?>
                                                    </td>
                                                    <td>
                                                        {{$room->name_trans}}
                                                    </td>
                                                    <td>
                                                        <?=(isset($roomsRu[$k])) ? $roomsEn[$k]->name_trans : "" ?>
                                                    </td>
                                        <td>
                                            <a href="{{route("admin.room.edit", $room->room_id)}}">Edit</a>
{{--                                            <a href="{{route("admin.room.delete", $room->room_id)}}">Delete</a>--}}
                                        </td>
                                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
