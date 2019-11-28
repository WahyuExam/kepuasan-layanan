<?php

namespace App\DA;

use Illuminate\Database\Eloquent\Model;
use DB;

class pertanyaan extends Model
{
    protected $table = 'pilihans';
    protected $fillable = ['jawaban', 'nilai_jwb', 'pertanyaan_id','created_at','updated_at'];

    public static function simpanPertanyaan($req){
        $getId = DB::table('pertanyaans')->insertGetId([
            'pertanyaan'    => $req->pertanyaan,
            'unsur'         => $req->unsur,
            'created_at'    => DB::RAW('now()'),
            'updated_at'    => DB::RAW('now()'),
        ]);

        return $getId;
    }

    public static function getAllPertanyaan(){
        return DB::table('pertanyaans')->get();
    }

    public static function getPertanyaanByid($id){
        return DB::table('pertanyaans')
            ->leftJoin('pilihans','pertanyaans.id','=','pilihans.pertanyaan_id')
            ->select('pertanyaans.*', 'pilihans.*')
            ->where('pertanyaans.id',$id)
            ->get();
    }

    public static function ubahPertanyaan($id, $req){
        return DB::table('pertanyaans')->where('id', $id)->update(['pertanyaan' => $req->pertanyaan, 'unsur' => $req->unsur, 'updated_at'   => DB::RAW('now()')]);
    }

    public static function hapusPertanyaan($id){
        return DB::table('pertanyaans')->where('id', $id)->delete();
    }

    public static function getPertanyaan(){
        return DB::table('pertanyaans')
            ->leftJoin('pilihans','pertanyaans.id','=','pilihans.pertanyaan_id')
            ->select('pertanyaans.*', 'pilihans.*')
            ->get();
    }

    public static function getNoAntrian(){
        $data = DB::table('transaksi_kuisioner_ikm')->orderBy('id', 'DESC')->first();
        $no = 1;
        if($data<>null){
            $no   = $data->id + 1;
        }
        return $no;
    }

}
