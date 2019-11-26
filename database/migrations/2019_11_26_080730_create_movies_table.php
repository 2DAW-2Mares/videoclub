<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */

    /*id    Autoincremental
    title    String
    year    Year
    director    String de longitud 64
    poster    String
    rented    Booleano    false
    synopsis    Text
    timestamps    Timestamps de Eloquent      */
    public function up() {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->year('year');
            $table->string('director', 64);
            $table->string('poster');
            $table->boolean('rented')->default(false);
            $table->text('synopsis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('movies');
    }
}
