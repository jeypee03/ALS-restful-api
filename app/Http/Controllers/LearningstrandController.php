<?php

namespace App\Http\Controllers;

use App\Models\Learningstrand;
use Illuminate\Http\Request;

class LearningstrandController extends Controller
{
    public function index(){
        $learningstrands = Learningstrand::all();
        if ($learningstrands->isNotEmpty()) {
            return response()->json([
                'status'=> 'success', 
                'message' => 'Learning Strands retrieved successfully.',
                'data' => $learningstrands
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'No learning strands found.',
            ], 404);
        }
    }
    public function show($id){ 
        $learningstrand = Learningstrand::find($id);
        if ($learningstrand) {
            return response()->json([
                'status' => 'success',
                'message' => 'Learning Strand retrieved successfully.',
                'data' => $learningstrand
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Learning Strand not found.',
            ], 404);
        }

    }
    public function store(Request $request){   
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'teacher_id' => 'required|integer',
            'category' => 'required|string|max:100',
        ]);

        $learningstrand = Learningstrand::create($validatedData);

        return response()->json([
            'status' => 'success',
            'message' => 'Learning Strand created successfully.',
            'data' => $learningstrand
        ], 201);

   }

    public function update(Request $request, $id){
        $learningstrand = Learningstrand::find($id);
        if (! $learningstrand) {
            return response()->json([
                'status' => 'error',
                'message' => 'Learning Strand not found.',
            ], 404);
        }

        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string',
            'teacher_id' => 'sometimes|required|integer',
            'category' => 'sometimes|required|string|max:100',
        ]);

        $learningstrand->update($validatedData);

        return response()->json([
            'status' => 'success',
            'message' => 'Learning Strand updated successfully.',
            'data' => $learningstrand
        ]);

    }
    public function destroy($id){
        $learningstrand = Learningstrand::find($id);
        if (! $learningstrand) {
            return response()->json([
                'status' => 'error',
                'message' => 'Learning Strand not found.',
            ], 404);
        }

        $learningstrand->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Learning Strand deleted successfully.'
        ]);

    }

}
