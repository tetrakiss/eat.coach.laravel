<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
@yield('seo_tags')
    <meta name="yandex-verification" content="37713199f6e40b5c" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favico/apple-icon-57x57.png') }}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favico/apple-icon-60x60.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favico/apple-icon-72x72.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favico/apple-icon-76x76.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favico/apple-icon-114x114.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favico/apple-icon-120x120.png') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favico/apple-icon-144x144.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favico/apple-icon-152x152.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favico/apple-icon-180x180.png') }}">
<link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favico/android-icon-192x192.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favico/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favico/favicon-96x96.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favico/favicon-16x16.png') }}">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{ asset('favico/ms-icon-144x144.png') }}">
<meta name="theme-color" content="#ee4037">
<meta name="yandex-verification" content="5c2ef6e4a5190d64" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.25/css/uikit.min.css" />
    <!-- datepicker -->
    <link href="{{ asset('css/datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/datepicker.js') }}"></script>

    <!-- UIkit JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.25/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.25/js/uikit-icons.min.js"></script>

    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-0121715169223686",
          enable_page_level_ads: true
     });
</script>
    <!-- Styles -->
    <link href="{{ asset('css/eat.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
@yield('custom_head_scr')
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '2198920160244878');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=2198920160244878&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Q3KPB9QSFV"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Q3KPB9QSFV');
</script>
</head>
<body>
  <!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v3.2'
    });
  };

  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/ru_RU/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=setup_tool
  page_id="1685848014779114"
  theme_color="#c84033"
  logged_in_greeting="Здравствуйте! Чем Мы можем Вам помочь?"
  logged_out_greeting="Здравствуйте! Чем Мы можем Вам помочь?">
</div>
  <div class="uk-position-relative">

      <nav class="uk-navbar-container white" uk-navbar="dropbar: true; align:center;">

          <div class="padding-left-header-nav uk-navbar-left">

              <ul class="uk-navbar-nav">
                <li>
                    <a style="font-size:20px;" href="#"><i class="fas fa-bars"></i></a>
                    <div class="padding-left-header-nav padding-right-header-nav uk-navbar-dropdown uk-navbar-dropdown-width-5">
                      <div class="uk-navbar-dropdown-grid" uk-grid>
                        <div class="uk-width-expand">
                              <ul class="uk-nav uk-navbar-dropdown-nav">

                                  <li><a href="{{ url('sign_up') }}"><h3>Записаться на консультацию</h3></a></li>
                                  <li><a href="{{ url('how') }}"><h3>Как проходит консультация?</h3></a></li>
                                  <li><a href="{{ route('catalog.consultation') }}"><h3>Оплата</h3></a></li>
                                  <li><a href="{{ route('poll.jkt') }}"><h3>Индекс тяжести ЖКТ</h3></a></li>
                                  <li><a href="{{ url('about') }}"><h3>Обо мне</h3></a></li>
                                  <li><a href="{{ url('testimonials') }}"><h3>Отзывы</h3></a></li>
                                  <li><a href="{{ url('story') }}"><h3>Моя "история"</h3></a></li>
                                  <li><a href="{{route('posts.user.index')}}"><h3>Статьи</h3></a></li>
                                  <li><a href="{{ url('contacts') }}"><h3>Контакты</h3></a></li>

                              </ul>
                          </div>
                          <div class="uk-child-width-auto">
                              <ul class="uk-nav uk-navbar-dropdown-nav">
                                  <!--<li ><a target="_blank" href="https://www.instagram.com/eat.coach/"><i class="fab fa-instagram"></i> @eat.coach</a></li>
                                  <li><a target="_blank" href="https://www.facebook.com/eat.coach/"><i class="fab fa-facebook"></i> @eat.coach</a></li>-->
                                  <li><a href="mailto:v.toguleva@gmail.com"><i class="far fa-envelope"></i> v.toguleva@gmail.com</a></li>
                                  <li><a href=" https://wa.me/79150097081"><i class="fab fa-whatsapp"></i> написать в WhatsApp</a></li>
                                  <li><a href="tel:+79150097081"><i class="fas fa-phone"></i> +7(915) 009 70 81</a></li>
                              </ul>
                          </div>
                          <div class="uk-width-auto uk-visible@l">
                          <a href="{{URL::to('/')}}"> {!! Html::image(asset('images/eat-coach-red-logo-spoon.svg'), 'eat.coach', ['class' => 'logo-navbar-dropbar']) !!}</a>
                          </div>
                      </div>
                  </div>
                </li>
                <li><a href="{{URL::to('/')}}">{!! Html::image(asset('images/eat-coach-red-logo.svg'), 'eat.coach', ['class' => 'logo-header-navbar']) !!}</a></li>


              </ul>

          </div>

          <div class="padding-right-header-nav uk-navbar-right" >

              <ul class="uk-navbar-nav">
                  <li><a href="{{ url('contacts') }}"><span class="uk-badge nav-contact-button">Контакты</span></a></li>

              </ul>

          </div>
      </nav>

      <div class="uk-navbar-dropbar"></div>

  </div>

  <div class="main-container-eat">
      @yield('content')
    </div>
    <div class="uk-grid-collapse uk-child-width-expand@s" style="background:#f8f8f8;" uk-grid>
    <div>
        <div class="uk-align-left uk-background-muted uk-padding">ИП Тогулев Арсений Евгеньевич

ОГРНИП 319774600049851

ИНН 502712853694</div>
    </div>
    <div>
        <div class="uk-align-right uk-background-muted uk-padding">
          <ul class="uk-subnav" uk-margin>
    <li><a href="{{url('loyal')}}">пользовательское соглашение</a></li>
    <li><span>eat.coach © {{date('Y')}}</span></li>
</ul>

          </div>
    </div>

</div>
@yield('custom_scr')
<!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date(); for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }} k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(52006340, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/52006340" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
@auth
    <script src="{{ asset('js/enable-push.js') }}" defer></script>
@endauth

</body>
</html>
