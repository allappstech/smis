<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    protected $table ='academics';
    public $primaryKey ='academic_id';
    public $timestamps = true;
}
