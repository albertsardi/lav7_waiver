<x-mainlayout>
    <h2>Form mechanic</h2>

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

    <form method="POST" >
        <x-card title="Form General Input">
            @csrf
            @php
                //dd($formdata);
                $_GET['formdata'] = (array)json_decode($formdata);
            @endphp
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">ID</label>
                <x-input name="id" placeholder="input name"  />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Mechanic Name</label>
                <x-input name="Name" placeholder="input name"  />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Mechanic Code</label>
                <x-input name="Code" placeholder="name@example.com" value="123456" />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Address</label>
                <x-input name="Address" placeholder="input address" />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Phone/HP</label>
                <x-input name="Phone" placeholder="input address" />
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="inputPassword6" class="col-form-label">Jasa %/Rp</label>
                </div>
                <div class="col-auto">
                    <x-input name="FeePercent" placeholder="input %" />
                </div>
                <div class="col-auto"><label>/</label></div>
                <div class="col-auto">
                    <x-input name="FeeAmount" placeholder="input amount" />
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                <x-textarea name="Memo" rows="3" />
            </div>

        </x-card>
        <div class="float-right">
            <button name="cmSave" type="submit" class="btn btn-primary float-right" style="width:100px;">Save</button>
        </div>
    </form>
</x-mainlayout>