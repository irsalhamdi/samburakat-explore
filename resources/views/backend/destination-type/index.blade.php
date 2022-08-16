@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
      <section class="content">
        <div class="row"> 
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Destination Type</h4>
                <span class="badge badge-pill badge-danger"> {{ count($destinationtypes) }} </span>
                <a href="{{ route('destination-type.create') }}" class="btn btn-sm btn-primary" style="float: right;">
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
                        @foreach ($destinationtypes as $destinationtype)
                            <tr>
                                <td>{{ $destinationtype->name }}</td>
                                <td>
                                    <img src="{{ asset($destinationtype->image) }}" style="width: 120px; height: 40px;">
                                </td>
                                <td>
                                    <a href="{{ route('destination-type.edit', $destinationtype->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ route('destination-type.delete', $destinationtype->id) }}" class="btn btn-sm btn-danger">Delete</a>
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