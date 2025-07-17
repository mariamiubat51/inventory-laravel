@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Transaction Logs</h1>
    <a href="{{ route('transaction_logs.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Add New Log</a>
</div>


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <table class="table table-striped table-bordered align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>Log ID</th>
                <th>Transaction ID</th>
                <th>Type</th>
                <th>Action</th>
                <th>Paid Status Before</th>
                <th>Paid Status After</th>
                <th>Amount Paid</th>
                <th>Due Amount</th>
                <th>Performed By</th>
                <th>Description</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($logs as $log)
                <tr>
                    <td>{{ $log->log_id }}</td>
                    <td>{{ $log->transaction_id }}</td>
                    <td>{{ $log->transaction_type }}</td>
                    <td>{{ $log->action }}</td>
                    <td>{{ $log->paid_status_before ?? '-' }}</td>
                    <td>{{ $log->paid_status_after ?? '-' }}</td>
                    <td>{{ number_format($log->amount_paid, 2) }}</td>
                    <td>{{ number_format($log->due_amount, 2) }}</td>
                    <td>{{ $log->performed_by ?? '-' }}</td>
                    <td>{{ $log->description ?? '-' }}</td>
                    <td>{{ $log->date }}</td>
                </tr>
            @empty
                <tr><td colspan="11">No transaction logs found.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $logs->links() }}
</div>
@endsection
