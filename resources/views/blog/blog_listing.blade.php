@extends('blog/blog_master_layout')
@section('content')
<body class="archive category category-lifestyle category-12 sh-body-header-sticky sh-bookmarks-style_meta sh-title-style1 sh-section-tabs-style1 sh-carousel-style1 sh-carousel-position-title sh-post-categories-style1 sh-review-style1 sh-meta-order-bottom sh-instagram-widget-columns2 sh-categories-position-title sh-media-icon-style1 sh-wc-labels-off wpb-js-composer js-comp-ver-5.6 vc_responsive">


    <div id="page-container" class="">

        <div class="sh-titlebar">
            <div class="container">
                <div class="sh-table sh-titlebar-height-small">
                    <div class="titlebar-title sh-table-cell">

                        <h1>
							@if(isset($category)) Category: {{str_slug($category,' ')}} @endif
                            @if(isset($tag)) Filtered results: {{str_slug($tag,' ')}} @endif
                        </h1>

                    </div>
                    <div class="title-level sh-table-cell">

                        <div id="breadcrumbs" class="breadcrumb-trail breadcrumbs"><span class="item-home"><a class="bread-link bread-home" href="javascript:;" title="Home">Home</a></span><span class="separator"> &gt; </span><span class="item-current item-cat"><span class="bread-current bread-cat" title="53">@if(isset($category)){{$category}} @endif</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="wrapper" class="layout-default">

            <div class="content-container sh-page-layout-default">
                <div class="container entry-content">

                    <div id="content-wrapper" class="content-wrapper-with-sidebar">
                        <div id="content" class="content-with-sidebar-right">
                            <div class="sh-group blog-list blog-style-masonry">
                                @forelse($posts as $i)
                                <article id="post-53" class="post-item post-53 post type-post status-publish format-standard has-post-thumbnail hentry category-guide category-lifestyle tag-guide tag-life-hack tag-lifestyle tag-travel">
                                    <div class="post-container">

                                        <div class="post-thumbnail">
                                            <img width="585" height="390" src="{{asset('uploads/blog/post/'.$i->p_image)}}" class="attachment-gillion-masonry size-gillion-masonry wp-post-image" alt="" />
                                            <a href="{{asset('blog/'.$i->cat_slug.'/'.$i->p_slug)}}" class="post-overlay"></a>
                                        </div>

                                        <div class="post-content-container">
                                            <div class="post-categories-container">
                                                <div class="post-categories">{{$i->cat_title}}</div>
                                            </div>
                                            <a href="{{asset('blog/'.$i->cat_slug.'/'.$i->p_slug)}}" class="post-title">
                                                <h2>{{$i->p_title}}&nbsp;<span class="post-read-later post-read-later-guest" href="#login-register" data-type="add" data-id="53"><i class="fa fa-bookmark-o"></i></span>					</h2> </a>

                                            <div class="post-content">
                                                <?php 
                                                $string = strip_tags($i->p_desc);
                                                if (strlen($string) > 500) {
                                                    $url = asset('blog/'.$i->cat_slug.'/'.$i->p_slug);
                                                    // truncate string
                                                    $stringCut = substr($string, 0, 500);
                                                    $endPoint = strrpos($stringCut, ' ');
                                                
                                                    //if the string doesn't contain any space then it will cut without word basis.
                                                    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                    $string .= '... <a href="'.$url.'" style="color: #17b0ef;">Read More</a>';
                                                }
                                                echo $string;
                                               
                                               ?>
                                            </div>

                                            <div class="post-meta">

                                                <div class="post-meta-content">
                                                    <span class="post-auhor-date">
                                <span>
                                    <a href="javascript:;"><!-- Gillion --></a></span>,
                                        <a href="javascript:;" class="post-date">
                                                            {{$i->created_at}}                                            </a>
                                        </span>

                                       <!--  <a href="https://gillion.shufflehound.com/personal/2017/02/08/the-no-1-travel-mistake-youre-making-and-4-ways-to-fix-it/#comments" class="post-comments">
                                            <i class="icon icon-bubble"></i> 1 </a>
 -->
                                                                       
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </article>
                                @empty
                                <div class="alert alert-warning" style="margin-bottom:10px;">No any post found</div>
                                @endforelse
                            
                            </div>

                            <?php echo  $posts->links(); ?>
                           <!--  <div class="sh-pagination sh-default-color">
                                <ul class="page-numbers">
                                    <li><span aria-current="page" class="page-numbers current">1</span></li>
                                    <li><a class="page-numbers" href="#">2</a></li>
                                    <li><a class="page-numbers" href="#">3</a></li>
                                    <li><a class="next page-numbers" href="#">Next</a></li>
                                </ul>
                            </div> -->
                        

                        </div>
                        <div id="sidebar" class="sidebar-right">

                            <div class="sidebar-container">

                                <div id="categories-3" class="widget-item widget_categories">
                                    <div class="sh-widget-title-styling">
                                        <h3 class="widget-title">Categories</h3></div>
                                    <ul>
                                        @forelse($blog_categories as $i)
                                            <li class="cat-item cat-item-50"><a href="{{asset('blog/'.$i->cat_slug)}}" style="@if(isset($nav) && $nav == str_slug($i->cat_title))color:red !important; @endif">{{$i->cat_title}}</a></li>
                                        @empty
                                            <li class="cat-item cat-item-50">No any Category Found</li>
                                        @endforelse
                                    </ul>
                                </div>

                                <!--<div id="image-2" class="widget_sh_image widget-item widget_image">-->

                                <!--    <a href="">-->
                                <!--        <img src="https://cdn.gillion.shufflehound.com/wp-content/uploads/sites/5/2017/07/AD.jpg" class="" />-->
                                <!--    </a>-->

                                <!--</div>-->
                            <!--     <div id="subscribe-2" class="widget_sh_mailChimp widget_sh_mailChimp_style1 widget-item widget_subscribe">-->
                            <!--<div class="sh-widget-title-styling">-->
                            <!--    <h3 class="widget-title">Subscribe Now</h3></div>-->
                            
                            <!--<form  class="mc4wp-form mc4wp-form-804">-->
                            <!--    <div class="mc4wp-form-fields">-->
                            <!--        <p>-->
                            <!--            <input type="email" name="email" placeholder="Your email address" id="footerinput"/>-->
                                <!--        <div class="captcha">-->
                                <!--       <span>{!! captcha_img() !!}</span>-->
                                <!--       <button type="button" class="btn btn-success" id="sub"><i class="fa fa-refresh" id="spare_parts"></i></button>-->
                                      
                                <!--</div>-->
                                
                                <!--     <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">-->
                            <!--            <input data-toggle="modal" data-target="#subscribeus" id="footersubbtn" style="display: block;position: absolute;bottom: 0;right: 0;padding: 0px 32px;line-height: 44px;-->
                            <!--            margin: -48px!important;font-size: 11px;text-transform: uppercase;font-weight: bold;color: #fff;transition: 0.3s all ease-in-out;background-color: #d7b914;"-->
                            <!--             type="button" value="Sign up" onclick="subscribeEmail()" />-->
                            <!--        </p>-->
                            <!--    </div>-->
                            <!--</form>-->
                            <!--<div class="alert alert-danger" style="display:none"></div>-->
                            <!--<div id ="msg" style="color:red;"></div>-->
                            <!--<label id="footersublabel" style="font-size: 11px"></label>-->
                            <!-- / MailChimp for WordPress Plugin -->
                            <!--<p style="margin-top:10px;"class="widget-quote-description">* You will receive the latest news and updates on your favorite celebrities!</p>-->
                        </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="sh-back-to-top sh-back-to-top1">
        <i class="fa fa-angle-up"></i>
    </div>

    <div id="login-register" style="display: none;">
        <div class="sh-login-popup-tabs">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-target="#viens" data-toggle="tab">Login</a>
                </li>
                <li>
                    <a data-target="#divi" data-toggle="tab">Register</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="viens">

                <div class="sh-login-popup-content sh-login-popup-content-login">

                    <form name="loginform" id="loginform" action="https://gillion.shufflehound.com/personal/wp-login.php" method="post">

                        <p class="login-username">
                            <label for="user_login">Username or Email Address</label>
                            <input type="text" name="log" id="user_login" class="input" value="" size="20" />
                        </p>
                        <p class="login-password">
                            <label for="user_pass">Password</label>
                            <input type="password" name="pwd" id="user_pass" class="input" value="" size="20" />
                        </p>

                        <p class="login-remember">
                            <label>
                                <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember Me</label>
                        </p>
                        <p class="login-submit">
                            <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary" value="Log In" />
                            <input type="hidden" name="redirect_to" value="https://gillion.shufflehound.com/personal/category/lifestyle/" />
                        </p>

                    </form>
                </div>

            </div>
            <div class="tab-pane" id="divi">

                <div class="sh-login-popup-content">

                    <p id="reg_passmail">Registration is closed.</p>

                </div>

            </div>
        </div>
    </div>

    <script>
        (function() {
            function addEventListener(element, event, handler) {
                if (element.addEventListener) {
                    element.addEventListener(event, handler, false);
                } else if (element.attachEvent) {
                    element.attachEvent('on' + event, handler);
                }
            }

            function maybePrefixUrlField() {
                if (this.value.trim() !== '' && this.value.indexOf('http') !== 0) {
                    this.value = "http://" + this.value;
                }
            }

            var urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]');
            if (urlFields && urlFields.length > 0) {
                for (var j = 0; j < urlFields.length; j++) {
                    addEventListener(urlFields[j], 'blur', maybePrefixUrlField);
                }
            } /* test if browser supports date fields */
            var testInput = document.createElement('input');
            testInput.setAttribute('type', 'date');
            if (testInput.type !== 'date') {

                /* add placeholder & pattern to all date fields */
                var dateFields = document.querySelectorAll('.mc4wp-form input[type="date"]');
                for (var i = 0; i < dateFields.length; i++) {
                    if (!dateFields[i].placeholder) {
                        dateFields[i].placeholder = 'YYYY-MM-DD';
                    }
                    if (!dateFields[i].pattern) {
                        dateFields[i].pattern = '[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])';
                    }
                }
            }

        })();
    </script>
    <script type='text/javascript' src='https://gillion.shufflehound.com/personal/wp-includes/js/jquery/ui/effect.min.js?ver=1.11.4'></script>
    <script type='text/javascript' src='https://gillion.shufflehound.com/personal/wp-content/themes/gillion/js/plugins/bootstrap.min.js?ver=3.3.4'></script>
    <script type='text/javascript' src='https://gillion.shufflehound.com/personal/wp-includes/js/wp-embed.min.js?ver=5.0.3'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var mc4wp_forms_config = [];
        /* ]]> */
    </script>
    <script type='text/javascript' src='https://gillion.shufflehound.com/personal/wp-content/plugins/mailchimp-for-wp/assets/js/forms-api.min.js?ver=4.3.3'></script>
    <!--[if lte IE 9]>
