<!-- MODAL EDIT -->
<div class="modal fade" data-bs-backdrop="static" id="Umodaldemo8">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Ubah Supir</h6><button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="idsupirU">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tglU" class="form-label">Tanggal <span class="text-danger">*</span></label>
                            <input type="text" name="tglU" class="form-control datepicker-date" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="namaU" class="form-label">Nama Supir <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="namaU" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="asalU" class="form-label">Asal <span class="text-danger">*</span></label>
                            <input type="text" name="asalU" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="tujuanU" class="form-label">Tujuan <span class="text-danger">*</span></label>
                            <input type="text" name="tujuanU" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tagihanU" class="form-label">Tagihan <span class="text-danger">*</span></label>
                            <input type="number" value="0" name="tagihanU" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="bayarU" class="form-label">Bayar <span class="text-danger">*</span></label>
                            <input type="number" value="0" name="bayarU" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="statusU" class="form-label">Status <span class="text-danger">*</span></label>
                            <select name="statusU" class="form-control form-select">
                                <option value="Belum Lunas">Belum Lunas</option>
                                <option value="Lunas">Lunas</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success d-none" id="btnLoaderU" type="button" disabled="">
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
                <a href="javascript:void(0)" onclick="checkFormU()" id="btnSimpanU" class="btn btn-success">Simpan
                    Perubahan <i class="fe fe-check"></i></a>
                <a href="javascript:void(0)" class="btn btn-light" onclick="resetU()" data-bs-dismiss="modal">Batal <i
                        class="fe fe-x"></i></a>
            </div>
        </div>
    </div>
</div>

@section('formEditJS')
    <script>
        function checkFormU() {
            const tgl = $("input[name='tglU']").val();
            const nama = $("input[name='namaU']").val();
            const asal = $("input[name='asalU']").val();
            const tujuan = $("input[name='tujuanU']").val();
            const tagihan = $("input[name='tagihanU']").val();
            const bayar = $("input[name='bayarU']").val();
            setLoadingU(true);
            resetValidU();

            if (tgl == "") {
                validasi('Tanggal wajib di isi!', 'warning');
                $("input[name='tglU']").addClass('is-invalid');
                setLoadingU(false);
                return false;
            }else if (nama == "") {
                validasi('Nama Supir wajib di isi!', 'warning');
                $("input[name='namaU']").addClass('is-invalid');
                setLoadingU(false);
                return false;
            } else if (asal == "") {
                validasi('Asal wajib di isi!', 'warning');
                $("input[name='asalU']").addClass('is-invalid');
                setLoadingU(false);
                return false;
            } else if (tujuan == "") {
                validasi('Tanggal wajib di isi!', 'warning');
                $("input[name='tujuanU']").addClass('is-invalid');
                setLoadingU(false);
                return false;
            } else if (tagihan == "") {
                validasi('Tagihan wajib di isi!', 'warning');
                $("input[name='tagihanU']").addClass('is-invalid');
                setLoadingU(false);
                return false;
            } else if (bayar == "") {
                validasi('Bayar wajib di isi!', 'warning');
                $("input[name='bayarU']").addClass('is-invalid');
                setLoadingU(false);
                return false;
            } else {
                submitFormU();
            }
        }

        function submitFormU() {
            let id = $("input[name='idsupirU']").val();
            let tgl = $("input[name='tglU']").val();
            let nama = $("input[name='namaU']").val();
            let asal = $("input[name='asalU']").val();
            let tujuan = $("input[name='tujuanU']").val();
            let tagihan = $("input[name='tagihanU']").val();
            let bayar = $("input[name='bayarU']").val();
            let status = $("select[name='statusU']").val();

            $.ajax({
                type: 'POST',
                url: "{{ url('admin/supir/proses_ubah') }}/" + id,
                enctype: 'multipart/form-data',
                data: {
                    tgl: tgl,
                    nama: nama,
                    asal: asal,
                    tujuan: tujuan,
                    tagihan: tagihan,
                    bayar: bayar,
                    status: status,
                },
                success: function(data) {
                    swal({
                        title: "Berhasil diubah!",
                        type: "success"
                    });
                    $('#Umodaldemo8').modal('toggle');
                    table.ajax.reload(null, false);
                    resetU();
                }
            });
        }

        function resetValidU() {
            $("input[name='tglU']").removeClass('is-invalid');
            $("input[name='namaU']").removeClass('is-invalid');
            $("input[name='asalU']").removeClass('is-invalid');
            $("input[name='tujuanU']").removeClass('is-invalid');
            $("input[name='tagihanU']").removeClass('is-invalid');
            $("input[name='bayarU']").removeClass('is-invalid');
        };

        function resetU() {
            resetValidU();
            $("input[name='idsupirU']").val('');
            $("input[name='tglU']").val('');
            $("input[name='namaU']").val('');
            $("input[name='asalU']").val('');
            $("input[name='tujuanU']").val('');
            $("input[name='tagihanU']").val(0);
            $("input[name='bayarU']").val(0);
            $("select[name='statusU']").val('Belum Lunas');
            setLoadingU(false);
        }

        function setLoadingU(bool) {
            if (bool == true) {
                $('#btnLoaderU').removeClass('d-none');
                $('#btnSimpanU').addClass('d-none');
            } else {
                $('#btnSimpanU').removeClass('d-none');
                $('#btnLoaderU').addClass('d-none');
            }
        }
    </script>
@endsection
