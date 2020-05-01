@extends('layouts.eat_landing')
@section('seo_tags')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
@endsection
@section('content')
<div class="uk-section-default uk-section uk-padding-remove-vertical">
  <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid="">
    <div class="uk-flex-auto uk-width-1-1@m uk-first-column">


      <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: push">

          <ul class="uk-slideshow-items">
              <li>
                  <img src="{{asset('/images/landing/eat.coah-p1.jpg')}}" alt="" uk-cover>
                  <div class="uk-position-center-left uk-position-large uk-text-left lnd-carusel-title">
                      <h2 uk-slideshow-parallax="x: 100,-100">Я знаю как помочь Вашему ребенку</h2>
                      <p uk-slideshow-parallax="x: 200,-200">Нутрициолог, Дефектолог, Коуч по питанию и поддержке изменений РАС, аутизм, СДВГ, Синдромальные формы, ОВЗ</p>
                  </div>
              </li>
              <li>
                  <img src="{{asset('/images/landing/eat.coah-p1.jpg')}}" alt="" uk-cover>
                  <div class="uk-position-center-right uk-position-large uk-text-right">
                      <h2 uk-slideshow-parallax="x: 100,-100">Heading</h2>
                      <p uk-slideshow-parallax="x: 150,-150">Lorem ipsum dolor sit amet.</p>
                  </div>
              </li>
              <li>
                  <img src="{{asset('/images/landing/eat.coah-p1.jpg')}}" alt="" uk-cover>
                  <div class="uk-position-center-right uk-position-large uk-text-right">
                      <h2 uk-slideshow-parallax="y: -50,0,0; opacity: 1,1,0">Heading</h2>
                      <p uk-slideshow-parallax="y: 50,0,0; opacity: 1,1,0">Lorem ipsum dolor sit amet.</p>
                  </div>
              </li>
          </ul>

          <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
          <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

      </div>



    </div>
  </div>
</div>



@endsection
