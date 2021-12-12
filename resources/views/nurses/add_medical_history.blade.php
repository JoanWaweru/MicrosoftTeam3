
@extends('layouts.profile')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background: #2f3037; margin-top:15px;">
                    <div class="card-header">{{ __('Update Medical History') }}</div>

                    <div class="card-body">
                        <form method="POST" action={{ route('updatePatientMedicalHistory') }} enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$data['id']}}" style="display:none;">
                            <div class="form-group row">
                                <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('Weight') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{$data['weight']}}" required autofocus>

                                    @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('Height') }}</label>

                                <div class="col-md-6">
                                    <input id="height" type="text" class="form-control @error('height') is-invalid @enderror" name="height"  value="{{$data['height']}}" required>

                                    @error('height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="medical_problems" class="col-md-4 col-form-label text-md-right">{{ __('Medical Condition') }}</label>

                                <div class="col-md-6">
                                    <input id="medical_problems" type="text" class="form-control @error('medical_problems') is-invalid @enderror" name="medical_problems" value="{{$data['medical_problems']}}" style="height:fit-content; overflow:hidden;" required>
                                    
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
                                    <input id="allergies" type="text" class="form-control @error('allergies') is-invalid @enderror" name="allergies" value="{{$data['allergies']}}" style="height:fit-content; overflow:hidden;" required >
                                       
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
                                    <input id="medication" type="text" class="form-control" name="medication" value="{{$data['medication']}}" required>
                                    
                                    @error('medication')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('update') }}</button>
                                    
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
