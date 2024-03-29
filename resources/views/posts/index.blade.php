
@extends(Auth::user() ? 'layouts.eat' : 'layouts.eat_front')
@section('seo_tags')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
@endsection
@section('content')

<div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
    <div class="uk-card-media-left uk-cover-container">

        <img src="{{asset('/images/avatar-04-04-19.jpg')}}"  uk-cover>
        <canvas width="500" height="500"></canvas>
    </div>
    <div>
        <div class="uk-card-body">
            <h3 class="uk-card-title">Меня зовут Тогулева Валентина.</h3>
            <p>
<p>Я мама двух прекрасных детей. Моему сыну Льву сейчас <?=floor((time() - strtotime('2013-04-8')) / 31556926);?> лет, а моей дочери Варваре сейчас <?=floor((time() - strtotime('2014-10-9')) / 31556926);?> лет.
Мы живем также, как и большинство семей с маленькими детьми – сын учится в <?php if(date('m')>5){print(date('Y')-2019);} else {print(date('Y')-2019-1);} ?> классе, обычной общеобразовательной школы, без сопровождения или специальных условий. В его классе 32 ребенка, он посещает ее без тьютора и справляется с заданиями и нагрузкой самостоятельно. Дочь учится в этой же школе в <?php if(date('m')>5){print(date('Y')-2020);} else {print(date('Y')-2020-1);} ?> классе. Помимо школы дети посещают занятия и секции, а также получают развлечения и подарки в соответствии со своими текущими интересами. На сегодняшний день я считаю, что у нас очень хорошая жизнь и прекрасные дети, но когда-то даже такой уровень жизни казался нам недоступным.</p>
<p>В 2015 году моему сыну был поставлен диагноз Аутизм, вследствие других причин. Он не говорил, ел 4 продукта питания, был склонен к истерикам, самоагрессии. Нам было непросто.</p>
<p>В центрах, которые мы посещали для получения помощи не могли найти к нему подход, с питанием вопрос не решался, к проблемам пищевого поведения добавились рвоты и запоры, которые усиливали проявления нежелательного поведения.</p>
<p>Прошло 6 месяцев с того момента, как мы впервые услышали диагноз нашего сына, а мы не приблизились ни на шаг к тому, чтобы организовать эффективную систему помощи для ребенка.</p>
<p>Мы приняли совместное решение с супругом, что разбираться с проблемой питания, обучения и социализации ребенка придется самим и в 2015 году я поступила в МГППУ.</p>

 <a href="{{url('/story')}}"> Прочитать мою историю до конца...</a>
        </div>
    </div>
</div>

