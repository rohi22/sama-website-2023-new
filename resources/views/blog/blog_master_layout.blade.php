
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name=robots content="index, follow">
    <meta name="description" content="Sama Engineering has an exciting collection of new blogs written on the variety of machines related to packaging, food processing line, and pharmaceutical line ."/>
    <link rel="canonical" href="{{URL::current()}}" />

    
    <title>@yield('title') | Sama Engineering Blog</title>
    
    
    @yield('main')
    
    @yield('og_page_wise')
    
    @yield('og_product_wise')
    
    @yield('twitter')
    
    
    <script type="text/javascript">
        window._wpemojiSettings = {
            "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/11\/72x72\/",
            "ext": ".png",
            "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/11\/svg\/",
            "svgExt": ".svg",
            "source": {
                "concatemoji": "https:\/\/gillion.shufflehound.com\/personal\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.0.3"
            }
        };
        ! function(a, b, c) {
            function d(a, b) {
                var c = String.fromCharCode;
                l.clearRect(0, 0, k.width, k.height), l.fillText(c.apply(this, a), 0, 0);
                var d = k.toDataURL();
                l.clearRect(0, 0, k.width, k.height), l.fillText(c.apply(this, b), 0, 0);
                var e = k.toDataURL();
                return d === e
            }

            function e(a) {
                var b;
                if (!l || !l.fillText) return !1;
                switch (l.textBaseline = "top", l.font = "600 32px Arial", a) {
                    case "flag":
                        return !(b = d([55356, 56826, 55356, 56819], [55356, 56826, 8203, 55356, 56819])) && (b = d([55356, 57332, 56128, 56423, 56128, 56418, 56128, 56421, 56128, 56430, 56128, 56423, 56128, 56447], [55356, 57332, 8203, 56128, 56423, 8203, 56128, 56418, 8203, 56128, 56421, 8203, 56128, 56430, 8203, 56128, 56423, 8203, 56128, 56447]), !b);
                    case "emoji":
                        return b = d([55358, 56760, 9792, 65039], [55358, 56760, 8203, 9792, 65039]), !b
                }
                return !1
            }

            function f(a) {
                var c = b.createElement("script");
                c.src = a, c.defer = c.type = "text/javascript", b.getElementsByTagName("head")[0].appendChild(c)
            }
            var g, h, i, j, k = b.createElement("canvas"),
                l = k.getContext && k.getContext("2d");
            for (j = Array("flag", "emoji"), c.supports = {
                    everything: !0,
                    everythingExceptFlag: !0
                }, i = 0; i < j.length; i++) c.supports[j[i]] = e(j[i]), c.supports.everything = c.supports.everything && c.supports[j[i]], "flag" !== j[i] && (c.supports.everythingExceptFlag = c.supports.everythingExceptFlag && c.supports[j[i]]);
            c.supports.everythingExceptFlag = c.supports.everythingExceptFlag && !c.supports.flag, c.DOMReady = !1, c.readyCallback = function() {
                c.DOMReady = !0
            }, c.supports.everything || (h = function() {
                c.readyCallback()
            }, b.addEventListener ? (b.addEventListener("DOMContentLoaded", h, !1), a.addEventListener("load", h, !1)) : (a.attachEvent("onload", h), b.attachEvent("onreadystatechange", function() {
                "complete" === b.readyState && c.readyCallback()
            })), g = c.source || {}, g.concatemoji ? f(g.concatemoji) : g.wpemoji && g.twemoji && (f(g.twemoji), f(g.wpemoji)))
        }(window, document, window._wpemojiSettings);
    </script>
    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
        .jssocials-shares
        {
            display:none;
        }
        .tag-custom-link:hover{
            background-color:#cf1d25 !important;
            color:white !important;
        }
        @media screen and (max-width: 600px) {
          #hidemobilelogo {
            display:none !important;
          }
        }
        
    </style>
    <link rel='stylesheet' id='wp-block-library-css' href='/wp-includes/css/dist/block-library/style.min.css?ver=5.0.3' type='text/css' media='all' />
    <!-- <link rel='stylesheet' id='font-awesome-css' href='https://gillion.shufflehound.com/personal/wp-content/plugins/js_composer/assets/lib/bower/font-awesome/css/font-awesome.min.css?ver=5.6' type='text/css' media='all' /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel='stylesheet' id='bootstrap-css' href="{{asset('/wp-content/themes/gillion/css/plugins/bootstrap.min.css?ver=3.3.4')}}" type='text/css' media='all' />

    <link rel='stylesheet' id='gillion-plugins-css' href="{{asset('/wp-content/themes/gillion/css/plugins.css?ver=5.0.3')}}" type='text/css' media='all' />

    <link rel='stylesheet' id='gillion-styles-css' href="{{asset('/wp-content/themes/gillion/style.css?ver=5.0.3')}}" type='text/css' media='all' />
    <link rel='stylesheet' id='gillion-styles-css' href="{{asset('/wp-content/themes/gillion/gilliondynamic.css')}}" type='text/css' media='all' />

    <link rel='stylesheet' id='gillion-responsive-css' href="{{asset('/wp-content/themes/gillion/css/responsive.css?ver=5.0.3')}}" type='text/css' media='all' />
    
    <link rel="icon" type="image/png" href="{{asset('/uploads/logos/5c6bd495380e1favicon-32x32.png')}}">
    <style id='gillion-responsive-inline-css' type='text/css'>
        .sh-header:not(.sh-sticky-header-active),
        .sh-header:not(.sh-sticky-header-active) > .sh-header-standard {
            border-width: 0px!important;
            border-bottom-width: 0px!important;
        }
    </style>
    <!--<link rel='stylesheet' id='gillion-theme-settings-css' href='https://cdn.gillion.shufflehound.com/wp-content/uploads/sites/5/gillion-dynamic-styles.css?ver=256708585' type='text/css' media='all' />-->

    <link rel='stylesheet' id='gillion-fonts-css' href='https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,regular,italic,600,600italic,700,700italic,800,800italic%7CMontserrat:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&#038;subset=latin' type='text/css' media='all' />

    <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js?ver=5.0.3'></script>
    <script type='text/javascript' src="{{asset('/wp-content/themes/gillion/js/plugins.js?ver=5.0.3')}}"></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var gillion_loadmore_posts = {
            "ajax_url": "https:\/\/gillion.shufflehound.com\/personal\/wp-admin\/admin-ajax.php"
        };
        var gillion = {
            "siteurl": "https:\/\/gillion.shufflehound.com\/personal\/",
            "loggedin": "",
            "page_loader": "0",
            "notice": "",
            "header_animation_dropdown_delay": "1000",
            "header_animation_dropdown": "easeOutQuint",
            "header_animation_dropdown_speed": "300",
            "lightbox_opacity": "0.88",
            "lightbox_transition": "elastic",
            "page_numbers_prev": "Previous",
            "page_numbers_next": "Next",
            "rtl_support": "",
            "footer_parallax": "",
            "social_share": "{\"twitter\":true,\"facebook\":true,\"googleplus\":true,\"pinterest\":true,\"messenger\":true}",
            "text_show_all": "Show All"
        };
        /* ]]> */
    </script>
    <script type='text/javascript' src="{{asset('/wp-content/themes/gillion/js/scripts.js?ver=5.0.3')}}"></script>
    <!-- <link rel='https://api.w.org/' href='https://gillion.shufflehound.com/personal/wp-json/' />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://gillion.shufflehound.com/personal/xmlrpc.php?rsd" />
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://gillion.shufflehound.com/personal/wp-includes/wlwmanifest.xml" />
    <meta name="generator" content="WordPress 5.0.3" />
    <link rel="canonical" href="https://gillion.shufflehound.com/personal/" />
    <link rel='shortlink' href='https://gillion.shufflehound.com/personal/' />
    <link rel="alternate" type="application/json+oembed" href="https://gillion.shufflehound.com/personal/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fgillion.shufflehound.com%2Fpersonal%2F" />
    <link rel="alternate" type="text/xml+oembed" href="https://gillion.shufflehound.com/personal/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fgillion.shufflehound.com%2Fpersonal%2F&#038;format=xml" /> -->
    <script>
        window.jQuery || document.write('<script src="/wp-includes/js/jquery/jquery.js"><\/script>')
    </script>
    <!-- <link rel="icon" type="image/png" href="/fav.png" /> -->
    <!-- <meta name="generator" content="Powered by WPBakery Page Builder - drag and drop page builder for WordPress." /> -->
    <!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="https://gillion.shufflehound.com/personal/wp-content/plugins/js_composer/assets/css/vc_lte_ie9.min.css" media="screen"><![endif]-->
    <style type="text/css" data-type="vc_shortcodes-custom-css">
        .vc_custom_1499884320305 {
            margin-bottom: 70px !important;
        }
        
        .vc_custom_1499884293971 {
            margin-bottom: 40px !important;
        }
    </style>
    <noscript>
        <style type="text/css">
            .wpb_animate_when_almost_visible {
                opacity: 1;
            }
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
    </noscript>
