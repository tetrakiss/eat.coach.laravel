@extends('layouts.eat_front')
@section('seo_tags')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
@endsection
@section('content')


<div class="uk-grid-match uk-child-width-1-2@m" uk-grid>

  <div>
        <div class="uk-card uk-card-hover  uk-card-default">
          <div class="uk-card-badge uk-label">4000 ₽</div>
          <div class="uk-card-header">
                <h3 class="uk-card-title uk-margin-remove-bottom">Первичная консультация</h3>
            </div>

            <div class="uk-card-body">
              <p><b>Включает в себя:</b></p>
              <ul class="uk-list uk-list-striped">
                  <li>Консультация в Skype длительностью 50-60 минут</li>
                  <li>Сбор анамнеза и обработка анкет</li>
                  <li>Рекомендации по коррекции пищевого поведения (разработка стратегии коррекции)</li>
              </ul>

            </div>
            <div class="uk-card-footer">
                <a href="{{route('yandex.create', ['type' => 1])}}" class="uk-button uk-button-text">Оплатить</a>
            </div>
        </div>
    </div>
    <div>
      <div class="uk-card uk-card-hover uk-card-default">
        <div class="uk-card-badge uk-label">3500 ₽</div>
        <div class="uk-card-header">
              <h3 class="uk-card-title uk-margin-remove-bottom">Повторная консультация</h3>
          </div>

          <div class="uk-card-body">
            <p><b>Включает в себя:</b></p>
            <ul class="uk-list uk-list-striped">
                <li>Консультация в Skype длительностью 50-60 минут</li>
                <li>Уточнение (изменение) стратегии коррекции пищевого поведения</li>
            </ul>

          </div>
          <div class="uk-card-footer">
                <a href="{{route('yandex.create', ['type' => 2])}}" class="uk-button uk-button-text">Оплатить</a>
          </div>
      </div>
    </div>
</div>

@endsection
