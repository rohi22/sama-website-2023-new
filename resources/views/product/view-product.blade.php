@if(session('role') == 2 || session('role') == 1)
     <script type="text/javascript">window.location = "<?php echo asset('/dashboard'); ?>"</script>
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
            <h4 class="text-themecolor">View Product</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">View Product</li>
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
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <th>Title</th><th>{{$data->p_title}}</th>
                                            </tr>
                                            <tr>
                                                <th>Category</th><th>{{$data->cat_title}}</th>
                                            </tr>
                                            <tr>
                                                <th>Slug</th><th>{{$data->p_slug}}</th>
                                            </tr>
                                            <tr>
                                                <th>Short Description</th><th>{!! $data->p_short_desc !!}</th>
                                            </tr> 
                                            <tr>
                                                <th>Long Description</th><th>{!! $data->p_long_desc !!}</th>
                                            </tr>
                                            <tr>
                                                <th>Video Link</th><th><a target="_blank" href="{!! $data->p_video_link !!}">Visit Link</a></th>
                                            </tr>
                                            <tr>
                                                <th>Main Image</th><th><img src="{{url('uploads/product/'.$data->p_main_image)}}" style="width: 100px;height: 60px;border-radius: 4px;"></th>
                                            </tr>
                                             <tr>
                                                <th>PDF File</th><th>@if(!empty($data->p_pdf))<a href="{{url('uploads/pdf/'.$data->p_pdf)}}">View File</a>@endif</th>
                                            </tr>
                                            <tr>
                                                <th>Status</th><th> @if($data->p_status == 1) Active @else Deactive @endif</th>
                                            </tr>
                                             <tr>
                                                <th>Product Theme</th><th> @if($data->p_theme == 0) Product Processing Theme @elseif($data->p_theme == 1) Product Machine Theme @elseif($data->p_theme == 2)  Product Theme C @endif</th>
                                            </tr>
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

