<?php

namespace App\Http\Controllers\Api;

use App\Models\student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class studentController extends Controller
{

    #=========index============
    public function index ()
    {
        $students = student::all();
        return response()->json([
            'data' => $students
        ]);
    }

    #=========store(create)============
    public function store (Request $request)
    {
        $student = student::create([
            'npm'=> $request->npm,
            'prodi'=> $request->prodi,
            'alamat'=> $request->alamat,
            'noTelp'=> $request->noTelp
        ]);

        return response()->json([
            'data' => $student
        ]);
    }

    #=========show by id============
    public function show($id)
    {
        $student = student::find($id);
        return response()->json([
            'data' => $student
        ]);
    }


    #========edit===============
    public function edit ($id)
    {
        $student = student::find($id);
        if($student){

            return response()->json([
                'data' => $student
            ]);

        }else{
            return response()->json([
                'status' => 404,
                'message' => "Tidak ada data siswa yang ditemukan"
            ], 404);
        }
    }

    #=========update============
    public function update (Request $request, int $id)
    {
        $student = student::find($id);
        if($student){
            $student->update([
                'npm'=> $request->npm,
                'prodi'=> $request->prodi,
                'alamat'=> $request->alamat,
                'noTelp'=> $request->noTelp
            ]);
            return response()->json([
                'data' => $student
            ]);
        
        }else{
            return response()->json([
                'message' => 'Tidak ada data student yang terdeteksi'
            ], 404);
        }
    }

    #=========delete============
    public function destroy($id)
    {
        $student = student::find($id);
        $student->delete();
        return response()->json([
            'status' => 200,
            'message' => 'data student berhasil dihapus'
        ], 200);

    }
}
