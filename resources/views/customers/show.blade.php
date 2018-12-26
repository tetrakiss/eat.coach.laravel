@extends('layouts.eat')

@section('content')

<div  uk-grid class="uk-grid-medium uk-child-width-expand@s uk-text-center">
  <div>
  <h3>{{$customer->first_name}} {{$customer->last_name}} </h3>
  <div>{{$customer->email}}</div>
  <div>{{$customer->phone}}</div>
  <div>{{$customer->skype}}</div>
  <div>{{$customer->facebook_link}}</div>
  <div>{{$customer->vk_link}}</div>
  <div>{{$customer->next_date}}</div>
  <div>{{$customer->last_date}}</div>
  <div><a href="{{action('CustomersController@edit', $customer['id'])}}" class=" uk-button uk-button-small uk-button-default">Редактировать</a> </div>
  </div>
  <div>
    @foreach($children as $key => $value)
    <div>{{ $value->first_name }} {{ $value->last_name }}</div>
    <div>{{ $value->birthday }}</div>
    <div><a href="{{action('ChildrenController@edit', [$customer['id'], $value->id])}}" class="uk-button uk-button-small uk-button-default">Редактировать</a>
      <form action="{{action('ChildrenController@destroy', [$customer['id'], $value->id])}}" method="post">
        @csrf
        <input name="_method" type="hidden" value="DELETE">
        <button class=" uk-button uk-button-small uk-button-danger" type="submit">Удалить</button>
      </form>

    </div>

     @endforeach
    <div><a href="{{action('ChildrenController@create', $customer['id'])}}" class=" uk-button uk-button-small uk-button-default">Добавить ребенка</a> </div>
  </div>
</div>
<div  uk-grid class="uk-grid-medium uk-child-width-expand@s uk-text-center">
  <div>
  <h3>Назначения</h3>

  <div><a href="{{action('CustomersController@edit', $customer['id'])}}" class=" uk-button uk-button-small uk-button-default">Добавить</a> </div>
  </div>
  <div>
    <h3>Комментарии</h3>
    <div><a href="{{action('CustomersController@edit', $customer['id'])}}" class=" uk-button uk-button-small uk-button-default">Добавить</a> </div>
  </div>
</div>


@endsection
