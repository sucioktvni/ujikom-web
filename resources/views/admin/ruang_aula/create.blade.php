@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" align="center">
                        Pinjam Ruangan 
                    </div>
                    <div class="card-body">
                        <form action="{{ route('ruang_aula.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">NIM</label>
                                <input type="number" class="form-control  @error('nim') is-invalid @enderror"
                                    name="nim">
                                @error('nip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Ruang</label>
                                <input type="text" class="form-control  @error('nama') is-invalid @enderror"
                                    name="nama">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                <label class="form-label">Kegiatan</label>
                                <input type="text" class="form-control  @error('notes') is-invalid @enderror"
                                        name="notes">
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
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                    <a href="{{ route('ruang_aula.index') }}" class="btn btn-secondary">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection