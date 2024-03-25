@extends('layouts.app')


@section('content')



<div class="row">
<div class="col-sm-12">
<div class="card-box table-responsive">


@if ($message = Session::get('success'))

<div class="alert alert-success">

  <p>{{ $message }}</p>

</div>

@endif                                

 <h4 class="header-title" style="width:100%"><b>Sliders</b>  <a href="{{ route('sliders.create') }}" class="btn btn-icon waves-effect waves-light btn-info pull-right" style="float: right;"> <i class=" ion ion-md-add-circle-outline" ></i> </a>
</h4>
                               
                              
                                <p class="sub-header">
                                  
                                </p>

                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th>status</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                      @foreach ($sliders as $slider)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->description }}</td>
                                            <td>{{ $slider->slider_type }}</td>
                                            <td>@if($slider->slider_status==1)
                                                {{__('Active')}}
                                                @else
                                                {{__('Inactive')}}
                                                @endif
                                            </td>
<td>

       <a class="btn btn-primary" href="{{ route('sliders.edit',$slider->id) }}">View & Edit</a>

        {!! Form::open(['method' => 'DELETE','route' => ['sliders.destroy', $slider->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

        {!! Form::close() !!}
</td>
                                            
                                        </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>













<p class="text-center text-primary"></p>

@endsection