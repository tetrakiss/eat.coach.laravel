<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Customers extends Model
{
  use SearchableTrait;
  /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'customers.first_name' => 10,
            'customers.last_name' => 10,
            'customers.phone' => 2,
            'customers.email' => 5,
            'children.first_name' => 2,
            'children.last_name' => 1,
        ],
        'joins' => [
            'children' => ['customers.id','children.customer_id'],
        ],
    ];

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
        return $this->hasMany(Children::class, 'customer_id');
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
          return $this->hasMany(Comments::class, 'customer_id');
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
            return $this->hasMany(Appointments::class, 'customer_id');
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
