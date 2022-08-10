@extends('admin.admin-master')
@section('admin')
  <div class="container-full">
    <section class="content">
      <div class="row"> 
        <div class="col-12">
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">Hotel List</h4>
              <span class="badge badge-pill badge-danger"> {{ count($hotels) }} </span>
              <a href="{{ route('hotel.create') }}" class="btn btn-sm btn-primary" style="float: right;">
                Add
              </a>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Owner</th>
                            <th>Village</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($hotels as $hotel)
                          <tr>
                              <td>{{ $hotel->name }}</td>
                              <td>{{ $hotel->owner->name }}</td>
                              <td>{{ $hotel->owner->village->name }}</td>
                              <td>{{ $hotel->owner->phone_number }}</td>
                              <td>
                                  <a href="{{ route('hotel.edit', $hotel->id) }}" class="btn btn-sm btn-info">Edit</a>
                                  <a href="{{ route('hotel.delete', $hotel->id) }}" class="btn btn-sm btn-danger">Delete</a>
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