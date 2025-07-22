<x-mainlayout>
    <h2>List mechanic</h2>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


    <x-card title="List Mechanic">
        <div x-data="{ data: content }">
     <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" id="name" name="name" class="form-control" minlength="1" placeholder="Name" />
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text" id="description" name="description" class="form-control" minlength="1" placeholder="Description" />
</div>

<div class="mb-3">
    <button type="submit" x-on:click="pushData(data);" class="btn btn-primary">Add</button>
</div>

<template x-for="(d, i) in data" :key="Date.now() + Math.floor(Math.random() * 1000000)">
    <div style="display: table-row">
        <div style="display: table-cell" x-text="i + 1"></div>
        <div style="display: table-cell" x-text="d.name"></div>
        <div style="display: table-cell" x-text="data[i].description"></div>
    </div>
</template>


    </x-card>


    <script>
        let content = [
            { name: 'Test 1', description: 'Test Description 1' },
            { name: 'Test 2', description: 'Test Description 2' },
            { name: 'Test 3', description: 'Test Description 3' },
            { name: 'Test 4', description: 'Test Description 4' },
            { name: 'Test 5', description: 'Test Description 5' },
        ];
        
        function pushData(data)
        {
            data.push({
                name: document.getElementById('name').value,
                description: document.getElementById('description').value
            });
        }
        
    </script>

    
</x-mainlayout>