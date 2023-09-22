@extends('layouts.app')

@section('content')
    @include('layouts.headers.default')

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">{{ __('Edit Data Fakultas Jurusan Baru') }}</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('fakultasJurusan.update', $fakultasJurusan->id) }}"
                            id="formEditPengguna">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="nama_fakultas_jurusan">Nama Fakultas
                                            Jurusan</label>
                                        <input type="text" name="nama_fakultas_jurusan"
                                            class="form-control @error('nama_fakultas_jurusan') is-invalid @enderror"
                                            id="nama_fakultas_jurusan" placeholder="Masukkan Nama Fakultas Jurusan" required
                                            value="{{ old('nama_fakultas_jurusan', $fakultasJurusan->nama_fakultas_jurusan) }}">
                                        @error('nama_fakultas_jurusan')
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
                                            name="deskripsi" id="deskripsi" cols="30" rows="10">{{ old('deskripsi', $fakultasJurusan->deskripsi) }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid_feedback">
                                                <span class="text-danger" style="font-size: small">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('fakultasJurusan.index') }}" class="btn btn-primary">Kembali</a>
                                <button type="submit" id="btn-create" class="btn btn-success">Edit Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additionalJs')
    <script src="{{ asset('assets') }}/js/admin/formPengguna.js"></script>
@endsection
