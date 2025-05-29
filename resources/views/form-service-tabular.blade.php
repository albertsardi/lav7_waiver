<x-mainlayout>
    <h2>Form Service - using tabularJS</h2>

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <td

    <form method="POST" >
        <x-card title="Form Service Input">
            @csrf
            <div class="row gx-2"> <!-- header -->
                <div class="col-md-9">
                    <div class="row gx-1">
                        <div class="col">
                            <label for="inputEmail4" class="form-label">Transaction NO</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col">
                            <label for="inputPassword4" class="form-label">Trans No</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col">
                            <label for="inputPassword4" class="form-label">Chassier</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col">
                            <label for="inputPassword4" class="form-label">TransDate</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col">
                            <label for="inputEmail4" class="form-label">Time</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col">
                            <label for="inputPassword4" class="form-label">Pay</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col">
                            <label for="inputPassword4" class="form-label">Return Payment</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col">
                            <label for="inputPassword4" class="form-label">Status</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Vehicle No.</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Brand & Type</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Name</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Address</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Member</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Mechanic</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Problem</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <div class="row gx-1">
                                    <div class="col">
                                        <label for="exampleInputPassword1" class="form-label">Kilometer</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputPassword1" class="form-label">Next Kilometer</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <ul class="list-group">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A fourth item</li>
                        <li class="list-group-item">And a fifth one</li>
                    </ul>
                </div>
            </div> <!-- end of header -->

            <!-- detail -->
            <div class="row">
                <table id="tableDetail" class="table"
                <tbody > 
                    <thead>
                    <tr>
                    <th>NO.</th>
                    <th>Service Code</th>
                    <th>Service Name</th>
                    <th>Price</th>
                    <th>Disc</th>
                    <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                            // dump($detail);
                        ?>
                        @foreach($detail as $no=>$d)
                            @php
                                $disc= $d->Price * 0.1;
                                $amount = $d->Price - $disc;
                            @endphp
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $d->workCode }}</td>
                                <td>{{ $d->workName }}</td>
                                <td>{{ $d->Price }}</td>
                                <td>{{ $disc }}</td>
                                <td>{{ $amount }}</td>
                            </tr>
                        @endforeach
                    </tbody>     
                </table>
            </div>
        
        </x-card>
        <div class="float-right">
            <button name="cmSave" type="submit" class="btn btn-primary float-right" style="width:100px;">Save</button>
        </div>
    </form>

    <script>
        $(document).ready(function(){
                var table = new Tabulator("#tableDetail", {
                        height:"311px",
                        //ajaxURL:"http://localhost/bengkel2/api/trans-details/1",
                        layout:"fitColumns",
                        placeholder:"No Data",
                        columns:[
                            {title:"Work Code", field:"workCode", sorter:"string", width:100},
                            {title:"Work Name", field:"workName", sorter:"number", width:200 },
                            {title:"Price", field:"Price", sorter:"string"},
                            {title:"DiscAmount", field:"DiscAmount", sorter:"string"},
                            {title:"Driver", field:"car", hozAlign:"center", formatter:"tickCross", sorter:"boolean"},
                        ],
                    });
        });
    </script>

    
</x-mainlayout>