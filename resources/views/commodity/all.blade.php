@if(session('role') == 2)
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
            <h4 class="text-themecolor">All Commodities</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">All Commodities</li>
                </ol>
                <a href="{{url('commodity/new')}}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button></a>
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
                                    <th>Commodity Image</th>
                                    <th>Commodity Title</th>
                                </tr>
                            </thead>
                            <tbody><?php $no=0 ?>
                                @foreach($commodities as $i)<?php $no++ ?>
                                <tr>
                                    <td>{{$no}}</td>
                                    <td><img style="width: 60px;height: 50px;border-radius: 7px;"src="{{asset('uploads/commodity/'.$i->commodity_images)}}"></td>
                                    <td>{{$i->commodity_name}}</td>
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

