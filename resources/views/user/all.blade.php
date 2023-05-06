@extends('app/app')
@section('content')
 <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">All Users</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">All Users</li>
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
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody><?php $no=0 ?>
                            @foreach($users as $i)<?php $no++ ?>
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$i->name}}</td>
                                <td>{{$i->company}}</td>
                                <td>{{$i->email}}</td>
                                <td>{{$i->phone}}</td>
                                <td>{{$i->msg}}</td>
                                @if(session('role') == 'admin')<td><a onclick="remove({{$i->id}})"><i class="far fa-trash-alt" style="color:red;padding:5px;"></i></a></td>
                                @endif
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
        $(document).ready(function() {
            $("select").select2();
        });
        function remove(id){
            let r = confirm("Are you sure?" );
            if (r === true) {
                window.location="<?php echo url('user/delete'); ?>/"+id;
            }
        }
    </script>
@endsection
