@if(session('role') == 2 || session('role') == 1)
     <!-- <script type="text/javascript">window.location = "<?php echo asset('/dashboard'); ?>"</script> -->
@endif
@extends('app.app')
@section('content')
<style type="text/css">
.bootstrap-tagsinput {
    width: 100%;
}
.label {
    line-height: 2 !important;
}
</style>
 <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">View Accessories</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">View Accessories</li>
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
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @if(session()->has('message'))<div class="alert alert-success col-md-5" style="text-align: center;left:24%;">{{ session()->get('message') }}</div>@endif
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Slug</th>
                                                <th>OG Image</th>
                                                
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $k=>$v)
                                                <tr>
                                                    <td>{{$k+1}}</td>
                                                    <td>{{$v->p_title}}</td>
                                                    <td>{!! $v->p_short_desc !!}</td>
                                                    <td>{{$v->p_slug}}</td>
                                                    <td><img src="{{url('uploads/product/'.$v->p_main_image)}}" style="width: 100px;height: 60px;"></td>
                                                    
                                                    <td><a style="cursor:pointer;" onclick="remove({{$v->id}},{{$id}})"><i class="far fa-trash-alt" title="Delete" style="color:red;padding:5px;"></i></a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
 function remove(id,p_id){
            let r = confirm("Are you sure?" );
            if (r === true) {
                window.location="<?php echo url('/product/accessories-product-delete/'); ?>/"+id+"/"+p_id;
            }
        }
</script>
@endsection