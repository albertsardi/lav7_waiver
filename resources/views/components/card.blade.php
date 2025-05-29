<div class="card mb-3">
    <div class="card-header">
      <h3> {!! $title??'' !!}</h3>
      {{ $description??'' }}
    </div>
    <div class="card-body">
      {{ $slot }}
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div><!-- end card-->