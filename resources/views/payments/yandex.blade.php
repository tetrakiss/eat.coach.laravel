@extends('layouts.eat_front'))

@section('seo_tags')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
@endsection
@section('content')
<div uk-grid>
<div class="uk-width-expand@m">
<iframe class="uk-align-center iframe" src="https://money.yandex.ru/fastpay/form/23ea447b187d441790cd1949015892f0" width="500" height="356"style="border: 1px solid #e8e8e8;"></iframe>
</div>
</div>
@endsection
