
@extends('layouts.eat')

@section('content')


<form method="post" action="{{action('ChildrenController@update', [$customer_id, $child->id])}}">

  @csrf
  <input name="_method" type="hidden" value="PATCH">

        <div class="uk-margin">
            <input class="uk-input" type="text" name="first_name" value="{{$child->first_name}}" placeholder="Имя">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="last_name" value="{{$child->last_name}}" placeholder="Фамилия">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="birthday" value="{{$child->birthday}}" placeholder="День рождения">
        </div>
        <div class="uk-margin">
            <textarea class="uk-textarea" name="comment" rows="5"  placeholder="Комментарий">{{$child->comment}}</textarea>
        </div>

          <div class="uk-margin">
        <button type="submit" class="uk-button uk-button-default">Добавить</button>
        </div>
{!! Form::close() !!}
@endsection
