@if(session('role') == 2)
    <script type="text/javascript">window.location = "<?php echo asset('/dashboard'); ?>"</script>
@endif
@extends('app.app')
@section('content')
<style>
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>
 <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">All Subcategories</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">All Subcategories</li>
                </ol>
                <a href="{{url('category/new')}}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button></a>
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
       <div class="col-md-12">
          <form action="{{url('/category/search')}}" method="get" enctype="multipart/form-data">{{csrf_field()}}
              <div class="row">
                <div class="form-group @if($errors->has('search')) has-danger @endif row col-md-6">
                  <div class="col-md-9">
                      <input type="text" class="form-control form-control-danger" name="search" value="{{request('search')}}" placeholder="Search Categories here..">
                      <small class="form-control-feedback">@if($errors->has('search')) {{ $errors->first('search') }} @endif</small> 
                  </div>
                  <label class="control-label text-right col-md-3"><input title="" type="submit" class="btn btn-success" value="Search">@if(request('search') != null)<input onclick="goBack()" style="margin-left: 5px;" type="button" class="btn btn-primary" value="Back">@endif</label>
                </div>
              </div>    
          </form>
        </div>
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
                                <th>Picture</th>
                                <th>Icon</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody><?php $no=0 ?>
                            @foreach($categories as $i)<?php $no++ ?>
                            <tr>
                                <td>{{$no}}</td>
                                <td><strong><a href="{{url('category/view_subheads/'.$i->id)}}">{{$i->cat_title}}</a></strong></td>
                                <td>{{$i->cat_desc}}</td>
                                <td>{{$i->cat_meta_desc}}</td>
                                <td><img class="img" src="{{asset('uploads/'.$i->cat_image)}}" style="width: 60px;height: 50px;"></td>
                                <td><img class="img" src="{{asset('uploads/'.$i->cat_icon)}}" style="width: 60px;height: 50px;"></td>
                                <td> 
                                  <select class="form-control" id="status{{$i->id}}" onchange="changeStatus({{$i->id}})" data-toggle="tooltip" title="Status" style="width:90px !important;">
                                        @if($i->status == 0)<option selected value="0">Deactive</option>@else <option value="0">Deactive</option> @endif
                                        @if($i->status == 1)<option selected value="1">Aactive</option>@else <option value="1">Aactive</option> @endif
                                    </select>
                                   <select class="form-control" id="theme_mode{{$i->id}}" onchange="changeThemeMode({{$i->id}})" data-toggle="tooltip" title="Category Mode" style="width:100px !important;">
                                        @if($i->theme_mode == 0)<option selected value="0">Machine Theme</option>@else <option value="0">Machine Theme</option> @endif
                                        @if($i->theme_mode == 1)<option selected value="1">Processing Line Theme</option>@else <option value="1">Processing Line Theme</option> @endif
                                        @if($i->theme_mode == 2)<option selected value="2">C Theme</option>@else <option value="2">C Theme</option> @endif
                                    </select>
                                    <select class="form-control" id="product_mode{{$i->id}}" onchange="changeProductMode({{$i->id}})" data-toggle="tooltip" title="Product Mode" style="width:150px !important;">
                                        @if($i->product_mode == 0)<option selected value="0">Product Machine Theme</option>@else <option value="0">Product Machine Theme</option> @endif
                                        @if($i->product_mode == 1)<option selected value="1">Product Processing Line Theme</option>@else <option value="1">Product Processing Line Theme</option> @endif
                                        @if($i->product_mode == 2)<option selected value="2">Product Theme C</option>@else <option value="2">Product Theme C</option> @endif
                                    </select>
                                    <select class="form-control" id="theme_menu{{$i->id}}" onchange="changeMenu({{$i->id}})" data-toggle="tooltip" title="Top Menu" style="width:140px !important;">
                                        @if($i->menu_mode == 1)<option selected value="1">Show On Menu</option>@else <option value="1">Show On Menu</option> @endif
                                        @if($i->menu_mode == 0)<option selected value="0">Don't Show On Menu</option>@else <option value="0">Don't Show On Menu</option> @endif
                                    </select>
                                    <select class="form-control" onchange="changeOrder({{$i->id}},this.value)" data-toggle="tooltip" title="Category Order" style="width:90px !important;">
                                      @forelse($category_orders as $j)
                                        <option @if($i->cat_order == $j->id) selected @endif value="{{$j->id}}">{{$j->id}}</option>
                                      @empty
                                      @endforelse
                                    </select>
                                    <a href="{{url('category/edit/'.$i->id)}}" data-toggle="tooltip" title="Edit" data-placement="top"><i class="fas fa-pencil-alt" style="color:#39f;padding:5px;"></i></a>
                                    @if(session('role') == 'admin') <a onclick="remove({{$i->id}})" data-toggle="tooltip" title="Delete"><i class="far fa-trash-alt" style="color:red;padding:5px;cursor: pointer;"></i></a>
                                    @endif 
                                    @if($i->status == 1)<a href="{{url('sub-category/'.$i->cat_slug)}}" target="_blank" style="cursor:pointer;" title="View category on website"><i class="fa fa-globe" style="color:black;padding:5px;"></i></a>@endif
                                    <a href="javascript:;" onclick="addAttribute({{$i->id}})">Add Attributes</a>
                                    
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
        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Attribute List</strong></h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <label class="container" style="margin-top: 10px;font-size: inherit;">Select ALL<input type="checkbox" class ="attribute"  id="checkAll"><span class="checkmark"></span></label>
        <div class="alert alert-success" id="msg" style="display:none;margin-top: 30px;text-align: center;"></div>
      </div>
      <div class="modal-body col-md-12" style="min-height: 400px !important;">
          <div class="row" id="show_gallery" style="margin-left: 10px;overflow-y: scroll;height: 400px;">
              
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="attributeSave()" id="saveButton">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('page-scripts')

    <script>
         $("#checkAll").click(function () {
         $('input:checkbox').not(this).prop('checked', this.checked);
     });
      var progress = null;
            function changeStatus(id)
            {
                var status = $('#status'+id).val();
                $.ajax({
                  url: "{{url('/category/change_status')}}",
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
            function changeMenu(id)
            {
                var menu = $('#theme_menu'+id).val();
                $.ajax({
                  url: "{{url('/category/change_menu')}}",
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
            function changeProductMode(id)
            {
                var product_mode = $('#product_mode'+id).val();
                $.ajax({
                  url: "{{url('/category/change_product_mode')}}",
                  type: 'POST',
                  data: {id:id,product_mode:product_mode,_token:'{{ csrf_token() }}'},
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

            function changeThemeMode(id)
            {
                var theme_mode = $('#theme_mode'+id).val();
                $.ajax({
                  url: "{{url('/category/change_theme_mode')}}",
                  type: 'POST',
                  data: {id:id,theme_mode:theme_mode,_token:'{{ csrf_token() }}'},
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
        function addAttribute(id)
        {
          if (progress) {
            progress.abort();
          }
          $("#saveButton").attr('disabled',false);
          $("#msg").css('display','none');
          $("#galleryImages").append('<div><input type="hidden" id="attributeId" value="'+id+'"></div>');
          progress = $.ajax({
              url: "{{url('/category/get_attribute_list')}}",
              type: 'POST',
              data: {id:id,_token:'{{ csrf_token() }}'},
               beforeSend:function(){
                $("#show_gallery").html(null);
              },
              success: function(res)
               {
                console.log(res);
                $('#galleryImages').modal('show'); 
                   //$.each(res,function(k,v){
                    $("#show_gallery").append(res);
                  //});
                 progress = null;  
               },
               error: function(res)
               {
                console.log(res);
               }
            });
        }
        $(document).ready(function() {
            $("select").select2();
            $('[data-toggle="tooltip"]').tooltip();   
        });

        function remove(id){
            let r = confirm("Are you sure?" );
            if (r === true) {
                window.location="<?php echo asset('/category/delete/'); ?>/"+id;
            }
        }
        function attributeSave()
        {

          var id = $("#attributeId").val();
          var array = [];
          var checkedValues = $('.attribute:checked').map(function() { return this.value;}).get();
          $.ajax({
                  url: "{{url('/category/assign_attribute')}}",
                  type: 'POST',
                  data: {id:id,selected_attribute:checkedValues,_token:'{{ csrf_token() }}'},
                  success: function(res)
                   {
                    console.log(res);
                    if(res == 1)
                        {
                            $("#saveButton").attr('disabled',true);
                            $("#msg").css('display','block');
                            $("#msg").html("Attribute added..");
                        }
                   
                   },
                   error: function(res)
                   {
                    console.log(res);
                   }
                });         
      
        }
        function goBack()
        {
          window.history.back();
        }
           function changeOrder(current_order,new_order)
      {
        
            $.ajax({
              url: "{{url('/category/change_cat_order')}}",
              type: 'POST',
              data: {current_order:current_order,new_order:new_order,_token:'{{ csrf_token() }}'},
              success: function(res)
               {
                console.log(res);
                    if(res == 1 || res == 0)
                    {
                        $("#danger").css('display','none');
                        $("#success").css('display','block');
                        $("#success").html("Order Changed..");
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

