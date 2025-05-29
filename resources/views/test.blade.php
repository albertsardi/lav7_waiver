<x-mainlayout>
    <h2>List mechanic</h2>

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

    <x-card title="List Mechanic">
     <button class="btn btn-primary">Add Mechanic</button>
    <div id="example-table2"></div>
    <table id="example-table" clas="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">1</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <td scope="row">2</td>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <td scope="row">3</td>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>
    </x-card>


    <script>
        function showtable(r) {
            var html = '<tbody>';
            html += '<tr>';
            html += '<td>'+r.id+'</td>';
            html += '<td><a href="http://localhost/bengkel2/master2/1">'+r.Name+'</a></td>';
            html += '<td>'+r.Address+'</td>';
            html += '<td>'+r.Phone+'</td>';
            html += '</tr>';
            html += '</tbody>';
            return html;
        }
        function loadData(category){

            var table = new Tabulator("#example-table2", {
                //height:"311px",
                ajaxURL:"http://localhost/bengkel2/api/mechanics",
                layout:"fitColumns",
                placeholder:"No Data Set",
                columns:[
                    {title:"Name", field:"Name", sorter:"string", width:200},
                    {title:"Progress", field:"Code", sorter:"number", formatter:"progress"},
                    {title:"Gender", field:"gender", sorter:"string"},
                    {title:"Rating", field:"rating", formatter:"star", hozAlign:"center", width:100},
                    {title:"Favourite Color", field:"col", sorter:"string"},
                    {title:"Date Of Birth", field:"dob", sorter:"date", hozAlign:"center"},
                    {title:"Driver", field:"car", hozAlign:"center", formatter:"tickCross", sorter:"boolean"},
                ],
            });
            //table.setData("http://localhost/bengkel2/api/mechanics");
            //table.download('json','/data.json');
        }
        loadData('');
        //window.onload=loadData('');
        
    </script>

    
</x-mainlayout>