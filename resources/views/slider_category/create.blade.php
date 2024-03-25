@extends('layouts.app')


@section('content')

<!-- main-content -->
<div class="main-content app-content">
    <!-- container -->
    <div class="main-container container-fluid">
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between row me-0 ms-0 mb-3" >
            <div class="col-xl-3">
                <h4 class="mb-sm-0" style="color: white">Create New Slider Category</h4><br> <a href="{{ route('slidercategories.index') }}" class="btn btn-primary btn-sm">Back</a><br>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Sliders</a></li>
                                            <li class="breadcrumb-item active">Create Slider Category</li>
                                        </ol>

                </nav>
            </div>
        </div>
        <!-- /breadcrumb -->
        <!-- main-content-body -->
        <div class="main-content-body">
                <div id="success_message" class="ajax_response" style="display: none;">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>Slider Category  Added Successfully
                </div>
            </div>

            <!-- row -->

            <!-- /row -->
            <!-- row -->
            <div class="row row-sm">
                <div class="col-lg-8 col-xl-8 col-md-12 col-sm-12 ">
                    <div class="card">

                            <div class="card-body">

                                <div class="mb-4 main-content-label">Add Information</div>
                                <form method="POST" action="{{route('slidercategories.store')}}">
                                    @csrf
                                    <div class="mb-3 row">
                                        <div class="form-group">

                                            <strong>{{__('Category Name')}}:</strong>

                                           <input type="text" name="category_name" class="form-control" placeholder="Title For Slider">
                                           @error('category_name')
                                           <span class="text-danger">{{$message}}</span>
                                       @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="form-group">

                                            <strong>{{__('Position')}}:</strong>

                                            <select name="category_position" class="form-control">
                                                <option value="">{{__('Select A Position')}}</option>
                                                <option value="top">{{__('Top')}}</option>
                                                <option value="bottom">{{__('Bottom')}}</option>
                                                {{-- <option value="initative">{{__('Initiative')}}</option> --}}
                                                <option value="gallery">{{__('Gallery Section')}}</option>
                                                <option value="Service of Ayush">{{__('Service of Ayush')}}</option>
                                                <option value="logo">{{__('Logo')}}</option>
                                                <option value="vision">{{__('Vision and Values')}}</option>
                                                <option value="photos-and-videos">{{__('Photos & Videos')}}</option>
                                            </select>
                                            @error('category_position')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        </div>
                                    </div>


                                    <div class="mb-3 row">
                                        <div class="form-group">

                                            <strong>{{__('Category Status')}}:</strong>

                                            <select name="category_status" class="form-control">
                                                <option value="1">{{__('Active')}}</option>
                                                <option value="0">{{__('Inactive')}}</option>
                                            </select>
                                            @error('category_status')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                                        <button type="submit" class="btn btn-primary">+ Create Slider Category</button>

                                    </div>
                                </form>
                            </div>

                        </div>

                </div>



            </div>
            <!-- /row -->
            <!-- row -->

            <!-- /row -->
            <!-- row -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /main-content -->




@endsection
