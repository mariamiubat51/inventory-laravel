@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Suppliers</h2>
    <a href="{{ route('suppliers.create') }}" class="btn btn-primary mb-3">Add Supplier</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>              <!-- Add this -->
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Company</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier)
            <tr>
                <td>{{ $supplier->id }}</td>       <!-- Show the ID here -->
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->phone }}</td>
                <td>{{ $supplier->email }}</td>
                <td>{{ $supplier->address }}</td>
                <td>{{ $supplier->company_name }}</td>
                <td>
                    <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this supplier?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
