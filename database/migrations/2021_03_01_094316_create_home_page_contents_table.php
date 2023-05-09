<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePageContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('middle_section_image_right',20)->nullable();
            $table->string('middle_section_right_text',1200)->nullable();
            $table->string('middle_section_right_heading_text',55)->nullable();
            $table->string('middle_section_right_sub_heading_text',55)->nullable();

            $table->string('middle_section_image_left',20)->nullable();
            $table->string('middle_section_left_text',1200)->nullable();
            $table->string('middle_section_left_heading_text',55)->nullable();
            $table->string('middle_section_left_sub_heading_text',55)->nullable();

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
        Schema::dropIfExists('home_page_contents');
    }
}
