@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('daftar_kegiatan/create') }}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label" for="kategori_id">Filter:</label>
                        <div class="col-3">
                            <select class="form-control" id="kategori_id" name="kategori_id" required>
                                <option value="">- Semua -</option>
                                {{-- @foreach($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                @endforeach --}}
                            </select>
                            <small class="form-text text-muted">Kategori Kegiatan</small>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover table-sm" id="table_daftarkegiatan">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Kategori</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal Pelaksanaan</th>
                        <th>Deskripsi</th>
                        <th>PIC</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            var dataKegiatan = $('#table_daftarkegiatan').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('daftar_kegiatan/list') }}",
                    type: "POST",
                    data: function(d){
                        d.kategori_id = $('#kategori_id').val();
                    }
                },
                columns: [
                    {
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "id_kategori", // Menambahkan kolom id_kategori
                        className: "text-center",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "nama_kegiatan",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "tanggal_pelaksanaan",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "deskripsi", // Menambahkan deskripsi kegiatan
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "PIC",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "status",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "aksi",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            // Reload data ketika kategori filter berubah
            $('#kategori_id').on('change', function(){
                dataKegiatan.ajax.reload();
            });
        });
    </script>
@endpush
