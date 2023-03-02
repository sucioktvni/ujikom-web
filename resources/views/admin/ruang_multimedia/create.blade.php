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
                        <form action="{{ route('ruang_multimedia.store') }}" method="post">
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
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                    name="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No PC</label>
                                <input type="number" class="form-control  @error('no_pc') is-invalid @enderror"
                                        name="no_pc">
                                    @error('no_pc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            <div class="mb-3">
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
                                <label class="form-label">Jam Mulai</label>
                                <input type="datetime-local" class="form-control  @error('jamu') is-invalid @enderror"
                                        name="jamu">
                                    @error('jamu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jam Selesai</label>
                                    <input type="datetime-local" class="form-control  @error('jamse') is-invalid @enderror"
                                            name="jamse">
                                        @error('jamse')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                    <a href="{{ route('ruang_multimedia.index') }}" class="btn btn-secondary">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection