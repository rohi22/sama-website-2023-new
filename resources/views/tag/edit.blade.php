@if(session('role') == 2 || session('role') == 1)
     <script type="text/javascript">window.location = "<?php echo asset('/dashboard'); ?>"</script>
@endif
@extends('app.app')
@section('content')
<style type="text/css">
.bootstrap-tagsinput {
    width: 100%;
}
.label {
    line-height: 2 !important;
}
</style>
 <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Edit Tag</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Edit Tag</li>
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
                    <form action="{{asset('tag/edit/'.$data->id)}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
                        <div class="form-body">
                            <div class="row">
                                <!-- row -->
                                <div class="col-md-8">
                                    <div class="form-group @if($errors->has('gt_title')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Title</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger" name="gt_title" value="{{$data->gt_title}}">
                                            <small class="form-control-feedback">@if($errors->has('gt_title')) {{ $errors->first('gt_title') }} @endif</small> 
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group @if($errors->has('gt_slug')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Slug</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger" name="gt_slug" value="{{$data->gt_slug}}">
                                            <small class="form-control-feedback">@if($errors->has('gt_slug')) {{ $errors->first('gt_slug') }} @endif</small> 
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group @if($errors->has('gt_meta_title')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Meta Title</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger" name="gt_meta_title" value="{{$data->gt_meta_title}}">
                                            <small class="form-control-feedback">@if($errors->has('gt_meta_title')) {{ $errors->first('gt_meta_title') }} @endif</small> 
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group @if($errors->has('gt_meta_key_words')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Meta Keywords</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger"  data-role="tagsinput" id="tagchange" value="{{$data->gt_meta_key_words}}">
                                            <input type="hidden" name="gt_meta_key_words" id="tags" value="{{$data->gt_meta_key_words}}">
                                            <small class="form-control-feedback">@if($errors->has('gt_meta_key_words')) {{ $errors->first('gt_meta_key_words') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('gt_og_img')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">OG Image</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control form-control-danger" name="gt_og_img" value="{{old('gt_og_img')}}" id="picture">
                                            <small class="form-control-feedback">@if($errors->has('gt_og_img')) {{ $errors->first('gt_og_img') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="col-md-9">
                                            <img src="{{url('uploads/tags/'.$data->gt_og_img)}}" style="width:100px;height:60px;" id="picture_show">
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('gt_icon')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Icon</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control form-control-danger"  id="icon" name="gt_icon" value="{{old('gt_icon')}}">
                                            <small class="form-control-feedback">@if($errors->has('gt_icon')) {{ $errors->first('gt_icon') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="col-md-9">
                                             <img src="{{url('uploads/tags/'.$data->gt_icon)}}" style="width:100px;height:60px;" id="icon_show">
                                        </div>
                                    </div>
                                     <div class="form-group @if($errors->has('gt_desc')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control form-control-danger"  id="gt_desc" name="gt_desc" value="{{$data->gt_desc}}">{{$data->gt_desc}}</textarea>
                                            <small class="form-control-feedback">@if($errors->has('gt_desc')) {{ $errors->first('gt_desc') }} @endif</small> 
                                        </div>
                                    </div>
                                    
                                    <div class="form-group @if($errors->has('gt_meta_desc')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Meta Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control form-control-danger"  id="gt_meta_desc" name="gt_meta_desc" value="{{$data->gt_meta_desc}}">{{$data->gt_meta_desc}}</textarea>
                                            <small class="form-control-feedback">@if($errors->has('gt_meta_desc')) {{ $errors->first('gt_meta_desc') }} @endif</small> 
                                        </div>
                                    </div>
                                    
                                    
                                     <div class="form-group @if($errors->has('gt_meta_descr')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Body Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control form-control-danger"  id="gt_meta_descr" name="gt_meta_descr" value="{{$data->gt_meta_descr}}">{{$data->gt_meta_descr}}</textarea>
                                            <small class="form-control-feedback">@if($errors->has('gt_meta_descr')) {{ $errors->first('gt_meta_descr') }} @endif</small> 
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
        $(document).ready(function() {
            if ($("#gt_desc").length > 0) {
                tinymce.init({
                    selector: "textarea#gt_desc",
                    theme: "modern",
                    height: 120,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                });
            }
            if ($("#gt_meta_desc").length > 0) {
                tinymce.init({
                    selector: "textarea#gt_meta_desc",
                    theme: "modern",
                    height: 120,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                });
            }
            
            
            if ($("#gt_meta_descr").length > 0) {
                tinymce.init({
                    selector: "textarea#gt_meta_descr",
                    theme: "modern",
                    height: 120,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                });
            }

                $('#tagchange').on('itemAdded', function(event) {
                      $("#tags").val($("#tagchange").tagsinput('items'));
                });
                $('#tagchange').on('itemRemoved', function(event) {
                  $("#tags").val($("#tagchange").tagsinput('items'));
                });
        });

        // OG Image
        document.getElementById("picture").onchange = function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("picture_show").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };
        // Icon Image
        document.getElementById("icon").onchange = function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("icon_show").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };

        /* Slug */
        $("input[name=gt_title]").focusout(function() {
            var s = $(this).val();
            var str = s.trim();
            str1 = str.replace(/[^a-zA-Z0-9\s]/g, "");
            str2 = str1.toLowerCase();
            slug = str2.replace(/\s/g, '-');
            $("input[name=gt_slug]").val(slug);

        });
    </script>
@endsection


