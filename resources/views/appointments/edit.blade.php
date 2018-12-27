@extends('layouts.eat')

@section('content')


<form method="post" action="{{action('AppointmentsController@update', [$customer_id, $appointment->id])}}">

  @csrf
  <input name="_method" type="hidden" value="PATCH">
  <input  type="hidden" name="customer_id" value="{{$customer_id}}">

  <div class="uk-margin">
      <input class="uk-input" type="text" name="med" value="{{$appointment->med}}" placeholder="Название препарата">
  </div>
  <div class="uk-margin">
      <input class="uk-input" type="text" name="med_link" value="{{$appointment->med_link}}" placeholder="Ссылка">
  </div>
  <div class="uk-margin">
      <textarea class="uk-textarea" name="medication" rows="5" placeholder="Дозировка">{{$appointment->medication}}</textarea>
  </div>


          <div class="uk-margin">
        <button type="submit" class="uk-button uk-button-default">Обновить</button>
        </div>
{!! Form::close() !!}
@endsection
