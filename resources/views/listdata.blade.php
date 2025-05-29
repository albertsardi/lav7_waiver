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
     <x-shortcut preset="{{  implode(',',$preset) }}" />
    <table class="table">
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
    <div id="table-list" class="table">
    </x-card>


    <script>
        function loadData_lama(category){
            var data = axios.get('http://localhost/bengkel2/api/mechanics')
            .then((resp)=>{
                console.log(resp.data);
                var html = '<tbody>';
                resp.data.forEach((r)=>{
                    html += '<tr>';
                    html += '<td>'+r.id+'</td>';
                    html += '<td><a href="http://localhost/bengkel2/master2/1">'+r.Name+'</a></td>';
                    html += '<td>'+r.Address+'</td>';
                    html += '<td>'+r.Phone+'</td>';
                });
                html += '</tbody>';
                //$('.table tbody').remove();
                $('.table tbody ').replaceWith(html);
            });
        }
        function loadData(jr, category){
            switch(jr){
                case 'mechanics':
                    var table = new Tabulator("#table-list", {
                        //height:"311px",
                        ajaxURL:"http://localhost/bengkel2/api/mechanics",
                        layout:"fitColumns",
                        placeholder:"No Data",
                        columns:[
                            {title:"Code", field:"Code", sorter:"string", width:100},
                            {title:"Name", field:"Name", sorter:"number", width:200 },
                            {title:"Phone", field:"Phone", sorter:"string"},
                            {title:"Address", field:"Address", sorter:"string"},
                            {title:"Driver", field:"car", hozAlign:"center", formatter:"tickCross", sorter:"boolean"},
                        ],
                    });
                    break;
                    case 'suppliers':
                        var table = new Tabulator("#table-list", {
                            //height:"311px",
                            ajaxURL:"http://localhost/bengkel2/api/suppliers",
                            layout:"fitColumns",
                            placeholder:"No Data",
                            columns:[
                                {title:"Code", field:"Code", sorter:"string", width:100},
                                {title:"Name", field:"Name", sorter:"number", width:200 },
                                {title:"Category", field:"Category", sorter:"string"},
                                {title:"Address", field:"Address", sorter:"string"},
                                {title:"City", field:"City", hozAlign:"center", sorter:"boolean"},
                                {title:"Phone", field:"Phone", hozAlign:"center", sorter:"boolean"},
                                {title:"Driver", field:"car", hozAlign:"center", formatter:"tickCross", sorter:"boolean"},
                            ],
                        });
                    break;
                    case 'memberss':
                        var table = new Tabulator("#table-list", {
                            //height:"311px",
                            ajaxURL:"http://localhost/bengkel2/api/members",
                            layout:"fitColumns",
                            placeholder:"No Data",
                            columns:[
                                {title:"Code", field:"Code", sorter:"string", width:100},
                                {title:"Name", field:"Name", sorter:"number", width:200 },
                                {title:"Category", field:"Category", sorter:"string"},
                                {title:"Address", field:"Address", sorter:"string"},
                                {title:"City", field:"City", hozAlign:"center", sorter:"boolean"},
                                {title:"Phone", field:"Phone", hozAlign:"center", sorter:"boolean"},
                                {title:"Driver", field:"car", hozAlign:"center", formatter:"tickCross", sorter:"boolean"},
                            ],
                        });
                    break;
            }
        }
        window.onload=loadData('members','');
        loadData('');
    </script>

    
</x-mainlayout>