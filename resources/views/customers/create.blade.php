
@extends('layouts.eat')

@section('content')
{!! Form::open(['route'=>['customers.store']]) !!}

        <div class="uk-margin">
            <input class="uk-input" type="text" name="first_name" placeholder="Имя">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="last_name" placeholder="Фамилия">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="email" placeholder="Email">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="phone" placeholder="Телефон">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="skype" placeholder="Skype">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="facebook_link" placeholder="Фейсбук">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="vk_link" placeholder="Вконтакте">
        </div>
        <div class="uk-margin">
            <input class="datepicker-here uk-input" data-position="bottom left" type="text" name="next_date" placeholder="Дата сл контакта">
        </div>
        <div class="uk-margin">
            <input class="datepicker-here uk-input"  data-position="bottom left" type="text" name="last_date" placeholder="Дата последнего контакта">
        </div>
          <div class="uk-margin">
        <button type="submit" class="uk-button uk-button-default">Создать</button>
        </div>
</form>
@endsection
