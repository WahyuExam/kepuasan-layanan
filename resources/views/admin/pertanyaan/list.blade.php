@extends('layout')
@section('content')

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
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
                <div class="card-body">
                    <div class="card-title">List Pertanyaan</div><hr>
                        <a href="/admin/create-pertanyaan" class="btn btn-primary btn-sm">Tambah Pertanyaan</a><br><br>
                        <table class="table table-bordered">
                            <tr>
                                <th width="5%"><center>No</center></th>
                                <th><center>Pertanyaan</center></th>
                                <th><center>Unsur Pelayanan</center></th>
                                <th width="12%"><center>Action</center></th>
                            </tr>

                            @foreach($getPertanyaan as $no=>$list)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $list->pertanyaan }}</td>
                                    <td>{{ $list->unsur }}</td>
                                    <td>
                                        <form>
                                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                            <a href="{{ route('ubah.pertanyaan',['id' => $list->id]) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah Data"><i class="far fa-edit fa-sm"></i></a>
                                            <a href="{{ route('lihat.pertanyaan',['id' => $list->id]) }}" id="lihat-data" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Lihat Data"><i class="far fa-clone fa-sm"></i></a>
                                            <a href="{{ route('hapus.pertanyaan',['id' => $list->id]) }}" id="hapus-data" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="hapus Data"><i class="fas fa-trash fa-sm"></i></a>
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
@endsection

@section('plugins')
<script>
    $(function(){
        $('body').on('click', '#lihat-data', function(e){
            e.preventDefault();
            var me = $(this),
                url = me.attr('href');
            
            $.ajax({
                url: url,
                dataType: 'html',
                success : function(data){
                    $('#isi').html(data);
                }           
            });
            $('#modal').modal('show');
        });

        $('body').on('click','#hapus-data', function(e){
            e.preventDefault();
            var token = $('#token').val(),
                me    = $(this),
                url   = me.attr('href');
            console.log(url);
            console.log(token)
            swal({
                title: 'Yakin Data Akan Dihapus?',
                type: 'warning',
                buttons:{
                    confirm: {
                        text : 'Ya',
                        className : 'btn btn-success'
                    },
                    cancel: {
                        text: 'Tidak',
                        visible: true,
                        className: 'btn btn-danger'
                    }
                }
            }).then(result=>{
                if(result){
                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(){
                            location.reload();

                            swal({
                                type : 'success',
                                title : 'Data Berhasil Dihapus'
                            });
                        }
                    })
                }
            })
        })
    })
</script>
@endsection