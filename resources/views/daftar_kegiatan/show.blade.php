@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($user)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>ID Kegiatan</th>
                        <td>{{$kegiatan->id }}</td>
                    </tr>
                    <tr>
                        <th>Nama Kegiatan</th>
                        <td>{{ $kegiatan->nama_kegiatan }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Pelaksanaan</th>
                        <td>{{ $kegiatan->tanggal_pelaksanaan }}</td>
                    </tr>
                    <tr>
                        <th>PIC</th>
                        <td>{{ $kegiatan->PIC }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $kegiatan->status }}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>{{ $kegiatan->kategori->kategori_nama ?? '-' }}</td> <!-- Mengambil nama kategori dari relasi -->
                    </tr>
                    <!-- Menambahkan informasi kategori jika tersedia -->
                    <tr>
                        <th>ID Kategori</th>
                        <td>{{ $kegiatan->kategori_kegiatan->kategori_id }}</td> <!-- Menampilkan id_kategori -->
                    </tr>
                </table>
            @endempty
            <a href="{{ url('daftar_kegiatan') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')
@endpush
@push('js')
@endpush
