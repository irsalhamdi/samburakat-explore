@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
      <section class="content">
        <div class="row"> 
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Testimonies List</h4>
                <span class="badge badge-pill badge-danger"> {{ count($testimonies) }} </span>
              </div>
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Image</th>
                              <th>Description</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($testimonies as $testimoni)
                            <tr>
                                <td>{{ $testimoni->user->name }}</td>
                                <td>
                                    <img src="{{ asset($testimoni->user->profile_photo_path) }}" style="width: 120px; height: 40px;">
                                </td>
                                <td>
                                    {!! $testimoni->description !!}
                                </td>
                                <td>
                                    @if ($testimoni->status === '0')
                                        <a href="{{ route('testimoni.update.inactivate', $testimoni->id) }}" class="btn btn-sm btn-danger">Inactive</a>
                                    @else
                                    <a href="{{ route('testimoni.update.activate', $testimoni->id) }}" class="btn btn-sm btn-success">Active</a>
                                    @endif
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