@extends('layout')
@section('content')
<div class="page-inner mt--10">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Inputan Pertanyaan</div><hr>

                    <form method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('pertanyaan') ? 'has-error' : '' }}">
                                    <label for="pertanyaan">Pertanyaan</label>
                                    <input type="text" class="form-control" name="pertanyaan" id="pertanyaan" value="{{ old('pertanyaan') }}">
                                    {!! $errors->first('pertanyaan','<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('unsur') ? 'has-error' : '' }}">
                                    <label for="unsur">Unsur Pelayanan</label>
                                    <input type="text" class="form-control" name="unsur" id="unsur" value="{{ old('unsur') }}">
                                    {!! $errors->first('unsur','<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label>Pilihan Jawaban</label>
                            <div class="input-group mb-3 {{ $errors->has('pil1') ? 'has-error' : '' }}">
                                <input type="text" class="form-control" name="pil1" id="pil1" placeholder="Inputkan Pilihan A" value="{{ old('pil1') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">1</span>
                                </div>
                            </div>
                            {!! $errors->first('pil1','<span class="text-danger">:message</span>') !!}

                            <div class="input-group mb-3 {{ $errors->has('pil2') ? 'has-error' : '' }}">
                                <input type="text" class="form-control" name="pil2" id="pil2" placeholder="Inputkan Pilihan B" value="{{ old('pil2') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">2</span>
                                </div>
                            </div>
                            {!! $errors->first('pil2','<span class="text-danger">:message</span>') !!}

                            <div class="input-group mb-3 {{ $errors->has('pil3') ? 'has-error' : '' }}">
                                <input type="text" class="form-control" name="pil3" id="pil3" placeholder="Inputkan Pilihan C" value="{{ old('pil3') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">3</span>
                                </div>
                            </div>
                            {!! $errors->first('pil3','<span class="text-danger">:message</span>') !!}

                            <div class="input-group mb-3 {{ $errors->has('pil4') ? 'has-error' : '' }}">
                                <input type="text" class="form-control" name="pil4" id="pil4" placeholder="Inputkan Pilihan D" value="{{ old('pil4') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">4</span>
                                </div>
                            </div>
                            {!! $errors->first('pil4','<span class="text-danger">:message</span>') !!}
                        </div>

                        <div class="col-md-12">
                            <div class="from-group">
                                <input type="submit" class="btn btn-primary btn-sm" value="Simpan">
                            </div>
                        </div>
                        
                    </form>
                    
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection