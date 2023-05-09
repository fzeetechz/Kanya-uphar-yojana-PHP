<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateprofileInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_informations', function (Blueprint $table) {
            $table->id();
            $table->date('dob',10);
            $table->string('gender',50)->nullable();
            $table->string('about_us',500)->nullable();
            $table->string('photo',100)->nullable();
            $table->string('id_proof',100)->nullable();
            $table->string('emergency_number',15)->nullable();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('driver_informations');
    }
}
