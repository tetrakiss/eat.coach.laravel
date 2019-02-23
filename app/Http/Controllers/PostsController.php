<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Customers;
use App\Posts;
use Image;
use URL;

use SEOMeta;
use OpenGraph;



class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        SEOMeta::setTitle('Eat.coach Статьи');
        SEOMeta::setDescription('Статьи по коррекции пищевого поведения у детей и взрослых');

        OpenGraph::setDescription('Статьи по коррекции пищевого поведения у детей и взрослых');
        OpenGraph::setTitle('Eat.coach Статьи');
        OpenGraph::addProperty('locale', 'ru-ru');
        OpenGraph::setUrl(URL::current());
        //OpenGraph::addImage($post->cover->url);
        OpenGraph::addProperty('type', 'articles');

    //  $posts = Posts::with('author')->latest()->get();
      $posts = Posts::with('author')->latest()->paginate(6);
      $this->imageOptimization($posts);
        return view('posts.index', compact('posts'));
    }
    public function imageOptimization($posts){

      $original_photo_storage = public_path('uploads/posts/original_photos/');
      $large_photos_storage = public_path('uploads/posts/large_photos/');
      $medium_photos_storage = public_path('uploads/posts/medium_photos/');
      $mobile_photos_storage = public_path('uploads/posts/mobile_photos/');
      $tiny_photos_storage = public_path('uploads/posts/tiny_photos/');
      if (!file_exists($original_photo_storage)) {
           mkdir($original_photo_storage, 777, true);
       }
       if (!file_exists($large_photos_storage)) {
            mkdir($large_photos_storage, 777, true);
        }
        if (!file_exists($medium_photos_storage)) {
             mkdir($medium_photos_storage, 777, true);
         }
         if (!file_exists($mobile_photos_storage)) {
              mkdir($mobile_photos_storage, 777, true);
          }
          if (!file_exists($tiny_photos_storage)) {
               mkdir($tiny_photos_storage, 777, true);
           }
      foreach ($posts as $p) {
        $path=public_path($p->title_image);
        if(file_exists($path)) {
          $image = Image::make($path);
          $image->save($original_photo_storage.basename($path),100)
          ->resize(860, null, function ($constraint) {
          $constraint->aspectRatio();
          })->save($large_photos_storage.basename($path),85)
          ->resize(640, null, function ($constraint) {
          $constraint->aspectRatio();
          })->save($medium_photos_storage.basename($path),85)
          ->resize(420, null, function ($constraint) {
          $constraint->aspectRatio();
          })->save($mobile_photos_storage.basename($path),85)
          ->resize(10, null, function ($constraint) {
          $constraint->aspectRatio();
          })->blur(1)->save($tiny_photos_storage.basename($path),85);
        }
    }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create_summernote');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $post = new Posts();

       if ($request->hasFile('title_image')) {

         /*$cover = $request->file('title_image');
         $extension = $cover->getClientOriginalExtension();
         Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));

         $post->title_image=$cover->getFilename().'.'.$extension;
         */


         $image = $request->file('title_image');
         $path = public_path(). '/uploads/posts/';
         $filename = $image->getClientOriginalName();
         //$filename = $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
         $image->move($path, $filename);

         $post->title_image='/uploads/posts/'. $image->getClientOriginalName();

       }

	     $message = $request->body;

  	   $dom = new \DomDocument();
       //$dom->loadHTML('<meta http-equiv="Content-Type" content="text/html; charset=utf-8">' . $message);
       $dom->loadHTML(mb_convert_encoding($message, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
      //$dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
       $images = $dom->getElementsByTagName('img');

    // foreach <img> in the submited message
		foreach($images as $img){
			$src = $img->getAttribute('src');

			// if the img source is 'data-url'
			if(preg_match('/data:image/', $src)){

				// get the mimetype
				preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
				$mimetype = $groups['mime'];

				// Generating a random filename
				$filename = uniqid();
				$filepath = "/uploads/posts/$filename.$mimetype";

				// @see http://image.intervention.io/api/
				$image = Image::make($src)
				  // resize if required
				  /* ->resize(300, 200) */
				  ->encode($mimetype, 100) 	// encode file to the specified mimetype
				  ->save(public_path($filepath));

				$new_src = asset($filepath);
				$img->removeAttribute('src');
				$img->setAttribute('src', $new_src);
			} // <!--endif
		} // <!--endforeach
    $post->title =  $request->title;
    $post->pre_body =  $request->pre_body;
    $post->body = htmlentities(htmlspecialchars($dom->saveHTML()), ENT_QUOTES, 'UTF-8');
    $post->added_by_user_id =  Auth::id();

    $post->save();
    return redirect('posts')->with('success', 'Новый пост добавлен');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Posts::findOrFail($id);
      SEOMeta::setTitle($post->title);
      OpenGraph::addImage($post->title_image);
      OpenGraph::setDescription($post->pre_body);
      OpenGraph::addProperty('locale', 'ru-ru');
      OpenGraph::setUrl(URL::current());
      OpenGraph::addProperty('type', 'articles');
      return view('posts.show')
            ->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = Posts::find($id);
      return view('posts.edit',compact('post','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $post = Posts::find($id);

      if ($request->hasFile('title_image')) {
        $image = $request->file('title_image');
        $path = public_path(). '/uploads/posts/';
        $filename = $image->getClientOriginalName();
        $image->move($path, $filename);
        $post->title_image='/uploads/posts/'. $image->getClientOriginalName();
      }

      $message = $request->body;

      $dom = new \DomDocument();
      //$dom->loadHTML('<meta http-equiv="Content-Type" content="text/html; charset=utf-8">' . $message);
      $dom->loadHTML(mb_convert_encoding($message, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
     //$dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
      $images = $dom->getElementsByTagName('img');

   // foreach <img> in the submited message
   foreach($images as $img){
     $src = $img->getAttribute('src');

     // if the img source is 'data-url'
     if(preg_match('/data:image/', $src)){

       // get the mimetype
       preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
       $mimetype = $groups['mime'];

       // Generating a random filename
       $filename = uniqid();
       $filepath = "/uploads/posts/$filename.$mimetype";

       // @see http://image.intervention.io/api/
       $image = Image::make($src)
         // resize if required
         /* ->resize(300, 200) */
         ->encode($mimetype, 100) 	// encode file to the specified mimetype
         ->save(public_path($filepath));

       $new_src = asset($filepath);
       $img->removeAttribute('src');
       $img->setAttribute('src', $new_src);
     } // <!--endif
   } // <!--endforeach

   $post->title =  $request->title;
   $post->pre_body =  $request->pre_body;
   $post->body = htmlentities(htmlspecialchars($dom->saveHTML()), ENT_QUOTES, 'UTF-8');
    $post->save();

      return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
