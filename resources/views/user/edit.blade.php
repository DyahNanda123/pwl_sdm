@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
        </div>
        <div class="card-body">
            {{-- Jika data user tidak ditemukan --}}
            @empty($user)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
                <a href="{{ url('user') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            @else
                {{-- Form untuk edit user --}}
                <form method="POST" action="{{ url('/user/' . $user->user_id) }}" class="form-horizontal">
                    @csrf
                    @method('PUT') {{-- Method untuk update data --}}
                    
                    {{-- Input NIP --}}
                    <div class="form-group row">
                        <label for="nip" class="col-2 col-form-label">NIP</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="nip" name="NIP"
                                   value="{{ old('NIP', $user->NIP) }}" required>
                            @error('NIP')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Input Nama --}}
                    <div class="form-group row">
                        <label for="nama" class="col-2 col-form-label">Nama</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="nama" name="nama"
                                   value="{{ old('nama', $user->nama) }}" required>
                            @error('nama')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Input Email --}}
                    <div class="form-group row">
                        <label for="email" class="col-2 col-form-label">Email</label>
                        <div class="col-10">
                            <input type="email" class="form-control" id="email" name="email"
                                   value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Input Password --}}
                    <div class="form-group row">
                        <label for="password" class="col-2 col-form-label">Password</label>
                        <div class="col-10">
                            <input type="password" class="form-control" id="password" name="password">
                            <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti password.</small>
                            @error('password')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Input Level/Role --}}
                    <div class="form-group row">
                        <label for="role" class="col-2 col-form-label">Role</label>
                        <div class="col-10">
                            <select class="form-control" id="role" name="level" required>
                                <option value="">- Pilih Level -</option>
                                @foreach($Level as $l)
                                    <option value="{{ $l->level_id }}" 
                                        {{ old('level', $user->level_id) == $l->level_id ? 'selected' : '' }}>
                                        {{ $l->level_nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('level')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Tombol Simpan --}}
                    <div class="form-group row">
                        <div class="col-10 offset-2">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a href="{{ url('user') }}" class="btn btn-sm btn-default ml-2">Kembali</a>
                        </div>
                    </div>
                </form>
            @endempty
        </div>
    </div>
@endsection

@push('css')
{{-- Tambahkan CSS tambahan jika diperlukan --}}
@endpush

@push('js')
{{-- Tambahkan JavaScript tambahan jika diperlukan --}}
@endpush
