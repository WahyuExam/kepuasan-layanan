@extends('layoutUser')
@section('content')
<!--==========================
    About Section
============================-->
<section id="about" class="wow fadeInUp">
<div class="container">
    <div class="row">
    <div class="col-lg-6 about-img">
        <img src={{ asset('vendor/reveal/img/11.jpg') }} alt="">
    </div>

    <div class="col-lg-6 content">
        <h2>JAM PELAYANAN KANTOR WILAYAH : </h2>
        
        <ul>
        <li><i class="ion-android-checkmark-circle"></i> SENIN s.d KAMIS : PUKUL 08:00 - 15:30 (WITA), ISTIRAHAT : PUKUL 12:00 - 13:00 (WITA)</li>
        <li><i class="ion-android-checkmark-circle"></i> JUM'AT : PUKUL 08:00 - 16:00 (WITA), ISTIRAHAT : PUKUL 12:00 - 13:00 (WITA)</li>
        <li><i class="ion-android-checkmark-circle"></i> SABTU & MINGGU : .......... LIBUR ..........</li>
        </ul>

    </div>
    </div>
</div>
</section><!-- #about -->

<!--==========================
Services Section
============================-->
<section id="services">
<div class="container">
    <div class="section-header">
    <h2>SILAHKAN MENGISI FORM SURVEI YANG SUDAH TERSEDIA</h2>
    </div>

    <div class="row">

    <div class="col-lg-6">
        <div class="box wow fadeInLeft">
        <div class="icon"><i class="fa fa-bar-chart"></i></div>
        <h4 class="title"><a href="/user/kuisioner-ikm">KUISIONER IKM</a></h4>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="box wow fadeInRight">
        <div class="icon"><i class="fa fa-bar-chart"></i></div>
        <h4 class="title"><a href="/user/kuisioner-ikm">KEPUASAN LAYANAN</a></h4>
        </div>
    </div>
    
    </div>
</div>
</section><!-- #services -->    
@endsection