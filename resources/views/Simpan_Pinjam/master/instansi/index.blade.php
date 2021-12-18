@extends('Simpan_Pinjam.layout')

@section('title', 'Instansi')

@section('content_header', 'Data Instansi')

@push('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
@endpush

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Master</a></li>
    <li class="breadcrumb-item active">Instansi</li>
@endsection

@section('content_main')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Instansi</h3>
                    <a href="{{ route('instansi.create') }}" class="btn btn-sm btn-primary float-right">Tambah Instansi</a>
                </div>
                <div class="card-body">
                    <table id="table-instansi" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Instansi</th>
                                <th class="text-center">Nama Instansi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>

    <script>
        $(function() {

            $('#table-instansi').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "deferRender": true,
                "columnDefs": [{
                        "targets": 0,
                        "className": "text-center",
                    },
                    {
                        "targets": 1,
                        "className": "text-center",
                    },
                    {
                        "targets": 2,
                        "className": "text-center",
                    },
                    {
                        "targets": 3,
                        "className": "text-center"
                    }
                ],
                "ajax": "{{ route('instansi.index') }}",
                "columns": [{
                        data: 'no'
                    },
                    {
                        data: 'kode_instansi'
                    },
                    {
                        data: 'nama_instansi'
                    },
                    {
                        data: 'action',
                        orderable: false
                    }
                ]
            });
        });
    </script>

    @if (session()->has('success'))
        <script>
            toastr.success("{{ session()->get('success') }}");
        </script>
    @endif

    <script>
        jQuery(document).ready(function($) {
            $('#mymodal').on('show.bs.modal', function(e) {
                var button = $(e.relatedTarget);
                var modal = $(this);

                modal.find('.modal-content').load(button.data("remote"));
            });
        });
    </script>

    <div class="modal" id="mymodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <i class="fa fa-spinner fa-spin"></i>
                </div>
            </div>
        </div>
    </div>

@endsection
