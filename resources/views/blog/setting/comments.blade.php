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
            <h4 class="text-themecolor">All Blog Comments</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">All Blog Comments</li>
                </ol>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th>Url</th>
                            <th>Actions</th>
                            
                        </tr>
                        </thead>
                        <tbody><?php $no=0 ?>
                        @foreach($data as $i)<?php $no++ ?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$i->name}}</td>
                            <td>{{$i->email}}</td>
                            <td>{{$i->comment}}</td>
                            <td>{{$i->url}}</td>
                            <td>     
                            
                            @if(session('role') == 'admin')<a style="cursor: pointer;"onclick="remove({{$i->id}})" data-toggle="tooltip" title="Delete"><i class="far fa-trash-alt" style="color:red;padding:5px;"></i></a>
                            
                            <select class="form-control" id="status{{$i->id}}" onchange="changeStatus({{$i->id}})" data-toggle="tooltip" title="Status" style="width:150px;">
                                    @if($i->status == 0)<option selected value="0">Deactive</option>@else <option value="0">Deactive</option> @endif
                                    @if($i->status == 1)<option selected value="1">Active</option>@else <option value="1">Active</option> @endif
                                </select>
                            @endif
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
@endsection
@section('page-scripts')
    <script>
    function remove(id){
            let r = confirm("Are you sure?" );
            if (r === true) {
                window.location="<?php echo url('/blog/comment/delete/'); ?>/"+id;
            }
        }
            function changeStatus(id)
            {
                var status = $('#status'+id).val();
                $.ajax({
                  url: "{{url('/blog/comment/change_status')}}",
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
    </script>    
@endsection
