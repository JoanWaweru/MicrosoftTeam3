<?php

namespace App\Http\Controllers;

use App\Models\DoctorResponse;
use App\Models\MedicalHistory;
use App\Models\MedicalRecord;
use App\Models\EmergencyContact;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index()
    {
        return view('doctors/doctor_landing');
    }

    public function patients(){
        $patients= User::whereHas('roles', function($role) {
            $role->where('name', '=', 'patient');
        })->get();
        
        return view('doctors/patients',compact('patients'));
    }

    public function patientsWaiting(){
        $medicalRecords= MedicalRecord::where('doctor_response_id',null)->get();
        $waitingPatientsId= array();
        $waitingPatients= array();
        foreach ($medicalRecords as $medicalRecord) {
            if (!in_array($medicalRecord->patient_id, $waitingPatientsId)) {
                array_push($waitingPatients,User::find($medicalRecord->patient_id));
                array_push($waitingPatientsId,$medicalRecord->patient_id);
            }
        }
        
        return view('doctors/patients_waiting', ["waitingPatients"=>$waitingPatients]);
    }

    public function vitals(){
        return view('doctors/vitals');
    }
    
    public function history(){
        return view('doctors/history');
    }

    public function medicalHistory($patient_id){

        $medicalHistory = MedicalHistory::where('patient_id','=',$patient_id)->first();
        $emergencyContact = $medicalHistory==null? null:EmergencyContact::find($medicalHistory->emergency_contact_id);
        return view('doctors.medical_history',['medicalHistory'=>$medicalHistory, 'emergencyContact'=>$emergencyContact]);
    }

    public function medicalRecord($patient_id){
        //dd()
        $medicalRecords= MedicalRecord::where('patient_id',$patient_id)->get();
        return view('doctors.medical_record',['medicalRecords'=>$medicalRecords]);
    }

    public function editMedicalHistory($medicalHistoryId,Request $request){
        $medicalHistory = MedicalHistory::find($medicalHistoryId);
        return view('doctors.edit_medical_history',['medicalHistory'=>$medicalHistory]);
    }
    public function updateMedicalHistory(Request $request){
        $id= $request->id;
        $medicalHistory = MedicalHistory::find($id);
        $medicalHistory->weight= $request->weight;
        $medicalHistory->height= $request->height;
        $medicalHistory->medication= $request->medication;
        $medicalHistory->medical_problems= $request->medical_problems;
        $medicalHistory->allergies= $request->allergies;
        $medicalHistory->update();

        return view('doctors.edit_medical_history', ['medicalHistory'=>$medicalHistory, 'succesMessage'=>"Medical History successfully updated"]);
    }

    

    public function editMedicalRecord($medicalRecordId,Request $request){
        $medicalRecord = MedicalRecord::find($medicalRecordId);
        return view('doctors.update_medical_record',['medicalRecord'=>$medicalRecord]);
    }
    public function updateMedicalRecord(Request $request){
        $id= $request->id;
        $medicalRecord = MedicalRecord::find($id);
        $doctorResponse = new DoctorResponse();
        $doctorResponse->doctor_id= Auth::id();
        $doctorResponse->prescription= $request->prescription;
        $doctorResponse->diagnosis= $request->diagnosis;
        $doctorResponse->comment= $request->comment;
        $doctorResponse->save();
        $medicalRecord->doctor_response_id=$doctorResponse->id; 
        $medicalRecord->update();

        return view('doctors.update_medical_record', ['medicalHistory'=>$medicalRecord, 'succesMessage'=>"Medical History successfully updated"]);
    }
    
}
