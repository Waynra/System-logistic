<!-- MODAL TAMBAH -->
<div class="modal fade" data-bs-backdrop="static" id="modaldemo8">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Tambah Supir</h6><button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl" class="form-label">Tanggal <span class="text-danger">*</span></label>
                            <input type="text" name="tgl" class="form-control datepicker-date" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama Supir <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="asal" class="form-label">Asal <span class="text-danger">*</span></label>
                            <input type="text" name="asal" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="tujuan" class="form-label">Tujuan <span class="text-danger">*</span></label>
                            <input type="text" name="tujuan" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tagihan" class="form-label">Tagihan <span class="text-danger">*</span></label>
                            <input type="number" value="0" name="tagihan" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="bayar" class="form-label">Bayar <span class="text-danger">*</span></label>
                            <input type="number" value="0" name="bayar" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-control form-select">
                                <option value="Belum Lunas">Belum Lunas</option>
                                <option value="Lunas">Lunas</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary d-none" id="btnLoader" type="button" disabled="">
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
                <a href="javascript:void(0)" onclick="checkForm()" id="btnSimpan" class="btn btn-primary">Simpan <i
                        class="fe fe-check"></i></a>
                <a href="javascript:void(0)" class="btn btn-light" onclick="reset()" data-bs-dismiss="modal">Batal <i
                        class="fe fe-x"></i></a>
            </div>
        </div>
    </div>
</div>


@section('formTambahJS')
    <script>
        function checkForm() {
            const tgl = $("input[name='tgl']").val();
            const nama = $("input[name='nama']").val();
            const asal = $("input[name='asal']").val();
            const tujuan = $("input[name='tujuan']").val();
            const tagihan = $("input[name='tagihan']").val();
            const bayar = $("input[name='bayar']").val();
            setLoading(true);
            resetValid();

            if (tgl == "") {
                validasi('Tanggal wajib di isi!', 'warning');
                $("input[name='tgl']").addClass('is-invalid');
                setLoading(false);
                return false;
            }else if (nama == "") {
                validasi('Nama Supir wajib di isi!', 'warning');
                $("input[name='nama']").addClass('is-invalid');
                setLoading(false);
                return false;
            } else if (asal == "") {
                validasi('Asal wajib di isi!', 'warning');
                $("input[name='asal']").addClass('is-invalid');
                setLoading(false);
                return false;
            } else if (tujuan == "") {
                validasi('Tanggal wajib di isi!', 'warning');
                $("input[name='tujuan']").addClass('is-invalid');
                setLoading(false);
                return false;
            } else if (tagihan == "") {
                validasi('Tagihan wajib di isi!', 'warning');
                $("input[name='tagihan']").addClass('is-invalid');
                setLoading(false);
                return false;
            } else if (bayar == "") {
                validasi('Bayar wajib di isi!', 'warning');
                $("input[name='bayar']").addClass('is-invalid');
                setLoading(false);
                return false;
            } else {
                submitForm();
            }

        }

        function submitForm() {
            let tgl = $("input[name='tgl']").val();
            let nama = $("input[name='nama']").val();
            let asal = $("input[name='asal']").val();
            let tujuan = $("input[name='tujuan']").val();
            let tagihan = $("input[name='tagihan']").val();
            let bayar = $("input[name='bayar']").val();
            let status = $("select[name='status']").val();

            $.ajax({
                type: 'POST',
                url: "{{ route('supir.store') }}",
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
                    $('#modaldemo8').modal('toggle');
                    swal({
                        title: "Berhasil ditambah!",
                        type: "success"
                    });
                    table.ajax.reload(null, false);
                    reset();

                }
            });
        }

        function resetValid() {
            $("input[name='tgl']").removeClass('is-invalid');
            $("input[name='nama']").removeClass('is-invalid');
            $("input[name='asal']").removeClass('is-invalid');
            $("input[name='tujuan']").removeClass('is-invalid');
            $("input[name='tagihan']").removeClass('is-invalid');
            $("input[name='bayar']").removeClass('is-invalid');
        };

        function reset() {
            resetValid();
            $("input[name='tgl']").val('');
            $("input[name='nama']").val('');
            $("input[name='asal']").val('');
            $("input[name='tujuan']").val('');
            $("input[name='tagihan']").val(0);
            $("input[name='bayar']").val(0);
            $("select[name='status']").val('Belum Lunas');
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
@endsection
