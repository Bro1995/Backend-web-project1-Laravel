@extends('layouts.app')

@section('content')

<!-- Page title -->
<h1>Profiel bewerken</h1>

<!-- Profile update form -->
<form method="POST"
      action="{{ route('profile.update') }}"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <!-- Username field -->
    <label>Username</label>
    <input type="text" name="username"
           value="{{ old('username', $user->username) }}">

    <!-- Birthday field -->
    <label>Verjaardag</label>
    <input type="date" name="birthday"
           value="{{ old('birthday', $user->birthday) }}">

    <!-- About text -->
    <label>Over mij</label>
    <textarea name="about">{{ old('about', $user->about) }}</textarea>

    <!-- Profile picture upload -->
    <label>Profielfoto</label>
    <input type="file" name="profile_picture">

    <!-- Submit button -->
    <button type="submit">Opslaan</button>

</form>

@endsection
