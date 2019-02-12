<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'children';

  protected $guarded = [];

  /**
   * Customer может иметь множество назначений.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
    public function appointments()
    {
        return $this->hasMany(Appointments::class, 'children_id');
    }
}
