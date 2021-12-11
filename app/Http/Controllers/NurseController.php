<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalHistory;
use App\Models\MedicalRecord;
use App\Models\User;
use App\Models\EmergencyContact;

class NurseController extends Controller
{
    public function index()
    {
        return view('/home');
    }

    
    public function getpatient(){
        //retrieve patients from the db using the role as a patient
        $patients= User::whereHas('roles', function($role) {
            $role->where('name', '=', 'patient');
        })->get();
       
        return view('nurses/patients' , ['values' => $patients]);
    }
    public function vitalspage(){

        //access the vitals page
         return view('nurses/vitals');
     }

     public function getpatientMedicalHistory(){
         //get medical records 
        $user = MedicalHistory::all();
        //get emergency contact
        $data = EmergencyContact::all();
        return view('nurses/history' , ['values' => $user,'data' => $data,]);
        
         
     }
     public function editPatientData($id){
         //find user by id
        $user =  User::find($id);
        return view('nurses/edit_patient_data' , ['data' => $user]);

     }

     public function updatePatientMedicalData(Request $request){
         //find user by id then update their details
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->city = $request->city;
        $user->phone_number = $request->phone_number;
        $user->update();
        $user =  User::all();
        return view('nurses/patients' , ['values' => $user]);

     }

     public function editPatientHistory($id){
        //redirect to edit page
        $user =  MedicalHistory::find($id);
        return view('nurses/edit_medical_history' , ['data' => $user]);
     }
    
     public function updatePatientMedicalHistory(Request $request){
         //find medicalhistory using id then update the record for that patient
        $user = MedicalHistory::find($request->id);
        $user->weight=$request->weight;
        $user->height=$request->height;
        $user->allergies=$request->allergies;
        $user->medication=$request->medication;
        $user->medical_problems=$request->medical_problems;
        $user->update();
        //get all emergency contancts and users
        $data = EmergencyContact::all();
        $user =  MedicalHistory::all();
 
       
 
        return view('nurses/history' , ['values' => $user,'data' => $data]);

     }

     public function insertPatientMedicalHistory(){

        //access the Patient Medical History page
         return view('nurses/patientsdata');
     }

     public function createPatientMedicalHistory(Request $request){
         //Inssert data for medical histories
        $user = new MedicalHistory();
        //$user->id = $request->input('id');
        $user->weight = $request->input('weight');
        $user->height = $request->input('height');
        $user->medical_problems= $request->input('medical_problems');
        $user->allergies = $request->input('allergies');
        $user->medication = $request->input('medication');
        $user->emergency_contact_id = $request->input('id');
        $user->patient_id = $request->input('id');
        $user->save();
        //insert data for emergency contact
        $data = new EmergencyContact();
        $data->patient_id = $request->input('id');
        $data->first_name = $request->input('first_name');
        $data->last_name = $request->input('last_name');
        $data->relationship = $request->input('relationship');
        $data->phone_number = $request->input('phone_number');
        $data->save(); 
        return view('nurses/patientsdata');


     }
    public function vitals(Request $request) {
        
        //Insert vitals into the database
        $user = new MedicalRecord();
        $user->patients_id = $request->input('id');
      //  $user->name = $request->input('name');
        $user->pulse_rate = $request->input('pulse_rate');
        $user->respiration_rate = $request->input('respiration_rate');
        $user->temperature = $request->input('temperature');
        $user->blood_pressure = $request->input('bpm');
        $user->symptoms = $request->input('symptoms'); 
        $user->save();
        return view('nurses/vitals');
        

    }
}
