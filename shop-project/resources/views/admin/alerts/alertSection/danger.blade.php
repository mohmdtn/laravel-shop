@if(session('alert-section-danger'))
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="danger:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            {{ session('alert-section-danger') }}
        </div>
    </div>
@endif
