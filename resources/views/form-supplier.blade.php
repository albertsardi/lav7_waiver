@extends('temp-master')

@section('content')
    <div class="row">
        <!-- PANEL1 -->
        {{-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"> --}}
        <div class="col-md-12 col-xs-12">
            <div class="card mb-3 w-100">
                <div class="card-header">
                    <h3><i class="fa fa-check-square-o"></i> General data</h3>
                </div>
                <div class="card-body">
                    {{ Form::setData($data) }}
                    {{ Form::text('sid', 'SID', ['placeholder'=>'ID','readonly'=>'true']) }}
                    {{ Form::text('AccCode', 'Code', ['readonly'=>'true']) }}
                    {{ Form::text('AccName', 'Name') }}
                    {{ Form::text('Salesman', 'Salesman') }}
                    {{-- {{ Form::textarea('content', 'Content') }} --}}
                    <div class='form-group form-row my-1'>
                        <label for='inputContent' class='col-sm-4 col-form-label mx-0'>Address</label>
                        <div class='col-sm-8 mx-0'><textarea name='content' id='content' rows='4' cols='20'>{{$data->Address??''}}</textarea></div>
                    </div>
                    {{ Form::number('CreditLimit', 'Credit Limit') }}
                    {{ Form::number('CreditActive', 'Credit Active') }}
                    {{ Form::text('Taxno', 'Tax Number') }}
                    {{ Form::text('TaxName', 'Tax Name') }}
                    {{ Form::text('TaxAddr', 'Tax Address') }}
                    {{ Form::text('AccNo', 'Account Number') }}
                    {{ Form::combo('Category', 'Category', $mCat) }}
                    {{ Form::combo('Type', 'Type', $mType) }}
                    {{ Form::combo('HppBy', 'HPP', $mHpp) }}
                    {{ Form::checkbox('ActiveProduct', 'Active Product') }}
                    {{ Form::checkbox('StockProduct', 'Have Stock') }}
                    {{ Form::checkbox('canBuy', 'Product can buy') }}
                    {{ Form::checkbox('canSell', 'Product can sell') }}
                </div>
            </div><!-- end card-->
        </div>

        <!-- PANEL2 -->
        {{-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-check-square-o"></i> Other data</h3>
                </div>
                <div class="card-body">
                    {{ Form::text('unit', 'Main Unit') }}
                    {{ Form::number('price', 'Sell Price') }}
                    {{ Form::number('weight', 'Weight') }}
                    {{ Form::number('minstock', 'Minimal Stock') }}
                    {{ Form::number('maxstock', 'Maximal Stock') }}
                    {{ Form::number('price', 'Sell Price') }}
                    {{ Form::number('LastBuyPrice', 'Last Buy Price',['disabled'=>true]) }}
                    <br/><br/><br/><br/>
                    {{-- {{ Form::textwlookup('AccHppNo', 'HPP Account No', ['modal'=>'modal-account']) }} --}}
                    {{-- {{ Form::textwlookup('AccSellNo', 'Income Account No', ['modal'=>'modal-account']) }} --}}
                    {{-- {{ Form::textwlookup('AccInventoryNo', 'Inventory Account No', ['modal'=>'modal-account']) }} --}}
                </div>
            </div><!-- end card-->
        </div> --}}
    </div>
    
@stop
                    
@section('js')
    <script>
        $(document).ready(function() {
            $(':input[type=number]').on('mousewheel',function(e){ $(this).blur();  });
            $.ajaxSetup({
                async: false
            });
            
            //load data
            //loaddata(post);
            //$.ajax({url: "http://localhost:8000/ajax_getProduct/C-11", 
            // $.ajax({url: "{{ url('ajax_getProduct') }}/{{$id??1}}", 
            //     success: function(resp){
            //         var res=JSON.parse(resp); 
            //         //alert(res.status);
            //         res=res.data;
            //         //console.log(res);
            //         $.each(res, function( f, v ) {
            //             $("input[name='"+f+"']").val(v);
            //         })
            //     }
            // });
            
            /*var dataSource= "http://localhost:8000/ajax_getProduct/C-11";
            $.getJSON(dataSource, function(data, status) {
                for(var row=0;row<data.length;row++) {
                    console.log(data);
                }
            })  */
            
            //cmSave click
            $('button#cmSave').click(function() {
                //alert('Save');
                /*var dialog = bootbox.dialog({
                    message: '<p class="text-center mb-0"><i class="fa fa-spin fa-cog"></i>Saving, Please wait ...</p>',
                    closeButton: false
                });*/
                
                //$(this).text('Save...');
                //form
                var data = $('form').serialize();
                //return (data);
                //$.post( '_data-edit-save.php?form=product', data, function(data) {
                $.post( 'datasave_product', data, function(res) {
                    //... do something with response from server
                    //alert(res);
                    console.log(res);
                    $('#result').text( res );
                    /*bootbox.alert({
                        message: data, backdrop:true
                    });*/
                    //$('#pop').show();
                    //if(data!='') $('.alert').visible();
                    //$('#info2').text( data );
                    //$(this).text('Save');
                    // save dialog
                    //dialog.modal('hide');
                });
                //dialog.modal('hide');
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
    </script>
@stop

