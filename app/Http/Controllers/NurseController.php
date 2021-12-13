<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalHistory;
use App\Models\MedicalRecord;
use App\Models\User;
use App\Models\EmergencyContact;
use Illuminate\Support\Facades\Auth;

class NurseController extends Controller
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

        return view('nurses/nurse_landing',compact('patients','waitingPatients','nurses','doctors'));
    }

    public function showProfile(User $user)
    {
        $user=Auth::user();
        return view('patient.show', compact('user'));
    }

    public function editProfile(User $user)
    {
//        $user=Auth::user();
//        return view('patient.edit', compact('user'));

        $id=Auth::id();

        $user = User::where('id','=',$id)->first();
        return view('nurses.edit_profile',['user'=>$user]);
    }
    public function updateProfile(Request $request)
    {
//        $id=  Auth::id();
        $user = User::find(Auth::id()) ;
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone_number'=>'required',
            'profile_photo'=>'required',
            'city'=>'required',
            'date_of_birth'=>'required'
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

        $user->name =  $request->get('name');
        $user->email = $request->get('email');
        $user->date_of_birth = $request->get('date_of_birth');
        $user->phone_number = $request->get('phone_number');
        $user->city = $request->get('city');
        $user->save();

        return redirect('/nurseEditProfile')->with('successMessage', 'Profile has been updated!');
    }
    public function getpatient(){
        //retrieve patients from the db using the role as a patient
        $patients= User::whereHas('roles', function($role) {
            $role->where('name', '=', 'patient');
        })->get();
       
        return view('nurses/patients' , ['patients' => $patients]);
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
        
        return view('nurses/patients_waiting', ["waitingPatients"=>$waitingPatients]);
    }

    public function medicalHistory($patient_id){

        $medicalHistory = MedicalHistory::where('patient_id','=',$patient_id)->first();
        $emergencyContact = $medicalHistory== null? null: EmergencyContact::find($medicalHistory->emergency_contact_id);
        return view('nurses.medical_history',['medicalHistory'=>$medicalHistory, 'emergencyContact'=>$emergencyContact,'patientId'=>$patient_id]);
    }

    public function medicalRecord($patient_id){
        //dd()
        $medicalRecords= MedicalRecord::where('patient_id',$patient_id)->get();
        return view('nurses.medical_record',['medicalRecords'=>$medicalRecords]);
    }

    public function editMedicalHistory($medicalHistoryId,Request $request){
        $medicalHistory = MedicalHistory::find($medicalHistoryId);
        $emergencyContact = EmergencyContact::find($medicalHistory->emergency_contact_id);
        return view('nurses.edit_medical_history',['medicalHistory'=>$medicalHistory,'emergencyContact'=>$emergencyContact]);
    }

    public function addMedicalHistory($patientId,Request $request){
        return view('nurses.edit_medical_history',['patientId'=>$patientId]);
    }
    public function updateMedicalHistory(Request $request){
        $id= $request->id;
        $medicalHistory = MedicalHistory::find($id);
        $emergencyContact= EmergencyContact::find($medicalHistory->emergency_contact_id);
        $emergencyContact->first_name =$request->first_name;
        $emergencyContact->last_name =$request->last_name;
        $emergencyContact->relationship =$request->relationship;
        $emergencyContact->phone_number =$request->phonenumber;
        $emergencyContact->save();

        $medicalHistory->weight= $request->weight;
        $medicalHistory->height= $request->height;
        $medicalHistory->medication= $request->medication;
        $medicalHistory->medical_problems= $request->medical_problems;
        $medicalHistory->allergies= $request->allergies;
        $medicalHistory->update();

        return view('nurses.edit_medical_history', ['medicalHistory'=>$medicalHistory, 'emergencyContact'=>$emergencyContact, 'succesMessage'=>"Medical History successfully updated"]);
    }

    public function saveMedicalHistory(Request $request){
        
        $emergencyContact= new EmergencyContact();
        $emergencyContact->first_name =$request->first_name;
        $emergencyContact->last_name =$request->last_name;
        $emergencyContact->relationship =$request->relationship;
        $emergencyContact->phone_number =$request->phonenumber;
        $emergencyContact->save();
        
        $medicalHistory = new MedicalHistory();
        $medicalHistory->weight= $request->weight;
        $medicalHistory->height= $request->height;
        $medicalHistory->medication= $request->medication;
        $medicalHistory->medical_problems= $request->medical_problems;
        $medicalHistory->allergies= $request->allergies;
        $medicalHistory->emergency_contact_id= $emergencyContact->id;
        $medicalHistory->patient_id= $request->id;
        $medicalHistory->save();

       
        return redirect('/editMedicalHistory/'.$medicalHistory->id)->with('medicalHistory',$medicalHistory)->with('emergencyContact',$emergencyContact)->with( 'succesMessage',"Medical History successfully updated");
    }

    public function vitalspage(){

        //access the vitals page
         return view('nurses/vitals');
     }

     public function getpatientMedicalHistory($patient_id){
        $medicalHistory = MedicalHistory::where('patient_id','=',$patient_id)->first();
        $emergencyContact = EmergencyContact::find($medicalHistory->emergency_contact_id);
        return view('nurses/history',['medicalHistory'=>$medicalHistory, 'emergencyContact'=>$emergencyContact]);         
     }
     public function editPatientData($id){
         //find user by id
        $user =  User::find($id);
        return view('nurses/edit_patient_data' , ['data' => $user]);

     }
     public function emergency_contact($id){
        $user =  EmergencyContact::find($id);
        
        return view('nurses/emergency_contacts', ['values' => $user]);

     }
     public function trainFace(){
         
        return view('nurses/nurse_train_face');
    }
    

     public function updatePatientMedicalData(Request $request){
         //find user by id then update their details
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->city = $request->city;
        $user->phone_number = $request->phone_number;
        $user->update();
       
        //get patients only
        $patients= User::whereHas('roles', function($role) {
            $role->where('name', '=', 'patient');
        })->get();
        return view('nurses/patients' , ['values' => $patients]);

     }

     public function editPatientHistory($id){
        //redirect to edit page
        $user =  MedicalHistory::find($id);

        //dd($user);
        return view('nurses/edit_medical_history' , ['data' => $user]);
     }


     public function insertPatientMedicalHistory(){

        //access the Patient Medical History page
         return view('nurses/patientsdata');
     }

    public function vitals(Request $request) {
        
        //Insert vitals into the database
        $user = new MedicalRecord();
        $user->patient_id = $request->input('id');
      //  $user->name = $request->input('name');
        $user->pulse_rate = $request->input('pulse_rate');
        $user->respiration_rate = $request->input('respiration_rate');
        $user->temperature = $request->input('temperature');
        $user->blood_pressure = $request->input('bpm');
        $user->symptoms = $request->input('symptoms'); 
        $user->save();
        return view('nurses/vitals',["succesMessage"=>"Vital added successfully"]);
    }

    public function patientProfile(){
        return view('nurses.nurse_profile');
    }
    public function updatePatientProfile(Request $request){
        //storing Image in the public directory
        $photo= $request->file('profile_photo');
        $user_id= $request->patient_id;
        // dd($user_id);
        $user= User::find($user_id);
        if($photo){
            $imageExtension = $photo->extension();
            $photoName = "profile_image".$user_id.'.'.$imageExtension;
            $path=$photo->storeAs('profilePhotos',$photoName,'public');
            $user->profile_photo = $photoName;
        }

        $user->name =  $request->name;
        $user->email = $request->get('email');
        $user->date_of_birth = $request->get('date_of_birth');
        $user->phone_number = $request->get('phone_number');
        $user->city = $request->get('city');
        $user->save();

        return redirect('/patientProfile')->with('successMessage', 'Profile has been updated!')->with('user',$user);
    }
}
