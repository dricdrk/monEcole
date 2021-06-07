<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nmbrOfDays');
            $table->bigInteger('amount');
            $table->string('institution_name'); 
            $table->string('service_description');
            $table->string('logo');
            $table->string('pub_url_flyers');
            $table->unsignedBigInteger('user_id'); 
            $table->timestamps();
             // Foreign Key
             $table->foreign('user_id')
             ->references('id')
             ->on('users')
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
        Schema::dropIfExists('ads');
    }
}
