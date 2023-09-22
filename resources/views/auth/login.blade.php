@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <form role="form" method="POST" action="{{ route('login.auth') }}">
                            @csrf

                            <div class="form-group{{ $errors->has('no_telp') ? ' has-danger' : '' }} mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('no_telp') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Nomor Telpon') }}" type="text" name="no_telp"
                                        value="{{ old('no_telp') }}" value="{{ old('no_telp') }}" required autofocus>
                                </div>
                                @if ($errors->has('no_telp'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('no_telp') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" placeholder="{{ __('Password') }}" type="password" value="secret"
                                        required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" name="remember" id="customCheckLogin" type="checkbox"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customCheckLogin">
                                    <span class="text-muted">{{ __('Ingat Saya') }}</span>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">{{ __('Masuk') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-light">
                                <small>{{ __('Lupa Password?') }}</small>
                            </a>
                        @endif
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route('register.auth') }}" class="text-light">
                            <small>{{ __('Buat Akun Baru') }}</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
