<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoreCourse extends Model
{
    protected $table ="core_courses";
    public $primaryKey ="core_course_id";
     public $timestamps = true;

     public function course(){
     	return $this->belongsTo('App\Course');
     }

     public function program(){
     	return $this->belongsTo('App\Program');
     }

}
