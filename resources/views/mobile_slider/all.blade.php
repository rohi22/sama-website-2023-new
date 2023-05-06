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
            <h4 class="text-themecolor">All Mobile Sliders</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">All Mobile Sliders</li>
                </ol>
                <a href="{{url('mobile_slider/new')}}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button></a>
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
                    <div class="col-md-12">
                        <form action="{{url('/mobile_slider/mobile_slider_back_img')}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
                            <div class="row">
                                <div class="form-group @if($errors->has('mobile_slider_back_img')) has-danger @endif row col-md-6">
                                <label class="control-label text-right col-md-3">Upload Background Image</label>
                                <div class="col-md-9">
                                    <input type="file" class="form-control form-control-danger" name="mobile_slider_back_img" id="files">
                                    <small class="form-control-feedback">@if($errors->has('mobile_slider_back_img')) {{ $errors->first('mobile_slider_back_img') }} @endif</small> 
                                </div>
                            </div>
                            <div class="form-group row col-md-6">
                                <label class="control-label text-right col-md-3">Background Image</label>
                                <div class="col-md-9">
                                    <img src="{{asset('uploads/mobile/'.$mobile_back_img->mobile_slider_back_img)}}" style="width:151px;height:100px;" id="image">
                                </div>
                                 <input title="" type="submit" class="btn btn-success" value="Upload">
                            </div>
                            </div>
                            
                        </form>
                    </div>
                    <div class="table-responsive m-t-40">
                      @if(session()->has('message'))<div class="alert alert-success col-md-5" style="text-align: center;left:24%;">{{ session()->get('message') }}</div>@endif
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Title</th>
                                <th>Second Title</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody><?php $no=0 ?>
                            @foreach($sliders as $i)<?php $no++ ?>
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$i->h_first}}</td>
                                <td>{{$i->h_second}}</td>
                                <td><img style="width:40px;height:40px;border-radius:10px;" src="{{asset('uploads/mobile/'.$i->image)}}"</td>
                                <td><a href="{{url('/mobile_slider/edit/'.$i->id)}}"><i class="fas fa-pencil-alt" style="color:#39f;padding:5px;"></i></a>
                                  @if(session('role') == 'admin')<a onclick="remove({{$i->id}})"><i class="far fa-trash-alt" style="color:red;padding:5px;"></i></a></td>
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
        function remove(id){
            let r = confirm("Are you sure?" );
            if (r === true) {
                window.location="<?php echo asset('/mobile_slider/delete/'); ?>/"+id;
            }
        }

        document.getElementById("files").onchange = function () {
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("image").src = e.target.result;
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };
    </script>
@endsection
