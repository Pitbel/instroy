<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lands', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('locality_id');
            $table->string('name', 191);
            $table->integer('price');
            $table->string('area', 191);
            $table->integer('land_category_id');
            $table->string('address', 191);
            $table->integer('assignment_id');
            $table->text('description');
            $table->text('short_description');
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
        Schema::dropIfExists('lands');
    }
}
