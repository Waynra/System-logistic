<div class="modal" id="editModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Edit Pengeluaran</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditJurnalPengeluaran">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="tanggal_pengeluaran">Tanggal Pengeluaran</label>
                        <input type="date" name="tanggal_pengeluaran" id="tanggal_pengeluaran" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="no_manifest">No Manifest</label>
                        <input type="text" name="no_manifest" id="no_manifest" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_pengeluaran">Jumlah Pengeluaran</label>
                        <input type="number" name="jumlah_pengeluaran" id="jumlah_pengeluaran" step="0.01" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
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
