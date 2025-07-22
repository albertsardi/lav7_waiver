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
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" x-data='{ data: {!! json_encode($detail) !!} }'>
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fa fa-check-square-o"></i> Detail {title}</h3>
            </div>
            <div class="card-body">
                <div class='row'>
                    <div class="col">
                            <label class='form-label'>Product</label>    
                            {{ Form::combo('input-Product', 'Product', $mProduct) }}
                        </div>
                    @php
                        $label = ['Unit', 'Qty', 'Price','Disc &'];
                        $name = ['input-Unit', 'input-Qty', 'input-Price','input-Disc'];
                    @endphp
                    @foreach($name as $idx=>$nm)
                        <div class="col">
                            <label class='form-label'>{{$label[$idx]}}</label>    
                            <input type="text" id="{{$nm}}" name="{{$nm}}" class="form-control" placeholder="First name" aria-label="First name">
                        </div>
                    @endforeach
                    <div class="col">
                        <button type="button" x-on:click="pushData(data);" >Add</button>
                    </div>A
                </div>
                <div class='row'>
                    <!-- <div id='grid'></div> -->
                     <table class="table table-bordered toggle-circle mb-0">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Product</th>
                                                            <th>Unit</th>
                                                            <th>Qty</th>
                                                            <th>Price</th>
                                                            <th>discount</th>
                                                            <th>Amount</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        <template x-for="(d, i) in data" :key="Date.now() + Math.floor(Math.random() * 1000000)">
                                                            <tr x-data="{
                                                                    url1:'{{url('/')}}'+'/patient/view/'+d.pat_number, 
                                                                    url2:'{{url('/')}}'+'/patient/edit/'+d.pat_number
                                                                    }">
                                                                <td x-text="i+1"></td>
                                                                <td x-text="d.ProductName"></td>
                                                                <td x-text="d.UOM"></td>
                                                                <td x-text="d.Qty"></td>
                                                                <td x-text="d.Cost"></td>
                                                                <td x-text="d.DiscPercentD"></td>
                                                                <td>amount</td>
                                                                <td >
                                                                    <a x-data="{url:url1}" x-bind:href="url" class="badge badge-success"><i class="mdi mdi-eye"></i> View</a>
                                                                    <a x-data="{url:url2}" x-bind:href="url" class="badge badge-primary"><i class="mdi mdi-eye"></i> Edit</a>
                                                                </td>
                                                            </tr>
                                                        </template>
                                                    </table>
                </div>
                <div class='row'>
                    <button type='button' onclick={greet}>click me</button>
                </div>
                
            </div>
        </div><!-- end card-->
    </div> 

    <!-- Test -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" x-data="{search:'', data:content}">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fa fa-check-square-o"></i> Test</h3>
            </div>
            <div class="card-body">
                <div class='row'>
                    <div class="col">
                            <!-- <label class='form-label'>Product</label>    
                            {{ Form::combo('input-Product', 'Product', $mProduct) }} -->
                        </div>
                    @php
                        $label = ['Product','Unit', 'Qty', 'Price','Disc &'];
                        $name = ['input-Product','input-Unit', 'input-Qty', 'input-Price','input-Disc'];
                    @endphp
                    @foreach($name as $idx=>$nm)
                        <div class="col">
                            <label class='form-label'>{{$label[$idx]}}</label>    
                            <input type="text" id="{{$nm}}" name="{{$nm}}" class="form-control" placeholder="First name" aria-label="First name">
                        </div>
                    @endforeach
                    <div class="col">
                        <button type='button' @click="add_item()">Add Item</button>
                    </div>
                </div>
                <div class='row'>
                    <!-- <div id='grid'></div> -->
                     <template x-for="(d, i) in data" :key="Date.now() + Math.floor(Math.random() * 1000000)">
                        <div style="display: table-row">
                            <div style="display: table-cell" x-text="i + 1"></div>
                            <div style="display: table-cell" x-text="d.name"></div>
                            <div style="display: table-cell" x-text="data[i].description"></div>
                        </div>
                    </template>
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
        let title = 'world'
        var detail = {!! json_encode($detail) !!}
        let content = [
            { name: 'Test 1', description: 'Test Description 1' },
            { name: 'Test 2', description: 'Test Description 2' },
            { name: 'Test 3', description: 'Test Description 3' },
            { name: 'Test 4', description: 'Test Description 4' },
            { name: 'Test 5', description: 'Test Description 5' },
        ];
        //init button
        function getPName(id) {
            let productLib = {!! json_encode($mProduct) !!}
            for(let p of productLib) {
                if (p[0] == id) { return p[1] }
            }
            return ''
        }
        
        function add_item() {
            alert('add item 123')
            
            let newLine = {
                "TransNo":"SO.1800001",
                "ProductCode":"new-line",
                "ProductName":"new-line",
                "Qty":"3140.00",
                "UOM":"Pcs",
                "Price":"520.00",
                "DiscPercentD":0,
                "Cost":"520.00",
                "Memo":"",
                "Sono":"",
                "ProductType":0,
            }
            detail.push(newLine);
            console.log(detail);
        }
        function pushData(data)
        {
            //  ['input-Product','input-Unit', 'input-Qty', 'input-Price','input-Disc'];
            var sel = document.getElementById("input-Product");
            var PCode = sel.value;
            var PName = sel.options[sel.selectedIndex].text;
            let newLine = {
                "TransNo":"SO.1800001",
                "ProductCode":PCode,
                "ProductName":PName,
                "Qty":document.getElementById('input-Qty').value, 
                "UOM":document.getElementById('input-Unit').value, 
                "Price":document.getElementById('input-Price').value, //"520.00"
                "DiscPercentD":document.getElementById('input-Disc').value,
                "Cost":document.getElementById('input-Price').value, //12345,
                "Memo":"",
                "Sono":"",
                "ProductType":0,
            }
            data.push(newLine);
            console.log(newLine)
        }
        function greet(){
            alert('Welcoome Svelte !!!')
        }
        //init Tabulator
        //var detail = {!! $detail !!}
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

