@extends('layouts.app')

@section('content')

<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0 mb-3" >
			<div class="col-xl-3">
				<h4 class="content-title mb-2">Contact </h4>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">

						<li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-box"> </i> - Add Contact</li>
					</ol>
				</nav>
			</div>
		</div>
		<!-- /breadcrumb -->
		<!-- main-content-body -->
		<div class="main-content-body">
				<div id="success_message" class="ajax_response" style="display: none;">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
	                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>Content  Added Successfully
	            </div>
	        </div>

			<!-- row -->

			<!-- /row -->
			<!-- row -->
			<div class="row row-sm">
				<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">
					<div class="card">

							<div class="card-body">

								<div class="mb-4 main-content-label"></div>
								<form name="createForm"  method="post" action="{{route('contact.store')}}" enctype="multipart/form-data">
                           @csrf
									<input type="hidden" name="user_id" value="{{ \Auth::user()->id}}">
                                   
									<div class="form-group">

										<div class="row">
											<div class="col-md-3"><label class="form-label">Title</label></div>
											<div class="col-md-9">
											    <input type="text" value="{{@$data->title}}"  class="form-control" placeholder="Title " name="title" />
                                    @error('title')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
											</div>
										</div><br>
                                   
                                            <div class="row">
                                                <div class="col-md-3"><label class="form-label">Sub Title</label></div>
                                                <div class="col-md-9"><input type="text" class="form-control" placeholder="SubTitle" name="sub_title" id="sub_title" value="{{@$data->sub_title}}" />
                                                    @error('sub_title')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div><br>
                                          
                                            <div class="row">
                                                <div class="col-md-3"><label class="form-label"> Content</label></div>
                                                <div class="col-md-9"><textarea class="ckeditor form-control" placeholder=" Content" name="content">{{@$data->content}}</textarea>
                                                    @error('description')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div><br>
                                        
                                            <div class="row">
                                                <div class="col-md-3"><label class="form-label">Image</label></div>
                                                <div class="col-md-9">
                                                    
                                                    <span>Upload Maximum File Size is 2Mb</span>
                                                    <input type="file" id="img_file" name="image" class="form-control" accept=".png, .jpg, .jpeg"  onChange="img_pathUrl(this);"><br>
                                                   @if(@$data->image != '')
                                                   <img src="{{ asset('Aboutus/' . $data->image) }}" width="200px" height="160px" />
                                                    @endif
                                                    @error('image')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                         

									</div>

									<div class="card-footer">
										<button type="submit" id="submit" class="btn btn-primary waves-effect waves-light">Save</button>
										<!-- <button type="submit"  class="btn btn-primary waves-effect waves-light">Add</button> -->
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
					<!-- /main-content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('js/ckeditor/ckeditor.js')}}"></script>
<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

<script src="{{ asset('js/toastr.js') }}"></script>

@if (session('status'))
<script>
    toastr.success('{{ session("status") }}', 'Success!')


    
</script>
@endif
@endsection
