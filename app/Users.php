<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
   protected $table ='users';
     public $primaryKey = 'id';
    public $timestamps = true;

   public function department(){
   	return $this->belongsTo('App\Department');
   }

   public function allocation(){
   	return $this->hasMany('App\Allocation');
   }
}
