@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Account</h2>
    <form action="{{ route('accounts.update', $account->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Account Code</label>
            <input type="text" name="account_code" value="{{ $account->account_code }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Account Name</label>
            <input type="text" name="account_name" value="{{ $account->account_name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Account Type</label>
            <select name="account_type" class="form-control" required>
                <option value="cash" {{ $account->account_type == 'cash' ? 'selected' : '' }}>Cash</option>
                <option value="bank" {{ $account->account_type == 'bank' ? 'selected' : '' }}>Bank</option>
                <option value="others" {{ $account->account_type == 'others' ? 'selected' : '' }}>Others</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Initial Balance</label>
            <input type="number" step="0.01" name="initial_balance" value="{{ $account->initial_balance }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Total Balance</label>
            <input type="number" step="0.01" name="total_balance" value="{{ $account->total_balance }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Note (optional)</label>
            <textarea name="note" class="form-control">{{ $account->note }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
