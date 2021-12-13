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
        <div class="content">
            @php
            $height=$weight=$medicalProblems=$allergies=$medication=$id="";
            if (isset($medicalHistory)) {
                $id= $medicalHistory->id;
                $height = $medicalHistory->height;
                $weight = $medicalHistory->weight;
                $medicalProblems = $medicalHistory->medical_problems;
                $allergies = $medicalHistory->allergies;
                $medication = $medicalHistory->medication;
            }else if(isset($patientId)){
                $id= $patientId;
            }
        @endphp
        <div class="container-fluid">
            <div class="row justify-content-center">
              <div class="col-md-8">
                  <div class="card">
      
                      <div class="card-header">{{ __('Update Medical History') }}</div>
      
                      <div class="card-body" style="background-image: {{ asset("assets/images/category-2.jpg")}};">
                    @php
                        $action= isset($patientId)? 'SaveMedicalHistory':'UpdateMedicalHistory';
                    @endphp
                    <form method="POST" action={{ route($action) }} enctype="multipart/form-data">                        
                              @csrf
                              </div>
                              <input type="text" name="id" value="{{$id}}" style="display:none;">
                              <div class="form-group row">
                                  <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('Height') }}</label>
      
                                  <div class="col-md-6">
                                      <input id="id" type="text" class="form-control @error('height') is-invalid @enderror" name="height" value="{{$height}}" required autocomplete="height" autofocus>
      
                                      @error('id')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="weight" class="col-md-4 col-form-label text-md-right">{{ __('Weight') }}</label>
      
                                  <div class="col-md-6">
                                      <input id="weight" type="text" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{$weight}}" required autocomplete="weight" autofocus>
      
                                      @error('weight')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="medical_problems" class="col-md-4 col-form-label text-md-right">{{ __('Medical Problems') }}</label>
      
                                  <div class="col-md-6">
                                        <textarea id="medical_problems" type="text" class="form-control @error('medical_problems') is-invalid @enderror" name="medical_problems" required autocomplete="medical_problems" style="overflow:hidden;height:70px;">
                                            {{$medicalProblems}}
                                        </textarea>
                                      @error('medical_problems')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="allergies" class="col-md-4 col-form-label text-md-right">{{ __('Allergies') }}</label>
      
                                  <div class="col-md-6">
                                      <textarea id="allergies" type="text" class="form-control @error('allergies') is-invalid @enderror" name="allergies" required autocomplete="allergies" style="overflow:hidden;height:70px;">
                                        {{$allergies}}
                                      </textarea>
                                      @error('allergies')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="medication" class="col-md-4 col-form-label text-md-right">{{ __('Medication') }}</label>
      
                                  <div class="col-md-6">
                                      <textarea id="medication" type="text" class="form-control @error('medication') is-invalid @enderror" name="medication" required autocomplete="medication" style="overflow:hidden;height:70px;">
                                        {{$medication}}
                                        </textarea>
      
                                      @error('medication')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>                           
                              <div class="form-group row mb-0">
      
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
                              </div>
           
          <!-- ./col -->
      </div><!-- /.container-fluid -->
    </section>
    <script src="{{asset('js/doctor/patients.js')}}"></script>
@endsection