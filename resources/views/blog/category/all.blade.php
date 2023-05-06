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
            <h4 class="text-themecolor">All Blog Categories</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">All Blog Categories</li>
                </ol>
                <a href="{{url('blog/category/new')}}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button></a>
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
                            <th>Description</th>
                            <th>Meta Description</th>
                            <th>Tags</th>
                            <th>Meta Keywords</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody><?php $no=0 ?>
                        @foreach($categories as $i)<?php $no++ ?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$i->cat_title}}</td>
                            <td><a style="cursor:pointer;" onclick="showLongDescription('{{$i->cat_desc}}')"><i class="fas fa-eye" style="color:black;padding:5px;"></i></a></td>
                            <td>{{$i->cat_meta_desc}}</td>
                            <td><a style="cursor:pointer;" onclick="getTags({{$i->id}})"><i class="fas fa-eye" style="color:black;padding:5px;"></i></a></td>
                            <td><a style="cursor:pointer;" onclick="getMetaTags({{$i->id}})"><i class="fas fa-eye" style="color:black;padding:5px;"></i></a></td>
                            <td>
                               
                               <a href="{{url('/blog/category/edit/'.$i->id)}}" data-toggle="tooltip" title="Edit" data-placement="top"><i class="fas fa-pencil-alt" style="color:#39f;padding:5px;"></i></a>
                               @if(session('role') == 'admin')
                               <a style="cursor:pointer;" onclick="remove({{$i->id}})" data-toggle="tooltip" title="Delete"><i class="far fa-trash-alt" style="color:red;padding:5px;"></i></a>
                              @endif
                              <select class="form-control" id="status{{$i->id}}" onchange="changeStatus({{$i->id}})" data-toggle="tooltip" title="Status" style="width:200px;">
                                    @if($i->cat_status == 0)<option selected value="0">Deactive</option>@else <option value="0">Deactive</option> @endif
                                    @if($i->cat_status == 1)<option selected value="1">Active</option>@else <option value="1">Active</option> @endif
                              </select>
                              <select class="form-control" id="theme_menu{{$i->id}}" onchange="ShowOnMenu({{$i->id}})" data-toggle="tooltip" title="Top Menu"  style="width:200px;">
                                    @if($i->menu_mode == 1)<option selected value="1">Show On Menu</option>@else <option value="1">Show On Menu</option> @endif
                                    @if($i->menu_mode == 0)<option selected value="0">Don't Show On Menu</option>@else <option value="0">Don't Show On Menu</option> @endif
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
        <h5 class="modal-title" id="exampleModalLongTitle">Category Tags</h5>
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
            window.location="<?php echo url('/blog/category/delete/'); ?>/"+id;
        }
    }

    function changeStatus(id)
            {
                var status = $('#status'+id).val();
                $.ajax({
                  url: "{{url('/blog/category/change_status')}}",
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
                  url: "{{url('/blog/category/get_tags')}}",
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
                  url: "{{url('/blog/category/get_meta_tags')}}",
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
        function ShowOnMenu(id)
            {
                var menu = $('#theme_menu'+id).val();
                $.ajax({
                  url: "{{url('/blog/category/change_menu')}}",
                  type: 'POST',
                  data: {id:id,menu:menu,_token:'{{ csrf_token() }}'},
                  success: function(res)
                   {
                    console.log(res);
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
        function showLongDescription(desc)
        {
            $("#show_gallery").html(' ');
            $("#exampleModalLongTitle").html('Category Long Description'); 
            $('#galleryImages').modal('show'); 
                $("#show_gallery").append('<div class="col-md-12">'+
                        '<p style="text-align:justify;">'+desc+'</p>'+
                        '</div>');
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
    </script>
@endsection


