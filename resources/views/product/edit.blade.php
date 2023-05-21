@if(session('role') == 2)
   <script type="text/javascript">window.location = "<?php echo asset('/dashboard'); ?>"</script>
@endif
@extends('app.app')
@section('content')
<style>
#preview > img
{
    width: 100px;
    height: 60px;
    padding: 10px;
}
.color
{
    color:red;
}
</style>
 <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Edit Product</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Edit Product</li>
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
                    <form action="javascript:;" method="post" enctype="multipart/form-data" id="submit">{{csrf_field()}}
                        <div class="form-body">
                            <div class="row">
                                <!-- row -->
                                <div class="col-md-8">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Title</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger"  name="p_title" value="{{ $data->p_title }}" id="title">
                                            <small class="form-control-feedback color" id="title_error"></small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('p_slug')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Slug</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger"  name="p_slug" value="{{ $data->p_slug }}">
                                            <small class="form-control-feedback">@if($errors->has('p_slug')) {{ $errors->first('p_slug') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('p_meta_title')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3"> Meta Title</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger" name="p_meta_title" value="{{ $data->p_meta_title }}">
                                            <small class="form-control-feedback">@if($errors->has('p_meta_title')) {{ $errors->first('p_meta_title') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Category</label>
                                        <div class="col-md-9">
                                            <select class="form-control form-control-danger"  name="p_category" id="category">
                                                <option value="">Select Category</option>
                                                @forelse($categories as $i)
                                                @if($i->id == $data->category_id)
                                                    <option selected value="{{$i->id}}">{{$i->cat_title}}</option>
                                                @else
                                                    <option value="">Select Category</option>
                                                    <option value="{{$i->id}}">{{$i->cat_title}}</option>
                                                @endif
                                                
                                                @empty
                                                @endforelse                                                
                                            </select>
                                            <small class="form-control-feedback color" id="category_error"></small> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Machine Code</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger"  name="p_sku" value="{{ $data->sku }}" id="sku">
                                            <small class="form-control-feedback color" id="sku_error"></small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('cat_desc')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Short Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control form-control-danger"  name="p_short_desc" value="{{ $data->p_short_desc }}" id="desc">{{ $data->p_short_desc }}</textarea>
                                            <small class="form-control-feedback color" id="desc_error"></small> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Long Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control form-control-danger"  name="p_long_desc" value="{{ $data->p_long_desc }}" id="long_desc">{{ $data->p_long_desc }}</textarea>
                                            <small class="form-control-feedback color" id="long_desc_error"></small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('p_meta_desc')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3"> Meta Description</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger" name="p_meta_desc" value="{{ $data->p_meta_desc }}">
                                            <small class="form-control-feedback">@if($errors->has('p_meta_desc')) {{ $errors->first('p_meta_desc') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('p_meta_keyword')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Meta Keywords</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger"  data-role="tagsinput" id="tagchange" value="{{ $data->p_meta_keyword }}">
                                            <input type="hidden" name="p_meta_keyword" id="tags" value="{{ $data->p_meta_keyword }}">
                                            <small class="form-control-feedback">@if($errors->has('p_meta_keyword')) {{ $errors->first('p_meta_keyword') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('p_og_tags')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">OG tags</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger"  data-role="tagsinput" id="og_tagchange" value="{{ $data->p_og_tags }}">
                                            <input type="hidden" name="p_og_tags" id="og_tags" value="{{ $data->p_og_tags }}">
                                            <small class="form-control-feedback">@if($errors->has('p_og_tags')) {{ $errors->first('p_og_tags') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('p_twitter_tags')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Twitter tags</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger"  data-role="tagsinput" id="twitter_tagchange" value="{{ $data->p_twitter_tags }}">
                                            <input type="hidden" name="p_twitter_tags" id="twitter_tags" value="{{ $data->p_twitter_tags }}">
                                            <small class="form-control-feedback">@if($errors->has('p_twitter_tags')) {{ $errors->first('p_twitter_tags') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Video Link</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger"  name="p_video_link" value="{{ $data->p_video_link }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Main Image</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control form-control-danger" name="p_main_image" id="main_img">
                                            <!-- <small class="form-control-feedback color" id="main_img_error"></small>  -->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="col-md-9">
                                            <img src="{{asset('uploads/product/'.$data->p_main_image)}}" style="width:100px;height:60px;" id="main_img_show">
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('cat_icon')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Bag Images</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control form-control-danger"  name="p_bag_image[]" multiple id="file_input">
                                           <!--  <small class="form-control-feedback color" id="file_input_error"></small>  -->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="col-md-9">
                                            <div class="row" id="preview">
                                                @forelse($bag_images as $img)
                                                    <img src = "{{asset('uploads/product/'.$img->p_bag_image)}}">
                                                @empty
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Sachets Images (Select maximun 7)</label>
                                        <div class="col-md-9">
                                            <?php echo $final_sachets; ?>
                                            <small class="form-control-feedback color" id="sachets_error"></small> 
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Commodity Images (Select maximun 4)</label>
                                        <div class="col-md-9">
                                             <?php echo $final_commodities; ?>
                                            <small class="form-control-feedback color" id="commodity_error"></small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('p_og_img')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">OG Image</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control form-control-danger"   name="p_og_img" id="p_og_img">
                                            <small class="form-control-feedback">@if($errors->has('p_og_img')) {{ $errors->first('p_og_img') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="col-md-9">
                                             <img src="{{asset('uploads/product/'.$data->p_og_img)}}" style="width:100px;height:60px;" id="p_og_img_show">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Upload PDF File</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control form-control-danger" name="p_pdf" id="pdf" value="{{$data->p_pdf}}">
                                            <small class="form-control-feedback color" id="pdf_error"></small> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Theme</label>
                                        <div class="col-md-9">
                                            @if($data->p_theme == null)
                                                @if($data->product_mode == 1)
                                                   <input title="" type="radio" class="form-control form-control-danger"  name="p_theme" value="1" checked>Machine Theme 
                                                @else
                                                   <input title="" type="radio" class="form-control form-control-danger"  name="p_theme" value="1">Machine Theme
                                                @endif
                                                @if($data->product_mode == 2)
                                                   <input title="" type="radio" class="form-control form-control-danger"  name="p_theme" value="2" checked>Theme C 
                                                @else
                                                   <input title="" type="radio" class="form-control form-control-danger"  name="p_theme" value="2">Theme C
                                                @endif
                                                @if($data->product_mode == 0)
                                                   <input title="" type="radio" class="form-control form-control-danger"  name="p_theme" value="0" checked>Processing Line 
                                                @else
                                                   <input title="" type="radio" class="form-control form-control-danger"  name="p_theme" value="0">Processing Line
                                                @endif
                                            @else
                                                @if($data->p_theme == 1)
                                                   <input title="" type="radio" class="form-control form-control-danger"  name="p_theme" value="1" checked>Machine Theme 
                                                @else
                                                   <input title="" type="radio" class="form-control form-control-danger"  name="p_theme" value="1">Machine Theme
                                                @endif
                                                @if($data->p_theme == 2)
                                                   <input title="" type="radio" class="form-control form-control-danger"  name="p_theme" value="2" checked>Theme C 
                                                @else
                                                   <input title="" type="radio" class="form-control form-control-danger"  name="p_theme" value="2">Theme C
                                                @endif
                                                @if($data->p_theme == 0)
                                                   <input title="" type="radio" class="form-control form-control-danger"  name="p_theme" value="0" checked>Processing Line 
                                                @else
                                                   <input title="" type="radio" class="form-control form-control-danger"  name="p_theme" value="0">Processing Line
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label class="control-label text-right col-md-3" id="heading"></label>
                                        <div class="col-md-9">
                                            <div class="row" id="show_attributes">
                                                 @forelse($attributes as $i)
                                                        <div class="col-md-4">
                                                           <small>{{$i->label}}</small>
                                                          <input title="" name="attribute[{{$i->assigned_id}}]" type="text" class="form-control input-sm" value="{{$i->name}}">
                                                       </div>
                                                @empty
                                                @endforelse
                                                @forelse($attributes_all as $i)
                                                    @if(!in_array($i->assigned_id,$attribute_ids))
                                                        <div class="col-md-4">
                                                           <small>{{$i->label}}</small>
                                                          <input title="" name="attribute[{{$i->assigned_id}}]" type="text" class="form-control input-sm">                   
                                                        </div>
                                                    @endif
                                                @empty
                                                @endforelse

                                            </div>
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

          $('#submit').submit(function() {
            var title       = $('#title').val();
            var category    = $('#category').val();
            var desc        = $('#desc').val();
            var long_desc   = $('#long_desc').val();
            //var main_img    = $('#main_img').val();
            //var f           = $('#file_input');
            //var file_input  = f[0].files.length; // get length
            var sachets     = $('.sachets:checked').map(function() { return this.value;}).get();
            var commodity   = $('.commodity:checked').map(function() { return this.value;}).get();
            //var pdf         = $('#pdf').val().split('.').pop().toLowerCase();

            var title_check     = false;
            var category_check  = false;
            var desc_check      = false;
            var long_desc_check = false;
            //var main_img_check  = false;
            //var file_input_check = false;
            var sachets_check    = false;
            var commodity_check  = false;
            //var pdf_check  = false;
            if(title == ""){
                $("#title_error").html('*This field is required');
            }
            else if(title != "")
            {
                title_check = true;
                $("#title_error").html(' ');
            }
            if(category == ""){
                $("#category_error").html('*This field is required');
            }
            else if(category != "")
            {
                category_check = true;
                $("#category_error").html(' ');
            }
            if(desc == ""){
                $("#desc_error").html('*This field is required');
            }
            else if(desc != "")
            {
                desc_check = true;
                $("#desc_error").html(' ');
            }
            /*if(long_desc == ""){
                $("#long_desc_error").html('*This field is required');
            }
            else if(long_desc != "")
            {
                long_desc_check = true;
                $("#long_desc_error").html(' ');
            }*/
            /*if(main_img == ""){
                $("#main_img_error").html('*This field is required');
            }
            else if(main_img != "")
            {
                main_img_check = true;
                $("#main_img_error").html(' ');
            }
            if(file_input == 0){
                $("#file_input_error").html('*This field is required');
            }
            else
            {
                file_input_check = true;
                $("#file_input_error").html(' ');
            }*/
            /*if(sachets.length == 0){
                $("#sachets_error").html('*Select min 1');
            }
            else if(sachets.length >7){
                $("#sachets_error").html('*Select max 7');
            }
            else
            {
                sachets_check = true;
                $("#sachets_error").html(' ');
            }
            if(commodity.length == 0){
                $("#commodity_error").html('*Select min 1');
            }
            else if(commodity.length >4){
                $("#commodity_error").html('*Select max 4');
            }
            else
            {
                commodity_check = true;
                $("#commodity_error").html(' ');
            }*/
            /*if($.inArray(pdf, ['pdf']) == -1) {
                $("#pdf_error").html('*Only pdf files are allowed');
            }
            else
            {
                pdf_check = true;
                $("#pdf_error").html(' ');
            }*/

            if(title_check == true && category_check == true && desc_check == true /*&& long_desc_check == true*/
                /*&& sachets_check == true && commodity_check == true*/)
            {
                $("#submit").attr('action',"{{url('/product/edit/'.$data->id)}}");     
            }
           
        });
            $("#category").change(function(){
                var id = $("#category").val();
                $.ajax({
                  url: "{{url('/product/get_attributes')}}",
                  type: 'POST',
                  data: {id:id,_token:'{{ csrf_token() }}'},
                   beforeSend:function(){
                    $("#show_attributes").html(null);
                  },
                  success: function(res)
                   {
                    console.log(res);
                       $("#heading").html('Specifications');
                       $.each(res,function(k,v){
                        $("#show_attributes").append('<div class="col-md-4">'+
                            '<small>'+v.label+'</small>'+
                              '<input title="" name="attribute['+v.assigned_id+']" type="text" class="form-control input-sm">'+   
                            '</div>');
                      });

                   },
                   error: function(res)
                   {
                    console.log(res);
                   }
                });       
            });

            $("select").select2();
        });
        
        
        // Main Image

        document.getElementById("main_img").onchange = function () {
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("main_img_show").src = e.target.result;
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };

        // For Bag Images
        
        
function previewImages() {
  $("#preview").html(' ');
  var preview = document.querySelector('#preview');
  
  if (this.files) {
    [].forEach.call(this.files, readAndPreview);
  }

  function readAndPreview(file) {

    // Make sure `file.name` matches our extensions criteria
    if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
      return alert(file.name + " is not an image");
    } // else...
    
    var reader = new FileReader();
    
    reader.addEventListener("load", function() {
      var image = new Image();
      image.height = 100;
      image.title  = file.name;
      image.src    = this.result;
      preview.appendChild(image);
    });
    
    reader.readAsDataURL(file);
    
  }

}

if ($("#desc").length > 0) {
    tinymce.init({
        selector: "textarea#desc",
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
if ($("#long_desc").length > 0) {
    tinymce.init({
        selector: "textarea#long_desc",
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
document.querySelector('#file_input').addEventListener("change", previewImages);

    </script>
@endsection