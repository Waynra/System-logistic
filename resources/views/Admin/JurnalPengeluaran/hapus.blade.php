<div class="modal" id="deleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Hapus Pemasukan</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formHapusJurnalPemasukan">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="delete_id" id="delete_id">
                    <p>Apakah Anda yakin ingin menghapus data ini?</p>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="submit">Hapus</button>
                        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
