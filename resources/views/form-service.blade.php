<x-mainlayout>
    <h2>Form Service</h2>

    


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
                <table id="table-detail" class="table"> 
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
                        @php
                            $detail = json_decode($detail);
                            dump($formdata);
                            dump($detail);
                        @endphp
                        @if (empty($detail))
                            <tr><td colspan="6">data empty</td></tr>
                        @else
                            @foreach($detail as $no=>$d)
                            @php
                                $disc= $d->Price *.01;
                                $amount = $d->Price - $disc;
                            @endphp
                            <tr>
                                <td>{{  $no }}</td>
                                <td>{{ $d->workCode }}</td>
                                <td>{{ $d->workName }}</td>
                                <td>{{ $d->Price }}</td>
                                <td>{{ $disc }}</td>
                                <td>{{ $amount }}</td>
                            </tr>
                            <div class="grid-row">
                                <div class="col">
                                    <input type="no" class="cell" id="inputEmail4">
                                </div>
                                <div class="col">
                                    <input id="tbworkCode" type="text" class="cell" />
                                </div>
                                <div class="col">
                                    <input id="tbworkName" type="text" class="cell" />
                                </div>
                                <div class="col">
                                    <input id="price" type="text" class="cell" />
                                </div>
                                <div class="col">
                                    <input id="disc" type="text" class="cell" />
                                </div>
                                <div class="col">
                                    <input id="amount" type="text" class="cell" />
                                </div>
                                <div class="col style="width:10px;">
                                    <button type="button">del</button>
                                    <i class="bi bi-dash-square text-red"></i>
                                </div>
                            </div>
                            @endforeach
                        @endif
                        
                </tbody>
                </table>
                <div id="table-detail2" class="table"> </div>
                <button id="cmAdd" type="button" class="btn btn-secondary" style="width:200px;">Add item</button>
            </div>
        
        </x-card>
        <div class="float-right">
            <button id="cmSave" type="button" class="btn btn-primary float-right" style="width:100px;">Save</button>
        </div>

        <!-- modal container -->
        <div class="d-none">
            <div id="exampleModal">
                <select id='popup-select' class="form-select" aria-label="Default select example" data-code="1234">
                    <option value="" data-code="">Please Select</option>        
                    @foreach($workItemList as $itm)
                        <option value="{{ $itm->id??'' }}" data-code="{{ $itm->workCode??'' }}" data-name="{{ $itm->workName??'' }}" data-Price="{{ $itm->Price??'0' }}">{{ $itm->workName??'' }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    

    <script>
        function cmAddItem_click() {
            alert('add item')
        }
        
        $(document).ready(function(){
                
                

                $('#cmSave').click(function(){
                    Swal.fire({ title: "SAve sucessfull!", icon: "success", draggable: false });
                })

                $('#cmAdd').click(function(){
                    Swal.fire({ title: "SAve sucessfull!", icon: "success", draggable: false });
                })
                
        });
    </script>

    
</x-mainlayout>
