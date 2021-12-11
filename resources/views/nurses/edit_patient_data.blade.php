@extends('layouts.profile')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background: #2f3037; margin-top:15px;">
                    <div class="card-header">{{ __('Update Medical History') }}</div>

                    <div class="card-body">
                        <form method="POST" action={{ route('updatePatientMedicalData') }} enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$data['id']}}" style="display:none;">
                            <div class="form-group row">
                                <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('height') is-invalid @enderror" name="name" value="{{$data['name']}}" required autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="weight" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="weight" type="text" class="form-control @error('weight') is-invalid @enderror" name="weight"  value="{{$data['email']}}" required>

                                    @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="medical_problems" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                                <div class="col-md-6">
                                    <input id="medical_problems" type="text" class="form-control @error('medical_problems') is-invalid @enderror" name="medical_problems" value="{{$data['city']}}" style="height:fit-content; overflow:hidden;" required>
                                    
                                    @error('medical_problems')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="allergies" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                                <div class="col-md-6">
                                    <input id="allergies" type="text" class="form-control @error('allergies') is-invalid @enderror" name="allergies" value="{{$data['date_of_birth']}}" style="height:fit-content; overflow:hidden;" required >
                                       
                                    @error('allergies')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="medication" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="medication" type="text" class="form-control" name="medication" value="{{$data['phone_number']}}" required>
                                    
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
                

            
        </div>
    </div>
@endsection
