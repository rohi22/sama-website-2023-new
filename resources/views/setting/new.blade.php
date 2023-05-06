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
                        <h4 class="text-themecolor">Settings</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Settings</li>
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
                                <form action="{{url('/setting/new')}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
                                    <div class="form-body">
                                        @if(session()->has('message'))<div class="alert alert-success col-md-5" style="text-align: center;left: 24%;">{{ session()->get('message') }}</div>@endif
                                        <div class="row">
                                            <!-- row -->
                                                <div class=" row col-md-12">
                                                    <div class="form-group @if($errors->has('header_logo')) has-danger @endif col-md-6">
                                                        <label class="control-label text-right col-md-3">Upload Header Logo</label>
                                                        <div class="col-md-9">
                                                             <input type="file" class="form-control form-control-danger" name="header_logo" id="header_logo">
                                                            <small class="form-control-feedback">@if($errors->has('header_logo')) {{ $errors->first('header_logo') }} @endif</small> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label text-right col-md-3"></label>
                                                        <div class="col-md-9">
                                                           <img src="{{asset('uploads/logos/'.$logos->header_logo)}}" style="width:200px;height:100px;" id="header_image">
                                                        </div>
                                                    </div>

                                                    <div class="form-group @if($errors->has('footer_logo')) has-danger @endif col-md-6">
                                                        <label class="control-label text-right col-md-3">Upload Footer Logo</label>
                                                        <div class="col-md-9">
                                                             <input type="file" class="form-control form-control-danger" name="footer_logo" id="footer_logo">
                                                            <small class="form-control-feedback">@if($errors->has('footer_logo')) {{ $errors->first('footer_logo') }} @endif</small> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label text-right col-md-3"></label>
                                                        <div class="col-md-9">
                                                          <img src="{{asset('uploads/logos/'.$logos->footer_logo)}}" style="width:200px;height:100px;" id="footer_image">
                                                        </div>
                                                    </div>

                                                    <div class="form-group @if($errors->has('favicon_logo')) has-danger @endif col-md-6">
                                                        <label class="control-label text-right col-md-3">Upload Favicon</label>
                                                        <div class="col-md-9">
                                                             <input type="file" class="form-control form-control-danger" name="favicon_logo" id="favicon_logo">
                                                            <small class="form-control-feedback">@if($errors->has('favicon_logo')) {{ $errors->first('favicon_logo') }} @endif</small> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label text-right col-md-3"></label>
                                                        <div class="col-md-9">
                                                         <img src="{{asset('uploads/logos/'.$logos->favicon_logo)}}" style="width:50px;height:50px;" id="favicon_image">
                                                        </div>
                                                    </div>

                                                    <div class="form-group @if($errors->has('footer_logo')) has-danger @endif col-md-6">
                                                        <label class="control-label text-right col-md-3">Home Icon</label>
                                                        <div class="col-md-6">
                                                             <input type="text" class="form-control input-sm" value="<i class='fa fa-home'></i>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label text-right col-md-6">Copy icon code & paste for home icon</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control form-control-danger" name="favicon_logo" id="favicon_logo">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label text-right col-md-3">Meta Title</label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control form-control-danger" name="meta_title" id="meta_title" value="{{$logos->meta_title}}">{{$logos->meta_title}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label text-right col-md-3">Meta Description</label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control form-control-danger" name="meta_desc" id="meta_desc" value="{{$logos->meta_desc}}">{{$logos->meta_desc}}</textarea>
                                                        </div>
                                                    </div>
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <button type="submit" class="btn btn-success">Update</button>
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
    
        if ($("#meta_titlea").length > 0) {
            tinymce.init({
                selector: "textarea#meta_title",
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
        if ($("#meta_desca").length > 0) {
            tinymce.init({
                selector: "textarea#meta_desc",
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
         // Header Logo

        document.getElementById("header_logo").onchange = function () {
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("header_image").src = e.target.result;
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };


        // Footer Logo
        
        document.getElementById("footer_logo").onchange = function () {
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("footer_image").src = e.target.result;
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };

         // Favicon Logo
        
        document.getElementById("favicon_logo").onchange = function () {
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("favicon_image").src = e.target.result;
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };
    </script>
@endsection
