@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                          <h3 class="box-title">Edit Hotel</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('hotel.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <h5>Hotel Owner<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="owner_id" required class="form-control">
                                            <option value="" selected="" disabled="">
                                                Select Hotel Owner
                                            </option>
                                            @foreach ($owners as $owner)
                                                <option value="{{ $owner->id }}">
                                                    <option value="{{ $owner->id }}" {{ $owner->id == $hotel->owner_id ? 'selected' : '' }}>
                                                    {{ $owner->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="name" name="name" value="{{ $hotel->name }}" class="form-control" required>
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
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Hotel Gallery <strong>Edit</strong></h4>
                        </div>
                        <form method="POST" action="{{ route('hotel-gallery.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row row-sm">
                                @foreach($galleries as $img)
                                    <div class="col-md-3">
                                        <div class="card mt-3">
                                            <img src="{{ asset($img->image) }}" class="card-img-top" style="height: 130px; width: 280px;">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <a href="{{ route('hotel-gallery.delete',$img->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i> </a>
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
    </div>

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