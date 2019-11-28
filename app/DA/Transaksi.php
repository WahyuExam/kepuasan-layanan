<?php

namespace App\DA;

use Illuminate\Database\Eloquent\Model;
use DB;

class Transaksi extends Model
{
    public static function simpanResponden($req){
        date_default_timezone_set('Asia/Makassar');
        if($req->pekerjaan=="LAIN"){
            $pekerjaanFix = $req->pekerjaanSimpan;
        }
        else{
            $pekerjaanFix = $req->pekerjaan;
        };

        $data = DB::table('transaksi_kuisioner_ikm')->insertGetId([
            'umur'  => $req->usia,
            'kel'   => $req->kel,
            'pendidikan'  => $req->pendidikan,
            'pekerjaan'   => $pekerjaanFix,
            'layanan'     => $req->layanan,
            'created_at'  => $req->tgl.' '.$req->jam,
            'updated_at'  => DB::RAW('now()')
        ]);

        return $data;
    }

    public static function simpanIkmDetail($req){
        return DB::table('transaksi_kuisioner_ikm_detail')->insert($req);
    }

    public static function getAllTransaksiByKet($ket, $tgl){
        if ($ket=='all'){
            $where = 'ket in (0,1)';
        }
        elseif($ket=='0'){
            $where = 'ket in (0)';
        }
        elseif($ket=='1'){
            $where = 'ket in (1)';
        };

        $sql = 'SELECT * FROM transaksi_kuisioner_ikm WHERE '.$where.' AND created_at LIKE "%'.$tgl.'%"';
        return DB::select($sql);
    }

    public static function getDetailResponden($id){
        return DB::table('transaksi_kuisioner_ikm')
                ->leftJoin('transaksi_kuisioner_ikm_detail','transaksi_kuisioner_ikm.id','=','transaksi_kuisioner_ikm_detail.kuisioner_ikm_id')
                ->leftJoin('pilihans','transaksi_kuisioner_ikm_detail.pilihan_id','=','pilihans.id')
                ->leftJoin('pertanyaans','pilihans.pertanyaan_id','=','pertanyaans.id')
                ->select('transaksi_kuisioner_ikm.*', 'transaksi_kuisioner_ikm_detail.*', 'pertanyaans.*', 'pilihans.*')
                ->where('transaksi_kuisioner_ikm.id',$id)
                ->get();
    }

    public static function getDetailRespondenAll($tgl){
        return DB::table('transaksi_kuisioner_ikm')
                ->leftJoin('transaksi_kuisioner_ikm_detail','transaksi_kuisioner_ikm.id','=','transaksi_kuisioner_ikm_detail.kuisioner_ikm_id')
                ->leftJoin('pilihans','transaksi_kuisioner_ikm_detail.pilihan_id','=','pilihans.id')
                ->leftJoin('pertanyaans','pilihans.pertanyaan_id','=','pertanyaans.id')
                ->select('transaksi_kuisioner_ikm.*', 'transaksi_kuisioner_ikm_detail.*', 'pertanyaans.*', 'pilihans.*')
                ->where('transaksi_kuisioner_ikm.created_at','LIKE','%'.$tgl.'%')
                ->get();
    }

    public static function getRespondenAll($tgl){
        return DB::table('transaksi_kuisioner_ikm')->where('created_at','LIKE','%'.$tgl.'%')->get();
    }

    public static function updateResponde($req, $id){
        return DB::table('transaksi_kuisioner_ikm')->where('id',$id)->update([
            'rating_pelayanan'  => $req->voting,
            'kritik_saran'      => $req->saran_kritik
        ]);
    }
}
