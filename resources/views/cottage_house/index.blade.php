@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @foreach($rooms as $room)
            <div class="col-md-8">
                <h1>{{$room->roomTrans->name}}</h1>
                @foreach($room->roomAttr as $k => $attr)


                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="attr{{$room->roomTrans->id}}{{$k}}">
                        <label class="form-check-label" for="attr{{$room->roomTrans->id}}{{$k}}">
                            {{$attr->name}}
                        </label>
                        @if($attr->valueable == 1)
                            <input type="text" name="subattr_{{$attr->id}}">
                            <span>{{$attr->value_name}}</span>
                        @endif
                    </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
@endsection
