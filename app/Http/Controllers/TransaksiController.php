<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DA\pertanyaan;
use App\DA\Transaksi;
use Alert;
use PDF;

class TransaksiController extends Controller
{
    public function formKuisionerIkmSimpan(Request $req){
        date_default_timezone_set('Asia/Makassar');
        $ket = false;
        foreach($req->all() as $tes){
            if ($tes==''){
                $ket = true;
            };
        };
        
        if ($ket==true){
            return back()->withInput()->with('alerts',[['type' => 'danger', 'text' => 'Semua Inputan Jangan Kosong']]); 
        };

        if ($req->kel==null OR $req->pekerjaan==null OR $req->pendidikan==null){
            return back()->withInput()->with('alerts',[['type' => 'danger', 'text' => 'Semua Inputan Jangan Kosong']]); 
        };

        // simpan responden
        $id = Transaksi::simpanResponden($req);
        
        // simpan pilihan
        $jawaban = array();
        $jmlPertanyaan = count(pertanyaan::getAllPertanyaan());
        for ($a=1; $a<=$jmlPertanyaan; $a++){
            $tanya = 'pertanyaan'.$a;
            if ($req->$tanya==''){
                return back()->withInput()->with('alerts',[['type' => 'danger', 'text' => 'Semua Inputan Jangan Kosong']]); 
            };

            array_push($jawaban, ([
                'kuisioner_ikm_id'  => $id,
                'pilihan_id'        => $req->$tanya,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ]));
        }

        Transaksi::simpanIkmDetail($jawaban);
        return redirect('/user/kuisioner-kepuasan-pelayanan/'.$id)->with('alerts',[['type' => 'success', 'text' => 'Kuisioner Berhasil Disimpan, Silahkan Lanjutan Mengisi Kuisioner Kualitas Pelayanan']]);
        
    }

    public function listResponden(Request $req, $tgl){
        if($req->has('cari')){
            $tgl = $req->input('cari');
        };
        $getData = Transaksi::getAllTransaksiByKet('all', $tgl);
        return view('admin.responden.list',compact('getData','tgl'));
    }

    public function listRespondenAjax($ket, $tgl){
        $getData = Transaksi::getAllTransaksiByKet($ket, $tgl);
        return view('admin.responden.listAjax',compact('getData','tgl'));   
    }

    public function lihatDetail($id){
        $data = Transaksi::getDetailResponden($id);
        return view('admin.responden.detail',compact('data'));
    }

    public function formLaporan(){
        $tgl = date('Y-m');
        return view('admin.laporan.form',compact('tgl'));
    }

    public function laporanIndex(Request $req){
        if ($req->has('cari')){
            $tgl = $req->input('cari');
        };

        $list    = array();
        $hasil   = array();
       
        $getData        = Transaksi::getDetailRespondenAll($tgl);
        $getResponden   = Transaksi::getRespondenAll($tgl);
        $getPertanyaan  = pertanyaan::getAllPertanyaan();

        if (count($getData)==0){
            return back()->with('alerts',[['type'=>'danger', 'text'=>'Data Tidak Ada']]);
        }
        else{
            foreach($getResponden as $responden){
                $jumlah = 0;
                foreach($getData as $data){
                    if ($responden->id == $data->kuisioner_ikm_id){
                        $hasil[$responden->id][] = [
                                                    'pertanyaan_id' => $data->pertanyaan_id,
                                                    'pertanyaan'    => $data->pertanyaan,
                                                    'pilihan_id'    => $data->pilihan_id,
                                                    'jawaban'       => $data->jawaban,
                                                    'nilai_jwb'     => $data->nilai_jwb
                                                    ];  
                    };

                };

                $list[] = [
                    'id_responden'  => $responden->id,
                    'umur'          => $responden->umur,
                    'kel'           => $responden->kel,
                    'pendidikan'    => $responden->pendidikan,
                    'pekerjaan'     => $responden->pekerjaan,
                    'layanan'       => $responden->layanan,
                    'list'          => $hasil[$responden->id]
                ];

            };

            $total  = array();
            $jmlResponden = count($getResponden);
            $nilaiIndex   = 0;

            foreach($getPertanyaan as $tanya){
                $jumlah       = 0;
                $nrrUnsur     = 0;
                $nrrTimbang   = 0;

                foreach($getData as $data){
                    if ($tanya->id == $data->pertanyaan_id){
                        $jumlah += $data->nilai_jwb;
                    }
                }
                $nrrUnsur   = $jumlah / $jmlResponden;
                $nrrTimbang = $nrrUnsur * 0.111;
                $nilaiIndex += $nrrTimbang;

                $total[] = [
                    'id'            => $tanya->id, 
                    'pertanyaan'    => $tanya->pertanyaan,
                    'unsur'         => $tanya->unsur,
                    'jumlah'        => $jumlah,
                    'nrrUnsur'      => number_format($nrrUnsur,4),
                    'nrrTimbang'    => number_format($nrrTimbang,4)
                ];
            }

            $nilaiIndex = $nilaiIndex * 25;
            
            if ($nilaiIndex >= 81.26){
                $nilaiMutu= 'A (Sangat Baik)';
            }
            elseif ($nilaiIndex >= 62.51 && $nilaiIndex <= 81.25){
                $nilaiMutu= 'B (Baik)';
            }
            elseif ($nilaiIndex >= 43.76 && $nilaiIndex <= 62.50){
                $nilaiMutu= 'C (Kurang Baik)';
            }
            elseif ($nilaiIndex >= 25 && $nilaiIndex <= 43.75){
                $nilaiMutu= 'D (Tidak Baik)';
            }
            else{
                $nilaiMutu= '-';
            }

            return view('admin.laporan.laporanIndexKepuasan',compact('tgl', 'list', 'getPertanyaan', 'total', 'nilaiIndex', 'nilaiMutu', 'getData'));
        }
    }

