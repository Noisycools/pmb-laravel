@extends('layouts.app')

@section('additionalCss')
    <style>
        .file-upload {
            display: block;
            text-align: center;
            font-family: Helvetica, Arial, sans-serif;
            font-size: 12px;
        }

        .file-upload .file-select {
            display: block;
            border: 2px solid #dce4ec;
            color: #34495e;
            cursor: pointer;
            height: 40px;
            line-height: 40px;
            text-align: left;
            background: #FFFFFF;
            overflow: hidden;
            position: relative;
        }

        .file-upload .file-select .file-select-button {
            background: #dce4ec;
            padding: 0 10px;
            display: inline-block;
            height: 40px;
            line-height: 40px;
        }

        .file-upload .file-select .file-select-name {
            line-height: 40px;
            display: inline-block;
            padding: 0 10px;
        }

        .file-upload .file-select:hover {
            border-color: #34495e;
            transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -webkit-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
        }

        .file-upload .file-select:hover .file-select-button {
            background: #34495e;
            color: #FFFFFF;
            transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -webkit-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
        }

        .file-upload.active .file-select {
            border-color: #3fa46a;
            transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -webkit-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
        }

        .file-upload.active .file-select .file-select-button {
            background: #3fa46a;
            color: #FFFFFF;
            transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -webkit-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
        }

        .file-upload .file-select input[type=file] {
            z-index: 100;
            cursor: pointer;
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            filter: alpha(opacity=0);
        }

        .file-upload .file-select.file-select-disabled {
            opacity: 0.65;
        }

        .file-upload .file-select.file-select-disabled:hover {
            cursor: default;
            display: block;
            border: 2px solid #dce4ec;
            color: #34495e;
            cursor: pointer;
            height: 40px;
            line-height: 40px;
            margin-top: 5px;
            text-align: left;
            background: #FFFFFF;
            overflow: hidden;
            position: relative;
        }

        .file-upload .file-select.file-select-disabled:hover .file-select-button {
            background: #dce4ec;
            color: #666666;
            padding: 0 10px;
            display: inline-block;
            height: 40px;
            line-height: 40px;
        }

        .file-upload .file-select.file-select-disabled:hover .file-select-name {
            line-height: 40px;
            display: inline-block;
            padding: 0 10px;
        }

        .form-check-input {
            position: absolute;

            margin-top: .3rem;
            margin-left: -1.25rem;
        }
    </style>
@endsection

