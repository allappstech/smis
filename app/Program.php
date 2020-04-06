<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';
    public $primaryKey = 'program_id';
    public $timestamps = true;

       public function department(){
    	return $this->belongsTo('App\Department');
    }

    public function corecourses(){
    	return hasMany('App\CoreCourse');
    }
     public function students(){
    	return hasMany('App\Student');
    }
	
	public function idnumber(){
    	return hasMany('App\Idnumber');
    }
	public function category(){
    	return hasMany('App\Category');
    }
}
