@extends('layouts.eat_front')

@section('content')
<div  uk-grid >

    <div class="text-common uk-align-center uk-width-xxlarge">
      <h1>Отзывы</h1>
      <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="autoplay: true">

  <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-1@m uk-grid">
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/1.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/2.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/3.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/4.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/5.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/6.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/7.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/8.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/9.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/10.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/11.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/12.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/13.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/14.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/15.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/16.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/17.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/18.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/19.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/20.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/21.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/22.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/23.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/24.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/25.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/26.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/27.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/28.jpg')}}" alt="">
          </div>
      </li>
      <li>
          <div class="uk-panel">
              <img src="{{asset('/images/testimonials/30.jpg')}}" alt="">
          </div>
      </li>
    </li>


  </ul>

  <a style="color:#FFF!important;" class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
  <a style="color:#FFF!important;" class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

</div>
<h2><a href="{{ url('sign_up') }}">Записаться на консультацию</a></h2>

    </div>
</div>
@endsection
