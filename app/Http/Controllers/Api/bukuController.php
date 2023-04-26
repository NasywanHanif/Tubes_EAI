<?php

namespace App\Http\Controllers\Api;

use App\Models\buku;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class bukuController extends Controller
{

    #=========index============
    public function index ()
    {
        $buku = buku::all();
        return response()->json([
            'data' => $buku
        ]);
    }

    #=========store(create)============
    public function store (Request $request)
    {
        $buku = buku::create([
            'judul' => $request->judul,
            'kode_buku' => $request->kode_buku,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit
        ]);

        return response()->json([
            'data' => $buku
        ]);
    }

    #=========show by id============
    public function show($id)
    {
        $buku = buku::find($id);
        return response()->json([
            'data' => $buku
        ]);
    }

    #=========delete============
    public function destroy($id)
    {
        $buku = buku::find($id);
        $buku->delete();
        return response()->json([
            'status' => 200,
            'message' => 'data buku berhasil dihapus'
        ], 200);

    }
}