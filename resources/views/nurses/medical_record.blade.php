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
                    <th>Date</th>
                    <th>Temperature</th>
                    <th>Blood Pressure</th>
                    <th>Puls rate</th>
                    <th>respiration rate</th>
                    <th>Symptoms</th>
                    <th>Condition Image</th>
                    <th>Diagnosis</th>
                    <th>Prescription</th>
                    <th>Comment</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($medicalRecords as $medicalRecord)
                @php
                    $diagnosis=$prescription=$comment="Pending Response";
                    if($medicalRecord->doctor_response_id!=null){
                        $doctorResponse=\App\Models\DoctorResponse::find($medicalRecord->doctor_response_id);
                        $diagnosis= $doctorResponse->diagnosis;
                        $prescription= $doctorResponse->prescription;
                        $comment= $doctorResponse->comment;
                    }
                    $link= asset('storage/medicalRecordPhotos/'.$medicalRecord->condition_image_path);
                @endphp
                <tr>
                    <td>{{date('M j Y', strtotime($medicalRecord->created_at))}}</td>
                    <td>{{$medicalRecord->temperature}}</td>
                    <td>{{$medicalRecord->blood_pressure}}</td>
                    <td>{{$medicalRecord->pulse_rate}}</td>
                    <td>{{$medicalRecord->respiration_rate}}</td>
                    <td>{{$medicalRecord->symptoms}}</td>
                    @if ($medicalRecord->condition_image_path!=null)
                    <td> <a href={{$link}} target="_blank">Image</a></td>
                    @else
                    <td>No Image</td>
                    @endif
                    
                    <td>{{$diagnosis}}</td>
                    <td>{{$prescription}}</td>
                    <td>{{$comment}}</td>
                    
                </tr>    
                @endforeach
                
            </tbody>
        </table>        
           
          <!-- ./col -->
      </div><!-- /.container-fluid -->
    </section>
    <script src="{{asset('js/doctor/patients.js')}}"></script>
@endsection