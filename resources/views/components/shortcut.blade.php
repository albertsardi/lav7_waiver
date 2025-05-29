<?php
  $preset = explode(',', $preset);
  //dd($preset);
?>
<div class="btn-toolbar my-3" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group me-2" role="group" aria-label="First group">
    @foreach ($preset as $p)
      <button type="button" class="btn btn-outline-secondary">{{ $p }}</button>
    @endforeach
  </div>
  <div class="input-group">
    <div class="input-group-text" id="btnGroupAddon">@</div>
    <input type="text" class="form-control" placeholder="Input group example" aria-label="Input group example" aria-describedby="btnGroupAddon">
  </div>
</div>