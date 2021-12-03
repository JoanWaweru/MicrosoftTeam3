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
      
      <table id="datatableid"class="table table-secondary table-bordered" style="width:100%">
                <thead>
                <tr>
                  <th>Patient ID</th>
                  <th>Name</th>
                  <th>Phone Number</th>
                  <th>E-mail Address</th>
                  <th>City</th>
                  <th>Date of Birth</th>
                  <th>Medical History</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                            //thinking 'medical history' should be a button that goes to history.blade.php
                    ?>
                </tbody>
                </table>

          <!-- ./col -->
      </div><!-- /.container-fluid -->
    </section>
  
@endsection