
@extends(Auth::user() ? 'layouts.eat' : 'layouts.eat_front')
@section('seo_tags')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
@endsection

@section('content')
<div class="cover-adoptation-eat uk-cover-container">

    <canvas class="uk-dark" width="100%" height="400"></canvas>
    <div style="z-index:1200;" class=" uk-position-center"><h1 style="color:white!important;">{{$post->title}}</h1></div>
    {!! Html::image( asset('uploads/posts/large_photos/'.$post->title_image) ,'post-cover', ['uk-cover', 'class'=>'uk-dark'] ) !!}
</div>
<div uk-grid>

        <div class="text-common uk-align-center uk-width-xxlarge">
          {!! html_entity_decode(htmlspecialchars_decode($post->body, ENT_QUOTES | ENT_IGNORE), ENT_QUOTES | ENT_IGNORE, "UTF-8") !!}</p>

      </div>
  <div class="text-common uk-align-center uk-width-xxlarge">
      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <!-- Реклама в статье -->
      <ins class="adsbygoogle"
           style="display:block"
           data-ad-client="ca-pub-0121715169223686"
           data-ad-slot="3066550575"
           data-ad-format="auto"
           data-full-width-responsive="true"></ins>
      <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
  </div>
</div>

@endsection
