@extends('Master.Layouts.app', ['title' => $title])

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Data Armada</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-gray">Admin</li>
            <li class="breadcrumb-item active" aria-current="page">Armada</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <h3 class="card-title">Data Armada</h3>
                @if ($hakTambah > 0)
                <div>
                    <a class="modal-effect btn btn-primary-light" data-bs-effect="effect-super-scaled"
                       data-bs-toggle="modal" href="#modaldemo8">Tambah Data
                       <i class="fe fe-plus"></i></a>
                </div>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table-1" width="100%"
                           class="table table-bordered text-nowrap border-bottom dataTable no-footer dtr-inline collapsed">
                        <thead>
                            <th class="border-bottom-0" width="1%">No</th>
                            <th class="border-bottom-0">Nama Armada</th>
                            <th class="border-bottom-0">Jenis Kendaraan</th>
                            <th class="border-bottom-0">No Polisi</th>
                            <th class="border-bottom-0">Kapasitas Muatan</th>
                            <th class="border-bottom-0">Berat Maksimal</th>
                            <th class="border-bottom-0">Status</th>
                            <th class="border-bottom-0" width="1%">Action</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END ROW -->

@include('Admin.Armada.tambah')
@include('Admin.Armada.edit')
@include('Admin.Armada.hapus')

<script>
    function editArmada(id) {
        $.get('/admin/armada/' + id, function(data) {
            $("input[name='idarmadaU']").val(data.id);
            $("input[name='nama_armadaU']").val(data.nama_armada);
            $("input[name='jenis_kendaraanU']").val(data.jenis_kendaraan);
            $("input[name='no_polisiU']").val(data.no_polisi);
            $("input[name='kapasitas_muatanU']").val(data.kapasitas_muatan);
            $("input[name='berat_maksimalU']").val(data.berat_maksimal);
            $("select[name='statusU']").val(data.status);
            $('#editModal').modal('show');
        });
    }

    function deleteArmada(id) {
        if (confirm("Apakah Anda yakin ingin menghapus armada ini?")) {
            $.ajax({
                type: 'DELETE',
                url: '/admin/armada/delete/' + id,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    alert(data.success);
                    table.ajax.reload(null, false);
                },
                error: function(data) {
                    alert('Error: ' + data.responseJSON.message);
                }
            });
        }
    }

    function validasi(judul, status) {
        swal({
            title: judul,
            type: status,
            confirmButtonText: "OK"
        });
    }
</script>
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
        //datatables
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
                "url": "{{ route('armada.getArmada') }}",
            },
            "columns": [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false },
                { data: 'nama_armada', name: 'nama_armada' },
                { data: 'jenis_kendaraan', name: 'jenis_kendaraan' },
                { data: 'no_polisi', name: 'no_polisi' },
                { data: 'kapasitas_muatan', name: 'kapasitas_muatan' },
                { data: 'berat_maksimal', name: 'berat_maksimal' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
        });
    });
</script>
@endsection
