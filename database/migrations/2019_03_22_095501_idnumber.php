<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Idnumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('idnumbers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('program_id');
            $table->integer('Number_Code');
            $table->string('Category');
            $table->integer('Admno');
            $table->string('Sessions');
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
