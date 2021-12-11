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
                  <th>Weight</th>
                  <th>Height</th>
                  <th>Medical Condition</th>
                  <th>Allergies</th>
                  <th>Medication</th>
                 
                  <th>Date inserted</th>
                  <th>Date updated</th>
                </tr>
                </thead>
                @foreach ($values as $value)
          
          <tr>
              
                 <td>{{  $value['id']  }} </td>
                 <td>{{  $value['weight']  }} </td>
                 <td>{{  $value['height']  }} </td>
                 <td>{{  $value['medical_problems']  }} </td>
                 <td>{{  $value['allergies']  }} </td>
                 <td>{{  $value['medication']  }} </td>
                 <td>{{  $value['created_at']  }} </td>
                 <td>{{  $value['updated_at']  }} </td>
                 
                
               
                    <td> <a href={{"editPatientData/".$value['id']  }}>Edit</a></td>
                    
                 
          
             @endforeach
          </tr>

                
                <thead>
                <tr>
                <th>Emergency Contact First Name</th>
                  <th>Emergency Contact Last Name</th>
                  <th>Relationship</th>
                  <th>Phone Number</th>
                </tr>
                </thead>
                @foreach ($data as $data)
          
          <tr>
                 
                 <td>{{  $data['first_name']  }} </td>
                 <td>{{  $data['last_name']  }} </td>
                 <td>{{  $data['relationship']  }} </td>
                 <td>{{  $data['phone_number']  }} </td>
                
                
                
                
                 
          
             @endforeach
          </tr>

                </table>
           </form>

          <!-- ./col -->
      </div><!-- /.container-fluid -->
    </section>

@endsection
