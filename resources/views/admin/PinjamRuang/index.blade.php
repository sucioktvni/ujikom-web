@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <b>Peminjaman Ruang</b>
                        {{-- <a href="{{ route('PinjamRuang.create') }}" class="btn btn-sm btn-primary" style="float: right"> --}}
                            {{-- Tambah Data --}}
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Kegiatan</th>
                                        <th>Waktu Mulai</th>
                                        <th>Waktu Selesai</th>
                                        <th>Ruangan</th>
                                        {{-- <th>Status Ruangan</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($PinjamRuang as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nim }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->notes }}</td>
                                            <td>{{ $data->jamu }}</td>
                                            <td>{{ $data->jamse }}</td>
                                            <td>{{ $data->Ruang->nama_ruang }}</td>
                                            {{-- <td><span class="text-white text-whit btn btn-<?php echo $data['status'] == 1 ? 'succes' : 'danger' ?>"><?php echo $data['status'] == 1 ? 'selesai' : 'dipinjam'; ?></span></td> --}}
                                            {{-- <td>
                                                <img src="{{ $data->image() }}" style="width: 100px; height:100px;"
                                                    alt="">
                                            </td> --}}
                                            <td>
                                                <form action="{{ route('PinjamRuang.destroy', $data->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    {{-- <a href="{{ route('PinjamRuang.edit', $data->id) }}"
                                                        class="btn btn-sm btn-outline-success">
                                                        Edit
                                                    </a> | --}}
                                                    <a href="{{ route('PinjamRuang.show', $data->id) }}"
                                                        class="btn btn-sm btn-outline-warning">
                                                        Show
                                                    </a> |
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Apakah Anda Yakin?')">Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection