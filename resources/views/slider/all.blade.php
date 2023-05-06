@if(session('role') == 2)
    <script type="text/javascript">window.location = "<?php echo asset('/dashboard'); ?>"</script>
@endif
@extends('app.app')
@section('content')
<style>
.select2
  {
    width: 200px !important;
  }
</style>
 <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">All Sliders</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">All Sliders</li>
                </ol>
                <a href="{{url('slider/new')}}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button></a>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================= -->
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
             <div class="card">
                <div class="card-body">
                    <div class="table-responsive m-t-40">
                      @if(session()->has('message'))<div class="alert alert-success col-md-5" style="text-align: center;left:24%;">{{ session()->get('message') }}</div>@endif
                      <div class="alert alert-success col-md-5" id="success" style="display:none;text-align: center;left:24%;"></div>
                      <div class="alert alert-danger col-md-5" id="danger" style="display:none;text-align: center;left:24%;"></div>
                      <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Description</th>
                                <th>Main</th>
                                <th>Background</th>
                                <th>Gallery Images</th>
                                <th>Bullets</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody><?php $no=0 ?>
                            @foreach($sliders as $i)<?php $no++ ?>
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$i->s_title}}</td>
                                <td>{{$i->s_sub_title}}</td>
                                <td>{{$i->s_desc}}</td>
                                <td><img class="img" src="{{asset('uploads/'.$i->s_main_image)}}" style="width:300px; height:100px"></td>
                                <td><img class="img" src="{{asset('uploads/'.$i->s_background_image)}}"></td>
                                <td><a  onclick="getGalleryImages({{$i->id}})"><i class="fas fa-eye" style="color:black;padding:5px;cursor: pointer;"></i></a></td>
                                <td><a onclick="getBullets({{$i->id}})"><i class="fas fa-eye" style="color:black;padding:5px;cursor: pointer;"></i></a></td>
                                <td>
                                  <a href="{{url('/slider/edit/'.$i->id)}}"><i class="fas fa-pencil-alt" style="color:#39f;padding:5px;"></i></a>
                                  @if(session('role') == 'admin')
                                  <a onclick="remove({{$i->id}})"><i class="far fa-trash-alt" style="color:red;padding:5px;"></i></a>
                                  @endif <!-- remove({{$i->id}}) -->
                                  <select class="form-control" id="category{{$i->id}}" onchange="assignCategory({{$i->id}})" data-toggle="tooltip" title="Assign">
                                    @foreach($categories as $cat)
                                      @if($cat->id == $i->s_category_id)
                                        <option selected value="{{$cat->id}}">{{$cat->cat_title}}</option>
                                      @else
                                        <option value="{{$cat->id}}">{{$cat->cat_title}}</option>
                                      @endif
                                    @endforeach
                                  </select>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
</div>
<div class="modal fade" id="galleryImages" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top: 100px;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Gallery Images</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
  
      </div>
      <div class="modal-body col-md-12">
          <div class="row" id="show_gallery" style="margin-left: 10px;">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('page-scripts')
    <script>
        var progress = null;
            function assignCategory(id)
            {
                var category = $('#category'+id).val();
                $.ajax({
                  url: "{{url('/slider/assign_category')}}",
                  type: 'POST',
                  data: {id:id,category:category,_token:'{{ csrf_token() }}'},
                  success: function(res)
                   {
                    console.log(res);
                        if(res == 1 || res == 0)
                        {
                            $("#danger").css('display','none');
                            $("#success").css('display','block');
                            $("#success").html("Category Assigned..");
                        }
                        else
                        {
                            $("#danger").css('display','block');
                            $("#danger").html(res);
                            $("#success").css('display','none');
                        }
                   },
                   error: function(res)
                   {
                    console.log(res);
                   }
                });
            }
            function getGalleryImages(id)
            {
              var url = "{{url('uploads/gallery/')}}";
              if (progress) {
                  progress.abort();
              }
              progress = $.ajax({
                  url: "{{url('/slider/get_gallery_images')}}",
                  type: 'POST',
                  data: {id:id,_token:'{{ csrf_token() }}'},
                   beforeSend:function(){
                    $("#show_gallery").html(null);
                  },
                  success: function(res)
                   {
                    
                    $('#galleryImages').modal('show'); 
                       $.each(res,function(k,v){
                        $("#show_gallery").append('<div class="col-md-4">'+
                              '<img src="'+url+'/'+v['s_gallery_image']+'" class="img-thumbnail" alt="Cinque Terre">'+                            
                              '</div>');
                      });
                    progress = null;

                   },
                   error: function(res)
                   {
                    console.log(res);
                   }
                });
              
              
            }
            function getBullets(id)
            {

              if (progress) {
                  progress.abort();
              }
              progress = $.ajax({
                  url: "{{url('/slider/get_bullets')}}",
                  type: 'POST',
                  data: {id:id,_token:'{{ csrf_token() }}'},
                   beforeSend:function(){
                    $("#show_gallery").html(null);
                  },
                  success: function(res)
                   {
                    $("#exampleModalLongTitle").html('Bullets');
                    $('#galleryImages').modal('show'); 
                       $.each(res,function(k,v){
                        $("#show_gallery").append('<li>'+v['s_bullet']+'</li>');
                      });
                    progress = null;

                   },
                   error: function(res)
                   {
                    console.log(res);
                   }
                });
            }
        function remove(id){
            let r = confirm("Are you sure?" );
            if (r === true) {
                window.location="<?php echo url('/slider/delete/'); ?>/"+id;
            }
        }
    </script>
@endsection
