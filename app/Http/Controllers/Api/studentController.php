<?php

namespace App\Http\Controllers\Api;

use App\Models\student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class studentController extends Controller
{

    #=========index============
    public function index ()
    {
        $students = student::all();
        if ($students->count() > 0){

            return response()->json([
                'status' => 200,
                'students' => $students
            ], 200);
        }else{

            return response()->json([
                'status' => 404,
                'message' => 'Tidak ditemukan catatan'
            ], 404);
        }
    }

    #=========store(create)============
    public function store (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'npm'=> 'required',
            'prodi'=> 'required',
            'alamat'=> 'required',
            'noTelp'=> 'required'
        ]);

        if($validator->fails()){

            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }else {

            $student = student::create([
                'npm'=> $request->npm,
                'prodi'=> $request->prodi,
                'alamat'=> $request->alamat,
                'noTelp'=> $request->noTelp
            ]);

            if($student){

                return response()->json([
                    'status' => 200,
                    'message' => 'data student berhasil ditambahkan'

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
        $student = student::find($id);
        if($student){

            return response()->json([
                'status' => 200,
                'student' => $student

            ], 200);
        }else{

            return response()->json([
                'status' => 404,
                'message' => "Tidak ada siswa yang ditemukan"
            ], 404);
        }
    }

    #=========edit============
    public function edit ($id)
    {
        $student = student::find($id);
        if($student){

            return response()->json([
                'status' => 200,
                'student' => $student

            ], 200);
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
        $validator = Validator::make($request->all(), [
            'npm'=> 'required',
            'prodi'=> 'required',
            'alamat'=> 'required',
            'noTelp'=> 'required'
        ]);

        if($validator->fails()){

            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }else {

            $student = student::find($id);
            
            if($student){

                $student->update([
                    'npm'=> $request->npm,
                    'prodi'=> $request->prodi,
                    'alamat'=> $request->alamat,
                    'noTelp'=> $request->noTelp
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => 'data student berhasil diperbarui'

                ], 200);
            }else{

                return response()->json([
                    'status' => 404,
                    'message' => 'Tidak ada data student yang terdeteksi'
                ], 404);

            }
        }
    }

    #=========delete============
    public function destroy($id)
    {
        $student = student::find($id);
        if($student){

            $student->delete();
            return response()->json([
                'status' => 200,
                'message' => 'data student berhasil dihapus'

            ], 200);

        }else{

            return response()->json([
                'status' => 404,
                'message' => 'Tidak ada data student yang terdeteksi'
            ], 404);
        }
    }
}
