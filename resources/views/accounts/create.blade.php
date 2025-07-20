@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Account</h2>
    <form action="{{ route('accounts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Account Code</label>
            <input type="text" name="account_code" value="{{ $nextAccountCode }}" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label>Account Name</label>
            <input type="text" name="account_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Account Type</label>
            <select name="account_type" class="form-control" required>
                <option value="cash">Cash</option>
                <option value="bank">Bank</option>
                <option value="others">Others</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Initial Balance</label>
            <input type="number" step="0.01" name="initial_balance" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Note (optional)</label>
            <textarea name="note" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
