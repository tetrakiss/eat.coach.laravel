@extends('layouts.eat_front')

@section('content')
<div  uk-grid >

    <div class="text-common uk-align-center uk-width-xlarge">
      <h1>😰🏼 Что то пошло не так!</h1>
      <p> Мы пытались получить Вашу оплату по 💳, но Яндекс не подвердил её  и вернул статус {{$fail}}, попробуйте произвести оплату еще раз через несколько минут, либо <a href="{{ url('contacts') }}">напишите</a> Нам, мы поможем Вам разобраться!</p>
      <p><a class="contact-icon max-icon" href="https://max.ru/u/f9LHodD0cOISmpsGu6GP4VyYBCMe6pS4hjUhrJavY7Ld735AwvwI4yQDxlI"><img src="https://maxicons.ru/icons/MAX.svg" alt="Иконка MAX" width="32" height="32"></a></p>
    </div>
</div>
@endsection
