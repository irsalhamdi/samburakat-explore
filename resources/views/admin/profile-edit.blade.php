@extends('admin.admin-master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-full">
        <section class="content">
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Admin Profile Edit</h4>
               </div>
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="POST" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                         @csrf
                         <div class="row">
                           <div class="col-12">	
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="name" name="name" class="form-control" required value="{{ $admin->name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Email<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control" required value="{{ $admin->email }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Profile Photo<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="profile_photo_path" class="form-control" id="image"> </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <img id="showImage" src="{{ (!empty($admin->profile_photo_path)) ? url('upload/admin-profile/'.$admin->profile_photo_path) : url('upload/default.jpg') }}" style="width: 100px; height: 100px;">
                                    </div>
                                </div>
                           </div>
                         </div>
                           <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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
