<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pro_name');
            $table->string('pro_slug')->unique();
            $table->string('pro_price');
            $table->longText('pro_detail')->nullable();
            $table->string('pro_image')->nullable();
            $table->date('pro_start_date');
            $table->date('pro_end_date');
            $table->enum('pro_status' , ['0','1'])->default('0');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
