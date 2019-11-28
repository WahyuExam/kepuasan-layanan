@extends('layoutUser')
@section('content')
    <form method="POST">
        {{ csrf_field() }}
        <section id="about" class="wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 about-img">
                    <center><h5>KUISIONER SURVEI KEPUASAN MASYARAKAT</h5>
                    <h5>PADA UNIT LAYANAN KANWIL KEMENKUMHAM KALSEL KOTA BANJARMASIN</h5></center><hr>
        
                    <center>
                        <div class="row">
                            <div class="col-lg-4">
                                Tanggal : 
                                <input type="text" name="tgl" id="tgl" placeholder="Masukan Bulan" value="{{ $tgl }}" />

                            </div>
                            <div class="col-lg-4">
                                No. Responden : {{ $noResponden }}
                            </div>
                            <div class="col-lg-4">
                                <div id="jam"></div>
                            </div>
                        </div>
                    </center><hr>

                    @include('partial.pesan')                  
                    <section id="services">
                        <div class="container">                        
                            <div class="row">                        
                                <div class="col-lg-12">
                                    <div class="box wow fadeInLeft">
                                        I. PROFIL<hr>

                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Usia</label>
                                                    <input type="text" name="usia" value="{{ old('usia') }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Jenis Kelamin : </label>
                                                    <input type="radio" name="kel" value="L">L
                                                    <input type="radio" name="kel" value="P">P

                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Pendidikan : </label>
                                            <input type="radio" name="pendidikan" value="SD">SD
                                            <input type="radio" name="pendidikan" value="SMP">SMP
                                            <input type="radio" name="pendidikan" value="SMA">SMA
                                            <input type="radio" name="pendidikan" value="S1">S1
                                            <input type="radio" name="pendidikan" value="S2">S2
                                            <input type="radio" name="pendidikan" value="S3">S3
                                        </div>

                                        <div class="form-group">
                                            <label>Pekerjaan : </label>
                                            <input type="radio" name="pekerjaan" class="pekerjaan" value="PNS">PNS
                                            <input type="radio" name="pekerjaan" class="pekerjaan" value="TNI">TNI
                                            <input type="radio" name="pekerjaan" class="pekerjaan" value="POLRI">POLRI
                                            <input type="radio" name="pekerjaan" class="pekerjaan" value="SWASTA">SWASTAS
                                            <input type="radio" name="pekerjaan" class="pekerjaan" value="WIRAUSAHA">WIRAUSAHA
                                            <input type="radio" name="pekerjaan" class="pekerjaan" value="LAIN">LAINNYA
                                            <input type="text" class="form-control" name="pekerjaanSimpan" id="pekerjaanSimpan" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Layanan Yang Diterima</label>
                                            <input type="text" name="layanan" class="form-control" value="{{ old('layanan') }}">
                                            <i>(misal : Paten, Hak Cipta, Perp, ITAS, Perpustakaan, dll)</i>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                    </section>

                    <section id="services">
                            <div class="container">                        
                                <div class="row">                        
                                    <div class="col-lg-12">
                                        <div class="box wow fadeInLeft">
                                            II. PENDAPAT RESPONDEN TENTANG PELAYANAN<br>
                                            <i>(Cheklis kode huruf sesuai jawaban masyarakat / responden)</i><hr>

                                            @foreach($pertanyaan as $no=>$p)
                                                <div class="card">
                                                    <div class="card-header">{{ ++$no }}. {{ $p }}</div>
                                                    <div class="card-body">
                                                        <?php
                                                            $ket = 'pertanyaan'.$no; 
                                                        ?>
                                                        @foreach($list[$p] as $no=>$jawaban)     
                                                            <?php 
                                                                if($no==0){
                                                                    $abjad = 'a';
                                                                }
                                                                elseif($no==1){
                                                                    $abjad = 'b';
                                                                }
                                                                elseif($no==2){
                                                                    $abjad = 'c';
                                                                }
                                                                elseif($no==3){
                                                                    $abjad = 'd';
                                                                };
                                                            ?>              
                                                            <input type="radio" value="{{ $jawaban['id'] }}" name="{{ $ket }}"> {{ $abjad }}. {{ $jawaban['jawaban'] }} <br>
                                                        @endforeach
                                                        
                                                    </div>
                                                </div><br>
                                            @endforeach

                                            <input type="submit" class="btn btn-primary btn-sm" value="Simpan">   
                                        </div>
                                    </div>                            
                                </div>
                            </div>
                        </section>
                </div>
            </div>
        </div>
        </section>
    </form>
@endsection
@section('plugins')
<link rel="stylesheet" href="/vendor/datepicker/css/datepicker.css" />
<script src="/vendor/datepicker/js/bootstrap-datepicker.js"></script>
<script>
    $(function(){
        $('.pekerjaan').on('click', function(){
            var nilai = $("input[name='pekerjaan']:checked").val();
            $('#pekerjaanSimpan').val(nilai);
            $('#pekerjaanSimpan').attr('disabled', true)
            if(nilai=="LAIN"){
                $('#pekerjaanSimpan').val("");
                $('#pekerjaanSimpan').removeAttr('disabled');
                $('#pekerjaanSimpan').focus();
            }
          
        });

        var day = {
            format: 'yyyy-mm-dd',
            viewMode: 0,
            minViewMode: 0
        };

        $('#tgl').datepicker(day).on('changeDate', function(e){
            $(this).datepicker('hide');
        });

        setInterval(function() {
            $('#jam').load('/jam?acak='+ Math.random());
        }, 1000);

    })
</script>
@endsection