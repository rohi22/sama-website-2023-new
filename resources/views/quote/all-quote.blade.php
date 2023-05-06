@extends('app/app')
@section('content')
 <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">All Quote</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">All Quote</li>
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
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Number</th>
                                <th>Number</th>
                                <th>Date Time</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                                @if(count($allQuote) > 0)
                                    @foreach($allQuote as $key => $i)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$i->email}}</td>
                                        <td>{{$i->message}}</td>
                                        <td>{{$i->number}}</td>
                                        <td>{{$i->created_at}}</td>
                                    </tr>
                                    @endforeach
                                @endif
                                
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
        
    </script>
@endsection
