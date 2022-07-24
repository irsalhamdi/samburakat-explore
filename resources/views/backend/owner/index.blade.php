@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
      <section class="content">
        <div class="row"> 
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Owner List</h4>
                <a href="{{ route('owner.create') }}" class="btn btn-primary btn-sm" style="float: right;">
                  Add New Owner
                </a>
              </div>
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Village</th>
                              <th>Phone Number</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($owners as $owner)
                            <tr>
                                <td>{{ $owner->name }}</td>
                                <td>{{ $owner->village->name }}</td>
                                <td>{{ $owner->phone_number }}</td>
                                <td>
                                    <a href="{{ route('owner.edit', $owner->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ route('owner.delete', $owner->id) }}" class="btn btn-sm btn-danger">Delete</a>
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