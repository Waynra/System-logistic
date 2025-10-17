<!-- MODAL HAPUS -->
<div class="modal fade" data-bs-backdrop="static" id="deleteModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Hapus Armada</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="idarmada">
                <p>Apakah Anda yakin ingin menghapus <b><span id="varmada"></span></b>?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger d-none" id="btnLoaderH" type="button" disabled="">
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
                <button type="button" class="btn btn-danger" onclick="deleteForm()">Hapus</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteForm() {
        const id = $("input[name='idarmada']").val();
        $.ajax({
            type: 'DELETE',
            url: '/admin/armada/delete/' + id,
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#deleteModal').modal('hide');
                alert(response.success);
                table.ajax.reload(null, false);
            },
            error: function(response) {
                alert('Error: ' + response.responseJSON.message);
            }
        });
    }

    function setLoading(bool) {
        if (bool == true) {
            $('#btnLoaderH').removeClass('d-none');
            $('#btnSimpanH').addClass('d-none');
        } else {
            $('#btnSimpanH').removeClass('d-none');
            $('#btnLoaderH').addClass('d-none');
        }
    }
</script>
