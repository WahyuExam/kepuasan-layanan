<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DA\pertanyaan;
use Alert;

class PertanyaanController extends Controller
{
    public function listPertanyaan(){
        $getPertanyaan = pertanyaan::getAllPertanyaan();
        
        return view('admin.pertanyaan.list',compact('getPertanyaan'));
    }

    public function formCreate(){
        return view('admin.pertanyaan.FormCreate');
    }

    public function formCreateSimpan(Request $req){
        date_default_timezone_set('Asia/Makassar');        
        $this->validate($req,[
            'pertanyaan'    => 'required',
            'unsur'         => 'required',
            'pil1'          => 'required',
            'pil2'          => 'required',
            'pil3'          => 'required',
            'pil4'          => 'required',
       ],[
            'pertanyaan.required'   => 'Inputan Pertanyaan Jangan kosong',
            'unsur.required'        => 'Inputan Unsur Pelayanan Jangan kosong',
            'pil1.required'         => 'Inputan Pilihan A Jangan kosong',
            'pil2.required'         => 'Inputan Pilihan B Jangan kosong',
            'pil3.required'         => 'Inputan Pilihan C Jangan kosong',
            'pil4.required'         => 'Inputan Pilihan D Jangan kosong'
       ]);
  
        $id = pertanyaan::simpanPertanyaan($req);
        $jawaban= array(array(
            'jawaban'   => $req->pil1,
            'nilai_jwb' => 1,
            'pertanyaan_id' => $id,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ),array(
            'jawaban'   => $req->pil2,
            'nilai_jwb' => 2,
            'pertanyaan_id' => $id,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ),array(
            'jawaban'   => $req->pil3,
            'nilai_jwb' => 3,
            'pertanyaan_id' => $id,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ),array(
            'jawaban'   => $req->pil4,
            'nilai_jwb' => 4,
            'pertanyaan_id' => $id,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ));

        pertanyaan::insert($jawaban); 
        Alert::success('Pertanyaan Berhasil Ditambahkan', 'Berhasil');
        return redirect('/admin/list-pertanyaan');           
    }

    public function formEdit($id){
        $data = pertanyaan::getPertanyaanByid($id);
        return view('admin.pertanyaan.edit', compact('data'));
    }

    public function formEditSimpan(Request $req, $id){
        date_default_timezone_set('Asia/Makassar');        
        $this->validate($req,[
            'pertanyaan'    => 'required',
            'unsur'         => 'required',
            'pil1'          => 'required',
            'pil2'          => 'required',
            'pil3'          => 'required',
            'pil4'          => 'required',
        ],[
            'pertanyaan.required'   => 'Inputan Pertanyaan Jangan kosong',
            'unsur.required'        => 'Inputan Unsur Pelayanan Jangan kosong',
            'pil1.required'         => 'Inputan Pilihan A Jangan kosong',
            'pil2.required'         => 'Inputan Pilihan B Jangan kosong',
            'pil3.required'         => 'Inputan Pilihan C Jangan kosong',
            'pil4.required'         => 'Inputan Pilihan D Jangan kosong'
        ]);
        pertanyaan::ubahPertanyaan($id, $req);
    
        pertanyaan::where('id',$req->pilihan1)->update(['jawaban' => $req->pil1, 'updated_at' => date('Y-m-d H:i:s')]);
        pertanyaan::where('id',$req->pilihan2)->update(['jawaban' => $req->pil2, 'updated_at' => date('Y-m-d H:i:s')]);
        pertanyaan::where('id',$req->pilihan3)->update(['jawaban' => $req->pil3, 'updated_at' => date('Y-m-d H:i:s')]);
        pertanyaan::where('id',$req->pilihan4)->update(['jawaban' => $req->pil4, 'updated_at' => date('Y-m-d H:i:s')]);

        Alert::success('Pertanyaan Berhasil Diubah', 'Berhasil');
        return redirect('/admin/list-pertanyaan'); 
    }

    public function lihatPertanyaan($id){
        $data = pertanyaan::getPertanyaanByid($id);
        return view('admin.pertanyaan.lihat', compact('data'));
    }

    public function hapusPertanyaan($id){
        return pertanyaan::hapusPertanyaan($id);
    }
}
