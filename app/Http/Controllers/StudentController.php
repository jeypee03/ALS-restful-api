<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();

        if($students->isEmpty()){
            return response()->json([
                'status' => 'error',
                'message' => 'No students found.',
            ], 404);
        }
        
        return response()->json([
            'status'=> 'success', 
            'message' => 'Students retrieved successfully.',
            'data' => $students
        ], 200);
    }

    public function show($id){
        $student = Student::find($id);

        if(!$student){
            return response()->json([
                'status' => 'error',
                'message' => 'Student not found.',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Student retrieved successfully.',
            'data' => $student
        ], 200);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'strand_year' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'date_of_birth' => 'required|date',
        ]);

        $student = Student::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Student created successfully.',
            'data' => $student
        ], 201);
    }

    public function update(Request $request, $id){
        $student = Student::find($id);

        if(!$student){
            return response()->json([
                'status' => 'error',
                'message' => 'Student not found.',
            ], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:students,email,'.$id,
            'strand_year' => 'sometimes|required|string|max:255',
            'address' => 'sometimes|required|string|max:255',
            'contact_number' => 'sometimes|required|string|max:15',
            'date_of_birth' => 'sometimes|required|date',
        ]);

        $student->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Student updated successfully.',
            'data' => $student
        ], 200);

    }

    public function destroy($id){
        $student = Student::find($id);

        if(!$student){
            return response()->json([
                'status' => 'error',
                'message' => 'Student not found.',
            ], 404);
        }

        $student->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Student deleted successfully.'
        ], 200);
    }
}