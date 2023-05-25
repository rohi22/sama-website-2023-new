<!-- @if(session('role') == 1)
    <script type="text/javascript">window.location = "<?php echo asset('/dashboard'); ?>"</script>
@endif -->
@extends('app.app')
@section('content')
 <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">All Spare Parts</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">All Spare Parts</li>
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
                                    <th>Contact</th>
                                    <th>Company</th>
                                    <th>Country</th>
                                    <th>City</th>
                                    <th>Machine</th>
                                    <th>Model</th>
                                    <th>Parts</th>
                                    <th>Details</th>
                                    <th>Actions</th>
                                    
                                </tr>
                            </thead>
                            <tbody><?php $no=0 ?>
                                @foreach($data as $i)<?php $no++ ?>
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$i->name}}</td>
                                    <td>{{$i->phone}}</td>
                                    <td>{{$i->company}}</td>
                                    <td>{{$i->country_name}}</td>
                                    <td>{{$i->city_name}}</td>
                                    <td>{{$i->machine_name}}</td>
                                    <td>{{$i->model}}</td>
                                    <td>{{$i->parts}}</td>
                                    <td>{{$i->any_detail}}</td>
                                    <td>     
                                       @if(session('role') == 'admin')<a style="cursor:pointer;" onclick="remove({{$i->id}})" data-toggle="tooltip" title="Delete"><i class="far fa-trash-alt" style="color:red;padding:5px;"></i></a>
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
    $(document).ready(function() {
            $("select").select2();
    });
        function remove(id){
            let r = confirm("Are you sure?" );
            if (r === true) {
                window.location="<?php echo url('spare_part/delete/'); ?>/"+id;
            }
        }
    </script>    
@endsection
