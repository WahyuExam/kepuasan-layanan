@extends('layout')
@section('content')
	
	<div class="page-inner mt--10">
	    <div class="row mt--2">
	        <div class="col-md-12">
	            <div class="card full-height">
	                <div class="card-body table-responsive">
						@include('partial.pesan')
						<form class="row" style="margin-bottom: 20px" method="post" action="/admin/laporan/index">
                        {{ csrf_field() }}
                          <div class="col-md-4">
                              <div class="input-group">
                                <input type="text" class="form-control" name="cari" id="cari" placeholder="Masukan Bulan" value="{{ $tgl }}" />
                                  <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                      <span class="fa fa-search"></span>
                                    </button>
                                  </span>
                              </div>
                          </div>
                        </form>
						
						<div id="isi">
							
						</div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>


@endsection

@section('plugins')
<link rel="stylesheet" href="/vendor/datepicker/css/datepicker.css" />
<script src="/vendor/datepicker/js/bootstrap-datepicker.js"></script>
<script>
    $(function(){
   		var day = {
            format : 'yyyy-mm',
            viewMode: "months",
            minViewMode: "months",
            autoClose: true
      	};

	    $('#cari').datepicker(day).on('changeDate', function(e){
	    	$(this).datepicker('hide');
	    });
   })
</script>
@endsection