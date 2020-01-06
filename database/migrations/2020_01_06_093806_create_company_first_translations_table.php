<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyFirstTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_first_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_first_id')->unsigned();
            $table->string('title');
            $table->string('sub_title');
            $table->longText('content');
            $table->string('locale')->index();

            $table->foreign('company_first_id')->references('id')->on('company_firsts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_first_translations');
    }
}
