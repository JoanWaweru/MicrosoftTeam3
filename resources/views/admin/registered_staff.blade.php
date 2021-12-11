@extends('layouts.admin')

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

      <table id="datatableid"class="table table-secondary table-bordered" style="width:100%">
                <thead>
                <tr>
                  <th> Staff ID</th>
                  <th >Staff Name</th>
                  <th >E-mail Address</th>
                  <th >Role</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($user as $users)
{{--                    @php--}}
{{--                        --}}
{{--                        if($medicalRecord->doctor_response_id!=null){--}}
{{--                            $doctorResponse=\App\Models\DoctorResponse::find($medicalRecord->doctor_response_id);--}}
{{--                            $diagnosis= $doctorResponse->diagnosis;--}}
{{--                            $prescription= $doctorResponse->prescription;--}}
{{--                            $comment= $doctorResponse->comment;--}}
{{--                        }--}}
{{--                        $link= asset('storage/medicalRecordPhotos/'.$medicalRecord->condition_image_path);--}}
{{--                    @endphp--}}
                    <tr>
{{--                        <td>{{date('M j Y', strtotime($users->created_at))}}</td>--}}
                        <td>{{$users->id}}</td>
                        <td>{{$users->name}}</td>
                        <td>{{$users->email}}</td>
                        <td>{{$users->role}}</td>
                    </tr>
                @endforeach

                </tbody>
                </table>

          <!-- ./col -->
      </div><!-- /.container-fluid -->
    </section>

@endsection
