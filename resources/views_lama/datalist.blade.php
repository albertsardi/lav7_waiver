<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Allegro - ERP System Administrator</title>
<meta name="description" content="Allegro - ERP System Administrtor">
<meta name="author" content="Albert - (c)ASAfoodenesia">

<html lang="en">
<head>
    <!-- BEGIN CSS for this page -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/css/fontawesome/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" >
    <!-- END CSS for this page -->
</head>

<body class="adminbody">

<div id="main">

	<!-- top bar navigation -->
	@extends('topmenu')
	<!-- End Navigation -->

	<!-- Left Sidebar -->
	@extends('menu')
	<!-- End Sidebar -->


    <div class="content-page">

		<!-- Start content -->
        <div class="content">

			<div class="container-fluid">

				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left">{{ $caption }}</h1>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item active">Data Tables</li>
							</ol>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<!-- end row -->

				<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<div class="card mb-3">
								<div class="card-header">
									<h3><i class="fa fa-table"></i> Data list</h3>
								</div>

								<div class="card-body">
									<div class="table-responsive">
									<table id="example1" class="table table-bordered table-hover display">
										<?= $grid;?>
									</table>
									</div>

								</div>
							</div><!-- end card-->
						</div>
				</div>

            </div>
			<!-- END container-fluid -->
		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->

	<footer class="footer">
		[footer.php]
	</footer>

</div>
<!-- END main -->

<!-- BEGIN Java Script for this page -->
<script src="{{ asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pikeadmin.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/fastclick.js') }}" type="text/javascript"></script>
<script>
   // START CODE FOR BASIC DATA TABLE
   $(document).ready(function() {
       var jr='customer';
       switch(jr) {
           case 'customer':
           case 'supplier':
               $('#example1').DataTable({
                   "columns": [
                           { "data": 0 },
                           { "data": 1 },
                           { "data": 2 },
                           { "data": "Address" },
                           { "data": "Bal", "className":'col-number', render: $.fn.dataTable.render.number(',','.',0,'') }
                       ]
               });
               break;
           case 'product':
               $('#example1').DataTable({
                   "columns": [
                           { "data": "Code" },
                           { "data": "Name" },
                           { "data": "UOM" },
                           { "data": "Category" },
                           { "data": "Qty", "className":'col-number', render: $.fn.dataTable.render.number(',','.',0,'') }
                       ]
               });
               break;
       }
   });
   // END CODE FOR BASIC DATA TABLE
</script>
<!-- END Java Script for this page -->

</body>
</html>
