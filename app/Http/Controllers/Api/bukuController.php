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
        if ($buku->count() > 0){

            return response()->json([
                'status' => 200,
                'buku' => $buku
            ], 200);
        }else{

            return response()->json([
                'status' => 404,
                'message' => 'Tidak ditemukan data buku'
            ], 404);
        }
    }

    #=========store(create)============
    public function store (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul'=> 'required',
            'kode_buku'=> 'required',
            'pengarang'=> 'required',
            'penerbit'=> 'required',
            'tahun_terbit'=> 'required'
        ]);

        if($validator->fails()){

            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }else {

            $buku = buku::create([
                'judul' => $request->judul,
                'kode_buku' => $request->kode_buku,
                'pengarang' => $request->pengarang,
                'penerbit' => $request->penerbit,
                'tahun_terbit' => $request->tahun_terbit
            ]);

            if($buku){

                return response()->json([
                    'status' => 200,
                    'message' => 'data buku berhasil ditambahkan'

                ], 200);
            }else{

                return response()->json([
                    'status' => 500,
                    'message' => 'Mohon maaf ada yang bermasalah!'
                ], 500);

            }
        }
    }

    #=========show by id============
    public function show($id)
    {
        $buku = buku::find($id);
        if($buku){

            return response()->json([
                'status' => 200,
                'buku' => $buku

            ], 200);
        }else{

            return response()->json([
                'status' => 404,
                'message' => "Tidak ada buku yang ditemukan"
            ], 404);
        }
    }
}

    