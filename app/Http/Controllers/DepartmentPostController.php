<?php

namespace App\Http\Controllers;
use App\Models\DepartmentPost;

use Illuminate\Http\Request;

class DepartmentPostController extends Controller
{
    public function CollegeDeanDepartmentposts()
    {
        $post = DepartmentPost::all();
        return view('investigation_leader.post.departmentpost', compact('post'));
    }

    public function CollegeDeanAddDepartmentPost()
    {
        return view('common.posts.adddepartmentpost');
    }

    public function CollegeDeanDepartmentPostStore(Request $request)
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
        $post = DepartmentPost::create([
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
            ->route('collagedean.dashboard')
            ->with($notification);
    }

    public function DepartmentHeadDepartmentposts()
    {
        $post = DepartmentPost::all();
        return view('common.departmentposts.departmentpost', compact('post'));
    }
    public function CommonDepartmentposts()
    {
        $post = DepartmentPost::all();
        return view('common.departmentposts.departmentpost', compact('post'));
    }

    public function DepartmentHeadAddDepartmentPost()
    {
        return view('investigator.post.adddepartmentpost');
    }
    public function CommonAddDepartmentPost()
    {
        return view('common.departmentposts.adddepartmentpost');
    }
    public function CommonDepartmentPostStore(Request $request)
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
            $destinationPath = public_path('upload/departmentposts');

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
            ->route('common.posts.departmentpost')
            ->with($notification);
    }

    public function DepartmentHeadDepartmentPostStore(Request $request)
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
            $destinationPath = public_path('upload/departmentposts');

            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move the uploaded file to the destination path
            $request->file('photo')->move($destinationPath, $photoFileName);
        }

        // Save post data into the database
        $post = DepartmentPost::create([
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
            ->route('common.posts.departmentpost')
            ->with($notification);
    }

    public function StuffDepartmentPosts()
    {
        $post = DepartmentPost::all();
        return view('stuff.post.departmentpost', compact('post'));
    }
    //

    public function AdminDepartmentPosts()
    {
        $post = DepartmentPost::all();
        return view('common.departmentposts.departmentpost', compact('post'));
    }
    public function AdminDeleteDepartmentPost($id)
    {
        DepartmentPost::findOrFail($id)->delete();

        $notification = [
            'message' => 'Post is Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()
            ->back()
            ->with($notification);
    }
    public function CommonDeleteDepartmentPost($id)
    {
        DepartmentPost::findOrFail($id)->delete();

        $notification = [
            'message' => 'Post is Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()
            ->back()
            ->with($notification);
    }

    public function AdminEditDepartmentPost($id)
    {
        $types = DepartmentPost::findOrFail($id);
        return view(
            'common.departmentposts.editdepartmentpost',
            compact('types')
        );
    }
    public function CommonEditDepartmentPost($id)
    {
        $types = DepartmentPost::findOrFail($id);
        return view(
            'common.departmentposts.editdepartmentpost',
            compact('types')
        );
    }

    public function AdminUpdateDepartmentPost(Request $request)
    {
        $pid = $request->id;
        print $pid;
        $data = DepartmentPost::find($pid);
        $data->heading = $request->heading;
        $data->description = $request->description;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/departmentposts/' . $data->photo));
            $filename = date('ymdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/departmentposts'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = [
            'message' => 'Post is updated successfully',
            'alert-type' => 'success',
        ];
        return redirect()
            ->route('common.posts.departmentpost')
            ->with($notification);
    }
    public function CommonUpdateDepartmentPost(Request $request)
    {
        $pid = $request->id;
        print $pid;
        $data = DepartmentPost::find($pid);
        $data->heading = $request->heading;
        $data->description = $request->description;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/departmentposts/' . $data->photo));
            $filename = date('ymdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/departmentposts'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = [
            'message' => 'Post is updated successfully',
            'alert-type' => 'success',
        ];
        return redirect()
            ->route('common.posts.departmentpost')
            ->with($notification);
    }
}
