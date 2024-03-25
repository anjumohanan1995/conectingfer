@extends('layouts.app')


@section('content')

<div class="row">






<div class="col-sm-12">
   <div class="card-box table-responsive">
        <h4 class="header-title" style="width:100%">
        <b>Create New Slider</b>  <a href="{{ route('sliders.index') }}" class="btn btn-icon waves-effect waves-light btn-info pull-right" style="float: right;"> <i class="ion ion-md-arrow-back " ></i> </a>
        </h4>
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
    <form method="POST" action="{{route('sliders.store')}}" enctype="multipart/form-data">
    @csrf

        <div class="form-group">

            <strong>{{__('Title')}}:</strong>

           <input type="text" name="title" class="form-control contentDetail" placeholder="Title For Slider" >

        </div>
        <div class="form-group">
            <strong>{{__('Description')}}:</strong>

            <textarea name="description" class="form-control contentDetail"></textarea>
        </div>
        <div class="form-group">

            <strong>{{__('Slider Type')}}:</strong>

            <select name="slider_type" class="form-control">
                <option value="">{{__('Select A slider Type')}}</option>
                <option value="top">{{__('Top')}}</option>
                <option value="bottom">{{__('Bottom')}}</option>
            </select>

        </div>
        
        <div class="form-group">

            <strong>{{__('Button Text')}}:</strong>

            <input type="text" name="button_text" class="form-control" placeholder="Button Text For Slider">

        </div>
        <div class="form-group">

            <strong>{{__('Button Url')}}:</strong>

            <input type="text" name="button_url" class="form-control" placeholder="Button Url For Slider">

        </div>
         <div class="form-group">

            <strong>{{__('Slider Style')}}:</strong>

            <select name="slider_style" class="form-control">
                <option value="normal">{{__('Normal')}}</option>
            </select>

        </div>

        <div class="form-group">

            <strong>{{__('Slider Status')}}:</strong>

            <select name="slider_status" class="form-control">
                <option value="1">{{__('Active')}}</option>
                <option value="0">{{__('Inactive')}}</option>
            </select>

        </div>

          <div class="form-group">

            <strong>{{__('Image')}}[Prefered Size(1500px:720px )(for testimonial 65px:65px)]:</strong>

            <input type="file" name="image" class="form-control" required>

        </div>
       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

        <button type="submit" class="btn btn-primary">Submit</button>

        </div>

  </div>
 </div>
</div>
<script>
      tinymce.init({
        selector: '.contentDetail'
      });
</script>
@endsection