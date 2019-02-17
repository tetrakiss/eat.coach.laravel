@extends('layouts.eat_front')

@section('content')
<div  uk-grid >

    <div class="text-common uk-align-center uk-width-xlarge">
      <h1>😰🏼 Что то пошло не так!</h1>
      <p> Мы пытались получить Вашу 💳 оплату, но Яндекс не подвердил её  и вернул статус {{$fail}}, попробуйте произвести оплату еще раз через несколько минут, либо <a href="{{ url('contacts') }}">напишите</a> Нам, мы поможем Вам разобраться!</p>

    </div>
</div>
@endsection
