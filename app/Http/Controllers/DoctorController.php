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
        $patients= User::whereHas('roles', function($role) {
            $role->where('name', '=', 'patient');
        })->count();

        $doctors= User::whereHas('roles', function($role) {
            $role->where('name', '=', 'doctor');
        })->count();

        $nurses= User::whereHas('roles', function($role) {
            $role->where('name', '=', 'nurse');
        })->count();

        $medicalRecords= MedicalRecord::where('doctor_response_id',null)->get();
        $waitingPatientsId= array();

        foreach ($medicalRecords as $medicalRecord) {
            if (!in_array($medicalRecord->patient_id, $waitingPatientsId)) {
                array_push($waitingPatientsId,$medicalRecord->patient_id);
            }
        }
        $waitingPatients= count($waitingPatientsId);

        return view('doctors/doctor_landing',compact('patients','waitingPatients','nurses','doctors'));
    }

    public function patients(){
        //retrieve patients from the db using the role as a patient
        $patients= User::whereHas('roles', function($role) {
            $role->where('name', '=', 'patient');
        })->get();

        return view('doctors/patients' , ['patients' => $patients]);
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

    public function profile()
    {
        $user=Auth::user();
        return view('doctors/profile', compact('user'));

    }

    public function doctor_profile()
    {
        $user=Auth::user();
        return view('doctors/doctor_profile', compact('user'));
    }

    public function medicalHistory($patient_id){

        $medicalHistory = MedicalHistory::where('patient_id','=',$patient_id)->first();
        $emergencyContact = $medicalHistory==null? null:EmergencyContact::find($medicalHistory->emergency_contact_id);
        return view('doctors.medical_history',['medicalHistory'=>$medicalHistory, 'emergencyContact'=>$emergencyContact,'patient_id'=>$patient_id]);
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

    public function AddMedicalHistory($patientId){
        return view('doctors.edit_medical_history',['patientId'=>$patientId]);
    }

    public function UpdateMedicalHistory(Request $request){
        $id= $request->id;
        $medicalHistory = MedicalHistory::find($id);
        $medicalHistory->weight= $request->weight;
        $medicalHistory->height= $request->height;
        $medicalHistory->medication= $request->medication;
        $medicalHistory->medical_problems= $request->medical_problems;
        $medicalHistory->allergies= $request->allergies;
        $medicalHistory->update();

        return view('doctors.medical_history', ['medicalHistory'=>$medicalHistory, 'succesMessage'=>"Medical History successfully updated"]);
//        return redirect('/showMedicalHistory/{id}')->with('success', 'Profile has been updated!');

    }

    public function SaveMedicalHistory(Request $request){
        $id= $request->id;
        $medicalHistory = new MedicalHistory();
        $medicalHistory->weight= $request->weight;
        $medicalHistory->height= $request->height;
        $medicalHistory->medication= $request->medication;
        $medicalHistory->medical_problems= $request->medical_problems;
        $medicalHistory->allergies= $request->allergies;
        $medicalHistory->patient_id= $request->id;
        $medicalHistory->save();

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

        return view('doctors.update_medical_record', ['medicalRecord'=>$medicalRecord, 'doctorResponse'=>$doctorResponse, 'succesMessage'=>"Medical Record successfully updated"]);
    }

    public function updateDoctor(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone_number'=>'required',
            'profile_photo'=>'required',
        ]);

        //storing Image in the public directory
        $photo= $request->file('profile_photo');
        $user_id = Auth::id();
        if($photo){
            $imageExtension = $photo->extension();
            $photoName = "profile_image".$user_id.'.'.$imageExtension;
            $path=$photo->storeAs('profilePhotos',$photoName,'public');
            $user->profile_photo = $photoName;
        }

        $user->id=$id;
        $user->name =  $request->get('name');
        $user->email = $request->get('email');
        $user->phone_number = $request->get('phone_number');
        $user->update();

        return redirect('/profile')->with('success', 'Profile has been updated!');
    }

}
