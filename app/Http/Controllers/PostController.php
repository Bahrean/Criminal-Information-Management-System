<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function AdminPosts2()
    {
        $post = Post::all();
        return view('common.posts.post', compact('post'));
    }

    public function AdminPostComment($post)
    {
        $post = Post::findOrFail($post);
        return view('admin.post.comment', compact('post'));
    }

    public function AdminAddPost()
    {
        return view('common.posts.addpost');
    }
    public function CommonAddPost()
    {
        return view('common.posts.addpost');
    }

    public function AdminPostStore(Request $request)
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
            $destinationPath = public_path('upload/posts');

            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move the uploaded file to the destination path
            $request->file('photo')->move($destinationPath, $photoFileName);
        }

        // Save post data into the database
        $post = Post::create([
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
            ->route('common.posts.post')
            ->with($notification);
    }
    public function CommonPostStore(Request $request)
    {
        $request->validate([
            'heading' => 'nullable|string|max:255',
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
            $destinationPath = public_path('upload/posts');

            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move the uploaded file to the destination path
            $request->file('photo')->move($destinationPath, $photoFileName);
        }

        // Save post data into the database
        $post = Post::create([
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
            ->route('common.posts.post')
            ->with($notification);
    }

    public function AdminEditPost($id)
    {
        $types = Post::findOrFail($id);
        return view('common.posts.editpost', compact('types'));
    }
    public function CommonEditPost($id)
    {
        $types = Post::findOrFail($id);
        return view('common.posts.editpost', compact('types'));
    }

    // public function AdminProfileStore(Request $request)
    // {
    //     $id = Auth::user()->id;
    //     $data = User::find($id);
    //     $data->heading = $request->heading;
    //     $data->description = $request->description;

    //     if ($request->file('photo')) {
    //         $file = $request->file('photo');
    //         @unlink(public_path('upload/posts/' . $data->photo));
    //         $filename = date('ymdHi') . $file->getClientOriginalName();
    //         $file->move(public_path('upload/posts'), $filename);
    //         $data['photo'] = $filename;
    //     }

    //     $data->save();

    //     $notification = [
    //         'message' => 'Admin profile updated successfully',
    //         'alert-type' => 'success',
    //     ];
    //     return redirect()
    //         ->back()
    //         ->with($notification);
    // }
    public function AdminUpdatePost(Request $request)
    {
        $pid = $request->id;
        print $pid;
        $data = Post::find($pid);
        $data->heading = $request->heading;
        $data->description = $request->description;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/posts/' . $data->photo));
            $filename = date('ymdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/posts'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = [
            'message' => 'Post is updated successfully',
            'alert-type' => 'success',
        ];
        return redirect()
            ->route('admin.posts2')
            ->with($notification);
    }
    public function CommonUpdatePost(Request $request)
    {
        $pid = $request->id;
        print $pid;
        $data = Post::find($pid);
        $data->heading = $request->heading;
        $data->description = $request->description;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/posts/' . $data->photo));
            $filename = date('ymdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/posts'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = [
            'message' => 'Post is updated successfully',
            'alert-type' => 'success',
        ];
        return redirect()
            ->route('common.posts.post')
            ->with($notification);
    }

    public function AdminDeletePost($id)
    {
        Post::findOrFail($id)->delete();

        $notification = [
            'message' => 'Post is Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()
            ->back()
            ->with($notification);
    }
    public function CommonDeletePost($id)
    {
        Post::findOrFail($id)->delete();

        $notification = [
            'message' => 'Post is Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()
            ->back()
            ->with($notification);
    }

    public function CollegeDeanPosts()
    {
        $post = Post::all();
        return view('collagedean.posts', compact('post'));
    }

    public function DepartmentHeadPosts()
    {
        $post = Post::all();
        return view('department_head.posts', compact('post'));
    }

    public function DepartmentHeadAddPost()
    {
        return view('department_head.post.addpost');
    }

    public function DepartmentHeadPostStore(Request $request)
    {
        $request->validate([
            'heading' => 'nullable|string|max:255',
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
            $destinationPath = public_path('upload/posts');

            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move the uploaded file to the destination path
            $request->file('photo')->move($destinationPath, $photoFileName);
        }

        // Save post data into the database
        $post = Post::create([
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
            ->route('departmenthead.posts')
            ->with($notification);
    }

    public function DepartmentHeadEditPost($id)
    {
        $types = Post::findOrFail($id);

        return view('department_head.post.editpost', compact('types'));
    }
    public function DepartmentHeadUpdatePost(Request $request)
    {
        $pid = $request->id;
        print $pid;
        $data = Post::find($pid);
        $data->heading = $request->heading;
        $data->description = $request->description;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/posts/' . $data->photo));
            $filename = date('ymdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/posts'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = [
            'message' => 'Post is updated successfully',
            'alert-type' => 'success',
        ];
        return redirect()
            ->route('department_head.posts')
            ->with($notification);
    }

    public function DepartmentHeadDeletePost($id)
    {
        Post::findOrFail($id)->delete();

        $notification = [
            'message' => 'Post is Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()
            ->back()
            ->with($notification);
    }

    public function StuffPosts()
    {
        $post = Post::all();
        return view('stuff.posts', compact('post'));
    }

    public function StuffCollagePosts()
    {
    }

    public function updateFeedback(Post $post, $action)
    {
        if ($action === 'like') {
            $post->increment('like');
        } elseif ($action === 'dislike') {
            $post->increment('dislike');
        }

        return response()->json([
            'success' => true,
            'like' => $post->like,
            'dislike' => $post->dislike,
        ]);
    }
    //
}
