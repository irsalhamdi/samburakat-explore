@extends('admin.admin-master')
@section('admin')
    <div class="container-full">

      <section class="content">
        <div class="row"> 
          <div class="col-8">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Owner List</h3>
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
                                    <a href="{{ route('owner.edit', $owner->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('owner.delete', $owner->id) }}" class="btn btn-danger">Delete</a>
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
                  <h3 class="box-title">Add Owner</h3>
                </div>
                <div class="box-body">
                    <form method="POST" action="{{ route('owner.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <h5>Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="name" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Village</h5>
                            <div class="controls">
                                <select name="village_id" required class="form-control">
                                    <option value="" selected="" disabled="">
                                        Select Village
                                    </option>
                                    @foreach ($villages as $village)
                                        <option value="{{ $village->id }}">
                                            {{ $village->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Phone Number<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="number" name="phone_number" class="form-control" required> 
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