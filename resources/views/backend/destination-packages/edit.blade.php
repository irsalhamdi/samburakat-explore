@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                          <h3 class="box-title">Add Destination Package</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('destination-packages.update', $data->id) }}">
                                @csrf 
                                <div class="form-group">
                                    <h5>Destination</h5>
                                    <div class="controls">
                                        <select name="destination_id" required class="form-control">
                                            <option value="" selected="" disabled="">
                                                Select Destination
                                            </option>
                                            @foreach ($destinations as $destination)
                                                <option value="{{ $destination->id }}" {{ $destination->id == $data->destination_id  ? 'selected' : ''}}>
                                                    {{ $destination->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Package</h5>
                                    <div class="controls">
                                        <select name="package_id" required class="form-control">
                                            <option value="" selected="" disabled="">
                                                Select Package
                                            </option>
                                            @foreach ($packages as $package)
                                                <option value="{{ $package->id }}" {{ $package->id == $data->package_id ? 'selected' : ''}}>
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
        </section>
    </div>
@endsection