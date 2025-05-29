<x-mainlayout>
    <h2>Form SpareParts</h2>

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
                <label for="exampleFormControlInput1" class="form-label">Code</label>
                <x-input name="Code" placeholder="input name"  />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <x-input name="Name" placeholder="input name"  />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">ID/Supplier</label>
                <x-select name="SupplierCode" option="{{ json_encode($supplier??[]) }}" onClick="periodChange(this)" placeholder="input activity period in years" />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Kode/Category</label>
                <x-select name="CategoryCode" option="{{ json_encode($category??[]) }}" onClick="periodChange(this)" placeholder="input activity period in years" />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Brand</label>
                <x-select name="Brand" option="{{ json_encode($brand??[]) }}" onClick="periodChange(this)" placeholder="input activity period in years" />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Sell Unit</label>
                <x-select name="Unit" option="{{ json_encode($unit??[]) }}" onClick="periodChange(this)" placeholder="input activity period in years" />
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="inputEmail4" class="form-label">Stock</label>
                    <x-input name="Stock" placeholder="input member phone" />
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Min Stock</label>
                    <x-input name="Min Stock" placeholder="input member phone" />
                </div>
            </div>
            <div class="row mb-3" >
                <div class="col">
                    <label for="inputEmail4" class="form-label">Sell Price</label>
                    <x-input name="Stock" placeholder="input member phone" />
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Margin Profit(%)</label>
                    <x-input name="Margin" placeholder="input member phone" />
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">COGS</label>
                <x-input name="Hpp" placeholder="input member phone" />
            </div>
            
            <div class="mb-3">
            <label for="exampleFormControlTextarea1"  class="form-label">Description</label>
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