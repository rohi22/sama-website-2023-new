<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
   <link rel="icon" type="image/png" href="{{asset('admin/assets/images/favicon-32x32.png')}}" sizes="32x32">
    <title>Samaengineering Admin Panel</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{asset('admin/assets/node_modules/morrisjs/morris.css')}}" rel="stylesheet">
   
    <!--Toaster Popup message CSS -->
    <link href="{{asset('admin/assets/node_modules/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- datatable -->
    <link href="{{asset('admin/assets/node_modules/datatables/media/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('admin/dist/css/style.min.css')}}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{asset('admin/dist/css/pages/dashboard1.css')}}" rel="stylesheet">
    <!-- date picker -->
    <link href="{{asset('admin/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" />
    <!-- Multi select -->
    <link href="{{asset('admin/assets/node_modules/multiselect/css/multi-select.css')}}" rel="stylesheet"  />
    <link href="{{asset('admin/assets/node_modules/select2/dist/css/select2.min.css')}}" rel="stylesheet"  />
    <link href="{{asset('admin/assets/node_modules/multiselect/css/multi-select.css')}}" rel="stylesheet"  />
  
    <link rel="stylesheet" href="{{asset('admin/assets/node_modules/html5-editor/bootstrap-wysihtml5.css')}}" />
     <link rel="stylesheet"  href="{{asset('admin/assets/icons/font-awesome/css/fontawesome-all.css')}}">
    <link  href="{{asset('admin/assets/icons/weather-icons/css/weather-icons.min.css')}}" rel="stylesheet">
     <link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css" />

</head>

