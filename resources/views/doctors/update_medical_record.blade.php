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
                $diagnosis=$prescription=$comment="";
               $id = $medicalRecord->id;
               $link='storage/medicalRecordPhotos/'.$medicalRecord->condition_image_path;
               if($medicalRecord->diagnosis!=null){
                $diagnosis=$medicalRecord->diagnosis;
                $prescription=$medicalRecord->prescription;
                $comment=$medicalRecord->comment;
               }
               if(isset($doctorResponse)){
                $diagnosis= $doctorResponse->diagnosis;
                $prescription= $doctorResponse->prescription;
                $comment= $doctorResponse->comment;
               }
           @endphp
               <div class="container-box">
                   <center><h1>Medical Record</h1></center>
                   <div class="list">
                       <p class="key">Temperature</p>
                       <p class="value">{{$medicalRecord->temperature}}</p>
                   </div> 
                   <div class="list">
                       <p class="key">Blood Pressure</p>
                       <p class="value">{{$medicalRecord->blood_pressure}}</p>
                   </div> 
                   <div class="list">
                       <p class="key">Pulse Rate</p>
                       <p class="value">{{$medicalRecord->pulse_rate}}
                       </p>
                   </div> 
                   <div class="list">
                       <p class="key">Respiration Rate</p>
                       <p class="value">{{$medicalRecord->respiration_rate}}
                       </p>
                   </div> 
                   <div class="list">
                       <p class="key">Symptoms</p>
                       <p class="value">{{$medicalRecord->symptoms}} </p>
                   </div>
                   <div class="image-box">

                       <img src="{{asset($link)}}" alt="" style="display: block; margin: 2px auto;">
                       <p class="key" style="display:block; margin-left:370px; ">Condition Image</p>
                    </div> 
                   
               </div>
               <div class="container-box">
                <div class="card-header">{{ __('Update Medical Record') }}</div>
                <form method="POST" action={{ route('updateMedicalRecord') }} enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" value="{{$id}}" style="display:none;">
                <div class="form-group row">
                    <label for="diagnosis" class="col-md-4 col-form-label text-md-right">{{ __('Diagnosis') }}</label>

                    <div class="col-md-6">
                        <textarea id="diagnosis" type="text" class="form-control @error('diagnosis') is-invalid @enderror" name="diagnosis" required="required">
                        {{$diagnosis}}
                        </textarea>   
                        @error('diagnosis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prescription" class="col-md-4 col-form-label text-md-right">{{ __('Prescription') }}</label>

                    <div class="col-md-6">
                        <textarea id="prescription" type="text" class="form-control @error('prescription') is-invalid @enderror" name="prescription" required="required">
                            {{$prescription}}
                        </textarea>   
                        @error('prescription')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>

                    <div class="col-md-6">
                        <textarea id="comment" type="text" class="form-control @error('comment') is-invalid @enderror" name="comment" required="required">
                            {{$comment}}
                        </textarea>

                        @error('comment')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-raised btn-primary" style="background-color: green; border-color: green; z-index: 2; width:100px; margin:5px auto;">
                        {{ __('Save') }}
                    </button>

                    <div class="success-message">
                      @php
                          if(isset($succesMessage)){
                               echo $succesMessage;
                          }
                      @endphp 
                   </div>
                </div>
                </form>
              </div>
           
           </div>
           
          <!-- ./col -->
      </div><!-- /.container-fluid -->
    </section>
    <script src="{{asset('js/doctor/patients.js')}}"></script>
@endsection