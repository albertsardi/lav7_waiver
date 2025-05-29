<x-mainlayout>
    <h2>Form member</h2>

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

    <script>
        function periodChange(e){
            // let period = e.options[e.selectedIndex].text;
            // const tbcurDate = document.querySelector('#curDate');
            // const tbendPeriod = document.querySelector('#EndPeriod');
            // let newDate=new Date(tbcurDate.value)+period
            // tbendPeriod.value=newDate

            $(document).ready(function(){
  $("p").click(function(){
    $(this).hide();
  });
});
        }
    </script>

    <form method="POST" >
        <x-card title="Form General Input">
            @csrf
            @php
                //dd($formdata);
                $_GET['formdata'] = (array)json_decode($formdata);
                $now = date("Y/m/d");
            @endphp
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Date</label>
                <input name = "curDate" id = "curDate" type="text" class="form-control" id="exampleFormControlInput1" placeholder="input name" value="{{ $now }}" />            </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">ID</label>
                <x-input name="id" placeholder="input name"  />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Vehicle Number</label>
                <x-input name="VehicleNo" placeholder="input name"  />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Vehicle Brand & TypeMechanic Name</label>
                <x-input name="VehicleBrand" placeholder="input name"  />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Member Name</label>
                <x-input name="Name" placeholder="member name"  />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Address</label>
                <x-input name="Address" placeholder="input address" />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">City</label>
                <x-input name="City" placeholder="input member city" />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Phone/HP</label>
                <x-input name="Phone" placeholder="input member phone" />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Member Number</label>
                <x-input name="MemberNo" placeholder="input member phone" />
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="inputPassword6" class="col-form-label">Period Activity (years)</label>
                </div>
                <div class="col-auto">
                @php
                    $period = array(1,2,3,4,5,6,7,8,9,10);
                @endphp    
                    <x-select name="PeriodActive" option="{{ json_encode($period) }}" onClick="periodChange(this)" placeholder="input activity period in years" />
                </div>
                <div class="col-auto"><label></label></div>
                <div class="col-auto">
                    <x-input name="EndPeriod" placeholder="input amount" />
                </div>
            </div>
            <div class="mb-3">
            
            <label for="exampleFormControlTextarea1"  class="form-label">Keterangan</label>
                <x-textarea name="Memo" rows="3" />
            </div>

        </x-card>
        <div class="float-right">
            <button name="cmSave" type="submit" class="btn btn-primary float-right" style="width:100px;">Save</button>
        </div>
    </form>

    <script>
        $(document).ready(function(){
            $('select').on('change', function() {
                console.log( this.value );
                var d = new Date();
                d.setFullYear(d.getFullYear() + parseInt(this.value));
                const newDate = d.toISOString().slice(0,10)
                $('#EndPeriod').val(newDate);
            });
        });
    </script>

    
</x-mainlayout>