</head>

<body class="/home page-template page-template-page-blog page-template-page-blog-php page page-id-674 sh-body-header-sticky sh-bookmarks-style_meta sh-title-style1 sh-section-tabs-style1 sh-carousel-style1 sh-carousel-position-title sh-post-categories-style1 sh-review-style1 sh-meta-order-bottom sh-instagram-widget-columns2 sh-categories-position-title sh-media-icon-style1 sh-wc-labels-off wpb-js-composer js-comp-ver-5.6 vc_responsive">

    <div class="sh-header-side">
        <div id="search-4" class="widget-item widget_search">
            <div class="sh-widget-title-styling">
                <h3 class="widget-title">Search</h3></div>
            <!--<form method="get" class="search-form" action="https://gillion.shufflehound.com/personal/">
                <div>
                    <label>
                        <input type="search" class="sh-sidebar-search search-field" placeholder="Search here..." value="" name="s" title="Search text" required />
                    </label>
                    <button type="submit" class="search-submit">
                        <i class="icon-magnifier"></i>
                    </button>
                </div>
            </form>-->
        </div>
        <div id="categories-2" class="widget-item widget_categories">
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
    </div>
    <div class="sh-header-side-overlay"></div>

    <div id="page-container" class="">

        <header class="primary-mobile">
            <div id="header-mobile" class="sh-header-mobile">
                <div class="sh-header-mobile-navigation">
                    <div class="container">
                        <div class="sh-table">
                            <div class="sh-table-cell">

                                <nav id="header-navigation-mobile" class="header-standard-position">
                                    <div class="sh-nav-container">
                                        <ul class="sh-nav">
                                            <li>
                                                <div class="sh-hamburger-menu sh-nav-dropdown">
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>

                            </div>
                            <div class="sh-table-cell sh-header-logo-container">

                                <div class="header-logo">
                                    <a href="javascript:;" class="header-logo-container sh-table-small">
                                        <div class="sh-table-cell">

                                            <img class="sh-standard-logo" src="{{asset('/wp-content/uploads/sites/5/2017/07/personal_logo.png')}}" alt="Gillion Personal Demo" style="height:100px;width: 200px;"/>
                                            <img class="sh-sticky-logo" src="{{asset('/wp-content/uploads/sites/5/2017/07/personal_logo.png')}}" alt="Gillion Personal Demo" style="height:100px;width: 200px;"/>
                                            <img class="sh-light-logo" src="{{asset('/wp-content/uploads/sites/5/2017/07/personal_logo.png')}}" alt="Gillion Personal Demo" style="height:100px;width: 200px;"/>

                                        </div>
                                    </a>
                                </div>

                            </div>
                           <!--  <div class="sh-table-cell">

                                <nav class="header-standard-position">
                                    <div class="sh-nav-container">
                                        <ul class="sh-nav">

                                            <li class="menu-item menu-item-has-children sh-nav-readmore sh-nav-special">
                                                <a href="#">
                                                    <div> <i class="ti-bookmark"></i> <span class="sh-read-later-total">0</span> </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>

                            </div> -->
                        </div>
                    </div>
                </div>
                <nav class="sh-header-mobile-dropdown">
                    <div class="container sh-nav-container">
                        <ul class="sh-nav-mobile">
                            
                        </ul>
                    </div>

                    <div class="container sh-nav-container">
                        <div class="header-mobile-social-media">
                            <a href="https://www.facebook.com/sama.engineering" target="_blank" class="social-media-facebook">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="https://twitter.com/SAMAENGINEERING" target="_blank" class="social-media-twitter">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="https://plus.google.com/111408671298421773147" target="_blank" class="social-media-gplus">
                                <i class="fa fa-google-plus"></i>
                            </a>
                            <!--<a href="javascript:;" target="_blank" class="social-media-instagram">
                                <i class="fa fa-instagram"></i>
                            </a>
                            <a href="javascript:;" target="_blank" class="social-media-pinterest">
                                <i class="fa fa-pinterest"></i>
                            </a>-->
                            <div class="sh-clear"></div>
                        </div>
                    </div>

