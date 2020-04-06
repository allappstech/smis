<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NumberGenerations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('NumberGenerations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('program_id');
            $table->integer('category_id');
            $table->integer('Year');
            $table->integer('Codes');
            $table->integer('Codes_id');
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
        //
    }
}
