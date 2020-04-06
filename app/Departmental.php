<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departmental extends Model
{
   protected $table = 'departmentals';
    public $primaryKey = 'departmental_id';
    public $timestamps = true;
}
