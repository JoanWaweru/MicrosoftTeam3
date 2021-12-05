@extends('layouts.profile')
@php
            $firstName=$lastName=$relationship=$phonenumber="";
            $height=$weight=$medicalProblems=$allergies=$medication="";
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
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background: #2f3037; margin-top:15px;">
                    <div class="card-header">{{ __('Update Medical History') }}</div>

                    <div class="card-body">
                        <form method="POST" action={{ route('medicalHistoryUpdate') }} enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('Height') }}</label>

                                <div class="col-md-6">
                                    <input id="height" type="text" class="form-control @error('height') is-invalid @enderror" name="height" value={{ $height}} required autofocus>

                                    @error('height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="weight" class="col-md-4 col-form-label text-md-right">{{ __('Weight') }}</label>

                                <div class="col-md-6">
                                    <input id="weight" type="text" class="form-control @error('weight') is-invalid @enderror" name="weight" value={{ $weight}} required>

                                    @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="medical_problems" class="col-md-4 col-form-label text-md-right">{{ __('Medical Problem') }}</label>

                                <div class="col-md-6">
                                    <textarea id="medical_problems" type="text" class="form-control @error('medical_problems') is-invalid @enderror" name="medical_problems" style="height:fit-content; overflow:hidden;" required>{{ $medicalProblems}} 
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
                                    <textarea id="allergies" type="text" class="form-control @error('allergies') is-invalid @enderror" name="allergies" style="height:fit-content; overflow:hidden;" required >{{ $allergies }}
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
                                    <textarea id="medication" type="text" class="form-control" name="medication" required>{{ $medication }} 
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
                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                    <a href={{ route('medicalHistory')}} class="btn btn-primary" type="button" >Back to My Medical History</a>
                                </div>
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
                <div class="card" style="background: #2f3037; margin-top:15px; margin-bottom:15px;">
                    <div class="card-header">{{ __('Update Emergency Contact') }}</div>

                    <div class="card-body">
                        <form method="POST" action={{ route('emergencyContactUpdate') }} enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" required value={{ $firstName}}>

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" required value={{ $lastName}}>

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="relationship" class="col-md-4 col-form-label text-md-right">{{ __('Relationship') }}</label>

                                <div class="col-md-6">
                                    <input id="relationship" type="text" class="form-control @error('relationship') is-invalid @enderror" name="relationship" required value={{ $relationship}} >

                                    @error('relationship')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phonenumber" class="col-md-4 col-form-label text-md-right">{{ __('Phone number') }}</label>

                                <div class="col-md-6">
                                    <input id="phonenumber" type="text" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" required  value={{ $phonenumber }} >

                                    @error('phonenumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                    <a href={{ route('medicalHistory')}} class="btn btn-primary" type="button" >Back to My Medical History</a>
                                </div>
                                <div class="success-message">
                                    @php
                                        if(isset($succesMessageTwo)){
                                             echo $succesMessageTwo;
                                        }
                                    @endphp 
                                 </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
