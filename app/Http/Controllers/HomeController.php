<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DA\Home;

class HomeController extends Controller
{
    public function login(){
    	return view('login');
    }

    public function loginCheck(Request $req){
    	$user = $req->input('username');
    	$pass = $req->input('pass');

    	$data = Home::cekLogin($user, $pass);
    	if ($data==null){
    		return back()->with('alerts',[['type'=>'danger', 'text'=>'Login Gagal !!!']]);
    	}
    	else{
    		$session = $req->session();
            $session->put('auth',$data);
    		return redirect('/admin/list-pertanyaan');
    	}
    }

    public function logout(){
    	session()->forget('auth');
    	return redirect('/');
    }
}
