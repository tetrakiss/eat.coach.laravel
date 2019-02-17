@extends('layouts.eat_front')

@section('content')

{!! Form::open(['route'=>['yandex.store']]) !!}

<div class="uk-text-lead">
{{$consultation->title}}
</div>
        <input  type="hidden" name="type" value="{{$consultation->id}}">

        <div class="uk-margin">
            <input class="uk-input" type="text" name="first_name" placeholder="Имя">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="last_name" placeholder="Фамилия">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="email" name="email" placeholder="Email">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="phone" placeholder="Телефон">
        </div>
<div class="uk-text-lead">
Всего к оплате:  {{$consultation->price}} ₽
</div>

          <div class="uk-margin">
        <button type="submit" class="uk-button uk-button-default">Оплатить</button>
        </div>
{!! Form::close() !!}
@endsection
