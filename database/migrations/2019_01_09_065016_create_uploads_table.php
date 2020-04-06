<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('AdmissionNo');
            $table->string('Student_Name');
            $table->double('CA');
            $table->double('Exams');
            $table->double('Total');
            $table->string('Grade');
            $table->string('Remark');
            $table->integer('allocation_id');
            $table->integer('user_id');
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
        Schema::dropIfExists('uploads');
    }
}
