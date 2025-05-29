<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Allegro - ERP System Administrator</title>
<meta name="description" content="Allegro - ERP System Administrtor">
<meta name="author" content="Albert - (c)ASAfoodenesia">

<!-- Favicon -->
<link rel="shortcut icon" href="assets/images/favicon.ico">

<!-- Bootstrap CSS -->
<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<!-- Font Awesome CSS -->
<link href="/assets/css/fontawesome/font-awesome.min.css" rel="stylesheet" type="text/css" />

<!-- CSS page -->
<link href="/assets/css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Modal CSS -->
<link href="assets/css/modal.css" rel="stylesheet" type="text/css" />

<!-- Custom CSS -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
	
	<!-- BEGIN CSS for this page -->
	<style>	
		.col-number{color:darkcyan; text-align:right; }
	</style>		
	<!-- END CSS for this page -->
</head>


<script>var jr='customer';</script>

<body class="adminbody" ng-controller="formCtrl">
		
<div id="main">

	<!-- top bar navigation -->
	<div class="headerbar">

  <!-- LOGO -->
      <div class="headerbar-left">
    <a href="index.php" class="logo"><img alt="Logo" src="assets/images/logo.png" /> <span>Allegro</span></a>
      </div>

      <nav class="navbar-custom">

                  <ul class="list-inline float-right mb-0">

          <li class="list-inline-item dropdown notif">
                          <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                              <i class="fa fa-fw fa-question-circle"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                              <!-- item-->
                              <div class="dropdown-item noti-title">
                                  <h5><small>Help and Support</small></h5>
                              </div>

                              <!-- item-->
                              <a target="_blank" href="https://www.pikeadmin.com" class="dropdown-item notify-item">
                                  <p class="notify-details ml-0">
                                      <b>Do you want custom development to integrate this theme?</b>
                                      <span>Contact Us</span>
                                  </p>
                              </a>

                              <!-- item-->
                              <a target="_blank" href="https://www.pikeadmin.com/pike-admin-pro" class="dropdown-item notify-item">
                                  <p class="notify-details ml-0">
                                      <b>This ERP system still on development</b> some menu can ot be access yet.
                                      <span>(c) InterSoft Media</span>
                                      <span>Develop by Albert</span>
                                  </p>
                              </a>

                          </div>
                      </li>

                      <li class="list-inline-item dropdown notif">
                          <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                              <i class="fa fa-fw fa-envelope-o"></i><span class="notif-bullet"></span>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                              <!-- item-->
                              <div class="dropdown-item noti-title">
                                  <h5><small><span class="label label-danger pull-xs-right">12</span>Contact Messages</small></h5>
                              </div>

                              <!-- item-->
                              <a href="#" class="dropdown-item notify-item">
                                  <p class="notify-details ml-0">
                                      <b>Jokn Doe</b>
                                      <span>New message received</span>
                                      <small class="text-muted">2 minutes ago</small>
                                  </p>
                              </a>

                              <!-- item-->
                              <a href="#" class="dropdown-item notify-item">
                                  <p class="notify-details ml-0">
                                      <b>Michael Jackson</b>
                                      <span>New message received</span>
                                      <small class="text-muted">15 minutes ago</small>
                                  </p>
                              </a>

                              <!-- item-->
                              <a href="#" class="dropdown-item notify-item">
                                  <p class="notify-details ml-0">
                                      <b>Foxy Johnes</b>
                                      <span>New message received</span>
                                      <small class="text-muted">Yesterday, 13:30</small>
                                  </p>
                              </a>

                              <!-- All-->
                              <a href="#" class="dropdown-item notify-item notify-all">
                                  View All
                              </a>

                          </div>
                      </li>

          <li class="list-inline-item dropdown notif">
                          <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                              <i class="fa fa-fw fa-bell-o"></i><span class="notif-bullet"></span>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg">
              <!-- item-->
                              <div class="dropdown-item noti-title">
                                  <h5><small><span class="label label-danger pull-xs-right">5</span>Allerts</small></h5>
                              </div>

                              <!-- item-->
                              <a href="#" class="dropdown-item notify-item">
                                  <div class="notify-icon bg-faded">
                                      <img src="assets/images/avatars/avatar2.png" alt="img" class="rounded-circle img-fluid">
                                  </div>
                                  <p class="notify-details">
                                      <b>John Doe</b>
                                      <span>User registration</span>
                                      <small class="text-muted">3 minutes ago</small>
                                  </p>
                              </a>

                              <!-- item-->
                              <a href="#" class="dropdown-item notify-item">
                                  <div class="notify-icon bg-faded">
                                      <img src="assets/images/avatars/avatar3.png" alt="img" class="rounded-circle img-fluid">
                                  </div>
                                  <p class="notify-details">
                                      <b>Michael Cox</b>
                                      <span>Task 2 completed</span>
                                      <small class="text-muted">12 minutes ago</small>
                                  </p>
                              </a>

                              <!-- item-->
                              <a href="#" class="dropdown-item notify-item">
                                  <div class="notify-icon bg-faded">
                                      <img src="assets/images/avatars/avatar4.png" alt="img" class="rounded-circle img-fluid">
                                  </div>
                                  <p class="notify-details">
                                      <b>Michelle Dolores</b>
                                      <span>New job completed</span>
                                      <small class="text-muted">35 minutes ago</small>
                                  </p>
                              </a>

                              <!-- All-->
                              <a href="#" class="dropdown-item notify-item notify-all">
                                  View All Allerts
                              </a>

                          </div>
                      </li>

                      <li class="list-inline-item dropdown notif">
                          <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                              <img src="assets/images/avatars/admin.png" alt="Profile image" class="avatar-rounded">
                          </a>
                          <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                              <!-- item-->
                              <div class="dropdown-item noti-title">
                                  <h5 class="text-overflow"><small>Hello, admin</small> </h5>
                              </div>

                              <!-- item-->
                              <a href="profile-edit.php" class="dropdown-item notify-item">
                                  <i class="fa fa-user"></i> <span>Profile</span>
                              </a>

                              <!-- item-->
                              <a href="#" class="dropdown-item notify-item">
                                  <i class="fa fa-power-off"></i> <span>Logout</span>
                              </a>
                          </div>
                      </li>

                  </ul>

                  <ul class="list-inline menu-left mb-0">
                      <li class="float-left">
                          <button class="button-menu-mobile open-left">
              <i class="fa fa-fw fa-bars"></i>
                          </button>
                      </li>
                  </ul>

      </nav>

