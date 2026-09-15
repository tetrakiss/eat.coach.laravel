@extends('layouts.eat_simple')

@section('content')
<div class="uk-flex-center uk-text-center neoBg" uk-grid>
    <div class="uk-width-1-1 ">
        <div class="uk-card-body uk-padding-remove-bottom"><a href="{{URL::to('/')}}">{!! Html::image(asset('images/eat-coach-red-logo-ru.svg'), 'eat.coach', ['class' => 'logo-header-navbar']) !!}</a></div>
    </div>
    <div class="uk-width-1-1 ">
        <div> <img class="uk-border-circle" width="140" height="140" src="{{asset('/images/avatar-04-04-19.jpg')}}"></div>
    </div>
    <div class="uk-width-medium uk-text-center uk-padding-remove-bottom">
        <div class="uk-card-body uk-padding-remove-top uk-padding-remove-bottom uk-text-left">     <b>Нутрициолог</b><br>
          Валентина Тогулева<br>
        Коррекция пищевого поведения 🥦🥥🥑<br>
        Дефектолог👩‍🏫<br>
        Нутрициолог🍎🍉🍅<br>
        Коуч по питанию<br>
        Консультации детей и взрослых<br>
        Аутизм, ОВЗ, малоежки<br><br>
        <b><a href="https://eat.coach">EAT.COACH</a></b>
      </div>
    </div>
    <div  class="uk-width-1-1 ">
        <a  href="{{ route('catalog.consultation') }}" class="uk-button round-button-link round-button uk-button-large"><span class="uk-badge button-red">Оплата консультации</span></a>

          </div>

    <div class="uk-width-1-1 uk-padding-remove-bottom ">
        <div>
          <a class="contact-icon max-icon" href="https://max.ru/u/f9LHodD0cOISmpsGu6GP4VyYBCMe6pS4hjUhrJavY7Ld735AwvwI4yQDxlI"><img src="https://maxicons.ru/icons/MAX.svg" alt="Иконка MAX" width="32" height="32"></a>
          <a href="tel:+79150097081" class="uk-icon-button social-button-big uk-margin-small-right neo" uk-icon="icon:  phone; ratio: 2"></a>
        <!--  <a href="https://www.facebook.com/eat.coach" class="uk-icon-button social-button-big uk-margin-small-right neo" uk-icon=" icon: facebook; ratio: 2"></a>-->

          <a href="mailto:v.toguleva@gmail.com" class="uk-icon-button social-button-big uk-margin-small-right neo" uk-icon="icon: mail; ratio: 2"></a>
          <!-- <a href="https://www.youtube.com/channel/UCsAPHU89wNvUs_SqpzzoqXg" class="uk-icon-button social-button-big uk-margin-small-right neo" uk-icon="icon: youtube; ratio: 2"></a>-->

        </div>

    </div>
    <div class="uk-width-1-1 uk-padding-remove-top uk-padding-remove-bottom marignZero" >
        <div class="uk-card-body uk-padding-remove-bottom uk-padding-remove-top">
          <lottie-player src="{{asset('/images/message_lottie2.json')}}"  background="transparent"  speed="1"  style=" margin: 0 auto; width: 150px; height: 150px;"  loop  autoplay></lottie-player>
        </div>
    </div>

    <div  class="uk-width-1-1 ">
        <a  href="{{ route('landing.me') }}" class="uk-button round-button-link round-button "><span class="uk-badge button-red">Интенсив "Ребенок не жует. Что делать?"</span></a>
    </div>
    <div  class="uk-width-1-1 ">
        <a  href="{{URL::to('/')}}" class="uk-button round-button-link round-button "><span class="uk-badge button-red">Почитать мои статьи</span></a>
    </div>


    <div class="uk-width-medium marignZero">
        <div class="uk-card-body  marignZero uk-padding-remove-bottom   uk-text-left" >
    <h3>Немного о себе, для тех, кто меня совсем не знает:</h3>
    <p>В 2017 году я закончила МГППУ с красным дипломом, и защитила диссертацию на тему "Коррекция избирательного пищевого поведения у детей с РАС". В процессе написания диссертации я начала консультировать по этим вопросам и продолжаю этим заниматься.</p>
    <p>Первое высшее у меня - РХТУ им. Менделеева (Нанотехнологии), которое безусловно помогло мне разобраться в этой деятельности.</p>
    <p>За то время, что я интересуюсь данной темой я прошла как дефектологическое обучение - АВА, вводный курс DIRFloortime, Запуск речи у не говорящих детей, так и узкоспециализированные курсы <br><br> <b>Детское питание и приготовление пищи (Stanford University),<br> Питание в современном мире (Stanford University),<br> Построение индивидуального плана коррекции пищевого поведения (Case Western Reserve University),<br> Питание и образ жизни во время беременности (Ludwig-Maximilians-Universität München (LMU))</b><br> и еще немного паразитологии, физиологии, нейробиологии))) </p>
  <!--    <h3>🤔 Остались вопросы?</h3>
    <p>Просто заполните <a href="{{ url('contacts') }}">форму обратной связи</a> и я 👩‍💻 свяжусь с Вами сама.</p>-->
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
