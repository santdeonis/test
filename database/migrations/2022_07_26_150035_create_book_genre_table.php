<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_genre', function (Blueprint $table) {
          $table->id();
          $table->foreignId('book_id')
          ->constrained()
          ->onUpdate('cascade')
          ->onDelete('cascade');
          $table->foreignId('genre_id')
          ->constrained()
          ->onUpdate('cascade')
          ->onDelete('cascade');
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
        Schema::dropIfExists('book_genre');
    }
};
