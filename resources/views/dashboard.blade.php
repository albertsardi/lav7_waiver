<x-mainlayout>
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

				<!--
				<div class="alert alert-danger" role="alert">
				<h4 class="alert-heading">Info!</h4>
				<p>Do you want custom development to integrate this theme in your project? Or add new features? Contact us on <a target="_blank" href="https://www.pikeadmin.com"><b>Pike Admin Website</b></a></p>
				<p>Or try our PRO version: <b>Save over 50 hours of development with our Pro Framework: Registration / Login / Users Management, CMS, Front-End Template (who will load contend added in admin area and saved in MySQL database), Contact Messages Management, manage Website Settings and many more, at an incredible price!</b></p>
				<p>Read more about all PRO features here: <a target="_blank" href="https://www.pikeadmin.com/pike-admin-pro"><b>Pike Admin PRO features</b></a></p>
				</div>
				-->
						
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
				
					<!-- Chart 1 -->
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">						
						<x-card title="<i class='fa fa-line-chart'></i> Products Sold by Amount" description="Total product sold by amount in this year period. Can see each item sold ad profit.">
							<canvas id="lineChart"></canvas>
						</x-card>	
					</div>

					<!-- Chart 2 -->
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">						
						<x-card title="<i class='fa fa-bar-chart-o'></i> Product Sold by Category" description="Total product sold by each category in this year period. ">
							<canvas id="pieChart"></canvas>
						</x-card>
					</div>
						
					<!-- Chart 3 -->
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">						
							<x-card title="<i class='fa fa-bar-chart-o'></i> Top 5 Customer</h3>" decription="Top 5 big buyer customers in this year period.">
								<canvas id="doughnutChart"></canvas>
							</x-card>
						</xdiv><!-- end card-->
					</div>
						
				</div>
				<!-- end row -->
							
				<div class="row">

					<!-- Chart 4 -->
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">						
						<x-card title="<i class='fa fa-line-chart'></i>  Sales Amount this year vs last year" description="Comparation of sales by amount from today year sales to prior year sales.">
							<canvas id="lineChart2"></canvas>
						</x-card>
					</div>

					<!-- Table 1 -->
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">						
						<x-card title="<i class='fa fa-users'></i> Top Expenses List" description="All expenses in year period sorted by bigger expense on the top ad lesser on bottom.">
							<canvas id="lineChart2"></canvas>
						</x-card>
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-users"></i> Top Expenses List</h3>
									All expenses in year period sorted by bigger expense on the top ad lesser on bottom.
							</div>
							<div class="card-body">
								{!! $tableExpense !!}
								
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
		@include('footer')
	</footer>

</div>
<!-- END main -->

{{-- <script src="assets/js/modernizr.min.js"></script> --}}
<script src="{{ asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/popper.min.js') }}" type="text/javascript"></script> <!-- yg buat menu dapat di klik -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
{{-- <script src="assets/js/detect.js"></script> --}}
<script src="{{ asset('assets/js/fastclick.js') }}" type="text/javascript"></script> <!-- diperlukan untuk pikeadmin.js -->
{{-- <script src="assets/js/jquery.blockUI.js"></script> --}}
{{-- <script src="assets/js/jquery.nicescroll.js"></script> --}}
<!-- App js -->
<script src="assets/js/pikeadmin.js"></script>

<!-- BEGIN Java Script for this page -->
	<script src="{{ asset('assets/js/Chart.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
	<!-- Counter-Up-->
	<script src="{{ asset('assets/js/jquery.waypoints.min.js') }}" type="text/javascript"></script><!-- diperlukan untuk counterup.js -->
	<script src="{{ asset('assets/js/jquery.counterup.min.js') }}" type="text/javascript"></script>

	<script>
		$(document).ready(function() {
			// data-tables
			$('#example1').DataTable();
					
			// counter-up
			$('.counter').counterUp({
				delay: 10,
				time: 600
			});
		} );		
	</script>
	
	<script>
   //Chart Sales vs Profit
	var ctx1 = document.getElementById("lineChart").getContext('2d');
	var lineChart1 = new Chart(ctx1, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets: [{
				label: 'Profit',
					type: 'line',
					borderColor: 'yellow',
					borderWidth: 2,
					fill:false,
					data: []
				}, {
					label: 'Sales',
					type: 'bar',
					backgroundColor: '#3EB9DC',
					data: []
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


	var ctx2 = document.getElementById("lineChart2").getContext('2d');
	var lineChart2 = new Chart(ctx2, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets: [{
					label: 'Sales '+<?=$yr;?>,
					backgroundColor: '#3EB9DC',
					data: []
				}, {
					label: 'Sales '+<?=$yr-1;?>,
					backgroundColor: '#ff9f40',
					data: []
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

	var ctx3 = document.getElementById("pieChart").getContext('2d');
	var pieChart = new Chart(ctx3, {
		type: 'pie',
		data: {
            datasets: [{
               data: [],
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
            labels: []
        },
        options: {
            responsive: true
        }
	});

	var ctx4 = document.getElementById("doughnutChart").getContext('2d');
	var doughnutChart = new Chart(ctx4, {
		type: 'doughnut',
		data: {
            datasets: [{
                data: [],
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
			labels: []
        },
        options: {
            responsive: true
        }

	});

	//Load data using ajax
	//Chart Product sold by amount
	$.ajax({
			url:"{{ url( '/ajax_makechart/salesvsprofit' ) }}",
			dataType: 'json'
	})
	.done(function(data){
      console.log(data);
			lineChart1.data.datasets[0].data=data[0];
			lineChart1.data.datasets[1].data=data[1];
			lineChart1.update();
	});



   //Chart Product sold by amount
	$.ajax({
			url:"{{ url( '/ajax_makechart/salesamountbyyear' ) }}",
			dataType: 'json'
	})
	.done(function(data){
      console.log(data);
			lineChart2.data.datasets[0].data=data[0];
			lineChart2.data.datasets[1].data=data[1];
			lineChart2.update();
	});
	//Chart Product sold by category
	$.ajax({
			url:"{{ url( '/ajax_makechart/salesamountbycategory' ) }}",
			dataType: 'json'
	})
	.done(function(data){
			pieChart.data.datasets[0].data=data[1];//data[0];
			//pieChart.data.labels=['11','22','33'];
			pieChart.data.labels=data[0];
			pieChart.update();
			//alert('finish');
	});
	//Top5 Customer
	$.ajax({
			url:"{{ url( '/ajax_makechart/top5salesbycustomer' ) }}",
			dataType: 'json'
	})
	.done(function(data){
			doughnutChart.data.datasets[0].data= data[1];
			doughnutChart.data.labels= data[0]; //['11','22','33'];
			doughnutChart.update();
	});

</script>
<!-- END Java Script for this page -->

</x-mainlayout>