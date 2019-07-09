<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTalukaTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taluka_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('taluka_id');
            $table->string('locale');
            $table->string('name');
            $table->unique(['taluka_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taluka_translations');
    }
}
