@extends('layouts.eat')

@section('content')
<div class="error alert alert-danger"></div>
<div class="success alert alert-success"></div>
{!! Form::open(['route'=>['posts.store']]) !!}
<div class="title-editable" id="post-title"><h1>Enter post title</h1></div>
    <div class="body-editable" id="post-body"><p>Enter post body</p></div>
    {{ Form::submit('Сохранить пост', array('class' => 'btn btn-primary', 'id' => 'form-submit')) }}

{!! Form::close() !!}
@endsection

@section('custom_scr')
<script src="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/js/medium-editor.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8">
  <!--<script src="{{ asset('js/main_editor.js') }}"></script>-->

  <script>
  // initializing editors
  var titleEditor = new MediumEditor('.title-editable');
  var bodyEditor = new MediumEditor('.body-editable');


  // create post
  $('body').on('click', '#form-submit', function(e){
      e.preventDefault();
      var postTitle = titleEditor.serialize();
      var postContent = bodyEditor.serialize();

      $.ajax({
          type: 'POST',
          dataType: 'json',
          url : "{{ action('PostsController@store') }}",
          data: { title: postTitle['post-title']['value'], body: postContent['post-body']['value'], _token: '{{csrf_token()}}' },
          success: function(data) {
              if(data.success === false)
              {
                  $('.error').append(data.message);
                  $('.error').show();
              } else {
                  $('.success').append(data.message);
                  $('.success').show();
                  /*setTimeout(function() {
                      window.location.href = "{{ URL::action('PostsController@index') }}";
                  }, 2000);*/
              }
          },
          error: function(xhr, textStatus, thrownError) {
              alert('Something went wrong. Please Try again later...');
          }
      });
      return false;
  });

  </script>
@endsection
