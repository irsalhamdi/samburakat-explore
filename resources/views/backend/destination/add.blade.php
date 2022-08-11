@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
      <section class="content">
        <div class="row"> 
          <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Destination</h3>
                </div>
                <div class="box-body">
                    <form method="POST" action="{{ route('destination.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <h5>Destination Type</h5>
                            <div class="controls">
                                <select name="destination_type_id" required class="form-control">
                                    <option value="" selected="" disabled="">
                                        Select Type
                                    </option>
                                    @foreach ($destinationtypes as $destinationtype)
                                        <option value="{{ $destinationtype->id }}">
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
                                        <option value="{{ $village->id }}">
                                            {{ $village->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Thumbnail</h5>
                            <input type="file" name="thumbnail" class="form-control" required onChange="mainThamUrl(this)">
                            <img src="" id="mainThmb">
                        </div>
                        <div class="form-group">
                            <h5>Image</h5>
                            <input type="file" id="multiImg" name="image[]" class="form-control" required multiple>
                            <div id="preview_img"></div>
                        </div>
                        <div class="form-group">
                            <h5>Description<span class="text-danger">*</span></h5> 
                            <div class="controls">
                                <textarea id="editor1" name="description" rows="10" cols="80" required>
                                 </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Guide<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="guide" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Price<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="number" name="price" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Location<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <textarea name="location" id="" cols="30" rows="10" class="form-control" required></textarea>
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