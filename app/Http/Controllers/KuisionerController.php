<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DA\pertanyaan;

class KuisionerController extends Controller
{
    public function formKuisionerIkm(){
        date_default_timezone_set('Asia/Makassar');
        $data = pertanyaan::getPertanyaan();
        $pertanyaan = array();
        foreach($data as $d){
            if (!in_array($d->pertanyaan, $pertanyaan)){
                array_push($pertanyaan, $d->pertanyaan);
            };
        };

        $list = array();
        foreach($data as $d){
            foreach($pertanyaan as $p){
                if ($p==$d->pertanyaan){
                    $list[$p][] = array('id' => $d->id, 'jawaban' => $d->jawaban);
                };
            };
        };

        $noResponden = pertanyaan::getNoAntrian();
        $tgl         = date('Y-m-d');
        $jam         = date('H:i:s'); 
        return view('user.kuisionerIkmForm',compact('pertanyaan', 'list', 'noResponden', 'tgl', 'jam'));
    }

    public function home(){
        return view('user.home');
    }

    public function formKuisionerkepuasan(){
        return view('user.kuisionerKepuasan');
    }

}
