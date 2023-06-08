@if(session('role') == 2)
    <script type="text/javascript">window.location = "<?php echo asset('/dashboard'); ?>"</script>
@endif
@extends('app.app')
@section('content')
<style>
    .sama-form-dash label { 
        max-width: 100%;
        padding: 0;
        margin-bottom: 0;
     } 
     .sama-form-dash p { 
        margin-bottom: 0; font-size: 12px; 
        }
</style>
 <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Add Slider</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Add Slider</li>
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
                    <form action="{{url('/slider/new')}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
                        <div class="form-body">
                            <div class="row">
                                <!-- row -->
                                <div class="col-md-8">
                                    <div class="form-group @if($errors->has('s_title')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Title</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger" name="s_title" value="{{ old('s_title') }}">
                                            <small class="form-control-feedback">@if($errors->has('s_title')) {{ $errors->first('s_title') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('s_sub_title')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Sub Title</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger"  name="s_sub_title" value="{{ old('s_sub_title') }}">
                                            <small class="form-control-feedback">@if($errors->has('s_sub_title')) {{ $errors->first('s_sub_title') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('s_desc')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Description</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger"  name="s_desc" value="{{ old('s_desc') }}">
                                            <small class="form-control-feedback">@if($errors->has('s_desc')) {{ $errors->first('s_desc') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('s_main_image')) has-danger @endif row">
                                    <div class="col-md-3 text-right sama-form-dash">
                                        <label class="control-label text-right col-md-3">Main Image</label>
                                        <p>770px by 1900px</p>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control form-control-danger"  name="s_main_image">
                                            <small class="form-control-feedback">@if($errors->has('s_main_image')) {{ $errors->first('s_main_image') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('s_background_image')) has-danger @endif row">
                                    <div class="col-md-3 text-right sama-form-dash">    
                                        <label class="control-label text-right col-md-3">Background Image</label>
                                        <p>1235px × 412 px</p>
                                    </div>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control form-control-danger"  name="s_background_image">
                                            <small class="form-control-feedback">@if($errors->has('s_background_image')) {{ $errors->first('s_background_image') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('s_gallery_images')) has-danger @endif row">
                                    <div class="col-md-3 text-right sama-form-dash">    
                                        <label class="control-label text-right col-md-3">Gallery Images</label>
                                        <p>px × px</p>
                                    </div>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control form-control-danger"  name="s_gallery_images[]" multiple>
                                            <small class="form-control-feedback">@if($errors->has('s_gallery_images')) {{ $errors->first('s_gallery_images') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('s_gallery_images')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Bullets</label>
                                        <div class="col-md-9">
                                              <div class="container col-md-12">
                                               <div class='element' id='div_1'>
                                                <textarea id='txt_1' class="form-control input-sm" name='s_bullets[]'></textarea>&nbsp;<span class='add'><i style="cursor: pointer;float: right;margin: -30px -21px 0px 0px;font-size: large;" class="fa fa-plus"></i></span>
                                               </div>
                                              </div>
                                            <small class="form-control-feedback">@if($errors->has('s_gallery_images')) {{ $errors->first('s_gallery_images') }} @endif</small> 
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
       $(document).ready(function(){

         // Add new element
         $(".add").click(function(){

          // Finding total number of elements added
          var total_element = $(".element").length;
         
          // last <div> with element class id
          var lastid = $(".element:last").attr("id");
          var split_id = lastid.split("_");
          var nextindex = Number(split_id[1]) + 1;

          // Check total number elements
       
           // Adding new div container after last occurance of element class
           $(".element:last").after("<div class='element' id='div_"+ nextindex +"'></div>");
         
           // Adding element to <div>
           $("#div_" + nextindex).append("<textarea id='txt_1' name='s_bullets[]' class='form-control input-sm' id='txt_"+ nextindex +"'></textarea>&nbsp;<span id='remove_" + nextindex + "' class='remove' style='float: right;margin: -30px -21px 0px 0px;font-size: large;cursor: pointer;'>X</span>");
         
          
         
         });

         // Remove element
         $('.container').on('click','.remove',function(){
         
          var id = this.id;
          var split_id = id.split("_");
          var deleteindex = split_id[1];

          // Remove <div> with id
          $("#div_" + deleteindex).remove();

         }); 
        });
    </script>
@endsection


