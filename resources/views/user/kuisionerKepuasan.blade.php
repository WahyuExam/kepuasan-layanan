@extends('layoutUser')
@section('content')
    <style type="text/css">
        .ukuran{
            padding-left: 50px;
        }
    </style>
    <form method="POST">
        {{ csrf_field() }}
        <section id="about" class="wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 about-img">
                    <center><h5>SILAHKAN PILIH TINGKAT KEPUASAN LAYANAN KAMI</h5>
                    <h5>KEPUASAN ANDA ADALAH PRIORITAS KAMI</h5></center><hr>
                    
                    @include('partial.pesan')                  
                    <section id="services">
                            <div class="container">                        
                                <div class="row">                        
                                    <div class="col-lg-12">
                                        <div class="box wow fadeInLeft">
                                            <form method="POST">
                                                {{ csrf_field() }}
                                                <center>
                                                    <a href="#" id="pilVoting1"><img src="{{ asset('vendor/img/4.png') }}" width="200px" height="200px" class="ukuran"></a>
                                                    <a href="#" id="pilVoting2""><img src="{{ asset('vendor/img/1.png') }}" width="200px" height="200px" class="ukuran"></a>
                                                    <a href="#" id="pilVoting3""><img src="{{ asset('vendor/img/3.png') }}" width="200px" height="200px" class="ukuran"></a>
                                                </center><br>
                                                <input type="hidden" name="voting" id="voting" value="{{ old('voting') }}">
                                                <center><h5><b>Kritik dan Saran</b></h5></center>
                                                <textarea class="form-control" rows="10" name="saran_kritik">{{ old('saran_kritik') }}</textarea><br>
                                                <input type="submit" class="btn btn-primary" value="Simpan">
                                            </form>

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
    <script>
        $(function(){
            $('#pilVoting1').on('click', function(e){
                e.preventDefault();
                $('#voting').val('Sangat Puas');

                swal({
                    type : 'success',
                    title : 'Tingkat Kepuasan "Sangat Puas" Terpilih', 
                })
            });

            $('#pilVoting2').on('click', function(e){
                e.preventDefault();
                $('#voting').val('Puas');

                swal({
                    type : 'success',
                    title : 'Tingkat Kepuasan "Puas" Terpilih', 
                })
            });

            $('#pilVoting3').on('click', function(e){
                e.preventDefault();
                $('#voting').val('Kurang Puas');

                swal({
                    type : 'success',
                    title : 'Tingkat Kepuasan "Kurang Puas" Terpilih', 
                })
            });
        })
    </script>
@endsection