</div>
	<!-- End Navigation -->

	<!-- Left Sidebar -->
	

<div class="left main-sidebar">

    <div class="sidebar-inner leftscroll">

        <div id="sidebar-menu">

            <ul>


                <!--<li class="submenu">
          <a class="active" href="index.php"><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
                  </li>-->
                <li class='submenu'>
              <a href='index.php' >
                <i class='fa fa-fw fa-bars'></i><span> Dashboard </span> 
              </a>
            </li>                <li class='submenu'>
              <a href='reportall.php' >
                <i class='fa fa-fw fa-area-chart'></i><span> Reports </span> 
              </a>
            </li>                <li class='submenu'>
              <a href='banklist.php' >
                <i class='fa fa-fw fa-file-text-o'></i><span> Cash & Banks </span> 
              </a>
            </li>                <li class='submenu'>
              <a href='#' ><i class='fa fa-fw fa-th'></i> <span> Purchases </span> <span class='menu-arrow'></span></a>
              <ul class='list-unstyled'><li><a href='translist.php?id=PI' > Purchase Invoices </a></li><li><a href='translist.php?id=AP' > Pay BIlls </a></li></ul>
            </li>                <li class='submenu'>
              <a href='#' ><i class='fa fa-fw fa-th'></i> <span> Sales </span> <span class='menu-arrow'></span></a>
              <ul class='list-unstyled'><li><a href='translist.php?id=DO' > Delivery Order </a></li><li><a href='translist.php?id=SI' > Sales Invoices </a></li><li><a href='translist.php?id=AR' > Receive Payments </a></li></ul>
            </li>                <li class='submenu'>
              <a href='#' ><i class='fa fa-fw fa-th'></i> <span> Manufacture </span> <span class='menu-arrow'></span></a>
              <ul class='list-unstyled'><li><a href='datalist.php?id=bom' > Bill Of Material </a></li><li><a href='translist.php?id=WO' > Work Order </a></li><li><a href='translist.php?id=MR' > Material Release </a></li><li><a href='translist.php?id=PR' > Production Result </a></li></ul>
            </li>                <li class='submenu'>
              <a href='translist.php?id=EX' >
                <i class='fa fa-fw fa-file-text-o'></i><span> Expenses </span> 
              </a>
            </li>                <li class='submenu'>
              <a href='datalist.php?id=customer' class='active'>
                <i class='fa fa-fw fa-file-text-o'></i><span> Customers </span> 
              </a>
            </li>                <li class='submenu'>
              <a href='datalist.php?id=supplier' >
                <i class='fa fa-fw fa-file-text-o'></i><span> Suppliers </span> 
              </a>
            </li>                <li class='submenu'>
              <a href='datalist.php?id=product' >
                <i class='fa fa-fw fa-file-text-o'></i><span> Products </span> 
              </a>
            </li>                <li class='submenu'>
              <a href='accountlist.php' >
                <i class='fa fa-fw fa-file-text-o'></i><span> Chart of Accounts </span> 
              </a>
            </li>                <li class='submenu'>
              <a href='setting.php' >
                <i class='fa fa-fw fa-file-text-o'></i><span> Setting </span> 
              </a>
            </li>                <li class='submenu'>
              <a href='' >
                <i class='fa fa-fw fa-file-text-o'></i><span> Log out </span> 
              </a>
            </li>









            </ul>

            <div class="clearfix"></div>

        </div>

        <div class="clearfix"></div>

    </div>

