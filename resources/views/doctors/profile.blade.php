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
                <section class="form my-4 mx-5">
                <div class="container">
                <div class="row g-0">
                <div class="col-lg-5">
                    <?php 

                    ?>
                <img src=" {{asset("storage/profilePhotos/".Auth::user()->profile_photo)}}" class="img-fluid" style="height: 500px"alt="error">
                </div>
                    <div class="col-lg-7 px-5 pt-5">
                      <h4>User Profile</h4>
                      <form method="POST" action="" enctype="multipart/form-data">
                      <div class="form-row">
                              <div class="col-lg-7">
                                  <label>ID</label>
                                  <h6 id="id" name ="id" type="text" placeholder="ID" class="">{{ $user->id }}</h6>
                              </div>
                          </div>
                          <br>
                          <div class="form-row">
                              <div class="col-lg-7">
                              <label>Name</label>
                                  <h6 type="text" id="name" name="name" placeholder="Name" value="" class="" >{{ $user->name }}</h6>
                              </div>
                          </div>
                          <br>
                          <div class="form-row">
                              <div class="col-lg-7">
                              <label>Phone Number</label>
                                  <h6 type="text" id="phone_number" name="phone_number" placeholder="Phone Number" value="" class="" >{{ $user->phone_number }}</h6>
                              </div>
                          </div>
                          <br>
                          <div class="form-row">
                              <div class="col-lg-7">
                              <label>Email</label>
                                  <h6 id="email" type="email" name="email" placeholder="Email Address" value="" class="">{{ $user->email }}</h6>
                              </div>
                          </div>
                          <br>
                          <div class="form-row">
                              <div class="col-lg-7">
                              <a href="/doctor_profile" class="btn btn-primary ">Update Profile</a>
                              
                            </div>
                          </div>
                          <br>
                          <br>
                      

                  </div>
              </div>
          </div>
      </section>

            

            </div>
        </div>
        </div>
       
           
      </div><!-- /.container-fluid -->
    </section>
@endsection