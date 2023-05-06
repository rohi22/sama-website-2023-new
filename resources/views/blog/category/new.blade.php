@if(session('role') == 1)
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
            <h4 class="text-themecolor">Add Blog Category</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Add Blog Category</li>
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
                    <form action="{{asset('/blog/category/new')}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
                        <div class="form-body">
                            <div class="row">
                                <!-- row -->
                                <div class="col-md-8">
                                    <div class="form-group @if($errors->has('cat_title')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Title</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger"  name="cat_title" value="{{ old('cat_title') }}">
                                            <small class="form-control-feedback">@if($errors->has('cat_title')) {{ $errors->first('cat_title') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('cat_desc')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control form-control-danger" id="cat_desc"  name="cat_desc" value="{{ old('cat_desc') }}">{{ old('cat_desc') }}</textarea>
                                            <small class="form-control-feedback">@if($errors->has('cat_desc')) {{ $errors->first('cat_desc') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('cat_meta_desc')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Meta Description</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger" name="cat_meta_desc" value="{{ old('cat_meta_desc') }}">
                                            <small class="form-control-feedback">@if($errors->has('cat_meta_desc')) {{ $errors->first('cat_meta_desc') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('cat_meta_keyword')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Tags</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger"  data-role="tagsinput" id="tagchange">
                                            <input type="hidden" name="cat_meta_keyword" id="tags">
                                            <small class="form-control-feedback">@if($errors->has('cat_meta_keyword')) {{ $errors->first('cat_meta_keyword') }} @endif</small> 
                                        </div>
                                    </div>
                                     <div class="form-group @if($errors->has('cat_meta_tags')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Meta Keywords</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger"  data-role="tagsinput" id="keytagchange">
                                            <input type="hidden" name="cat_meta_tags" id="meta_tags">
                                            <small class="form-control-feedback">@if($errors->has('cat_meta_tags')) {{ $errors->first('cat_meta_tags') }} @endif</small> 
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
         
                $('#tagchange').on('itemAdded', function(event) {

                    $("#tags").val($("#tagchange").tagsinput('items'));
  
                });
                $('#tagchange').on('itemRemoved', function(event) {

                  $("#tags").val($("#tagchange").tagsinput('items'));

                });


                $('#keytagchange').on('itemAdded', function(event) {

                    $("#meta_tags").val($("#keytagchange").tagsinput('items'));
  
                });
                $('#keytagchange').on('itemRemoved', function(event) {

                  $("#meta_tags").val($("#keytagchange").tagsinput('items'));

                });
        });
         $(document).ready(function() {
            if ($("#cat_desc").length > 0) {
                tinymce.init({
                    selector: "textarea#cat_desc",
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


