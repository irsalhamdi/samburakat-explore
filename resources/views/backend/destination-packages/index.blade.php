@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
      <section class="content">
        <div class="row"> 
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Destination Packages</h4>
                <span class="badge badge-pill badge-danger"> {{ count($destinationpackages) }} </span>
                <a href="{{ route('destination-packages.create') }}" class="btn btn-primary btn-sm" style="float: right;">
                  Add 
                </a>
              </div>
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Destination</th>
                              <th>Package</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($destinationpackages as $destinationpackage)
                            <tr>
                                <td>{{ $destinationpackage->destination->name }}</td>
                                <td>{{ $destinationpackage->package_id}}</td>
                                <td>
                                    <a href="{{ route('destination-packages.edit', $destinationpackage->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ route('destination-packages.delete', $destinationpackage->id) }}" class="btn  btn-sm btn-danger">Delete</a>
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

