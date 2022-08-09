@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                          <h3 class="box-title">Add Package Transportation</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('transportation-package.create') }}">
                                @csrf
                                <div class="form-group">
                                    <h5>Transportation<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="transportation_id" required class="form-control">
                                            <option value="" selected="" disabled="">
                                                Select Transportation
                                            </option>
                                            @foreach ($transportations as $transportation)
                                                <option value="{{ $transportation->id }}">
                                                    {{ $transportation->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Package<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="package_id" required class="form-control">
                                            <option value="" selected="" disabled="">
                                                Select Package
                                            </option>
                                            @foreach ($packages as $package)
                                                <option value="{{ $package->id }}">
                                                    {{ $package->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection