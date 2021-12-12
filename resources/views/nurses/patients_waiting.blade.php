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
        <table id="patient_table" class="display" >
          <thead>
              <tr>

                <th>Name</th>
                <th>Phone Number</th>
                <th>E-mail Address</th>
                <th>City</th>
                <th>Date of Birth</th>
                <th>Medical History</th>
                <th>Medical Record</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($waitingPatients as $patient)
            @php
              $medicalRecordUrl= "/medicalRecord/{$patient->id}";
              $medicalHistoryUrl= "/medicalHistory/{$patient->id}";
            @endphp
            <tr>
              <td>{{$patient->name}}</td>
              <td>{{$patient->phone_number}}</td>
              <td>{{$patient->email}}</td>
              <td>{{$patient->city}}</td>
              <td>{{$patient->date_of_birth}}</td>
              <td><a href="{{url($medicalHistoryUrl)}}">Medical History</a></td>
              <td><a href="{{url($medicalRecordUrl)}}">Medical Record</a></td>
            </tr>
            @endforeach
            
          </tbody>
      </table>
      
     
          <!-- ./col -->
      </div><!-- /.container-fluid -->
    </section>
    <script src="{{asset('js/doctor/patients.js')}}"></script>
@endsection