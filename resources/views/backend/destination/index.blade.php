@extends('admin.admin-master')
@section('admin')
    <div class="container-full">

      <section class="content">
        <div class="row"> 
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Destination List</h3>
                <a href="{{ route('destination.create') }}" class="btn btn-primary">
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
                                <td>{{ $destination->destination_type_id }}</td>
                                <td>{{ $destination->village_id }}</td>
                                <td>{{ $destination->name }}</td>
                                <td>{{ $destination->price }}</td>
                                <td>
                                    <a href="{{ route('destination.show', $destination->id) }}" class="btn btn-success">Detail</a>
                                    <a href="{{ route('destination.edit', $destination->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('destination.delete', $destination->id) }}" class="btn btn-danger">Delete</a>
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