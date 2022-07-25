@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
      <section class="content">
        <div class="row"> 
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Destination List</h4>
                <span class="badge badge-pill badge-danger"> {{ count($destinations) }} </span>
                <a href="{{ route('destination.create') }}" class="btn btn-sm btn-primary" style="float: right;">
                  Add New Destination
                </a>
              </div>
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Destination Type</th>
                              <th>Village</th>
                              <th>Name</th>
                              <th>Price</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($destinations as $destination)
                            <tr>
                                <td>{{ $destination->destinationtype->name }}</td>
                                <td>{{ $destination->village->name }}</td>
                                <td>{{ $destination->name }}</td>
                                <td>{{ $destination->price }}</td>
                                <td>
                                    <a href="{{ route('destination.edit', $destination->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ route('destination.delete', $destination->id) }}" class="btn btn-sm btn-danger">Delete</a>
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