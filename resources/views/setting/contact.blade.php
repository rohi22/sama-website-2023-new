@if(session('role') == 2)
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
   <div class="md-card light-bg" style="overflow: hidden">
        <div class="md-card-toolbar" >
            <div class="md-card-toolbar-actions">
                <a href="{{url('/setting/about_us')}}"><i class="md-icon material-icons ">list</i>List</a>
            </div>
            <h4>About Us</h4>
        </div>
        <div class="md-card-content" >
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    @include('app.alerts')
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <form action="{{url(/setting/about-us')}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
                            <div class="form-group">
                                <small>Title</small>
                               <textarea class="form-control input-sm"  name="title" value=""></textarea>
                            </div>
                            <div class="form-group">
                                <small >Long Descrition</small>
                                <textarea class="form-control input-sm"  name="desc" value=""></textarea>
                            </div>
                            <div class="form-group">
                                <small>Upload Images</small>
                                <input type="file" class="form-control input-sm"  name="image[]" id="file-input" multiple>
                            </div>
                            <div class="row" id="preview">
                                @forelse($images as $img)
                                    <img src = "{{asset('uploads/about/'.$img->about_image)}}">
                                @empty
                                @endforelse
                            </div>
                        <div class="form-group">
                            <input title="" type="submit" class="btn btn-success" value="Change">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('page-scripts')
    <script>
        
        // Multiple Images Javascript


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


    </script>
        <script>
            CKEDITOR.replace( 'title' );
            CKEDITOR.replace( 'desc' );
    </script>
@endsection

