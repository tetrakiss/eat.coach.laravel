<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultationPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultation_payment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('yandex_id');
            $table->unsignedInteger('consultation_id')->nullable();
            $table->unsignedInteger('customer_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('description');
            $table->decimal('amount', 10, 2);
            $table->string('status');
            $table->timestamps();
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('set null');
                $table->foreign('consultation_id')
                    ->references('id')
                    ->on('consultation')
                    ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultation_payment');
    }
}
