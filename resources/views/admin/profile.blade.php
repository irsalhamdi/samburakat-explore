@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="box box-widget widget-user">
					<div class="widget-user-header bg-black">
					  <h3 class="widget-user-username">{{ $admin->name }}</h3>
                      <a href="{{ route('admin.profile.edit') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">
                        Edit Profile  
                      </a>
					  <h6 class="widget-user-desc">{{ $admin->email }}</h6>
					</div>
					<div class="widget-user-image">
					  <img class="rounded-circle" src="{{ (!empty($admin->profile_photo_path)) ? asset($admin->profile_photo_path) : url('upload/default.jpg') || (!empty($admin->profile_photo_path)) ? url('upload/admin-profile/'.$admin->profile_photo_path) : url('upload/default.jpg') }}">
					</div>
					<div class="box-footer">
					  <div class="row">
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">{{ $admin->village_id }}</h5>
							<span class="description-text">Village</span>
						  </div>
						</div>
						<div class="col-sm-4 br-1 bl-1">
						  <div class="description-block">
						  </div>
						</div>
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">{{ $admin->phone }}</h5>
							<span class="description-text">Phone</span>
						  </div>
						</div>
					  </div>
					</div>
				</div>
            </div>
        </section>
    </div>    
@endsection