<!--                    <div class="header-mobile-search">
                        <div class="container sh-nav-container">
                            <form role="search" method="get" class="header-mobile-form" action="https://gillion.shufflehound.com/personal/">
                                <input class="header-mobile-form-input" type="text" placeholder="Search here.." value="" name="s" required />
                                <button type="submit" class="header-mobile-form-submit">
                                    <i class="icon-magnifier"></i>
                                </button>
                            </form>
                        </div>
                    </div>-->
                </nav>
            </div>
        </header>
        <header class="primary-desktop">

            <div class="sh-header-height sh-header-4">
                <div class="sh-header-middle" style="display:none;">
                    <div class="container sh-header-additional">
                        <div class="sh-table">
                            <div class="sh-table-cell sh-header-meta1-container">
                                <nav class="header-standard-position">
                                    <div class="sh-nav-container">
                                        <ul class="sh-nav">

                                            <!-- <li class="menu-item sh-nav-search sh-nav-special">
                                                <a href="#"><i class="icon icon-magnifier"></i></a>
                                            </li> -->
                                            <!-- <li class="menu-item menu-item-has-children sh-nav-share sh-nav-special">
                                                <a href="#">
                                                    <div>
                                                        <i class="icon icon-share"></i>
                                                    </div>
                                                </a>
                                                <ul class="sub-menu sh-nav-share-ul">
                                                    <li class="sh-share-item sh-share-item-facebook menu-item">
                                                        <a href="javascript:;" target="_blank">
                                                            <i class="fa fa-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li class="sh-share-item sh-share-item-twitter menu-item">
                                                        <a href="javascript:;" target="_blank">
                                                            <i class="fa fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li class="sh-share-item sh-share-item-googleplus menu-item">
                                                        <a href="javascript:;" target="_blank">
                                                            <i class="fa fa-google-plus"></i>
                                                        </a>
                                                    </li>
                                                    <li class="sh-share-item sh-share-item-instagram menu-item">
                                                        <a href="javascript:;" target="_blank">
                                                            <i class="fa fa-instagram"></i>
                                                        </a>
                                                    </li>
                                                    <li class="sh-share-item sh-share-item-pinterest menu-item">
                                                        <a href="javascript:;" target="_blank">
                                                            <i class="fa fa-pinterest"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li> -->
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="sh-table-cell sh-header-logo-container">

                                <!--<nav class="header-standard-position">-->
                                <!--    <div class="sh-nav-container">-->
                                <!--        <ul class="sh-nav sh-nav-left">-->
                                <!--            <li>-->
                                                <!--<div class="header-logo">-->
                                                <!--    <a href="{{url('/blog')}}" class="header-logo-container sh-table-small">-->
                                                <!--        <div class="sh-table-cell">-->

                                                <!--            <img class="sh-standard-logo" src="{{asset('/wp-content/uploads/sites/5/2017/07/personal_logo.png')}}" alt="Gillion Personal Demo" style="height:100px;width: 200px;"/>-->
                                                <!--            <img class="sh-sticky-logo" src="{{asset('/wp-content/uploads/sites/5/2017/07/personal_logo.png')}}" alt="Gillion Personal Demo" style="height:100px;width: 200px;"/>-->
                                                <!--            <img class="sh-light-logo" src="{{asset('/wp-content/uploads/sites/5/2017/07/personal_logo.png')}}" alt="Gillion Personal Demo" style="height:100px;width: 200px;" />-->

                                                <!--        </div>-->
                                                <!--    </a>-->
                                                <!--</div>-->

                                <!--            </li>-->
                                <!--        </ul>-->
                                <!--    </div>-->
                                <!--</nav>-->

                            </div>
                            <div class="sh-table-cell sh-header-meta2-container">
                                <nav class="header-standard-position">
                                    <div class="sh-nav-container">
                                        <ul class="sh-nav">
