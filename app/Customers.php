<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'customers';

  protected $guarded = [];


  /**
   * Customer может иметь множество детей.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
    public function children()
    {
        return $this->hasMany(Children::class);
    }

    /**
     * Add a children to customer.
     *
     * @param  array $reply
     * @return Model
     */
    public function addChildren($children)
    {
        $children = $this->children()->create($children);
        return $children;
    }

    /**
     * Customer может иметь множество комментарием.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
      public function comments()
      {
          return $this->hasMany(Comments::class);
      }

      /**
       * Add a commnet to customer.
       *
       * @param  array $reply
       * @return Model
       */
      public function addComment($comment)
      {
          $comment = $this->comments()->create($comment);
          return $comment;
      }

      /**
       * Customer может иметь множество назначений.
       *
       * @return \Illuminate\Database\Eloquent\Relations\HasMany
       */
        public function appointments()
        {
            return $this->hasMany(Appointments::class);
        }

        /**
         * Add a appointment to customer.
         *
         * @param  array $reply
         * @return Model
         */
        public function addAppointment($appointment)
        {
            $appointment = $this->appointments()->create($appointment);
            return $appointment;
        }

}
