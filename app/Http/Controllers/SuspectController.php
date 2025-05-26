<?php

namespace App\Http\Controllers;

use App\Models\Suspect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuspectController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'age' => 'nullable|integer|min:1|max:120',
            'gender' => 'in:male,female,other',
            'description' => 'required|string',
            'address' => 'nullable|string',
            'last_known_location' => 'required|string|max:255',
            'status' => 'in:wanted,missing,person_of_interest'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $suspect = Suspect::create($request->all());

        return response()->json([
            'message' => 'Suspect report created successfully',
            'data' => $suspect
        ], 201);
    }
}