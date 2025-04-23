<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Report;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class InvestigatorLeaderController extends Controller
{
    public function InvestigatorLeaderDashboard()
    {

        return view('investigation_leader.index');
    }

    public function InvestigatorLeaderLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function InvestigatorLeaderLogin()
    {
        return view('login');
    }

    public function InvestigatorLeaderProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view(
            'investigation_leader.investigation_leader_profile_view',
            compact('profileData')
        );
    }

    public function InvestigatorLeaderProfileStore(Request $request)
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

    public function InvestigatorLeaderChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view(
            'investigation_leader.investigation_leader_change_password',
            compact('profileData')
        );
    }

    public function InvestigatorLeaderUpdatePassword(Request $request)
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



    public function InvestigatorLeaderShowMember()
    {
        $types = User::latest()->get();
        return view('investigation_leader.showmember', compact('types'));
    }

    public function InvestigatorLeaderShowCriminalReport()
    {
        $types = Report::latest()->get();
        return view('admin.criminalreport', compact('types'));
    }

    //
}
