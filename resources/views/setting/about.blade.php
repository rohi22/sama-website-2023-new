@if(session('role') == 2)
  <script type="text/javascript">window.location = "<?php echo asset('/dashboard'); ?>"</script>
@endif
@extends('app/app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                                <form action="{{url('/setting/about-us')}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
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
                                                <div class="form-group @if($errors->has('desc')) has-danger @endif row">
                                                    <label class="control-label text-right col-md-3">Upload Images</label>
                                                    <div class="col-md-9">
                                                         <input type="file" name="image[]" id="file-input" multiple>
                                                        <small class="form-control-feedback">@if($errors->has('image')) {{ $errors->first('image') }} @endif</small> 
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label class="control-label text-right col-md-3"></label>
                                                    <div class="col-md-9">
                                                    <div class="row" id="preview">
                                                        @forelse($images as $img)
                                                            <img src = "{{asset('uploads/about/'.$img->about_image)}}">
                                                        @empty
                                                        @endforelse
                                                    </div>
                                                  </div>
                                                </div>
                                                
                                                <div class="form-group  row">
                                                    <label class="control-label text-right col-md-3">Heading</label>
                                                    <div class="col-md-9">
                                                         <input type="text" class="form-control" required name="heading" value="{{$about->heading}}">
                                                    </div>
                                                </div>
                                                <div class="form-group  row">
                                                    <label class="control-label text-right col-md-3">Description</label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" name="description" required rows="10">{{$about->description}}</textarea>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group @if($errors->has('desc')) has-danger @endif row">
                                                    <label class="control-label text-right col-md-3">Upload Award Images</label>
                                                    <div class="col-md-9">
                                                         <input type="file" name="award_image" accept="image/png, image/gif, image/jpeg">
                                                        <small class="form-control-feedback" style="color:red">@if($errors->has('award_image')) {{ $errors->first('award_image') }} @endif</small> 
                                                    </div>
                                                </div>

                                                <div class="form-group @if($errors->has('desc')) has-danger @endif row">
                                                    <label class="control-label text-right col-md-3"></label>
                                                    
                                                        @foreach($awardImages as $img)
                                                            <div class="col-md-2">
                                                                <div class="row">
                                                                    <div class="col-md-12" id="preview">
                                                                        <img src = "{{asset('uploads/award/'.$img->images)}}">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <a href="{{route('delete_award_image',$img->id)}}" class="btn btn-danger" style="margin-left:10px">Delete</a>
                                                                    </div>
                                                                </div>  
                                                            </div>
                                                        @endforeach
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Points</label>
                                                     <div class="col-md-9">
                                                         <div class="row">
                                                             <div class="col-md-12">
                                                                 <button id="counter" data-repeater-create class="btn btn-sm btn-success" type="button" onclick="addPoints($(this))" data-id="{{count(json_decode($about->points))}}">ADD&nbsp;<i class="fa fa-plus text-white"></i></button>
                                                             </div>
                                                             <div class="points">
                                                                 @forelse(json_decode($about->points) as $index=>$item)
                                                                 <div class="col-md-12 mt-2" id="point_{{$index+1}}">
                                                                     <input type="text" name="points[]" value="{{$item}}"  class=""/>&nbsp;<button  onclick="deletePoint($(this))" data-id="{{$index+1}}" class="btn btn-sm btn-danger" type="button"><i class="fa fa-trash text-white"></i></button>
                                                                 </div>
                                                                 @empty
                                                                 @endforelse
                                                             </div>
                                                             
                                                             
                                                         </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js" integrity="sha512-foIijUdV0fR0Zew7vmw98E6mOWd9gkGWQBWaoA1EOFAx+pY+N8FmmtIYAVj64R98KeD2wzZh1aHK0JSpKmRH8w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

document.querySelector('#file-input').addEventListener("change", previewImages);

function addPoints(elm){
    var count = parseInt(elm.attr('data-id'));
    var counter = count + 1;
    $("#counter").attr('data-id',counter);
    var html = '<div class="col-md-12 mt-2"  id="point_'+counter+'"><input type="text" name="points[]" value=""  class=""/>&nbsp;<button  onclick="deletePoint($(this))" data-id="'+counter+'" class="btn btn-sm btn-danger" type="button"><i class="fa fa-trash text-white"></i></button></div>';
    $('.points').append(html);
}

function deletePoint(elm){
    var count = parseInt(elm.attr('data-id'));
    $("#point_"+count).remove();
}
    </script>
@endsection
