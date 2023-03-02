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
            <h3>Data Dari ruang  {{ $ruang->nama }}</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('ruang.update', $ruang->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                   
                    <div class="mb-3">
                        <label class="form-label">Nama Ruang</label>
                        <input type="text" class="form-control  @error('nama_ruang') is-invalid @enderror"
                            name="nama_ruang" value="{{ $ruang->nama_ruang }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <input type="text" class="form-control  @error('keterangan') is-invalid @enderror"
                            name="keterangan" value="{{ $ruang->keterangan }}">
                        @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Foto Ruangan</label>
                        <br>
                        <div class="mb-3">
                            <img src="{{$ruang->image()}}" style="width: 100px; height:100px;"
                                                    alt="">
                            <input type="file" class="form-control  @error('image') is-invalid @enderror"
                                name="image">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <hr>
                        {{-- <input type="file" name="image" class="form-control">
                        <p><strong>Biarkan kosong jika tidak ingin mengganti gambar</strong></p>
                        <p class="text-danger">{{ $errors->first('image') }}</p> --}}
                    </div>

                    {{-- <div class ="form-group">
                        <label for="exampleInputPassword1">Status Peminjaman</label>
                        <select name="status" class="form-control">
                               <option selected hidden>pilih Status</option>
                          <option value="dipinjam">Dipinjam</option>
                          <option value="selesai">selesai</option>
                        </select>
                        </div> --}}
                    <div class="mb-3" align="right">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{ route('ruang.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        
@endsection
