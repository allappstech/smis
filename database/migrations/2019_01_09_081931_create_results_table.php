<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->String('student_id');
            $table->String('Course_Code');
            $table->Integer('Units');
            $table->String('Grade');
            $table->String('Point');
            $table->String('Grade_Point');
            $table->String('category_id');
            $table->String('Semester');
            $table->String('Session');
            $table->String('Remark');
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
        Schema::dropIfExists('results');
    }
}
