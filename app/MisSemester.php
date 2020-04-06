<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MisSemester extends Model
{
    protected $table ='mis_semesters';
	protected $keyType ='string';
    public $primaryKey ='mis_id'; 
    public $timestamps = true;
}
