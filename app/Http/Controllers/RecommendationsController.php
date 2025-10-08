<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recommendations;

class RecommendationsController extends Controller
{
   public function index(){
    $recommendations = Recommendations::all();
    if ($recommendations->isNotEmpty()) {
         return response()->json([
            'status' => 'success',
            'message' => 'Recommendations retrieved successfully.',
            'data' => $recommendations
         ]);
    } else {
    return response()->json([
        'status' => 'error',
        'message' => 'No recommendations found.',
    ], 404);
    }
    }
    public function show($id){
        $recommendation = Recommendations::find($id);
        if ($recommendation) {
            return response()->json([
                'status' => 'success',
                'message' => 'Recommendation retrieved successfully.',
                'data' => $recommendation
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Recommendation not found.',
            ], 404);
        }   
   
}

    public function store(Request $request){
        $validatedData = $request->validate([
            'student_id' => 'required|integer',
            'strand_code' => 'required|integer',
            'recommended_material' => 'required|string|max:255',
            'reason' => 'nullable|string',
        ]);

        $recommendation = Recommendations::create($validatedData);

        return response()->json([
            'status' => 'success',
            'message' => 'Recommendation created successfully.',
            'data' => $recommendation
        ], 201);
     
    }

    public function update(Request $request, $id){
        $recommendation = Recommendations::find($id);
        if (!$recommendation) {
            return response()->json([
                'status' => 'error',
                'message' => 'Recommendation not found.',
            ], 404);
        }

        $validatedData = $request->validate([
            'student_id' => 'sometimes|required|integer',
            'strand_code' => 'sometimes|required|integer',
            'recommended_material' => 'sometimes|required|string|max:255',
            'reason' => 'nullable|string',
        ]);

        $recommendation->update($validatedData);

        return response()->json([
            'status' => 'success',
            'message' => 'Recommendation updated successfully.',
            'data' => $recommendation
        ]);
        
    }

    public function destroy($id){
        $recommendation = Recommendations::find($id);
        if (!$recommendation) {
            return response()->json([
                'status' => 'error',
                'message' => 'Recommendation not found.',
            ], 404);
        }

        $recommendation->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Recommendation deleted successfully.',
        ]);
        
    }
}       
