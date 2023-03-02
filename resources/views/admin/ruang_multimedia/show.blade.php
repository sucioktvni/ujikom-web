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
            <h3>Data Ruang Multimedia {{ $ruang_multimedia->nama }}</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Nim</label>
                    <input type="number" class="form-control " name="nim" value="{{ $ruang_multimedia->nim }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control " name="name" value="{{ $ruang_multimedia->name }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">No PC</label>
                    <input type="number" class="form-control " name="no_pc" value="{{ $ruang_multimedia->no_pc }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kegiatan</label>
                    <input type="text" class="form-control " name="notes" value="{{ $ruang_multimedia->notes }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jam Mulai</label>
                    <input type="datetime-local" class="form-control " name="jamu" value="{{ $ruang_multimedia->jamu }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jam Selesai</label>
                    <input type="datetime-local" class="form-control " name="jamse" value="{{ $ruang_multimedia->jamse }}" readonly>
                </div>
                <div class="mb-3" align="right">
                    <a href="{{ route('ruang_multimedia.index') }}" class="btn btn-dark" type="submit" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Kembali"><i class="bi bi-back"></i></a>
                    </div>
                </div>
            </div>
    </div>
@endsection
