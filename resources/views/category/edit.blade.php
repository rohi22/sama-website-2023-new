@if(session('role') == 2)
    <script type="text/javascript">window.location = '/dashboard';</script>
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
            <h4 class="text-themecolor">Edit Category</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Edit Category</li>
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
                     <form action="{{url('/category/edit/'.$data->id)}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
                        <div class="form-body">
                            <div class="row">
                                <!-- row -->
                                <div class="col-md-8">
                                    <div class="form-group @if($errors->has('cat_title')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Title</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger"  name="cat_title" value="{{ $data->cat_title }}">
                                            <small class="form-control-feedback">@if($errors->has('cat_title')) {{ $errors->first('cat_title') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('cat_slug')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Slug</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger"  name="cat_slug" value="{{ $data->cat_slug }}">
                                            <small class="form-control-feedback">@if($errors->has('cat_slug')) {{ $errors->first('cat_slug') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('cat_meta_title')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3"> Meta Title</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger" name="cat_meta_title" value="{{ $data->cat_meta_title }}">
                                            <small class="form-control-feedback">@if($errors->has('cat_meta_title')) {{ $errors->first('cat_meta_title') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('cat_desc')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Description</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger"   name="cat_desc" value="{{ $data->cat_desc }}">
                                            <small class="form-control-feedback">@if($errors->has('cat_desc')) {{ $errors->first('cat_desc') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('cat_meta_desc')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Meta Description</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger" name="cat_meta_desc" value="{{ $data->cat_meta_desc }}">
                                            <small class="form-control-feedback">@if($errors->has('cat_meta_desc')) {{ $errors->first('cat_meta_desc') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('cat_meta_keyword')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Meta Keywords</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger"  data-role="tagsinput" id="tagchange" value="{{$tags}}">
                                            <input type="hidden" name="cat_meta_keyword" id="tags" value="{{$tags}}">
                                            <small class="form-control-feedback">@if($errors->has('cat_meta_keyword')) {{ $errors->first('cat_meta_keyword') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('cat_og_tags')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">OG tags</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger"  data-role="tagsinput" id="og_tagchange" value="{{$data->cat_og_tags}}">
                                            <input type="hidden" name="cat_og_tags" id="og_tags" value="{{$data->cat_og_tags}}">
                                            <small class="form-control-feedback">@if($errors->has('cat_og_tags')) {{ $errors->first('cat_og_tags') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('cat_twitter_tags')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Twitter tags</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger"  data-role="tagsinput" id="twitter_tagchange" value="{{$data->cat_twitter_tags}}">
                                            <input type="hidden" name="cat_twitter_tags" id="twitter_tags" value="{{$data->cat_twitter_tags}}">
                                            <small class="form-control-feedback">@if($errors->has('cat_twitter_tags')) {{ $errors->first('cat_twitter_tags') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('parent_id')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Parent Category</label>
                                        <div class="col-md-9">
                                            <select class="form-control form-control-danger"  name="parent_id">
                                                <option value="" selected>Select Parent</option>
                                                @forelse($categories as $i)
                                                    @if($i->id == $data->parent_id)
                                                        <option selected value="{{$i->id}}">{{$i->cat_title}}</option>
                                                    @else
                                                        <option value="{{$i->id}}">{{$i->cat_title}}</option>
                                                    @endif
                                                @empty
                                                    <option value="">No Record found</option>
                                                @endforelse                                                            
                                            </select>
                                            <small class="form-control-feedback">@if($errors->has('parent_id')) {{ $errors->first('parent_id') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('cat_image')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Picture</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control form-control-danger"   name="cat_image" id="picture">
                                            <small class="form-control-feedback">@if($errors->has('cat_image')) {{ $errors->first('cat_image') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="col-md-9">
                                            <img src="{{asset('uploads/'.$data->cat_image)}}" style="width:100px;height:60px;" id="picture_show">
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('cat_icon')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Icon</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control form-control-danger"   name="cat_icon" id="icon">
                                            <small class="form-control-feedback">@if($errors->has('cat_icon')) {{ $errors->first('cat_icon') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="col-md-9">
                                              <img src="{{asset('uploads/'.$data->cat_icon)}}" style="width:100px;height:60px;" id="icon_show">
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('cat_og_img')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">OG Image</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control form-control-danger"   name="cat_og_img" id="cat_og_img">
                                            <small class="form-control-feedback">@if($errors->has('cat_og_img')) {{ $errors->first('cat_og_img') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="col-md-9">
                                             <img src="{{asset('uploads/'.$data->cat_og_img)}}" style="width:100px;height:60px;" id="cat_og_img_show">
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
            $("select").select2();
                /* Meta Keywords */
                $('#tagchange').on('itemAdded', function(event) {
                    $("#tags").val($("#tagchange").tagsinput('items'));
                });
                $('#tagchange').on('itemRemoved', function(event) {
                  $("#tags").val($("#tagchange").tagsinput('items'));
                });
                /* OG tags*/
                $('#og_tagchange').on('itemAdded', function(event) {
                    $("#og_tags").val($("#og_tagchange").tagsinput('items'));
                });
                $('#og_tagchange').on('itemRemoved', function(event) {
                  $("#og_tags").val($("#og_tagchange").tagsinput('items'));
                });
                 /* Twitter tags*/
                $('#twitter_tagchange').on('itemAdded', function(event) {
                    $("#twitter_tags").val($("#twitter_tagchange").tagsinput('items'));
                });
                $('#twitter_tagchange').on('itemRemoved', function(event) {
                  $("#twitter_tags").val($("#twitter_tagchange").tagsinput('items'));
                });
        });
        
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
        // OG Image
        document.getElementById("cat_og_img").onchange = function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("cat_og_img_show").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };
        /* Slug */
        $("input[name=cat_title]").focusout(function() {
            var str = $(this).val();
            str1 = str.replace(/[^a-zA-Z0-9\s]/g, "");
            str2 = str1.toLowerCase();
            slug = str2.replace(/\s/g, '-');
            meta_title = str2.replace(/\s/g, ' ');
            $("input[name=cat_slug]").val(slug);
            $("input[name=cat_meta_title]").val(meta_title);

        });
    </script>
@endsection


