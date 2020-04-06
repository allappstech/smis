<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
            $table->String('student_id');
            $table->String('Prev_Units');
            $table->String('Curr_Sem_Units');
            $table->String('Cumm_Units');
            $table->String('GP_This_Sem');
            $table->String('GP_Last_Sem');            
            $table->String('CGP');
            $table->String('GPA_This_Sem');
            $table->String('CGPA');
            $table->String('Remark');
            $table->String('Semester');
            $table->String('Session');
            $table->String('Status');
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
        Schema::dropIfExists('grades');
    }
}
