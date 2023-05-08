@if (session('role') == 2)
    <script type="text/javascript">
        window.location = "<?php echo asset('/dashboard'); ?>"
    </script>
@endif
@extends('app.app')
@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Add Industry</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Industry</li>
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
                        <form action="{{ url('/industry/new') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">
                                    <!-- row -->
                                    <div class="col-md-8">
                                        <div class="form-group @if ($errors->has('s_title')) has-danger @endif row">
                                            <label class="control-label text-right col-md-3">Title</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control form-control-danger"
                                                    name="title" value="{{ old('title') }}">
                                                <small class="form-control-feedback">
                                                    @if ($errors->has('title'))
                                                        {{ $errors->first('title') }}
                                                    @endif
                                                </small>
                                            </div>
                                        </div>
                                        <div class="form-group @if ($errors->has('url')) has-danger @endif row">
                                            <label class="control-label text-right col-md-3">URL</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control form-control-danger"
                                                    name="url" value="{{ old('url') }}">
                                                <small class="form-control-feedback">
                                                    @if ($errors->has('url'))
                                                        {{ $errors->first('url') }}
                                                    @endif
                                                </small>
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
@section('page-scripts')
    <script>
        $(document).ready(function() {


        });
    </script>
@endsection
