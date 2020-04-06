<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo;
class ChangepasswordsController extends Controller
{
    //
	public function sendCode(){
	Nexmo::message()->send([
    'to'   => '2348060304177',
    'from' => 'me ',
    'text' => '85545'
]);

	}
}
