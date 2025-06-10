@extends('temp-master')

@section('content')
    {{-- use alpine see https://alpinejs.dev/start-here --}}
    {{-- use aquinos see https://quinos.id/index#/landing --}}
    <script>
        
    </script>
    
    <!-- PANEL1 -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 gap-0">
        <div class="card mb-3 gap-0">
            <div class="card-header">
                <h3><i class="fa fa-check-square-o"></i> Sales Order</h3>
            </div>
            <div class="card-body">
                {{-- {{ Form::setData($data) }} --}}
                {{ Form::text('sid', 'SID #', ['placeholder'=>'ID','readonly'=>'true']) }}
                {{ Form::text('name', 'Name') }}
                {{ Form::text('email', 'Email') }}
                {{ Form::text('password', 'Password') }}
                {{-- {{ Form::combo('Type', 'Type', $mType) }} --}}
                {{-- {{ Form::combo('HppBy', 'HPP', $mHpp) }} --}}
                <table class='table table-sm'>
                <thead class="thead-dark" style="height:2px;">
                <tr>
                <th>Menu</th>
                <th>Qty</th>
                <th>Price</th>
                <th></th>
                </thead>
                </tr>
                <tr>
                <td>food1</td>
                <td>x1</td>
                <td>70.000</td>
                <td><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                </tr>
                </table>
            </div>
        </div><!-- end card-->
    </div>

    <!-- PANEL2 -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 gap-0">
        <div class="card mb-3 gap-0">
            <div class="card-header">
                <h3><i class="fa fa-check-square-o"></i> Other data</h3>
            </div>
            <div class="card-body">
                {{-- image galery --}}
                <div id ="ProductList" class="row" >
                </div>
                <!-- Gallery -->
<div class="row">
        @foreach($category as $c)
            <button class='btnCategory' onClick='btnCategory_click(this)' type='button'>{{$c}}</button>
        @endforeach
    <div id='productList'>Loading  ...</div>
    <!-- <img
      src="{{ asset('images/no-image.png')}}"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Boat on Calm Water"
    />

    <img
      src="{{ asset('images/no-image.png')}}"  
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Wintry Mountain Landscape"
    />
  </div>

  <div class="col-lg-4 mb-4 mb-lg-0">
    <img
      src="{{ asset('images/profile-img/profile73.jpg')}}"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Mountains in the Clouds"
    />

    <img
      src="{{ asset('images/no-image.png')}}"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Boat on Calm Water"
    />
  </div>

  <div class="col-lg-4 mb-4 mb-lg-0">
    <img
      src="{{ asset('images/no-image.png')}}"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Waves at Sea"
    />

    <img
      src="{{ asset('images/no-image.png')}}"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Yosemite National Park"
    /> -->
</div>
<!-- Gallery -->
            </div>
        </div><!-- end card-->
    </div> 
@stop
                    
@section('js')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        const Prod = {!! $product !!}
        const ProdList = document.querySelector('#productList')
        //const btnCategory = document.querySelector('.btnCate
        // gory')
        
        function showProd(filter='')  {
            let out = ''
            if(filter==''){
                for (let p of Prod) {
                    console.log(p)
                    //out = out+`<img src="{{ asset('images/no-image.png')}}" class="shadow-1-strong rounded mb-4" alt=${p.name} style="width:20px;height:20px;" />`+p.name
                    out = out+p.name
                }
            } else {
                for (let p of Prod) {
                    if (p.category!=filter) break;
                    console.log(p)
                    if (p.category==filter) out = out+`<img src="{{ asset('images/no-image.png')}}" class="shadow-1-strong rounded mb-4" alt=${p.name}` style="width:20px;height:20px;" />'+p.name
                }

            }

            console.log(out)
            document.getElementById("productList").innerHTML = out
        } 
        function btnCategory_click(e) {
            
            sel = e.innerText
            alert('click '+sel)
            console.log(sel)
            list = document.querySelector('#productList')
            // list.innerHTML = showProd(sel)
            showProd(sel)
            //document.getElementById("productList").innerHTML = "I have changed!"; 
        }

        //init show awal
        showProd('')

    </script>
    <script>
        $(document).ready(function() {
            $(':input[type=number]').on('mousewheel',function(e){ $(this).blur();  });
            $.ajaxSetup({
                async: false
            });
            
            //load data
            //loaddata(post);
            //$.ajax({url: "http://localhost:8000/ajax_getProduct/C-11", 
            $.ajax({url: "{{ url('ajax_getProduct') }}/{{$id}}", 
                success: function(resp){
                    var res=JSON.parse(resp); 
                    //alert(res.status);
                    res=res.data;
                    //console.log(res);
                    $.each(res, function( f, v ) {
                        $("input[name='"+f+"']").val(v);
                    })
                }
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
            //showProd('cat1')
        });
    </script>
@stop

