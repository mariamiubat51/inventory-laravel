@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Accounts</h2>
    <a href="{{ route('accounts.create') }}" class="btn btn-primary mb-3">Add Account</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Name</th>
                <th>Type</th>
                <th>Initial Balance</th>
                <th>Total Balance</th>
                <th>Note</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($accounts as $account)
            <tr>
                <td>{{ $account->id }}</td>
                <td>{{ $account->account_code }}</td>
                <td>{{ $account->account_name }}</td>
                <td>{{ ucfirst($account->account_type) }}</td>
                <td>{{ $account->initial_balance }}</td>
                <td>{{ $account->total_balance }}</td>
                <td>{{ $account->note }}</td>
                <td>
                    <a href="{{ route('accounts.edit', $account->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('accounts.destroy', $account->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
