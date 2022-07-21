@extends('admin.admin-master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                            <label class="info-title" for="exampleInputEmail1">
                                Province
                            </label>
                            <select name="province_id" required class="form-control">
                                <option value="" selected="" disabled="">
                                    Select Province
                                </option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">
                                        {{ $province->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">
                                Regency
                            </label>
                            <select name="regency_id" required class="form-control">
                                <option value="" selected="" disabled="">
                                    Select Regency
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">
                                District
                            </label>
                            <select name="district_id" required class="form-control">
                                <option value="" selected="" disabled="">
                                    Select District
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">
                                Village
                            </label>
                            <select name="village_id" required class="form-control">
                                <option value="" selected="" disabled="">
                                    Select Village
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h5>Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Image<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="image" class="form-control" required> 
                            </div>
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
                                <input type="text" name="price" class="form-control" required>
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
        $(document).ready(function() {
            $('select[name="province_id"]').on('change', function(){
                var province_id = $(this).val();
                if(province_id) {
                    $.ajax({
                        url: "{{  url('/get-regency/ajax') }}/"+province_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            $('select[name="district_id"]').empty(); 
                            $('select[name="village_id"]').empty(); 
                        var d =$('select[name="regency_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="regency_id"]').append('<option value="'+ value.id +'">' + value.name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
            $('select[name="regency_id"]').on('change', function(){
                var regency_id = $(this).val();
                if(regency_id) {
                    $.ajax({
                        url: "{{  url('/get-district/ajax') }}/" + regency_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                        var d =$('select[name="district_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
            $('select[name="district_id"]').on('change', function(){
                var district_id = $(this).val();
                if(district_id) {
                    $.ajax({
                        url: "{{  url('/get-village/ajax') }}/" + district_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                        var d =$('select[name="village_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="village_id"]').append('<option value="'+ value.id +'">' + value.name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection