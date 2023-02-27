 
@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <ul>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </ul>
    </div>
@endif

{{-- @if (Session::has('success'))
<div class="alert alert-danger">
    <p>{{ Session::get('success') }}</p>
    </div>
    
@endif --}}

@if (Session::has('message'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ Session::get('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


