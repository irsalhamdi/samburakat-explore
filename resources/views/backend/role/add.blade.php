@extends('admin.admin-master')
@section('admin')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<div class="container-full">
		<section class="content">
			<div class="box">
				<div class="box-header with-border">
					<h4 class="box-title">Create New Admin</h4>
				</div>
				<div class="box-body">
				<div class="row">
					<div class="col">
						<form method="post" action="{{ route('role-admin.store') }}" enctype="multipart/form-data" >
							@csrf
							<div class="row">
								<div class="col-12">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<h5>Name<span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="text" name="name" class="form-control" required> 
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<h5>Email<span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="email" name="email" class="form-control" required>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<h5>Village<span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="village_id" required class="form-control">
														<option value="" selected="" disabled="">
															Select Village
														</option>
														@foreach ($villages as $village)
															<option value="{{ $village->id }}">
																{{ $village->name }}
															</option>
														@endforeach
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<h5>Phone  <span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="number" name="phone" class="form-control" required>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<h5>Password  <span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="password" name="password" class="form-control" required>
												</div>
											</div>
										</div> 
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<h5>Admin Image <span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="file" name="profile_photo_path" class="form-control" required="" id="image">
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
														<input type="checkbox" id="checkbox_1" name="role" value="1">
														<label for="checkbox_1">Role</label>
													</fieldset>
													<fieldset>
														<input type="checkbox" id="checkbox_2" name="destination" value="1">
														<label for="checkbox_2">Destination</label>
													</fieldset>
													<fieldset>
														<input type="checkbox" id="checkbox_3" name="transportation" value="1">
														<label for="checkbox_3">Transportation</label>
													</fieldset>
													<fieldset>
														<input type="checkbox" id="checkbox_4" name="hotel" value="1">
														<label for="checkbox_4">Hotel</label>
													</fieldset>
													<fieldset>
														<input type="checkbox" id="checkbox_5" name="setting" value="1">
														<label for="checkbox_5">Setting</label>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<div class="controls">
													<fieldset>
														<input type="checkbox" id="checkbox_6" name="packages" value="1">
														<label for="checkbox_6">Packages</label>
													</fieldset>
													<fieldset>
														<input type="checkbox" id="checkbox_7" name="booking" value="1">
														<label for="checkbox_7">Booking</label>
													</fieldset>
													<fieldset>
														<input type="checkbox" id="checkbox_8" name="owner" value="1">
														<label for="checkbox_8">Owner</label>
													</fieldset>
													<fieldset>
														<input type="checkbox" id="checkbox_9" name="testimoni" value="1">
														<label for="checkbox_9">Testimoni</label>
													</fieldset>
												</div>
											</div>
										</div>
									</div>
									<div class="text-xs-right">
										<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Submit">					 
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