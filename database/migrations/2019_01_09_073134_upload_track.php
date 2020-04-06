<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UploadTrack extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('uploads_track', function (Blueprint $table) {
            $table->increments('track_id');
            $table->string('Course_Code');
            $table->integer('Allocation_id');
            $table->integer('Program_id');
            $table->integer('id');
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
