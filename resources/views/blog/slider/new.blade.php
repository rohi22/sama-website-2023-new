@if(session('role') == 1)
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
            <h4 class="text-themecolor">Add Blog Slider</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Add Blog Slider</li>
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
                   <form action="{{url('/blog/slider/new')}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
                        <div class="form-body">
                            <div class="row">
                                <!-- row -->
                                <div class="col-md-8"> 
                                    <div class="form-group @if($errors->has('s_image1')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Large Image</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control form-control-danger" name="s_image1" id="img1">
                                            <small class="form-control-feedback">@if($errors->has('s_image1')) {{ $errors->first('s_image1') }} @endif</small> 
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="col-md-9">
                                             <img src="" style="width:100px;height:60px;" id="img1_show">
                                        </div>
                                    </div>

                                    <div class="form-group @if($errors->has('s_image2')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Small 1 Image</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control form-control-danger" name="s_image2" id="img2">
                                            <small class="form-control-feedback">@if($errors->has('s_image2')) {{ $errors->first('s_image2') }} @endif</small> 
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="col-md-9">
                                             <img src="" style="width:100px;height:60px;" id="img2_show">
                                        </div>
                                    </div>

                                    <div class="form-group @if($errors->has('s_image3')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Small 3 Image</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control form-control-danger"name="s_image3" id="img3">
                                            <small class="form-control-feedback">@if($errors->has('s_image3')) {{ $errors->first('s_image3') }} @endif</small> 
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="col-md-9">
                                             <img src="" style="width:100px;height:60px;" id="img3_show">
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
        // Image 1

        document.getElementById("img1").onchange = function () {
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("img1_show").src = e.target.result;
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };

         // Image 2

        document.getElementById("img2").onchange = function () {
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("img2_show").src = e.target.result;
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };

         // Image 3

        document.getElementById("img3").onchange = function () {
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("img3_show").src = e.target.result;
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };
    </script>
@endsection


