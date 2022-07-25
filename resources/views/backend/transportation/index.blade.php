@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
      <section class="content">
        <div class="row"> 
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Transportation List</h4>
                <span class="badge badge-pill badge-danger"> {{ count($transportations) }} </span>
                <a href="{{ route('transportation.create') }}" class="btn btn-primary btn-sm" style="float: right;">
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
                                    <a href="{{ route('transportation.edit', $transportation->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ route('transportation.delete', $transportation->id) }}" class="btn  tn-sm btn-danger">Delete</a>
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