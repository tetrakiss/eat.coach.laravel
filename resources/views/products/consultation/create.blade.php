@extends('layouts.eat_front')

@section('custom_head_scr')
<script src="https://unpkg.com/imask"></script>
@endsection
@section('content')

{!! Form::open(['route'=>['yandex.store']]) !!}

<div class="uk-text-lead">
{{$consultation->title}}
</div>
@if($errors->count())
   @foreach ($errors->all() as $error)
   <div class="uk-alert-danger" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>{{ $error }}</p>
</div>
  @endforeach
@endif
        <input  type="hidden" name="type" value="{{$consultation->id}}">

        <div class="uk-margin">
            <input class="uk-input" type="text" name="first_name" value="{{ old('first_name') }}" placeholder="Имя">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Фамилия">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="email" name="email" value="{{ old('email') }}" placeholder="Email">
        </div>
        <div class="uk-margin">
            <input class="uk-input" id="phone-mask" type="text" name="phone" value="{{ old('phone') }}" placeholder="Телефон">
        </div>
<div class="uk-text-lead">
Всего к оплате:  {{$consultation->price}} ₽
</div>
<div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
            <label><input class="uk-checkbox" name="agree" type="checkbox" checked> <a href="{{url('loyal')}}">Я прочитал и соглашаюсь с условиями оферты</a>  </label>

        </div>

          <div class="uk-margin">
        <button type="submit" class="uk-button uk-button-default">Оплатить</button>
        </div>
{!! Form::close() !!}
@endsection
@section ('custom_scr')
<script>
var phoneMask = new IMask(
  document.getElementById('phone-mask'), {
    mask: '+{7}(000)000-00-00'
  });
</script>
@endsection
