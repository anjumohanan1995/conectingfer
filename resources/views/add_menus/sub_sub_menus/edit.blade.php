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
                                - Sub Sub Menus Management</li>
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
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                                <form class="m-5" action="{{ route('sub_sub_menus.update', ['sub_sub_menu' => $data->id]) }}"
                                    method="POST">
                                    @csrf <!-- Add CSRF token field -->
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="title" name="title" placeholder="Enter title"
                                            value="{{ old('title', $data->title) }}">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="link_type" class="form-label">Link Type</label>
                                        <select class="form-select @error('link_type') is-invalid @enderror"
                                            name="link_type" id="link_type">
                                            <option selected disabled value="">Select link type</option>
                                            <option value="slug"
                                                {{ old('link_type', $data->link_type) == 'slug' ? 'selected' : '' }}>Slug
                                            </option>
                                            <option value="link"
                                                {{ old('link_type', $data->link_type) == 'link' ? 'selected' : '' }}>Link
                                            </option>
                                        </select>
                                        @error('link_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="mb-3" id="linkInput"
                                        style="display: {{ old('link_type') == 'link' ? 'block' : 'none' }};">
                                        <label for="link" class="form-label">Link</label>
                                        <input type="text" class="form-control @error('link') is-invalid @enderror"
                                            id="link" name="link" placeholder="Enter link  ( eg: page/web-home )"
                                            value="{{ old('link', $data->link) }}">
                                        @error('link')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>



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
            // Function to toggle visibility based on the selected value
            function toggleVisibility(selectedValue) {
                if (selectedValue === 'link') {
                    $('#linkInput').show();
                } else {
                    $('#linkInput').hide();
                }
            }

            // Initial visibility state based on the selected value
            toggleVisibility($('#link_type').val());

            // Event listener for changes in the "Link Type" dropdown
            $('#link_type').on('change', function() {
                var selectedValue = $(this).val();
                toggleVisibility(selectedValue);
            });
        });
    </script>
@endsection
