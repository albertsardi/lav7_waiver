@extends('temp-master')

@section('content')
    
    <!-- PANEL1 -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fa fa-check-square-o"></i> Purchase</h3>
            </div>
            <div class="card-body">
                {{ Form::setData($data) }} 
                {{ Form::text('sid', 'TRans #', ['placeholder'=>'ID','readonly'=>'true']) }}
                {{ Form::text('TransNo', 'Trans #', ['readonly'=>'true']) }}
                {{ Form::text('TransDate', 'Date') }}
                {{ Form::text('DoDate', 'DO Date') }}
                {{ Form::combo('AccCode', 'Supplier', $mSupplier) }}
                {{ Form::text('FromPO', 'From PO #') }}
                {{ Form::text('FromInv', 'From Inv #') }}
                {{-- {{ Form::combo('Warehouse', 'Warehouse', $mWarehouse) }} --}}
                {{-- {{ Form::combo('Salesman', 'Salesman', $mSalesman) }} --}}
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
                {{ Form::text('Freight', 'Freight Percent') }} %
                {{ Form::text('FreightAmount', '') }}
                {{ Form::number('DiscPercentH', 'Disc') }} %
                {{ Form::number('DIscAmountH', '') }}
                {{ Form::number('Total', 'Total') }}
                {{ Form::number('TotalPaid', 'Total Paid') }}
                 <input name='detail' id='grid_data' value='' class='d-none'></input>
                <br/><br/><br/><br/>
                {{-- {{ Form::textwlookup('AccHppNo', 'HPP Account No', ['modal'=>'modal-account']) }} --}}
                {{-- {{ Form::textwlookup('AccSellNo', 'Income Account No', ['modal'=>'modal-account']) }} --}}
                {{-- {{ Form::textwlookup('AccInventoryNo', 'Inventory Account No', ['modal'=>'modal-account']) }} --}}
            </div>
        </div><!-- end card-->
    </div> 

    <!-- Detail -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fa fa-check-square-o"></i> Detail {title}</h3>
            </div>
            <div class="card-body">
                <div class='row'>
                    <div class="col">
                            <label class='form-label'>Product</label>    
                            {{ Form::combo('input-Product', '', $mProduct) }}
                        </div>
                    @php
                        $label = ['Unit', 'Qty', 'Price','Disc &'];
                        $name = [ 'input-Unit', 'input-Qty', 'input-Price','input-Disc'];
                    @endphp
                    @foreach($name as $idx=>$nm)
                        <div class="col">
                            <label class='form-label'>{{$label[$idx]}}</label>    
                            <input type="text" id="{{$nm}}" name="{{$nm}}" class="form-control" placeholder="First name" aria-label="First name">
                        </div>
                    @endforeach
                    <div class="col">
                        <button id='btnAddItem' type='button' onclick='addItem()'>Add Item</button>
                    </div>
                </div>
                <div class='row'>
                    <div id='grid'></div>
                </div>
                <div class='row'>
                    <button type='button' onclick={greet}>click me</button>
                </div>
            </div>
        </div><!-- end card-->
    </div> 
@stop
                    
@section('js')
    <script lang="ts">
        var productLib = {!! json_encode($mProduct) !!};
        //init button
        function addItem(){
            alert('add item');
            let input = [];
            input.product = document.getElementById("input-Product").value;
            input.unit = document.getElementById("input-Unit");
            input.qty = document.getElementById("input-Qty");
            input.price = document.getElementById("input-Price");
            input.disc = document.getElementById("input-Disc");
            productname = getPName(input.product.value)
            console.log([input.product.value, productname])
            let newItem = {
                "TransNo":"PI.1800001",
                "ProductCode":"new code",
                "ProductName":productname,
                "Qty":input.qty.value??'',
                "UOM":input.unit.value??'',
                "Price":input.price.value??'',
                "DiscPercentD":input.disc.value??'',
                "Cost":"10455.00",
                "Memo":"",
                "Sono":"",
                "id":0,
                "ProductType":0,
                "Amount":1568250,
            }
            detail.push(newItem);
        }
        function getPName(id){
            //return 'PName'
            var productLib = {!! json_encode($mProduct) !!};
            for(let p of productLib) {
                if (p[0]==id) return p[1];
            }
            return '';
        }
        //init Tabulator
        var detail = {!! $detail !!}
        const detailData = document.getElementById("grid_data");
        console.log(detail)
        detailData.value = JSON.stringify(detail)
        detailData.innerText = detail
        var table = new Tabulator("#grid", {
            reactiveData:true,
            data:detail, //set initial table data
            validationMode:"highlight",
            columns:[
                {title:"Product", field:"ProductCode"},
                {title:"Name", field:"ProductName"},
                {title:"Unit", field:"UOM"},
                {title:"Qty", field:"Qty", editor:'input', hozAlign:"right"},
                {title:"Price", field:"Price", hozAlign:"right"},
                {title:"Disc %", field:"DiscPercentD", hozAlign:"right"},
                {title:"Amount", field:"Amount", hozAlign:"right"},
            ],
        });
        table.on("dataChanged", function(data){
            console.log('dataChanged')
            //console.log(data)
            detailData.value = JSON.stringify(data)
        });
        $(document).ready(function() {
            $(':input[type=number]').on('mousewheel',function(e){ $(this).blur();  });
            $.ajaxSetup({
                async: false
            });
            
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

