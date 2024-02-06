<?php

namespace App\Http\Controllers;

use App\Models\Petugas;

use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $order = $request->input('order', "nama");
        $sort = $request->input('sort', "asc");
        $petugass = Petugas::orderBy($order, $sort)->get();
        return response()->json($petugass);
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
        Petugas::create($request->all());
        return response()->json(['message' => 'Petugas berhasil disimpan'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $petugass = Petugas::find($id);
        if(!$petugass) {
            return response()->json(['message' => 'Petugas tidak ditemukan'], 404);
        }
        return response()->json($petugass);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $petugass = Petugas::find($id);
        if(!$petugass) {
            return response()->json(['message' => 'Petugas tidak ditemukan'], 404);
        }

        $request->validate([
            'kode'=>'required|numeric',
            'nama'=>'required|string|max:255',
            'email'=>'required|string|max:255'
        ]);

        $petugass->update($request->all());
        return response()->json(['message' => 'Petugas berhasil diupdate'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       Petugas::where('id', $id)->delete();
       return response()->json('Petugas berhasil dihapus', 200);
    }

    public function search(Request $request) {
        $query = $request->input('key');
        $petugass = Petugas::where('kode', $query)->get();
        return response()->json($petugass);
    }
}
