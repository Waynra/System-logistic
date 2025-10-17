@extends('Master.Layouts.app', ['title' => $title])

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Data Supir</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-gray">Admin</li>
                <li class="breadcrumb-item active" aria-current="page">Supir</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <!-- ROW -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h3 class="card-title">Data</h3>
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
                                <th class="border-bottom-0">No Manifest</th>
                                <th class="border-bottom-0">Tgl</th>
                                <th class="border-bottom-0">Supir</th>
                                <th class="border-bottom-0">Asal</th>
                                <th class="border-bottom-0">Tujuan</th>
                                <th class="border-bottom-0">Tagihan</th>
                                <th class="border-bottom-0">Bayar</th>
                                <th class="border-bottom-0">Sisa</th>
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

    @include('Admin.Supir.tambah')
    @include('Admin.Supir.edit')
    @include('Admin.Supir.hapus')

    <script>
        function update(data) {
            $("input[name='idsupirU']").val(data.supir_id);
            $("input[name='tglU']").val(data.supir_tgl);
            $("input[name='namaU']").val(data.supir_nama.replace(/_/g, ' '));
            $("input[name='asalU']").val(data.supir_asal.replace(/_/g, ' '));
            $("input[name='tujuanU']").val(data.supir_tujuan.replace(/_/g, ' '));
            $("input[name='tagihanU']").val(data.supir_tagihan);
            $("input[name='bayarU']").val(data.supir_bayar);
            $("select[name='statusU']").val(data.supir_status.replace(/_/g, ' '));
        }

        function hapus(data) {
            $("input[name='idsupir']").val(data.supir_id);
            $("#vsupir").html("Supir " + "<b>" + data.supir_nama.replace(/_/g, ' ') + "</b>");
        }

        function validasi(judul, status) {
            swal({
                title: judul,
                type: status,
                confirmButtonText: "Iya."
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

                lengthChange: true,

                "ajax": {
                    "url": "{{ route('supir.getsupir') }}",
                },

                "columns": [
                    {
                        data: 'supir_kode',
                        name: 'supir_kode',
                    },
                    {
                        data: 'supir_tgl',
                        name: 'supir_tgl',
                    },
                    {
                        data: 'supir_nama',
                        name: 'supir_nama',
                    },
                    {
                        data: 'supir_asal',
                        name: 'supir_asal',
                    },
                    {
                        data: 'supir_tujuan',
                        name: 'supir_tujuan',
                    },
                    {
                        data: 'tagihan',
                        name: 'tagihan',
                    },
                    {
                        data: 'bayar',
                        name: 'bayar',
                    },
                    {
                        data: 'sisa',
                        name: 'sisa',
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
        });
    </script>
@endsection
