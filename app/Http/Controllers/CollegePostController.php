<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CollegePost;

class CollegePostController extends Controller
{
    public function StuffCollagePosts()
    {
        $post = CollegePost::all();
        return view('stuff.post.collegepost', compact('post'));
    }

    public function CollegeDeanCollagePosts()
    {
        $post = CollegePost::all();
        return view('investigator.post.collegepost', compact('post'));
    }

    public function CollegeDeanAddCollegePost()
    {
        return view('investigator.post.addcollegepost');
    }

    public function CollegeDeanCollegePostStore(Request $request)
    {
        $request->validate([
            'heading' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate photo upload
            'description' => 'required|string',
            'like' => 'nullable|string',
            'dislike' => 'nullable|string',
            'comment' => 'nullable|string',
            'posted_by_name' => 'nullable|string|max:255',
            'posted_by_email' => 'nullable|email|max:255', // Validate as email
            'posted_by_photo' => 'nullable|string',
            'posted_by_department' => 'nullable|string', // Validate as email
            'posted_by_college' => 'nullable|string',
        ]);

        // Initialize the photo file name variable
        $photoFileName = null;

        // Handle photo upload if present
        if ($request->hasFile('photo')) {
            // Generate a unique name for the file
            $photoFileName =
                time() . '_' . $request->file('photo')->getClientOriginalName();

            // Define the upload path
            $destinationPath = public_path('upload/collegeposts');

            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move the uploaded file to the destination path
            $request->file('photo')->move($destinationPath, $photoFileName);
        }

        // Save post data into the database
        $post = CollegePost::create([
            'heading' => $request->heading,
            'photo' => $photoFileName, // Save only the file name
            'description' => $request->description,
            'like' => $request->like,
            'dislike' => $request->dislike,
            'comment' => $request->comment,
            'posted_by_name' => $request->posted_by_name,
            'posted_by_email' => $request->posted_by_email,
            'posted_by_photo' => $request->posted_by_photo,
            'posted_by_department' => $request->posted_by_department,
            'posted_by_college' => $request->posted_by_college,
        ]);

        if (!$post) {
            return back()->withErrors([
                'error' => 'Failed to save the post. Please try again.',
            ]);
        }

        // Create a success notification
        $notification = [
            'message' => 'New Post created successfully!',
            'alert-type' => 'success',
        ];

        // Redirect to the intended route with a success message
        return redirect()
            ->route('investigation_leader.dashboard')
            ->with($notification);
    }

    public function DepartmentHeadCollagePosts()
    {
        $post = CollegePost::all();
        return view('investigator.post.collegepost', compact('post'));
    }

    public function DepartmentHeadAddCollegePost()
    {
        return view('investigator.post.addcollegepost');
    }

    public function DepartmentHeadCollegePostStore(Request $request)
    {
        $request->validate([
            'heading' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate photo upload
            'description' => 'required|string',
            'like' => 'nullable|string',
            'dislike' => 'nullable|string',
            'comment' => 'nullable|string',
            'posted_by_name' => 'nullable|string|max:255',
            'posted_by_email' => 'nullable|email|max:255', // Validate as email
            'posted_by_photo' => 'nullable|string',
            'posted_by_department' => 'nullable|string', // Validate as email
            'posted_by_college' => 'nullable|string',
        ]);

        // Initialize the photo file name variable
        $photoFileName = null;

        // Handle photo upload if present
        if ($request->hasFile('photo')) {
            // Generate a unique name for the file
            $photoFileName =
                time() . '_' . $request->file('photo')->getClientOriginalName();

            // Define the upload path
            $destinationPath = public_path('upload/collegeposts');

            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move the uploaded file to the destination path
            $request->file('photo')->move($destinationPath, $photoFileName);
        }

        // Save post data into the database
        $post = CollegePost::create([
            'heading' => $request->heading,
            'photo' => $photoFileName, // Save only the file name
            'description' => $request->description,
            'like' => $request->like,
            'dislike' => $request->dislike,
            'comment' => $request->comment,
            'posted_by_name' => $request->posted_by_name,
            'posted_by_email' => $request->posted_by_email,
            'posted_by_photo' => $request->posted_by_photo,
            'posted_by_department' => $request->posted_by_department,
            'posted_by_college' => $request->posted_by_college,
        ]);

        if (!$post) {
            return back()->withErrors([
                'error' => 'Failed to save the post. Please try again.',
            ]);
        }

        // Create a success notification
        $notification = [
            'message' => 'New Post created successfully!',
            'alert-type' => 'success',
        ];

        // Redirect to the intended route with a success message
        return redirect()
            ->route('departmenthead.dashboard')
            ->with($notification);
    }

