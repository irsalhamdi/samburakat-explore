@extends('admin.admin-master')
@section('admin')
	<div class="container-full">
		<section class="content">
		    <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Owner</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('owner.update',$owner->id) }}">
                                    @csrf 		   
                                    <div class="form-group">
                                        <h5>Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"  name="name" value="{{ $owner->name }}" class="form-control" required> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Village</h5>
                                        <div class="controls">
                                            <select name="village_id" required class="form-control">
                                                <option value="" selected="" disabled="">
                                                    Select Owner
                                                </option>
                                                @foreach ($villages as $village)
                                                    <option value="{{ $village->id }}" {{ $village->id == $owner->village_id ? 'selected' : '' }}>
                                                        {{ $village->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Phone Number<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number"  name="phone_number" value="{{ $owner->phone_number }}" class="form-control" required> 
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