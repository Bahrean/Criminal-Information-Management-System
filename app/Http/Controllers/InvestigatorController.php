<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class InvestigatorController extends Controller
{
    public function InvestigatorDashboard()
    {
        return view('investigator.index');
    }

    public function InvestigatorLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function InvestigatorLogin()
    {
        return view('login');
    }

    public function InvestigatorProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view(
            'investigator.investigator_profile_view',
            compact('profileData')
        );
    }

    public function InvestigatorShowMember()
    {
        $types = User::latest()->get();
        return view('investigator.showmember', compact('types'));
    }

    public function InvestigatorProfileStore(Request $request)
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

    public function InvestigatorChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view(
            'investigator.investigator_change_password',
            compact('profileData')
        );
    }

    public function InvestigatorUpdatePassword(Request $request)
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




    //
}
