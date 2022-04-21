@extends('layouts.eat_front')

@section('content')
<div  uk-grid >
      <div class="uk-align-center uk-width-xlarge">
        @if (count($errors) > 0)

      @foreach ($errors->all() as $error)
        <div class="uk-alert-danger" uk-alert>
          <a class="uk-alert-close" uk-close></a>
          <p>{{ $error }}</p>
        </div>
      @endforeach
            @endif

      <h1>👋 Привет, меня зовут <a href="https://www.facebook.com/valentina.toguleva" target="_blank">Валентина</a>, Вы можете связаться со мной любым удобным способом указанным ниже</h1>
      <div style="display: flex;align-items: center;justify-content: center;">
      <!--<a class="contact-icon" target="_blank" href="https://www.instagram.com/eat.coach/"><i class="fab fa-instagram"></i></a>
      <a class="contact-icon" target="_blank" href="https://www.facebook.com/eat.coach/"><i class="fab fa-facebook"></i></a>-->
      <a class="contact-icon" href="mailto:v.toguleva@gmail.com"><i class="far fa-envelope"></i></a>
      <a class="contact-icon" href=" https://wa.me/79150097081"><i class="fab fa-whatsapp"></i></a>
      <a class="contact-icon" href="tel:+79150097081"><i class="fas fa-phone"></i></a>
    </div>
       <h3 class="uk-text-muted"> либо просто заполните форму обратной связи и я свяжусь с Вами сама.</h3>
      <div>

        <form method="post" action="{{action('ContactController@contactForm')}}">
          @csrf
    <fieldset class="uk-fieldset">

        <div class="uk-margin">
            <input class="uk-input uk-form-large" type="text" name="name" placeholder="Как Вас зовут?">
        </div>
        <div class="uk-margin">
            <input class="uk-input uk-form-large" type="email" name="email" placeholder="Ваш email">
        </div>
        <div class="uk-margin">
            <input class="uk-input uk-form-large" type="text" name="phone" placeholder="Ваш телефон">
        </div>
        <div class="uk-margin">
            <textarea class="uk-textarea uk-form-large"  name="customerMessage" rows="5" placeholder="Textarea">Здесь вы можете описать, зачем Вам нужна консультация. Или оставьте это поле пустым.</textarea>
        </div>
        <div class="uk-margin">
          <div class="g-recaptcha"
             data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
           </div>
        </div>
        <div class="uk-margin">
      <button type="submit" class="uk-button uk-button-default">Отправить</button>
      </div>



    </fieldset>
</form>
      </div>
    </div>

</div>

@endsection
