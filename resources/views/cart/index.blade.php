//TODO penambahan total subtotl belum berubah
// check juga pad saat save apa kesimpan di database qty nya jika lebih dari 1

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Open POS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    {{-- <link rel="stylesheet" href="http://localhost/lav7_laravelpos/assets/css/app.css"> --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
	<!-- Log on to codeastro.com for more projects -->

    {{-- jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- Google Font: Source Sans Pro -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <script>
        window.APP = {"currency_symbol":"$","warning_quantity":"5"}    </script>
<link rel='stylesheet' type='text/css' property='stylesheet' href='//localhost/codeAstro/POS-laravel/_debugbar/assets/stylesheets?v=1644339152&theme=auto'><script src='//localhost/codeAstro/POS-laravel/_debugbar/assets/javascript?v=1644339152'></script><script>jQuery.noConflict(true);</script> --}}
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="http://localhost/codeAstro/POS-laravel/admin" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
	<!-- Log on to codeastro.com for more projects -->

    <!-- SEARCH FORM -->
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->
      
     
    </ul>
  </nav>
  <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        @include('components.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1></h1>
                        </div>
                        <div class="col-sm-6 text-right">
                                                    </div><!-- /.col -->
                    </div>
                </div><!-- /.container-fluid -->
            </section><!-- Log on to codeastro.com for more projects -->

            <!-- Main content -->
            <form method='POST'>
                @csrf
                
            <section class="content">
            <input name='cartData' id='cartData' type='hidden'></input>
            <div id="xcart"></div>

            <div class="row">
                <div class="col-5">
                    {{-- col1 --}}
                    <div class="row" >
                        <div class="col">
                            <input type="text" name="barcode "class="form-control" placeholder="Scan Barcode ...">
                        </div>
                        <div class="col">
                            <select id="selCustomer" name="customer" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option selected>Open this select menu</option>
                                {!! $optCustomer !!}
                            </select>
                        </div>
                    </div>
                    <div class="col-cart">
                    <table id="cartList" class="table ">
                        <thead>
                          <tr>
                            <th scope="col">Product</th>
                            <th scope="col" width="100px">Qty</th>
                            <th scope="col">Price</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                      </table>
                    </div> {{--  end of col-cart --}}
                    <div class="row">
                        <div class="col">
                            Total :
                        </div>
                        <div id="total" class="col text-right">
                            $0.00
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <button name="cancel" class="btn btn-danger">Cancel</button>
                        </div>
                        <div class="col text-right">
                            <button id="submit" type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    {{-- col2 --}}
                    <input type="text" name="barcode "class="form-control" placeholder="Search Product ...">
                    {{-- <ul class="list-group">
                        <li class="list-group-item active" aria-current="true">An active item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A fourth item</li>
                        <li class="list-group-item">And a fifth one</li>
                      </ul> --}}

                      <div id="prodList" class="d-flex flex-wrap bd-highlight mb-3">
                        {{-- <div class="cart-item p-2 bd-highlight"><image src="http://localhost/lav7_laravelpos/assets/images/no-image.png" class="progImage" /><br/>Flex item 1</div>
                        <div class="cart-item p-2 bd-highlight"><image src="http://localhost/lav7_laravelpos/assets/images/no-image.png" class="progImage" /><br/>Flex item 2</div>
                        <div class="cart-item p-2 bd-highlight"><image src="http://localhost/lav7_laravelpos/assets/images/no-image.png" class="progImage" /><br/>Flex item 3</div>
                        <div class="cart-item p-2 bd-highlight"><image src="http://localhost/lav7_laravelpos/assets/images/no-image.png" class="progImage" /><br/>Flex item 4</div>
                        <div class="cart-item p-2 bd-highlight"><image src="http://localhost/lav7_laravelpos/assets/images/no-image.png" class="progImage" /><br/>Flex item 5</div>
                        <div class="cart-item p-2 bd-highlight"><image src="http://localhost/lav7_laravelpos/assets/images/no-image.png" class="progImage" /><br/>Flex item 6</div>
                        <div class="cart-item p-2 bd-highlight"><image src="http://localhost/lav7_laravelpos/assets/images/no-image.png" class="progImage" /><br/>Flex item 7</div>
                        <div class="cart-item p-2 bd-highlight"><image src="http://localhost/lav7_laravelpos/assets/images/no-image.png" class="progImage" /><br/>Flex item 8</div>
                        <div class="cart-item p-2 bd-highlight"><image src="http://localhost/lav7_laravelpos/assets/images/no-image.png" class="progImage" /><br/>Flex item 9</div>
                        <div class="cart-item p-2 bd-highlight"><image src="http://localhost/lav7_laravelpos/assets/images/no-image.png" class="progImage" /><br/>Flex item 10</div>
                        <div class="cart-item p-2 bd-highlight"><image src="http://localhost/lav7_laravelpos/assets/images/no-image.png" class="progImage" /><br/>Flex item 11</div>
                        <div class="cart-item p-2 bd-highlight"><image src="http://localhost/lav7_laravelpos/assets/images/no-image.png" class="progImage" /><br/>Flex item 12</div>
                        <div class="cart-item p-2 bd-highlight"><image src="http://localhost/lav7_laravelpos/assets/images/no-image.png" class="progImage" /><br/>Flex item 13</div> --}}
                      </div>
                </div>
            </div>
            

            </section>
            </form>

        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      Developed By Albert Sardi
    </div>
    <strong>&copy; 2025 - Point of Sale System</strong> - PHP Laravel
  </footer>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div><!-- Log on to codeastro.com for more projects -->
    <!-- ./wrapper -->

    {{-- <script src="http://localhost/codeAstro/POS-laravel/assets/js/app.js"></script> --}}
    
</body>

</html>

<style>
    .col-cart{
        background-color: white;
        border:1px solid #000;
        height:500px;
    }
    .table tr {
        background-color: white;
        border:1px solid darkgray;
    }
    .list-group{
        display: flex;
    }
    .list-group-item{
        width: 50px;
        height:50px;
    }
    .cart-item{
        border:1px solid darkgray;
        background-color: white;
    }
    .progImage{
        height:65px;
        width:65px;
    }
    .input-qty{
        width:20px;
        padding:-1 px;
        margin:-1 px;
        text-align:right
    }
    .cmMin, .cmPlus {
        padding:-1 px;
        margin:-1 px;
    }
</style>

<script>
    function cart(name, img='') {
        if(img=='') img= 'http://localhost/lav7_laravelpos/assets/images/no-image.png';
        return `<div class='cart-item p-2 bd-highlight'><image src='${img}' class='progImage' /><br/>${name}</div>`;
    }

    function showProductList() {
        let out = '';
        let tot = 0;
        console.log(prodData);
        prodData.forEach(c=>{
            //out+= cart(c.name);
            let img = 'http://localhost/lav7_laravelpos/assets/images/no-image.png';
            let name = c.name;
            out+= `<div data-id='${c.id}' data-name='${c.name}' data-price='${c.price}' class='cart-item p-2 bd-highlight'><image src='${img}' class='progImage' /><br/>${name}</div>`;
            tot+=parseInt(c.price);
        })
        console.log(out);
        console.log(tot)
        $("#prodList").html(out);
        $("#total").html('Rp. '+tot);
    }

    function showCartList() {
        let out = '';
        let line = 0;
        cartData.forEach(c=>{
            console.log(c)
            out+= `<tr line='${line}'>
                            <td>${c.product}</td>
                            <td>
                                <button type='button' class='cmMin cmQty' onClick="changeQty('-',${line})">-</button>
                                <input id='qty-${line}' name='qty-${line}' class='input-qty' value="${c.qty}" />
                                <button type='button' class='cmPlus cmQty' onClick=changeQty('+',${line})>+</button>
                            </td>
                            <td>Rp. ${c.price}</td>
                          </tr>`;
            line++;

        })
        console.log(out);
        $("#cartList tbody").html(out); //show in grid
        //save in input
        $('#cartData').val(JSON.stringify(cartData))

    }
    function changeQty(type, line) {
        // alert(type);
        // console.log('button '+type);
        // console.log(line);
        let input = $('input#qty-'+line);
        let newinput = parseInt(input.val());
        if (type=='+') {
            newinput = newinput + 1;
        } else {
            newinput = newinput - 1;
            
        }
        if (newinput<1) newinput = 1;
        input.val(newinput);
    }

    var prodData = {!! $prodData !!};
    var cartData ={!! json_encode($orderDetail??[]) !!};
    //let cartList = Document.querySelector('#cartList');
    //carList.innerHTml= "<div class='cart-item p-2 bd-highlight'><image src='http://localhost/lav7_laravelpos/assets/images/no-image.png' class='progImage' /><br/>Flex item 1</div>";
    $(document).ready(function() {
        // let filterProd = cartData.filter((c)=>{
        //     return category!='cat2';
        // })
        // filterProd = ProdData;
        // console.log('filterProd');
        // console.log(filterProd);
        
        alert('show prod list');
        showCartList();
        showProductList();

        $('.cart-item').click(function(){
            let id = $(this).attr('data-id');
            let name = $(this).attr('data-name');
            let price = $(this).attr('data-price');
            //alert('item click '+id+' '+name+' '+price);

            cartData.push({product_id:id,product:name, qty:1, price:price})
            showCartList();
        })
        $('button#submit').click(function() {
            let data = {
                'cart':cartData,
                'customer': $('#selCustomer').val(),
                '_token' : "{{ csrf_token() }}"
            }
            $.post('http://localhost/lav7_laravelpos/admin/cart',data,function(result){
                console.log('result')
                console.log(result)
                if (result.OK) {
                    alert('save berhasil')
                } else {
                    alert('Error, '+result.errorMsg)
                }
                // Swal.fire({
                //     title: "Good job!",
                //     text: "You clicked the button!",
                //     icon: "success"
                // });
            });

            console.log('submit');
        })
        // $('.cmPlus').click(function(){
        //     alert('plus')
        // })
        // $('.cmMin').click(function(){
        //     alert('min')
        // })
});
</script>