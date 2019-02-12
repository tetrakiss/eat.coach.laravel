@extends('layouts.eat_front'))

@section('seo_tags')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
@endsection
@section('content')
<iframe class="iframe" src="https://money.yandex.ru/fastpay/form/af4741d15f7a4c07867c2ed20465325a" width="500" height="306"style="border: 1px solid #e8e8e8;"></iframe>


@endsection
