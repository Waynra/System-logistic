<!-- MODAL EDIT -->
<div class="modal fade" data-bs-backdrop="static" id="editModal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Edit Armada</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="idarmadaU">
                <div class="form-group">
                    <label for="nama_armada" class="form-label">Nama Armada</label>
                    <input type="text" name="nama_armadaU" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                    <input type="text" name="jenis_kendaraanU" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="no_polisi" class="form-label">No Polisi</label>
                    <input type="text" name="no_polisiU" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="kapasitas_muatan" class="form-label">Kapasitas Muatan</label>
                    <input type="number" step="0.01" name="kapasitas_muatanU" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="berat_maksimal" class="form-label">Berat Maksimal</label>
                    <input type="number" step="0.01" name="berat_maksimalU" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="status" class="form-label">Status</label>
                    <select name="statusU" class="form-control" required>
                        <option value="Aktif">Aktif</option>
                        <option value="Non-Aktif">Non-Aktif</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary d-none" id="btnLoaderU" type="button" disabled="">
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
                <button type="button" class="btn btn-primary" onclick="updateForm()">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<script>
    function updateForm() {
        const data = {
            id: $("input[name='idarmadaU']").val(),
            nama_armada: $("input[name='nama_armadaU']").val(),
            jenis_kendaraan: $("input[name='jenis_kendaraanU']").val(),
            no_polisi: $("input[name='no_polisiU']").val(),
            kapasitas_muatan: $("input[name='kapasitas_muatanU']").val(),
            berat_maksimal: $("input[name='berat_maksimalU']").val(),
            status: $("select[name='statusU']").val(),
            _token: '{{ csrf_token() }}'
        };

        $.ajax({
            type: 'POST',
            url: '/admin/armada/update/' + data.id,
            data: data,
            success: function(response) {
                $('#editModal').modal('hide');
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
        $("input[name='idarmadaU']").val('');
        $("input[name='nama_armadaU']").val('');
        $("input[name='jenis_kendaraanU']").val('');
        $("input[name='no_polisiU']").val('');
        $("input[name='kapasitas_muatanU']").val('');
        $("input[name='berat_maksimalU']").val('');
        $("select[name='statusU']").val('');
        setLoading(false);
    }

    function setLoading(bool) {
        if (bool == true) {
            $('#btnLoaderU').removeClass('d-none');
            $('#btnSimpanU').addClass('d-none');
        } else {
            $('#btnSimpanU').removeClass('d-none');
            $('#btnLoaderU').addClass('d-none');
        }
    }
</script>
