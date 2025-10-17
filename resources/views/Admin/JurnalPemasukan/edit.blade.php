<div class="modal" id="editModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Edit Pemasukan</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditJurnalPemasukan">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="tanggal_pemasukan">Tanggal Pemasukan</label>
                        <input type="date" name="tanggal_pemasukan" id="tanggal_pemasukan" class="form-control" required>
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
                        <label for="jumlah_pemasukan">Jumlah Pemasukan</label>
                        <input type="number" name="jumlah_pemasukan" id="jumlah_pemasukan" step="0.01" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="Diterima">Diterima</option>
                            <option value="Belum Diterima">Belum Diterima</option>
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
