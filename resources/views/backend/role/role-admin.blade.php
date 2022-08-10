@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
      <section class="content">
        <div class="row"> 
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Admins List</h3>
                <span class="badge badge-pill badge-danger"> {{ count($admins) }} </span>
                <a href="{{ route('role-admin.create') }}" class="btn btn-primary btn-sm" style="float: right;">
                  Add
                </a>
              </div>
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Access</th>
                              <th>Profile Image</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($admins as $admin)
                            <tr>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->phone }}</td>
                                <td>
                                    @if($admin->role == 1)
                                      <span class="badge btn-primary">Role</span>
                                    @else
                                    @endif

                                    @if($admin->destination == 1)
                                      <span class="badge btn-secondary">Destination</span>
                                    @else
                                    @endif

                                    @if($admin->owner == 1)
                                      <span class="badge btn-secondary">Owner</span>
                                    @else
                                    @endif

                                    @if($admin->hotel == 1)
                                      <span class="badge btn-light">Hotel</span>
                                    @else
                                    @endif

                                    @if($admin->transportation == 1)
                                      <span class="badge btn-success">Transportation</span>
                                    @else
                                    @endif

                                    @if($admin->packages == 1)
                                      <span class="badge btn-danger">Packages</span>
                                    @else
                                    @endif

                                    @if($admin->booking == 1)
                                      <span class="badge btn-dark">Booking</span>
                                    @else
                                    @endif

                                    @if($admin->testimoni == 1)
                                      <span class="badge btn-outline-primary">Testimoni</span>
                                    @else
                                    @endif

                                    @if($admin->setting == 1)
                                      <span class="badge btn-outline-success">Setting</span>
                                    @else
                                    @endif
                                </td>
                                <td> 
                                    <img src="{{ asset($admin->profile_photo_path) }}" style="width: 50px; height: 50px;">
                                </td>
                                <td>
                                    <a href="{{ route('role.admin.edit',$admin->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{ route('role.admin.delete',$admin->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection