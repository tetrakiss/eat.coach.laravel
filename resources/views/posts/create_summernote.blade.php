@extends('layouts.eat')

@section('custom_head_scr')
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
@endsection

@section('content')
{!! Form::open(['route'=>['posts.store']]) !!}

<div class="uk-margin">
    <input class="uk-input" type="text" name="title" placeholder="Заголовок">
</div>
<div class="uk-margin">
<textarea id="summernote" name="body"></textarea>
</div>


{{ Form::submit('Сохранить пост', array('class' => 'btn btn-primary', 'id' => 'form-submit')) }}
{!! Form::close() !!}

@endsection

@section('custom_scr')

<script>
$(document).ready(function() {

  var editor = $('#summernote');

          var configFull = {
              lang: 'ru-RU', // default: 'en-US'
              shortcuts: false,
              airMode: false,
              minHeight: 500, // set minimum height of editor
              maxHeight: null, // set maximum height of editor
              focus: false, // set focus to editable area after initializing summernote
              disableDragAndDrop: false,
              /*callbacks: {
                  onImageUpload: function (files) {
                      uploadFile(files);
                  },

                  onMediaDelete: function ($target, editor, $editable) {

                      var fileURL = $target[0].src;
                      deleteFile(fileURL);

                      // remove element in editor
                      $target.remove();
                  }
              }*/
          };

          // Featured editor
          editor.summernote(configFull);

          // Upload file on the server.
                function uploadFile(filesForm) {
                    data = new FormData();

                    // Add all files from form to array.
                    for (var i = 0; i < filesForm.length; i++) {
                        data.append("files[]", filesForm[i]);
                    }

                    $.ajax({
                        data: data,
                        type: "POST",
                        url: "/ajax/uploader/upload",
                        cache: false,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        contentType: false,
                        processData: false,
                        success: function (images) {
                            //console.log(images);

                            // If not errors.
                            if (typeof images['error'] == 'undefined') {

                                // Get all images and insert to editor.
                                for (var i = 0; i < images['url'].length; i++) {

                                    editor.summernote('insertImage', images['url'][i], function ($image) {
                                        //$image.css('width', $image.width() / 3);
                                        //$image.attr('data-filename', 'retriever')
                                    });
                                }
                            }
                            else {
                                // Get user's browser language.
                                var userLang = navigator.language || navigator.userLanguage;

                                if (userLang == 'ru-RU') {
                                    var error = 'Ошибка, не могу загрузить файл! Пожалуйста, проверьте файл или ссылку. ' +
                                        'Изображение должно быть не менее 500px!';
                                }
                                else {
                                    var error = 'Error, can\'t upload file! Please check file or URL. Image should be more then 500px!';
                                }

                                alert(error);
                            }
                        }
                    });
                }
});
</script>
@endsection
