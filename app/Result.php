<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table ='results';
	protected $keyType ='string';
    public $primaryKey ='result_id';
    public $incrementing =false;
    public $timestamps = true;
}
