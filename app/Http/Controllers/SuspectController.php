<?php

namespace App\Http\Controllers;

use App\Models\Suspect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SuspectController extends Controller
{
public function store(Request $request)
{
    // Validate the request data with file-specific rules
    $validator = Validator::make($request->all(), [
        'full_name' => 'required|string|max:255',
        'age' => 'nullable|integer|min:1|max:120',
        'gender' => 'required|in:male,female,other',
        'description' => 'required|string',
        'address' => 'nullable|string|max:500',
        'last_known_location' => 'required|string|max:255',
        'status' => 'required|in:wanted,missing,person_of_interest',
        'video' => 'nullable', // 50MB
        'audio' => 'nullable', // 20MB
    ], [
        'video.max' => 'The video must not be greater than 50MB.',
        'audio.max' => 'The audio must not be greater than 20MB.',
        'video.mimetypes' => 'The video must be a file of type: mp4, mov, avi.',
        'audio.mimetypes' => 'The audio must be a file of type: mp3, wav, ogg.',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'errors' => $validator->errors()
        ], 422);
    }

    DB::beginTransaction();

    try {
        // Handle video upload
        $videoPath = null;
        if ($request->hasFile('video')) {
            $videoFile = $request->file('video');
            $videoPath = $videoFile->store('videos', 'public');
        }

        // Handle audio upload
        $audioPath = null;
        if ($request->hasFile('audio')) {
            $audioFile = $request->file('audio');
            $audioPath = $audioFile->store('audios', 'public');
        }

        // Create suspect record
        $suspect = Suspect::create([
            'full_name' => $request->full_name,
            'age' => $request->age,
            'gender' => $request->gender,
            'description' => $request->description,
            'address' => $request->address,
            'last_known_location' => $request->last_known_location,
            'status' => $request->status,
            'video_path' => $videoPath,
            'audio_path' => $audioPath,
        ]);

        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Suspect report created successfully',
            'data' => $suspect
        ], 201);

    } catch (\Exception $e) {
        DB::rollBack();
        
        // Clean up uploaded files if something went wrong
        if (isset($videoPath) && Storage::disk('public')->exists($videoPath)) {
            Storage::disk('public')->delete($videoPath);
        }
        if (isset($audioPath) && Storage::disk('public')->exists($audioPath)) {
            Storage::disk('public')->delete($audioPath);
        }

        return response()->json([
            'success' => false,
            'message' => 'Failed to create suspect report',
            'error' => $e->getMessage()
        ], 500);
    }
}

    /**
     * Store uploaded file with unique filename
     */
    private function storeFile($file, $directory)
    {
        $extension = $file->getClientOriginalExtension();
        $filename = Str::uuid() . '.' . $extension;
        $path = $file->storeAs($directory, $filename, 'public');

        return $path;
    }

    /**
     * Get the list of allowed mime types for validation
     */
    public function getAllowedMimeTypes()
    {
        return response()->json([
            'video' => ['mp4', 'mov', 'avi'],
            'audio' => ['mp3', 'wav', 'ogg']
        ]);
    }
}
