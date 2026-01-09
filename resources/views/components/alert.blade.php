{{--
    This component shows success or error messages
    It is reusable in all pages
--}}

@if (session('success'))
    <div class="alert alert-success">
        {{-- Escape output to prevent XSS --}}
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif

{{-- Validation errors --}}
@if ($errors->any())
    <div class="alert alert-error">
        <ul>
            {{-- Loop through all validation errors --}}
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
