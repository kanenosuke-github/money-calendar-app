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
    public function show($id)
    {
        $householdAccounts = HouseHoldAccount::findOrFail($id);
        return view('household-accounts.show',compact('householdAccount'));
    }
    public function edit($id)
    {
        $householdAccounts = HouseHoldAccount::findOrFail($id);
        return view('household-accounts.edit',compact('householdAccount'));
    }
    public function update(Request $request, $id)
    {
        // バリデーション
        $validated = $request->validate([
            'date' => 'required|date',
            'amount' => 'required|integer',
            'item' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'memo' => 'nullable|string',
        ]);

        // 指定されたIDのレコードを更新
        $householdAccount = HouseholdAccount::findOrFail($id);
        $householdAccount->update($validated);

        // 一覧ページにリダイレクト
        return redirect()->route('household-accounts.index')->with('success', '家計簿が更新されました');
    }

    // 削除処理
    public function destroy($id)
    {
        $householdAccount = HouseholdAccount::findOrFail($id);
        $householdAccount->delete();

        // 一覧ページにリダイレクト
        return redirect()->route('household-accounts.index')->with('success', '家計簿が削除されました');
    }
}
