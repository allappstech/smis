<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idnumber extends Model
{
    protected $table ='idnumbers';
     public $primaryKey = 'idnumber_id';
    public $timestamps = true;
	
	public function Program(){
    	return $this->belongsTo('App\Program');
    }
}
