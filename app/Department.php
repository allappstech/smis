<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
     protected $table = 'departments';
    public $primaryKey = 'department_id';
    public $timestamps = true;
	 public $incrementing =false;
    protected $fillable=[
    	'Department',
    	'college_id'
    ];
    public function college(){
    	return $this->belongsTo('App\College');
    }

     public function programs(){
    	return $this->hasMany('App\Program');
    }
    public function course(){
        return $this->hasMany('App\Course');
    }
    public function user(){
        return $this->hasMany('App\Users');
    }
}
