<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $table = 'colleges';
    public $primaryKey = 'college_id';
    public $timestamps = true;
    public function departments(){
    	return $this->hasMany('App\Department');
    }
}
