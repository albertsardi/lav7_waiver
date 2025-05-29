<?php
    $value = $_GET['formdata'][$name]??'';
?>
<textarea name="{{ $name }}" id="{{ $name }}"  class="form-control" rows="3" id="exampleFormControlTextarea1" >{{ $value??'' }}</textarea>