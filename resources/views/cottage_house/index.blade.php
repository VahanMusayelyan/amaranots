@extends('layouts.header')

@section('content')
    <div class="container">
        <div>
            <form action="/cottage-house/create" enctype="multipart/form-data">
                <div class="form-group">
                    <h6 for="name">Ամառանոցի/առանձնատան անվանում</h6>
                    <input class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <h6 for="background">Տեղադրել անհատական էջի հետնանկար</h6>
                    <input class="form-control" type="file" id="background" name="background">
                </div>
                <div class="form-group">
                    <h6 for="main">Տեղադրել անհատական էջի գլխավոր նկար</h6>
                    <input class="form-control" type="file" id="main" name="main">
                </div>
                <div class="form-group">
                    <h5>Ամառանոց/առանձնատունը նախատեսված է </h5>
                    <div class="form-group">
                        <h6 for="with_night">Գիշերակացով</h6>
                        <input class="d-inline-block" type="text" id="with_night" name="with_night" class=""><span> հյուրի համար</span>
                    </div>
                    <div class="form-group">
                        <h6 for="with_nonight">Առանց գիշերակաց</h6>
                        <input class="d-inline-block" type="text" id="with_nonight" name="with_nonight"><span> հյուրի համար</span>
                    </div>
                </div>
                <div class="form-group">
                    <h6 for="main">Որտեղ է գտնվում Ձեր ամառանոցը/առանձնատունը</h6>
                    <select class="form-control" name="state" id="">
                        <option value="1">Երևան</option>
                        <option value="2">Արագածոտն</option>
                        <option value="3">Արարատ</option>
                        <option value="4">Արմավիր</option>
                        <option value="5">Գեղարքունիք</option>
                        <option value="6">Կոտայք</option>
                        <option value="7">Լոռի</option>
                        <option value="8">Շիրակ</option>
                        <option value="9">Սյունիք</option>
                        <option value="10">Տավուշ</option>
                        <option value="11">Վայոց ձոր</option>
                    </select>
                    <label for="city">City</label>
                    <input type="text" class="form-control" name="city" id="city">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="address">
                </div>
                <div class="form-group">
                    <h6 for="main">Տան վերաբերյալ</h6>
                    <span>Հյուրասենյակ </span><input class="form-control" name="livingroom" type="file" multiple>
                    <span>Խոհանոց </span><input class="form-control" name="kitchen[]" type="file" multiple>
                    <span>Ննջարան </span><input class="form-control" name="bedroom[]" type="file" multiple>
                    <span>Սանհանգույց </span><input class="form-control" name="rest_room[]" type="file" multiple>
                </div>

                @foreach($rooms as $room)
                    <div class="col-md-8 mb-4">
                        <h4>{{$room->roomTrans->name}}</h4>
                        @foreach($room->roomAttr as $k => $attr)


                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                       id="attr{{$room->roomTrans->id}}{{$k}}">
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


                @foreach($otherAttr as $k => $other)
                    <div class="col-md-8 mb-4">
                        <h4>{{$other->name}}</h4>
                        @foreach($other->otherAttrSub as $m => $otherAttr)

                            @if($otherAttr->type == "checkbox")
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="" value=""
                                           id="other_{{$m}}_{{$k}}">
                                    <label class="form-check-label" for="other{{$m}}_{{$k}}">
                                        {{$otherAttr->name}}
                                    </label>
                                </div>
                            @else
                                <div class="form-check">
                                    @if($otherAttr->yes_no == 1)
                                        <p>{{$otherAttr->name}}</p>
                                        <div class="form-group">
                                        <input class="form-check-input" type="radio" name="other_{{$m}}_{{$k}}" value="1"
                                               id="other_{{$m}}_{{$k}}_1">
                                        <label class="form-check-label" for="other_{{$m}}_{{$k}}_1">
                                            Այո
                                        </label>
                                        </div>
                                        <div class="form-group">
                                        <input class="form-check-input" type="radio" name="other_{{$m}}_{{$k}}" value="0"
                                               id="other_{{$m}}_{{$k}}_0">
                                        <label class="form-check-label" for="other_{{$m}}_{{$k}}_0">
                                            Ոչ
                                        </label>
                                        </div>
                                    @else
                                        <input class="form-check-input" type="radio" name="other_{{$k}}" value="1"
                                               id="other_{{$m}}_{{$k}}">
                                        <label class="form-check-label" for="other_{{$m}}_{{$k}}">
                                            {{$otherAttr->name}}
                                        </label>
                                    @endif



                                </div>
                            @endif


                        @endforeach
                    </div>
                @endforeach
                <div class="form-group">
                    <span>Հյուրերին ընդունում ենք  ժամը </span><input class="d-inline-block" type="time"> -ից մինչև
                    <input type="time"> -ը
                    <br>
                    <br>
                    <span>Հյուրերին ճանապարհում ենք  ժամը  </span><input class="d-inline-block" type="time"> -ից մինչև
                    <input type="time"> -ը
                </div>
                <div class="form-group">
                    <h6>Տրամադրում ենք նաև</h6>
                    <label for="cutsom_attr">Անվանում</label>
                    <input type="text" class="form-control" name="cutsom_attr" id="cutsom_attr">
                    <label for="cutsom_note">Նշումներ</label>
                    <input type="text" class="form-control" name="cutsom_note" id="cutsom_note">
                </div>
                <div class="form-group">
                    <h6>Լրացուցիչ վճարվող</h6>
                    <label for="cutsom_attr_paid">Անվանում</label>
                    <input type="text" class="form-control" name="cutsom_attr" id="cutsom_attr_paid">
                    <label for="cutsom_price_paid">Նշումներ</label>
                    <input type="text" class="form-control" name="cutsom_price_paid" id="cutsom_price_paid">
                    <label for="cutsom_note_paid">Նշումներ</label>
                    <input type="text" class="form-control" name="cutsom_note" id="cutsom_note_paid">
                </div>

                <div class="form-group">
                    <h6>Մոտակայքում են</h6>
                    <label for="cutsom_attr_paid">Նշված վայրի լուսանկար</label>
                    <input type="file" class="form-control" name="cutsom_attr" id="cutsom_attr_paid">
                    <label for="cutsom_price_paid">Հեռավորություն, կմ</label>
                    <input type="text" class="form-control" name="cutsom_price_paid" id="cutsom_price_paid">
                </div>
                <div class="form-group">
                    <h6>Արժեքը մեկ օրվա համար</h6>
                    <label for="working_without_night">երկ - հինգ : առանց գիշերակաց</label>
                    <input type="text" class="form-control" name="working_without_night" id="working_without_night">
                    <label for="working_with_night">երկ - հինգ : գիշերակաց</label>
                    <input type="text" class="form-control" name="working_with_night" id="working_with_night">
                    <label for="weekend_without_night">ուրբ - կիր : առանց գիշերակաց</label>
                    <input type="text" class="form-control" name="weekend_without_night" id="weekend_without_night">
                    <label for="weekend_with_night">ուրբ - կիր : գիշերակաց</label>
                    <input type="text" class="form-control" name="weekend_with_night" id="weekend_with_night">

                    Զեղչեր 2 և ավելի օրերի դեպքում
                    <label for="sale_yes">Այո</label>
                    <input type="radio" id="sale_yes" value="1" name="choose_sale">
                    <label for="sale_no">Ոչ</label>
                    <input type="radio" id="sale_no" value="0" name="choose_sale">
                </div>
                <div class="form-group">
                    <h6>կոնտակտներ</h6>
                    <input type="text" class="form-control" placeholder="tel" name="tel" id="tel">
                    <input type="text" class="form-control" placeholder="watsapp" name="watsapp" id="watsapp">
                    <input type="text" class="form-control" placeholder="viber" name="viber" id="viber">
                    <input type="text" class="form-control" placeholder="email" name="email" id="email">
                    <input type="text" class="form-control" placeholder="web" name="web" id="web">
                </div>

                <button class="btn btn-primary" type="submit">Save</button>
            </form>
        </div>
    </div>
@endsection
