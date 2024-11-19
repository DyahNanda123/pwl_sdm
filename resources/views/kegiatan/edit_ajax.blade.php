@empty($kegiatan)
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                    Data yang anda cari tidak ditemukan
                </div>
                <a href="{{ url('/kegiatan') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@else
    <form action="{{ url('/kegiatan/' . $kegiatan->kegiatan_id . '/update_ajax') }}" method="POST" id="form-edit">
        @csrf
        @method('PUT')
        <div id="modal-master" class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!-- Kategori Kegiatan -->
                    <div class="form-group">
                        <label>Kategori Kegiatan</label>
                        <select name="kategori_id" id="kategori_id" class="form-control" required>
                            <option value="">- Pilih Kategori Kegiatan -</option>
                            @foreach ($kategori as $l)
                                <option {{ $l->kategori_id == $kegiatan->kategori_id ? 'selected' : '' }} value="{{ $l->kategori_id }}">{{ $l->kategori_nama }}</option>
                            @endforeach
                        </select>
                        <small id="error-kategori_id" class="error-text form-text text-danger"></small>
                    </div>
                    
                    <!-- Kode Kegiatan -->
                    <div class="form-group">
                        <label>Kode Kegiatan</label>
                        <input value="{{ old('kegiatan_kode', $kegiatan->kegiatan_kode) }}" type="text" name="kegiatan_kode" id="kegiatan_kode" class="form-control" required>
                        <small id="error-kegiatan_kode" class="error-text form-text text-danger"></small>
                    </div>
                    
                    <!-- Nama Kegiatan -->
                    <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <input value="{{ old('kegiatan_nama', $kegiatan->kegiatan_nama) }}" type="text" name="kegiatan_nama" id="kegiatan_nama" class="form-control" required>
                        <small id="error-kegiatan_nama" class="error-text form-text text-danger"></small>
                    </div>
                    
                    <!-- Tanggal Kegiatan -->
                    <div class="form-group">
                        <label>Tanggal Kegiatan</label>
                        <input value="{{ old('tanggal_kegiatan', $kegiatan->tanggal_kegiatan) }}" type="date" name="tanggal_kegiatan" id="tanggal_kegiatan" class="form-control" required>
                        <small id="error-tanggal_kegiatan" class="error-text form-text text-danger"></small>
                    </div>
                    
                    <!-- Tempat Kegiatan -->
                    <div class="form-group">
                        <label>Tempat Kegiatan</label>
                        <input value="{{ old('tempat_kegiatan', $kegiatan->tempat_kegiatan) }}" type="text" name="tempat_kegiatan" id="tempat_kegiatan" class="form-control" required>
                        <small id="error-tempat_kegiatan" class="error-text form-text text-danger"></small>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            $("#form-edit").validate({
                rules: {
                    kategori_id: {
                        required: true,
                        number: true
                    },
                    kegiatan_kode: {
                        required: true,
                        minlength: 3,
                        maxlength: 20
                    },
                    kegiatan_nama: {
                        required: true,
                        minlength: 3,
                        maxlength: 100
                    },
                    tanggal_kegiatan: {
                        required: true,
                        date: true
                    },
                    tempat_kegiatan: {
                        required: true,
                        minlength: 3,
                        maxlength: 100
                    }
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function(response) {
                            if (response.status) {
                                $('#myModal').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message
                                });
                                tableKegiatan.ajax.reload();
                            } else {
                                $('.error-text').text('');
                                $.each(response.msgField, function(prefix, val) {
                                    $('#error-' + prefix).text(val[0]);
                                });
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Terjadi Kesalahan',
                                    text: response.message
                                });
                            }
                        }
                    });
                    return false;
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endempty
