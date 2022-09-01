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
                                    <div class="form-group">
                                        <h5>Ownership<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="type" required class="form-control">
                                                <option value="{{ $owner->type }}" {{ $owner->type == $owner->type ? 'selected' : '' }}>
                                                    @if ($owner->type === '1')
                                                        Transportation
                                                    @elseif ($owner->type === '2')
                                                        Hotels
                                                    @elseif ($owner->type === '3')
                                                        Transportaion & Hotels
                                                    @endif
                                                </option>
                                                <option value="1" >
                                                    Transportation
                                                </option>
                                                <option value="2" >
                                                    Hotels
                                                </option>
                                                <option value="3" >
                                                    Transportation & Hotels
                                                </option>
                                            </select>
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