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
            <h4 class="text-themecolor">Add User</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Add User</li>
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
                    <form action="{{asset('admin/new')}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
                        <div class="form-body">
                            <div class="row">
                                <!-- row -->
                                <div class="col-md-8">
                                    <div class="form-group @if($errors->has('name')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger" name="name" value="{{old('name')}}">
                                            <small class="form-control-feedback">@if($errors->has('name')) {{ $errors->first('name') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('contact')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Contact Number</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger" name="contact" value="{{old('contact')}}">
                                            <small class="form-control-feedback">@if($errors->has('contact')) {{ $errors->first('contact') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('email')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Email</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger" name="email" value="{{old('email')}}">
                                            <small class="form-control-feedback">@if($errors->has('email')) {{ $errors->first('email') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('password')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Password</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger"  name="password" value="{{old('password')}}">
                                            <small class="form-control-feedback">@if($errors->has('password')) {{ $errors->first('password') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('role')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Role</label>
                                        <div class="col-md-9">
                                            <select class="form-control form-control-danger"  name="role">
                                                <option value="">Select User</option>
                                                <option value="1">Sama Data Entry User</option>
                                                <option value="2">Blog User</option>
                                            </select>
                                            <small class="form-control-feedback">@if($errors->has('role')) {{ $errors->first('role') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('bio_desc')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Bio</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control form-control-danger"  id="bio_desc" name="bio_desc" value="{{old('bio_desc')}}">{{old('bio_desc')}}</textarea>
                                            <small class="form-control-feedback">@if($errors->has('bio_desc')) {{ $errors->first('bio_desc') }} @endif</small> 
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
@section('page-scripts')
    <script>
        $(document).ready(function() {
            if ($("#bio_desc").length > 0) {
                tinymce.init({
                    selector: "textarea#bio_desc",
                    theme: "modern",
                    height: 200,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

                });
            }
        });
    </script>
@endsection


