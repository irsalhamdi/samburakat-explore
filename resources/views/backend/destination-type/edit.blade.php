@extends('admin.admin-master')
@section('admin')
	<div class="container-full">
		<section class="content">
		    <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Destination Type</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('destination-type.update',$destinationtype->id) }}" enctype="multipart/form-data">
                                    @csrf 
                                    <input type="hidden" name="id" value="{{ $destinationtype->id }}">	
                                    <input type="hidden" name="old_image" value="{{ $destinationtype->image }}">			   
                                    <div class="form-group">
                                        <h5>Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"  name="name" class="form-control" value="{{ $destinationtype->name }}" required> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Destination Type Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">					 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</section>
	</div>
@endsection