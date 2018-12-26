
@extends('layouts.eat')

@section('content')
<form method="post" action="{{action('CustomersController@update', $id)}}">

        @csrf
        <input name="_method" type="hidden" value="PATCH">

        <div class="uk-margin">
            <input class="uk-input" type="text" name="first_name" value="{{$customer->first_name}}" placeholder="Имя">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="last_name" value="{{$customer->last_name}}" placeholder="Фамилия">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="email"  value="{{$customer->email}}" placeholder="Email">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="phone" value="{{$customer->phone}}" placeholder="Телефон">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="skype" value="{{$customer->skype}}" placeholder="Skype">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="facebook_link" value="{{$customer->facebook_link}}" placeholder="Фейсбук">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="vk_link" value="{{$customer->vk_link}}" placeholder="Вконтакте">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="next_date" value="{{$customer->next_date}}" placeholder="Дата сл контакта">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="last_date" value="{{$customer->last_date}}" placeholder="Дата последнего контакта">
        </div>
          <div class="uk-margin">
        <button type="submit" class="uk-button uk-button-default">Обновить</button>
        </div>
</form>
@endsection
