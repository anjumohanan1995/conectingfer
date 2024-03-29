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
                    <h4 class="content-title mb-2">Contact Form list Management</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">

                            <li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-user"> </i>
                                - Contact Form list Management</li>
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
                                <div class="row">
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                </div>


                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 p-4">
                                            <div class="card">
                                                <p class="card-text"><strong>Name:</strong> {{ $item->username }}
                                                    {{ $item->lastname }}</p>
                                                <p class="card-text"><strong>Email:</strong> {{ $item->email }}</p>
                                                <p class="card-text"><strong>Phone:</strong> {{ $item->phone }}</p>
                                                <p class="card-text"><strong>Company:</strong> {{ $item->company }}</p>
                                                <p class="card-text"><strong>Subject:</strong> {{ $item->subject }}</p>
                                                <p class="card-text"><strong>Message:</strong> {{ $item->message }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


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
                    url: "{{ route('get.contact-forms') }}",
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
