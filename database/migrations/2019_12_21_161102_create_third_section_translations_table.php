<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThirdSectionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('third_section_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('third_section_id')->unsigned();
            $table->string('title');
            $table->string('sub_title');
            $table->longText('content');
            $table->string('locale')->index();

            $table->foreign('third_section_id')->references('id')->on('third_sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('third_section_translations');
    }
}
