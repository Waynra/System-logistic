<!-- MODAL TAMBAH -->
<div class="modal fade" data-bs-backdrop="static" id="modaldemo8">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Tambah Armada</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama_armada" class="form-label">Nama Armada</label>
                    <input type="text" name="nama_armada" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                    <input type="text" name="jenis_kendaraan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="no_polisi" class="form-label">No Polisi</label>
                    <input type="text" name="no_polisi" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="kapasitas_muatan" class="form-label">Kapasitas Muatan</label>
                    <input type="number" step="0.01" name="kapasitas_muatan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="berat_maksimal" class="form-label">Berat Maksimal</label>
                    <input type="number" step="0.01" name="berat_maksimal" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="Aktif">Aktif</option>
                        <option value="Non-Aktif">Non-Aktif</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary d-none" id="btnLoader" type="button" disabled="">
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
                <button type="button" class="btn btn-primary" onclick="submitForm()">Simpan</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<script>
    function submitForm() {
        const data = {
            nama_armada: $("input[name='nama_armada']").val(),
            jenis_kendaraan: $("input[name='jenis_kendaraan']").val(),
            no_polisi: $("input[name='no_polisi']").val(),
            kapasitas_muatan: $("input[name='kapasitas_muatan']").val(),
            berat_maksimal: $("input[name='berat_maksimal']").val(),
            status: $("select[name='status']").val(),
            _token: '{{ csrf_token() }}'
        };

        $.ajax({
            type: 'POST',
            url: "{{ route('armada.store') }}",
            data: data,
            success: function(response) {
                $('#modaldemo8').modal('hide');
                alert(response.success);
                table.ajax.reload(null, false);
                reset();
            },
            error: function(response) {
                alert('Error: ' + response.responseJSON.message);
            }
        });
    }

    function reset() {
        $("input[name='nama_armada']").val('');
        $("input[name='jenis_kendaraan']").val('');
        $("input[name='no_polisi']").val('');
        $("input[name='kapasitas_muatan']").val('');
        $("input[name='berat_maksimal']").val('');
        $("select[name='status']").val('');
        setLoading(false);
    }

    function setLoading(bool) {
        if (bool == true) {
            $('#btnLoader').removeClass('d-none');
            $('#btnSimpan').addClass('d-none');
        } else {
            $('#btnSimpan').removeClass('d-none');
            $('#btnLoader').addClass('d-none');
        }
    }
</script>
