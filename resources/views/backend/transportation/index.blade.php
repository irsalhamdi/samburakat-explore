@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
      <section class="content">
        <div class="row"> 
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Transportation List</h3>
                <a href="{{ route('transportation.create') }}" class="btn btn-primary">
                  Add New Transportation
                </a>
              </div>
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Owner</th>
                              <th>Name</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($transportations as $transportation)
                            <tr>
                                <td>{{ $transportation->owner->name }}</td>
                                <td>{{ $transportation->name}}</td>
                                <td>
                                    <a href="{{ route('transportation.edit', $transportation->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('transportation.delete', $transportation->id) }}" class="btn btn-danger">Delete</a>
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