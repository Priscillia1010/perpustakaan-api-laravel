<?php

namespace App\Http\Controllers;

use App\Models\Account;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::all();
        return response()->json($accounts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'=>'required|string|max:255',
            'email'=>'required|string|max:255',
            'password'=>'required|string|max:255'
        ]);
        Account::create($request->all());
        return response()->json(['message' => 'Account berhasil disimpan'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $accounts = Account::find($id);
        if(!$accounts) {
            return response()->json(['message' => 'Account tidak ditemukan'], 404);
        }
        return response()->json($accounts);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ccountnggotas = Account::find($id);
        if(!$accounts) {
            return response()->json(['message' => 'Account tidak ditemukan'], 404);
        }

        $request->validate([
            'username'=>'required|string|max:255',
            'email'=>'required|string|max:255',
            'password'=>'required|string|max:255'
        ]);

        $accounts->update($request->all());
        return response()->json(['message' => 'Account berhasil diupdate'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $accounts = Account::find($id);
        if(!$accounts) {
            return response()->json(['message' => 'Account tidak ditemukan'], 404);
        }

        $accounts->delete();
        return response()->json(['message' => 'Account berhasil dihapus'], 200);
    }
}
