@extends('layouts.profile')

@section('content')
     <div class="content">
        <div class="container d-flex justify-content-center" style="margin-top:10px;">
            <div class="card p-3 py-4" style="background: #2f3037;">
                <div class="text-center"> <img src="{{asset("storage/profilePhotos/".Auth::user()->profile_photo)}}" width='140' class="rounded-circle">
                    <h3 class="mt-2">{{ $user->name }}</h3>City: <span class="mt-1 clearfix">{{ $user->city }}</span>Date of Birth: <span class="mt-1 clearfix">{{ $user->date_of_birth }}</span> Phone Number: <small class="mt-4">{{ $user->phone_number }}</small></br>
                    <a href={{ route('myprofileEdit',$user->id)}} class="btn btn-primary" type="button" style="margin-top:10px;">Edit Profile</a>
                    <a href={{ route('home')}} class="btn btn-primary" type="button" style="margin-top:10px;">Back to Homepage</a>

                    {{--                    <div class="social-buttons mt-5"> <button class="neo-button"><i class="fa fa-facebook fa-1x"></i> </button> <button class="neo-button"><i class="fa fa-linkedin fa-1x"></i></button> <button class="neo-button"><i class="fa fa-google fa-1x"></i> </button> <button class="neo-button"><i class="fa fa-youtube fa-1x"></i> </button> <button class="neo-button"><i class="fa fa-twitter fa-1x"></i> </button> </div>--}}
                </div>
            </div>
        </div>
    </div>
    @endsection

