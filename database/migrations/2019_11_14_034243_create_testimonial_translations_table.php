<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonialTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonial_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('testimonial_id')->unsigned();
            $table->longText('description');
            $table->string('locale')->index();

            $table->foreign('testimonial_id')->references('id')->on('testimonials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testimonial_translations');
    }
}
