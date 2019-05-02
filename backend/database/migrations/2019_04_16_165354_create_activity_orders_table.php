<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('activity_id');
            $table->decimal('amount' , 9, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('order_status' , ['new','playment','confirm','not_confirm'])->default('new');
            $table->string('message')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->date('payment_date');
            $table->string('payment_time' , 20);
            $table->decimal('payment_amount' , 9,2);
            $table->string('playment_image')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_orders');
    }
}
