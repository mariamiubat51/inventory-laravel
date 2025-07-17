@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Transaction Log</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('transaction_logs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="transaction_id" class="form-label">Transaction ID</label>
            <input type="text" name="transaction_id" class="form-control" required value="{{ old('transaction_id') }}">
        </div>

        <div class="mb-3">
            <label for="transaction_type" class="form-label">Transaction Type</label>
            <input type="text" name="transaction_type" class="form-control" required value="{{ old('transaction_type') }}">
        </div>

        <div class="mb-3">
            <label for="action" class="form-label">Action</label>
            <input type="text" name="action" class="form-control" required value="{{ old('action') }}">
        </div>

        <div class="mb-3">
            <label for="paid_status_before" class="form-label">Paid Status Before</label>
            <input type="text" name="paid_status_before" class="form-control" value="{{ old('paid_status_before') }}">
        </div>

        <div class="mb-3">
            <label for="paid_status_after" class="form-label">Paid Status After</label>
            <input type="text" name="paid_status_after" class="form-control" value="{{ old('paid_status_after') }}">
        </div>

        <div class="mb-3">
            <label for="amount_paid" class="form-label">Amount Paid</label>
            <input type="number" step="0.01" name="amount_paid" class="form-control" value="{{ old('amount_paid', 0) }}">
        </div>

        <div class="mb-3">
            <label for="due_amount" class="form-label">Due Amount</label>
            <input type="number" step="0.01" name="due_amount" class="form-control" value="{{ old('due_amount', 0) }}">
        </div>

        <div class="mb-3">
            <label for="performed_by" class="form-label">Performed By</label>
            <input type="text" name="performed_by" class="form-control" value="{{ old('performed_by', auth()->user()->name ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Add Log</button>
    </form>
</div>
@endsection
