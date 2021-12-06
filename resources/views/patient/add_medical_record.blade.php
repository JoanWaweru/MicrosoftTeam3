@extends('layouts.profile')
@php
   $temperature=$pulseRate=$respirationRate=$bloodPressure=$symptoms="";
            if (isset($medicalRecord)) {
                $temperature = $medicalRecord->temperature;
                $pulseRate = $medicalRecord->pulse_rate;
                $respirationRate = $medicalRecord->respiration_rate;
                $bloodPressure = $medicalRecord->blood_pressure;
                $symptoms = $medicalRecord->symptoms;
            }
@endphp
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background: #2f3037; margin-top:15px;">
                    <div class="card-header">{{ __('Add Medical Record') }}</div>

                    <div class="card-body">
                        <form method="POST" action={{ route('medicalRecordAdd') }} enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="temperature" class="col-md-4 col-form-label text-md-right">{{ __('Temperature') }}</label>

                                <div class="col-md-6">
                                    <input id="temperature" type="text" class="form-control @error('temperature') is-invalid @enderror" name="temperature" value="{{$temperature}}" required autofocus>

                                    @error('temperature')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pulse_rate" class="col-md-4 col-form-label text-md-right">{{ __('Pulse Rate') }}</label>

                                <div class="col-md-6">
                                    <input id="pulse_rate" type="text" class="form-control @error('pulse_rate') is-invalid @enderror" name="pulse_rate" value="{{$pulseRate}}" required>

                                    @error('pulse_rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="respiration_rate" class="col-md-4 col-form-label text-md-right">{{ __('Respiration Rate') }}</label>

                                <div class="col-md-6">
                                    <input id="respiration_rate" type="text" class="form-control @error('respiration_rate') is-invalid @enderror" name="respiration_rate" value="{{$respirationRate}}" style="height:fit-content;" required>
                               
                                    @error('respiration_rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="blood_pressure" class="col-md-4 col-form-label text-md-right">{{ __('Blood Pressure') }}</label>

                                <div class="col-md-6">
                                    <input id="blood_pressure" type="text" class="form-control @error('blood_pressure') is-invalid @enderror" name="blood_pressure" value="{{$bloodPressure}}" style="height:fit-content;" required >
                                       
                                    @error('blood_pressure')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="symptoms" class="col-md-4 col-form-label text-md-right">{{ __('Symptoms') }}</label>

                                <div class="col-md-6">
                                    <textarea id="symptoms" type="text" class="form-control @error('symptoms') is-invalid @enderror" name="symptoms" style="height:fit-content;" required >
                                        {{$symptoms}}
                                    </textarea>   
                                    @error('symptoms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" >
                                <label for="condition_image" class="col-md-4 col-form-label text-md-right">{{ __('Condition Image') }}</label>

                                <div class="col-md-6">
                                    <input id="condition_image" type="file" name="condition_image" >

                                    @error('condition_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                    <a href={{ route('medicalRecord')}} class="btn btn-primary" type="button" >Back to My Medical Record</a>
                                </div>
                                <div class="success-message">
                                    @php
                                        if(isset($successMessage)){
                                             echo $successMessage;
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
