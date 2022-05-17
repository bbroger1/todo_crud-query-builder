@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-warning mb-2 mt-2 alert-dismissible fade show text-center" role="alert">
            {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach
@endif
