@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('kegiatan') }}" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label" for="nama_kegiatan">Nama Kegiatan</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan"
                            value="{{ old('nama_kegiatan') }}" required>
                        @error('nama_kegiatan')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-1 control-label col-form-label" for="kategori_id">Kategori Kegiatan</label>
                    <div class="col-11">
                        <select class="form-control" id="kategori_id" name="kategori_id" required>
                            <option value="">- Pilih Kategori -</option>
                            {{-- @foreach($kategori as $item) --}}
                                {{-- <option value="{{ $item->kategori_id }}" {{ old('kategori_id') == $item->kategori_id ? 'selected' : '' }}>
                                    {{ $item->kategori_nama }}
                                </option>
                            @endforeach --}}
                        </select>
                        @error('kategori_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-1 control-label col-form-label" for="tanggal_pelaksanaan">Tanggal Pelaksanaan</label>
                    <div class="col-11">
                        <input type="date" class="form-control" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan"
                            value="{{ old('tanggal_pelaksanaan') }}" required>
                        @error('tanggal_pelaksanaan')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-1 control-label col-form-label" for="detail_kegiatan">Detail Kegiatan</label>
                    <div class="col-11">
                        <textarea class="form-control" id="detail_kegiatan" name="detail_kegiatan" rows="4" required>{{ old('detail_kegiatan') }}</textarea>
                        @error('detail_kegiatan')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('kegiatan') }}">Kembali</a>
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
