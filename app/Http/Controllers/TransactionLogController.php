<?php

namespace App\Http\Controllers;

use App\Models\TransactionLog;
use Illuminate\Http\Request;

class TransactionLogController extends Controller
{
    // Show list of logs
    public function index()
    {
        $logs = TransactionLog::orderBy('date', 'desc')->paginate(10);
        return view('transaction_logs.index', compact('logs'));
    }

    // Show form to create a log (for testing/demo purposes)
    public function create()
    {
        return view('transaction_logs.create');
    }

    // Store new log entry
    public function store(Request $request)
    {
        $validated = $request->validate([
            'transaction_id' => 'required|string',
            'transaction_type' => 'required|string',
            'action' => 'required|string',
            'paid_status_before' => 'nullable|string',
            'paid_status_after' => 'nullable|string',
            'amount_paid' => 'nullable|numeric',
            'due_amount' => 'nullable|numeric',
            'performed_by' => 'nullable|string',
            'description' => 'nullable|string',
            'date' => 'nullable|date',
        ]);

        // Use current time if date not provided
        if (empty($validated['date'])) {
            $validated['date'] = now();
        }

        TransactionLog::create($validated);

        return redirect()->route('transaction_logs.index')->with('success', 'Transaction log added.');
    }
}
