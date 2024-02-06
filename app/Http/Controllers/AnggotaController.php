<?php

namespace App\Http\Controllers;

use App\Models\Anggota;

use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $order = $request->input('order', "nama");
        $sort = $request->input('sort', "asc");

        $anggotas = Anggota::orderBy($order, $sort)->get();

        return response()->json($anggotas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode'=>'required|numeric',
            'nama'=>'required|string|max:255',
            'email'=>'required|string|max:255',
        ]);
        Anggota::create($request->all());
        return response()->json(['message' => 'Anggota berhasil disimpan'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $anggotas = Anggota::find($id);
        if(!$anggotas) {
            return response()->json(['message' => 'Anggota tidak ditemukan'], 404);
        }
        return response()->json($anggotas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $anggotas = Anggota::find($id);
        if(!$anggotas) {
            return response()->json(['message' => 'Anggota tidak ditemukan'], 404);
        }

        $request->validate([
            'kode'=>'required|numeric',
            'nama'=>'required|string|max:255',
            'email'=>'required|string|max:255'
        ]);

        $anggotas->update($request->all());
        return response()->json(['message' => 'Anggota berhasil diupdate'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $anggotas = Anggota::find($id);
        if(!$anggotas) {
            return response()->json(['message' => 'Anggota tidak ditemukan'], 404);
        }

        $anggotas->delete();
        return response()->json(['message' => 'Anggota berhasil dihapus'], 200);
    }

    public function search(Request $request) {
        $query = $request->input('key');
        $anggotas = Anggota::where('kode', $query)->get();
        return response()->json($anggotas);
    }
}
