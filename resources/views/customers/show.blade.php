@extends('layouts.eat')

@section('content')
<div class="uk-grid-match uk-child-width-expand@s" uk-sortable="handle: .uk-card" uk-grid>
    <div>
        <div class="uk-card  uk-card-default">
          <div class="uk-card-header">
              <div class="uk-grid-small uk-flex-middle" uk-grid>
                  <div class="uk-width-auto">
                      <span uk-icon="icon: user; ratio: 2"></span>
                  </div>
                  <div class="uk-width-expand">
                      <h3 class="uk-card-title uk-margin-remove-bottom">{{$customer->first_name}} {{$customer->last_name}}</h3>
                      <p class="uk-text-meta uk-margin-remove-top">{{date('d.m.Y',strtotime($customer->created_at))}}</p>
                  </div>
                  <div class="uk-width-auto">
                    <a href="{{action('CustomersController@edit', $customer['id'])}}" class="uk-icon-button" uk-icon="pencil"></a>
                  </div>
              </div>
          </div>
          <div class="uk-card-body">
              <p><span class="uk-margin-right" uk-icon="mail"></span> <a href="mailto:{{$customer['email']}}">{{$customer->email}}</a></p>
              <p><span  class="uk-margin-right" uk-icon="receiver"></span> <a href="tel:+{{$customer->phone}}">{{$customer->phone}}</a></p>
              <p><a  class="uk-margin-right uk-icon-button" uk-icon="user" href="skype:{{$customer['skype']}}?chat"></a>  <a href="{{$customer->facebook_link}}" class="uk-margin-right uk-icon-button" uk-icon="facebook"></a>  <a href="{{$customer->vk_link}}" class="uk-margin-right uk-icon-button" uk-icon="vimeo"></a></p>
              <p>Дата следующего контакта: {{$customer->next_date}}</p>
              <p>Дата последнего контакта: {{$customer->last_date}}</p>
          </div>



        </div><!-- card end -->
    </div><!-- row element end -->
    <div>
        <div class="uk-card uk-card-default">
          <div class="uk-card-header">
              <div class="uk-grid-small uk-flex-middle" uk-grid>
                  <div class="uk-width-auto">
                      <span uk-icon="icon: users; ratio: 2"></span>
                  </div>
                  <div class="uk-width-expand">
                      <h3 class="uk-card-title uk-margin-remove-bottom">Дети</h3>
                  </div>
                  <div class="uk-width-auto">
                    <a href="{{action('ChildrenController@create', $customer['id'])}}" class="uk-icon-button" uk-icon="plus"></a>
                  </div>
              </div>
          </div>
          <div class="uk-card-body">
            <p>
              @foreach($children as $key => $value)
              <div class="uk-grid-small uk-flex-middle" uk-grid>
                  <div class="uk-width-expand">
                      <h4>{{ $value->first_name }} {{ $value->last_name }}</h4>
                  </div>
                  <div class="uk-width-auto">
                    {{floor((time()-strtotime($value->birthday))/(3600*24*365.25)) }}  {{  floor((time()-strtotime($value->birthday))/(3600*24*365.25)) >= 5 ? 'лет' : 'года'}}
                  </div>
                  <div class="uk-width-expand">

                      {{ date('d.m.Y',strtotime($value->birthday ))}}
                  </div>
                  <div class="uk-width-auto">
                    <ul class="uk-comment-meta uk-subnav uk-subnav-divider ">
                        <li><button onclick="location.href='{{action('ChildrenController@edit', [$customer['id'], $value->id])}}';" class="uk-icon-button" uk-icon="pencil"></button></li>
                        <li>
                            <form action="{{action('ChildrenController@destroy', [$customer['id'], $value->id])}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button uk-icon="close" class="uk-icon-button  uk-button-danger" type="submit"></button>
                            </form>
                        </li>

                    </ul>
                  </div>
              </div>
               @endforeach



            </p>
          </div>
        </div><!-- card end -->
    </div><!-- row element end -->

</div><!-- row END -->

