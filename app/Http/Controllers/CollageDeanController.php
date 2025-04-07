<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class CollageDeanController extends Controller
{
    public function CollageDeanDashboard()
    {
        dd(resource_path('views/investigation_leader.index')); // Check if file exists

        return view('investigation_leader.index');
    }

    public function CollageDeanLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function CollageDeanLogin()
    {
        return view('login');
    }

    public function CollageDeanProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view(
            'investigation_leader.investigation_leader_profile_view',
            compact('profileData')
        );
    }

    public function CollageDeanProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $data->photo));
            $filename = date('ymdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_image'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = [
            'message' => 'investigation_leader profile Update Successfully',
            'alert-type' => 'success',
        ];
        return redirect()
            ->back()
            ->with($notification);
    }

    public function CollageDeanChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view(
            'investigation_leader.investigation_leader_change_password',
            compact('profileData')
        );
    }

    public function CollageDeanUpdatePassword(Request $request)
    {
        if (!Hash::check($request->old_password, auth::user()->password)) {
            $notification = [
                'message' => 'Old Password does not match',
                'alert-type' => 'error',
            ];
            return back()->with($notification);
        }
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        $notification = [
            'message' => 'Password Change Successfully',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    public function CollagedeanChat()
    {
        return view('investigation_leader.collagedeanchat');
    }
    public function CollagedeanPosts()
    {
        return view('investigation_leader.posts');
    }

    public function CollegeDeanShowMember()
    {
        $types = User::latest()->get();
        return view('investigation_leader.showmember', compact('types'));
    }

    //
}
