
@extends('layouts.eat')

@section('content')

{!! Form::open(['route'=>['customers.children.store', $customer->id]]) !!}


        <input  type="hidden" name="customer_id" value="{{$customer->id}}">

        <div class="uk-margin">
            <input class="uk-input" type="text" name="first_name" placeholder="Имя">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="last_name" placeholder="Фамилия">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="birthday" placeholder="День рождения">
        </div>
        <div class="uk-margin">
            <textarea class="uk-textarea" name="comment" rows="5" placeholder="Комментарий"></textarea>
        </div>


          <div class="uk-margin">
        <button type="submit" class="uk-button uk-button-default">Добавить</button>
        </div>
{!! Form::close() !!}
@endsection
