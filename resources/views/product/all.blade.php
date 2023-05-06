@if(session('role') == 2)
    <script type="text/javascript">window.location = "<?php echo asset('/dashboard'); ?>"</script>
@endif
@extends('app.app')
@section('content')
<style>
#myTable_wrapper > div:nth-child(1){
  display: none;
}
.select2-selection__choice{
  background: #038FCD !important;
}
.select2-selection__choice__remove{
  color: white !important;
}
span.select2-selection--multiple {
 min-height: 30px !important;border: 1px solid#AAAAAA !important;
}

/*#main-wrapper > div > div.container-fluid > div.col-md-12 > div > div:nth-child(1) > div > div:nth-child(4) > span{
  height: calc(1.625rem + 2px) !important;    min-height: 30px !important;border: 1px solid#AAAAAA !important;
}*/
</style>
 <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">All Products</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">All Products</li>
                </ol>
                <a href="{{url('product/new')}}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button></a>
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
    <div class="col-md-12">
      <div class="row">
          <div class="col-md-12">
            <form action="javascript:;" method="post" enctype="multipart/form-data" id="assign_from">{{csrf_field()}}
            <div class="row">
              <input type="hidden" name="box_id" id="box_id">
              <div class="col-md-2">
                <select class="form-control" data-toggle="tooltip" title="Status" name="status_id">
                    <option value="">Status</option>
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
                </select>
              </div>
              <div class="col-md-2">
                <select class="form-control" data-toggle="tooltip" title="Product Mode" name="product_theme_id">
                  <option value="">Product Theme</option>
                  <option value="0">Product Processing Theme</option>
                  <option value="1">Product Machine Theme</option>
                  <option value="2">Product Theme C</option>
                </select>
              </div>
              <div class="col-md-2">
                <select class="form-control" data-toggle="tooltip" title="Assign to home slider" name="home_slider_id">
                  <option value="">Assign Home Slider</option>
                  <option value="1">Machine</option>
                  <option value="2">Processing Line</option>
                </select>
              </div>
              <div class="col-md-2">
                <select class="form-control tag_id" data-toggle="tooltip"title="Tags" name="tag_id[]" id="tag_id" multiple>
                  <option value="">Tags</option>
                  @forelse($tags as $i)
                    <option value="{{$i->id}}">{{$i->gt_title}}</option>
                  @empty
                  @endforelse
                </select>
              </div>
              <div class="col-md-1">
                <a href="javascript:;" title="Delete"><input type="checkbox" name="delete_id" style="width: 30px;height: 16px;margin-top: 4px;"><i class="far fa-trash-alt" style="color:red;font-size: 22px;"></i></a>
              </div>
              <div class="col-md-1">
                <input title="" type="button" class="btn btn-success" value="Assign" style="height: 28px;width: 75px;padding-top: 3px;" onclick="assignMultipleActions($(this))">
              </div>
            </div>
            </form>
          </div>
          <div class="col-md-12" style="margin-top: 10px;margin-bottom: 20px;">
            <form action="{{url('/product/search')}}" method="get" enctype="multipart/form-data">{{csrf_field()}}
            <div class="row">
              <div class="col-md-3">
                <select class="form-control" data-toggle="tooltip"title="Show" id="row_show">
                  <option value="">Show</option>
                  <option value="50" @if(request('num') == 50) selected @endif >50</option>
                  <option value="100"@if(request('num') == 100) selected @endif >100</option>
                  <option value="200"@if(request('num') == 200) selected @endif >200</option>
                  <option value="500"@if(request('num') == 500) selected @endif >500</option>
                  <option value="600"@if(request('num') == 600) selected @endif >600</option>
                  <option value="800"@if(request('num') == 800) selected @endif >800</option>
                  <option value="1000"@if(request('num') == 1000) selected @endif >1000</option>
                  <option value="5000"@if(request('num') == 5000) selected @endif >5000</option>
                </select>
              </div>
              <div class="col-md-1">
                <input title="Filter" type="button" class="btn btn-success" value="Filter" style="height: 28px;width: 75px;padding-top: 3px;" onclick="getRows()">
              </div>
              <div class="col-md-5">
                <input type="text" class="form-control form-control-danger" style="height: calc(1.625rem + 2px);    min-height: 30px;border: 1px solid#AAAAAA;" name="search" value="{{request('search')}}" 
                   placeholder="Search Products here..">
                 <small class="form-control-feedback">@if($errors->has('search')) {{ $errors->first('search') }} @endif</small> 
              </div>
              <div class="col-md-2">
                 <input title="Search" style="height: 28px;width: 75px;padding-top: 3px;" type="submit" class="btn btn-success" value="Search">@if(request('search') != null)<input onclick="goBack()" style="height: 28px;width: 75px;padding-top: 3px;" type="button" class="btn btn-primary" value="Back">@endif
              </div>
            </div>
            </form>
          </div>
      </div>
    </div>
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
                            <th>Check</th>
                            <th>#</th>
                            <th>Title</th>
                            <th>Short Desc.</th>
                            <th>Long Desc.</th>
                            <th>Video Link</th>
                            <th>Main Image</th>
                            <th>Bag Images</th>
                            <th>Commodity Images</th>
                            <th>Sachet Images</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody><?php $no=0 ?>
                        @foreach($products as $i)<?php $no++ ?>
                        <tr>
                            <td><input type="checkbox" class="checkbox_list" name="box" value="{{$i->id}}" style="width: 20px;height: 16px;"></td>
                            <td>{{$no}}</td>
                            <td>{{$i->p_title}}</td>
                            <td><a style="cursor:pointer;" title = "Short Description" onclick="showShortDescription('<?php echo $i->p_short_desc; ?>')"><i class="fas fa-eye" style="color:black;padding:5px;"></i></a></td>
                            <td><a style="cursor:pointer;" title = "Long Description" onclick="showLongDescription({{$i->id}})"><i class="fas fa-eye" style="color:black;padding:5px;"></i></a></td>
                            <td><a target="_blank" href="{{$i->p_video_link}}">@if(!empty($i->p_video_link))View Link @endif</a></td>
                            <td><img class="img" src="{{asset('uploads/product/'.$i->p_main_image)}}"style="width: 100px;height: 60px;"></td>
                            <td><a style="cursor:pointer;" id="bagImage"  onclick="getBagImages({{$i->id}})"><i class="fas fa-eye" style="color:black;padding:5px;"></i></a></td>
                            <td><a style="cursor:pointer;" onclick="getCommodityImages({{$i->id}})"><i class="fas fa-eye" style="color:black;padding:5px;"></i></a></td>
                            <td><a style="cursor:pointer;" onclick="getSachetImages({{$i->id}})"><i class="fas fa-eye" style="color:black;padding:5px;"></i></a></td>

                            <td><a href="{{url('/product/edit/'.$i->id)}}" title="Edit"><i class="fas fa-pencil-alt" style="color:#39f;padding:5px;"></i></a>
                            @if(session('role') == 'admin')  <a style="cursor:pointer;" onclick="remove({{$i->id}})"><i class="far fa-trash-alt" title="Delete" style="color:red;padding:5px;"></i></a>
                            @endif
                            <a href="{{url('product/view-product/'.$i->id)}}" target="_blank" style="cursor:pointer;" title="View Product"><i class="fa fa-eye" style="color:black;padding:5px;"></i></a>
                            <a href="{{url('product/'.$i->p_slug)}}" target="_blank" style="cursor:pointer;" title="View Product on website"><i class="fa fa-globe" style="color:black;padding:5px;"></i></a>
                            <a href="{{url('product/view-tags/'.$i->id)}}" style="cursor:pointer;" target="_blank" title="Tags"><i class="fas fa-tags" style="color:black;padding:5px;"></i></a>
                              <!-- <a href="javascript:;"><i class="far fa-copy" style="color:#39f;padding:5px;"></i></a> -->
                              <select class="form-control" id="category{{$i->id}}" onchange="assignCategory({{$i->id}})" data-toggle="tooltip" title="Assign Category" style="width:200px;">
                                @foreach($categories as $cat)
                                  @if($cat->id == $i->category_id)
                                    <option selected value="{{$cat->id}}">{{$cat->cat_title}}</option>
                                  @else
                                    <option value="{{$cat->id}}">{{$cat->cat_title}}</option>
                                  @endif
                                @endforeach
                              </select>
                              <select class="form-control" id="product_mode{{$i->id}}" onchange="changeProductMode({{$i->id}})" data-toggle="tooltip" title="Product Mode" style="width:200px;">
                                  @if($i->p_theme == null)
                                    @if($i->product_mode == 0)<option selected value="0">Product Processing Theme</option>@else <option value="0">Product Processing Theme</option> @endif
                                    @if($i->product_mode == 1)<option selected value="1">Product Machine Theme</option>@else <option value="1">Product Machine Theme</option> @endif
                                    @if($i->product_mode == 2)<option selected value="2">Product Theme C</option>@else <option value="2">Product Theme C</option> @endif
                                  @else
                                    @if($i->p_theme == 0)<option selected value="0">Product Processing Theme</option>@else <option value="0">Product Processing Theme</option> @endif
                                    @if($i->p_theme == 1)<option selected value="1">Product Machine Theme</option>@else <option value="1">Product Machine Theme</option> @endif
                                    @if($i->p_theme == 2)<option selected value="2">Product Theme C</option>@else <option value="2">Product Theme C</option> @endif
                                  @endif
                                    
                                </select>
                                <select class="form-control" id="status{{$i->id}}" onchange="changeStatus({{$i->id}})" data-toggle="tooltip" title="Status" style="width:200px;">
                                    @if($i->p_status == 0)<option selected value="0">Deactive</option>@else <option value="0">Deactive</option> @endif
                                    @if($i->p_status == 1)<option selected value="1">Active</option>@else <option value="1">Active</option> @endif
                                </select>
                                <select class="form-control" id="slider{{$i->id}}" onchange="changeSlider({{$i->id}})" data-toggle="tooltip" title="Assign to home slider" style="width:200px;">
                                    @if($i->p_slider_id == 1)<option selected value="1">Machine</option>@else <option value="1">Machine</option> @endif
                                    @if($i->p_slider_id == 2)<option selected value="2">Processing Line</option>@else <option value="2">Processing Line</option> @endif
                                    @if($i->p_slider_id == 0)<option selected value="0">Assign Home Slider</option>@else<option value="0">None</option>@endif
                                </select>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                       <div class="pagination">{{$products->links()}}</div> 
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
        <h5 class="modal-title" id="exampleModalLongTitle">Gallery Images</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body col-md-12">
          <div class="row" id="show_gallery">
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
  function assignMultipleActions(elm){
     var list = [];
     list = $(".checkbox_list:checked").map(function() {     
        return this.value;
      }).get();
     $("#box_id").val(list);
     elm.attr('type','submit');
     $("#assign_from").attr("action","{{url('/product/assign-actions')}}");
  }

      function getRows(){
        var num = $('#row_show option:selected').val();
        window.location = "{{url('products/filter')}}/"+num;
      }  
        function goBack(){
          window.history.back();
        }
        
        var progress = null;
        var url = "{{url('/uploads')}}";
            function getBagImages(id)
            {

              if (progress) {
                  progress.abort();
              }
              progress =  $.ajax({
                  url: "{{url('/product/get_bag_images')}}",
                  type: 'POST',
                  data: {id:id,_token:'{{ csrf_token() }}'},
                   beforeSend:function(){
                    $("#show_gallery").html(null);
                  },
                  success: function(res)
                   {
                    console.log(res);
                    $("#exampleModalLongTitle").html('Bag Images'); 
                    $('#galleryImages').modal('show'); 
                       $.each(res,function(k,v){
                        $("#show_gallery").append('<div class="col-md-4">'+
                              '<img src="'+url+'/product/'+v['p_bag_image']+'" class="img-thumbnail" alt="Cinque Terre">'+                            
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
            function getCommodityImages(id)
            {
              if (progress) {
                  progress.abort();
              }              
              progress =   $.ajax({
                  url: "{{url('/product/get_commodity_images')}}",
                  type: 'POST',
                  data: {id:id,_token:'{{ csrf_token() }}'},
                   beforeSend:function(){
                    $("#show_gallery").html(null);
                  },
                  success: function(res)
                   {
                    console.log(res);
                    $("#exampleModalLongTitle").html('Commodity Images'); 
                    $('#galleryImages').modal('show'); 
                       $.each(res,function(k,v){
                        $("#show_gallery").append('<div class="col-md-4">'+
                              '<img src="'+url+'/commodity/'+v['p_commodity_image']+'" class="img-thumbnail" alt="Cinque Terre">'+                            
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
            function getSachetImages(id)
            {
              if (progress) {
                  progress.abort();
              }
              progress = $.ajax({
                  url: "{{url('/product/get_sachet_images')}}",
                  type: 'POST',
                  data: {id:id,_token:'{{ csrf_token() }}'},
                   beforeSend:function(){
                    $("#show_gallery").html(null);
                  },
                  success: function(res)
                   {
                    console.log(res);
                    $("#exampleModalLongTitle").html('Sachet Images'); 
                    $('#galleryImages').modal('show'); 
                       $.each(res,function(k,v){
                        $("#show_gallery").append('<div class="col-md-4">'+
                              '<img src="'+url+'/sachet/'+v['p_sachet_image']+'" class="img-thumbnail" alt="Cinque Terre">'+                            
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
            function changeProductMode(id)
            {
                var product_mode = $('#product_mode'+id).val();
                $.ajax({
                  url: "{{url('/product/change_product_mode')}}",
                  type: 'POST',
                  data: {id:id,product_mode:product_mode,_token:'{{ csrf_token() }}'},
                  success: function(res)
                   {
                    console.log(res);
                        if(res == 1 || res == 0)
                        {
                            $("#danger").css('display','none');
                            $("#success").css('display','block');
                            $("#success").html("Mode Changed..");
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
            function assignCategory(id)
            {
                var category = $('#category'+id).val();
                $.ajax({
                  url: "{{url('/product/assign_category')}}",
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
            function changeStatus(id)
            {
                var status = $('#status'+id).val();
                $.ajax({
                  url: "{{url('/product/change_status')}}",
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
            function changeSlider(id)
            {
                var slider_id = $('#slider'+id).val();
                $.ajax({
                  url: "{{url('/product/assign_home_slider')}}",
                  type: 'POST',
                  data: {id:id,slider_id:slider_id,_token:'{{ csrf_token() }}'},
                  success: function(res)
                   {
                        if(res == 1 || res == 0)
                        {
                            $("#danger").css('display','none');
                            $("#success").css('display','block');
                            $("#success").html("Product assigned to slider..");
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

         function showLongDescription(id)
        {
            if (progress) {
                  progress.abort();
              }
              progress = $.ajax({
                  url: "{{url('/product/get_long_desc')}}",
                  type: 'POST',
                  data: {id:id,_token:'{{ csrf_token() }}'},
                   beforeSend:function(){
                    $("#show_gallery").html(null);
                  },
                  success: function(res)
                   {
                    console.log(res);
                    $('#galleryImages').modal('show'); 
                       $("#exampleModalLongTitle").html('Product Long Description'); 
                      $('#galleryImages').modal('show'); 
                          $("#show_gallery").append('<div class="col-md-12">'+
                                  '<p style="text-align:justify;">'+res[0].p_long_desc+'</p>'+
                                  '</div>');
                      progress = null;

                   },
                   error: function(res)
                   {
                    console.log(res);
                   }
                });
           
        }
        function showShortDescription(desc)
        {
            $("#show_gallery").html(' ');
            $("#exampleModalLongTitle").html('Product Short Description'); 
            $('#galleryImages').modal('show'); 
                $("#show_gallery").append('<div class="col-md-12">'+
                        '<p style="text-align:justify;">'+desc+'</p>'+
                        '</div>');
        }
        function remove(id){
            let r = confirm("Are you sure?" );
            if (r === true) {
                window.location="<?php echo url('/product/delete/'); ?>/"+id;
            }
        }
      $(document).ready(function() {
          $('#myTable').DataTable( {
              "paging":   false,
          } );
      } );

    </script>
@endsection