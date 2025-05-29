<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Allegro - ERP System Administrator</title>
		<meta name="description" content="Allegro - ERP System Administrtor">
		<meta name="author" content="Albert - (c)ASAfoodenesia">

		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset( 'images/favicon.ico' ) }}">
		
		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
		<link href="{{ asset('css/fontawesome/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >
		<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
		<!-- BEGIN CSS for this page -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
		<!-- END CSS for this page -->
		
</head>

<?php
	function form_text($name, $label, $value='') {
		return "<label>$label</label><input name='' type='text' value='$value' />";   
	}
?>

<body class="adminbody">
  {{ $slot }}
</body>