<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Allegro - ERP System Administrator</title>
<meta name="description" content="Allegro - ERP System Administrtor">
<meta name="author" content="Albert - (c)ASAfoodenesia">

<html lang="en">
<head>
    <!-- BEGIN CSS for this page -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/fontawesome/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="https://unpkg.com/tabulator-tables/dist/css/tabulator.min.css" rel="stylesheet">
    
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
    <!-- END CSS for this page -->
</head>

<!--<body class="adminbody widescreen" ng-controller="formCtrl">-->
<body >
	<? echo php #echo jsarray($dat,'post'); ?>
    <? echo php #echo jsarray($mCoa,'coa'); ?>

<div id="main">

	<!-- top bar navigation -->
    <x-topmenu />
    <!-- End Navigation -->

    <!-- Left Sidebar -->
    <x-menu />
    <!-- End Sidebar -->


    <div class="content-page">

		<!-- Start content -->
        <div class="content">

			<div class="container-fluid">

			     <div class="row">
					<div class="col-xl-12">
                        <div class="breadcrumb-holder">
                            <h1 class="main-title float-left">Product Data {{ $jr }}</h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Forms</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
					</div>
			     </div>

            {{-- post result --}}
            @if (session()->has('saveOK'))
                <div class="alert alert-success" role="alert">
                    Save Sukses.
                </div>
            @endif
            @if (session()->has('saveError'))
            <div class="alert alert-danger" role="alert">
                {{ session('saveError') }}
            </div>
            @endif
			<div class="alert alert-success invisible" role="alert">
				<h5>Data {{ ucfirst($jr) }} saved.</h5>
			</div>
            <div id='result'></div>
            @if(in_array($jr,['product','customer','supplier']))
                <form action="{{  url('datasave') }}" method="post">
            @else
                <form action="{{  url('transsave') }}" method="post">
            @endif
            @csrf
                <!-- panel button -->
                <div class="card card-body mb-2">
				<div class="form-group row">
					<div class="col-sm-10">
				  		<button id='cmSave' type="submit" class="btn btn-primary">Save</button>
			  			<button id='cmPrint' type="submit" class="btn btn-primary">Print</button>
					</div>
			  	</div>
			</div>

                <!-- <form  method='post'> -->
                {{ Form::hidden('formtype', $jr) }}
                {{ Form::hidden('id', $id) }}
        
                <div class='row'>
                    @yield('content')
                </div>
                
                <div class='row'>
                    @yield('tab')
                </div>

                <div class='row'>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        Created [CreatedDate] by [CreatedBy] 
                    </div>
                </div>

            </form>
            
            </div>
			<!-- END container-fluid -->
                
                

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->

	<footer class="footer">
		<? #require 'footer.php' ?>
	</footer>

</div>
<!-- END main -->

<!-- BEGIN PLugin Java Script for this page -->
<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pikeadmin.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootbox.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="https://unpkg.com/tabulator-tables/dist/js/tabulator.min.js"></script>
<script src="{{ asset('js/fastclick.js') }}" type="text/javascript"></script>

{{-- <script src="{{ asset('assets/js/helper_metroform.js') }}" type="text/javascript"></script> --}}

<!-- BEGIN Java Script for this page -->
{{-- <script src="{{ asset('assets/js/helper_metroform.js') }}" type="text/javascript"></script> --}}
@yield('js')
<!-- END Java Script for this page -->

</body>
</html>

<!-- Modal -->
<!-- insert modal function HERE -->
{{-- $modal --}}
<script>
{{-- $jsmodal --}}
</script>
<!-- End Modal -->