<div class="uk-grid-match uk-child-width-expand@s" uk-grid>
    <div>
      <div class="uk-card  uk-card-default">
        <div class="uk-card-header">
            <div class="uk-grid-small uk-flex-middle" uk-grid>
                <div class="uk-width-auto">
                    <span uk-icon="icon: paint-bucket; ratio: 2"></span>
                </div>
                <div class="uk-width-expand">
                    <h3 class="uk-card-title uk-margin-remove-bottom">Назначения</h3>
                </div>
                <div class="uk-width-auto">
                  <a href="{{action('AppointmentsController@create', $customer['id'])}}" class="uk-icon-button" uk-icon="plus"></a>
                </div>
            </div>
        </div>

        <div class="uk-card-body">
          <p>
            <ul class="uk-comment-list">
              @foreach($appointments as $key => $value)
              <li>
                  <article class="uk-comment">
                    <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
                      <div class="uk-width-auto">
                        <h4>{{ $value->med }}</h4>

                      </div>
                        <div class="uk-width-expand">
                            <ul class="uk-comment-meta uk-subnav uk-subnav-divider ">
                                <li>{{ date('d.m.Y',strtotime($value->created_at))  }} <span class="uk-margin-left uk-text-success">{{ $value->created_at == $value->updated_at ? "" : date('d.m.Y',strtotime($value->updated_at)) }}</span></li>
                                <li><button onclick="window.open('{{ $value->med_link }}')" class="uk-icon-button" uk-icon="link"></button>  </li>
                                <li><button onclick="location.href='{{action('AppointmentsController@edit',[$customer['id'], $value->id])}}';" class="uk-icon-button" uk-icon="pencil"></button></li>
                                <li>
                                    <form action="{{action('AppointmentsController@destroy', [$customer['id'], $value->id])}}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button uk-icon="close" class="uk-icon-button  uk-button-danger" type="submit"></button>
                                    </form>
                                </li>

                            </ul>
                        </div>
                    </header>
                    <div class="uk-comment-body">
                        <h6>Принимает <b>{{ $value->children }}</b></h6>
                        <p class="">{{ $value->medication }}</p>
                    </div>
                  </article>
              </li>
              @endforeach
            </ul>
          </p>
        </div>

        </div><!-- card end -->

    </div><!-- row element end -->
    <div>
      <div class="uk-card  uk-card-default">
        <div class="uk-card-header">
            <div class="uk-grid-small uk-flex-middle" uk-grid>
                <div class="uk-width-auto">
                    <span uk-icon="icon: comments; ratio: 2"></span>
                </div>
                <div class="uk-width-expand">
                    <h3 class="uk-card-title uk-margin-remove-bottom">Комментарии</h3>
                </div>
                <div class="uk-width-auto">
                  <a href="{{action('CommentsController@create', $customer['id'])}}" class="uk-icon-button" uk-icon="plus"></a>
                </div>
            </div>
        </div>

        <div class="uk-card-body">
          <p>
            <ul class="uk-comment-list">
              @foreach($comments as $key => $value)
                <li>
                    <article class="uk-comment">
                      <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
                          <div class="uk-width-expand">
                              <ul class="uk-comment-meta uk-subnav uk-subnav-divider ">
                                  <li>{{ $value->created_at }}</li>
                                  <li><button onclick="location.href='{{action('CommentsController@edit',[$customer['id'], $value->id])}}';" class="uk-icon-button" uk-icon="pencil"></button></li>
                                  <li>
                                      <form action="{{action('CommentsController@destroy', [$customer['id'], $value->id])}}" method="post">
                                      @csrf
                                      <input name="_method" type="hidden" value="DELETE">
                                      <button uk-icon="close" class="uk-icon-button  uk-button-danger" type="submit"></button>
                                      </form>
                                  </li>

                              </ul>
                          </div>
                      </header>
                      <div class="uk-comment-body">
                          <p class="">{{ $value->comment }}</p>
                      </div>
                    </article>
                </li>
                 @endforeach
            </ul>
          </p>

        </div>


        </div><!-- card end -->

    </div><!-- row element end -->
</div><!-- row END -->


@endsection
