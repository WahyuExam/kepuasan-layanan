@extends('layout')
@section('content')

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="isi">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="page-inner mt--10">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body table-responsive">
                    <div class="card-title">List Responden</div><hr>

                        <form class="row" style="margin-bottom: 20px">
                          <div class="col-md-2">
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
                        
                        <div id="isiTable">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="3%"><center>No</center></th>
                                    <th><center>Tgl Isi</center></th>
                                    <th><center>Umur</center></th>
                                    <th><center>Kelamin</center></th>
                                    <th><center>Pendidikan</center></th>
                                    <th><center>Pekerjaan</center></th>
                                    <th><center>Layanan</center></th>
                                    <th><center>Tingkat Kepuasan</th>
                                    <th><center>Kritik dan Saran</center></th>
                                    <th width="5%"><center>Action</center></th>
                                </tr>

                                @foreach($getData as $no=>$list)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $list->created_at }}</td>
                                        <td>{{ $list->umur }}</td>
                                        <td>{{ $list->kel }}</td>
                                        <td>{{ $list->pendidikan }}</td>
                                        <td>{{ $list->pekerjaan }}</td>
                                        <td>{{ $list->layanan }}</td>
                                        <td>{{ $list->rating_pelayanan }}</td>
                                        <td>{{ $list->kritik_saran }}</td>

                                        <td>
                                            <form>
                                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                                <a href="/admin/list-hasil-responden-lihat-detail/{{ $list->id }}" id="lihat-data" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Lihat Hasil Kuisioner"><i class="far fa-clone fa-sm"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>                
                        </div>
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
        $('body').on('click', '#lihat-data', function(e){    
            e.preventDefault();
            var me  = $(this),
                url = me.attr('href');

            $.ajax({
                url: url, 
                dataType: 'html',
                success: function(data){
                    $('#isi').html(data);
                    $('#modal').modal('show');
                }
            });
        });
        
        var day = {
                format: 'yyyy-mm-dd',
                viewMode: 0,
                minViewMode: 0
            };
        $('#cari').datepicker(day).on('changeDate', function(e){
            $(this).datepicker('hide');
        });
    })
</script>
@endsection