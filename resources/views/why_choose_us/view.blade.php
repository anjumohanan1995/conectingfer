@extends('layouts.app')
@section('content')
	<!-- main-content -->
	<div class="main-content app-content">
		<!-- container -->
		<div class="main-container container-fluid">
			<!-- breadcrumb -->
			<div class="breadcrumb-header justify-content-between row me-0 ms-0 mb-3" >
				<div class="col-xl-3">
					<h4 class="content-title mb-2">Service Details  </h4>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">

							<li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-box"> </i> - Service Details</li>
						</ol>
					</nav>
				</div>

			</div>
			<!-- /breadcrumb -->
			<!-- main-content-body -->
			<div class="main-content-body">

				<!-- row -->

				<!-- /row -->
				<!-- row -->
				<div class="row row-sm">
					<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">
						<div class="card">
								<div class="card-body">
									<div id="success_message" class="ajax_response" style="display: none;"></div>
									<div class="mb-4 main-content-label"> Details</div>

										<table id="example" class=" " style="width:100%">
										    <tbody>

                                                <tr>
                                                    <td>
                                                        <div class="project-contain">
                                                        <b class="mb-1 tx-13">Title</b>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div> :</div>
                                                    </td>
                                                    <td>
                                                        <div class="image-grouped"> {{ @$data['title']}}</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="project-contain">
                                                        <b class="mb-1 tx-13"> Description</b>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div> :</div>
                                                    </td>
                                                    <td>
                                                        <div class="image-grouped"> {!! @$data['description'] !!}</div>
                                                    </td>
                                                </tr>




										    </tbody>
										</table>


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



@endsection
