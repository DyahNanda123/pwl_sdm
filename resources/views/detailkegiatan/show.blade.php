@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <button onclick="modalAction('{{ url('/detailkegiatan/import') }}')" class="btn btn-info">Import Data</button>
                <a href="{{ url('/detailkegiatan/export_excel') }}" class="btn btn-primary"><i class="fa fa-file-excel"></i> Export Excel</a>
                <a href="{{ url('/detailkegiatan/export_pdf') }}" class="btn btn-warning"><i class="fa fa-file-pdf').'\') }}"></i> Export PDF</a>
                <button onclick="modalAction('{{ url('/detailkegiatan/create_ajax') }}')" class="btn btn-success">Tambah Data (Ajax)</button>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <!-- Filter data -->
            <div id="filter" class="form-horizontal filter-date p-2 border-bottom mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-sm row text-sm mb-0">
                            <label for="filter_date" class="col-md-1 col-form-label">Filter</label>
                            <div class="col-md-3">
                                <select name="filter_kategori" class="form-control form-control-sm filter_kategori">
                                    <option value="">- Semua -</option>
                                    @foreach ($kategori as $k)
                                        <option value="{{ $k->kategori_id }}">{{ $k->kategori_nama }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Kategori Kegiatan</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-sm table-striped table-hover" id="table-detail-kegiatan">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kegiatan</th>
                        <th>NIP</th>
                        <th>Skor</th>
                        <th>Aksi</th> <!-- Tambahkan kolom aksi -->
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <div id="myModal" class="modal fade animate shake" tabindex="-1" data-backdrop="static" data-keyboard="false" data-width="75%"></div>
@endsection

@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }
        
        var tableDetailKegiatan;
        $(document).ready(function() {
            tableDetailKegiatan = $('#table_detailkegiatan').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "{{ url('detailkegiatan/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.filter_kategori = $('.filter_kategori').val();
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
                        data: "kegiatan.kegiatan_nama",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "nip",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "skor",
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

            $('#table_detailkegiatan_filter input').unbind().bind().on('keyup', function(e) {
                if (e.keyCode == 13) { // enter key
                    tableDetailKegiatan.search(this.value).draw();
                }
            });
            
            $('.filter_kategori').change(function() {
                tableDetailKegiatan.draw();
            });
        });
    </script>
@endpush