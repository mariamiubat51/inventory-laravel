@extends('layouts.app')

@section('content')
<div>
  <h2>Add New User</h2>

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="{{ route('users.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <div class="mb-3">
      <label>Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Confirm Password</label>
      <input type="password" name="password_confirmation" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Role</label>
      <select name="role" class="form-control" required>
        <option value="admin">Admin</option>
        <option value="staff" selected>Staff</option>
      </select>
    </div>

    <div class="mb-3">
      <label>Status</label>
      <select name="is_active" class="form-control" required>
        <option value="1" selected>Active</option>
        <option value="0">Inactive</option>
      </select>
    </div>

    <button type="submit" class="btn btn-success">Create User</button>
  </form>
</div>
@endsection
