@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                          <h3 class="box-title">Create New Hotel</h3>
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
                                                    {{ $owner->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="name" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Image</h5>
                                    <input type="file" id="multiImg" name="image[]" class="form-control" required multiple>
                                    <div id="preview_img"></div>
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