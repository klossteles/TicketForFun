<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->string('slug')
                ->unique()
                ->nullable()
                ->primary();

            $table->string('name')
                ->nullable(false);

            $table->string('original_name')
                ->nullable(false);

            $table->integer('duration_in_minutes')
                ->nullable(false);

            $table->longText('plot_summary')
                ->nullable(false);

            $table->longText('image_url')
                ->nullable(true);

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
        Schema::dropIfExists('movies');
    }
}
