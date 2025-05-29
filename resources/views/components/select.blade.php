<?php
    $value = $_GET['formdata'][$name]??'';
    $option = json_decode($option);

?>
<select name="{{ $name }}" id="{{ $name }}" onClick="{{ $onClick }}" class="form-select" aria-label="Default select example">
  <option selected>Open this select menu</option>
  @foreach($option as $opt)
    <option value="{{ $opt }}">{{ $opt }}</option>
  @endforeach
</select>