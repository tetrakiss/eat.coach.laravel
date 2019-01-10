
@extends(Auth::user() ? 'layouts.eat' : 'layouts.eat_front')


@section('content')

<div class="uk-grid-match uk-child-width-1-2@m" uk-grid>
  @foreach($posts as $post)
        <div>
            <div class="uk-card uk-card-default">
                @if($loop->iteration  % 2 == 0)
                @isset($post['title_image'])
                  <div class="uk-card-media-top">
                    @auth
                    <a href="{{action('PostsController@show', $post['id'])}}">{!! Html::image($post['title_image']) !!}</a>
                    @endauth
                    @guest
                    <a href="{{route('posts.user.show', $post['id'])}}">{!! Html::image($post['title_image']) !!}</a>
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
                        <a href="{{action('PostsController@show', $post['id'])}}"> Подробнее...</a>
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
                    <a href="{{action('PostsController@show', $post['id'])}}">{!! Html::image($post['title_image']) !!}</a>
                    @endauth
                    @guest
                    <a href="{{route('posts.user.show', $post['id'])}}">{!! Html::image($post['title_image']) !!}</a>
                    @endguest
                  </div>
                  @endisset
                  @endif
            </div>
        </div>

  @endforeach

</div>

@endsection
