@extends('layouts.master')

@section('content')
    <div class="container">
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <span class="sr-only">Loading...</span>
            <img src="{{ asset('assetsm/vendors/svg-loaders/audio.svg') }}" class="me-4" style="width: 5rem" alt="audio">
        </div>
    </div>
    <div class="col-md-12">
        <div class="page-heading">
            <h3>Data Ruang Diskusi {{ $ruang->nama }}</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Nama ruang</label>
                    <input type="text" class="form-control " name="nama_ruang" value="{{ $ruang->nama_ruang     }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <input type="text" class="form-control " name="keterangan" value="{{ $ruang->keterangan     }}" readonly>
                </div>
               
                <div class="mb-3" align="right">
                    <a href="{{ route('ruang.index') }}" class="btn btn-dark" type="submit" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Kembali"><i class="bi bi-back"></i></a>
                    </div>
                </div>
            </div>
    </div>
@endsection
