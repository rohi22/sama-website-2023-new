@if(session('role') == 1)
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
            <h4 class="text-themecolor">All Blog Posts</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">All Blog Posts</li>
                </ol>
                <a href="{{url('blog/post/new')}}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button></a>
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
                            <th>Category</th>
                            <th>Description</th>
                            <th>Meta Description</th>
                            <th>Image</th>
                            <th>Tags</th>
                            <th>Meta Keywords</th>
                            <th>Link</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody><?php $no=0 ?>
                        @foreach($posts as $i)<?php $no++ ?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$i->p_title}}</td>
                            <td>{{$i->cat_title}}</td>
                            <td><a style="cursor:pointer;"onclick="showLongDescription('{{$i->p_desc}}')"><i class="fas fa-eye" style="color:black;padding:5px;"></i></a></td>
                            <td>{{$i->p_meta_desc}}</td>
                            <td><img class="img" src="{{asset('uploads/blog/post/'.$i->p_image)}}" style="width:100px;height:60px;"></td>
                            <td><a style="cursor:pointer;" onclick="getTags({{$i->id}})"><i class="fas fa-eye" style="color:black;padding:5px;"></i></a></td>
                            <td><a style="cursor:pointer;" onclick="getMetaTags({{$i->id}})"><i class="fas fa-eye" style="color:black;padding:5px;"></i></a></td>
                            <td><a>{{$i->p_link}}</a></td>
                            <td>
                               
                               <a href="{{url('/blog/post/edit/'.$i->id)}}" data-toggle="tooltip" title="Edit" data-placement="top"><i class="fas fa-pencil-alt" style="color:#39f;padding:5px;"></i></a>
                              @if(session('role') == 'admin')
                               <a style="cursor:pointer;" onclick="remove({{$i->id}})" data-toggle="tooltip" title="Delete"><i class="far fa-trash-alt" style="color:red;padding:5px;"></i></a>
                              @endif
                               <select class="form-control" id="status{{$i->id}}" onchange="changeStatus({{$i->id}})" data-toggle="tooltip" title="Status" style="width:200px;">
                                    @if($i->p_status == 0)<option selected value="0">Deactive</option>@else <option value="0">Deactive</option> @endif
                                    @if($i->p_status == 1)<option selected value="1">Active</option>@else <option value="1">Active</option> @endif
                                </select>
                                <select class="form-control" id="feature{{$i->id}}" onchange="MakeFeatureImage({{$i->id}})" data-toggle="tooltip" title="Feature Image" style="width:200px;">
                                    @if($i->p_feature == 0)<option selected value="0">Don't Show Feature Image</option>@else <option value="0">Don't Show Feature Image</option> @endif
                                    @if($i->p_feature == 1)<option selected value="1">Show Feature Image</option>@else <option value="1">Show Feature Image</option> @endif
                                </select>
                                <select class="form-control" id="caseStudies{{$i->id}}" onchange="MakeCaseStudies({{$i->id}})" data-toggle="tooltip" title="Case Studies" style="width:200px;">
                                       <option value="1" @if($i->p_case_studies == 1) selected @endif>Show on CaseStudies</option>
                                       <option value="0" @if($i->p_case_studies == 0) selected @endif>Hide on CaseStudies</option>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Post Tags</h5>
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
        function remove(id){
            let r = confirm("Are you sure?" );
            if (r === true) {
                window.location="<?php echo url('/blog/post/delete/'); ?>/"+id;
            }
        }
        function changeStatus(id)
            {
                var status = $('#status'+id).val();
                $.ajax({
                  url: "{{url('/blog/post/change_status')}}",
                  type: 'POST',
                  data: {id:id,status:status,_token:'{{ csrf_token() }}'},
                  success: function(res)
                   {
                        if(res == 1 || res == 0)
                        {
                            $("#danger").css('display','none');
                            $("#success").css('display','block');
                            $("#success").html("Status Changed..");
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

        var progress = null;
        function getTags(id)
        {
            if (progress) {
                  progress.abort();
              }
              progress =  $.ajax({
                  url: "{{url('/blog/post/get_tags')}}",
                  type: 'POST',
                  data: {id:id,_token:'{{ csrf_token() }}'},
                   beforeSend:function(){
                    $("#show_gallery").html(null);
                  },
                  success: function(res)
                   {
                    console.log(res);
                    $('#galleryImages').modal('show'); 
                       $.each(res,function(k,v){
                        $("#show_gallery").append('<li>'+v['tag']+'</li>');
                      });
                     progress = null;  
                   },
                   error: function(res)
                   {
                    console.log(res);
                   }
                });
        }
        function getMetaTags(id)
        {
            if (progress) {
                  progress.abort();
              }
              progress =  $.ajax({
                  url: "{{url('/blog/post/get_meta_tags')}}",
                  type: 'POST',
                  data: {id:id,_token:'{{ csrf_token() }}'},
                   beforeSend:function(){
                    $("#show_gallery").html(null);
                  },
                  success: function(res)
                   {
                    console.log(res);
                    $("#exampleModalLongTitle").html('Meta Keywords');
                    $('#galleryImages').modal('show'); 
                       $.each(res,function(k,v){
                        $("#show_gallery").append('<li>'+v['meta_tag']+'</li>');
                      });
                     progress = null;  
                   },
                   error: function(res)
                   {
                    console.log(res);
                   }
                });
        }
        
        function MakeFeatureImage(id)
            {
                var feature = $('#feature'+id).val();
                $.ajax({
                  url: "{{url('/blog/post/post_feature')}}",
                  type: 'POST',
                  data: {id:id,feature:feature,_token:'{{ csrf_token() }}'},
                  success: function(res)
                   {
                        if(res == 1 || res == 0)
                        {
                            $("#danger").css('display','none');
                            $("#success").css('display','block');
                            $("#success").html("Status changed..");
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
            
      function MakeCaseStudies(id){
        var caseStudies = $('#caseStudies'+id).val();
        $.ajax({
          url: "{{url('/blog/post/assign_case_studies')}}",
          type: 'POST',
          data: {id:id,caseStudies:caseStudies,_token:'{{ csrf_token() }}'},
          success: function(res)
           {
                if(res == 1 || res == 0)
                {
                    $("#danger").css('display','none');
                    $("#success").css('display','block');
                    $("#success").html("Status changed..");
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
      function makeSlider(id)
            {
                var slider = $('#slider'+id).val();
                $.ajax({
                  url: "{{url('/blog/post/assign_slider')}}",
                  type: 'POST',
                  data: {id:id,slider:slider,_token:'{{ csrf_token() }}'},
                  success: function(res)
                   {
                        if(res == 1 || res == 0)
                        {
                            $("#danger").css('display','none');
                            $("#success").css('display','block');
                            $("#success").html("Assigned to slider..");
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
        function showLongDescription(desc)
        {
            $("#show_gallery").html(' ');
            $("#exampleModalLongTitle").html('Post Long Description'); 
            $('#galleryImages').modal('show'); 
                $("#show_gallery").append('<div class="col-md-12">'+
                        '<p style="text-align:justify;">'+desc+'</p>'+
                        '</div>');
        }
    </script>
@endsection

