<?php

namespace App\Http\Controllers;

use App\Models\SendToInvestigatorLeader;

use Illuminate\Http\Request;

class SendToInvestigatorLeaderController extends Controller
{

    public function SentInvestigationReportToLeader(Request $request)
    {
        $request->validate([
            'full_name' => 'nullable',
            'age' => 'nullable',
            'gender' => 'nullable',
            'personal_photo' => 'nullable|image',
            'interview' => 'nullable',
            'dna_evidence' => 'nullable|image',
            'forensic_evidence' => 'nullable|image',
            'clinical_report' => 'nullable|image',
        
        ]);

        // Handle photo upload
        $personal_photoPath = null;
        if ($request->hasFile('personal_photo')) {
            $file = $request->file('personal_photo');
            $filename = date('YmdHis') . '_' . $file->getClientOriginalName(); // Unique filename
            $path = public_path('upload/suspect_info/');

            // Create directory if it doesn't exist
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $file->move($path, $filename);
            $personal_photoPath = $filename;
        }

        $dna_evidencePath = null;
        if ($request->hasFile('dna_evidence')) {
            $file = $request->file('dna_evidence');
            $filename = date('YmdHis') . '_' . $file->getClientOriginalName(); // Unique filename
            $path = public_path('upload/suspect_info/');

            // Create directory if it doesn't exist
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $file->move($path, $filename);
            $dna_evidencePath = $filename;
        }

        $forensic_evidencePath = null;
        if ($request->hasFile('forensic_evidence')) {
            $file = $request->file('forensic_evidence');
            $filename = date('YmdHis') . '_' . $file->getClientOriginalName(); // Unique filename
            $path = public_path('upload/suspect_info/');

            // Create directory if it doesn't exist
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $file->move($path, $filename);
            $forensic_evidencePath = $filename;
        }

        $clinical_reportPath = null;
        if ($request->hasFile('clinical_report')) {
            $file = $request->file('clinical_report');
            $filename = date('YmdHis') . '_' . $file->getClientOriginalName(); // Unique filename
            $path = public_path('upload/suspect_info/');

            // Create directory if it doesn't exist
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $file->move($path, $filename);
            $clinical_reportPath = $filename;
        }

        // Create user with personal_photo path
        SendToInvestigatorLeader::create([
            'full_name' => $request->full_name,
            'age' => $request->age,
            'gender' => $request->gender,
            
            'personal_photo' => $personal_photoPath,
            
            'interview' => $request->interview,
            'dna_evidence' => $request->dna_evidence,
            'forensic_evidence' => $request->forensic_evidence,
            'clinical_report' => $request->clinical_report,
            
        ]);

        $notification = [
            'message' => 'Sent successfully',
            'alert-type' => 'success',
        ];
        return redirect()
            ->route('Investigator.dashboard')
            ->with($notification);
    }
    //
}
