<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProfilePicture extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('pictures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->string('file'); 
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
