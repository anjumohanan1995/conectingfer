@extends('layouts.app')

@section('content')
    <!-- main-content -->
    <!-- main-content -->
    <div class="main-content app-content">
        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between row me-0 ms-0">
                <div class="col-12">
                    <h4 class="content-title mb-2">Sub Sub Menus Management</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">

                            <li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-user"> </i>
                                - Sub Sub Management</li>
                        </ol>
                    </nav>
                </div>

            </div>

            <!-- /breadcrumb -->
            <!-- main-content-body -->
            <div class="main-content-body">
                <!-- row -->
                <div class="row row-sm">
                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">
                        <div class="card">
                            <div class="card-body  table-new">
                                <div class="row mb-3">
                                    <div class="col-md-1 col-6 text-center">
                                        <div class="task-box primary mb-0">
                                            <a href="{{ route('sub_sub_menus.create', ['id' => $id]) }}">
                                                <p class="mb-0 tx-12">Add </p>
                                                <h3 class="mb-0"><i class="fa fa-plus"></i></h3>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Title</th>
                                            <th>link or slug</th>
                                            <th>Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /main-content -->
    <div class="modal fade" id="confirmation-popup">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content country-select-modal border-0">
                <div class="modal-header offcanvas-header">
                    <h6 class="modal-title">Are you sure?</h6><button aria-label="Close" class="btn-close"
                        data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body p-5">
                    <div class="text-center">
                        <h4>Are you sure to delete this Role?</h4>
                    </div>
                    <form id="ownForm">
                        @csrf
                        <input type="hidden" id="requestId" name="requestId" value="" />
                        <div class="text-center">
                            <button type="button" onclick="ownRequest()"
                                class="btn btn-primary mt-4 mb-0 me-2">Yes</button>
                            <button class="btn btn-default mt-4 mb-0" data-bs-dismiss="modal" type="button">No</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#example').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('getSubSubMenus', ['id' => $id]) }}",
                    data: function(d) {
                        return d; // Sending all DataTable parameters
                    }
                },
                columns: [{
                        data: 'no',
                        name: 'no'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'link_or_slug',
                        name: 'link_or_slug'
                    },
                    {
                        data: 'edit',
                        name: 'edit',
                        orderable: false,
                        searchable: false
                    }
                ],
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
            });

            $('#example').on('click', '.deleteItem', function() {
                var id = $(this).data('id');
                $('#requestId').val(id);
                $('#confirmation-popup').modal('show');
            });

            $('#confirmation-popup').on('hidden.bs.modal', function() {
                $('#requestId').val('');
            });

            $('#submit').click(function() {
                table.draw();
            });

            $('#refresh').click(function() {
                $("#delete_ctm").val('');
                table.draw();
            });

            $('#delete').click(function() {
                $("#delete_ctm").val(1);
                table.draw();
            });


        });
    </script>
@endsection
