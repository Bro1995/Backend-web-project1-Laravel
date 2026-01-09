@extends('layouts.admin')

@section('content')
<h1>Gebruikers</h1>

<table>
    <tr>
        <th>Naam</th>
        <th>Email</th>
        <th>Admin</th>
        <th>Actie</th>
    </tr>

    @foreach($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->is_admin ? 'Ja' : 'Nee' }}</td>
        <td>
            <form method="POST" action="{{ route('users.update', $user) }}">
                @csrf
                @method('PUT')
                <input type="checkbox" name="is_admin" {{ $user->is_admin ? 'checked' : '' }}>
                <button>Opslaan</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
