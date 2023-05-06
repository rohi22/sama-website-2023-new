@if(session('role') == 2)
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
            <h4 class="text-themecolor">Contact Us</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Contact Us</li>
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
                    <form action="{{url('/setting/contact-us-page')}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
                        <div class="form-body">
                            <div class="row">
                                <!-- row -->
                                <div class="col-md-8">
                                    <div class="form-group @if($errors->has('title')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Title</label>
                                        <div class="col-md-9">
                                             <textarea class="form-control input-sm"  name="title" value="{{$data->title}}">{{$data->title}}</textarea>
                                            <small class="form-control-feedback">@if($errors->has('title')) {{ $errors->first('title') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-9"><h4>Section 1</h4></div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="form-group @if($errors->has('s_1_name')) has-danger @endif col-md-4">
                                            <label>Country Name</label>
                                            <input type="text" class="form-control"  name="s_1_name" value="{{$data->s_1_name}}">
                                             <small class="form-control-feedback">@if($errors->has('s_1_name')) {{ $errors->first('s_1_name') }} @endif</small> 
                                        </div>
                                        <div class="form-group @if($errors->has('s_1_email')) has-danger @endif col-md-4">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="s_1_email" value="{{$data->s_1_email}}">
                                             <small class="form-control-feedback">@if($errors->has('s_1_email')) {{ $errors->first('s_1_email') }} @endif</small> 
                                        </div>
                                        <div class="form-group @if($errors->has('s_1_phone')) has-danger @endif col-md-4">
                                            <label>Phone</label>
                                            <input type="text" class="form-control"  name="s_1_phone" value="{{$data->s_1_phone}}">
                                             <small class="form-control-feedback">@if($errors->has('s_1_phone')) {{ $errors->first('s_1_phone') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-9"><h4>Section 2</h4></div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="form-group @if($errors->has('s_2_name')) has-danger @endif col-md-4">
                                            <label>Country Name</label>
                                            <input type="text" class="form-control"  name="s_2_name" value="{{$data->s_2_name}}">
                                             <small class="form-control-feedback">@if($errors->has('s_2_name')) {{ $errors->first('s_2_name') }} @endif</small> 
                                        </div>
                                        <div class="form-group @if($errors->has('s_2_email')) has-danger @endif col-md-4">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="s_2_email" value="{{$data->s_2_email}}">
                                             <small class="form-control-feedback">@if($errors->has('s_2_email')) {{ $errors->first('s_2_email') }} @endif</small> 
                                        </div>
                                        <div class="form-group @if($errors->has('s_2_phone')) has-danger @endif col-md-4">
                                            <label>Phone</label>
                                            <input type="text" class="form-control"  name="s_2_phone" value="{{$data->s_2_phone}}">
                                             <small class="form-control-feedback">@if($errors->has('s_2_phone')) {{ $errors->first('s_2_phone') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-9"><h4>Section 3</h4></div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="form-group @if($errors->has('s_3_name')) has-danger @endif col-md-4">
                                            <label>Country Name</label>
                                            <input type="text" class="form-control"  name="s_3_name" value="{{$data->s_3_name}}">
                                             <small class="form-control-feedback">@if($errors->has('s_3_name')) {{ $errors->first('s_3_name') }} @endif</small> 
                                        </div>
                                        <div class="form-group @if($errors->has('s_3_email')) has-danger @endif col-md-4">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="s_3_email" value="{{$data->s_3_email}}">
                                             <small class="form-control-feedback">@if($errors->has('s_3_email')) {{ $errors->first('s_3_email') }} @endif</small> 
                                        </div>
                                        <div class="form-group @if($errors->has('s_3_phone')) has-danger @endif col-md-4">
                                            <label>Phone</label>
                                            <input type="text" class="form-control"  name="s_3_phone" value="{{$data->s_3_phone}}">
                                             <small class="form-control-feedback">@if($errors->has('s_3_phone')) {{ $errors->first('s_3_phone') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-9"><h4>Section 4</h4></div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="form-group @if($errors->has('s_4_name')) has-danger @endif col-md-4">
                                            <label>Country Name</label>
                                            <input type="text" class="form-control"  name="s_4_name" value="{{$data->s_4_name}}">
                                             <small class="form-control-feedback">@if($errors->has('s_4_name')) {{ $errors->first('s_4_name') }} @endif</small> 
                                        </div>
                                        <div class="form-group @if($errors->has('s_4_email')) has-danger @endif col-md-4">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="s_4_email" value="{{$data->s_4_email}}">
                                             <small class="form-control-feedback">@if($errors->has('s_4_email')) {{ $errors->first('s_4_email') }} @endif</small> 
                                        </div>
                                        <div class="form-group @if($errors->has('s_4_phone')) has-danger @endif col-md-4">
                                            <label>Phone</label>
                                            <input type="text" class="form-control"  name="s_4_phone" value="{{$data->s_4_phone}}">
                                             <small class="form-control-feedback">@if($errors->has('s_4_phone')) {{ $errors->first('s_4_phone') }} @endif</small> 
                                        </div>

                                         <div class="form-group @if($errors->has('s_4_title')) has-danger @endif col-md-4">
                                            <label>Title</label>
                                            <input type="text" class="form-control"   name="s_4_title" value="{{$data->s_4_title}}">
                                             <small class="form-control-feedback">@if($errors->has('s_4_title')) {{ $errors->first('s_4_title') }} @endif</small> 
                                        </div>

                                         <div class="form-group @if($errors->has('s_4_address')) has-danger @endif col-md-4">
                                            <label>Address</label>
                                            <input type="text" class="form-control"   name="s_4_address" value="{{$data->s_4_address}}">
                                             <small class="form-control-feedback">@if($errors->has('s_4_address')) {{ $errors->first('s_4_address') }} @endif</small> 
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

