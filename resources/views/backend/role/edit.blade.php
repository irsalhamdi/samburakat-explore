@extends('admin.admin-master')
@section('admin')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<div class="container-full">
		<section class="content">
			<div class="box">
				<div class="box-header with-border">
					<h4 class="box-title">Edit Admin</h4>
				</div>
				<div class="box-body">
				<div class="row">
					<div class="col">
						<form method="post" action="{{ route('role.admin.update',$admin->id) }}" enctype="multipart/form-data" >
							@csrf
                            <input type="hidden" name="id" value="{{ $admin->id }}">	
                            <input type="hidden" name="old_image" value="{{ $admin->profile_photo_path }}">
							<div class="row">
								<div class="col-12">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<h5>Name<span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="text" name="name" value="{{ $admin->name }}" class="form-control" required> 
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<h5>Email<span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="email" name="email" value="{{ $admin->email }}" class="form-control" required>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Village<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="village_id" required class="form-control">
                                                        <option value="" selected="" disabled="">
                                                            Select Owner
                                                        </option>
                                                        @foreach ($villages as $village)
                                                            <option value="{{ $village->id }}" {{ $village->id == $admin->village_id ? 'selected' : '' }}>
                                                                {{ $village->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<h5>Phone<span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="number" name="phone" value="{{ $admin->phone }}" class="form-control" required>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<h5>Admin Image<span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="file" name="profile_photo_path" class="form-control" id="image">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<img id="showImage" src="{{ url('upload/default.jpg') }}" style="width: 100px; height: 100px;">				
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<div class="controls">
													<fieldset>
														<input type="checkbox" id="checkbox_1" name="role" value="1" {{ $admin->role == 1 ? 'checked' : '' }}>
														<label for="checkbox_1">Role</label>
													</fieldset>
													<fieldset>
														<input type="checkbox" id="checkbox_2" name="destination" value="1" {{ $admin->destination == 1 ? 'checked' : '' }}>
														<label for="checkbox_2">Destination</label>
													</fieldset>
													<fieldset>
														<input type="checkbox" id="checkbox_3" name="transportation" value="1" {{ $admin->transportation == 1 ? "checked" : ''}}>
														<label for="checkbox_3">Transportation</label>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<div class="controls">
													<fieldset>
														<input type="checkbox" id="checkbox_4" name="packages" value="1" {{ $admin->packages == 1 ? 'checked' : '' }}>
														<label for="checkbox_4">Packages</label>
													</fieldset>
													<fieldset>
														<input type="checkbox" id="checkbox_5" name="booking" value="1" {{ $admin->booking == 1 ? 'checked' : '1'}}>
														<label for="checkbox_5">Booking</label>
													</fieldset>
												</div>
											</div>
										</div>
									</div>
									<div class="text-xs-right">
										<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update ">					 
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				</div>
			</div>
		</section>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#image').change(function(e){
				var reader = new FileReader();
				reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);	
				}
				reader.readAsDataURL(e.target.files['0']);
			});
		});
	</script>
@endsection