<!-- 
                                            <li class="menu-item menu-item-has-children sh-nav-readmore sh-nav-special">
                                                <a href="#">
                                                    <div> <i class="ti-bookmark"></i> <span class="sh-read-later-total">login</span> </div>
                                                </a>
                                                <ul class="sub-menu sh-read-later-list sh-read-later-list-init">
                                                    <li class="sh-read-later-item menu-item text-center"> <a href="/"> Login to add posts</a> </li>
                                                </ul>
                                            </li> -->
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sh-header sh-header-4 sh-sticky-header sh-header-disabled-border" style="padding-top:5px;padding-bottom:5px;background-color:#cf1d25;">
                    <div class="container sh-header-standard">

                        <nav id="header-navigation" class="header-standard-position">
                            <div class="sh-nav-container">
                                <a href="/blog"><img class="pull-left" src="{{asset('/wp-content/uploads/sites/5/2017/07/back-btn.png')}}" alt="Gillion Personal Demo" style="margin-top:25px;background-color:#cf1d25;height:20px;width: 20px;"/></a>
                                <ul id="menu-header" class="sh-nav">
                                    <a href="/blog"><img class="pull-left " id="hidemobilelogo"   src="{{asset('/wp-content/uploads/sites/5/2017/07/personal_logo.png')}}" alt="Gillion Personal Demo" style="height:80px;width: 200px;"/></a>    
                                    <!--<li id="menu-item-517" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-517"><a href="http://mrcpotencia.com/samanew/">Back to Website</a>-->
                                    <!--<li id="menu-item-515" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-515"><a style="@if(isset($nav)) @else color:red; @endif" href="{{url('/blog')}}"><span style="font-size: 22px" class="fa fa-home"></span></a>-->
                                        <!-- <ul class="sub-menu">
                                            <li id="menu-item-1000" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1000"><a href="/hello/">Gillion Showcase</a></li>
                                        </ul> -->
                                    <!--</li>-->
                                    @forelse($blog_menu_categories as $i)
                                        <li id="menu-item-517" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-517"><a href="{{asset('blog/'.$i->cat_slug)}}" style="@if(isset($nav) && $nav == str_slug($i->cat_title)) @endif">{{$i->cat_title}}</a>
                                        </li>
                                    @empty
                                    @endforelse
                            
                                </ul>
                            </div>
                        </nav>

                    </div>
                    <div class="sh-header-search-side">
                        <div class="sh-header-search-side-container">

                            <form method="get" class="sh-header-search-form" action="https://gillion.shufflehound.com/personal/">
                                <input type="text" value="" name="s" class="sh-header-search-side-input" placeholder="Enter a keyword to search..." />
                                <div class="sh-header-search-side-close">
                                    <i class="ti-close"></i>
                                </div>
                                <div class="sh-header-search-side-icon">
                                    <i class="ti-search"></i>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')
    </div>

    <footer class="sh-footer">
        <div class="sh-footer-widgets" style="padding-top:20px !important;padding-bottom:0px !important;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6">

                        <div id="about_us-2" class="widget_about_us widget-item widget_about_us">
                            <div class="sh-widget-title-styling">
                                <h3 class="widget-title">About Us</h3></div>

                            <p class="widget-quote"><?php echo $about->title; ?></p>

                            <p class="widget-description"><?php echo $about->desc; ?></p>

                            <div class="sh-widget-socialv2-list">
                                <a href="https://twitter.com/SAMAENGINEERING" target="_blank" class="sh-widget-socialv2-item social-media-twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="https://www.facebook.com/sama.engineering" target="_blank" class="sh-widget-socialv2-item social-media-facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="https://plus.google.com/111408671298421773147" target="_blank" class="sh-widget-socialv2-item social-media-gplus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                                <!--<a href="javascript:; target="_blank" class="sh-widget-socialv2-item social-media-instagram">
                                    <i class="fa fa-instagram"></i>
                                </a>-->
                                <div class="sh-clear"></div>
                            </div>
                        </div>
                        <div id="tag_cloud-2" class="widget-item widget_tag_cloud">
                            <div class="sh-widget-title-styling">
                                <h3 class="widget-title">Hot Tags</h3></div>
                            <div class="tagcloud">
                                    @forelse($tags as $i)
                                        <a href="{{url('/blog-tag/'.$i->tag_slug)}}" class="tag-custom-link" style="font-size: 12.581818181818pt;" aria-label="Girl (2 items)">{{$i->tag}}</a>
                                    @empty
                                    @endforelse
                                </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div id="posts_slider-3" class="widget_facebook widget-item widget_posts_slider">
                            <div class="widget-slide-arrows-container">
                                <div class="sh-widget-title-styling">
                                    <h3 class="widget-title">Featured Posts</h3></div>
                                <div class="widget-slide-arrows sh-carousel-buttons-styling"></div>
                            </div>

                            <div class="sh-widget-posts-slider sh-widget-posts-slider-group-style2 style3 sh-widget-posts-slider-init">

                            @forelse($footer_feature_posts as $i)    
                                <div class="sh-widget-posts-slider-item sh-widget-posts-slider-style2">
                                    <div class="sh-ratio">
                                        <div class="sh-ratio-container">
                                            <div class="sh-ratio-content" style="background-image: url({{asset('uploads/blog/post/'.$i->p_image)}})">
                                                <div class="sh-widget-posts-slider-content">

                                                    <a href="{{asset('blog/'.$i->cat_slug.'/'.$i->p_slug)}}">
                                                        <h5 class="post-title">
                                                    {{$i->p_title}}&nbsp;<span class="post-read-later post-read-later-guest" href="#login-register" data-type="add" data-id="53"><i class="fa fa-bookmark-o"></i></span>                                            </h5>
                                                    </a>
                                                    <div class="post-meta">

                                                        <div class="post-meta-content">

                                                            <span class="post-auhor-date">
                                                            <a href="javascript:;" class="post-date">
                                                                {{$i->created_at}}                                            
                                                            </a>
                                                            </span>

                                                           <!--  <a href="javascript:;" class="post-comments">
                                                                <i class="icon icon-bubble"></i> 1 </a>
 -->
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse    



                            </div>

                        </div>
                        <div id="subscribe-3" class="widget_sh_mailChimp widget_sh_mailChimp_style1 widget-item widget_subscribe">
                            <div class="sh-widget-title-styling">
                                <h3 class="widget-title">Subscribe Now</h3></div>
                           
                            <form  class="mc4wp-form mc4wp-form-804" >
                                <div class="mc4wp-form-fields">
                                    <p>
                                        <input id="footerinput2" type="email" name="EMAIL" placeholder="Your email address" />
                                        <input id="footersubbtn2" style="display: block;position: absolute;bottom: 0;right: 0;padding: 0px 32px;line-height: 44px;
                                        margin: 5px!important;font-size: 11px;text-transform: uppercase;font-weight: bold;color: #fff;transition: 0.3s all ease-in-out;background-color: #cf1d25;"
                                         type="button" value="Sign up"  onclick="subscribeEmailFooter()"/>
                                    </p>
                                </div>
                            </form>
                            <div id ="msg2" style="color:red;"></div>
                            <label id="footersublabel2" style="font-size: 11px"></label>
                            
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div id="posts_tabs-4" class="widget_facebook widget-item widget_posts_tabs">
                            <div class="sh-widget-poststab">
                                <!-- Nav tabs -->

                                <div class="sh-widget-poststab-title">
                                    <ul class="nav nav-tabs sh-tabs-stying" role="tablist">
                                        <li class="active">
                                            <a href="#wtabs_sT6wC1bSR3uMXjntPINz1" role="tab" data-toggle="tab">
                                                <h4 class="widget-title widget-tab-title">
                                                    Latest                  
                                                </h4>
                                            </a>
                                        </li>
                                        <!-- <li>
                                            <a href="#wtabs_sT6wC1bSR3uMXjntPINz2" role="tab" data-toggle="tab">
                                                <h4 class="widget-title widget-tab-title">
                                                    Popular                 
                                                </h4>
                                            </a>
                                        </li> -->
                                    </ul>
                                </div>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="wtabs_sT6wC1bSR3uMXjntPINz1">

                                        <div class="sh-widget-posts-slider">
                              
                                           @forelse($footer_posts as $i) 
                                            <div class="sh-widget-posts-slider-item sh-widget-posts-slider-style1">
                                                <a href="{{asset('blog/'.$i->cat_slug.'/'.$i->p_slug)}}" class="sh-widget-posts-slider-thumbnail" style="background-image: url({{asset('uploads/blog/post/'.$i->p_image)}});"></a>
                                                <div class="sh-widget-posts-slider-content">
                                                    <a href="{{asset('blog/'.$i->cat_slug.'/'.$i->p_slug)}}">
                                                        <h5 class="post-title">
                                                        {{$i->p_title}}<span class="post-read-later post-read-later-guest" href="#login-register" data-type="add" data-id="53"><i class="fa fa-bookmark-o"></i></span>                                        </h5>
                                                    </a>
                                                    <div class="post-meta">

                                                        <div class="post-meta-content">

                                                            <span class="post-auhor-date">
                                                            <a href="javascript:;" class="post-date">
                                                                {{$i->created_at}}
                                                            </a>
                                                                </span>

                                                            </div>

                                                    </div>
                                                </div>
                                            </div>
                                           
                                            @empty
                                            @endforelse
                                            
                                            
                                            
                                        </div>

                                    </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="sh-copyrights sh-copyrights-align-left2">-->
        <!--    <div class="container container-padding">-->
        <!--        <div class="sh-table">-->
        <!--            <div class="sh-table-cell">-->

        <!--                <div class="sh-copyrights-logo">-->
        <!--                    <img src="{{asset('/wp-content/uploads/sites/5/2017/08/Personal_logo_b.png')}}" class="sh-copyrights-image" alt="" />-->
        <!--                </div>-->

        <!--            </div>-->
        <!--            <div class="sh-table-cell">-->





        <!--                <div class="sh-copyrights-info">-->
        <!--                    <span class="developer-copyrights ">-->
        <!--                        Blog by <a href="javascript:;" target="blank">-->
        <!--                            <strong>Sama Engineering</strong>-->
        <!--                        </a>-->
        <!--                    </span>-->
        <!--                    <span></span>-->
        <!--                </div>-->

        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
    </footer>

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
                            <input type="hidden" name="redirect_to" value="https://gillion.shufflehound.com/personal/" />
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
    <script type='text/javascript' src='/wp-includes/js/jquery/ui/effect.min.js?ver=1.11.4')}}"></script>
    <script type='text/javascript' src="{{asset('/wp-content/themes/gillion/js/plugins/bootstrap.min.js?ver=3.3.4')}}"></script>
    <script type='text/javascript' src='/wp-includes/js/wp-embed.min.js?ver=5.0.3'></script>
    <script type='text/javascript' src='https://gillion.shufflehound.com/personal/wp-content/plugins/js_composer/assets/js/dist/js_composer_front.min.js?ver=5.6'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var mc4wp_forms_config = [];
        /* ]]> */
    </script>
    <!-- <script type='text/javascript' src='https://gillion.shufflehound.com/personal/wp-content/plugins/mailchimp-for-wp/assets/js/forms-api.min.js?ver=4.3.3'></script> -->
    <!--[if lte IE 9]>
<script type='text/javascript' src='https://gillion.shufflehound.com/personal/wp-content/plugins/mailchimp-for-wp/assets/js/third-party/placeholders.min.js?ver=4.3.3'></script>
<![endif]-->

    <style>

    </style>
<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">

</body>

</html>
<script>
function subscribeEmailFooter()
{
    var email = $('#footerinput2').val();
    var pmail = /^[a-z A-Z]+[0-9]*[@][a-z A-Z]{5}[.][a-z]{3}$/;
    var p_mail_result = pmail.test(email);
    if(email == ""){
         $("#msg2").html('*This field is required');
        
    }else if(email != ""){
        $("#msg2").html(' ');
        if(p_mail_result == false){
            $("#msg2").html('*Please follow email pattern');    
        }
        else
        {
            $.ajax({
              url: "{{url('/blog/subscribe-email')}}",
              type: 'POST',
              data: {email:email,_token:'{{ csrf_token() }}'},
              success: function(res)
               {
                $("#footerinput2").val(' ');
                $("#footersublabel2").html('You will receive the latest news and updates');
               },
               error: function(res)
               {
                console.log(res);
               }
            });
        }
    }
}

</script>