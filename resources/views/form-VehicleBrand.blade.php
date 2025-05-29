<x-mainlayout>
    <h2>Form Vehicle Brand</h2>
    <input name="new-item" value="" /><button id="cmAdd">Add</button>
    
    <div id="table"> <div>

    <div class="mt-3" >
        <button id="cmSave" type="submit" class="btn btn-primary">Save</divbutton>
    </div>


</x-mainlayout>

<script>
    var data = [
        {'name': 'HONDA SCOOPY', id:1},
        {'name': 'HONDA VARIO TECHNO', id:2 },
        {'name': 'HONDA VARIO CW', id:3},
        {'name': 'YAMAHA JUPITER MX', id:4},
        {'name': 'YAMAHA JUPITER', id:5},
        {'name': 'YAMAHA VIXION', id:6},
        {'name':'SUZUKI SATRIA', id:	7},
        {'name':'HONDA SUPRA X',id:	8}
    ]
    function showTable(arr) {
        let out='<table>';
        for (let d of data){
            out+=`<tr><td>${d.name}</td></tr>`
        }
        out+='</table>';
        return out
    }
    $(document).ready(function(){
        let table = showTable(data);
        $('#table').html(table);//alert('cmadd')
        
        $('#cmAdd').click(function(){
            let table = showTable(data)
            $('#table').html(table)//alert('cmadd')
        })

    })
        
        

</script>