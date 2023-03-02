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
            <h3>Data Pinjam Ruang</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('PinjamRuang.update', $PinjamRuang->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="number" class="form-control  @error('nim') is-invalid @enderror"
                            name="nim" value="{{ $PinjamRuang->nim }}">
                        @error('nip')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control  @error('nama') is-invalid @enderror"
                            name="nama" value="{{ $PinjamRuang->nama }}">
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                        <label class="form-label">notes</label>
                        <input type="text" class="form-control  @error('notes') is-invalid @enderror"
                                name="notes" value="{{ $PinjamRuang->notes }}">
                            @error('notes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    <div class="mb-3">
                        <label class="form-label">Jam Mulai</label>
                        <input type="datetime-local" class="form-control  @error('jamu') is-invalid @enderror"
                                name="jamu" value="{{ $PinjamRuang->jamu }}">
                            @error('jamu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jam Selesai</label>
                            <input type="datetime-local" class="form-control  @error('jamse') is-invalid @enderror"
                                    name="jamse" value="{{ $PinjamRuang->jamse }}">
                                @error('jamse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ruang</label>

                                <select name="ruang_id" class="form-control @error('ruang') is-invalid @enderror">
                                    @php $no = 1; @endphp
                                    @foreach ($Ruangs as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_ruang }}</option>
                                    @endforeach
                                </select>
                            </div>
                           
                            <div class="mb-3">
                    <div class="mb-3">

                    <div class="mb-3" align="right">
                        <button class="btn btn-primary" type="submit" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Simpan"><i class="bi bi-pen-fill"></i></button>
                        <a href="{{ route('PinjamRuang.index') }}" class="btn btn-dark"data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Batal"><i class="bi bi-back"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
        
@endsection
