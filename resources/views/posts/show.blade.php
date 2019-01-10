
@extends(Auth::user() ? 'layouts.eat' : 'layouts.eat_front')
@section('seo_tags')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
@endsection

@section('content')
<div class="cover-adoptation-eat uk-cover-container">

    <canvas class="uk-dark" width="100%" height="400"></canvas>
    <div style="z-index:1200;" class=" uk-position-center"><h1 style="color:white!important;">{{$post->title}}</h1></div>
    {!! Html::image($post->title_image ,'post-cover', ['uk-cover', 'class'=>'uk-dark'] ) !!}
</div>
<div uk-grid>

        <div class="text-common uk-align-center uk-width-xxlarge">
          {!! html_entity_decode(htmlspecialchars_decode($post->body, ENT_QUOTES | ENT_IGNORE), ENT_QUOTES | ENT_IGNORE, "UTF-8") !!}</p>

      </div>



</div>

@endsection
