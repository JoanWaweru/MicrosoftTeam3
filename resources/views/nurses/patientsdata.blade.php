@extends('layouts.nurse')

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
              <li class="breadcrumb-item"><a href="/nurse_landing">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Medical History') }}</div>

                <div class="card-body" style="background-image: {{ asset("assets/images/category-2.jpg")}};">
                    <form method="POST" action="/createPatientMedicalHistory" enctype="multipart/form-data">
                        @csrf
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Patient ID') }}</label>

                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value=" " required autocomplete="id" autofocus>

                                @error('id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Weight') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="weight" value=" " required autocomplete="name" autofocus>

                                @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Height') }}</label>

                            <div class="col-md-6">
                                <input id="pulse_rate" type="text" class="form-control @error('pulse_rate') is-invalid @enderror" name="height" value="{{ old('pulse_rate') }}" required autocomplete="pulse_rate">

                                @error('height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Medical Condition') }}</label>

                            <div class="col-md-6">
                                <input id="respiration_rate" type="text" class="form-control @error('respiration_rate') is-invalid @enderror" name="medical_problems" value="{{ old('respiration_rate') }}" required autocomplete="respiration_rate">

                                @error('medical_problems')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Allergies') }}</label>

                            <div class="col-md-6">
                                <input id="temperature" type="text" class="form-control @error('temperature') is-invalid @enderror" name="allergies" value="{{ old('temperature') }}" required autocomplete="name">

                                @error('allergies')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Medication') }}</label>

                            <div class="col-md-6">
                                <input id="bpm" type="text" class="form-control @error('bpm') is-invalid @enderror" name="medication">

                                @error('medication')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> <br><hr>
                        <h6 style="margin-left: 20px"> Emergency Contact</h6> <hr>
                     <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="symptoms" type="name" class="form-control @error('symptoms') is-invalid @enderror" name="first_name" required autocomplete="symptoms">

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="symptoms" type="name" class="form-control @error('symptoms') is-invalid @enderror" name="last_name" required autocomplete="symptoms">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Relationship') }}</label>

                            <div class="col-md-6">
                                <input id="symptoms" type="name" class="form-control @error('symptoms') is-invalid @enderror" name="relationship" required autocomplete="symptoms">

                                @error('relationship')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="symptoms" type="name" class="form-control @error('symptoms') is-invalid @enderror" name="phone_number" required autocomplete="symptoms">

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                <!--COMMENT ALERT!!
                Hi, may you also add a div for the date of visit-->



                        <div class="form-group row mb-0">

                            <div class="col-md-6 offset-md-4">
                                
                                <button type="submit" class="btn btn-raised btn-primary" style="background-color: black; border-color: green; z-index: 2; margin-left:120px;">
                                    {{ __('Send') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </section>

@endsection
