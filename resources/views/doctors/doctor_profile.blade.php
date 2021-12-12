@extends('layouts.doctor')
@php
    $id=$name=$email=$phone_number=$profile_photo="";
    $user=Auth::user();
    if ($user!=null) {
        $id = $user->id;
        $name = $user->name;
        $email = $user->email;
        $phone_number = $user->phone_number;
        $profile_photo = $user->profile_photo;
    }
@endphp
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
              <li class="breadcrumb-item"><a href="/admin_landing">Home</a></li>
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
            
                <div class="card-header">{{ __('Update Profile') }}</div>

                <div class="card-body" style="background-image: url('assets/images/category-2.jpg');">
                    <form method="POST" action={{route('updateDoctor',$user->id)}}  enctype="multipart/form-data">
                        @csrf
                        <?php 
                            

                        ?>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Id') }}</label>
                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value={{ $user->id}}>
                                @error('id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value={{ $user->name}}>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value={{ $user->email}}>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value={{ $user->phone_number}}  >
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profile_photo" class="col-md-4 col-form-label text-md-right">{{ __('Upload profile') }}</label>

                            <div class="col-md-6">
                                <input id="formFileSm" type="file" class="form-control-sm" name="profile_photo" value={{ $user->profile_photo }}>
                            </div>
                        </div>

                        
                        <div class="form-group row mb-0">

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-raised btn-primary" style="background-color: green; border-color: green; z-index: 2;">
                                    {{ __('Update') }}
                                </button>
                                <div class="success-message">
                                        @php
                                            if(isset($succesMessage)){
                                                 echo $succesMessage;
                                            }
                                        @endphp 
                                     </div>
                            </div>
                            <div class="form-row">
                              <div class="col-lg-7">
                              <a href="/profile" class="btn btn-primary ">Back</a>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
       
           
      </div><!-- /.container-fluid -->
    </section>
@endsection