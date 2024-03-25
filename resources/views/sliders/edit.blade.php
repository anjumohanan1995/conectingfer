@extends('layouts.app')

@section('content')


<!-- main-content -->
<div class="main-content app-content">
    <!-- container -->
    <div class="main-container container-fluid">
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between row me-0 ms-0 mb-3" >
            <div class="col-xl-3">
                <h4 class="mb-sm-0">Manage Slider <a href="{{ route('slidercategories.edit',$slider->slider_category_id) }}" class="btn btn-primary btn-sm">Back</a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">


                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sliders</a></li>
                        <li class="breadcrumb-item active">Edit Slider</li>
                    </ol>

                </nav>
            </div>
        </div>
        @php
            $sc=DB::table('slider_categories')->where('id',$slider->slider_category_id)->first();
        @endphp
        <!-- /breadcrumb -->
        <!-- main-content-body -->
        <div class="main-content-body">
                @if (count($errors) > 0)
                    <br>
                    <div class="alert alert-danger">

                      <strong>{{__('Whoops')}}!</strong> {{__('There were some problems with your input')}}.<br><br>

                      <ul>

                         @foreach ($errors->all() as $error)

                           <li>{{ $error }}</li>

                         @endforeach

                      </ul>

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


                                <form method="POST" action="{{ route('sliders.update',$slider->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                <div class="mb-3 row">
                                    <div class="form-group">

                                        <strong>{{__('Slider Category ')}}:</strong>

                                        <select name="slider_category_id" class="form-control">
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}" @if($slider->slider_category_id==$category->id) selected @endif>{{__($category->category_name)}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="form-group">

                                        <strong>{{__('Title')}}:</strong>

                                       <input type="text" name="title" class="form-control contentDetail" placeholder="Title For Slider" value="{{$slider->title??''}}">

                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="form-group">

                                        <strong>{{__('Link')}}:</strong>

                                    <input type="text" name="link" class="form-control contentDetail" id="link" value="{{$slider->link??''}}">

                                    </div>
                                    </div>
                                <div class="mb-3 row">
                                    <div class="form-group">
                                        <strong>{{__('Description')}}:</strong>
                                        <input type="hidden" name="cposition"  value="{{@$sc->category_position}}">
                                        <textarea name="description" class="form-control contentDetail">{{@$slider->description??''}}</textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="form-group">

                                        <strong>{{__('Button Text')}}:</strong>

                                        <input type="text" name="button_text" class="form-control" placeholder="Button Text For Slider"  value="{{@$slider->button_text??''}}">

                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="form-group">

                                        <strong>{{__('Button Url')}}:</strong>

                                        <input type="text" name="button_url" class="form-control" placeholder="Button Url For Slider"  value="{{$slider->button_url??''}}">

                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="form-group">

                                        <strong>{{__('Button Two Text')}}:</strong>

                                        <input type="text" name="button_one_text" class="form-control" placeholder="Button Text For Slider" value="{{$slider->button_one_text??''}}">

                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="form-group">

                                        <strong>{{__('Button Two Url')}}:</strong>

                                        <input type="text" name="button_one_url" class="form-control" placeholder="Button Url For Slider" id="button_url" value="{{$slider->button_one_url??''}}">

                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="form-group">

                                        <strong>{{__('Slider Style')}}:</strong>


                                        <select name="slider_style" class="form-control">
                                            <option value="normal"  @if($slider->slider_style=='normal') selected @endif>{{__('Normal')}}</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="form-group">

                                        <strong>{{__('Slider Status')}}:</strong>

                                        <select name="slider_status" class="form-control">
                                            <option value="1" @if($slider->slider_status==1) selected @endif>{{__('Active')}}</option>
                                            <option value="0" @if($slider->slider_status==0) selected @endif>{{__('Inactive')}}</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="form-group">

                                        <strong>{{__('Slider Background Color')}}:</strong>

                                        <input type="color" name="color" class="form-control"  id="color" value="{{$slider->color??''}}">

                                    </div>
                                </div>
                                <div class="mb-3 row">
                                      <div class="form-group">

                                        <strong>{{__('Image')}}:</strong>

                                        <input type="file" name="image" class="form-control">
                                        <br>
                                              <img src="{{url('/')}}/admin/uploads/thumbnails/{{$slider->image}}" height="210px">
                                              <input type="hidden" name="imgs" value="{{$slider->image}}">

                                    </div>
                                </div>

                                 <div class="mb-3 row">
                                      <div class="form-group">

                                        <strong>{{__('Video')}}:</strong>

                                        <input type="file" name="video" class="form-control">
                                        <br>
                                        <input type="hidden" name="videos" value="{{@$slider->video}}">

                                        <video width="190px" height="" autoplay="" loop="" muted="" >
                                            <source src="{{url('/')}}/admin/uploads/thumbnails/{{@$slider->video}}" type="video/mp4">
                                        </video>



                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                                    <button type="submit" class="btn btn-primary">Submit</button>

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


<script>
      tinymce.init({
        selector: '.contentDetail'
      });
</script>
@endsection
