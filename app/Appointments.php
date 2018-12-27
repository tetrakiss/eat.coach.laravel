<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'appointments';

  protected $guarded = [];
}
