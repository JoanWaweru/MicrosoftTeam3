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
        <div class="content">
            @php
    $name=$email=$phone_number=$profile_photo=$city=$id=$date_of_birth="";
    if (isset($user)) {
        $id = $user->id;
        $name = $user->name;
        $email = $user->email;
        $date_of_birth = $user->date_of_birth;
        $phone_number = $user->phone_number;
        $profile_photo = $user->profile_photo;
        $city = $user->city;
    }
        @endphp
        <div class="container-fluid">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <form method="POST" action={{ route('updatePatientProfile') }} enctype="multipart/form-data">
                    <div class="card">
                      <div class="card-header">{{ __('Update ') }}</div>
                      <div class="card-body" style="background-image: {{ asset("assets/images/category-2.jpg")}};">
                         
                              @csrf
                                    <div class="form-group row">
                                      <label for="patient_id" class="col-md-4 col-form-label text-md-right">{{ __('Patient Id') }}</label>

                                      <div class="col-md-6">
                                          <input id="patient_id" type="text" class="form-control @error('patient_id') is-invalid @enderror" name="patient_id" required value="{{ $id}}" autocomplete="patient_id" autofocus>

                                          @error('patient_id')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                      </div>
                                  </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
        
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required value="{{ $name}}" autocomplete="name" autofocus>
        
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
        
                                        <div class="col-md-6">
                                            <input id="city" type="text" class="form-control @error('name') is-invalid @enderror" name="city" style="overflow: visible;" value={{ $city}}>
        
                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
        
                                        <div class="col-md-6">
                                            <input id="phone_number" type="text" class="form-control @error('name') is-invalid @enderror" name="phone_number" value={{ $phone_number}}  >
        
                                            @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail Address') }}</label>
        
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email }}" required autocomplete="email">
        
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>
        
                                        <div class="col-md-6">
                                            <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value={{ $date_of_birth }} required autocomplete="date">
        
                                            @error('date_of_birth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label for="profile_photo" class="col-md-4 col-form-label text-md-right">{{ __('Upload new profile') }}</label>
        
                                        <div class="col-md-6">
                                            <input id="formFileSm" type="file" class="form-control-sm" name="profile_photo" value={{ $profile_photo }}>
                                        </div>
                                    </div>
        
        
                                    <div class="form-group row mb-0">
        
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>                                </div>
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
      </div><!-- /.container-fluid -->
    </section>
    <script src="{{asset('js/doctor/patients.js')}}"></script>
@endsection
  