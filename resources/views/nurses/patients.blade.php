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
      <h1>Users</h1>
    <form method="POST" action="/editPatientData">
    @csrf 
      <table id="datatableid"class="table table-secondary table-bordered" style="width:100%">
                <thead>
                <tr>
                  <th>Patient ID</th>
                  <th>Name</th>
                  <th>E-mail Address</th>
                  <th>City</th>
                  <th>Date of Birth</th>
                  <th>Phone Number</th>
                  
                  
                </tr>
                </thead>
                @foreach ($values as $value)
          
          <tr>
              
                 <td>{{  $value['id']  }} </td>
                 <td>{{  $value['name']  }} </td>
                 <td>{{  $value['email']  }} </td>
                 <td>{{  $value['city']  }} </td>
                 <td>{{  $value['date_of_birth']  }} </td>
                 <td>{{  $value['phone_number']  }} </td>
                
                    <td> <a href={{"editPatientData/".$value['id']  }}>Edit</a></td>
                    
                 
          
             @endforeach
          </tr>

                </table>
           </form>

          <!-- ./col -->
      </div><!-- /.container-fluid -->
    </section>

@endsection
