<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenureTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenure_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tenure_id');
            $table->string('locale');
            $table->string('name');
            $table->unique(['tenure_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenure_translations');
    }
}
