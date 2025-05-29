<x-mainlayout>
    <h2>List {{$title}}</h2>

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
     <a href='{{ $api }}/new'class="btn btn-primary">Add {{$title}}</a>
     <x-shortcut preset="{{  implode(',',$preset) }}" />
    <table class="table">
        <thead>
            <tr>
            @foreach($gridcol as $col)
            <th scope="col">{{ $col??'' }}</th>
            @endforeach
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
        function loadData(category){
            //var data = axios.get('http://localhost/bengkel2/api/mechanics')
            var data = axios.get('{{ $api }}')
            .then((resp)=>{
                console.log(resp.data);
                var html = '<tbody>';
                var title  = '{{ $title }}'
                if (title = 'Mechanics') {
                    resp.data.forEach((r)=>{
                        html += '<tr>';
                        html += '<td>'+r.id+'</td>';
                        html += '<td><a href="{{ $api }}/1">'+r.Name+'</a></td>';
                        html += '<td>'+r.Address+'</td>';
                        html += '<td>'+r.Phone+'</td>';
                    });
                }
                if (title = 'Suppliers') {
                    resp.data.forEach((r)=>{
                        html += '<tr>';
                        html += '<td>'+r.Code+'</td>';
                        html += '<td><a href="{{ $api }}/1">'+r.Name+'</a></td>';
                        html += '<td>'+r.Address+'</td>';
                        html += '<td>'+r.City+'</td>';
                    });
                }
                html += '</tbody>';
                //$('.table tbody').remove();
                $('.table tbody ').replaceWith(html);
            });
        }
        //window.onload=loadData('');
        loadData('');
    </script>

    
</x-mainlayout>