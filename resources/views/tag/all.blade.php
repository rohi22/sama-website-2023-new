@if(session('role') == 2 || session('role') == 1)
     <script type="text/javascript">window.location = "<?php echo asset('/dashboard'); ?>"</script>
@endif
@extends('app.app')
@section('content')

<style>
    
    a{
        text-decoration:none;
        color:red;
    }
</style>
 <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">All Tags</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{url('tag/tag-list')}}">All Tags</a></li>
                </ol>
                <a href="{{url('tag/new')}}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button></a>
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
            <form action="{{url('tag/tag-list')}}" method="get" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-2">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{!empty($_GET['title'])?$_GET['title']:''}}" />
                    </div>
                    <div class="col-md-2">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Description" value="{{!empty($_GET['description'])?$_GET['description']:''}}" />
                    </div>
                    <div class="col-md-2">
                        <label>Meta Description</label>
                        <input type="text" class="form-control" name="metaDescription" placeholder="Meta Description" value="{{!empty($_GET['metaDescription'])?$_GET['metaDescription']:''}}" />
                    </div>
                    <div class="col-md-2">
                        <label>Meta Key Words</label>
                        <input type="text" class="form-control" name="metaKeyWords" placeholder="Meta Key Words" value="{{!empty($_GET['metaKeyWords'])?$_GET['metaKeyWords']:''}}" />
                    </div>
                    
                    <div class="col-md-12 mt-2 mb-2">
                        <input type="submit" class="btn btn-success" value="Filter" name="filter" />
                    </div>
                </div>
            </form>
             <div class="card">
                <div class="card-body">
                    <div class="table-responsive m-t-40">
                      @if(session()->has('message'))<div class="alert alert-success col-md-5" style="text-align: center;left:24%;">{{ session()->get('message') }}</div>@endif
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                               <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Meta Description</th>
                                <th>Meta Key Words</th>
                                <th>OG Image</th>
                                <th>Icon Image</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($data as $key=>$i)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$i->gt_title}}</td>
                                <td>{!! $i->gt_desc !!}</td>
                                <td>{!! $i->gt_meta_desc !!}</td>
                                <td>{!! $i->gt_meta_key_words !!}</td>
                                <td><img class="img" src="{{asset('uploads/tags/'.$i->gt_og_img)}}"style="width: 100px;height: 60px;"></td>
                                <td><img class="img" src="{{asset('uploads/tags/'.$i->gt_icon)}}"style="width: 100px;height: 60px;"></td>
                                <td><a href="{{asset('tag/edit/'.$i->id)}}"><i class="fas fa-pencil-alt" style="color:#39f;padding:5px;"></i></a>
                                  <a onclick="remove({{$i->id}})"><i class="far fa-trash-alt" style="cursor: pointer;color:red;padding:5px;"></i></a>
                                  <a href="{{url('tag/'.$i->gt_slug)}}" target="_blank" style="cursor:pointer;" title="View tag on website"><i class="fa fa-globe" style="color:black;padding:5px;"></i></a></td>
                            </tr>
                            @endforeach
                           
                            </tbody>
                        </table>
                        <div class="pagination">{{$data->links()}}</div> 
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
                window.location="<?php echo url('tag/delete/'); ?>/"+id;
            }
        }
        $(document).ready(function() {
            $('#myTable').DataTable( {
                "paging":   false,
                "searching": false
            });
        });
    </script>
@endsection