</div>

	<!-- End Sidebar -->


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
							
				<div class="row">
						<div class="col-xl-12">
								<div class="breadcrumb-holder">
										<h1 class="main-title float-left">Customer List</h1>
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
										<thead><tr><th>Display Name</th><th>Phone</th><th>Email</th><th>Address</th><th>Balance (Rp)</th></tr></thead><tbody><tr><td ><a href='customer-edit.php?id=ABU001'>KO ABUN</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=AFU001'>AFUNG</a></td><td ></td><td ></td><td >TAMAN SEREAL</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=AHA001'>KO AHA</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=AKI001'>KO AKI</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=AMN001'>KO AMIN</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=ANE001'></a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=ANG001'>ANGEL</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=AR001'>HJ. AR</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=AR002'>CI ARUM</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=ASA001'>KO ASAU</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=ATA001'>ATA</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=ATO001'>KO ATO</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=AYO001'>KO AYONG</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=BEN001'>KO BENI</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=BUS001'>HJ. BUSRO</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=CASH001'>CASH</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=CS01'>CARMEL SEJATI, PT xxx</a></td><td >085753693910</td><td >albertsardi@gmail.com</td><td >JL Pergudangan Kelapa Gading PALA NO 23 RT/RW 002/007 JKT</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=DEW001'>CI DEWI</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=EB001'>H. EBOH</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=EDY001'>H. EDY</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=FAT001'>FATKUR</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=FEB001'>FEBRY</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=FO001'>FASHION OUTLET</a></td><td ></td><td ></td><td >SOLO</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=GEF001'>GEFO</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=GIV001'>GIVEN</a></td><td ></td><td ></td><td >PEKAPURAN</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=GRS001'>GRS, PT</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=JEN001'>JENMAS</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=KUS001'>KUSUMA, PT</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=LEX001'>LEXY</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=LIS001'>LISA</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=MAT001'>MATRIX, PT</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=OBO001'>OBOY</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=SAL001'>SALAM</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=SBR001'>SBR</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=SIH001'>SIHAP</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=SUM001'>H. SUMANTRI NUNUNG</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=SYA001'>HJ. SYAM</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=SYA002'>SYAHRIAL</a></td><td ></td><td ></td><td >BUKIT TINGGI</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=UJT001'>UTAMA JAYA TELADAN, PT</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=WAW001'>WAWAN</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=YA001'>YUPITER AGUNGMANDIRI, PT</a></td><td ></td><td ></td><td >JL RAYA DURI KOSAMBI JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=YET001'>IBU YETI</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=YUL001'>CI YULI</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=YUN001'>YUNEZA</a></td><td ></td><td ></td><td >JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=CS01'>CARMEL SEJATI, PT xxx</a></td><td >085753693910</td><td >albertsardi@gmail.com</td><td >JL JELAMBAR KEBON PALA NO 23 RT/RW 002/007 JKT (office)</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=GAS01'>GRIYA ABADI SENTOSA, PT</a></td><td ></td><td ></td><td >JL WIJAYA KUSUMA I BLOK VV NO 4 B-C PETAMBURAN</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=GNP01'>GAGAN NUSA PERKASA, PT</a></td><td ></td><td ></td><td >TAMAN PALEM LESTARI BLOK L NO 30A JAKARTA</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=PKG01'>PUTRA KREASINDO GARMENT, PT</a></td><td ></td><td ></td><td >TAMAN PALEM LESTARI RUKO GALAXY BLOK Q NO 25 JKT</td><td ></td></tr><tr><td ><a href='customer-edit.php?id=RIMA001'>RIA INDAH MANDIRI ABADI, PT</a></td><td ></td><td ></td><td >JL ALTERNATIF SENTUL KP CIJUJUNG UTARA RT 004/001</td><td ></td></tr></tbody>									</table>
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
		<span class="text-right">
