@extends('layouts.app')

@section('content')
<style>
.chartjs-render-monitor{
	height: 350px !important;
}

</style>
			<div class="main-content app-content">
					<!-- container -->
					<div class="main-container container-fluid">
						<!-- breadcrumb -->
						<div class="breadcrumb-header justify-content-between">
							<div>
								<h4 class="content-title mb-2">Hi, Welcome Connectinfer !</h4>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="javascript:void(0);">Dashboard</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Project</li>
									</ol>
								</nav>
							</div>
							
						</div>
						<!-- /breadcrumb -->
						<!-- main-content-body -->
						<div class="main-content-body">
							
						
							<!-- /row -->

							<!-- row -->

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
<meta name="csrf-token" content="{{ csrf_token() }}" />


@endsection
