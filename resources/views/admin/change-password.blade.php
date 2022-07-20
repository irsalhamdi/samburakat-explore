@extends('admin.admin-master')
@section('admin')

    <div class="container-full">
        <section class="content">
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Admin Change Password</h4>
               </div>
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="POST" action="{{ route('admin.update-password') }}">
                         @csrf
                         <div class="row">
                           <div class="col-12">	
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Current Password<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="current_password" type="password" name="oldpassword" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>New Password<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="password" type="password" name="password" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Confirm Password<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
                                            </div>
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
@endsection
