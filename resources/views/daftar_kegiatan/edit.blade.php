@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($daftar_kegiatan)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
                <a href="{{ url('daftarkegiatan') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            @else
                <form method="POST" action="{{ url('/daftarkegiatan/' . $kegiatan->id) }}" class="form-horizontal">
                    @csrf
                    {!! method_field('PUT') !!}
                    <div class="form-group row">
                        <label class="col-2 control-label col-form-label">Nama Kegiatan</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan"
                                value="{{ old('nama_kegiatan', $daftar_kegiatan->nama_kegiatan) }}" required>
                            @error('nama_kegiatan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 control-label col-form-label">Tanggal Pelaksanaan</label>
                        <div class="col-10">
                            <input type="date" class="form-control" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan"
                                value="{{ old('tanggal_pelaksanaan', $daftar_kegiatan->tanggal_pelaksanaan) }}" required>
                            @error('tanggal_pelaksanaan')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 control-label col-form-label">PIC</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="PIC" name="PIC"
                                value="{{ old('PIC', $daftar_kegiatan->PIC) }}" required>
                            @error('PIC')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 control-label col-form-label">Status</label>
                        <div class="col-10">
                            <select class="form-control" id="status" name="status" required>
                                <option value="">- Pilih Status -</option>
                                <option value="Progress" {{ old('status', $daftar_kegiatan->status) == 'Progress' ? 'selected' : '' }}>Progress</option>
                                <option value="Complete" {{ old('status', $daftar_kegiatan->status) == 'Complete' ? 'selected' : '' }}>Complete</option>
                            </select>
                            @error('status')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 control-label col-form-label">Kategori</label>
                        <div class="col-10">
                            <select class="form-control" id="kategori_id" name="kategori_id" required>
                                <option value="">- Pilih Kategori -</option>
                                @foreach($kategori as $item)
                                    <option value="{{ $item->id }}" {{ old('kategori_id', $daftar_kegiatan->kategori_id) == $item->id ? 'selected' : '' }}>{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 control-label col-form-label"></label>
                        <div class="col-10">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a class="btn btn-sm btn-default ml-1" href="{{ url('daftarkegiatan') }}">Kembali</a>
                        </div>
                    </div>
                </form>
            @endempty
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
@endpush
