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
            <h3>Data Dari ruang diskusi {{ $ruang_aula->nama }}</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('ruang_aula.update', $ruang_aula->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="number" class="form-control  @error('nim') is-invalid @enderror"
                            name="nim" value="{{ $ruang_aula->nim }}">
                        @error('nip')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control  @error('nama') is-invalid @enderror"
                            name="nama" value="{{ $ruang_aula->nama }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                        <label class="form-label">notes</label>
                        <input type="text" class="form-control  @error('notes') is-invalid @enderror"
                                name="notes" value="{{ $ruang_aula->notes }}">
                            @error('notes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Waktu</label>
                            <input type="datetime-local" class="form-control  @error('waktu') is-invalid @enderror"
                                    name="waktu">
                                @error('waktu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    <div class="mb-3" align="right">
                        <button class="btn btn-primary" type="submit" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Simpan"><i class="bi bi-pen-fill"></i></button>
                        <a href="{{ route('ruang_aula.index') }}" class="btn btn-dark"data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Batal"><i class="bi bi-back"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
        
@endsection