<body class="skin-default fixed-layout">
    
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
   <!-- <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label"><strong>Samaengineering</strong></p>
        </div>
    </div>-->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
         <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="{{asset('assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" /> -->
                            <!-- Light Logo icon -->
                            <img src="{{asset('admin/assets/images/logo-ligsht-icon.png')}}" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="{{asset('admin/assets/images/logo-ligsht-icon.png')}}" alt="homepage" class="dark-logo"style="width: 100px;height: auto;"/>
                         <!-- Light Logo text -->    
                         <img src="{{asset('admin/assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item">
                            <form class="app-search d-none d-md-block d-lg-block">
                                <input type="text" class="form-control" placeholder="Search & enter">
                            </form>
                        </li> -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell">
                            </i> <sup style="top: -16px;left: -10px;">
                            <span style="width:20px;height:20px;padding: 3px;"class="badge badge-pill badge-info"></span></sup>
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right animated bounceInDown" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title"></div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                        
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                         <li>
                            <a class="nav-link  waves-effect waves-light" href="{{url('/')}}" style="top:15px;cursor: pointer;" target="_blank"><strong>Website</strong></a>
                        </li>
                        <li>
                            <a class="nav-link  waves-effect waves-light" href="{{url('/blog')}}" style="top:15px;cursor: pointer;" target="_blank"><strong>Blog</strong></a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                      
                        <!-- ============================================================== -->
                        <!-- End mega menu -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li> -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User Profile-->
                <div class="user-profile">
                    <div class="user-pro-body">
                        <div><img src="{{asset('admin/assets/images/users/2.jpg')}}" alt="user-img" class="img-circle"></div>
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{session('login_name')}}<span class="caret"></span></a>
                            <div class="dropdown-menu animated flipInY">
                                <!-- text-->
                               <!--  <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a> -->
                                <a href="{{url('/logout')}}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                <!-- text-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="{{url('dashboard')}}" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a></li>
                        @if(session('role') == 'admin' || session('role') == 1)
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu">CMS</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('/about-us')}}" title="About Us">About Us</a></li>
                                <li><a href="{{url('/contact-us-page')}}">Contact Us</a></li>
                                <li><a href="{{url('/users')}}">Home Contact</a></li>
                            </ul>
                        </li>
                        @endif
                        @if(session('role') == 'admin' || session('role') == 1)
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-boxes"></i><span class="hide-menu">Admin Catalogue</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('/slider/new')}}">Add Slider</a></li>
                                <li><a href="{{url('/sliders')}}">Sliders</a></li>
                                <li><a href="{{url('/mobile_slider/new')}}">Add Mobile Slider</a></li>
                                <li><a href="{{url('/mobile_sliders')}}">Mobile Sliders</a></li>
                                <li><a href="{{url('/home-slider/new')}}">Home Slider</a></li>
                                <li><a href="{{url('/home-slider-list')}}">Home Slider List</a></li>
                                <li> <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">Settings</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{url('/setting/logo')}}">Settings</a></li>
                                        <li><a href="{{url('/setting/footer')}}">Footer Section</a></li>
                                        @if(session('role') == 'admin')<li><a href="{{url('/setting/change-password')}}">Change Password</a></li>@endif
                                        <li><a href="{{url('/subscribe-list')}}">Subscribers List</a></li>
                                        <li><a href="{{url('/attribute/new')}}">Add Attribute</a></li>
                                        <li><a href="{{url('/attributes')}}">Attributes List</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(session('role') == 'admin')
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-users"></i><span class="hide-menu">User Management</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('/admin/add-user')}}" title="Add User">Add User</a></li>
                                <li><a href="{{url('/admin/users')}}" title="Users">Users</a></li>
                            </ul>
                        </li>
                        @endif
                        
                        
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-users"></i><span class="hide-menu">Quote</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('/admin/all-quote')}}" title="Add User">All Quote</a></li>
                            </ul>
                        </li>
                        
                        
                        @if(session('role') == 'admin' || session('role') == 1)
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-format-list-bulleted"></i><span class="hide-menu">Product Catalogue</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('/category/new')}}">Add Category</a></li>
                                <li><a href="{{url('/categories')}}">Categories</a></li>
                                <li><a href="{{url('/sachet/new')}}">Add Sachet Image</a></li>
                                <li><a href="{{url('/sachets')}}">Sachets</a></li>
                                <li><a href="{{url('/commodity/new')}}">Add Commodity Image</a></li>
                                <li><a href="{{url('/commodities')}}">Commodities</a></li>
                                <li><a href="{{url('/product/new')}}">Add Product</a></li>
                                <li><a href="{{url('/products')}}">Products</a></li>
                                <li><a href="{{url('/spare_part_list')}}">Spare Parts</a></li>
                                <li><a href="{{url('/become_agent_list')}}">Become an agent</a></li>

                                <li><a href="{{url('/tag/tag-list')}}">Tags</a></li>
                            </ul>
                        </li>
                        @endif
                        @if(session('role') == 'admin' || session('role') == 2)
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-pencil-box-outline"></i><span class="hide-menu">Blogs</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('/blog/category/new')}}" title="Add Category">Add Category</a></li>
                                <li><a href="{{url('/blog/categories')}}" title="Category">Categories</a></li>
                                <li><a href="{{url('/blog/post/new')}}">Add Post</a></li>
                                <li><a href="{{url('/blog/posts')}}">Posts</a></li>
                                <li><a href="{{url('/blog/slider/new')}}">Add Slider</a></li>
                                <li><a href="{{url('/blog/sliders')}}">Sliders</a></li>
                                <li><a href="{{url('/blog/about-us')}}">About Us</a></li>
                                <li><a href="{{url('/blog/subscription')}}">Subscription</a></li>
                                <li><a href="{{url('/blog/comments')}}">Comments</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper" style="min-height:500px !important;">
            @yield('content')
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            Copyright © 2020 Samaengineering. All rights reserved.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('admin/assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{asset('admin/assets/node_modules/popper/popper.min.js')}}"></script>
    <script src="{{asset('admin/assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('admin/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('admin/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('admin/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('admin/dist/js/custom.min.js')}}"></script>
    <script src="{{asset('admin/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="{{asset('admin/assets/node_modules/raphael/raphael-min.js')}}"></script>
    <script src="{{asset('admin/assets/node_modules/morrisjs/morris.min.js')}}"></script>
    <script src="{{asset('admin/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- Popup message jquery -->
    <script src="{{asset('admin/assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>
    <!-- Chart JS -->
    <script src="{{asset('admin/dist/js/dashboard1.js')}}"></script>
    <script src="{{asset('admin/assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>
    <script src="{{asset('admin/assets/node_modules/datatables/datatables.min.js')}}"></script>
    <!-- multiselect -->
    <script src="{{asset('admin/assets/node_modules/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/node_modules/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('admin/assets/node_modules/multiselect/js/jquery.multi-select.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <!-- editor Js -->
    <script src="{{asset('admin/assets/node_modules/tinymce/tinymce.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>
    
    @yield('page-scripts')

<script>

    $(document).ready(function() {
        $("select").select2();

        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

            });
        }
    });
    $('.selectpicker').selectpicker();
    $(function() {
        $('#myTable').DataTable();
    });
</script>
</body>
</html>