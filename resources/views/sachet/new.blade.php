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
            <h4 class="text-themecolor">Add Sachet</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Add Sachet</li>
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
                   <form action="{{url('/sachet/new')}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
                        <div class="form-body">
                            <div class="row">
                                <!-- row -->
                                <div class="col-md-8">
                                    <div class="form-group @if($errors->has('sachet_image')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Upload Sachet Images</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control form-control-danger"   name="sachet_image" id="picture">
                                            <small class="form-control-feedback">@if($errors->has('sachet_image')) {{ $errors->first('sachet_image') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('sachet_title')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Sachet Title</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger"  name="sachet_title" value="{{ old('sachet_title') }}">
                                            <small class="form-control-feedback">@if($errors->has('sachet_title')) {{ $errors->first('sachet_title') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="col-md-9">
                                             <img src="" style="width:100px;height:60px;" id="picture_show">
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

        // Picture Image
        document.getElementById("picture").onchange = function () {
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("picture_show").src = e.target.result;
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };
    </script>
@endsection


