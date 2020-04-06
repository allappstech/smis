<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';
     public $primaryKey = 'category_id';
    public $timestamps = true;

     public function allocations(){
    	return $this->hasMany('App\Allocation');
    }
	
	   public function program(){
    	return $this->belongsTo('App\Program');
    }
}
