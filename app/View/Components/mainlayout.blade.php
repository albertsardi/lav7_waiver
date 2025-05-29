<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Allegro - ERP System Administrator</title>
		<meta name="description" content="Allegro - ERP System Administrtor">
		<meta name="author" content="Albert - (c)ASAfoodenesia">

		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
		
		<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
		<link href="{{ asset('assets/css/fontawesome/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >
		<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" >
		<!-- BEGIN CSS for this page -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
		<!-- END CSS for this page -->
		
</head>

<body class="adminbody">

<div id="main">

	<!-- top bar navigation -->
	@include('topmenu')
	<!-- End Navigation -->
 
	<!-- Left Sidebar -->
	@include('menu')
	<!-- End Sidebar -->


	{{ $slot }}	

</body>
</html>