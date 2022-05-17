@if (session('warning'))
    <div class="alert alert-warning mb-2 mt-2 alert-dismissible fade show text-center"
         role="alert">
        {{ session('warning') }}
        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"></button>
    </div>
@elseif (session('success'))
    <div class="alert alert-success mb-2 mt-2 alert-dismissible fade show text-center"
         role="alert">
        {{ session('success') }}
        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"></button>
    </div>
@elseif (session('danger'))
    <div class="alert alert-danger mb-2 mt-2 alert-dismissible fade show text-center"
         role="alert">
        {{ session('danger') }}
        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"></button>
    </div>
@endif
