@extends('admin.admin-master')
@section('admin')
    <div class="container-full">

      <section class="content">
        <div class="row"> 
          <div class="col-8">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Transportation List</h3>
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
          <div class="col-4">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Transportation</h3>
                </div>
                <div class="box-body">
                    <form method="POST" action="{{ route('transportation.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <h5>Owner</h5>
                            <div class="controls">
                                <select name="owner_id" required class="form-control">
                                    <option value="" selected="" disabled="">
                                        Select Owner
                                    </option>
                                    @foreach ($owners as $owner)
                                        <option value="{{ $owner->id }}">
                                            {{ $owner->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="name" name="name" class="form-control" required>
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