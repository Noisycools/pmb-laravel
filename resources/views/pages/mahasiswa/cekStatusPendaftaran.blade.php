@extends('layouts.app')

@section('additionalCss')

@endsection

@section('content')
    @include('layouts.headers.default')

    {{-- modal --}}

    <div class="col-md-4">
        <div class="modal fade" id="modalNotificationSuccess" tabindex="-1" role="dialog" aria-labelledby="modalNotificationSuccess" aria-hidden="true">
          <div class="modal-dialog modal-white   modal-dialog-centered modal-" role="document">
            <div class="modal-content">
              <div class="modal-header">
              </div>
              <div class="modal-body">
                <div class="py-3 text-center">
                  <i class="ni ni-check-bold ni-3x text-success"></i>
                  <h4 class="text-gradient text-success mt-4">Pembayaran Berhasil!</h4>
                  <p>Pembayaran Anda telah berhasil!</p>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Oke, Lanjut!</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modalNotificationFail" tabindex="-1" role="dialog" aria-labelledby="modalNotificationFail" aria-hidden="true">
            <div class="modal-dialog modal-white   modal-dialog-centered modal-" role="document">
              <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                  <div class="py-3 text-center">
                    <i class="ni ni-fat-remove ni-3x text-danger"></i>
                    <h4 class="text-gradient text-danger mt-4">Pembayaran Gagal!</h4>
                    <p>Pembayaran Anda gagal, silahkan bayar dulu untuk melihat data!</p>
                  </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('formPendaftaranMahasiswa') }}" class="nav-link">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Oke, Lanjut!</button>
                    </a>
                </div>
              </div>
            </div>
          </div>
      </div>
@if ($status != false || $status === null)
      {{-- table content --}}
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">{{ __('Data Pengguna') }}</h3>
                    </div>
                    <div class="card-body">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
@endif

@endsection



@section('additionalJs')
      @if (session('success'))
      <script type="text/javascript">
        window.onload = () => {
          $('#modalNotificationSuccess').modal('show');
        }
      </script>
      @endif
      @if ($status === false)
      <script type="text/javascript">
        window.onload = () => {
          $('#modalNotificationFail').modal('show');
        }
      </script>
      @endif
@endsection
