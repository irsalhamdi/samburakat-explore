@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
      <section class="content">
        <div class="row"> 
          <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Update Destination</h3>
                </div>
                <div class="box-body">
                    <form method="POST" action="{{ route('destination.update', $data->id) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">	
                        <input type="hidden" name="old_image" value="{{ $data->image }}">	
                        <div class="form-group">
                            <h5>Destination Type</h5>
                            <div class="controls">
                                <select name="destination_type_id" required class="form-control">
                                    <option value="" selected="" disabled="">
                                        Select Type
                                    </option>
                                    @foreach ($destinationtypes as $destinationtype)
                                        <option value="{{ $destinationtype->id }}" {{ $destinationtype->id == $data->destination_type_id ? 'selected' : '' }}>
                                            {{ $destinationtype->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Village</h5>
                            <div class="controls">
                                <select name="village_id" required class="form-control">
                                    <option value="" selected="" disabled="">
                                        Select Village
                                    </option>
                                    @foreach ($villages as $village)
                                        <option value="{{ $village->id }}" {{ $village->id == $data->village_id ? 'selected' : '' }}>
                                            {{ $village->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="name" class="form-control" value="{{ $data->name }}" required>
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
                                <input type="text" name="guide" class="form-control" value="{{ $data->guide }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Price<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="number" name="price" class="form-control" value="{{ $data->price }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Location<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="location" class="form-control" required>
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
      <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Destination Gallery <strong>Update</strong></h4>
                    </div>
                    <form method="POST" action="{{ route('destination-gallery.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                            @foreach($galleries as $img)
                                <div class="col-md-3">
                                    <div class="card mt-3">
                                        <img src="{{ asset($img->image) }}" class="card-img-top" style="height: 130px; width: 280px;">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="{{ route('destination-gallery-delete',$img->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i> </a>
                                            </h5>
                                            <p class="card-text"> 
                                                <div class="form-group">
                                                    <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                    <input class="form-control" type="file" name="multi_img[{{ $img->id }}]">
                                                </div> 
                                            </p>
                                        </div> 
                                    </div> 		
                                </div>
                            @endforeach
                        </div>			
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                        </div>
                        <br><br>
                    </form>		   
                </div>
            </div>
        </div>
      </section>
      <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Destination Image <strong>Update</strong></h4>
                    </div>
                    <form method="post" action="{{ route('destination-image-update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="old_img" value="{{ $data->image }}">
                        <div class="row row-sm">
                            <div class="col-md-3">
                                <div class="card mt-3">
                                    <img src="{{ asset($data->image) }}" class="card-img-top" style="height: 130px; width: 280px;">
                                    <div class="card-body">
                                        <p class="card-text"> 
                                            <div class="form-group">
                                                <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                <input type="file" name="image" class="form-control" onChange="mainThamUrl(this)"  >
                                                <img src="" id="mainThmb">
                                            </div> 
                                        </p>
                                    </div>
                                </div> 		
                            </div>
                        </div>			
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                        </div>
                        <br><br>
                    </form>		   
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('#multiImg').on('change', function(){
                if (window.File && window.FileReader && window.FileList && window.Blob){
                    var data = $(this)[0].files;
           
                    $.each(data, function(index, file){
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){

                            var fRead = new FileReader();
                            fRead.onload = (function(file){

                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80).height(80); 
                                    $('#preview_img').append(img);
                                };

                            })(file);

                            fRead.readAsDataURL(file);
                        }
                    });
           
                }else{
                    alert("Your browser doesn't support File API!");
                }
            });
        });
    </script>
@endsection