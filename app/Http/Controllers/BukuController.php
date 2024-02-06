<?php

namespace App\Http\Controllers;

use App\Models\Buku;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $order = $request->input('order', "judul");
        $sort = $request->input('sort', "asc");

        $bukus = Buku::orderBy($order, $sort)->get();
        return response()->json($bukus);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode'=>'required|numeric',
            'judul'=>'required|string|max:255',
            'stock'=>'required|numeric',
        ]);
        Buku::create($request->all());
        return response()->json(['message' => 'Buku berhasil disimpan'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bukus = Buku::find($id);
        if(!$bukus) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }
        return response()->json($bukus);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bukus = Buku::find($id);
        if(!$bukus) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }

        $request->validate([
            'kode'=>'required|numeric',
            'judul'=>'required|string|max:255',
            'stock'=>'required|numeric',
        ]);

        $bukus->update($request->all());
        return response()->json(['message' => 'Buku berhasil diupdate'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bukus = Buku::find($id);
        if(!$bukus) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }

        $bukus->delete();
        return response()->json(['message' => 'Buku berhasil dihapus'], 200);
    }

    public function search(Request $request) {
        $query = $request->input('key');
        $bukus = Buku::where('kode', $query)->get();
        return response()->json($bukus);
    }
}
