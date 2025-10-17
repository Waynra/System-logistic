<div class="modal" id="addModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Tambah Pengeluaran</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTambahJurnalPengeluaran">
                    @csrf
                    <div class="form-group">
                        <label for="tanggal_pengeluaran">Tanggal Pengeluaran</label>
                        <input type="date" name="tanggal_pengeluaran" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="no_manifest">No Manifest</label>
                        <input type="text" name="no_manifest" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_pengeluaran">Jumlah Pengeluaran</label>
                        <input type="number" name="jumlah_pengeluaran" step="0.01" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#formTambahJurnalPengeluaran').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: "{{ route('jurnal_pengeluaran.store') }}",
                data: $(this).serialize(),
                success: function(response) {
                    if(response.success) {
                        $('#addModal').modal('hide');
                        swal("Sukses!", response.success, "success");
                        $('#table-1').DataTable().ajax.reload();
                    } else {
                        swal("Error!", "Gagal menambah data pengeluaran.", "error");
                    }
                },
                error: function(response) {
                    swal("Error!", "Terjadi kesalahan. Silakan coba lagi.", "error");
                }
            });
        });
    });
</script>
