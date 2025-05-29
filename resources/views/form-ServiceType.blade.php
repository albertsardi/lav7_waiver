<x-mainlayout>
    <h2>Form Service Type</h2>
    
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">test-label</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>

    <form method="POST" class="form">
        {!! $form !!}
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Work Code</th>
                <th>Work Name</th>
                <th>Tariff</td>
                <th>Member disc (%)</th>
                <th>Nonmember Disc (%)</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($WorkList as $w)
            <tr>
                <td>{{ $w->workCode }}</td>
                <td>{{ $w->workCode }}</td>
                <td>{{ $w->Price }}</td>
                <td>{{ $w->DiscMember }}</td>
                <td>{{ $w->DiscNonmember }}</td>
                <td><button id='cmEdit' class="btn btn-secondary">Edit</button></td>
            </tr>
            @endforeach
            <tr class="newline">
                <td colspan="6"><button id='cmAdd' class="btn btn-secondary">Add new Item</button></td>
            </tr>
        </tbody>
        
    </table>
</x-mainlayout>

<script>
            $(document).ready(function(){
                $("#cmAdd").click(function(){
                    alert('add item')
                    const td = $(this).parent()
                    const tr = td.parent()
                    console.log(tr)
                    $('.newline').html('<tr><td>col1</td><td>col2</td><td>col3</td></tr>')
                });
            });
</script>