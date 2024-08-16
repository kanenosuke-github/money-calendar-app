<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HouseholdAccountController extends Controller
{
    public function index()
    {
        $householdAccounts = HouseholdAccount::all();
        return view('household-accounts.index',compact('household-accounts'));
    }

    public function create()
    {
        return view('household-accounts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'amount' => 'required|integer',
            'item' => 'nullabll|string|max:255',
            'category' => 'required|string|max:255',
            'memo' => 'nullable|string',
        ]);

        HouseholdAccount::create($validated);
        return redirect()->route('household-accounts.index')->with('success','家計簿が追加されました');
    }
}