Copyright <a target="_blank" href="#">Allegro.ID</a>
</span>
<span class="float-right">
Powered by <a target="_blank" href="https://www.intersoft.web.id"><b>@AlbertSardi@gmail.com</b></a>
</span>
	</footer>

</div>
<!-- END main -->

<!-- AngularJS Core -->
<!--<script src="assets/js/angular.1.6.6.min.js"></script>-->
<!--<script src="assets/js/angular-sanitize.js"></script>-->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/modernizr.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/numeral.min.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/datepicker.js"></script>

<!--use bootbox.js -->
<script src="assets/js/bootbox.min.js"></script>

<!-- popper js -->
<script src="assets/js/popper.min.js"></script>

<!-- axios js -->
<script src="assets/js/axios.min.js"></script>

<!-- App js -->
<script src="assets/js/pikeadmin.js"></script>
<script src="editgrid.js"></script>
<script >
	
    function cnum(v) {
        v=v.replace(/,/g, '')
        var x = Number(v);
        return x;
    }

    // FORMAT CURRENCY
    function fnum(amount) {
        //alert(amount);
        return numeral(amount).format('0,0');
    }
    /*function xfnum(amount) {
        var delimiter = ","; // replace comma if desired
        amount=amount.toString();
        var a = amount.split('.',2);
        var d = a[1];
        var i = parseInt(a[0]);
        if(isNaN(i)) { return ''; }
        var minus = '';
        if(i < 0) { minus = '-'; }
        i = Math.abs(i);
        var n = new String(i);
        var a = [];
        while(n.length > 3) {
            var nn = n.substr(n.length-3);
            a.unshift(nn);
            n = n.substr(0,n.length-3);
        }
        if(n.length > 0) { a.unshift(n); }
        n = a.join(delimiter);
        if(d.length < 1) { amount = n; }
        else { amount = n ; }  // else { amount = n + '.' + d; }  //enable 0 dibelakang koma
        amount = minus + amount;
        return amount;
    }*/

    //text lookup event
    function showLookup(nm) {
        var find=$('input[name='+nm+']').val();
        var row;
        var v='';
        if(nm=='AccNo') {
            for(var a=0;a<coa.length;a++) {
                row=coa[a];
                if(row.AccNo==find) break;
            }
            v=row.AccName;
        }
        if(nm=='AccCode') {
            for(var a=0;a<acc.length;a++) {
                row=acc[a];
                if(row.AccCode==find) break;
            }
            v=row.AccName;
        }
        $('#label-'+nm).text(v);
    }

    $(document).ready(function() {
        var target=''; var targetrow=null;

        //Form Event
        $('input[type=checkbox]').change(function() {
            //var name=$(this).attr('name').substr(3);
            var name=$(this).attr('target');
            var v=0;
            if($(this).prop('checked')) v=1;
            $('input[name='+name+']').val( v );
        })
        $("[data-toggle='datepicker']").datepicker({
 	 		autoHide:true,
			format:'yyyy-mm-dd'
		});
        $('input[type=xnumeric]').change(function() {
            var v=numeral($(this).val());
            v=v.format('0,0');
            $(this).val(v);
        })

        //cmLookup click
        $('button.cmLook').click(function() {
            //check if modal exit
            var modal=$(this).attr('data-target'); //alert(modal);
            if($(modal).length == 0) { alert('modal window '+modal+' not exist');exit(); }
            //show lookup
            target=$(this).attr('target');
            //$('.modal').modal('show');
            $(modal).modal('show');
        })

        //modal select
        //$('#modal-window a').click(function(e) {
        $('.modal a').click(function(e) {
            e.preventDefault();
            var sel=$(this).text(); //alert(sel);
            if( targetrow==null) { //for form
                //alert(target);
                $('input[name='+target+']').val(sel);
                $('input[name='+target+']').change();
            } else { //for grid
                var cell=$("input[name='"+target+"']:eq("+targetrow+")");
                //var cell=$("div.grow[line='"+targetrow+"'] > input[name='"+target+"']");
                cell.val(sel);
                cell.change();
            }
            targetrow=null;
            $(".modal .close").click();
        })

        //grid cmLookup click
        $('button.cmGridLook').click(function() {
            //check if modal exit
            var modal=$(this).attr('data-target');
            if($(modal).length == 0) { alert('modal window '+modal+' not exist');exit(); }
            //show lookup
            target=$(this).attr('target');
            targetrow=$(this).parent().attr('line');
            //$('#modal-window').modal('show');
            $(modal).modal('show');
        })

        //$('input[type=lookup]').change(function() {
        //    alert('ff');
        //}

    })



