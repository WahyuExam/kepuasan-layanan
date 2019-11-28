<!DOCTYPE html>
<html lang="en">
<body>
	<center>
		<h5>PENGOLAHAN INDEX KEPUASAN MASYARAKAT PER RESPONDEN<br>DAN PER UNSUR PELAYANAN</h5>
	</center>	
	<table align="center">
		<tr>
			<td width="40%">Bulan</td><td>:</td><td>{{ $bulan }} {{ $tahun }}</td>
		</tr>

		<tr>
			<td>Unit Pelayanan</td>
			<td>:</td>
			<td>Kanwil Kemenkumham Kalimantan Selatana</td>
		</tr>

		<tr>
			<td>Alamat</td><td>:</td>
			<td>Jl. Brigjend.Hasan Basri No.30 Kayutangi</td>
		</tr>

		<tr>
			<td>Tlp/Fak</td><td>:</td>
			<td>0511 - 3300401</td>
		</tr>
	</table>

	<table border="1" width="100%">
		<tr>
			<th rowspan="2" width="2%">No.Responden</th>
			<th rowspan="2">Usia</th>
			<th rowspan="2">Jenis Kelamin</th>
			<th rowspan="2">Pekerjaan</th>
			<th rowspan="2">Pendidikan</th>
			<th colspan="{{ count($getPertanyaan) }}" style="text-align: center">Nilai Unsur Pelayanan</th>
		</tr>

		<tr>
			@foreach($getPertanyaan as $no=>$tanya)
				<td>U{{ ++$no }}</td>
			@endforeach
		</tr>
			
		@foreach($list as $no=>$ls)
			<tr>
				<td>{{ ++$no }}</td>
				<td>{{ $ls['umur'] }}</td>
				<td>{{ $ls['kel'] }}</td>
				<td>{{ $ls['pekerjaan'] }}</td>
				<td>{{ $ls['pendidikan'] }}</td>
				
				@foreach($ls['list'] as $nilai)
					<td>{{ $nilai['nilai_jwb'] ?: '0'}}</td>
				@endforeach
			

			</tr>
		@endforeach
		<tr>
			<td colspan="5">Total Nilai</td>
			@foreach($total as $ttl)
				<td>{{ $ttl['jumlah'] }}</td>
			@endforeach
		</tr>

		<tr>
			<td colspan="5">NRR/Unsur</td>
			@foreach($total as $ttl)
				<td>{{ $ttl['nrrUnsur'] }}</td>
			@endforeach
		</tr>

		<tr>
			<td colspan="5">NRR Tertimbang/Unsur</td>
			@foreach($total as $ttl)
				<td>{{ $ttl['nrrTimbang'] }}</td>
			@endforeach
		</tr>
				
	</table>

	<table width="100%">
		<tr>
			<td>
				<table>
					<tr>
						<td>Keterangan:</td>
					</tr>

					<tr>
						<td>NRR/Unsur</td>
						<td>:</td>
						<td>Jumlah Nilai Per Unsur Dibagi Jumlah Kuisioner yang Terisi</td>
					</tr>

					<tr>
						<td>NRR Tertimbang/Unsur</td>
						<td>:</td>
						<td>NRR/Unsur x 0.111</td>
					</tr>
				</table><br>

			    <center>IKM Unit Pelayanan : <strong>{{ number_format($nilaiIndex,5) }}</strong><br>
			    Mutu Pelayanan : <strong>{{ $nilaiMutu }}</strong></center><br>
				<table>
					<tr>
						<td>Ket:</td>
					</tr>
					<tr>
						<td>A (Sangat Baik)</td>
						<td>:</td>
						<td>81,26 - 100,00</td>
					</tr>

					<tr>
						<td>B (Baik)</td>
						<td>:</td>
						<td>62,51 - 81,25</td>
					</tr>

					<tr>
						<td>C (Kurang Baik)</td>
						<td>:</td>
						<td>43,76 - 62,50</td>
					</tr>

					<tr>
						<td>D (Tidak Baik)</td>
						<td>:</td>
						<td>25,00 - 43,75</td>
					</tr>
				</table>			  	

			</td>

			<td valign="top">
				<table width="100%" border="1">
					<tr>
						<td>No</td>
						<td>Unsur Pelayanan</td>
						<td>Nilai Rata-Rata</td>
					</tr>

					@foreach($total as $no=>$ttl)
						<tr>
							<td>U{{ ++$no }}</td>
							<td>{{ $ttl['unsur'] }}</td>
							<td>{{ $ttl['nrrUnsur'] }}</td>
						</tr>
					@endforeach
				</table>
			</td>
		</tr>
	</table>



	
	
</body>
</html>