<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use Facade\FlareClient\Glows\Recorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalRecordController extends Controller
{
    //
    public function show(){
        $medicalRecords = MedicalRecord::where('patient_id',Auth::id())->get();
        return view('patient.show_medical_record')->with(["medicalRecords" => $medicalRecords]);
    }

    public function save(Request $request){

        $request->validate([
            'temperature' => 'required',
            'pulse_rate' => 'required',
            'respiration_rate' => 'required',
            'blood_pressure' => 'required',
            'symptoms' => 'required',
            'condition_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);


        $user_id= Auth::id();
        $rows= MedicalRecord::where('patient_id',$user_id)->get();
        $record_number = $rows == null? 0:count($rows);

        $medicalRecord= new MedicalRecord();
        $medicalRecord->temperature= $request->temperature;
        $medicalRecord->pulse_rate= $request->pulse_rate;
        $medicalRecord->respiration_rate= $request->respiration_rate;
        $medicalRecord->blood_pressure= $request->blood_pressure;
        $medicalRecord->symptoms= $request->symptoms;
        $medicalRecord->patient_id= $user_id;
        
        //storing Image in the public directory
        $image= $request->file('condition_image');
       
        if($image){
            $imageExtension = $image->extension();
            $imageName = "medical_record_image".$user_id.$record_number.'.'.$imageExtension;
            $path=$image->storeAs('medicalRecordPhotos',$imageName,'public');
            $medicalRecord->condition_image_path= $imageName;
        }

        $medicalRecord->save();


        return view('patient.add_medical_record',["medicalRecord"=>$medicalRecord, "successMessage"=>"Medical Record added Successfully"]);
        //return redirect('/medicalRecordNew')->with();
    }

    public function add(){
        return view('patient.add_medical_record');
    }
}
