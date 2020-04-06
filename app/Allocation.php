<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
    protected $table ='allocations';
    public $primaryKey ='allocation_id';
    public $timestamps = true;
    
    public function course(){
    	return $this->belongsTo('App\Course');
    }

      public function category(){
    	return $this->belongsTo('App\Category');
    }
    public function user(){
    	return $this->belongsTo('App\Users');
    }


     public function uploads(){
        return $this->hasOne('App\Upload');
    }
}