<?php
    //dump($_GET['formdata'][$name]);
    $value = $_GET['formdata'][$name]??'';
    $placeholder = $placeholder??'';
    
?>
<input name = "{{ $name }}" id = "{{ $name }}" type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{ $placeholder }}" value="{{ $value??'' }}" />