@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
      <section class="content">
        <div class="row"> 
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Packages</h4>
                <span class="badge badge-pill badge-danger"> {{ count($packages) }} </span>
                <a href="{{ route('packages.create') }}" class="btn btn-primary btn-sm" style="float: right;">
                  Add
                </a>
              </div>
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Image</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($packages as $package)
                            <tr>
                                <td>{{ $package->name}}</td>
                                <td>
                                  <img src="{{ asset($package->thumbnail) }}" style="width: 120px; height: 40px;">
                                </td>
                                <td>
                                    <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ route('packages.delete', $package->id) }}" class="btn btn-sm btn-danger">Delete</a>
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