@section('content')
    @include('layouts.headers.default')

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    @if ($cekDaftar != 0)
                        <div class="card-header border-0">
                            <h3 class="mb-0">{{ __('Silahkan Lakukan Pembayaran') }}</h3>
                        </div>
                    @else
                        <div class="card-header border-0">
                            <h3 class="mb-0">{{ __('Silahkan isi form berikut dengan sebenar-benarnya.') }}</h3>
                        </div>
                    @endif

                    <div class="card-body">

                        @if ($cekDaftar != 0)
                            tes
                            <form method="POST" action="#" id="formPembayaran">
                                @csrf
                                <div class="tab-content">

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="customRadio1">
                                        <label class="custom-control-label" for="customRadio1">BNI</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="customRadio2">
                                        <label class="custom-control-label" for="customRadio2">BRI</label>
                                    </div>

                                    <div class="row">
                                        <div class="d-flex justify-content-start mt-4">
                                            <button type="submit" id="btn-create" class="btn btn-success">Bayar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @else
                            <div id="smartwizard">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#step-1">
                                            <div class="num">1</div>
                                            Data Pribadi
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#step-2">
                                            <span class="num">2</span>
                                            Unggah Berkas Penting
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#step-3">
                                            <span class="num">3</span>
                                            Pilihan Program Studi
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="#step-4">
                                            <span class="num">4</span>
                                            Submit
                                        </a>
                                    </li>
                                </ul>
                                <form method="POST" action="{{ route('user.store') }}" id="formCreatePengguna"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="tab-content">
                                        <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                            <div class="row mt-4">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="name">Nama</label>
                                                        <input type="text" name="name"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            id="name" placeholder="Masukkan Nama" required
                                                            value="{{ old('name', auth()->user()->name) }}">
                                                        @error('name')
                                                            <div class="invalid_feedback">
                                                                <span class="text-danger"
                                                                    style="font-size: small">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="email">Email</label>
                                                        <input type="email" name="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            id="email" placeholder="Masukkan Email" required
                                                            value="{{ old('email', auth()->user()->email) }}">
                                                        @error('email')
                                                            <div class="invalid_feedback">
                                                                <span class="text-danger"
                                                                    style="font-size: small">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="alamat">Alamat</label>
                                                        <input type="text" name="alamat"
                                                            class="form-control @error('alamat') is-invalid @enderror"
                                                            id="alamat" placeholder="Masukkan Alamat">
                                                        @error('alamat')
                                                            <div class="invalid_feedback">
                                                                <span class="text-danger"
                                                                    style="font-size: small">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="telepon">No. Telp</label>
                                                        <input type="number" name="telepon"
                                                            class="form-control @error('telepon') is-invalid @enderror"
                                                            id="telepon" placeholder="Masukkan Nomor Telepon Aktif">
                                                        @error('telepon')
                                                            <div class="invalid_feedback">
                                                                <span class="text-danger"
                                                                    style="font-size: small">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="jenis_kelamin">Jenis
                                                            Kelamin</label>
                                                        <select name="jenis_kelamin" id="jenis_kelamin"
                                                            class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                                            style="width: 100%">
                                                            <option
                                                                @if (old('jenis_kelamin') == 'Laki-laki') {{ 'selected' }} @endif
                                                                value="Laki-laki">Laki-laki</option>
                                                            <option
                                                                @if (old('jenis_kelamin') == 'Perempuan') {{ 'selected' }} @endif
                                                                value="Perempuan">Perempuan</option>
                                                        </select>
                                                        @error('jenis_kelamin')
                                                            <div class="invalid_feedback">
                                                                <span class="text-danger"
                                                                    style="font-size: small">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="tanggal_lahir">Tanggal
                                                            Lahir</label>
                                                        <input type="text" name="tanggal_lahir"
                                                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                            id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir">
                                                        @error('tanggal_lahir')
                                                            <div class="invalid_feedback">
                                                                <span class="text-danger"
                                                                    style="font-size: small">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                                            <div class="row mt-4">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="file_ijazah" class="form-label">Ijazah Asli atau Surat
                                                            Keterangan Lulus SMA/MA/SMK/setara</label>
                                                        <div class="file-upload">
                                                            <div class="file-select"
                                                                style="border: 2px solid #dce4ec;@error('file_ijazah') border: 2px solid red !important @enderror">
                                                                <div class="file-select-button" id="fileName">Choose File
                                                                </div>
                                                                <div class="file-select-name" id="noFile">No file
                                                                    chosen...
                                                                </div>
                                                                <input type="file" name="file_ijazah"
                                                                    id="file_ijazah">
                                                            </div>
                                                        </div>
                                                        @error('file_ijazah')
                                                            <div class="invalid_feedback">
                                                                <span class="text-danger"
                                                                    style="font-size: small">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="file_kk" class="form-label">Kartu Keluarga (scan
                                                            asli)</label>
                                                        <div class="file-upload">
                                                            <div class="file-select"
                                                                style="border: 2px solid #dce4ec;@error('file_kk') border: 2px solid red !important @enderror">
                                                                <div class="file-select-button" id="fileName">Choose File
                                                                </div>
                                                                <div class="file-select-name" id="noFile">No file
                                                                    chosen...
                                                                </div>
                                                                <input type="file" name="file_kk" id="file_kk">
                                                            </div>
                                                        </div>
                                                        @error('file_kk')
                                                            <div class="invalid_feedback">
                                                                <span class="text-danger"
                                                                    style="font-size: small">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="file_pasfoto" class="form-label">Pas Foto Ukuran 3x4
                                                            (format .jpg)</label>
                                                        <div class="file-upload">
                                                            <div class="file-select"
                                                                style="border: 2px solid #dce4ec;@error('file_pasfoto') border: 2px solid red !important @enderror">
                                                                <div class="file-select-button" id="fileName">Choose File
                                                                </div>
                                                                <div class="file-select-name" id="noFile">No file
                                                                    chosen...
                                                                </div>
                                                                <input type="file" name="file_pasfoto"
                                                                    id="file_pasfoto">
                                                            </div>
                                                        </div>
                                                        @error('file_pasfoto')
                                                            <div class="invalid_feedback">
                                                                <span class="text-danger"
                                                                    style="font-size: small">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="file_butawarna" class="form-label">Surat Keterangan
                                                            Bebas
                                                            Buta Warna</label>
                                                        <div class="file-upload">
                                                            <div class="file-select"
                                                                style="border: 2px solid #dce4ec;@error('file_butawarna') border: 2px solid red !important @enderror">
                                                                <div class="file-select-button" id="fileName">Choose File
                                                                </div>
                                                                <div class="file-select-name" id="noFile">No file
                                                                    chosen...
                                                                </div>
                                                                <input type="file" name="file_butawarna"
                                                                    id="file_butawarna">
                                                            </div>
                                                        </div>
                                                        @error('file_butawarna')
                                                            <div class="invalid_feedback">
                                                                <span class="text-danger"
                                                                    style="font-size: small">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                                            Step content
                                        </div>
                                        <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                                            <div class="d-flex justify-content-start mt-4">
                                                <button type="submit" id="btn-create" class="btn btn-success">Submit
                                                    Data</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <!-- Include optional progressbar HTML -->
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('additionalJs')
        <script src="{{ asset('assets') }}/js/mahasiswa/pendaftaran.js"></script>
    @endsection
