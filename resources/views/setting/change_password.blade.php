@if(session('role') == 2 || session('role') == 1)
  <script type="text/javascript">window.location = "<?php echo asset('/dashboard'); ?>"</script>
@endif
@extends('app.app')
@section('content')
 <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Change Password</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Change Password</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
  
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-body">
                    <form action="{{url('/setting/change-password')}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
                        <div class="form-body">
                            <div class="row">
                                <!-- row -->
                                <div class="col-md-8">
                                    <div class="form-group @if($errors->has('current_password')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Current Password</label>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control form-control-danger" name="current_password" value="{{old('current_password')}}">
                                            <small class="form-control-feedback">@if($errors->has('current_password')) {{ $errors->first('current_password') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('new_password')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">New Password</label>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control form-control-danger" name="new_password" value="{{old('new_password')}}">
                                            <small class="form-control-feedback">@if($errors->has('new_password')) {{ $errors->first('new_password') }} @endif</small> 
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="col-md-9">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
</div>
@endsection


