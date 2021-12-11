@extends('layouts.profile')

@section('content')
     <div class="content">
        <div class="container d-flex justify-content-center" style="margin-top:10px;">
            <div class="card p-3 py-4" style="background: #2f3037;">
                <div class="text-center"> <img src="{{asset("storage/profilePhotos/".Auth::user()->profile_photo)}}" width='140' class="rounded-circle">
                                     
                
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

     
                <h1>Users and Emergency Contact</h1>
    <form method="POST" action="/getPatientMedicalHistory">
    @csrf 
      <table id="datatableid"class="table table-secondary table-bordered" style="width:100%">
                <thead>
                <tr>
                <th>Patient ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th> City</th>
                  <th>Contact</th>
                  <th>Date of Birth</th>
                 
                  <th>Profile Photo</th>
                  
                </tr>
                </thead>
                @foreach ($values as $value)
          
          <tr>
              
                 <td>{{  $value['id']  }} </td>
                 <td>{{  $value['name']  }} </td>
                 <td>{{  $value['email']  }} </td>
                 <td>{{  $value['city']  }} </td>
                 <td>{{  $value['phone_number']  }} </td>
                 <td>{{  $value['date_of_birth']  }} </td>
                 <td>{{  $value['profile_photo']  }} </td>
                 
                 
                
               
                    
                    
                 
          
             @endforeach
          </tr>

                </table>
           </form>

          <!-- ./col -->
      </div><!-- /.container-fluid -->
    </section>

@endsection

                
                <div class="social-buttons mt-5"> <button class="neo-button"><i class="fa fa-facebook fa-1x"></i> </button> <button class="neo-button"><i class="fa fa-linkedin fa-1x"></i></button> <button class="neo-button"><i class="fa fa-google fa-1x"></i> </button> <button class="neo-button"><i class="fa fa-youtube fa-1x"></i> </button> <button class="neo-button"><i class="fa fa-twitter fa-1x"></i> </button> </div>--}}
                </div>
            </div>
        </div>
    </div>
    @endsection

