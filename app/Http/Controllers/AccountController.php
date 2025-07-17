<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 

class AccountController extends Controller
{
    public function index() {
        $accounts = Account::all();
        return view('accounts.index', compact('accounts'));
    }

    public function create() {
        return view('accounts.create');
    }

    public function store(Request $request) {
        $request->validate([
            'account_code' => 'required|unique:accounts',
            'account_name' => 'required',
            'account_type' => 'required|in:cash,bank,others',
            'initial_balance' => 'required|numeric',
        ]);

        $data = $request->all();
        $data['total_balance'] = $data['initial_balance'];

        Account::create($data);

        return redirect()->route('accounts.index')->with('success', 'Account created successfully.');
    }

    public function edit(Account $account) {
        return view('accounts.edit', compact('account'));
    }

    public function update(Request $request, Account $account) {
        $request->validate([
            'account_code' => 'required|unique:accounts,account_code,' . $account->id,
            'account_name' => 'required',
            'account_type' => 'required|in:cash,bank,others',
            'initial_balance' => 'required|numeric',
        ]);

        $account->update([
            'account_code' => $request->account_code,
            'account_name' => $request->account_name,
            'account_type' => $request->account_type,
            'initial_balance' => $request->initial_balance,
            'total_balance' => $request->total_balance ?? $request->initial_balance,
            'note' => $request->note,
        ]);

        return redirect()->route('accounts.index')->with('success', 'Account updated successfully.');
    }

    public function destroy(Account $account) {
        $account->delete();
        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully.');
    }
}
