@extends('blog/blog_master_layout')
@section('title','Highly Informative And Interesting Blogs For Readers')
@section('content')
<div id="wrapper" class="layout-sidebar-right">
    <div class="sh-pagebuilder-content">
        <div class="container">
            @include('blog/blog_slider')
            @include('blog/feature')                    
            <div class="vc_row wpb_row vc_row-fluid">
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper"></div>
                    </div>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
    <div class="content-container sh-page-layout-default">
        <div class="container entry-content">
            <div id="content-wrapper" class="content-wrapper-with-sidebar">
                <div id="content" class="blog-page-list content-with-sidebar-right sh-pagination-left">
                    <div class="post-related-title" style="margin-top: 0px; margin-bottom: 35px;">
                        <h2 class="post-single-title">Latest posts</h2>
                    </div>
                    <div class="sh-group blog-list blog-style-left blog-dividing-line-on">
                        <!-- Posts -->
                        @forelse($posts as $i)
                        <article id="post-53" class="post-item post-53 post type-post status-publish format-standard has-post-thumbnail hentry category-guide category-lifestyle tag-guide tag-life-hack tag-lifestyle tag-travel">
                            <div class="post-container">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 post-container-left">

                                        <div class="post-thumbnail">
                                            <div class="sh-ratio">
                                                <div class="sh-ratio-container">
                                                    <div class="sh-ratio-content" style="background-image: url(uploads/blog/post/{{$i->p_image}});"></div>
                                                </div>
                                            </div>

                                            <a href="{{asset('blog/'.$i->cat_slug.'/'.$i->p_slug)}}" class="post-overlay"></a>
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-sm-6 post-container-right">

                                        <div class="post-content-container">
                                            <div class="post-categories-container">
                                                <div class="post-categories">{{$i->cat_title}}</div>
                                            </div>
                                            <a href="{{asset('blog/'.$i->cat_slug.'/'.$i->p_slug)}}" class="post-title">
                                                <h2>
                                                        {{$i->p_title}}<span class="post-read-later post-read-later-guest" href="#login-register" data-type="add" data-id="53"><i class="fa fa-bookmark-o"></i></span>                            </h2>
                                            </a>

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
                                                    <span class="post-auhor-date"><span>
                                                    <a href="https://gillion.shufflehound.com/personal/author/gillionshufflehound/" class="post-author"><!-- Gillion --></a></span>,
                                                    <a href="javascript:;" class="post-date">
                                                                  {{$i->created_at}}                                            </a>
                                                    </span>

                                                    <!-- <a href="https://gillion.shufflehound.com/personal/2017/02/08/the-no-1-travel-mistake-youre-making-and-4-ways-to-fix-it/#comments" class="post-comments">
                                                        <i class="icon icon-bubble"></i> 1 </a>

                                                     -->
                                                     </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </article>
                        @empty
                         <div class="alert alert-warning" style="margin-bottom:10px;">No any post found</div>
                        @endforelse

                        <?php echo  $posts->links(); ?>
                        <!-- End posts -->
                    </div>
                    
                   <!--  <div class="sh-pagination sh-default-color">
                        <ul class='page-numbers'>
                            <li><span aria-current='page' class='page-numbers current'>1</span></li>
                            <li><a class='page-numbers' href='#'>2</a></li>
                            <li><a class='page-numbers' href='#'>3</a></li>
                            <li><a class="next page-numbers" href="#">Next</a></li>
                        </ul>
                    </div> -->
                    
                </div>
                <div id="sidebar" class="sidebar-right">
                    <div class="sidebar-container">
                        <div id="categories-3" class="widget-item widget_categories">
                            <div class="sh-widget-title-styling">
                                <h3 class="widget-title">Categories</h3>
                            </div>
                            <ul>
                        
                                @forelse($blog_categories as $i)
                                    <li class="cat-item cat-item-50"><a href="{{asset('blog/'.$i->cat_slug)}}" style="@if(isset($nav) && $nav == str_slug($i->cat_title))color:red !important; @endif">{{$i->cat_title}}</a></li>
                                @empty
                                    <li class="cat-item cat-item-50">No any Category Found</li>
                                @endforelse
                            </ul>
                        </div>
                        <!--<div id="image-2" class="widget_sh_image widget-item widget_image">-->
                        <!--    <a href=""><img src="https://cdn.gillion.shufflehound.com/wp-content/uploads/sites/5/2017/07/AD.jpg" class="" /></a>-->
                        <!--</div>-->
                        <!--<div id="subscribe-2" class="widget_sh_mailChimp widget_sh_mailChimp_style1 widget-item widget_subscribe">-->
                        <!--    <div class="sh-widget-title-styling">-->
                        <!--        <h3 class="widget-title">Subscribe Now</h3></div>-->
                            
                        <!--    <form  class="mc4wp-form mc4wp-form-804">-->
                        <!--        <div class="mc4wp-form-fields">-->
                        <!--            <p>-->
                        <!--                <input type="email" name="email" placeholder="Your email address" id="footerinput"/>-->

                        <!--                <input id="footersubbtn" data-toggle="modal" data-target="#subscribeus" style="display: block;position: absolute;bottom: 0;right: 0;padding: 0px 32px;line-height: 44px;-->
                        <!--                margin: -48px!important;font-size: 11px;text-transform: uppercase;font-weight: bold;color: #fff;transition: 0.3s all ease-in-out;background-color: #cf1d25;"-->
                        <!--                 type="button" value="Sign up" onclick="subscribeEmail()" />-->
                        <!--            </p>-->
                        <!--        </div>-->
                        <!--    </form> -->
                            <!--<div class="alert alert-danger" style="display:none"></div>-->
                            <!--<div id ="msg" style="color:red;"></div>-->
                            <!--<label id="footersublabel" style="font-size: 11px"></label>-->
                            <!-- / MailChimp for WordPress Plugin -->
                            <!--<p style="margin-top: 10px;"class="widget-quote-description">* You will receive the latest news and updates!</p>-->
                        </div>                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    /*var email = $('#footerinput').val();
    var pmail = /^[a-z A-Z]+[0-9]*[@][a-z A-Z]{5}[.][a-z]{3}$/;
    var p_mail_result = pmail.test(email);
    if(email == ""){
         $("#msg").html('*This field is required');
        
    }else if(email != ""){
        $("#msg").html(' ');
        if(p_mail_result == false){
            $("#msg").html('*Please follow email pattern');    
        }
        else
        {
            $.ajax({
              url: "{{url('/blog/subscribe-email')}}",
              type: 'POST',
              data: {email:email,_token:'{{ csrf_token() }}'},
              success: function(res)
               {
                $("#footerinput").val(' ');
                $("#footersublabel").html('You will receive the latest news and updates');
               },
               error: function(res)
               {
                console.log(res);
               }
            });
        }
    }
}*/

</script>


<script>
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