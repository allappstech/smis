<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     protected $table ='students';
    public $primaryKey ='student_id';
    public $timestamps = true;

     public function program(){
    	return $this->belongsTo('App\Program');
    }

     public function lga(){
    	return $this->belongsTo('App\Lga');
    }
} 
