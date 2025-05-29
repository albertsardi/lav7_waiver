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

<body >
	<? #echo jsarray($dat,'post'); ?>
    <? #echo jsarray($mCoa,'coa'); ?>


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
                            <h1 class="main-title float-left">Customer Data</h1>
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
				<h5>Data Customer saved.</h5>
			</div>
                
            <!-- panel button -->
			@include('buttonpanel', ['jr'=>$jr])

            <form  method='post'>
            {{ Form::hidden('formtype',$jr) }}
			<div class="row">
					
                    <!-- PANEL1 -->
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-check-square-o"></i> General data</h3>
							</div>
							<div class="card-body">
                                {!! form_text('AccCode', 'ID Account',['placeholder'=>'ID']) !!}
                                {!! form_text('AccName', 'Name') !!}
                                {!! form_combo('Category', 'Category') !!}
                                {!! form_combo('Salesman', 'Salesman') !!}
                                {!! form_text('Memo', 'Memo') !!}
                                {!! form_checkbox('Active', 'Active Customer') !!}
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
                                {!! form_combo('Code', 'Address Code', $mAddr) !!}
                                {!! form_checkbox('DefAddr', 'Default Address') !!}
                                {!! form_text('Address', 'Address') !!}
                                {!! form_text('Zip', 'Postal Code') !!}
                                {!! form_text('ContachPerson', 'Contach Person') !!}
                                {!! form_text('Phone', 'Phone') !!}
                                {!! form_text('Fax', 'Fax') !!}
							</div>
						</div><!-- end card-->
                    </div>

                	<!-- TAB -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-square-o"></i> Account data</h3>
							</div>
							<div class="card-body">
							<nav>
								<div class="nav nav-tabs" id="nav-tab" role="tablist">
									<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Credit</a>
									<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Account</a>
									<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Tax</a>
								</div>
							</nav>
					<div class="tab-content" id="nav-tabContent">
					 	<!-- tab 1-->
					 	<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
					  		{!! form_text('CreditLimit', 'Total Credit Limit', ['type'=>'number','width'=>'3']) !!}
					  		{!! form_label('CreditUsed', 'Credit Used', ['type'=>'number','width'=>'3']) !!}
					  		{!! form_label('CreditAvailable', 'Credit Available', ['type'=>'number','width'=>'3']) !!}
                            {!! form_text('Warning', '% Warning Credit Limit', ['type'=>'number','width'=>'3']) !!}
					  		{!! form_text('CreditActive', 'Credit Active (days)', ['type'=>'number','width'=>'3']) !!}
						</div>
						<!-- tab 2-->
					  	<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
					  		{!! form_textwlookup('AccNo', 'Account No.', ['target'=>'modal-account', 'width'=>'3']) !!}
					  	</div>
					  	<!-- tab 3-->
					  	<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
					  		{!! form_text('Taxno', 'Tax No#') !!}
					  		{!! form_text('TaxName', 'Tax Name') !!}
					  		{!! form_text('TaxAddr', 'Tax Address') !!}
					  	</div>
					</div>
					</div><!-- end card-->		
                    </div>					

			</div>

            </div>
                
            <div class='row'>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    Created [post.CreatedDate] by [post.CreatedBy]
                </div>
            </div>
                
        </form>

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->

	<!-- Begin Footer -->
    @extends('footer')
    <!-- End Footer -->

</div>
<!-- END main -->

<!-- BEGIN Java Script for this page -->
@extends('loadjs')
<!-- END Java Script for this page -->

</body>
</html>
    
<!-- Modal -->
<?php
    //lookup account
    $dat=db_get_array('mastercoa', 'AccNo,AccName');
    $caption=['Account#','AccountName'];
    echo CreateLookupTable('modal-account', $dat, $caption);
?>
<!-- End Modal -->

<!-- JQuery SCRIPT -->
<script>  
	//alert(post.AccCode);
	$(document).ready(function() {
    	//$('#info').text('AccCode');

		//load data
       	post['CodeAddr']=post['Code'];
        loaddata(post);
        $("input[type='lookup']").change();

        //load address data
        $("select[name='CodeAddr']").on('change', function() {
  			//alert( this.value );
            $.getJSON('_loaddataaddr.php?acc='+post['AccCode']+'&code='+this.value, function(data, status) {
                //alert(data.Address);
                $("input[name='Address']").val(data.Address);
                $("input[name='Zip']").val(data.Zip);
                $("input[name='ContachPerson']").val(data.ContachPerson);
                $("input[name='Phone']").val(data.Phone);
                $("input[name='Fax']").val(data.Fax);
            });
		});

		
		//cmSave click
        $('button#cmSave').click(function() {
            //alert('Save');
            //form
            var data = $('form').serialize();
            //data={'form':data};
            $.post( '_data-edit-save.php?form=customer', data, function(data) {
                //... do something with response from server
                if(data.indexOf('ERROR')==-1) { //no error
                    bootbox.alert({
                        message: data, backdrop:true
                    });
                } else {//ada error, show error
                	alert(data);
                }
                //$('#pop').show();
                //if(data!='') $('.alert').visible();
                //$('#info2').text( data );
            });
        })
        
        //numeric format
        $("input[type='num']").css('text-align','right'); //.css('background-color','red');
        //$(".number").autoNumeric('init', {aSign: '$ '}); 
	});
    
</script>


