@extends('layouts.eat')

@section('content')
<form method="GET" action="{{ url('search') }}">
			<div  uk-grid class="uk-grid-medium uk-child-width-expand@s uk-text-center">
        <div class="uk-margin">
            <input class="uk-input" type="text" name="search" placeholder="Поиск....">
        </div>
        <div class="uk-margin">
      <button type="submit" class="uk-button uk-button-default">Поиск</button>
      </div>
			</div>
		</form>
<table class="uk-table uk-table-hover uk-table-divider">
    <thead>
        <tr>
            <th>ФИО</th>
            <th>Email</th>
            <th>Телефон</th>
            <th>Skype</th>
            <th>Дата сл контакта</th>
            <th></th>

        </tr>
    </thead>
    <tbody>
      @foreach($customers as $customer)
        <tr>
            <td><a href="{{action('CustomersController@show', $customer['id'])}}">{{$customer['first_name']}} {{$customer['last_name']}}</a></td>
            <td>{{$customer['email']}}</td>
            <td>{{$customer['phone']}}</td>
            <td>{{$customer['skype']}}</td>
            <td>{{$customer['next_date']}}</td>
            <td><a href="{{action('CustomersController@edit', $customer['id'])}}" class="floatL uk-button uk-button-small uk-button-default">Редактировать</a>
               <form action="{{action('CustomersController@destroy', $customer['id'])}}" method="post">
                 @csrf
                 <input name="_method" type="hidden" value="DELETE">
                 <button class="floatL uk-button uk-button-small uk-button-danger" type="submit">Удалить</button>
               </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection
