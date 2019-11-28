@extends('layout')
@section('content')
	
	<div class="page-inner mt--10">
	    <div class="row mt--2">
	        <div class="col-md-12">
	            <div class="card full-height">
	                <div class="card-body table-responsive">
						@include('partial.pesan')
						<form class="row" style="margin-bottom: 20px" action="/admin/laporan/form">
                          <div class="col-md-2">
                              <div class="input-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                      <span class="fa fa-reply"></span>
                                    </button>
                                  </span>
                              </div>
                          </div>
                        </form>
						
						<div id="isi">
							<table class="table table-bordered">
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
							
							<div class="row">
								<div class="col-md-6">
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

									<div class="card bg-light">
									  <div class="card-body">
									    <center>IKM UNIT PELAYANAN : {{ number_format($nilaiIndex,5) }}</center>
									    <center>MUTU PELAYANAN : {{ $nilaiMutu }}</center>
									  </div>
									</div>
									
									<table>
										<tr>
											<tr>Mutu Pelayanan:</tr>
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
								</div>

								<div class="col-md-6">
									<table class="table table-bordered">
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
									
								</div>
							</div>
							<hr>
							<a href="/admin/laporan/index/cetak-pdf/{{ $tgl  }}" class="btn btn-primary btn-sm">Download PDF</a>
							
						</div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>


@endsection