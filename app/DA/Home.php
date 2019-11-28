<?php

namespace App\DA;

use Illuminate\Database\Eloquent\Model;
use DB;

class Home extends Model
{
    public static function cekLogin($user, $pass){
    	return DB::table('users')->where('user',$user)->where('pass',md5($pass))->where('status',1)->first();
    }
}
