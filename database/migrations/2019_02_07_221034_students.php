<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Students extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('AdmissionNo')->unique();
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('phoneNo');  
             $table->integer('program_id');
            $table->string('Category');
         
            $table->string('password');
            $table->integer('lga_id'); 
            $table->string('Session');
            $table->string('current_status');
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
