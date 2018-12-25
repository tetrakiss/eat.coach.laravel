
@extends('layouts.eat')

@section('content')
<form  method="post" action="{{url('children')}}" >
        @csrf

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
            <input class="uk-input" type="text" name="comment" placeholder="Комментарии">
        </div>

          <div class="uk-margin">
        <button type="submit" class="uk-button uk-button-default">Добавить</button>
        </div>
</form>
@endsection
