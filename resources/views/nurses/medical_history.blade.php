@extends('layouts.doctor')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/doctor_landing">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
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
                   @if ($medicalHistory!=null)
                   <a href={{ route('editMedicalHistory',['id'=>$medicalHistory->id])}} class="btn btn-primary" type="button">Edit Medical History</a>
                   @else
                   <a href={{ route('addMedicalHistory',['id'=>$patientId])}} class="btn btn-primary" type="button">Edit Medical History</a>    
                   @endif
                   @php
                       if($medicalHistory!=null){

                       }
                   @endphp
               
               </div>
           </div>
           
          <!-- ./col -->
      </div><!-- /.container-fluid -->
    </section>
    <script src="{{asset('js/doctor/patients.js')}}"></script>
@endsection