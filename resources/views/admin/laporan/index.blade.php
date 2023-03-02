@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        <div class="mb-3">
                            <form action="{{ route('laporan.index') }}" method="get">
                            Dari
                            <input type="date" class="form-control  @error('jamu') is-invalid @enderror" name="dari">
                            Sampai
                            <input type="date" class="form-control  @error('jamu') is-invalid @enderror" name="sampai">
                                
                            </div>
                            <button type="submit">Cari data</button>
                        {{-- <a href="" class="btn btn-sm btn-primary" style="float: right">Cari Data</a> --}}
                        </form>
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
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($laporan as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nim }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->notes }}</td>
                                            <td>{{ $data->jamu }}</td>
                                            <td>{{ $data->jamse }}</td>
                                            <td>{{ $data->Ruang->nama_ruang }}</td>
                                            
                                            
                                            {{-- <td>
                                                <form action="{{ route('laporan.destroy', $data->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('laporan.edit', $data->id) }}"
                                                        class="btn btn-sm btn-outline-success">
                                                        Edit
                                                    </a> |
                                                    <a href="{{ route('laporan.show', $data->id) }}"
                                                        class="btn btn-sm btn-outline-warning">
                                                        Show
                                                    </a> |
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Apakah Anda Yakin?')">Delete
                                                    </button>
                                                </form>
                                            </td> --}}
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