    public function AdminCollagePosts()
    {
        $post = CollegePost::all();
        return view('admin.post.collegepost', compact('post'));
    }

    public function AdminDeleteCollegePost($id)
    {
        CollegePost::findOrFail($id)->delete();

        $notification = [
            'message' => 'Post is Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()
            ->back()
            ->with($notification);
    }

    public function CommonCollegePost()
    {
        $post = CollegePost::all();
        return view('common.collegeposts.collegepost', compact('post'));
    }
    public function CommonCollegeAddPost()
    {
        return view('common.collegeposts.addcollegepost');
    }
    public function CommonCollegePostStore(Request $request)
    {
        $request->validate([
            'heading' => 'nullable|string|max:60',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate photo upload
            'description' => 'required|string|max:255',
            'like' => 'nullable|string',
            'dislike' => 'nullable|string',
            'comment' => 'nullable|string',
            'posted_by_name' => 'nullable|string|max:255',
            'posted_by_email' => 'nullable|email|max:255', // Validate as email
            'posted_by_photo' => 'nullable|string',
        ]);

        // Initialize the photo file name variable
        $photoFileName = null;

        // Handle photo upload if present
        if ($request->hasFile('photo')) {
            // Generate a unique name for the file
            $photoFileName =
                time() . '_' . $request->file('photo')->getClientOriginalName();

            // Define the upload path
            $destinationPath = public_path('upload/collegeposts');

            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move the uploaded file to the destination path
            $request->file('photo')->move($destinationPath, $photoFileName);
        }

        // Save post data into the database
        $post = CollegePost::create([
            'heading' => $request->heading,
            'photo' => $photoFileName, // Save only the file name
            'description' => $request->description,
            'like' => $request->like,
            'dislike' => $request->dislike,
            'comment' => $request->comment,
            'posted_by_name' => $request->posted_by_name,
            'posted_by_email' => $request->posted_by_email,
            'posted_by_photo' => $request->posted_by_photo,
        ]);

        if (!$post) {
            return back()->withErrors([
                'error' => 'Failed to save the post. Please try again.',
            ]);
        }

        // Create a success notification
        $notification = [
            'message' => 'New Post created successfully!',
            'alert-type' => 'success',
        ];

        // Redirect to the intended route with a success message
        return redirect()
            ->route('common.posts.collegepost')
            ->with($notification);
    }
    public function CommonEditCollegePost($id)
    {
        $types = CollegePost::findOrFail($id);
        return view('common.collegeposts.editcollegepost', compact('types'));
    }
    public function CommonUpdateCollegePost(Request $request)
    {
        $pid = $request->id;
        print $pid;
        $data = CollegePost::find($pid);
        $data->heading = $request->heading;
        $data->description = $request->description;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/collegeposts/' . $data->photo));
            $filename = date('ymdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/collegeposts'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = [
            'message' => 'Post is updated successfully',
            'alert-type' => 'success',
        ];
        return redirect()
            ->route('common.posts.collegepost')
            ->with($notification);
    }

    public function CommonDeleteCollegePost($id)
    {
        CollegePost::findOrFail($id)->delete();

        $notification = [
            'message' => 'Post is Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()
            ->back()
            ->with($notification);
    }

    //
}
