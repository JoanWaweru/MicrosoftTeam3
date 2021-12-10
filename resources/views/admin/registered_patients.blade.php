@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">


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
      <table id="registered_patients" class="table table-secondary table-bordered" >
                <thead>
                <tr>
                  <th>Patient ID</th>
                  <th>Name</th>
                  <th >Phone Number</th>
                  <th >E-mail Address</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($patients as $patient)
            <tr>
              <td>{{$patient->id}}</td>
              <td>{{$patient->name}}</td>
              <td>{{$patient->phone_number}}</td>
              <td>{{$patient->email}}</td>
            </tr>
            @endforeach
                </tbody>
            </table>

          <!-- ./col -->
      </div><!-- /.container-fluid -->
    </section>
 
@endsection

@push('scripts')
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function () {
    $('#registered_patients').DataTable();
  } );
  </script>
@endpush