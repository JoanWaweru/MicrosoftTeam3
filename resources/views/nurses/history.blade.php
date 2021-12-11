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

      <table id="datatableid"class="table table-secondary table-bordered" style="width:100%">
                <thead>
                <tr>
                  <th>Patient ID</th>
                  <th>Weight</th>
                  <th>Height</th>
                  <th>Symptoms</th>
                  <th>Allergies</th>
                  <th>Emergency Contact</th>
                    <th>Date</th> <!--Im thinking there should be the date to show the last visit) -->
                </tr>
                </thead>

                </table>

          <!-- ./col -->
      </div><!-- /.container-fluid -->
    </section>

@endsection
