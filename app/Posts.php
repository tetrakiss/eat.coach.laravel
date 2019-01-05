<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'posts';

  protected $guarded = [];


    /**
    * Get the author that owns the post.
    */
   public function author()
   {
       return $this->belongsTo('App\User');
   }
}
