@extends('layouts.app')

@section('content')
    @include('layouts.headers.default')

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">{{ __('Edit Data Pengguna') }}</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update', $user->id) }}" id="formEditPengguna">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="name">Nama</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" id="name"
                                            placeholder="Masukkan Nama" required value="{{ old('name', $user->name) }}">
                                        @error('name')
                                            <div class="invalid_feedback">
                                                <span class="text-danger" style="font-size: small">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Email</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            placeholder="Masukkan Email" required value="{{ old('email', $user->email) }}">
                                        @error('email')
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
                                        <label class="form-control-label" for="password">Buat Password Baru
                                            &nbsp;<small>(Isi
                                                kosong jika tidak ingin mengganti password)</small></label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            placeholder="Masukkan Password">
                                        @error('password')
                                            <div class="invalid_feedback">
                                                <span class="text-danger" style="font-size: small">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="konfirmasi-password">Konfirmasi
                                            Password</label>
                                        <input type="password" name="password_confirmation"
                                            class="form-control @error('password') is-invalid @enderror @error('password_confirmation') is-invalid @enderror"
                                            id="konfirmasi-password" placeholder="Ketik Ulang Password">
                                        @error('password')
                                            <div class="invalid_feedback">
                                                <span class="text-danger" style="font-size: small">{{ $message }}</span>
                                            </div>
                                        @enderror
                                        @error('password_confirmation')
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
                                        <label class="form-control-label" for="roles_id">Role</label>
                                        <select name="roles_id" id="roles_id"
                                            class="form-control @error('roles_id') is-invalid @enderror">
                                            @foreach ($roles as $r)
                                                <option @if (old('roles_id', $user->roles_id) == $r->id) {{ 'selected' }} @endif
                                                    value="{{ $r->id }}">{{ $r->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('roles_id')
                                            <div class="invalid_feedback">
                                                <span class="text-danger" style="font-size: small">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('user.index') }}" class="btn btn-primary">Kembali</a>
                                <button type="submit" id="btn-edit" class="btn btn-success">Edit Data</button>
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
