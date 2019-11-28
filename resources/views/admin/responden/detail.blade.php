<table class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Pertanyaan</th>
		<th>Pilihan</th>
	</tr>

	<tr>
		@foreach($data as $no=>$dt)
			<tr>
				<td>{{ ++$no }}</td>
				<td>{{ $dt->pertanyaan }}</td>
				<td>{{ $dt->jawaban }}</td>
			</tr>
		@endforeach
	</tr>
</table>