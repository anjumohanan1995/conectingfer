@extends('layouts.app')


@section('content')
<link href="{{url('/')}}/admin/css/style.css" rel="stylesheet" type="text/css" id="app-stylesheet" />
<div id="layout-wrapper">


            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                      <!-- breadcrumb -->
                      <div class="breadcrumb-header justify-content-between row me-0 ms-0 mb-3" >
                        <div class="col-xl-3">
                          <h4 class="content-title mb-2"> Settings</h4>
                          <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                  
                              <li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-box"> </i> - Settings</li>
                            </ol>
                          </nav>
                        </div>
                      </div>
                      <!-- /breadcrumb -->
    @if ($message = Session::get('success'))

<div class="alert alert-success">

  <p>{{ $message }}</p>

</div>

@endif

  <div class="row">

    <div class="card">
                                    <div class="card-body">


                                        <!-- Nav tabs -->
                                       

                                        <!-- Tab panes -->
                                        <div class="tab-content p-3">
                                            <div class="tab-pane active" id="home" role="tabpanel">

                                                    @include('setting.genral')

                                            </div>

                                        </div>

                                    </div>
                                </div>

  </div>


  </div>
  </div>
  </div>
  </div>





@endsection

<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

<script src="{{ asset('js/toastr.js') }}"></script>

@if (session('status'))
<script>
    toastr.success('{{ session("status") }}', 'Success!')        
</script>
@endif


<script>



(function($) {

  "use strict";





  $(document).ready(function(){

    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {

        localStorage.setItem('activeTab', $(e.target).attr('href'));

    });

    var activeTab = localStorage.getItem('activeTab');

    if(activeTab){

        $('#nav-tab a[href="' + activeTab + '"]').tab('show');

    }

  });



})(jQuery);



</script>



<script>

  $(document).on('click', '.toggle-password', function() {



    $(this).toggleClass("fa-eye fa-eye-slash");



    var input = $("#mailpass");

    input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')

  });

</script>



<script>

    $(document).on('click', '.toggle-password2', function() {



      $(this).toggleClass("fa-eye fa-eye-slash");



      var input = $("#fb_secret");

      input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')

    });

</script>



<script>

    $(document).on('click', '.toggle-password3', function() {



      $(this).toggleClass("fa-eye fa-eye-slash");



      var input = $("#gsecret");

      input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')

    });

</script>



<script>

    $(document).on('click', '.toggle-password4', function() {



      $(this).toggleClass("fa-eye fa-eye-slash");



      var input = $("#tsecret");

      input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')

    });

</script>



<script>

    $(document).on('click', '.toggle-password5', function() {



      $(this).toggleClass("fa-eye fa-eye-slash");



      var input = $("#asecret");

      input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')

    });

</script>



<script>

    $(document).on('click', '.toggle-password6', function() {



      $(this).toggleClass("fa-eye fa-eye-slash");



      var input = $("#lisecret");

      input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')

    });

</script>



<script>

    $(document).on('click', '.toggle-password7', function() {



      $(this).toggleClass("fa-eye fa-eye-slash");



      var input = $("#twsecret");

      input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')

    });

</script>





@section('script')

<script>

(function($) {

  "use strict";



  $(function(){



      $('#map_enable').change(function(){

        if($('#map_enable').is(':checked')){

          $('#sec1_one').show('fast');

          $('#sec_one').hide('fast');

        }else{

          $('#sec1_one').hide('fast');

          $('#sec_one').show('fast');

        }



      });



      $('#promo_enable').change(function(){

        if($('#promo_enable').is(':checked')){

          $('#sec2_one').show('fast');

        }else{

          $('#sec2_one').hide('fast');

        }



      });



  });

})(jQuery);

</script>

<script>
    CKEDITOR.replace('ckeditor')
</script>







@endsection

