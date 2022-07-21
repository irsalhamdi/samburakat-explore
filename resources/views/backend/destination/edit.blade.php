@extends('admin.admin-master')
@section('admin')
    <div class="container-full">

      <section class="content">
        <div class="row"> 
          <div class="col-8">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Destination List</h3>
              </div>
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Type</th>
                              <th>Village</th>
                              <th>Name</th>
                              <th>Image</th>
                              <th>Description</th>
                              <th>Guide</th>
                              <th>Price</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($destinations as $destination)
                            <tr>
                                <td>{{ $destination->destination_type_id }}</td>
                                <td>{{ $destination->village_id }}</td>
                                <td>{{ $destination->name }}</td>
                                <td>
                                    <img src="{{ asset($destination->image) }}" style="width: 100px; height: 40px;">
                                </td>
                                <td>{{ $destination->price }}</td>
                                <td>
                                    <a href="{{ route('destination.edit', $destination->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('destination.delete', $destination->id) }}" class="btn btn-danger">Delete</a>
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
                  <h3 class="box-title">Update Destination</h3>
                </div>
                <div class="box-body">
                    <form method="POST" action="{{ route('destination.update', $destination->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <h5>Destination Type</h5>
                            <div class="controls">
                                <select name="destination_type_id" required class="form-control">
                                    <option value="" selected="" disabled="">
                                        Select Type
                                    </option>
                                    @foreach ($destinationtypes as $destinationtype)
                                        <option value="{{ $destinationtype->id }}">
                                            {{ $destinationtype->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">
                                Province
                            </label>
                            <select name="province_id" required class="form-control">
                                <option value="" selected="" disabled="">
                                    Select Province
                                </option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">
                                        {{ $province->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">
                                Regency
                            </label>
                            <select name="regency_id" required class="form-control">
                                <option value="" selected="" disabled="">
                                    Select Regency
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">
                                District
                            </label>
                            <select name="district_id" required class="form-control">
                                <option value="" selected="" disabled="">
                                    Select District
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">
                                Village
                            </label>
                            <select name="village_id" required class="form-control">
                                <option value="" selected="" disabled="">
                                    Select Village
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h5>Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="name" class="form-control" value="{{ $destination->name }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Image<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="image" class="form-control" required> 
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Description<span class="text-danger">*</span></h5> 
                            <div class="controls">
                                <textarea id="editor1" name="description" rows="10" cols="80" required>
                                    {!! $data->description !!}
                                 </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Guide<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="guide" class="form-control" value="{{ $destination->guide }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Price<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="number" name="price" class="form-control" value="{{ $destination->price }}" required>
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