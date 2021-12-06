@extends('layouts.profile')
<<<<<<< HEAD

=======
@php
    $name=$email=$phone_number=$profile_photo=$city="";
    $user=Auth::user();
    if ($user!=null) {
        $name = $user->name;
        $email = $user->email;
        $phone_number = $user->phone_number;
        $profile_photo = $user->profile_photo;
        $city = $user->city;
    }
@endphp
>>>>>>> 2ce49e4adfe3a4e90f05cf7547cf80feb034c125
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background: #2f3037;">
                    <div class="card-header">{{ __('Update Profile') }}</div>

                    <div class="card-body">
<<<<<<< HEAD
                        <form method="POST" action={{ route('myprofileUpdate', $user) }} enctype="multipart/form-data">
                            @method('PATCH')
=======
                        <form method="POST" action={{route('myprofileUpdate',$user->id)}} enctype="multipart/form-data">
>>>>>>> 2ce49e4adfe3a4e90f05cf7547cf80feb034c125
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value={{ $user->name}} required autocomplete="name" autofocus>

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
                                    <input id="city" type="text" class="form-control @error('name') is-invalid @enderror" name="city" value={{ $user->city}}>

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
                                    <input id="phone_number" type="text" class="form-control @error('name') is-invalid @enderror" name="phone_number" value={{ $user->phone_number}}  >

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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value={{ $user->email }} required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="profile_photo" class="col-md-4 col-form-label text-md-right">{{ __('Upload new profile') }}</label>

                                <div class="col-md-6">
                                    <input id="formFileSm" type="file" class="form-control-sm" name="profile_photo" value={{ $user->profile_photo }}>
                                </div>
                            </div>


                            <div class="form-group row mb-0">

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                    <a href={{ route('myprofile')}} class="btn btn-primary" type="button" >Back to My Profile</a>                                </div>
                            </div>
<<<<<<< HEAD
=======
                            <div class="success-message">
                                @php
                                    if(isset($succesMessage)){
                                         echo $succesMessage;
                                    }
                                @endphp
                            </div>
>>>>>>> 2ce49e4adfe3a4e90f05cf7547cf80feb034c125
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
