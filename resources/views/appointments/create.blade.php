
@extends('layouts.eat')

@section('content')

{!! Form::open(['route'=>['customers.appointments.store', $customer->id]]) !!}


        <input  type="hidden" name="customer_id" value="{{$customer->id}}">
        <div class="uk-margin">
            <select name="children_id" class="uk-select">
              @foreach ($customer->children as $children)
                <option value="{{$children->id}}" >{{$children->first_name}}</option>
              @endforeach
            </select>
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="med" placeholder="Название препарата">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="med_link" placeholder="Ссылка">
        </div>
        <div class="uk-margin">
            <textarea class="uk-textarea" name="medication" rows="5" placeholder="Дозировка"></textarea>
        </div>
          <div class="uk-margin">
        <button type="submit" class="uk-button uk-button-default">Добавить</button>
        </div>
{!! Form::close() !!}
@endsection
