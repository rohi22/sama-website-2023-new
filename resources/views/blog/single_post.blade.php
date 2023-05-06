@extends('blog/blog_master_layout')
@section('main')
<meta name="description" content="{{$post->p_meta_desc}}"/>
<meta name="robots" content="follow,index,"/>
<link rel="canonical" href="{{URL::current()}}"> 

@section('og_page_wise')
<meta property="og:locale" content="en_PK">
<meta property="og:type" content="website">
<meta property="og:title" content="{{$post->p_title }}">
<meta property="og:description" content="{{$post->p_meta_desc}}">
<meta property="og:url" content="{{URL::current()}}">
<meta property="og:site_name" content="SAMA ENGINEERING">
@endsection

@section('twitter')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{$post->p_title }}">
<meta name="twitter:description" content="{{$post->p_meta_desc}}">
<meta name="twitter:site" content="@InsectMarketing">
<meta name="twitter:creator" content="@InsectMarketing">
@endsection

@section('title')
    {{$post->p_title }}
@endsection
<style>
    .blog-style-single-share .post-item-single-container{
        padding-left:0px !important;
    }
</style>
@section('content')
<body class="post-template-default single single-post postid-49 single-format-standard singular sh-body-header-sticky sh-bookmarks-style_meta sh-title-style1 sh-section-tabs-style1 sh-carousel-style1 sh-carousel-position-title sh-post-categories-style1 sh-review-style1 sh-meta-order-bottom sh-instagram-widget-columns2 sh-categories-position-title sh-media-icon-style1 sh-wc-labels-off wpb-js-composer js-comp-ver-5.6 vc_responsive">

    <div class="sh-header-side">
        <div id="search-4" class="widget-item widget_search">
            <div class="sh-widget-title-styling">
                <h3 class="widget-title">Search</h3></div>
            <form method="get" class="search-form" action="https://gillion.shufflehound.com/personal/">
                <div>
                    <label>
                        <input type="search" class="sh-sidebar-search search-field" placeholder="Search here..." value="" name="s" title="Search text" required />
                    </label>
                    <button type="submit" class="search-submit">
                        <i class="icon-magnifier"></i>
                    </button>
                </div>
            </form>
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

        <div class="sh-titlebar">
            <div class="container">
                <!--<div class="sh-table sh-titlebar-height-small">-->
       <!--             <div class="titlebar-title sh-table-cell">-->

       <!--                 <h2>-->
							<!--Blog Post-->
       <!--                 </h2>-->

       <!--             </div>-->
                    <div class="title-level sh-table-cell">

                        <div id="breadcrumbs" class="breadcrumb-trail breadcrumbs"><span class="item-home"><a class="bread-link bread-home" href="javascript:;" title="Home">Home</a></span><span class="separator"> &gt; </span><span class="item-cat"><a href="javascript:;">{{$post->cat_title}}</a></span><span class="separator"> &gt; </span><span class="item-current item-49"><span class="bread-current bread-49" title="Who Else Wants To Know The Mystery Behind Web Trends?">{{$post->p_title}}</span></span>
                        </div>
                    </div>
                <!--</div>-->
            </div>
        </div>

        <div id="wrapper" class="layout-default">

            <div class="content-container sh-page-layout-default">
                <div class="container entry-content">

                    <div id="content-wrapper" class="content-wrapper-with-sidebar">
                        <div id="content" class="content-layout-sidebar-right content-with-sidebar-right">
                            <div class="blog-single blog-style-single blog-style-single-share  blog-blockquote-style1  blog-style-post-standard">

                                <article id="post-49" class="post-item post-item-single post-49 post type-post status-publish format-standard has-post-thumbnail hentry category-design category-style tag-black tag-camera tag-coffee tag-style">

                                    <div class="post-type-content">

                                        <div class="post-thumbnail">
                                            <img style="height: 472px;" src="{{asset('uploads/blog/post/'.$post->p_image)}}" alt="Who Else Wants To Know The Mystery Behind Web Trends?">

                                            <a href="{{asset('uploads/blog/post/'.$post->p_image)}}" class="post-lightbox" data-rel="lightcase:post_gallery_49"></a>

                                        </div>

                                    </div>

                                    <div class="post-item-single-container">
                                        <div class="post-content-share post-content-share-bar"></div>

                                        <div class="post-single-meta">
                                            <div class="post-categories-container">
                                                <div class="post-categories">{{$post->cat_title}}</a></div>
                                            </div>
                                            <a class="post-title">
                                                <h1>
											     {{$post->p_title}}&nbsp;<span class="post-read-later post-read-later-guest" href="#login-register" data-type="add" data-id="49"><i class="fa fa-bookmark-o"></i></span>											</h1>
                                            </a>

                                            <div class="post-meta">

                                                <div class="post-meta-content">
                                                    <span class="post-auhor-date post-auhor-date-full">
                                                                        <a href="https://gillion.shufflehound.com/personal/author/gillionshufflehound/">
                                                            <!-- <img alt='' src='https://secure.gravatar.com/avatar/f88c13d62ba761a92211e266c22dbb1f?s=28&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/f88c13d62ba761a92211e266c22dbb1f?s=56&#038;d=mm&#038;r=g 2x' class='avatar avatar-28 photo post-author-image' height='28' width='28' />                    </a>
                                                             -->        <span>
                                                    <a href="javascript:;" class="post-author"><!-- Gillion --></a></span>,
                                                                                        <a href="javascript:;" class="post-date">
                                                                        {{$i->created_at}}                                            </a>
                                                    </span>

                                                    <!-- <a href="https://gillion.shufflehound.com/personal/2017/01/31/who-else-wants-to-know-the-mystery-behind-web-trends/#comments" class="post-comments">
                                                        <i class="icon icon-bubble"></i> 1 </a>

                       -->                             

                                                    
                                                </div>

                                            </div>
                                        </div>

                                        <div class="post-content">

                                            <p><?php echo $post->p_desc; ?></p>
                                            @if(!empty($post->p_link))
                                               <iframe width="560" height="315" src="{{$post->p_link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            @endif
                                        </div>

                                        <div class="sh-clear"></div>

                                        <div class="sh-page-links"></div>

                                        <div class="post-tags-container">

                                            <div class="post-tags">
                                                @forelse($single_post_tags as $i)
                                                    <a href="{{url('/blog-tag/'.$i->tag_slug)}}" class="post-tags-item">
    													#{{$i->tag}}												
                                                    </a>
                                                @empty
                                                @endforelse
                                                
                                            </div>
                                        </div>

                                        <div class="post-content-share-mobile-contaner">
                                            <div class="post-content-share post-content-share-bar post-content-share-mobile"></div>
                                        </div>

                                    </div>

                                    <div class="post-switch post-swtich-style1 hide">
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="post-switch-item " style="background-image: url(https://cdn.gillion.shufflehound.com/wp-content/uploads/sites/5/2017/01/Untitled-1_0001_andrew-neel-2345-1024x683.jpg);">
                                                    <div class="post-switch-item-content">
                                                        <a href="https://gillion.shufflehound.com/personal/2017/01/31/be-like-water-my-friend/" class="post-switch-item-left">
                                                            <i class="icon icon-arrow-left-circle"></i>
                                                        </a>

                                                        <div class="post-switch-item-right">
                                                            <div class="post-categories-container">
                                                                <div class="post-categories"><a href="https://gillion.shufflehound.com/personal/category/motivation/">Motivation</a></div>
                                                            </div>
                                                            <p>
                                                                <a href="https://gillion.shufflehound.com/personal/2017/01/31/be-like-water-my-friend/">
																									Be like water my friend																							</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">

                                                <div class="post-switch-next post-switch-item " style="background-image: url(https://cdn.gillion.shufflehound.com/wp-content/uploads/sites/5/2017/01/Untitled-1_0016_andrew-neel-100470-1024x683.jpg);">
                                                    <div class="post-switch-item-content">

                                                        <div class="post-switch-item-right">
                                                            <div class="post-categories-container">
                                                                <div class="post-categories"><a href="https://gillion.shufflehound.com/personal/category/lifestyle/">Lifestyle</a>, <a href="https://gillion.shufflehound.com/personal/category/people/">People</a></div>
                                                            </div>
                                                            <p>
                                                                <a href="https://gillion.shufflehound.com/personal/2017/01/31/the-untapped-gold-mine-of-time-that-virtually-no-one-knows-about/">
																									The Untapped Gold Mine Of Time That Virtually No One Knows About																							</a>
                                                            </p>
                                                        </div>

                                                        <a href="https://gillion.shufflehound.com/personal/2017/01/31/the-untapped-gold-mine-of-time-that-virtually-no-one-knows-about/" class="post-switch-item-left">
                                                            <i class="icon icon-arrow-right-circle"></i>
                                                        </a>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="post-related-title post-slide-arrows-container">
                                        <h2 class="post-single-title">
										Related posts									</h2>
                                        <div class="post-slide-arrows sh-carousel-buttons-styling"></div>
                                    </div>
                                    
                                    <div class="post-related">
                                        @forelse($related_posts as $i)
                                        <div class="post-related-item">
                                            
                                            <article id="post-59" class="post-item post-59 post type-post status-publish format-standard has-post-thumbnail hentry category-design category-lifestyle tag-hand-made tag-miniature tag-ship">
                                                <div class="post-container">
                                                    <div class="post-thumbnail">
                                                        <div class="sh-ratio">
                                                            <div class="sh-ratio-container">
                                                                <div class="sh-ratio-content" style="background-image: url({{asset('uploads/blog/post/'.$i->p_image)}});"></div>
                                                            </div>
                                                        </div>

                                                        <a href="" class="post-overlay"></a>
                                                    </div>

                                                    <div class="post-content-container">
                                                        <div class="post-categories-container">
                                                            <div class="post-categories">{{$i->cat_title}}</div>
                                                        </div>
                                                        <a href="" class="post-title">
                                                            <a href="{{asset('blog/'.$i->cat_slug.'/'.$i->p_slug)}}"<h4>{{$i->p_title}}&nbsp;<span class="post-read-later post-read-later-guest" href="#login-register" data-type="add" data-id="59"><i class="fa fa-bookmark-o"></i></span>					</h4></a> </a>

                                                        <div class="post-meta">

                                                            <div class="post-meta-content">
                                                            <span class="post-auhor-date"><span>
                                                        <a href="javascript:;" class="post-author"><!-- Gillion --></a></span>,
                                                        <a href="javascript:;" class="post-date">
                                                           {{$i->created_at}}</a>
                                                        </span>                                            
                                                         </div>

                                                        </div>

                                                    </div>

                                                </div>
                                            </article>

                                        </div>
                                    @empty
                                    @endforelse    




                                    </div>

                                </article>

                                <div class="sh-comments">

                                    <h3 class="sh-comments-position" id="comments"></h3>
                                <!--    <div class="sh-blog-fancy-title-container">-->
                                <!--        <h2 class="post-single-title">-->
				                            <!--<span id="total_comment">{{count($comments)}}</span> Comment			-->
                                <!--        </h2>-->
                                <!--    </div>-->

                                    <ol class="sh-comment-list" id="commentsShow">
                                        @forelse($comments as $i)
                                            <li class="comment byuser comment-author-gillionshufflehound bypostauthor even thread-even depth-1">
                                                <h6 class="sh-comment-position" id="comment-14"></h6>
                                                <div id="div-comment-14" class="comment-body">
                                                    <div class="comment-column-left">
                                                        <div class="comment-thumb"><img alt='' src="{{asset('wp-content/user-admin.png')}}" height='70' width='70' /></div>
                                                    </div>
                                                    <div class="comment-column-right">

                                                        <span class="sh-comment-author"><a href='javascript:;' rel='external nofollow' class='url'>{{$i->name}}</a></span>
                                                        <div class="sh-comment-content">
                                                            <p>{{$i->comment}}</p>
                                                        </div>

                                                        <div class="reply post-meta">
                                                            <span class="sh-comment-date">
                                								<a href="javascript:;">
                                									{{$i->created_at}}								
                                                                </a>
                                							</span>

                                                            <!-- <i class="icon icon-action-redo sh-reply-link"></i>
                                                            <span class="sh-reply-edit">
    															</span>

                                                            <i class="icon icon-note sh-reply-link sh-comment-date-reply"></i>
                                                            <span class="sh-reply-link-button">
    									                   <a rel='nofollow' class='comment-reply-link' href='https://gillion.shufflehound.com/personal/2017/01/31/who-else-wants-to-know-the-mystery-behind-web-trends/?replytocom=14#respond' onclick='return addComment.moveForm( "div-comment-14", "14", "respond", "49" )' aria-label='Reply to Shufflehound'>Reply</a>								</span> -->
                                                        </div>

                                                    </div>
                                                </div>

                                            </li>
                                        @empty
                                        @endforelse
                                        <!-- #comment-## -->
                                    </ol>
                                    <!-- .comment-list -->

                                    <!--<div class="sh-comment-form">-->

                                    <!--    <div id="respond" class="comment-respond">-->
                                    <!--        <h3 id="reply-title" class="comment-reply-title">Leave a Reply <small><a rel="nofollow" id="cancel-comment-reply-link" href="/personal/2017/01/31/who-else-wants-to-know-the-mystery-behind-web-trends/#respond" style="display:none;">Cancel reply</a></small></h3>-->
                                    <!--        <form class="comment-form" action="abc.com">-->
                                    <!--            <label>Your comment <span>*</span></label>-->
                                    <!--            <p class="comment-form-comment">-->
                                    <!--                <textarea id="comment" name="comment" cols="45" rows="8"></textarea>-->
                                    <!--                <span id="comment_error" style="color:red;"></span>-->
                                    <!--            </p>-->
                                    <!--            <div class="sh-comment-form-column">-->
                                    <!--                <label>Name <span>*</span></label>-->
                                    <!--                <p class="comment-form-author">-->
                                    <!--                    <input id="name" name="name" type="text" value="" />-->
                                    <!--                    <span id="name_error" style="color:red;"></span>-->
                                    <!--                </p>-->
                                    <!--            </div>-->
                                    <!--            <div class="sh-comment-form-column">-->
                                    <!--                <label>Email <span>*</span></label>-->
                                    <!--                <p class="comment-form-email">-->
                                    <!--                    <input id="email" name="email" type="text" value="" />-->
                                    <!--                    <span id="email_error" style="color:red;"></span>-->
                                    <!--                </p>-->
                                    <!--            </div>-->
                                    <!--            <div class="sh-comment-form-column">-->
                                    <!--                <label>Website <span>*</span></label>-->
                                    <!--                <p class="comment-form-url">-->
                                    <!--                    <input id="url" name="url" type="text" value="" />-->
                                    <!--                    <span id="url_error" style="color:red;"></span>-->
                                    <!--                </p>-->
                                    <!--            </div><!-- -->
                                    <!--            <div class="sh-comments-required-notice">Required fields are marked <span>*</span></div> -->
                                    <!--            <p class="form-submit">-->
                                    <!--                <input style="background-color: #505050;color: #fff;line-height: 44px;padding: 0 30px;border: none;font-weight: bold;font-size: 11px;"  -->
                                    <!--                type="button" onclick="leaveComment({{$post->id}})" class="submit" value="Send a comment" id="comment_submit" />-->
        
                                    <!--                <input type='hidden' name='comment_post_ID' value='49' id='comment_post_ID' />-->
                                    <!--                <input type='hidden' name='comment_parent' id='comment_parent' value='0' />-->
                                    <!--                <span style="color:green;" id="commentStatus"></span>-->
                                    <!--            </p>-->

                                    <!--        </form>-->
                                    <!--    </div>-->
                                        <!-- #respond -->
                                    <!--</div>-->
                                    <img src="{{asset('gif_img.gif')}}" style="width:100px;height:100px;display:none;" id="loader">
                                </div>

                            </div>
                        </div>
                        <div id="sidebar" class="sidebar-right">

                            <div class="sidebar-container">

                                <div id="categories-3" class="widget-item widget_categories">
                                    <div class="sh-widget-title-styling">
                                        <h3 class="widget-title">Categories</h3></div>
                                    <ul>
                                         @forelse($blog_categories as $i)
                                            <li class="cat-item cat-item-50"><a href="{{asset('blog/'.str_slug($i->cat_title))}}">{{$i->cat_title}}</a></li>
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
                            <!--    <div id="subscribe-2" class="widget_sh_mailChimp widget_sh_mailChimp_style1 widget-item widget_subscribe">-->
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
    <script type='text/javascript' src='https://gillion.shufflehound.com/personal/wp-includes/js/jquery/ui/effect.min.js?ver=1.11.4'></script>
    <script type='text/javascript' src='https://gillion.shufflehound.com/personal/wp-content/themes/gillion/js/plugins/bootstrap.min.js?ver=3.3.4'></script>
    <script type='text/javascript' src='https://gillion.shufflehound.com/personal/wp-includes/js/wp-embed.min.js?ver=5.0.3'></script>
    <script type='text/javascript' src='https://gillion.shufflehound.com/personal/wp-includes/js/comment-reply.min.js?ver=5.0.3'></script>
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
function leaveComment(id)
{
    var email   = $('#email').val();
    var name    = $('#name').val();
    var comment = $('#comment').val();
    var url    = $('#url').val();
    var pmail = /^[a-z A-Z]+[0-9]*[@][a-z A-Z]{5}[.][a-z]{3}$/;
    var p_mail_result = pmail.test(email);

    var comment_check = false;
    var name_check = false;
    var email_check = false;
    var url_check = false;
    if(email == ""){
         $("#email_error").html('*This field is required');
        
    }else if(email != ""){
        $("#email_error").html(' ');
        if(p_mail_result == false){
            $("#email_error").html('*Please follow email pattern');    
        }
        else
        {
            email_check = true;
            $("#email_error").html(' ');
        }
    }
    if(name == ""){
         $("#name_error").html('*This field is required');
        
    }
    else if(name != "")
    {
        name_check = true;
        $("#name_error").html(' ');
    }
    if(comment == ""){
         $("#comment_error").html('*This field is required');
        
    }
    else if(comment != "")
    {
        comment_check = true;
        $("#comment_error").html(' ');
    }
    if(url == ""){
         $("#url_error").html('*This field is required');
        
    }
    else if(url != "")
    {
        url_check = true;
        $("#url_error").html(' ');
    }

    if(comment_check == true && email_check == true && url_check == true && name_check == true)
    {
        var url = "{{url('/')}}";
        $("#loader").css('display','block');
        $.ajax({
              url: "{{url('/blog/submit_comment')}}",
              type: 'POST',
              data: {id:id,email:email,name:name,url:url,comment:comment,_token:'{{ csrf_token() }}'},
              beforeSend:function(){
                $("#commentsShow").html(null);
                $("#total_comment").html(null);
              },
              success: function(res)
               {
                $("#total_comment").html(res.length);
                $.each(res,function(k,v){
                    $("#commentsShow").append('<li class="comment byuser comment-author-gillionshufflehound bypostauthor even thread-even depth-1">'+
                        '<h6 class="sh-comment-position" id="comment-14"></h6>'+
                        '<div id="div-comment-14" class="comment-body"></div>'+
                        '<div class="comment-column-left">'+
                                '<div class="comment-thumb"><img src="'+url+'/wp-content/user-admin.png" height="70" width="70"></div>'+
                        '</div>'+
                        '<div class="comment-column-right">'+
                        '<span class="sh-comment-author"><a href="javascript:;" rel="external nofollow" class="url">'+v.name+'</a></span>'+
                                '<div class="sh-comment-content">'+
                                    '<p>'+v.comment+'</p>'+
                                '</div>'+
                                '<div class="reply post-meta">'+
                                    '<span class="sh-comment-date">'+
                                        '<a href="javascript:;">'+
                                            '2 years ago'+                             
                                        '</a>'+
                                    '</span>'+
                                '</div>'+
                        '</div>'+
                        '</li>');
                    });             
                $("#loader").css('display','none');
                //$("#commentStatus").html(res);
                console.log(res);
                
               },
               error: function(res)
               {
                console.log(res);
               }
        });
    }
        
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