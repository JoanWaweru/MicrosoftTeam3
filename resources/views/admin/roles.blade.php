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
      <table id="datatableid"class="table table-secondary table-bordered-responsive">
              <thead>
              <tr>
              <th>Staff ID</th>
			  <th>Staff Name</th>
			  <th>E-mail Address</th>
              <th>Role</th>
			  <th>Action</th>
{{--			  <th>Disable</th>--}}
{{--              <th>Enable</th>--}}
                </tr>
              </thead>
              <tbody>
              @foreach ($user as $users)
                  <tr>
                      <td>{{$users->id}}</td>
                      <td>{{$users->name}}</td>
                      <td>{{$users->email}}</td>
                      <td>{{$users->role}}</td>
                      <td> <a href={{ route('edit_staff')}} class="btn btn-primary" type="button">Edit</a></td>
                      <td> <a href={{ route('delete_staff',$users->id)}} class="btn btn-primary" type="button">Delete</a></td>
                  </tr>
              @endforeach
              </tbody>
              </table>


      </div><!-- /.container-fluid -->
    </section>
@endsection
