@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <b>Peminjaman ruang</b>
                        <a href="{{ route('ruang.create') }}" class="btn btn-sm btn-primary" style="float: right">
                            Tambah Data
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Ruang</th>
                                        <th>Keterangan</th>
                                        <th>Foto</th>
                                        {{-- <th>Status Ruangan</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($ruang as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_ruang }}</td>
                                            <td>{{ $data->keterangan }}</td>
                                            {{-- <td>{{ $data->image }}</td> --}}
                                            {{-- <td><span class="text-white text-whit btn btn-<?php echo $data['status'] == 1 ? 'succes' : 'danger' ?>"><?php echo $data['status'] == 1 ? 'selesai' : 'dipinjam'; ?></span></td> --}}
                                            <td>
                                                <img src="{{$data->image()}}" style="width: 100px; height:100px;"
                                                    alt="">
                                            </td>
                                            <td>
                                                <form action="{{ route('ruang.destroy', $data->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('ruang.edit', $data->id) }}"
                                                        class="btn btn-sm btn-outline-success">
                                                        Edit
                                                    </a> |
                                                    {{-- <a href="{{ route('ruang.show', $data->id) }}"
                                                        class="btn btn-sm btn-outline-warning">
                                                        Show
                                                    </a> | --}}
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