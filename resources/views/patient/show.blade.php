@extends('layouts.profile')

@section('content')
     <div class="content">
        <div class="container d-flex justify-content-center">
            <div class="card p-3 py-4" style="background: #2f3037;">
                <div class="text-center"> <img src="{{asset("assets/images/users/".Auth::user()->profile_photo)}}" width='100' class="rounded-circle">
                    <h3 class="mt-2">{{ $user->name }}</h3>City: <span class="mt-1 clearfix">{{ $user->city }}</span> Phone Number: <small class="mt-4">{{ $user->phone_number }}</small></br>
<<<<<<< HEAD
                    <a href={{ route('myprofileUpdate',$user)}} class="btn btn-primary" type="button">Edit Profile</a>
=======
                    <a href={{ route('myprofileEdit',$user->id)}} class="btn btn-primary" type="button">Edit Profile</a>
>>>>>>> 2ce49e4adfe3a4e90f05cf7547cf80feb034c125
                    <a href={{ route('home')}} class="btn btn-primary" type="button" >Back to Homepage</a>

                    {{--                    <div class="social-buttons mt-5"> <button class="neo-button"><i class="fa fa-facebook fa-1x"></i> </button> <button class="neo-button"><i class="fa fa-linkedin fa-1x"></i></button> <button class="neo-button"><i class="fa fa-google fa-1x"></i> </button> <button class="neo-button"><i class="fa fa-youtube fa-1x"></i> </button> <button class="neo-button"><i class="fa fa-twitter fa-1x"></i> </button> </div>--}}
                </div>
            </div>
        </div>
    </div>
    @endsection

