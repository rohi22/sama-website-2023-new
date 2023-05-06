@if(session('role') == 2 || session('role') == 1)
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
            <h4 class="text-themecolor">All Users</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">All Users</li>
                </ol>
                <a href="{{url('admin/add-user')}}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button></a>
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
                                <th>Email</th>
                                <th>password</th>
                                <th>Contact</th>
                                <th>Bio</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody><?php $no=0 ?>
                            @foreach($users as $i)<?php $no++ ?>
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$i->name}}</td>
                                <td>{{$i->email}}</td>
                                <td>{{$i->password}}</td>
                                <td>{{$i->contact}}</td>
                                <td><?php echo $i->bio_desc ?></td>
                                <td>@if($i->role == '1') Sama Data Entry User @elseif($i->role == 2) Blog user @endif</td>
                                <td><a href="{{asset('admin/edit/'.$i->id)}}"><i class="fas fa-pencil-alt" style="color:#39f;padding:5px;"></i></a>
                                  <a onclick="remove({{$i->id}})"><i class="far fa-trash-alt" style="color:red;padding:5px;"></i></a></td>
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
                window.location="<?php echo url('admin/user/delete/'); ?>/"+id;
            }
        }
    </script>
@endsection
