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
                    <form action="/dashboard/rooms/update" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="d-flex pt-3">
                                @if(count($roomTrans) > 1)
                                    @foreach($roomTrans as $room)
                                        <span>{{$room->lang}}</span>
                                        <input type="text" value="{{$room->name}}" name="room_{{$room->lang}}">
                                    @endforeach
                                @else
                                    <span>{{$roomTrans[0]->lang}}</span>
                                    <input type="text" value="{{$roomTrans[0]->name}}"
                                           name="room_{{$roomTrans[0]->lang}}">
                                    <span>En</span>
                                    <input type="text" value="" name="room_en" required>
                                    <span>Ru</span>
                                    <input type="text" value="" name="room_ru" required>
                                @endif

                                <input type="text" name="room_id" value="{{$roomTrans[0]->room_id}}" hidden>
                            </div>
                            <button class="btn btn-primary mt-3" type="submit">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
