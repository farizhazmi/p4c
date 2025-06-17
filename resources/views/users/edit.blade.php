@extends('layouts.app')

@section('content')
<h2>Edit User</h2>

<form action="{{ route('users.update', $user->id) }}" method="POST" style="max-width: 500px; background: white; padding: 20px; border-radius: 8px;">
    @csrf
    @method('PUT')

    <label>Nama:</label><br>
    <input type="text" name="name" value="{{ $user->name }}" required style="width: 100%; padding: 8px;"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="{{ $user->email }}" required style="width: 100%; padding: 8px;"><br><br>

    <button type="submit" style="background: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px;">Update</button>
</form>
@endsection
