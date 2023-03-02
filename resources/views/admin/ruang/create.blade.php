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
                        <form action="{{ route('ruang.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-3">
                                <label class="form-label">Nama Ruang</label>
                                <input type="text" class="form-control  @error('nama_ruang') is-invalid @enderror"
                                    name="nama_ruang">
                                @error('nama_ruang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <input type="text" class="form-control  @error('keterangan') is-invalid @enderror"
                                    name="keterangan">
                                @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto</label>
                                <input type="file" class="form-control  @error('image') is-invalid @enderror"
                                    name="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select class="form-control" type="status" name="status" id="exampleFormControlSelect1">
                                  <option selected hidden>Pilih Status</option>
                                  <option value="dipinjam">dipinjam</option>
                                  <option value="selesai">selesai</option>
                                </select>
                                </div> --}}
                                <div class="mb-3">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                        <a href="{{ route('ruang.index') }}" class="btn btn-secondary">Kembali</a>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection