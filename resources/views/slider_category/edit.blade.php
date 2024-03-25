@extends('layouts.app')

@section('content')

<!-- main-content -->
<div class="main-content app-content">
    <!-- container -->
    <div class="main-container container-fluid">
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between row me-0 ms-0 mb-3" >
            <div class="col-xl-3">
                <h4 class="mb-sm-0" style="color: white">Manage Slider Category </h4>  <a href="{{ route('slidercategories.index') }}" class="btn btn-primary btn-sm">Back</a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sliders</a></li>
                        <li class="breadcrumb-item active">Slider Category</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- /breadcrumb -->
        <!-- main-content-body -->
        <div class="main-content-body">
                @if ($message = Session::get('success'))

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      {{ $message }}
                    </div>

                @endif
                <div id="success_message" class="ajax_response" style="display: none;">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>Role  Added Successfully
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
                                <form method="POST" action="{{ route('slidercategories.update',$category->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3 row">
                                        <div class="form-group">

                                            <strong>{{__('Category Name')}}:</strong>

                                           <input type="text" name="category_name" class="form-control" value="{{$category->category_name}}" required>
                                           @error('category_name')
                                           <span class="text-danger">{{$message}}</span>
                                       @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="form-group">

                                            <strong>{{__('Position')}}:</strong>

                                            <select name="category_postion" class="form-control">
                                                <option value="top" @if($category->category_position=='top') selected @endif>{{__('Top')}}</option>
                                                <option value="bottom" @if($category->category_position=='bottom') selected @endif>{{__('Bottom')}}</option>
                                                {{-- <option value="initiative" @if($category->category_position=='initiative') selected @endif>{{__('Initiative')}}</option> --}}
                                                <option value="gallery" @if($category->category_position=='gallery') selected @endif>{{__('Gallery')}}</option>
                                                <option value="Service of Ayush" @if($category->category_position=='Service of Ayush') selected @endif>{{__('Service of Ayush')}}</option>
                                                <option value="logo" @if($category->category_position=='logo') selected @endif>{{__('Logo')}}</option>
                                                <option value="photos-and-videos" @if($category->category_position=='photos-and-videos') selected @endif>{{__('Photos & Videos')}}</option>
                                            </select>
                                            @error('category_postion')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        </div>
                                    </div>


                                    <div class="mb-3 row">
                                        <div class="form-group">

                                            <strong>{{__('Category Status')}}:</strong>

                                            <select name="category_status" class="form-control">
                                                <option value="1" @if($category->category_status==1) selected @endif>{{__('Active')}}</option>
                                                <option value="0" @if($category->category_status==0) selected @endif>{{__('Inactive')}}</option>
                                            </select>
                                            @error('category_status')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">

                                            <button type="submit" class="btn btn-primary">Update Slider Category</button>

                                        </div>
                                    </div>
                                </form>


                                <br>
        <h4 class="header-title" >
        <b>Add Sliders to {{$category->category_name}}</b>

        <button type="button" class="btn btn-info btn-sm waves-effect waves-light pull-right" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" onclick="getEntryData(this)" data-id="20" >Add </button>


        </h4>
    <form method="post" action="{{route('sliders.store')}}" id="form" enctype="multipart/form-data">
        @csrf
    <!-- Modal -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">

                <h5 class="modal-title">Add Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                <div class="mb-3 row">
                <div class="form-group">

                    <strong>{{__('Title')}}:</strong>

                <input type="text" name="title" class="form-control contentDetail" id="title" value=" @if($category->category_position=='testimonial') <h6>[Name Of Person]<span>[Designation]</span></h6>@endif @if($category->category_position=='photos-and-videos') <h2>Enter Title For Photos And Videos</h2>@endif">
                <input type="hidden" name="cid" class="form-control" id="title" value="{{$category->id}}">
                <input type="hidden" name="cposition" class="form-control" id="title" value="{{$category->category_position}}">

                </div>
                </div>
           
                <div class="mb-3 row">
                    <div class="form-group">

                        <strong>{{__('Link')}}:</strong>

                    <input type="text" name="link" class="form-control contentDetail" id="link" value="">

                    </div>
                    </div>
                @if(@$category->category_name=='Our Projects')
                <div class="mb-3 row">
                    <div class="form-group">
                        <strong>{{__('Description')}}:</strong>

                        <textarea name="description" class="form-control contentDetail" id="description">
                        @if($category->category_name=='Our Projects')
                        Hi,Demo content for our project description
                        @endif
                        @if($category->category_position=='photos-and-videos')
                        <p>Enter Deatils For Photos and Videos</p>
                        @endif
                        </textarea>
                    </div>
                </div>
                @endif
                @if(@$category->category_name=='')
                <div class="mb-3 row">
                    <div class="form-group">

                        <strong>{{__('Button Text')}}:</strong>

                        <input type="text" name="button_text" class="form-control" placeholder="Button Text For Slider">

                    </div>
                </div>
                @endif
                @if(@$category->category_name=='')
                <div class="mb-3 row">
                    <div class="form-group">

                        <strong>{{__('Button Url')}}:</strong>

                        <input type="text" name="button_url" class="form-control" placeholder="Button Url For Slider" id="button_url">

                    </div>
                </div>
                @endif
                @if(@$category->category_name=='')
                <div class="mb-3 row">
                    <div class="form-group">

                        <strong>{{__('Button Two Text')}}:</strong>

                        <input type="text" name="button_one_text" class="form-control" placeholder="Button Text For Slider">

                    </div>
                </div>
                @endif
                @if(@$category->category_name=='')
                <div class="mb-3 row">
                    <div class="form-group">

                        <strong>{{__('Button Two Url')}}:</strong>

                        <input type="text" name="button_one_url" class="form-control" placeholder="Button Url For Slider" id="button_url">

                    </div>
                </div>
                @endif
                <div class="mb-3 row">
                    <div class="form-group">

                        <strong>{{__('Slider Style')}}:</strong>

                        <select name="slider_style" class="form-control" id="slider_style">
                            <option value="normal">{{__('Normal')}}</option>
                        </select>

                    </div>
                </div>
                <div class="mb-3 row">
                <div class="form-group">

                    <strong>{{__('Slider Status')}}:</strong>

                    <select name="slider_status" class="form-control" id="slider_status">
                        <option value="1">{{__('Active')}}</option>
                        <option value="0">{{__('Inactive')}}</option>
                    </select>

                </div>
                </div>
                @if(@$category->category_name=='')
                <div class="mb-3 row">
                <div class="form-group">

                    <strong>{{__('Slider Background Color')}}:</strong>

                    <input type="color" name="color" class="form-control"  id="color">

                </div>
                </div>
                @endif
                @if(@$category->category_name !='Our Projects')
                <div class="mb-3 row">
                <div class="form-group">

                    <strong>{{__('Image')}}[Prefered Size(1500px:720px)(for testimonial 65px:65px)]:</strong>

                    <input type="file" name="image" class="form-control" >

                </div>
                {{-- <div class="form-group">

                    <strong>{{__('Video')}}</strong>

                    <input type="file" name="video" class="form-control">

                </div> --}}
            </div>
            @endif
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit"  class="btn btn-success" id="ajaxSubmit">Save changes</button>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </form>



    @if(count($sliders)==0)
    <br>
    <div class="alert alert-warning text-white">
    <strong>{{__('Whoops')}}!</strong> {{__('No Sliders Added For this Category Yet')}}
    </div>
    @else
    <div class="row">
       
        @foreach($sliders as $slider)
        <div class="col-xs-12 col-md-4">
        <!-- Card -->
        <article class="card animated fadeInLeft">
            <img class="card-img-top img-responsive" src="{{url('/')}}/admin/uploads/thumbnails/{{$slider->image}}" alt="SPD" width="100%" />
            <div class="card-block">
            <h4 class="card-title">{!! $slider->title !!}</h4>
            <h6 class="text-muted">@if($slider->slider_status==1) <span class="badge badge-pill badge-success badge-sm">Active</span> @else <span class="badge badge-pill badge-danger badge-sm">Inactive </span>@endif</h6>
            <a href="{{route('sliders.edit',$slider->id)}}" class="btn btn-info btn-sm">View And Edit</a>

            <a href="#" data-toggle="modal" data-target="#confirmDeleteModal{{ $slider->id }}" class="btn btn-danger btn-sm">Delete</a>


            </div>
        </article><!-- .end Card -->
        </div>
            <div class="modal fade"  id="confirmDeleteModal{{ $slider->id }}">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content country-select-modal border-0">
                    <div class="modal-header offcanvas-header">
                        <h6 class="modal-title">Are you sure?</h6><button aria-label="Close" class="btn-close"
                            data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body p-5">
                        <div class="text-center">
                            <h4>Are you sure to delete this Slider Image?</h4>
                        </div>

                        <div class="text-center">
                            <div class="d-flex justify-content-center">
                                <div>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['sliders.destroy', $slider->id]]) !!}
                            <button type="submit" class="btn btn-primary mt-4 mb-0 me-2">Yes</button>
                            {!! Form::close() !!}
                                </div>
                                <div>
                        <button type="button" class="btn btn-default mt-4 mb-0" data-dismiss="modal">No</button>
                                </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
        @endforeach
    @endif
   

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

<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Include Bootstrap JS and other JS files -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Your other JS scripts -->

<script type="text/javascript">

    function getEntryData() {

        var id = $(this).attr('data-id');
        $('#requestId').val($(this).attr('data-id'));
        $('.bs-example-modal-lg').modal('show');
    }

      tinymce.init({
        selector: '.contentDetail'
      });
</script>
@endsection
