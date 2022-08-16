@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
      <section class="content">
        <div class="row"> 
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Package Transportation</h4>
                    <span class="badge badge-pill badge-danger"> {{ count($transportationpackages) }} </span>
                <a href="{{ route('transportation-package.create') }}" class="btn btn-sm btn-primary" style="float: right;">
                  Add
                </a>
              </div>
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Transportation</th>
                              <th>Package</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($transportationpackages as $transportationpackage)
                            <tr>
                                <td>{{ $transportationpackage->transportation->name }}</td>
                                <td>{{ $transportationpackage->package->name }}</td>
                                <td>
                                    <a href="{{ route('transportation-package.edit', $transportationpackage->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ route('transportation-package.delete', $transportationpackage->id) }}" class="btn btn-sm btn-danger">Delete</a>
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