@extends('layouts.eat_front')
@section('seo_tags')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
@endsection
@section('content')


<div class="uk-grid-match uk-child-width-1-2@m" uk-grid>

  <!--<div>
        <div class="uk-card uk-card-hover  uk-card-default">
          <div class="uk-card-badge uk-label">3000 ₽</div>
          <div class="uk-card-header">
                <h3 class="uk-card-title uk-margin-remove-bottom">Первичная консультация по акции</h3>
            </div>

            <div class="uk-card-body">
              <p><b>Включает в себя:</b></p>
              <ul class="uk-list uk-list-striped">
                  <li>Консультация в Skype длительностью 50-60 минут</li>
                  <li>Сбор анамнеза и обработка анкет</li>
                  <li>Рекомендации по коррекции пищевого поведения (разработка стратегии коррекции)</li>
                  <li><a href="{{ url('how') }}">Как проходит консультация?</a></li>
              </ul>

            </div>
            <div class="uk-card-footer">
                <a href="{{route('yandex.create', ['type' => 3])}}" class="uk-button uk-button-text">Оплатить</a>
            </div>
        </div>
    </div>-->
  <div>
        <div class="uk-card uk-card-hover  uk-card-default">
          <div class="uk-card-badge uk-label">8000 ₽</div>
          <div class="uk-card-header">
                <h3 class="uk-card-title uk-margin-remove-bottom">Первичная консультация</h3>
            </div>

            <div class="uk-card-body">
              <p><b>Включает в себя:</b></p>
              <ul class="uk-list uk-list-striped">
                  <li>Видео консульнация в мессенжере длительностью 50-60 минут</li>
                  <li>Сбор анамнеза и обработка анкет</li>
                  <li>Рекомендации по коррекции пищевого поведения (разработка стратегии коррекции)</li>
                  <li><a href="{{ url('how') }}">Как проходит консультация?</a></li>
              </ul>

            </div>
            <div class="uk-card-footer">
                <a href="{{route('yandex.create', ['type' => 1])}}" class="uk-button uk-button-text">Оплатить</a>
            </div>
        </div>
    </div>
    <div>
      <div class="uk-card uk-card-hover uk-card-default">
        <div class="uk-card-badge uk-label">7000 ₽</div>
        <div class="uk-card-header">
              <h3 class="uk-card-title uk-margin-remove-bottom">Повторная консультация</h3>
          </div>

          <div class="uk-card-body">
            <p><b>Включает в себя:</b></p>
            <ul class="uk-list uk-list-striped">
                <li>Видео консульнация в мессенжере длительностью 50-60 минут</li>
                <li>Уточнение (изменение) стратегии коррекции пищевого поведения</li>
                <li><a href="{{ url('how') }}">Как проходит консультация?</a></li>
            </ul>

          </div>
          <div class="uk-card-footer">
                <a href="{{route('yandex.create', ['type' => 2])}}" class="uk-button uk-button-text">Оплатить</a>
          </div>
      </div>
    </div>
    <div>
      <div class="uk-card uk-card-hover uk-card-default">
        <div class="uk-card-badge uk-label">10000 ₽</div>
        <div class="uk-card-header">
              <h3 class="uk-card-title uk-margin-remove-bottom">Первичная консультация "1+1"</h3>
          </div>
          <div class="uk-card-body">
            <p><b>Включает в себя:</b></p>
            <ul class="uk-list uk-list-striped">
              <li>Консультация для Родителя и ребенка или 2 детей из одной семьи</li>
                <li>Видео консульнация в мессенжере длительностью 90 минут</li>
                <li>Сбор анамнеза и обработка анкет</li>
                <li>Рекомендации по коррекции пищевого поведения (разработка стратегии коррекции)</li>
                <li><a href="{{ url('how') }}">Как проходит консультация?</a></li>
            </ul>

          </div>
          <div class="uk-card-footer">
                <a href="{{route('yandex.create', ['type' => 4])}}" class="uk-button uk-button-text">Оплатить</a>
          </div>
      </div>
    </div>
    <div>
      <div class="uk-card uk-card-hover uk-card-default">
        <div class="uk-card-badge uk-label">9000 ₽</div>
        <div class="uk-card-header">
              <h3 class="uk-card-title uk-margin-remove-bottom">Повторная консультация "1+1"</h3>
          </div>
          <div class="uk-card-body">
            <p><b>Включает в себя:</b></p>
            <ul class="uk-list uk-list-striped">
              <li>Консультация для Родителя и ребенка или 2 детей из одной семьи</li>
                <li>Видео консульнация в мессенжере длительностью 90 минут</li>
                <li>Уточнение (изменение) стратегии коррекции пищевого поведения</li>
                <li><a href="{{ url('how') }}">Как проходит консультация?</a></li>
            </ul>

          </div>
          <div class="uk-card-footer">
                <a href="{{route('yandex.create', ['type' => 5])}}" class="uk-button uk-button-text">Оплатить</a>
          </div>
      </div>
    </div>
</div>

@endsection
