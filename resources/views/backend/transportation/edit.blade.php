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
                                    <input type="hidden" name="id" value="{{ $transportation->id }}">	
                                    <input type="hidden" name="old_image" value="{{ $transportation->image }}">
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
                                    <div class="form-group">
                                        <h5>Image</h5>
                                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" onChange="mainThamUrl(this)">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <img src="" id="mainThmb">
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
    <script type="text/javascript">
        function mainThamUrl(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }    
    </script>  
@endsection