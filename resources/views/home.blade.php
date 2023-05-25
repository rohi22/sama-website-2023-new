@extends('app.app')
@section('content')
 <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Dashboard</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                 @if(session('role') == 'admin' || session('role') == 1)
                <div class="row"><h3>Actions Performed</h3></div>
                <div class="card-group">
                    
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted">Sama Categories</p>
                                        </div>
                                        <div class="ml-auto">
                                            <p class="counter text-success"><a href="{{url('category/new')}}">Add Category</a></p>
                                            <p class="counter text-success"><a href="{{url('categories')}}">View Categories</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-cyan" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                               <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted">Products (Machines)</p>
                                        </div>
                                        <div class="ml-auto">
                                            <p class="counter text-success"><a href="{{url('product/new')}}">Add Product</a></p>
                                            <p class="counter text-success"><a href="{{url('products')}}">View Products</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-purple" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                               <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted">Attributes</p>
                                        </div>
                                        <div class="ml-auto">
                                            <p class="counter text-success"><a href="{{url('attribute/new')}}">Add Attribute</a></p>
                                            <p class="counter text-success"><a href="{{url('attributes')}}">View Attributes</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Column -->
                    <!-- Column -->
                </div>
                @endif
                @if(session('role') == 'admin' || session('role') == 2)
                <div class="card-group">
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                               <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted">Blog Categories</p>
                                        </div>
                                        <div class="ml-auto">
                                            <p class="counter text-success"><a href="{{url('blog/category/new')}}">Add Category</a></p>
                                            <p class="counter text-success"><a href="{{url('blog/categories')}}">View Categories</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="card">
                        <div class="card-body">
                            <div class="row">
                               <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted">Posts</p>
                                        </div>
                                        <div class="ml-auto">
                                            <p class="counter text-success"><a href="{{url('blog/post/new')}}">Add Post</a></p>
                                            <p class="counter text-success"><a href="{{url('blog/posts')}}">View Posts</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @if(session('role') == 'admin')
                     <div class="card">
                        <div class="card-body">
                            <div class="row">
                               <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted">Users</p>
                                        </div>
                                        <div class="ml-auto">
                                            <p class="counter text-success"><a href="{{url('admin/add-user')}}">Add User</a></p>
                                            <p class="counter text-success"><a href="{{url('admin/users')}}">View Users</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @endif
                <div class="row"><h3>Statistics</h3></div>
                 @if(session('role') == 'admin' || session('role') == 1)
                <div class="card-group">
                    
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted">Sama Categories</p>
                                        </div>
                                        <div class="ml-auto">
                                            <p class="counter text-success">@if($categories_total == null) 0 @else {{$categories_total}} @endif</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-cyan" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                               <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted">Products (Machines)</p>
                                        </div>
                                        <div class="ml-auto">
                                            <p class="counter text-success">@if($products_total == null) 0 @else {{$products_total}} @endif</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-purple" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                               <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted">Attributes</p>
                                        </div>
                                        <div class="ml-auto">
                                            <p class="counter text-success">@if($attributes_total == null) 0 @else {{$attributes_total}} @endif</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Column -->
                    <!-- Column -->
                </div>
                @endif
                @if(session('role') == 'admin' || session('role') == 2)
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                               <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted">Blog Categories</p>
                                        </div>
                                        <div class="ml-auto">
                                            <p class="counter text-success">@if($blog_categories_total == null) 0 @else {{$blog_categories_total}} @endif </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="card">
                        <div class="card-body">
                            <div class="row">
                               <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted">Posts</p>
                                        </div>
                                        <div class="ml-auto">
                                            <p class="counter text-success">@if($blog_posts_total == null) 0 @else {{$blog_posts_total}} @endif</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(session('role') == 'admin')
                     <div class="card">
                        <div class="card-body">
                            <div class="row">
                               <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted">Users</p>
                                        </div>
                                        <div class="ml-auto">
                                            <p class="counter text-success">@if($user_roles_total == null) 0 @else {{$user_roles_total}} @endif</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @endif
                <div class="row"><h3>Active & Dactive</h3></div>
                 
                <div class="card-group">
                    @if(session('role') == 'admin' || session('role') == 1)
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted">Sama Categories</p>
                                        </div>
                                        <div class="ml-auto">
                                            <p class="counter text-success">Active: @if($categories_active == null) 0 @else {{$categories_active}} @endif</p>
                                            <p class="counter text-success">Dactive: @if($categories_deactive == null) 0 @else {{$categories_deactive}} @endif</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-cyan" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                               <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted">Products (Machines)</p>
                                        </div>
                                        <div class="ml-auto">
                                            <p class="counter text-success">Active: @if($products_active == null) 0 @else {{$products_active}} @endif</p>
                                            <p class="counter text-success">Dactive: @if($products_deactive == null) 0 @else {{$products_deactive}} @endif</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-purple" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(session('role') == 'admin' || session('role') == 2)
                   <div class="card">
                        <div class="card-body">
                            <div class="row">
                               <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted">Blog Categories</p>
                                        </div>
                                        <div class="ml-auto">
                                            <p class="counter text-success">Active: @if($blog_categories_active == null) 0 @else {{$blog_categories_active}} @endif</p>
                                            <p class="counter text-success">Dactive: @if($blog_categories_deactive == null) 0 @else {{$blog_categories_deactive}} @endif</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     @endif
                    <!-- Column -->
                    <!-- Column -->
                </div>
                <div class="card-group">
                    @if(session('role') == 'admin' || session('role') == 2)
                     <div class="card">
                        <div class="card-body">
                            <div class="row">
                               <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted">Posts</p>
                                        </div>
                                        <div class="ml-auto">
                                            <p class="counter text-success">Active: @if($blog_posts_active == null) 0 @else {{$blog_posts_active}} @endif</p>
                                            <p class="counter text-success">Dactive: @if($blog_posts_deactive == null) 0 @else {{$blog_posts_deactive}} @endif</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(session('role') == 'admin')
                     <div class="card">
                        <div class="card-body">
                            <div class="row">
                               <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted">Users</p>
                                        </div>
                                        <div class="ml-auto">
                                            <p class="counter text-success">Active: @if($user_roles_active == null) 0 @else {{$user_roles_active}} @endif</p>
                                            <p class="counter text-success">Dactive: @if($user_roles_deactive == null) 0 @else {{$user_roles_deactive}} @endif</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <!-- ============================================================== -->
                <!-- End Info box -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Over Visitor, Our income , slaes different and  sales prediction -->
                <!-- ============================================================== -->
                
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme working">1</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                          
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
@endsection