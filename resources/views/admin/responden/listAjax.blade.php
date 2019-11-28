<table class="table table-bordered">
    <tr>
        <th width="3%"><center>No</center></th>
        <th><center>Tgl Isi</center></th>
        <th><center>Umur</center></th>
        <th><center>Kelamin</center></th>
        <th><center>Pendidikan</center></th>
        <th><center>Pekerjaan</center></th>
        <th><center>Layanan</center></th>
        <th><center>Ket</th>
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
            <td>
                @if($list->ket==0)
                    Kuisioner IKM
                @else
                    Kepuasan Pelayanan
                @endif
            </td>
            <td>
                <form>
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <a href="/admin/list-hasil-responden-lihat-detail/{{ $list->id }}" id="lihat-data" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Lihat Hasil Kuisioner"><i class="far fa-clone fa-sm"></i></a>
                </form>
            </td>
        </tr>
    @endforeach
</table>                