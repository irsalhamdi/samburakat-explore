@extends('admin.admin-master')
@section('admin')
    <div class="container-full">

      <section class="content">
        <div class="row"> 
          <div class="col-8">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Destination Type List</h3>
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
                                    <a href="{{ route('destination-type.edit', $destinationtype->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('destination-type.delete', $destinationtype->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Destination Type</h3>
                </div>
                <div class="box-body">
                    <form method="POST" action="{{ route('destination-type.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <h5>Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="name" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Image<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="image" class="form-control" required> 
                            </div>
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Submit">
                        </div>
                    </form>
                </div>
          </div>
        </div>
      </section>
    
    </div>
@endsection