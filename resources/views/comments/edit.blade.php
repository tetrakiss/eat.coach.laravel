
@extends('layouts.eat')

@section('content')


<form method="post" action="{{action('CommentsController@update', [$customer_id, $comment->id])}}">

  @csrf
  <input name="_method" type="hidden" value="PATCH">
  <input  type="hidden" name="customer_id" value="{{$customer_id}}">

  <div class="uk-margin">
    {{ Form::select('channel_type', [
    'CRM' => 'CRM',
    'phone' => 'Телефон',
    'skype' => 'Skype',
    'viber' => 'Viber',
    'whatsapp' => 'WhatsApp',
    'facebook' => 'Facebook',
    'vk' => 'VK',

    ], $comment->channel_type, ['class' => 'uk-select']) }}

  </div>
  <div class="uk-margin">
      <textarea class="uk-textarea" name="comment" rows="5" placeholder="Комментарий">{{$comment->comment}}</textarea>
  </div>

          <div class="uk-margin">
        <button type="submit" class="uk-button uk-button-default">Обновить</button>
        </div>
{!! Form::close() !!}
@endsection
