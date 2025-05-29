<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Allegro - ERP System Administrator</title>
<meta name="description" content="Allegro - ERP System Administrtor">
<meta name="author" content="Albert - (c)ASAfoodenesia">

<html lang="en">
<head>
    <!-- BEGIN CSS for this page -->
    {{ HTML::style("assets/css/bootstrap.min.css") }}
    {{ HTML::style("assets/css/fontawesome/font-awesome.min.css") }}
    {{ HTML::style("assets/css/style.css") }}
    <!-- END CSS for this page -->
</head>

<? 
	/*
    require 'helper_database.php';
	require 'helper_table.php';
	require 'helper_formjq.php';
    require 'helper_lookup.php';
	$cn=db_connect();
    $id=isset($_GET['id'])?$_GET['id']:'BENANG-KARET';
	$dat=db_get_row('masterproduct', '*', "Code='$id' "); //, "Code='$_GET['id']' ");
    
    //for combolist
    $mCat=db_combolist('masterproductcategory', 'Category');
    $mType=['Raw material','Finish good'];
    $mHpp=['Average'];
    
    //for lookup
    $mCoa=db_get_array('mastercoa', 'AccNo,AccName','' ,'AccNo');
    */
 ?>

<!--<body class="adminbody widescreen" ng-controller="formCtrl">-->
<body >
	<? echo php #echo jsarray($dat,'post'); ?>
    <? echo php #echo jsarray($mCoa,'coa'); ?>

<div id="main">

	<!-- top bar navigation -->
    @include('topmenu')
    <!-- End Navigation -->

    <!-- Left Sidebar -->
    @include('menu')
    <!-- End Sidebar -->


    <div class="content-page">

		<!-- Start content -->
        <div class="content">

			<div class="container-fluid">

			     <div class="row">
					<div class="col-xl-12">
                        <div class="breadcrumb-holder">
                            <h1 class="main-title float-left">Product Data</h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Forms</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
					</div>
			     </div>
            <!-- end row -->

			<div class="alert alert-success invisible" role="alert">
				<h5>Data Product saved.</h5>
			</div>

            <form action="ajaxPost" method="post">
			<!-- panel button -->
			@include('buttonpanel',['jr'=>$jr])

            <!-- <form  method='post'> -->
            {{-- <input name='formtype' value='product' > --}}
            {{ Form::hidden('formtype',$jr) }}
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
      
			<div class="row">

					<!-- PANEL1 -->
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-check-square-o"></i> General data</h3>
							</div>
							<div class="card-body">
                                {!! form_text('Code', 'Product #', ['placeholder'=>'ID']) !!}
                                {!! form_text('Name', 'Product Name') !!}
                                {!! form_text('Barcode', 'Barcode') !!}
                                {!! form_combo('Category', 'Category', $mCat) !!}
                                {!! form_combo('Type', 'Type', $mType); !!}
                                {!! form_combo('HppBy', 'HPP', $mHpp); !!}
                                {!! form_checkbox('ActiveProduct', 'Active Product') !!}
                                {!! form_checkbox('StockProduct', 'Have Stock') !!}
                                {!! form_checkbox('canBuy', 'Product can buy') !!}
                                {!! form_checkbox('canSell', 'Product can sell') !!}
                            </div>
						</div><!-- end card-->
                    </div>

                    <!-- PANEL2 -->
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-check-square-o"></i> Other data</h3>
							</div>
							<div class="card-body">
                                {!! form_text('UOM', 'Main Unit') !!}
                                {!! form_text('ProductionUnit', 'Production Unit') !!}
                                {!! form_number('MinStock', 'Minimal Stock'); !!}
                                {!! form_number('MaxStock', 'Maximal Stock'); !!}
                                {!! form_number('SellPrice', 'Sell Price'); !!}
                                {!! form_number('LastBuyPrice', 'Last Buy Price',['disabled'=>true]); !!}
                                <br/><br/><br/><br/>
                                {!! form_textwlookup('AccHppNo', 'HPP Account No', ['modal'=>'modal-account']); !!}
                                {!! form_textwlookup('AccSellNo', 'Income Account No', ['modal'=>'modal-account']); !!}
                                {!! form_textwlookup('AccInventoryNo', 'Inventory Account No', ['modal'=>'modal-account']); !!}
							</div>
						</div><!-- end card-->
                    </div>

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

<!-- BEGIN Java Script for this page -->
<!-- @extends('loadjs') -->
{{ HTML::script("assets/js/jquery.min.js") }}
{{ HTML::script("assets/js/pikeadmin.js") }}
{{ HTML::script("assets/js/bootstrap.min.js") }}
{{ HTML::script("assets/js/bootbox.min.js") }}
{{ HTML::script("assets/js/helper_metroform.js") }}
<!-- END Java Script for this page -->

</body>
</html>

<!-- Modal -->
<!-- insert modal function HERE -->
{!! $modal !!}
<script>
{!! $jsmodal !!}
</script>
<!-- End Modal -->


<!-- JQuery SCRIPT -->
<script>
	//alert(post.AccCode);
	$(document).ready(function() {
    	//$('#info').text('AccCode');
        //alert(post['ActiveProduct']);
        $(':input[type=number]').on('mousewheel',function(e){ $(this).blur(); 
        });
        
		//load data
		//loaddata(post);
        $("input[type='lookup']").change();
        
        //cmSave click
        $('button#cmSave').click(function() {
            //alert('Save');
            var dialog = bootbox.dialog({
                message: '<p class="text-center mb-0"><i class="fa fa-spin fa-cog"></i>Saving, Please wait ...</p>',
                closeButton: false
            });
            //$(this).text('Save...');
            //form
            var data = $('form').serialize();
            //data={'form':data};
            //$.post( '_data-edit-save.php?form=product', data, function(data) {
            $.post( 'ajaxPost', data, function(data) {
                //... do something with response from server
                //alert(data);
                bootbox.alert({
                    message: data, backdrop:true
                });
                //$('#pop').show();
                //if(data!='') $('.alert').visible();
                //$('#info2').text( data );
                //$(this).text('Save');
                // save dialog
                dialog.modal('hide');
            });
        })

        //tbLookup Event
        $('input[type=lookup]').change(function() {
            var nm=$(this).attr('name');
            var find=$(this).val();
            var row='';
            for(var a=0;a<mcoa.length;a++) {
                row=mcoa[a];
                if(row.AccNo==find) break;
            }
            $('#label-'+nm).text(row.AccName); 
            //alert(row.AccName);
        }) 
    });
    
    /*
     $(document).on('change','input',function() {
        var nm=$(this).attr('name');
        var find=$(this).val();
        var row;
        for(var a=0;a<coa.length;a++) {
            row=coa[a];
            if(row.AccNo==find) break;
        }
        $('#label-'+nm).text(row.AccName);
    }) */
</script>





<!-- Angular SCRIPT -->
<script>
	/*
    var app = angular.module('myApp', ['ngSanitize']);
	app.controller('xformCtrl', function($scope, $http) {
	    //load data
		$scope.post=post;
		$scope.post.LastBuyPrice=123456789;

		$scope.info=post;
		//$scope.post=post;
		$scope.xinfo='qwertyuiop';
		//$scope.post.Code='xxxxxxxxxxx';
		$scope.Barcode='yyyyyyyyyy';


	});
    */
</script>


