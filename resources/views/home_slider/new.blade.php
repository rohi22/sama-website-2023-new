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
            <h4 class="text-themecolor">Add Home Slider</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Add Home Slider</li>
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
                    <form action="{{url('/home-slider/new')}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
                        <div class="form-body">
                            <div class="row">
                                <!-- row -->
                                <div class="col-md-8">
                                    <div class="form-group @if($errors->has('h_first')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">First Title</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control form-control-danger"  name="h_first" value="{{ old('h_first') }}">{{ old('h_first') }}</textarea>
                                            <small class="form-control-feedback">@if($errors->has('h_first')) {{ $errors->first('h_first') }} @endif</small> 
                                        </div>
                                    </div>
                                     <div class="form-group @if($errors->has('h_second')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Second Title</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control form-control-danger"  name="h_second" value="{{ old('h_second') }}">{{ old('h_second') }}</textarea>
                                            <small class="form-control-feedback">@if($errors->has('h_second')) {{ $errors->first('h_second') }} @endif</small> 
                                        </div>
                                    </div>
                                     <div class="form-group @if($errors->has('h_third')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Third Title</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control form-control-danger"  name="h_third" value="{{ old('h_third') }}">{{ old('h_third') }}</textarea>
                                            <small class="form-control-feedback">@if($errors->has('h_third')) {{ $errors->first('h_third') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('h_fourth')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Fourth Title</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control form-control-danger"  name="h_fourth" value="{{ old('h_fourth') }}">{{ old('h_fourth') }}</textarea>
                                            <small class="form-control-feedback">@if($errors->has('h_fourth')) {{ $errors->first('h_fourth') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('h_fifth')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Fifth Title</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control form-control-danger"  name="h_fifth" value="{{ old('h_fifth') }}">{{ old('h_fifth') }}</textarea>
                                            <small class="form-control-feedback">@if($errors->has('h_fifth')) {{ $errors->first('h_fifth') }} @endif</small> 
                                        </div>
                                    </div>
                                    <div class="form-group @if($errors->has('image')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Image</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control form-control-danger" name="image">
                                            <small class="form-control-feedback">@if($errors->has('image')) {{ $errors->first('image') }} @endif</small> 
                                        </div>
                                    </div>
                                     <div class="form-group @if($errors->has('contact_show')) has-danger @endif row">
                                        <label class="control-label text-right col-md-3">Show Contact</label>
                                        <div class="col-md-9">
                                            Yes:<input type="radio" class="form-control form-control-danger"  name="contact_show" value="yes">
                                            No:<input type="radio" class="form-control form-control-danger"  name="contact_show" value="no">
                                            <small class="form-control-feedback">@if($errors->has('contact_show')) {{ $errors->first('contact_show') }} @endif</small> 
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="col-md-9">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
</div>
@endsection


