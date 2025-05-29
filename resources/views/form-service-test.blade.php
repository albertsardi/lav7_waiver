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
                            <x-input name="TransNo" />
                        </div>
                        <div class="col">
                            <label for="inputPassword4" class="form-label">Chassier</label>
                            <x-input name="Chasier" />
                        </div>
                        <div class="col">
                            <label for="inputPassword4" class="form-label">TransDate</label>
                            <x-input name="TransDate" />
                        </div>
                        <div class="col">
                            <label for="inputEmail4" class="form-label">Time</label>
                            <x-input name="TransTime" />
                        </div>
                        <div class="col">
                            <label for="inputPassword4" class="form-label">Pay</label>
                            <x-input name="Total" />
                        </div>
                        <div class="col">
                            <label for="inputPassword4" class="form-label">Return Payment</label>
                            <x-input name="ReturnPayment" />
                        </div>
                        <div class="col">
                            <label for="inputPassword4" class="form-label">Status</label>
                            <x-input name="Status" />
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Vehicle No.</label>
                                <x-input name="VehicleNo" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Brand & Type</label>
                                <x-input name="VehicleBrand" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Name</label>
                                <x-input name="Name" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Address</label>
                                <x-input name="Address" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Member No</label>
                                <x-input name="MemberNo" /> <x-input name="Name" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Mechanic</label>
                                <x-input name="MechanicNo" /> <x-input name="MechanicName" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Problem</label>
                                <x-input name="Problem" />
                            </div>
                            <div class="mb-3">
                                <div class="row gx-1">
                                    <div class="col">
                                        <label for="exampleInputPassword1" class="form-label">Kilometer</label>
                                        <x-input name="FirstKM" />
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputPassword1" class="form-label">Next Kilometer</label>
                                        <x-input name="NextKM" />
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
                    <tr>
                        <td>1</td>
                        <td>Item 1</td>
                        <td>$1</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Item 2</td>
                        <td>$2</td>
                    </tr>
                </tbody>
                </table>
                <button id="cmAddItem" type="button" class="btn btn-secondary" style="width:200px;">Add item</button>
            </div>
        
        </x-card>
        <div class="float-right">
            <button id="cmSave" type="button" class="btn btn-primary float-right" style="width:100px;">Save</button>
        </div>

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
        $(document).ready(function(){
                
                $('#cmAddItem').click(async function(){
                    var item = {
                        name:'',
                        code:'',
                        price:0
                    }
                    let resp = await axios.get('http://localhost/bengkel2/api/service_items')
                                
                    console.log(resp.data)
                    let pop_form = $('#exampleModal').html()
                    let dialog = bootbox.confirm(pop_form, 
                        function(result){ 
                            console.log(item)
                            const no = 3
                            const code = item.code
                            const name = item.name
                            const price = item.price
                            const disc = item.price * 0.1
                            const amount = price - disc
                            const newLine=`<tr>
                                            <td>${no}</td>
                                            <td>${code}</td>
                                            <td>${name}</td>
                                            <td>${price??0}</td>
                                            <td>${disc??0}</td>
                                            <td>${amount??0}</td>
                                            </tr>`;
                            $('#table-detail tbody').append(newLine)
                        });
                    
                        dialog.on('shown.bs.modal', function(e){
                            console.log('on modal')
                            $('select').click(function(e) {
                                const sel = $(this).find(':selected')
                                let code = sel.attr('data-code')
                                let name = sel.attr('data-name')
                                let price = sel.attr('data-price')
                                item = {
                                    name: name,
                                    code: code,
                                    price:price,
                                }
                                //console.log(item)
                            })
                            
                        });
                })
                $('#cmSave').click(function(){
                    Swal.fire({ title: "SAve sucessfull!", icon: "success", draggable: false });
                })
                
        });
    </script>

    
</x-mainlayout>
<td>col1</td>