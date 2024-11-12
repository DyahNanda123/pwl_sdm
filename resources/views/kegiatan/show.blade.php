@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @if(empty($kegiatan) || !$kegiatan)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>ID</th>
                        <td>{{ $kegiatan->kegiatan_id }}</td>
                    </tr>
                    <tr>
                        <th>Kode Kegiatan</th>
                        <td>{{ $kegiatan->kegiatan_kode }}</td>
                    </tr>
                    <tr>
                        <th>Nama Kegiatan</th>
                        <td>{{ $kegiatan->kegiatan_nama }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $kegiatan->deskripsi }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Mulai</th>
                        <td>{{ $kegiatan->tanggal_mulai }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Selesai</th>
                        <td>{{ $kegiatan->tanggal_selesai }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $kegiatan->status }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kegiatan</th>
                        <td>{{ $kegiatan->jenis_kegiatan }}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>{{ $kegiatan->kategori->kategori_nama }}</td>
                    </tr>
                </table>
            @endif
            <a href="{{ url('kegiatan') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush