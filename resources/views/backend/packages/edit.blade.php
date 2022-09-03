@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                          <h3 class="box-title">Edit Package</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('packages.update',$package->id) }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $package->id }}">	
                                <input type="hidden" name="old_image" value="{{ $package->thumbnail }}">	
                                <div class="form-group">
                                    <h5>Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="name" name="name" class="form-control" value="{{ $package->name}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Thumbnail</h5>
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" onChange="mainThamUrl(this)">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <img src="" id="mainThmb">
                                </div>
                                <div class="form-group">
                                    <h5>Description<span class="text-danger">*</span></h5> 
                                    <div class="controls">
                                        <textarea id="editor1" name="description" rows="10" cols="80" required>
                                            {!! $package->description !!}
                                         </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Day<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="number" name="day" class="form-control" value="{{ $package->day }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Night<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="number" name="night" class="form-control" value="{{ $package->night }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Price<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="numbere" name="price" class="form-control" value="{{ $package->price }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Hotel</h5>
                                    <div class="controls">
                                        <select name="hotel_id" value="" required class="form-control">
                                            <option value="" selected="" disabled="">
                                                Select Hotel
                                            </option>
                                            @foreach ($hotels as $hotel)
                                                <option value="{{ $hotel->id }}" {{ $hotel->id == $package->hotel_id ? 'selected' : '' }}>
                                                    {{ $hotel->name }}
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