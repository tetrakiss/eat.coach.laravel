@extends('layouts.eat')

@section('content')
<form method="GET" action="{{ url('search') }}">
	<div uk-grid class="uk-grid-small">
<div class="uk-width-expand">
				<div class="uk-margin">
            <input class="uk-input" type="text" name="search" placeholder="Поиск....">
        </div>
			</div>
	<div class="uk-width-auto">
		<div class="uk-margin">
	<button type="submit" class="uk-button uk-button-default">Поиск</button>
	</div>
</div>
</div>
		</form>
		<div uk-grid class="uk-grid-medium">
    <div class="uk-width-1-1">
			<table class="uk-table uk-table-hover uk-table-divider">
			    <thead>
			        <tr>
			            <th>ФИО</th>
			            <th>Email</th>
			            <th>Телефон</th>
			            <th>Skype</th>
									<th>Соц. сети</th>
			            <th>Дата сл контакта</th>
			            <th></th>

			        </tr>
			    </thead>
			    <tbody>
			      @foreach($customers as $customer)
			        <tr>
			            <td><a href="{{action('CustomersController@show', $customer['id'])}}">{{$customer['first_name']}} {{$customer['last_name']}}</a>
										<ul class="uk-list">
											@foreach($customer['children'] as $child)
											<li>{{$child['first_name']}}</li>
											@endforeach
										</ul>

									</td>
			            <td><a href="mailto:{{$customer['email']}}">{{$customer['email']}}</a></td>
			            <td><a href="tel:+{{$customer['phone']}}">{{$customer['phone']}}</a> </td>
			            <td><a href="skype:{{$customer['skype']}}?chat">{{$customer['skype']}}</a></td>
									<td></td>
			            <td>{{ date('d.m.Y',strtotime($customer['next_date']))}}</td>
			            <td><a href="{{action('CustomersController@show', $customer['id'])}}" class="uk-icon-button floatL uk-button-primary" uk-icon="info"></a>
										<a href="{{action('CustomersController@edit', $customer['id'])}}" class="uk-icon-button floatL uk-button-default" uk-icon="pencil"></a>
			               <form action="{{action('CustomersController@destroy', $customer['id'])}}" method="post">
			                 @csrf
			                 <input name="_method" type="hidden" value="DELETE">
			                 <button uk-icon="close" class="uk-icon-button floatL  uk-button-danger" type="submit"></button>
			               </form>
			            </td>
			        </tr>
			        @endforeach

			    </tbody>
			</table>
			</div>
	</div>
@endsection
