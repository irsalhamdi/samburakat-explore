@extends('admin.admin-master')
@section('admin')
	<div class="container-full">
		<section class="content">
		    <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Transportation</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('transportation.update',$transportation->id) }}">
                                    @csrf 	
                                    <div class="form-group">
                                        <h5>Owner</h5>
                                        <div class="controls">
                                            <select name="owner_id" required class="form-control">
                                                <option value="" selected="" disabled="">
                                                    Select Owner
                                                </option>
                                                @foreach ($owners as $owner)
                                                    <option value="{{ $owner->id }}" {{ $owner->id == $transportation->owner_id ? 'selected' : '' }}>
                                                        {{ $owner->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>	   
                                    <div class="form-group">
                                        <h5>Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"  name="name" value="{{ $transportation->name }}" class="form-control" required> 
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