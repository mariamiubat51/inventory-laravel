@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="mb-4">Edit User</h2>

  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Role</label>
      <select name="role" class="form-control" required>
        <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="staff" {{ old('role', $user->role) === 'staff' ? 'selected' : '' }}>Staff</option>
      </select>
    </div>

    <div class="mb-3">
      <label>Status</label>
      <select name="is_active" class="form-control" required>
        <option value="1" {{ old('is_active', $user->is_active) ? 'selected' : '' }}>Active</option>
        <option value="0" {{ !old('is_active', $user->is_active) ? 'selected' : '' }}>Inactive</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Update User</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary ms-2">Cancel</a>
  </form>
</div>
@endsection
