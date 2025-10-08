<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $Students = Student::all();

        if($Students->isEmpty()){
            return response()->json([
                'status' => 'error',
                'message' => 'No students found'
            ], 404);
        }
        
        return response()->json([
            'status' => 'sucess',
            'message' => 'Students retrieved successfully',
            'data' => $Students
    ], 200);
    }

    public function show($id){
    }

    public function store(Request $request){
    }

    public function update(Request $request, $id){
    }

    public function destroy($id){
    }
}
