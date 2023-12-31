@extends('layouts.app')

@section('content')
    @include('layouts.headers.default')

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">{{ __('Buat Data Program Studi Baru') }}</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('programStudi.store') }}" id="formCreatePengguna">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="nama_program_studi">Nama Program
                                            Studi</label>
                                        <input type="text" name="nama_program_studi"
                                            class="form-control @error('nama_program_studi') is-invalid @enderror"
                                            id="nama_program_studi" placeholder="Masukkan Nama Program Studi" required>
                                        @error('nama_program_studi')
                                            <div class="invalid_feedback">
                                                <span class="text-danger" style="font-size: small">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="deskripsi">Deskripsi</label>
                                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukkan Deskripsi"
                                            name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                                        @error('deskripsi')
                                            <div class="invalid_feedback">
                                                <span class="text-danger" style="font-size: small">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="fakultas_jurusan_id">Fakultas Jurusan</label>
                                        <select name="fakultas_jurusan_id" id="fakultas_jurusan_id"
                                            class="form-control @error('fakultas_jurusan_id') is-invalid @enderror">
                                            @foreach ($fakultasJurusan as $r)
                                                <option @if (old('fakultas_jurusan_id') == $r->id) {{ 'selected' }} @endif
                                                    value="{{ $r->id }}">{{ $r->nama_fakultas_jurusan }}</option>
                                            @endforeach
                                        </select>
                                        @error('fakultas_jurusan_id')
                                            <div class="invalid_feedback">
                                                <span class="text-danger" style="font-size: small">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('programStudi.index') }}" class="btn btn-primary">Kembali</a>
                                <button type="submit" id="btn-create" class="btn btn-success">Buat Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additionalJs')
    <script src="{{ asset('assets') }}/js/stafPenerimaan/formProgramStudi.js"></script>
@endsection
