@if(session()->has('login_user_id'))
   <script type="text/javascript">window.location = "<?php echo asset('/dashboard'); ?>"</script>
@endif
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
<link rel="icon" type="image/png" href="{{asset('admin/assets/images/favicon-32x32.png')}}" sizes="32x32">
    <title>Samaengineering | Login</title>
    <!-- page css -->
    <link href="{{asset('admin/dist/css/login-register-lock.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('admin/dist/css/style.min.css')}}" rel="stylesheet">
</head>
<body class="skin-default card-no-border" cz-shortcut-listen="true">
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" action="user.login" method="post"> {{csrf_field()}}

                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            <div class="uk-alert uk-alert-success" data-uk-alert="">
                                <a href="#" class="uk-alert-close uk-close"></a>
                                {{ session()->get('message') }}
                            </div>
                        </div>
                    @endif

                        @if(session()->has('invalid'))
                            <div class="alert alert-danger" style="text-align: center;">
                                <div class="uk-alert uk-alert-danger" data-uk-alert="">
                                    <a href="#" class="uk-alert-close uk-close"></a>
                                    {{ session()->get('invalid') }}
                                </div>
                            </div>
                        @endif

                    @if(count($errors) > 0)
                        @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    <div class="uk-alert uk-alert-success" data-uk-alert="">
                                        <a href="#" class="uk-alert-close uk-close"></a>
                                        {{ $error }}
                                    </div>
                                </div>
                        @endforeach
                    @endif
                        <h3 class="text-center m-b-20">Sign In</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" id="name" name="name" required placeholder="Username"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" id="password" name="password" required placeholder="Password"> </div>
                        </div>
                        
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="{{asset('admin/assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('admin/assets/node_modules/popper/popper.min.js')}}"></script>
    <script src="{{asset('admin/assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
</body>
</html>