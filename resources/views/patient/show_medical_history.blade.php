@extends('layouts.profile')

@section('content')
     <div class="content">

        @php
            $firstName=$lastName=$relationship=$phonenumber="Not filled";
            $height=$weight=$medicalProblems=$allergies=$medication="Not filled";
            if ($medicalHistory!=null) {
                $height = $medicalHistory->height;
                $weight = $medicalHistory->weight;
                $medicalProblems = $medicalHistory->medical_problems;
                $allergies = $medicalHistory->allergies;
                $medication = $medicalHistory->medication;
            }
            if ($emergencyContact!=null) {
                $firstName=$emergencyContact->first_name;
                $lastName=$emergencyContact->last_name;
                $relationship=$emergencyContact->relationship;
                $phonenumber=$emergencyContact->phone_number;
            }
        @endphp
            <div class="container-box">
                <center><h1>Medical History</h1></center>
                <div class="list">
                    <p class="key">Height</p>
                    <p class="value">{{$height}}</p>
                </div> 
                <div class="list">
                    <p class="key">Weight</p>
                    <p class="value">{{$weight}}</p>
                </div> 
                <div class="list">
                    <p class="key">Medical Problem</p>
                    <p class="value">{{$medicalProblems}}
                    </p>
                </div> 
                <div class="list">
                    <p class="key">Allergies</p>
                    <p class="value">{{$allergies}}
                    </p>
                </div> 
                <div class="list">
                    <p class="key">Medication</p>
                    <p class="value">{{$medication}} </p>
                </div> 
                
            </div>
        
            <div class="container-box">
                <center><h1>Emergency Contact</h1></center>
                <div class="list">
                    <p class="key">First Name</p>
                    <p class="value">{{$firstName}}</p>
                </div> 
                <div class="list">
                    <p class="key">Last Name</p>
                    <p class="value">{{$lastName}}</p>
                </div> 
                <div class="list">
                    <p class="key">Relationship</p>
                    <p class="value">{{$relationship}}
                    </p>
                </div> 
                <div class="list">
                    <p class="key">Phone Number</p>
                    <p class="value">{{$phonenumber}} 
                    </p>
                </div> 
                
            </div>
            <div class="button-box">
            <a href={{ route('medicalHistoryEdit')}} class="btn btn-primary" type="button">Edit Medical History</a>
            <a href={{ route('home')}} class="btn btn-primary" type="button" >Back to Homepage</a>
            </div>
        </div>
    
    @endsection

