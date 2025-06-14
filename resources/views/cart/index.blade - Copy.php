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
    <link rel="stylesheet" href="http://localhost/codeAstro/POS-laravel/assets/css/app.css">
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
<aside class="main-sidebar sidebar-dark-purple elevation-4">
    <!-- Brand Logo -->
    <a href="http://localhost/codeAstro/POS-laravel/admin" class="brand-link">
        <img src="http://localhost/codeAstro/POS-laravel/assets/images/poslg.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">123Laravel-POS</span>
    </a>
	<!-- Log on to codeastro.com for more projects -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://www.gravatar.com/avatar/edb0e96701c209ab4b50211c856c50c4" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin CA</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="http://localhost/codeAstro/POS-laravel/admin" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="http://localhost/codeAstro/POS-laravel/admin/products" class="nav-link ">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="http://localhost/codeAstro/POS-laravel/admin/customers" class="nav-link ">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Customers</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="http://localhost/codeAstro/POS-laravel/admin/cart" class="nav-link active">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>POS System</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="http://localhost/codeAstro/POS-laravel/admin/orders" class="nav-link ">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="http://localhost/codeAstro/POS-laravel/admin/settings" class="nav-link ">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Settings</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="document.getElementById('logout-form').submit()">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Logout</p>
                        <form action="http://localhost/codeAstro/POS-laravel/logout" method="POST" id="logout-form">
                            <input type="hidden" name="_token" value="u361OGpBqjCeVBTY8qlkJ3BqQU6jhMqr11boDUhi">                        </form>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div><!-- Log on to codeastro.com for more projects -->
    <!-- /.sidebar -->
</aside>
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
            <section class="content">
            <div id="xcart"></div>

            <div class="row">
                <div class="col-5">
                    {{-- col1 --}}
                    <div class="row" >
                        <div class="col">
                            <input type="text" name="barcode "class="form-control" placeholder="Scan Barcode ...">
                        </div>
                        <div class="col">
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-cart">
                    <table class="table ">
                        <thead>
                          <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>product 1</td>
                            <td>12</td>
                            <td>Rp. 12.000</td>
                          </tr>
                          <tr>
                            <td>product 2</td>
                            <td>12</td>
                            <td>Rp. 15.000</td>
                          </tr>
                          <tr>
                            <td>product 3</td>
                            <td>12</td>
                            <td>Rp. 17.000</td>
                          </tr>
                        </tbody>
                      </table>
                    </div> {{--  end of col-cart --}}
                    <div class="row">
                        <div class="col">
                            Total :
                        </div>
                        <div class="col text-right">
                            $0.00
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <button name="cancel" class="btn btn-danger">Cancel</button>
                        </div>
                        <div class="col text-right">
                            <button name="submit" class="btn btn-success">Cancel</button>
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
</style>

<script>
    function cart(name, img='') {
        if(img=='') img= 'http://localhost/lav7_laravelpos/assets/images/no-image.png';
        return `<div class='cart-item p-2 bd-highlight'><image src='${img}' class='progImage' /><br/>${name}</div>`;
    }

    function showProductList(pdata) {
        let out = '';
        console.log(prodData);
        prodData.foreach(c=>{
            //out+= cart(c.name);
            let img = 'http://localhost/lav7_laravelpos/assets/images/no-image.png';
            let name = c.name;
            out+= `<div class='cart-item p-2 bd-highlight'><image src='${img}' class='progImage' /><br/>${name}</div>`;

        })
        console.log(out);
        $("#prodList").html(out);
    }

    var prodData = {!! $prodData !!};
    var cartData =[];
    //let cartList = Document.querySelector('#cartList');
    //carList.innerHTml= "<div class='cart-item p-2 bd-highlight'><image src='http://localhost/lav7_laravelpos/assets/images/no-image.png' class='progImage' /><br/>Flex item 1</div>";
    $(document).ready(function() {
        // let filterProd = cartData.filter((c)=>{
        //     return category!='cat2';
        // })
        // filterProd = ProdData;
        // console.log('filterProd');
        // console.log(filterProd);
        
        alert('show prod list 22');
        //showProductList(prodData);
        let out='';
        prodData.forEach(c=>{
            //out+= cart(c.name);
            console.log(c);
            let img = 'http://localhost/lav7_laravelpos/assets/images/no-image.png';
            let name = c.name;
            out+= `<div class='cart-item p-2 bd-highlight'><image src='`+img+`' class='progImage' /><br/>`+c.name+`</div>`;
        })
        //console.log(out);
        $("div#prodList").html(out);
});
</script>