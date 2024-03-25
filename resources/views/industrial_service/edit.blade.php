@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0 mb-3" >
			<div class="col-xl-3">
				<h4 class="content-title mb-2"> Edit Industrial Service </h4>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">

						<li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-box"> </i> - Edit Service</li>
					</ol>
				</nav>
			</div>
		</div>
		<!-- /breadcrumb -->
		<!-- main-content-body -->
		<div class="main-content-body">
				<div id="success_message" class="ajax_response" style="display: none;">
				
	        </div>

			<!-- row -->

			<!-- /row -->
			<!-- row -->
			<div class="row row-sm">
				<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">
					<div class="card">

							<div class="card-body">

								<div class="mb-4 main-content-label">Service - Information</div>
								<form name="createForm" method="post" action="{{ route('industrial-services.update', $data->id) }}" enctype="multipart/form-data">                                    	@csrf
									@csrf
									@method('PUT')
									<input type="hidden" name="user_id" value="{{ \Auth::user()->id}}">
									{{-- <div class="mb-4 main-content-label">Role Detail</div> --}}
									<div class="form-group">
										<div class="row">
											<div class="col-md-3"><label class="form-label"><Title></Title></label></div>
											<div class="col-md-9"><input type="text" class="form-control" placeholder="Title" name="title" value="{{$data->title}}" required/>
												@error('title')
													<span class="text-danger">{{$message}}</span>
												@enderror
											</div>
										</div>
                                        <div class="row">
											<div class="col-md-3"><label class="form-label">Description</label></div>
											<div class="col-md-9"><textarea class="form-control ckeditor" id="editorField" placeholder="Description" name="description">{!!@$data->description!!}</textarea>
												@error('description')
													<span class="text-danger">{{$message}}</span>
												@enderror
											</div>
										</div><br>
										<div class="row">
											<div class="col-md-3"><label class="form-label">Image</label></div>
											<div class="col-md-9">   
												 <input type="file" value="{{ old('image') }}"  class="form-control" name="image" id="image" accept="image/*">                                     
												 @if(@$data->image != '')
												 <img src="{{ asset('Industrial_Services/' . $data->image) }}" width="200px" height="160px" />
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
 <script src="{{ asset('assets/js/ckeditor/ckeditor.js')}}"></script>

<script>
  // Replace 'editorField' with the ID of your textarea
  CKEDITOR.replace('editorField');
</script>
<script >
     function img_pathUrl(input){
        $('#img_url')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
    }
if ($("#createForm").length > 0) {
$("#createForm").validate({
	rules: {
		name: {
		required: true,

		},

	},
	messages: {
		name: {
		required: "Please enter Role",

		},





	},
    submitHandler: function(form) {
	$.ajaxSetup({
		headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$('#submit').html('Please Wait...');
	$("#submit"). attr("disabled", true);
		$.ajax({
			url: "{{ route('roles.store')}}",
			type: "POST",
			data: $('#createForm').serialize(),
			success: function( response ) {
				//console.log(response.success);

				$('#submit').html('Submit');
				$("#submit"). attr("disabled", false);
				$('#success_message').fadeIn().html();
				setTimeout(function() {
					$('#success_message').fadeOut("slow");
				}, 2000 );

				//alert('Data submitted successfully');
				document.getElementById("createForm").reset();
			}
		});
}
})
}
</script>

@endsection
