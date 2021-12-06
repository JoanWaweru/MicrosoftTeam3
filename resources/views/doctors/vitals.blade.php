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
      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Vitals and Symptoms') }}</div>

                <div class="card-body" style="background-image: {{ asset("assets/images/category-2.jpg")}};">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Patient ID') }}</label>

                            <div class="col-md-6">
<<<<<<< HEAD
                                <input id="id" type="text" class="form-control @error('name') is-invalid @enderror" name="id" value="{{ old('id') }}" required autocomplete="id" autofocus>

                                @error('name')
=======
                                <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value=" " required autocomplete="id" autofocus>

                                @error('id')
>>>>>>> 2ce49e4adfe3a4e90f05cf7547cf80feb034c125
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
<<<<<<< HEAD
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
=======
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value=" " required autocomplete="name" autofocus>
>>>>>>> 2ce49e4adfe3a4e90f05cf7547cf80feb034c125

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Pulse Rate') }}</label>

                            <div class="col-md-6">
<<<<<<< HEAD
                                <input id="pulse_rate" type="text" class="form-control @error('name') is-invalid @enderror" name="pulse_rate" value="{{ old('pulse_rate') }}" required autocomplete="pulse_rate">
=======
                                <input id="pulse_rate" type="text" class="form-control @error('pulse_rate') is-invalid @enderror" name="pulse_rate" value="{{ old('pulse_rate') }}" required autocomplete="pulse_rate">
>>>>>>> 2ce49e4adfe3a4e90f05cf7547cf80feb034c125

                                @error('pulse_rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Respiration Rate') }}</label>

                            <div class="col-md-6">
<<<<<<< HEAD
                                <input id="respiration_rate" type="text" class="form-control @error('name') is-invalid @enderror" name="respiration_rate" value="{{ old('respiration_rate') }}" required autocomplete="respiration_rate">
=======
                                <input id="respiration_rate" type="text" class="form-control @error('respiration_rate') is-invalid @enderror" name="respiration_rate" value="{{ old('respiration_rate') }}" required autocomplete="respiration_rate">
>>>>>>> 2ce49e4adfe3a4e90f05cf7547cf80feb034c125

                                @error('respiration_rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Temperature') }}</label>

                            <div class="col-md-6">
<<<<<<< HEAD
                                <input id="temperature" type="text" class="form-control @error('name') is-invalid @enderror" name="temperature" value="{{ old('temperature') }}" required autocomplete="name">
=======
                                <input id="temperature" type="text" class="form-control @error('temperature') is-invalid @enderror" name="temperature" value="{{ old('temperature') }}" required autocomplete="name">
>>>>>>> 2ce49e4adfe3a4e90f05cf7547cf80feb034c125

                                @error('temperature')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Blood Pressure') }}</label>

                            <div class="col-md-6">
<<<<<<< HEAD
                                <input id="bpm" type="text" class="form-control @error('name') is-invalid @enderror" name="bpm">
=======
                                <input id="bpm" type="text" class="form-control @error('bpm') is-invalid @enderror" name="bpm">
>>>>>>> 2ce49e4adfe3a4e90f05cf7547cf80feb034c125

                                @error('bpm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                     <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Symptoms') }}</label>

                            <div class="col-md-6">
<<<<<<< HEAD
                                <input id="symptoms" type="name" class="form-control @error('name') is-invalid @enderror" name="symptoms" required autocomplete="symptoms">
=======
                                <input id="symptoms" type="name" class="form-control @error('symptoms') is-invalid @enderror" name="symptoms" required autocomplete="symptoms">
>>>>>>> 2ce49e4adfe3a4e90f05cf7547cf80feb034c125

                                @error('symptoms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-raised btn-primary" style="background-color: green; border-color: green; z-index: 2;">
                                    {{ __('Predict Risk') }}
                                </button>

                                <button type="submit" class="btn btn-raised btn-primary" style="background-color: green; border-color: green; z-index: 2;">
                                    {{ __('Predict Disease') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Diagnosis') }}</label>

                            <div class="col-md-6">
                                <input id="diagnosis" type="text" class="form-control" name="diagnosis" required>
<<<<<<< HEAD
                                @error('diagnosis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
=======
>>>>>>> 2ce49e4adfe3a4e90f05cf7547cf80feb034c125
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

          <!-- ./col -->
      </div><!-- /.container-fluid -->
    </section>

@endsection