    public function cetakIndexPdf($tgl){
        $list    = array();
        $hasil   = array();
       
        $getData        = Transaksi::getDetailRespondenAll($tgl);
        $getResponden   = Transaksi::getRespondenAll($tgl);
        $getPertanyaan  = pertanyaan::getAllPertanyaan();

        foreach($getResponden as $responden){
            $jumlah = 0;
            foreach($getData as $data){
                if ($responden->id == $data->kuisioner_ikm_id){
                    $hasil[$responden->id][] = [
                                                'pertanyaan_id' => $data->pertanyaan_id,
                                                'pertanyaan'    => $data->pertanyaan,
                                                'pilihan_id'    => $data->pilihan_id,
                                                'jawaban'       => $data->jawaban,
                                                'nilai_jwb'     => $data->nilai_jwb
                                                ];  
                };

            };

            $list[] = [
                'id_responden'  => $responden->id,
                'umur'          => $responden->umur,
                'kel'           => $responden->kel,
                'pendidikan'    => $responden->pendidikan,
                'pekerjaan'     => $responden->pekerjaan,
                'layanan'       => $responden->layanan,
                'list'          => $hasil[$responden->id]
            ];

        };

        $total  = array();
        $jmlResponden = count($getResponden);
        $nilaiIndex   = 0;

        foreach($getPertanyaan as $tanya){
            $jumlah       = 0;
            $nrrUnsur     = 0;
            $nrrTimbang   = 0;

            foreach($getData as $data){
                if ($tanya->id == $data->pertanyaan_id){
                    $jumlah += $data->nilai_jwb;
                }
            }
            $nrrUnsur   = $jumlah / $jmlResponden;
            $nrrTimbang = $nrrUnsur * 0.111;
            $nilaiIndex += $nrrTimbang;

            $total[] = [
                'id'            => $tanya->id, 
                'pertanyaan'    => $tanya->pertanyaan,
                'unsur'         => $tanya->unsur,
                'jumlah'        => $jumlah,
                'nrrUnsur'      => number_format($nrrUnsur,4),
                'nrrTimbang'    => number_format($nrrTimbang,4)
            ];
        }

        $nilaiIndex = $nilaiIndex * 25;
        
        if ($nilaiIndex >= 81.26){
            $nilaiMutu= 'A (Sangat Baik)';
        }
        elseif ($nilaiIndex >= 62.51 && $nilaiIndex <= 81.25){
            $nilaiMutu= 'B (Baik)';
        }
        elseif ($nilaiIndex >= 43.76 && $nilaiIndex <= 62.50){
            $nilaiMutu= 'C (Kurang Baik)';
        }
        elseif ($nilaiIndex >= 25 && $nilaiIndex <= 43.75){
            $nilaiMutu= 'D (Tidak Baik)';
        }
        else{
            $nilaiMutu= '-';
        }

        $bulan = $this->getBulanIndo(date('m',strtotime($tgl)));
        $tahun = date('Y',strtotime($tgl));
            
        $pdf = PDF::loadview('admin.laporan.cetakPdfIndex',['tgl'=>$tgl, 'list'=>$list, 'getPertanyaan'=>$getPertanyaan, 'total'=>$total, 'nilaiIndex'=>$nilaiIndex, 'nilaiMutu'=>$nilaiMutu, 'getData'=>$getData, 'bulan'=>$bulan, 'tahun'=>$tahun])->setPaper('a4', 'landscape');;
        $detik = date('His');
        $name  = 'laporan-index-'.$detik;
        return $pdf->stream();

        // return view('admin.laporan.cetakPdfIndex');
    }

    public function formKuisionerkepuasanSimpan(Request $req, $id){
        if ($req->voting==''){
            return back()->withInput()->with('alerts',[['type'=>'danger', 'text'=>'Voting Tingkat Kepuasan Belum Dipilih']]);
        };

        if ($req->saran_kritik==''){
            return back()->withInput()->with('alerts',[['type'=>'danger', 'text'=>'Berikan Saran dan Kritik Anda']]);
        };

        Transaksi:: updateResponde($req, $id);
        Alert::success('Data Responde Berhasil Disimpan', 'Berhasil');
        return redirect('/');
    }

    private function getBulanIndo($bulan){
        if($bulan==1){
            $blnIndo = "Januari";
        }
        elseif($bulan==2){
            $blnIndo = "Februari";
        }
        elseif($bulan==3){
            $blnIndo = "Maret";
        }        
        elseif($bulan==4){
            $blnIndo = "April";
        }        
        elseif($bulan==5){
            $blnIndo = "Mei";
        }        
        elseif($bulan==6){
            $blnIndo = "Juni";
        }        
        elseif($bulan==7){
            $blnIndo = "Juli";
        }        
        elseif($bulan==8){
            $blnIndo = "Agustus";
        }        
        elseif($bulan==9){
            $blnIndo = "September";
        }        
        elseif($bulan==10){
            $blnIndo = "Oktober";
        }        
        elseif($bulan==11){
            $blnIndo = "November";
        }        
        elseif($bulan==12){
            $blnIndo = "Desember";
        };

        return $blnIndo;
    }

    public function jam(){
        date_default_timezone_set('Asia/Makassar');
        $jam = date("H:i:s"); 
 
        echo "Jam : $jam";
    }

    public function jam2(){
        date_default_timezone_set('Asia/Makassar');
        $jam = date("H:i:s"); 
 
        echo date('d-m-Y').' - '.$jam;
    }
}
