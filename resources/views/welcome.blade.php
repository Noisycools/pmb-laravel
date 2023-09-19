@extends('layouts.app', ['class' => 'bg-default'])

@section('additionalCss')
    <style>
        .btn {
            border: none;
            border-radius: 5px;
            color: #fff;
            text-transform: uppercase;
            padding-bottom: 15px;
            position: relative;
            background-image: linear-gradient(to top, #262626 0px, #404040 10px, #262626 10px, #333 100%);
        }

        .btn:hover {
            color: #fff;
        }

        .btn:after {
            content: "";
            width: 0;
            height: 10px;
            position: absolute;
            bottom: 0;
            left: 0;
            border-radius: 0 0 5px 5px;
            transition: all 0.35s ease 0s;
        }

        .btn:hover:after {
            width: 100%;
        }

        .btn.btn-sm {
            padding-bottom: 10px;
            background-image: linear-gradient(to top, #262626 0px, #404040 8px, #262626 8px, #333 100%);
        }

        .btn.btn-sm:after {
            height: 8px;
        }

        .btn.btn-xs {
            padding-bottom: 8px;
            background-image: linear-gradient(to top, #262626 0px, #404040 6px, #262626 6px, #333 100%);
        }

        .btn.btn-xs:after {
            height: 6px;
        }

        .btn.red:after {
            background: #ff6e6e;
        }

        .btn.blue:after {
            background: #5cbcf6;
        }

        .btn.orange:after {
            background: #ef965c;
        }

        .btn.green:after {
            background: #7ad79a;
        }

        @media only screen and (max-width: 767px) {
            .btn {
                margin-bottom: 20px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <img src="{{ asset('assets') }}/img/theme/student-vector.png">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">{{ __('Selamat datang di Website Penerimaan Mahasiswa Baru.') }}</h1>
                    </div>
                </div>
                <div class="row justify-content-center py-6">
                    <div class="col-sm-3">
                        <small class="text-white">{{ __('Klik Tombol Di Bawah Untuk Mendaftar Sebagai User Baru') }}</small>
                        <br>
                        <br>
                        <a href="{{ route('register.auth') }}" class="btn btn-lg red">Daftar Akun Baru</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
