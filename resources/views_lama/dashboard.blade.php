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
                                <h1 class="main-title float-left">Dashboard</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                                <div class="clearfix"></div>
                        </div>
					</div>
				</div>
				<!-- end row -->

				<div class="row">
					<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
						<div class="card-box noradius noborder bg-default">
							<i class="fa fa-file-text-o float-right text-white"></i>
							<h6 class="text-white text-uppercase m-b-20">Orders</h6>
							<h1 class="m-b-20 text-white counter">1,587</h1>
							<span class="text-white">15 New Orders</span>
						</div>
					</div>
					<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
						<div class="card-box noradius noborder bg-warning">
							<i class="fa fa-bar-chart float-right text-white"></i>
							<h6 class="text-white text-uppercase m-b-20">Visitors</h6>
							<h1 class="m-b-20 text-white counter">250</h1>
							<span class="text-white">Bounce rate: 25%</span>
						</div>
					</div>
					<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
						<div class="card-box noradius noborder bg-info">
							<i class="fa fa-user-o float-right text-white"></i>
							<h6 class="text-white text-uppercase m-b-20">Users</h6>
							<h1 class="m-b-20 text-white counter">120</h1>
							<span class="text-white">25 New Users</span>
						</div>
					</div>
					<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
						<div class="card-box noradius noborder bg-danger">
							<i class="fa fa-bell-o float-right text-white"></i>
							<h6 class="text-white text-uppercase m-b-20">Alerts</h6>
							<h1 class="m-b-20 text-white counter">58</h1>
							<span class="text-white">5 New Alerts</span>
						</div>
					</div>
				</div>
				<!-- end row -->

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-line-chart"></i> Products Sold by Amount</h3>
								Total product sold by amount in this year period. Can see each item sold ad profit.
							</div>
							<div class="card-body">
								<canvas id="lineChart"></canvas>
							</div>
							<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
						</div><!-- end card-->
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-bar-chart-o"></i> Product Sold by Category</h3>
								Total product sold by each category in this year period.
							</div>
							<div class="card-body">
								<canvas id="pieChart"></canvas>
							</div>
							<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
						</div><!-- end card-->
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-bar-chart-o"></i> Top 5 Customer</h3>
								Top 5 big buyer customers in this year period.
							</div>
							<div class="card-body">
								<canvas id="doughnutChart"></canvas>
							</div>
							<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
						</div><!-- end card-->
					</div>
				</div>
				<!-- end row -->

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-line-chart"></i>  Sales Amount this year vs last year</h3>
								Comparation of sales by amount from today year sales to prior year sales.
							</div>
							<div class="card-body">
								<canvas id="lineChart2"></canvas>
							</div>
							<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
						</div><!-- end card-->
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-users"></i> Top Expenses List</h3>
								All expenses in year period sorted by bigger expense on the top ad lesser on bottom.
							</div>

							<div class="card-body">
								<table id="example1" class="table table-bordered table-responsive-xl table-hover display">
                  <?php #echo table_generate($tablechart_data,['Expenses','Amount']);?>
								</table>
							</div>
							<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
        <?php #require 'footer.php';?>
	</footer>

</div>
<!-- END main -->

<!-- BEGIN Java Script for this page -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>-->
<script src="{{ asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/fastclick.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pikeadmin.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/Chart.min.js') }}" type="text/javascript"></script>

<!--<script src="xassets/js/jquery.dataTables.min.js"></script>-->
<!--<script src="xassets/js/dataTables.bootstrap4.min.js"></script>-->

<!-- Counter-Up-->
<!--<script src="xassets/js/jquery.waypoints.min.js"></script>-->
<!--<script src="xassets/js/jquery.counterup.min.js"></script>-->

<script>
    $(document).ready(function() {
        // data-tables
        //$('#example1').DataTable();

        // counter-up
        /*
        $('.counter').counterUp({
            delay: 10,
            time: 600
        });
        */
        //alert('hehe');
        //$('li').css('background-color','red');
        //$('*').css('background-color','red');
    });
</script>

<script>
/*
	var ctx1 = document.getElementById("lineChart").getContext('2d');
	var lineChart = new Chart(ctx1, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets: [{
					label: 'Sales',
					backgroundColor: '#3EB9DC',
					//data: <?#= $chart1_sales;?>
				}, {
					label: 'Profit',
					backgroundColor: 'cyan', //'#EBEFF3',
					//data: <?#= $chart1_profit;?>
				}]

		},
		options: {
            tooltips: {
                mode: 'index',
                intersect: false
            },
            responsive: true,
            scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }
	});

	var ctx2 = document.getElementById("lineChart2").getContext('2d');
	var lineChart = new Chart(ctx2, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets: [{
					label: 'Sales '+<?#=$yr;?>,
					backgroundColor: '#3EB9DC',
					data: <?#= $chart2_data1;?>
				}, {
					label: 'Sales '+<?#=$yr-1;?>,
					backgroundColor: '#ff9f40',
					data: <?#= $chart2_data2;?>
				}]

		},
		options: {
            tooltips: {
                mode: 'index',
                intersect: false
            },
            responsive: true,
            scales: {
                xAxes: [{
                    stacked: false,
                }],
                yAxes: [{
                    stacked: false
                }]
            }
        }
	});

	var ctx2 = document.getElementById("pieChart").getContext('2d');
	var pieChart = new Chart(ctx2, {
		type: 'pie',
		data: {
            datasets: [{
                data: <?#= $piechart_data;?>,
                backgroundColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                label: 'Dataset 1'
            }],
            labels: <?#= $piechart_label;?>
        },
        options: {
            responsive: true
        }
	});

	var ctx3 = document.getElementById("doughnutChart").getContext('2d');
	var doughnutChart = new Chart(ctx3, {
		type: 'doughnut',
		data: {
            datasets: [{
                data: <?#= $donutchart_data?>,
                backgroundColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                label: 'Dataset 1'
            }],
            labels: <?#= $donutchart_label;?>
        },
        options: {
            responsive: true
        }

	});
	*/
</script>
<!-- END Java Script for this page -->

</body>
</html>

?>
