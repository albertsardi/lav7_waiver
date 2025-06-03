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
                                            <h1 class="main-title float-left">{{$title??'Data List'}}</h1>
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
                                        <h3><i class="fa fa-table"></i> {{ucfirst($jr)??'Data'}} list</h3>
                                    </div>
                                        
                                    <div class="card-body">
                                        <div class="table-responsive">
                                        <div id='listData2' ></div>
                                        [grid wrapper]
                                        <div id="wrapper"></div>


                                        <table id="listData" class="table table-bordered table-hover display">
                                            {!! $gridhead !!}
                                            {!! $grid !!}
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
            <span class="text-right">Copyright <a target="_blank" href="#">Allegro.ID</a></span>
    <span class="float-right">
    Powered by <a target="_blank" href="https://www.intersoft.web.id"><b>@AlbertSardi@gmail.com</b></a>
    </span>
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
        {{-- <script src="{{ asset('assets/js/Chart.min.js') }}" type="text/javascript"></script> --}}
        {{-- grid.js --}}
        <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js" type="text/javascript"></script>
        <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" type="text/css" >
        <!-- Counter-Up-->
        <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}" type="text/javascript"></script><!-- diperlukan untuk counterup.js -->
        <script src="{{ asset('assets/js/jquery.counterup.min.js') }}" type="text/javascript"></script>
        
    
        <script>
            
            
            $(document).ready(function() {
                new Grid({ 
                        search:true,
                        columns: [{name:'Name',sort:true}, 'Email'],
                        data: [
                            ['John', 'john@example.com'],
                            ['Mike', 'mike@gmail.com']
                        ] 
                    }).render(document.getElementById('wrapper'));
                    
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

        </script>
    <!-- END Java Script for this page -->
    
    </x-mainlayout>