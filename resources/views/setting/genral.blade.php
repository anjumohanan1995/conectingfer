<form enctype="multipart/form-data" method="POST" action="{{ route('setting.store') }}">

	@csrf






	<div class="row">

		<div class="col-md-6">

			<div class="row">



				@if ($errors->has('logo'))

				<div class="display-none" id="logo">

                    <strong class="text-danger">{{ $errors->first('logo') }}</strong>

                </div>

                @endif

				<div class="col-md-6">

					<div class="form-group">

						<label for="exampleInputDetails">{{ __('adminstaticword.Logo') }}</label>- <p class="inline info">Size: 300x90</p>

						<br>

						<input type="file" name="logo" value="{{ @$setting->logo }}" id="logo" class="{{ $errors->has('logo') ? ' is-invalid' : '' }} inputfile inputfile-1" accept="image/*"/>

				<label for="logo"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>{{ __('adminstaticword.ChooseaLogo') }}</span></label>

				<span class="text-danger invalid-feedback" role="alert"></span>

					</div>



				</div>

				<div class="col-md-4">

					<div class="well">

						@if(@$setting->logo !="")

							<div class="logo-settings">

								<img src="{{ url('/')}}/images/logo/{{@$setting->logo}}" alt="{{ @$setting->logo }}" class="img-responsive">

							</div>

						@else

							<div class="alert alert-danger">

								{{ __('adminstaticword.Nologofound') }}

							</div>

						@endif

					</div>

				</div>

			</div>

			<br>

		</div>

		<div class="col-md-6">

			<div class="row">



				@if ($errors->has('footer_logo'))

				<div class="display-none" id="footer_logo">

                    <strong class="text-danger">{{ $errors->first('footer_logo') }}</strong>

                </div>

                @endif

				<div class="col-md-6">

					<div class="form-group">

						<label for="exampleInputDetails">{{ __('adminstaticword.footerlogo') }}</label>- <p class="inline info">Size: 300x90</p>

						<br>

						<input type="file" name="footer_logo" value="{{ @$setting->footer_logo }}" id="footer_logo" class="{{ @$errors->has('footer_logo') ? ' is-invalid' : '' }} inputfile inputfile-1" accept="image/*" />

						<label for="footer_logo"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>{{ __('adminstaticword.ChooseaLogo') }}</span></label>

						<span class="text-danger invalid-feedback" role="alert"></span>

					</div>



				</div>

				<div class="col-md-4">

					<div class="well">

						@if(@$setting->footer_logo !="")

							<div class="logo-settings">

								<img src="{{ url('/')}}/images/logo/{{@$setting->footer_logo}}" alt="{{ @$setting->footer_logo }}" class="img-responsive" style="background: black;">

							</div>

						@else

							<div class="alert alert-danger">

								{{ __('adminstaticword.Nologofound') }}

							</div>

						@endif

					</div>

				</div>

			</div>

			<br>

		</div>

	</div>





	<div class="row">

		<div class="col-md-6">

			<div class="row">



				@if ($errors->has('favicon'))

                    <strong class="text-danger">{{ $errors->first('favicon') }}</strong>

                @endif

				<div class="col-md-6">

					<label for="exampleInputDetails">{{ __('adminstaticword.Favicon') }}</label>- <p class="inline info">Size: 35x35</p>

					<br>

					<input type="file" name="favicon" id="favi" class="{{ $errors->has('favicon') ? ' is-invalid' : '' }} inputfile inputfile-1" accept="image/*" />



					<label for="favi"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>{{ __('adminstaticword.Chooseafavicon') }}</span></label>

				</div>

				<div class="col-md-4">

					<div class="well">

						@if(@$setting->favicon !="")

							<div class="favicon-settings">

								<img src="{{ url('/')}}/images/favicon/{{@$setting->favicon}}" alt="{{ $setting->favicon }}" class="img-responsive">

							</div>

						@else

							<div class="alert alert-danger">

								{{ __('adminstaticword.NoFaviconfound') }}

							</div>

						@endif

					</div>



				</div>

			</div>

			<br>

		</div>

	

	</div>







	<div class="row">

		<div class="col-md-6">

			<div class="form-group">

				<label for="project_title">{{ __('adminstaticword.ProjectTitle') }}:<sup class="redstar">*</sup></label>

			  	<input value="{{ @$setting->project_title }}" placeholder="Enter project title" name="project_title" type="text" class="{{ @$errors->has('project_title') ? ' is-invalid' : '' }} form-control">

			  	@if (@$errors->has('project_title'))

	                <span class="text-danger invalid-feedback" role="alert">

	                    <strong>{{ $errors->first('project_title') }}</strong>

	                </span>

	            @endif

	        </div>

		</div>

		<div class="col-md-6">

			<label for="APP_URL">{{ __('adminstaticword.APPURL') }}:<sup class="redstar">*</sup></label>

		  	<input placeholder="http://localhost/" name="APP_URL" type="text" class="{{ $errors->has('APP_URL') ? ' is-invalid' : '' }} form-control" value="{{ $env_files['APP_URL'] }}" >

		  	@if ($errors->has('APP_URL'))

                <span class="text-danger invalid-feedback" role="alert">

                    <strong>{{ $errors->first('APP_URL') }}</strong>

                </span>

            @endif

            <br>

		</div>



	</div>



	<div class="row">



		<div class="col-md-6">

			<label for="phone">{{ __('adminstaticword.Contact') }}:<sup class="redstar">*</sup></label>

            <input value="{{ @$setting->default_phone }}" name="default_phone" placeholder="Enter contact no." type="text" class="{{ $errors->has('default_phone') ? ' is-invalid' : '' }} form-control" required>
 @if ($errors->has('default_phone'))

            <span class="text-danger invalid-feedback" role="alert">

                <strong>{{ $errors->first('default_phone') }}</strong>

            </span>

        @endif
		</div>

		<div class="col-md-6">

			<label for="wel_email">{{ __('adminstaticword.Email') }}:<sup class="redstar">*</sup></label>

            <input value="{{ @$setting->wel_email }}" name="wel_email" placeholder="Enter your email" type="text" class="{{ $errors->has('wel_email') ? ' is-invalid' : '' }} form-control" required>

		</div>

	</div>

	<br>



	<div class="row">

		<div class="col-md-6">

            <label for="cpy_txt">{{ __('adminstaticword.CopyrightText') }}:<sup class="redstar">*</sup></label>

            <input value="{{ @$setting->cpy_txt }}" name="cpy_txt" placeholder="Enter Copyright Text" type="text" required class="{{ $errors->has('cpy_txt') ? ' is-invalid' : '' }} form-control">

		</div>

		<div class="col-md-6">



		</div>



	</div>

	<br>
	<div class="row">

		<div class="col-md-12">

			<label for="exampleInputDetails">Footer Content:<sup class="redstar">*</sup></label>

            <textarea name="footer_content"  rows="2" class="form-control ckeditor" placeholder="Content" required>{{ @$setting->footer_content }}</textarea>

		</div>

	</div>

	<br>


	<div class="row">

		<div class="col-md-12">

			<label for="exampleInputDetails">{{ __('adminstaticword.Address') }}:<sup class="redstar">*</sup></label>

            <textarea name="default_address"  rows="2" class="form-control ckeditor" placeholder="Enter your address" required>{{ @$setting->default_address }}</textarea>

		</div>

	</div>

	<br>


	<div class="row">





		  			@csrf


	<div class="col-md-6">

	Twitter URL : <input type="text" name="twitter_url" id="twitter_url" value="{{ @$setting->twitter_url }}" class="form-control">

</div>
	<div class="col-md-6">

		Facebook URL : <input type="text" name="fb_url" id="fb_url" value="{{ @$setting->fb_url }}" class="form-control">

	</div>

	<div class="col-md-6">

		Instagram URL  : <input type="text" name="instagram_url" id="instagram_url" value="{{ @$setting->instagram_url }}" class="form-control">

	</div>







	<div class="col-md-6">

		Linkedin : <input type="text" name="linkedin_url" id="linkedin_url" value="{{ @$setting->linkedin_url }}" class="form-control">

	</div>


	<div class="col-md-6">

		Youtube URL : <input type="text" name="youtube_url" id="youtube_url" value="{{ @$setting->youtube_url }}" class="form-control">

	</div>


<br/>

<hr>

<br/>

</div>





    </div>






	<div class="box-footer">

		<button type="Submit" class="btn btn-lg col-md-3 btn-primary btn-md"><i class="fa fa-save"></i> {{ __('adminstaticword.Save') }}</button>

	</div>



</form>

