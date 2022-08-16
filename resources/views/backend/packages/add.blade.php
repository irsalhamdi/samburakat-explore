@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                          <h3 class="box-title">Create New Package</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('packages.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <h5>Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="name" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Thumbnail</h5>
                                    <input type="file" name="image" class="form-control" required onChange="mainThamUrl(this)">
                                    <img src="" id="mainThmb">
                                </div>
                                <div class="form-group">
                                    <h5>Description<span class="text-danger">*</span></h5> 
                                    <div class="controls">
                                        <textarea id="editor1" name="description" rows="10" cols="80" required>
                                         </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Day<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="number" name="day" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Night<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="number" name="night" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Price<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="numbere" name="price" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Hotel</h5>
                                    <div class="controls">
                                        <select name="hotel_id" required class="form-control">
                                            <option value="" selected="" disabled="">
                                                Select Hotel
                                            </option>
                                            @foreach ($hotels as $hotel)
                                                <option value="{{ $hotel->id }}">
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