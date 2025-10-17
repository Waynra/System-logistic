@extends('Master.Layouts.app', ['title' => $title])

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Jurnal Pengeluaran</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-gray">Admin</li>
                <li class="breadcrumb-item active" aria-current="page">Jurnal Pengeluaran</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h3 class="card-title">Data Jurnal Pengeluaran</h3>
                    <div>
                        <a class="modal-effect btn btn-primary-light" data-bs-effect="effect-super-scaled"
                           data-bs-toggle="modal" href="#addModal">Tambah Data
                           <i class="fe fe-plus"></i></a>
                        <a class="btn btn-secondary-light" href="{{ route('jurnal_pengeluaran.print') }}" target="_blank">Cetak Laporan
                           <i class="fe fe-printer"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h4>Total Pengeluaran: Rp. {{ number_format($totalPengeluaran, 2) }}</h4>
                    </div>
                    <div class="table-responsive">
                        <table id="table-1" width="100%"
                               class="table table-bordered text-nowrap border-bottom dataTable no-footer dtr-inline collapsed">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">No</th>
                                    <th class="border-bottom-0">Tanggal Pengeluaran</th>
                                    <th class="border-bottom-0">No Manifest</th>
                                    <th class="border-bottom-0">Deskripsi</th>
                                    <th class="border-bottom-0">Jumlah Pengeluaran</th>
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
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pengeluaran</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="tambahPengeluaranForm">
                        @csrf
                        <div class="form-group">
                            <label for="tanggal_pengeluaran" class="form-label">Tanggal Pengeluaran</label>
                            <input type="date" name="tanggal_pengeluaran" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="no_manifest" class="form-label">No Manifest</label>
                            <input type="text" name="no_manifest" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_pengeluaran" class="form-label">Jumlah Pengeluaran</label>
                            <input type="number" name="jumlah_pengeluaran" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="Dibayar">Dibayar</option>
                                <option value="Belum Dibayar">Belum Dibayar</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#table-1').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('jurnal_pengeluaran.show') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'tanggal_pengeluaran', name: 'tanggal_pengeluaran'},
                    {data: 'no_manifest', name: 'no_manifest'},
                    {data: 'deskripsi', name: 'deskripsi'},
                    {data: 'jumlah_pengeluaran', name: 'jumlah_pengeluaran'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('#tambahPengeluaranForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('jurnal_pengeluaran.store') }}",
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            swal("Sukses!", response.success, "success");
                            table.ajax.reload();
                            $('#addModal').modal('hide');
                            updateTotalPengeluaran();
                        } else {
                            swal("Error!", response.message, "error");
                        }
                    },
                    error: function(response) {
                        swal("Error!", "Terjadi kesalahan. Silakan coba lagi.", "error");
                    }
                });
            });

            function updateTotalPengeluaran() {
                $.ajax({
                    url: "{{ route('jurnal_pengeluaran.index') }}",
                    type: "GET",
                    success: function(response) {
                        var totalPengeluaran = $(response).find('h4').text().split(':')[1].trim();
                        $('h4:contains("Total Pengeluaran")').text('Total Pengeluaran: ' + totalPengeluaran);
                    }
                });
            }
        });
    </script>
@endsection
