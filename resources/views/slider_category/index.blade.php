@extends('layouts.app')

@section('content')

<!-- main-content -->
<div class="main-content app-content">
    <!-- container -->
    <div class="main-container container-fluid">
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between row me-0 ms-0" >
            <div class="col-xl-3">
                <h4 class="content-title mb-2">Slider Category</h4>
                <a href="{{ route('slidercategories.create') }}" class="btn btn-primary btn-sm">Create</a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-user"> </i> - Slider Category</li>
                    </ol>
                </nav>
            </div>
            <!-- <div class="my-auto col-xl-9 pe-0">
                <div class="card">
                    <div class="main-content-body main-content-body-mail card-body p-0">
                        <div class="card-body pt-2 pb-2">

                            <div class="row row-sm">
                                <div class="col-lg mg-t-10 mg-lg-t-0">
                                    <input class="form-control" placeholder="Role" type="text" name="role" id="role">
                                </div>
                                <div class="col-lg mg-t-3 mg-lg-t-0"> <button class="btn ripple btn-success btn-block" type="submit" id="submit">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
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
            <!-- row -->
            <div class="row row-sm">
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">
                    <div class="card">
                        <div class="card-body  table-new">

                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php $i=0; @endphp
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ $category->category_position}}</td>
                                            <td>@if($category->category_status==1)
                                            Active
                                                @else
                                           {{__('Inactive')}}
                                                @endif
                                            </td>
                                            <td>

                                                   <a class="btn btn-success" href="{{ route('slidercategories.edit',$category->id) }}">Manage Category</a>

                                                    {!! Form::open(['method' => 'DELETE','route' => ['slidercategories.destroy', $category->id],'style'=>'display:none']) !!}

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
            </div>
        <!-- /row -->
        </div>
                        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /main-content -->


@endsection
