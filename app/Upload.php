<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
      protected $table ='uploads';
    public $primaryKey ='upload_id';
    public $timestamps = true;

    public function allocation(){
    	return $this->belongsTo('App\Allocation');
    }
}
