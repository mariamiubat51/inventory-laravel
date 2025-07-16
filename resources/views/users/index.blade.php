@extends('layouts.app')

@section('content')
<div>
  <h2>User Management</h2>
  <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add New User</a>

  @if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th><th>Email</th><th>Role</th><th>Status</th><th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td><span class="badge bg-secondary">{{ ucfirst($user->role) }}</span></td>
        <td>
          @if ($user->is_active)
            <span class="badge bg-success">Active</span>
          @else
            <span class="badge bg-danger">Inactive</span>
          @endif
        </td>
        <td>
          <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">Edit</a>
          <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
