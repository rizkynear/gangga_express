<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanySecondTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_second_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_second_id')->unsigned();
            $table->string('title');
            $table->string('sub_title');
            $table->longText('content');
            $table->string('locale')->index();

            $table->foreign('company_second_id')->references('id')->on('company_seconds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_second_translations');
    }
}
