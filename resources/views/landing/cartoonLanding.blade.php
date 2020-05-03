@extends('layouts.eat_landing')

@section('content')
<div class="uk-flex-center uk-text-center neoBg" uk-grid>
    <div class="uk-width-1-1 uk-padding-remove-bottom">
        <div class="uk-card-body uk-padding-remove-bottom"><a href="{{URL::to('/')}}">{!! Html::image(asset('images/eat-coach-red-logo.svg'), 'eat.coach', ['class' => 'logo-header-navbar']) !!}</a></div>
    </div>


    <div class="uk-width-1-1 uk-padding-remove-top">
        <div><h2>Мы научим есть вашего ребенка!</h2></div>
    </div>

    <div class="uk-width-1-1 uk-padding-remove-bottom">
        <div class="uk-card-body uk-padding-remove-bottom"><a class="uk-button buttonRed50" href="{{ url('sign_up') }}">Записаться</a></div>
    </div>

    <div class="uk-width-1-1 ">
        <div><img src="{{asset('/images/cry-01.png')}}"></div>
    </div>
    <div class="uk-width-1-1  uk-padding-remove-bottom">
        <div>
          <button class="uk-button buttonRed30" href="">Малоежка</button>
          <button class="uk-button buttonRed30" href="">Избирательное питание</button>
          <button class="uk-button buttonRed30" href="">РАС</button>
          <button class="uk-button buttonRed30" href="">Аутизм</button>
          <button class="uk-button buttonRed30" href="">Запоры</button>
          <button class="uk-button buttonRed30" href="">СДВГ</button>
          <button class="uk-button buttonRed30" href="">Понос</button>
          <button class="uk-button buttonRed30" href="">Синдромальные формы</button>
          <button class="uk-button buttonRed30" href="">ОВЗ</button>
        </div>
    </div>
    <div class="uk-width-1-1 uk-padding-remove-top">
        <div><h2>Как проходит консультация?</h2></div>
    </div>
    <div class="uk-width-lage uk-text-center uk-padding-remove-bottom">
        <div class="uk-card-body uk-padding-remove-top uk-padding-remove-bottom uk-text-left">
          <p>Вы пишете запрос в  <a href="https://wa.me/79150097081">WhatsApp</a></p>
          <p>Или через <a href="{{ url('contacts') }}">форму обратной связи</a></p>
          <p>Мы направляем Вам опросники и вопросы для сбора анамнеза</p>
          <p>Мы согласовываем удобное ⌚ время для проведения консультации онлайн</p>
          <p>После консультации Вы получаете рекомендации</p>
          <p>Начинается совместная работа</p>
          <p>В течение месяца после консультации любые свои вопросы Вы можете направлять в <a href="https://wa.me/79150097081">WhatsApp</a></p>
      </div>
      <div class="uk-card-body  uk-padding-remove-bottom uk-text-center">
        <a class="uk-button buttonRed-red30" href="{{ url('sign_up') }}">Записаться</a>
        <a class="uk-button buttonRed30" href="{{ url('how') }}">Остались вопросы?</a>
      </div>
    </div>
    <div class="uk-width-1-1  uk-padding-remove-bottom">
        <div><img src="{{asset('/images/phone_hand-01.png')}}"></div>
    </div>
    <div class="uk-width-1-1 uk-padding-remove-top uk-padding-remove-bottom marignZero" >
        <div class="uk-card-body uk-padding-remove-bottom uk-padding-remove-top">
          <lottie-player src="{{asset('/images/message_lottie2.json')}}"  background="transparent"  speed="1"  style=" margin: 0 auto; width: 150px; height: 150px;"  loop  autoplay></lottie-player>
        </div>
    </div>
    <div class="uk-width-1-1 uk-padding-remove-bottom ">
        <div>
          <a href="https://wa.me/79150097081" class="uk-icon-button social-button-big uk-margin-small-right neo" uk-icon="icon: whatsapp; ratio: 2"></a>
          <a href="tel:+79150097081" class="uk-icon-button social-button-big uk-margin-small-right neo" uk-icon="icon:  phone; ratio: 2"></a>
          <a href="https://www.facebook.com/eat.coach" class="uk-icon-button social-button-big uk-margin-small-right neo" uk-icon=" icon: facebook; ratio: 2"></a>
          <a href="mailto:v.toguleva@gmail.com" class="uk-icon-button social-button-big uk-margin-small-right neo" uk-icon="icon: mail; ratio: 2"></a>
        </div>
    </div>
    <div class="uk-width-1-1 uk-padding-remove-top">
        <div><h2>Сколько это стоит?</h2></div>
        <div class="desc">Первичная консультация</div>
        <div class="price">4 000 ₽</div>
        <div class="uk-card-body uk-padding-remove-top uk-padding-remove-bottom uk-text-left"><p><b>Что вы получаете за эти деньги</b><br>
          📱 Видео-консультацию в мессенджере длительностью ⌚50-60 минут <br>
           📕Разработка стратегии по расширению рациона и подбор нутриентов<br>

📑 Поддержка изменений в течение месяца в режиме чата <a href="https://wa.me/79150097081">WhatsApp</a></p></div>
    </div>
    <div class="uk-width-1-1 uk-padding-remove-bottom">
        <div class="uk-card-body uk-padding-remove-bottom"><a class="uk-button buttonRed50" href="{{ url('sign_up') }}">Записаться</a></div>
    </div>


    <div class="uk-width-1-1 ">
        <div><img src="{{asset('/images/eat-01.png')}}"></div>
    </div>
    <div class="uk-width-1-1 ">
        <div>&nbsp; </div>
    </div>

      <div class="uk-width-lage uk-text-center uk-padding-remove-bottom">
      <div> <img class="uk-border-circle" width="140" height="140" src="{{asset('/images/avatar-04-04-19.jpg')}}"></div>
        <div class="uk-card-body uk-padding-remove-top uk-padding-remove-bottom uk-text-left">
    <h2>Немного о себе</h2>
    <p>В 2017 году я закончила МГППУ с красным дипломом, и защитила диссертацию на тему <b>"Коррекция избирательного пищевого поведения у детей с РАС"</b>. В процессе написания диссертации я начала консультировать по этим вопросам и продолжаю этим заниматься.</p>

  </div>
  <div class="uk-card-body  uk-padding-remove-bottom uk-text-center">
    <a class="uk-button buttonRed-red30" href="{{ url('story') }}">Моя "история"</a>
    <a class="uk-button buttonRed30" href="{{ url('about') }}">Просто факты</a>
  </div>
</div>
  <div class="uk-width-lage uk-text-center uk-padding-remove-bottom">
  <div class="uk-card-body  uk-padding-remove-bottom uk-text-center">
<h2>🤔 Остались вопросы?</h2>
<p>Просто заполните <a href="{{ url('contacts') }}">форму обратной связи</a> и я 👩‍💻 свяжусь с Вами сама.</p>
<p>Буду рада новым знакомствам!</p>
</div>
</div>
    <div class="uk-width-1-1">
        <div class="uk-card-body uk-padding-remove-top">
<lottie-player src="https://assets3.lottiefiles.com/packages/lf20_Vym9qn.json"  background="transparent"  speed="0.5"  style=" margin: 0 auto; width: 200px; height: 200px;"  loop  autoplay></lottie-player></div>
    </div>



</div>
@endsection

@section('custom_scr')
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@endsection
