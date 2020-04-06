<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
      protected $table ='states';
    public $primaryKey ='state_id';
    public $timestamps = true;

    public function lgas(){
    	return $this->hasMay('App\Lga');
    }
}
