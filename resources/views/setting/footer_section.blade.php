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
                        <h4 class="text-themecolor">Footer Section</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Footer Section</li>
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
                                <form action="{{url('/setting/footer/submit')}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
                                    <div class="form-body">
                                        @if(session()->has('message'))<div class="alert alert-success col-md-5" style="text-align: center;left: 24%;">{{ session()->get('message') }}</div>@endif
                                        <div class="row">
                                            <!-- row -->
                                            <div class="row col-md-12">
                                                <div class="form-group @if($errors->has('f_email_1')) has-danger @endif col-md-3">
                                                    <label class="control-label text-right col-md-4">Email 1</label>
                                                    <div class="col-md-12">
                                                         <input type="text" class="form-control form-control-danger" name="f_email_1" value="{{$data->f_email_1}}">
                                                         <input type="text" class="form-control form-control-danger" name="f_text_email_1" value="{{$data->f_text_email_1}}">
                                                         <small class="form-control-feedback">@if($errors->has('f_email_1')) {{ $errors->first('f_email_1') }} @endif</small> 
                                                    </div>
                                                </div>
                                                <div class="form-group @if($errors->has('f_email_2')) has-danger @endif col-md-3">
                                                    <label class="control-label text-right col-md-4">Email 2</label>
                                                    <div class="col-md-12">
                                                         <input type="text" class="form-control form-control-danger" name="f_email_2" value="{{$data->f_email_2}}">
                                                         <input type="text" class="form-control form-control-danger" name="f_text_email_2" value="{{$data->f_text_email_2}}">
                                                        <small class="form-control-feedback">@if($errors->has('f_email_2')) {{ $errors->first('f_email_2') }} @endif</small> 
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group @if($errors->has('f_email_3')) has-danger @endif col-md-3">
                                                    <label class="control-label text-right col-md-4">Email 3</label>
                                                    <div class="col-md-12">
                                                         <input type="text" class="form-control form-control-danger" name="f_email_3" value="{{$data->f_email_3}}">
                                                         <input type="text" class="form-control form-control-danger" name="f_text_email_3" value="{{$data->f_text_email_3}}">
                                                        <small class="form-control-feedback">@if($errors->has('f_email_3')) {{ $errors->first('f_email_3') }} @endif</small> 
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="form-group @if($errors->has('f_email_4')) has-danger @endif col-md-3">
                                                    <label class="control-label text-right col-md-4">Email 4</label>
                                                    <div class="col-md-12">
                                                         <input type="text" class="form-control form-control-danger" name="f_email_4" value="{{$data->f_email_4}}">
                                                         <input type="text" class="form-control form-control-danger" name="f_text_email_4" value="{{$data->f_text_email_4}}">
                                                        <small class="form-control-feedback">@if($errors->has('f_email_4')) {{ $errors->first('f_email_4') }} @endif</small> 
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group @if($errors->has('f_phone_1')) has-danger @endif col-md-3">
                                                    <label class="control-label text-right col-md-4">Phone 1</label>
                                                    <div class="col-md-12">
                                                         <input type="text" class="form-control form-control-danger" name="f_phone_1" value="{{$data->f_phone_1}}">
                                                        <small class="form-control-feedback">@if($errors->has('f_phone_1')) {{ $errors->first('f_phone_1') }} @endif</small> 
                                                    </div>
                                                </div>
                                                <div class="form-group @if($errors->has('f_phone_2')) has-danger @endif col-md-3">
                                                    <label class="control-label text-right col-md-4">Phone 2</label>
                                                    <div class="col-md-12">
                                                         <input type="text" class="form-control form-control-danger" name="f_phone_2" value="{{$data->f_phone_2}}">
                                                        <small class="form-control-feedback">@if($errors->has('f_phone_2')) {{ $errors->first('f_phone_2') }} @endif</small> 
                                                    </div>
                                                </div>
                                                <div class="form-group @if($errors->has('f_phone_3')) has-danger @endif col-md-3">
                                                    <label class="control-label text-right col-md-4">Phone 3</label>
                                                    <div class="col-md-12">
                                                         <input type="text" class="form-control form-control-danger" name="f_phone_3" value="{{$data->f_phone_3}}">
                                                        <small class="form-control-feedback">@if($errors->has('f_phone_3')) {{ $errors->first('f_phone_3') }} @endif</small> 
                                                    </div>
                                                </div>
                                                <div class="form-group @if($errors->has('f_phone_4')) has-danger @endif col-md-3">
                                                    <label class="control-label text-right col-md-4">Phone 4</label>
                                                    <div class="col-md-12">
                                                         <input type="text" class="form-control form-control-danger" name="f_phone_4" value="{{$data->f_phone_4}}">
                                                        <small class="form-control-feedback">@if($errors->has('f_phone_4')) {{ $errors->first('f_phone_4') }} @endif</small> 
                                                    </div>
                                                </div>
                                                <div class="form-group @if($errors->has('f_phone_5')) has-danger @endif col-md-3">
                                                    <label class="control-label text-right col-md-4">Phone 5</label>
                                                    <div class="col-md-12">
                                                         <input type="text" class="form-control form-control-danger" name="f_phone_5" value="{{$data->f_phone_5}}">
                                                        <small class="form-control-feedback">@if($errors->has('f_phone_5')) {{ $errors->first('f_phone_5') }} @endif</small> 
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="form-group @if($errors->has('f_address')) has-danger @endif col-md-12">
                                                    <label class="control-label  col-md-4">Address</label>
                                                    <div class="col-md-12">
                                                         <textarea class="form-control form-control-danger" name="f_address" id="f_address" value="{{$data->f_address}}">{{$data->f_address}}</textarea>
                                                        <small class="form-control-feedback">@if($errors->has('f_address')) {{ $errors->first('f_address') }} @endif</small> 
                                                    </div>
                                                </div>
                                                 <div class="form-group @if($errors->has('f_content')) has-danger @endif col-md-12">
                                                    <label class="control-label  col-md-4">Content</label>
                                                    <div class="col-md-12">
                                                         <textarea class="form-control form-control-danger" name="f_content"  id="f_content" value="{{$data->f_content}}">{{$data->f_content}}</textarea>
                                                        <small class="form-control-feedback">@if($errors->has('f_content')) {{ $errors->first('f_content') }} @endif</small> 
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
            if ($("#f_address").length > 0) {
                tinymce.init({
                    selector: "textarea#f_address",
                    theme: "modern",
                    height: 200,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

                });
            }
            if ($("#f_content").length > 0) {
                tinymce.init({
                    selector: "textarea#f_content",
                    theme: "modern",
                    height: 200,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

                });
            }
        });

    </script>
@endsection
