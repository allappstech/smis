<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
      protected $table ='lgas';
    public $primaryKey ='lga_id';
    public $timestamps = true;

    public function state(){
    	return $this->belongsTo('App\State');
    }

    public function lstudent(){
    	return $this->hasMany('App\Student');
    }
}
