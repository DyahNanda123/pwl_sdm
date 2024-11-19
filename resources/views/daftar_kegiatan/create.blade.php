@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('daftar_kegiatan') }}" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Nama Kegiatan</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan"
                            value="{{ old('nama_kegiatan') }}" required>
                        @error('nama_kegiatan')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Tanggal Pelaksanaan</label>
                    <div class="col-10">
                        <input type="date" class="form-control" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan"
                            value="{{ old('tanggal_pelaksanaan') }}" required>
                        @error('tanggal_pelaksanaan')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">PIC</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="PIC" name="PIC"
                            value="{{ old('PIC') }}" required>
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
                            <option value="progres" {{ old('status') == 'progres' ? 'selected' : '' }}>progres</option>
                            <option value="complete" {{ old('status') == 'complete' ? 'selected' : '' }}>complete</option>
                        </select>
                        @error('status')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row"> 
                    <label class="col-2 control-label col-form-label">Kategori</label>
                    <div class="col-10">
                        <select class="form-control" id="id_kategori" name="id_kategori" required>
                            <option value="">- Pilih Kategori -</option>
                            @foreach($kategoriList as $k)
                                <option value="{{ $k->id }}" 
                                        {{ old('id_kategori') == $k->id ? 'selected' : '' }}>
                                    {{ $k->id }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_kategori')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>                
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Deskripsi</label>
                    <div class="col-10">
                        <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3" required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label"></label>
                    <div class="col-10">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('daftar_kegiatan') }}">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
@endpush
