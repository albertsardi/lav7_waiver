<x-mainlayout>
    <h2>Form-access right</h2>
    <script>
        var checkbox_change = function (e){
            //console.log(e.id)
            console.log(e.id+' clicked');
            let allow = ''
            for (let i = 0; i <= 16; i++) {
                let ck = '0'
                if (document.getElementById('c-'+i).checked) ck='1'
                allow = allow+ck
            }
            document.querySelector("#tbAllowance").value = allow;
        }
    </script>
    <?php
        $col1 = [
            'Setting',
            'Data Mekanik',
            'Data Supplier',
            'Data Member',
            'Data Sparepart',
            'Transaksi Service',
            'Transaksi Pembelian',
            'Transaksi Retur Pembelian',
            'Transaksi Biaya Operasional'
        ];
        $col2 = [
            'Transaksi Pemabayaran Utang',
            'Transaksi Mutasi Stok',
            'Laporan Pendapatan',
            'Laporan Supplier',
            'Laporan Pembelian',
            'Laporan Retur',
            'Laporan Kartu Stok',
            'Laporan Biaya Operasional',
        ];
    ?>

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
        @csrf
        <x-card>
            <label class="form-check-label" for="flexCheckDefault">User Name</label>
            <select id="cbSelect" class="form-select" aria-label="Default select example" onchange="select_change(this)">
                @foreach($userlist as $item)
                    <option data-allowance="{{ $item->allowance }}" value="{{ $item->user }}">{{ $item->user }}</option>
                @endforeach
            </select>
        </x-card>
        <x-card>
            <div class="form-check">
                @foreach($col1 as $idx=>$item)    
                <div class="row">
                    <div class="col">
                <label class="form-check-label" for="flexCheckDefault">
                    {{ $item??'' }} c-{{ 2*$idx }}
                </label>
                <input class="form-check-input" onchange="checkbox_change(this)" type="checkbox" value="" id="c-{{ 2*$idx }}">
            </div>
            <div class="col">
                @if (!empty($col2[$idx]))
                    <label class="form-check-label" for="flexCheckChecked">
                        {{ $col2[$idx]??'' }} c-{{ 2*$idx+1 }}
                    </label>    
                    <input class="form-check-input" onchange="checkbox_change(this)" type="checkbox" value="" id="c-{{ 2*$idx+1 }}" checked>
                @endif
                </div>
            </div>
            @endforeach
        </x-card>

        <div class="row">
            <input name="tbAllowance" id="tbAllowance" value="" style="width:200px"/>
            <input name="tbUser" id="tbUser" value="" style="width:200px"/>
        </div>
        <div class="row ">
        <div class="float-right">
                
                <button name="cmSave" type="submit" class="btn btn-primary float-right" style="width:100px;">Save</button>
            </div>
        </div>
        </div>
    </form>

    <script>
        //$(document).ready(function(){
            // $('.form-check-input').click(function() {
            //     if (!$(this).is(':checked')) {
            //         return confirm("Are you sure?");
            //     }
            // });
        async function select_change(e) {
            let sel = e.options[e.selectedIndex].text;
            let allow=e.options[e.selectedIndex].getAttribute('data-allowance');
            console.log(sel+' '+allow);
            document.querySelector("#tbUser").value = sel;
            //document.querySelector("#c-11").prop( "checked", true );
            for (let i = 0; i < allow.length; i++) {
                  $("#c-"+i).prop( "checked", false );
                  if (allow.charAt(i)=="1")  $("#c-"+i).prop( "checked", true );
            }
            let data = await axios.get('http://127.0.0.1:8000/api/user?user=user1')
            console.log(data)
        }
        
    </script>
</x-mainlayout>