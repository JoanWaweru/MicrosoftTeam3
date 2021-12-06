@extends('layouts.profile')
@section('content')

    <center><h2>Medical Record</h2></center>
<div id="small-box">
<table id="example" class="display" >
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
            $link= storage_path().'/medicalRecordPhotos/'.$medicalRecord->condition_image_path;
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
<div class="button_box">
    <a href={{ route('medicalRecordNew')}} class="btn btn-primary" type="button">Add medical Record</a>
    <a href={{ route('home')}} class="btn btn-primary" type="button" >Back to Homepage</a>
    </div>
</div>
<script src="{{asset('js/patient/medicalRecrd.js')}}"></script>
{{-- <script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script> --}}

@endsection