</script>


<!-- Form js -->
<script>
    //load form data
    function loaddata(post) {
        if(post.length==0) { alert('form no json data');exit(); }
        $('input[type=text].form-control').each(function(){
    		var name=$(this).attr('name');
    		$(this).val(post[name]);
        })
        $('input[type=numeric].form-control').each(function(){
    		var name=$(this).attr('name');
    		var v=numeral(post[name]);
            v=v.format('0,0');
            $(this).val(v);
        })
        $('input[type=checkbox].form-control').each(function(){
    		//var name=$(this).attr('name').substr(3);
            var name=$(this).attr('target');
            if(post[name]=='1') {
                $(this).attr('checked',true);
            } else {
                $(this).attr('checked',false);
            }
            $(this).change();
		})
        $('textarea.form-control').each(function(){
            var name=$(this).attr('name');
            $(this).val(post[name]);
        })
        $('select.form-control').each(function(){
    		var name=$(this).attr('name');
    		$(this).val(post[name]);
		})
        $('input[type=lookup].form-control').each(function(){
    		var name=$(this).attr('name');
    		$(this).val(post[name]);
            //$(this).change();
            //$(this).trigger("change");
        })
        $('xlabel').each(function(){
    		var name=$(this).attr('name');
    		$('#'+name).text(post[name]);
        })
    }
    //event
    $('input[type=lookup]').change(function() {
        var nm=$(this).attr('name');
        showLookup(nm);
    })
</script>




<!-- BEGIN Java Script for this page -->
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap4.min.js"></script>

	<script>
	// START CODE FOR BASIC DATA TABLE 
	$(document).ready(function() {
		//alert(jr);
        switch(jr) {
            case 'customer':
            case 'supplier':
                $('#example1').DataTable({
                    "columns": [
                            { "data": "Acc" },
                            { "data": "Phone" },
                            { "data": "Email" },
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
            case 'bom':
                $('#example1').DataTable({
                    "columns": [
                            { "data": "Code" },
                            { "data": "Name" },
                            { "data": "UOM" } 
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
