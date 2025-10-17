@extends('Master.Layouts.app', ['title' => $title])

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Jurnal Pemasukan</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-gray">Admin</li>
                <li class="breadcrumb-item active" aria-current="page">Jurnal Pemasukan</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h3 class="card-title">Data Jurnal Pemasukan</h3>
                    <div>
                        <a class="modal-effect btn btn-primary-light" data-bs-effect="effect-super-scaled"
                           data-bs-toggle="modal" href="#addModal">Tambah Data
                           <i class="fe fe-plus"></i></a>
                        <a class="btn btn-secondary-light" href="{{ route('jurnal_pemasukan.print') }}" target="_blank">Cetak Laporan
                           <i class="fe fe-printer"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h4>Total Pemasukan: Rp. {{ number_format($totalPemasukan, 2) }}</h4>
                    </div>
                    <div class="table-responsive">
                        <table id="table-1" width="100%"
                               class="table table-bordered text-nowrap border-bottom dataTable no-footer dtr-inline collapsed">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">No</th>
                                    <th class="border-bottom-0">Tanggal Pemasukan</th>
                                    <th class="border-bottom-0">No Manifest</th>
                                    <th class="border-bottom-0">Deskripsi</th>
                                    <th class="border-bottom-0">Jumlah Pemasukan</th>
                                    <th class="border-bottom-0">Status</th>
                                    <th class="border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END ROW -->

    <!-- Modal Tambah Data -->
    <div class="modal" id="addModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Tambah Pemasukan</h6>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formTambahJurnalPemasukan">
                        @csrf
                        <div class="form-group">
                            <label for="tanggal_pemasukan">Tanggal Pemasukan</label>
                            <input type="date" name="tanggal_pemasukan" class="form-control" required>
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
                            <label for="jumlah_pemasukan">Jumlah Pemasukan</label>
                            <input type="number" name="jumlah_pemasukan" step="0.01" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
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

    <!-- Modal Edit Data -->
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

    <!-- Modal Hapus Data -->
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
@endsection

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table;
        $(document).ready(function() {
            table = $('#table-1').DataTable({
                "processing": true,
                "serverSide": true,
                "info": true,
                "order": [],
                "stateSave": true,
                "lengthMenu": [
                    [5, 10, 25, 50, 100],
                    [5, 10, 25, 50, 100]
                ],
                "pageLength": 10,
                "lengthChange": true,
                "ajax": {
                    "url": "{{ route('jurnal_pemasukan.show') }}",
                    "type": "GET",
                },
                "columns": [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false
                    },
                    {
                        data: 'tanggal_pemasukan',
                        name: 'tanggal_pemasukan',
                    },
                    {
                        data: 'no_manifest',
                        name: 'no_manifest',
                    },
                    {
                        data: 'deskripsi',
                        name: 'deskripsi',
                    },
                    {
                        data: 'jumlah_pemasukan',
                        name: 'jumlah_pemasukan',
                    },
                    {
                        data: 'status',
                        name: 'status',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });

            $('#formTambahJurnalPemasukan').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('jurnal_pemasukan.store') }}",
                    data: $(this).serialize(),
                    success: function(response) {
                        if(response.success) {
                            $('#addModal').modal('hide');
                            swal("Sukses!", response.success, "success");
                            table.ajax.reload(null, false); // Reload DataTables without resetting pagination
                            updateTotalPemasukan(); // Update total pemasukan
                        } else if(response.error) {
                            swal("Error!", response.error.join('\n'), "error");
                        } else {
                            swal("Error!", "Gagal menambah data pemasukan.", "error");
                        }
                    },
                    error: function(response) {
                        swal("Error!", "Terjadi kesalahan. Silakan coba lagi.", "error");
                    }
                });
            });

            $('body').on('click', '.edit', function() {
                var id = $(this).data('id');
                $.get("{{ route('jurnal_pemasukan.index') }}" + '/' + id + '/edit', function (data) {
                    $('#editModal').modal('show');
                    $('#id').val(data.id);
                    $('#tanggal_pemasukan').val(data.tanggal_pemasukan);
                    $('#no_manifest').val(data.no_manifest);
                    $('#deskripsi').val(data.deskripsi);
                    $('#jumlah_pemasukan').val(data.jumlah_pemasukan);
                    $('#status').val(data.status);
                })
            });

            $('#formEditJurnalPemasukan').on('submit', function(e) {
                e.preventDefault();
                var id = $('#id').val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('jurnal_pemasukan.update', '') }}" + '/' + id,
                    data: $(this).serialize(),
                    success: function(response) {
                        if(response.success) {
                            $('#editModal').modal('hide');
                            swal("Sukses!", response.success, "success");
                            table.ajax.reload(null, false); // Reload DataTables without resetting pagination
                            updateTotalPemasukan(); // Update total pemasukan
                        } else if(response.error) {
                            swal("Error!", response.error.join('\n'), "error");
                        } else {
                            swal("Error!", "Gagal mengupdate data pemasukan.", "error");
                        }
                    },
                    error: function(response) {
                        swal("Error!", "Terjadi kesalahan. Silakan coba lagi.", "error");
                    }
                });
            });

            $('body').on('click', '.delete', function() {
                var id = $(this).data('id');
                $('#deleteModal').modal('show');
                $('#delete_id').val(id);
            });

            $('#formHapusJurnalPemasukan').on('submit', function(e) {
                e.preventDefault();
                var id = $('#delete_id').val();

                $.ajax({
                    type: 'DELETE',
                    url: "{{ route('jurnal_pemasukan.delete', '') }}" + '/' + id,
                    data: $(this).serialize(),
                    success: function(response) {
                        if(response.success) {
                            $('#deleteModal').modal('hide');
                            swal("Sukses!", response.success, "success");
                            table.ajax.reload(null, false); // Reload DataTables without resetting pagination
                            updateTotalPemasukan(); // Update total pemasukan
                        } else {
                            swal("Error!", "Gagal menghapus data pemasukan.", "error");
                        }
                    },
                    error: function(response) {
                        swal("Error!", "Terjadi kesalahan. Silakan coba lagi.", "error");
                    }
                });
            });

            function updateTotalPemasukan() {
                $.ajax({
                    url: "{{ route('jurnal_pemasukan.index') }}",
                    type: "GET",
                    success: function(response) {
                        var totalPemasukan = $(response).find('h4').text().split(':')[1].trim();
                        $('h4:contains("Total Pemasukan")').text('Total Pemasukan: ' + totalPemasukan);
                    }
                });
            }
        });
    </script>
@endsection
