<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    public $primaryKey = 'course_id';
    public $timestamps = true;

    public function allocations(){
    	return $this->hasMany('App\Allocation');
    }

    public function department(){
    	return $this->belongsTo('App\Department');
    }

    public function corecourses(){
    	return $this->hasMany('App\CoreCourse');
    }
    
    
}
