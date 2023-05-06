@if(session('role') == 1)
    <script type="text/javascript">window.location = "<?php echo asset('/dashboard'); ?>"</script>
@endif
@extends('app.app')
@section('content')
<style>
    #preview > img
    {

    width: 100px;
    height: 100px;
    padding: 10px;

    }
</style>
 <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">About Us</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">About Us</li>
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
                                <form action="{{url('/blog/about-us')}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
                                    <div class="form-body">
                                        @if(session()->has('message'))<div class="alert alert-success col-md-5" style="text-align: center;left: 24%;">{{ session()->get('message') }}</div>@endif
                                        <div class="row">
                                            <!-- row -->
                                            <div class="col-md-8">
                                                <div class="form-group @if($errors->has('title')) has-danger @endif row">
                                                    <label class="control-label text-right col-md-3">Title</label>
                                                    <div class="col-md-9">
                                                         <textarea id="title" name="title" value="{{$about->title}}">{{$about->title}}</textarea>
                                                        <small class="form-control-feedback">@if($errors->has('title')) {{ $errors->first('title') }} @endif</small> 
                                                    </div>
                                                </div>
                                                <div class="form-group @if($errors->has('desc')) has-danger @endif row">
                                                    <label class="control-label text-right col-md-3">Long Descrition</label>
                                                    <div class="col-md-9">
                                                         <textarea id="desc" name="desc" value="{{$about->desc}}">{{$about->desc}}</textarea>
                                                        <small class="form-control-feedback">@if($errors->has('desc')) {{ $errors->first('desc') }} @endif</small> 
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
            if ($("#desc").length > 0) {
                tinymce.init({
                    selector: "textarea#desc",
                    theme: "modern",
                    height: 300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

                });
            }
            if ($("#title").length > 0) {
                tinymce.init({
                    selector: "textarea#title",
                    theme: "modern",
                    height: 100,
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