<script type='text/javascript' src='https://gillion.shufflehound.com/personal/wp-content/plugins/mailchimp-for-wp/assets/js/third-party/placeholders.min.js?ver=4.3.3'></script>
<![endif]-->

    <style>
        .sh-side-demos {
            width: 430px;
            position: fixed;
            z-index: 5000;
            top: 0;
            right: 0px;
            bottom: 0;
            transform: translateX(430px);
        }
        
        .sh-side-demos.open {
            box-shadow: 0 0px 39px 10px rgba(0, 0, 0, 0.2);
        }
        
        .sh-side-demos-container {
            top: 0;
            left: 0;
            right: -17px;
            position: absolute;
            bottom: 0;
            overflow-y: scroll;
            background-color: #fff;
            background-repeat: no-repeat;
            background-position: right top;
        }
        
        body.admin-bar .sh-side-demos-container {
            top: 32px;
        }
        
        .sh-side-demos.open {
            transform: translateX(0px);
        }
        
        @media (max-width: 1400px) {
            .sh-side-demos {
                width: 280px;
                transform: translateX(280px);
            }
            .sh-side-demos .sh-side-demos-intro {
                max-width: none!important;
                padding: 0 25px;
                margin-bottom: 35px;
                margin-top: 35px;
            }
            .sh-side-demos .sh-side-demos-intro h2.welcome-title {
                font-size: 21px;
            }
            .sh-side-demos .sh-side-demos-intro p {
                font-size: 13px;
                margin-bottom: 20px;
            }
            .sh-side-demos .sh-side-demos-purhase {
                line-height: 44px;
                padding: 0 32px;
                font-size: 11px;
            }
            .sh-side-demos .sh-side-demos-container-close {
                top: 12px;
                right: 12px;
            }
            .sh-side-demos .sh-side-demos-loop {
                padding: 0 18px;
            }
            .sh-side-demos .sh-side-demos-item {
                padding: 0 5px;
                margin-bottom: 15px;
            }
            .sh-side-demos .sh-side-demos-item-thumbnail {
                width: 123px;
                height: 96px;
                background-size: 123px;
            }
            .sh-side-demos .sh-side-demos-item-name {
                font-size: 11px;
            }
        }
        
        @media (max-width: 600px) {
            .sh-side-demos {
                display: none!important;
            }
        }
        
        body.admin-bar .sh-side-demos {
            padding-top: 32px;
        }
        
        .sh-side-demos-intro {
            max-width: 310px;
            display: table;
            margin: 0 auto;
            margin-top: 50px;
            margin-bottom: 45px;
            text-align: center;
        }
        
        .sh-side-demos-intro h2.welcome-title {
            color: #2f2f2f;
            margin-bottom: 19px;
            font-weight: 900;
            font-size: 24px;
            line-height: 100%!important;
        }
        
        .sh-side-demos-intro h2.welcome-title strong {
            font-weight: 900;
        }
        
        .sh-side-demos-intro p {
            color: #5b5b5b;
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 25px;
        }
        
        .sh-side-demos-purhase {
            display: table;
            padding: 0 42px;
            background-color: #44cd81;
            color: #fff!important;
            text-align: center;
            font-weight: bold;
            font-size: 12px;
            transition: 0.3s all ease-in-out;
            margin-top: 27px;
            border-radius: 100px;
            line-height: 54px;
            margin: 0 auto;
            text-transform: uppercase;
        }
        
        .sh-side-demos-purhase:hover {
            background-color: #3db874;
            color: #fff;
        }
        
        .sh-side-demos-loop {
            padding: 0px 23px 0px 23px;
        }
        
        .sh-side-demos-loop-container {
            position: relative;
            margin: 0 -10px;
        }
        
        .sh-side-demos-item {
            text-align: center;
            margin-bottom: 23px;
            width: 50%;
            display: inline-block;
            margin-right: -4px;
            padding: 0 10px;
        }
        
        .sh-side-demos-item > a > span {
            display: block;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 11px;
            color: #505050;
            margin-top: 15px;
        }
        
        .sh-side-demos-item-name {
            font-weight: bold;
            margin-top: 5px;
            font-size: 12px;
            color: #2f2f2f;
        }
        
        .sh-side-demos-item-thumbnail {
            position: relative;
            overflow: hidden;
            width: 180px;
            height: 140px;
            margin: 0 auto;
            box-shadow: 0px 5px 20px rgba( 0, 0, 0, 0.06);
            transition: 0.3s all ease-in-out;
            border-radius: 4px;
            background-image: url("https://cdn.gillion.shufflehound.com/wp-content/plugins/shufflehound-showcase-framework/sidemenu/demos2.png");
            background-repeat: no-repeat;
            border: 1px solid #efefef;
        }
        
        .sh-side-demos-item-thumbnail:hover,
        .sh-side-demos-item-thumbnail:focus {
            box-shadow: 0px 5px 20px rgba( 0, 0, 0, 0.14);
        }
        
        .sh-side-demos-item-thumbnail .post-overlay {
            border-radius: 4px!important;
        }
        
        .sh-side-demos-buttons {
            position: absolute;
            top: 229px;
            left: -70px;
            width: 70px;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            box-shadow: 0 0px 25px 8px rgba(0, 0, 0, .07);
        }
        
        .sh-side-demos-pages .sh-side-demos-buttons {
            top: 160px;
        }
        
        .sh-side-options-item:first-child {
            border-top-left-radius: 5px;
        }
        
        .sh-side-options-item:last-child {
            border-bottom-left-radius: 5px;
        }
        
        .sh-side-options-item {
            display: block;
            text-align: center;
            margin: 0px;
            padding: 17px 0;
            transition: 0.3s all ease-in-out;
            position: relative;
            background-color: #fff;
            cursor: pointer;
            border-right: 1px solid #f1f1f1;
        }
        
        .sh-side-options-item:not(:last-child) {
            border-bottom: 1px solid #f1f1f1;
        }
        
        .sh-side-options-item i {
            font-size: 24px;
        }
        
        .sh-side-options-item img {
            height: 33px;
            transition: 0.3s all ease-in-out;
        }
        
        .sh-side-options-item img.sh-side-demos-colorful {
            position: absolute;
            left: 18px;
            top: 17px;
            opacity: 0;
        }
        
        .sh-side-options-item:hover img.sh-side-demos-standard,
        .sh-side-options-item:focus img.sh-side-demos-standard,
        .sh-side-demos.open .sh-side-demos-button1 img.sh-side-demos-standard {
            opacity: 0;
        }
        
        .sh-side-options-item:hover img.sh-side-demos-colorful,
        .sh-side-options-item:focus img.sh-side-demos-colorful,
        .sh-side-demos.open .sh-side-demos-button1 img.sh-side-demos-colorful {
            opacity: 1;
        }
        
        .sh-side-options-item:not(:hover):not(:focus) {
            color: #B9B9B9!important;
        }
        
        .sh-side-options-item:hover .sh-side-options-hover {
            opacity: 1;
            transform: translateX(-100%);
        }
        
        .sh-side-options-hover {
            position: absolute;
            background-color: #232323;
            color: #fff;
            padding: 20px 26px;
            transform: translateX(0%);
            left: 0px;
            top: 0;
            bottom: 0;
            opacity: 0;
            transition: 0.2s all ease-in-out;
            z-index: -100;
            font-size: 13px;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }
        
        .sh-side-options-hover span {
            padding: 0px 3px;
        }
        
        .sh-side-demos-container-close {
            position: absolute;
            top: 22px;
            right: 22px;
            cursor: pointer;
        }
        
        .sh-side-demos-container-close i {
            color: #c5c5c5;
            font-size: 18px;
            transition: 0.3s all ease;
        }
        
        .sh-side-demos-container-close:hover i,
        .sh-side-demos-container-close:focus i {
            color: #7f7f7f;
        }
        
        img.sh-side-demos-standard {}
        
        .sh-side-demo-news {
            background-position: 0px -2240px;
        }
        
        .sh-side-demo-magazine {
            background-position: 0px -2100px;
        }
        
        .sh-side-demo-gizmo-news {
            background-position: 0px -1820px;
        }
        
        .sh-side-demo-clean {
            background-position: 0px -1960px;
        }
        
        .sh-side-demo-tech {
            background-position: 0px -1680px;
        }
        
        .sh-side-demo-foodie {
            background-position: 0px -1540px;
        }
        
        .sh-side-demo-lifestyle {
            background-position: 0px -1400px;
        }
        
        .sh-side-demo-personal {
            background-position: 0px -1260px;
        }
        
        .sh-side-demo-shop {
            background-position: 0px -980px;
        }
        
        .sh-side-demo-fashion {
            background-position: 0px -1120px;
        }
        
        .sh-side-demo-travel {
            background-position: 0px -1260px;
        }
        
        .sh-side-demo-creative {
            background-position: 0px -420px;
        }
        
        .sh-side-demo-full-width {
            background-position: 0px -140px;
        }
        
        .sh-side-demo-background {
            background-position: 0px -280px;
        }
        
        .sh-side-demo-boxed {
            background-position: 0px -560px;
        }
        
        .sh-side-demo-carousel {
            background-position: 0px -700px;
        }
        
        @media (max-width: 1400px) {
            .sh-side-demo-news {
                background-position: 0px -1536px;
            }
            .sh-side-demo-magazine {
                background-position: 0px -1440px;
            }
            .sh-side-demo-gizmo-news {
                background-position: 0px -1248px;
            }
            .sh-side-demo-clean {
                background-position: 0px -1344px;
            }
            .sh-side-demo-tech {
                background-position: 0px -1152px;
            }
            .sh-side-demo-foodie {
                background-position: 0px -1056px;
            }
            .sh-side-demo-lifestyle {
                background-position: 0px -960px;
            }
            .sh-side-demo-personal {
                background-position: 0px -864px;
            }
            .sh-side-demo-shop {
                background-position: 0px -672px;
            }
            .sh-side-demo-fashion {
                background-position: 0px -768px;
            }
            .sh-side-demo-travel {
                background-position: 0px -864px;
            }
            .sh-side-demo-creative {
                background-position: 0px -288px;
            }
            .sh-side-demo-full-width {
                background-position: 0px -96px;
            }
            .sh-side-demo-background {
                background-position: 0px -192px;
            }
            .sh-side-demo-boxed {
                background-position: 0px -384px;
            }
            .sh-side-demo-carousel {
                background-position: 0px -480px;
            }
        }
    </style>

    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
      <!-- Modal -->
  <div class="modal fade" id="subscribeus" style="margin-top:100px;" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Are you a human?</h4>
        </div>
        <div class="modal-body">
                                               <div class="captcha">
                                       <span>{!! captcha_img() !!}</span>
                                       <button type="button" class="btn btn-success" id="sub"><i class="fa fa-refresh" id="spare_parts"></i></button>
                                      
                                </div>
                                
                                     <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</body>

</html>
<script>
function subscribeEmail()
{
    var email = $('#footerinput').val();
    var cap = $("#captcha").val();
    $.ajax({
              url: "{{url('/blog/subscribe-email')}}",
              type: 'POST',
              data: {captcha:cap,email:email,_token:'{{ csrf_token() }}'},
              success: function(res)
               {
                $('.alert-danger').css('display','none');
                $("#footerinput").val(' ');
                $("#captcha").val(' ');
                $("#footersublabel").html('You will receive the latest news and updates');
               },
               error: function(res)
               {
                   var data = res.responseJSON;
                    $.each(data.errors,function(k,v){
              			$('.alert-danger').css('display','block')
              		    $('.alert-danger').append('<p>'+v+'</p>');
              		});
                
               }
            });
        }
        
$('#spare_parts').click(function(){
  $.ajax({
     type:'GET',
     url:"{{url('/refreshcaptcha')}}",
     data: {_token:'{{ csrf_token() }}'},
     success:function(data){
        console.log(data);
        $(".captcha span").html(data.captcha);
     }
  });
});
   

</script>
@endsection