<div class="uk-grid-match uk-child-width-1-2@m" uk-grid>
  @foreach($posts as $post)
        <div>
            <div class="uk-card uk-card-default">

                @if($loop->iteration  == 3 || $loop->iteration  == 6 )
                  <div class="uk-card">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <ins class="adsbygoogle"
                         style="display:block; text-align:center;"
                         data-ad-layout="in-article"
                         data-ad-format="fluid"
                         data-ad-client="ca-pub-0121715169223686"
                         data-ad-slot="8231602562"></ins>
                    <script>
                         (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                  </div>
                @endif

                @if($loop->iteration  % 2 == 0)
                @isset($post['title_image'])
                  <div class="uk-card-media-top">
                    @auth
                    <a href="{{action('PostsController@show', $post['id'])}}">

                      <picture>
                        <source
                         media = "(min-width:860px)"
                         srcset="{{asset('uploads/posts/large_photos/'.$post['title_image'].' 860w')}}">
                        <source
                        media = "(min-width:640px)"
                        srcset = "{{asset('uploads/posts/medium_photos/'.$post['title_image'].' 640w')}}" >
                        <source
                        media = "(max-width:420px)"
                        srcset = "{{asset('uploads/posts/mobile_photos/'.$post['title_image'].' 420w')}}" >
                        <img src="{{asset('uploads/posts/medium_photos/'.$post['title_image'])}}" >
                      </picture>

                    </a>
                    @endauth
                    @guest
                    <a href="{{route('posts.user.show', $post['id'])}}">
                      <picture>
                        <source
                         media = "(min-width:860px)"
                         srcset="{{asset('uploads/posts/large_photos/'.$post['title_image'].' 860w')}}">
                        <source
                        media = "(min-width:640px)"
                        srcset = "{{asset('uploads/posts/medium_photos/'.$post['title_image'].' 640w')}}" >
                        <source
                        media = "(max-width:420px)"
                        srcset = "{{asset('uploads/posts/mobile_photos/'.$post['title_image'].' 420w')}}" >
                        <img src="{{asset('uploads/posts/medium_photos/'.$post['title_image'])}}" >
                      </picture>
                    </a>
                    @endguest
                  </div>
                  @endisset
                @endif
                <div class="uk-card-body">
                  @auth
                      <a href="{{action('PostsController@show', $post['id'])}}"><h3 class="uk-card-title">{{$post['title']}}</h3></a>
                 @endauth
                 @guest
                     <a href="{{route('posts.user.show', $post['id'])}}"> <h3 class="uk-card-title">{{$post['title']}}</h3></a>
                @endguest

                      <p class="uk-text-meta uk-margin-remove-top">{{date('d.m.Y',strtotime($post['updated_at']))}}</p>
                    <p>{!! html_entity_decode(htmlspecialchars_decode($post['pre_body'], ENT_QUOTES | ENT_IGNORE), ENT_QUOTES | ENT_IGNORE, "UTF-8") !!}</p>
                    <p>
                      @auth

                      <a href="{{action('PostsController@show', $post['id'])}}" class="uk-icon-button floatL uk-button-primary" uk-icon="info"></a>
    										<a href="{{action('PostsController@edit', $post['id'])}}" class="uk-icon-button floatL uk-button-default" uk-icon="pencil"></a>
    			               <form action="{{action('PostsController@destroy', $post['id'])}}" method="post">
    			                 @csrf
    			                 <input name="_method" type="hidden" value="DELETE">
    			                 <button uk-icon="close" class="uk-icon-button floatL  uk-button-danger" type="submit"></button>
    			               </form>

                     @endauth
                     @guest
                         <a href="{{route('posts.user.show', $post['id'])}}"> Подробнее...</a>
                    @endguest

                    </p>
                </div>
                  @if($loop->iteration  % 2 == 1)
                  @isset($post['title_image'])
                  <div class="uk-card-media-bottom">
                    @auth
                    <a href="{{action('PostsController@show', $post['id'])}}">
                      <picture>
                        <source
                         media = "(min-width:860px)"
                         srcset="{{asset('uploads/posts/large_photos/'.$post['title_image'].' 860w')}}">
                        <source
                        media = "(min-width:640px)"
                        srcset = "{{asset('uploads/posts/medium_photos/'.$post['title_image'].' 640w')}}" >
                        <source
                        media = "(max-width:420px)"
                        srcset = "{{asset('uploads/posts/mobile_photos/'.$post['title_image'].' 420w')}}" >
                        <img src="{{asset('uploads/posts/medium_photos/'.$post['title_image'])}}" >
                      </picture>
                    </a>
                    @endauth
                    @guest
                    <a href="{{route('posts.user.show', $post['id'])}}">
                      <picture>
                        <source
                         media = "(min-width:860px)"
                         srcset="{{asset('uploads/posts/large_photos/'.$post['title_image'].' 860w')}}">
                        <source
                        media = "(min-width:640px)"
                        srcset = "{{asset('uploads/posts/medium_photos/'.$post['title_image'].' 640w')}}" >
                        <source
                        media = "(max-width:420px)"
                        srcset = "{{asset('uploads/posts/mobile_photos/'.$post['title_image'].' 420w')}}" >
                        <img src="{{asset('uploads/posts/medium_photos/'.$post['title_image'])}}" >
                      </picture>
                    </a>
                    @endguest
                  </div>
                  @endisset
                  @endif
            </div>
        </div>

  @endforeach

</div>
<div class="uk-margin uk-card uk-card-default uk-card-body">
  {{$posts->links('vendor/pagination/uikit') }}
</div>

@endsection
