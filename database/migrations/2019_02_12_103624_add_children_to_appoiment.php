<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChildrenToAppoiment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::table('appointments', function (Blueprint $table) {
           $table->unsignedInteger('children_id')->nullable()->after('customer_id');
           $table->foreign('children_id')
               ->references('id')
               ->on('children')
               ->onDelete('cascade');

         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::table('appointments', function (Blueprint $table) {
              $table->dropColumn('children_id');
         });
     }
}
