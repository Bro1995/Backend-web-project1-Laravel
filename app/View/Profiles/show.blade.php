@extends('layouts.app')

@section('content')

<!-- Show username or name -->
<h1>{{ $user->username ?? $user->name }}</h1>

<!-- Show profile picture if available -->
@if($user->profile_picture)
    <img src="{{ asset('storage/' . $user->profile_picture) }}" width="150">
@endif

<!-- Birthday -->
<p>
    <strong>Verjaardag:</strong>
    {{ $user->birthday?->format('d/m/Y') }}
</p>

<!-- About text -->
<p>{{ $user->about }}</p>

<!-- Edit link only for the owner -->
@auth
    @if(auth()->id() === $user->id)
        <a href="{{ route('profile.edit') }}">Profiel bewerken</a>
    @endif
@endauth

@endsection
