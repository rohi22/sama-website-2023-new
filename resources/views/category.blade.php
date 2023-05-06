@extends('master_layout')
@section('main')
<meta name="description" content="{{$cat_head->cat_meta_desc}}"/>
@endsection
@section('og_product_wise')
<meta property="og:type" content="product.item">
<meta property="og:title" content="{{ucfirst($cat_head->cat_meta_title)}} - SAMA ENGINEERING">
<meta property="og:url" content="{{URL::current()}}">
<meta property="og:image" content="{{asset('uploads/'.$cat_head->cat_og_img)}}">
<meta property="product:condition" content="new">
@endsection
@section('twitter')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ucfirst($cat_head->cat_meta_title)}} - SAMA ENGINEERING">
<meta name="twitter:description" content="{{$cat_head->cat_meta_desc}}">
<meta name="twitter:site" content="@SAMAENGINEERING">
<meta name="twitter:creator" content="@SAMAENGINEERING">
@endsection
@section('title') @if(!empty($cat_head)){{$cat_head->cat_meta_title}} -@endif
@endsection

@section('content')
<style>
#show_products{
    flex-direction: row !important;
}
.scroll-items{
    width:1170px !important;
}
.my-container .top-tabs .tab-sections{
    width:95px !important;
    height:100px !important;
}
@media screen and (max-width: 600px) {
  .top-tabs {
    display:none !important;
  }
}
@media  screen and (max-width: 600px) {
  #hide_catalogue {
    display:none;
  }
}
.search-btn{
    background:#cf1d25;color:white;border:1px solid #cf1d25;padding-left:5px;padding-right:5px;
}
</style>

<!-- <form class="example" action="{{url('search')}}">{{csrf_field()}}
  <input type="text" placeholder="Search short description here.." name="search">
  <button type="submit" value="Search">Search</button>
</form> -->

@if($theme_mode == 1)
<!--Snack processing line theme-->
<style>
.myeditclass{
    width:auto !important;
}
    .thumbnail{
        border:none !important;
    }
    .custom-logo-class{
        margin-top:-20px !important;
    }
    .form-control {
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;

    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out;
}
.myeditclass{  
    width: 74% !important;
    /*margin-left: 10.2%;*/
    height:30px !important;
    padding-left: 07px !important;
}
.section-snack-processing .inner-box .col-one .yt-video-box .thumbnail a .fa-youtube{
    font-size: 5rem !important;
}
.sb{
    padding: 7.4px !important;
}
.section-snack-processing .inner-box .col-one .image-row a{
    width: auto !important;
    height: auto !important;
}
.myDownload{
    font-size:20px;border-radius:50%;padding-top:15px;background-color:#cf1d25;color:white;text-align:center;height:50px;width:50px;margin-top:5px;
}

</style>

<div class="container-fluid bg-breed-crumb" style="background:#e2e2e2;">
        <div class="my-container" style="">
            <div class="breed-crumb-box">
                <a href="{{url('/')}}"><i class="fa fa-home" style="padding-right:10px;border-right:2px solid #282828;font-size:22px !important;color:#282828;"></i></a>
                @if(isset($slug))<a href="{{url('category/'.$slug)}}" class="active">{{ucwords(str_slug($slug,' '))}} @endif</a>
            </div>
            <!-- Breed Crumbs -->
        </div>
    </div>

    <!-- Banner -->
    @if(!empty($slider_categories))
    <div class="container-fluid bg-grey-lines" style="@if( isset($sliders) && !empty($sliders))background-image: url({{asset('/uploads/'.$sliders->s_background_image)}});@endif">
        <div class="my-container">
            <!-- Slider -->
            <div id="cIndicators" class="carousel slide" data-ride="carousel">
                    <ol style="display:none;" class="carousel-indicators">
                        <li data-target="#cIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#cIndicators" data-slide-to="1"></li>
                        <li data-target="#cIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <?php $count = 0;?>
                        @forelse($slider_categories as $i)
                            @if($count == 0)
                                <div class="carousel-item active">
                                    <div class="banner-machine">
                                        <img src="@if(isset($i->s_main_image)){{asset('uploads/'.$i->s_main_image)}}@endif" alt="">
                                    </div>
                                </div>
                                <?php $count= 1;?>
                            @else
                                <div class="carousel-item">
                                    <div class="banner-machine">
                                        <img src="@if(isset($i->s_main_image)){{asset('uploads/'.$i->s_main_image)}}@endif" alt="">
                                    </div>
                                </div>
                            @endif
                        @empty
                        @endforelse
                       
                    </div>
    
                </div>
                <!-- Slider -->
        </div>
    </div> 
    @endif
    <!-- Banner -->
    <div class="container-fluid">
        <!-- <div class="container-fluid">
            <div class="row">
                <form class="example" action="{{url('search')}}">{{csrf_field()}}
  <input type="text" placeholder="Search short description here.." name="search">
  <button type="submit" value="Search">Search</button>
</form>
            </div>
        </di -->
        <div class="container-fluid">
            <div class="section-snack-processing">

                <!--  -->
                @forelse($products as $i) 
                <div class="inner-box">
                    <div class="showdowncap col-md-7" style="padding-left:0px;padding-right:0px;">
                        <div class="image">
                            <a href="{{asset('product/'.$i->p_slug)}}"><img style="margin-top:20px;height:200px!important;width:100% !important;" src="{{asset('uploads/product/'.$i->p_main_image)}}" class="img-thumbnail" alt=""></a>
                        </div>
                    </div>
                    <div class="col-one">
                        <h2 style="font-size:2.5rem;">
                            <?php 
                                $string = strip_tags($i->p_title);
                                if (strlen($string) > 150) {
                                    // truncate string
                                    $stringCut = substr($string, 0, 150);
                                    $endPoint = strrpos($stringCut, ' ');
                                
                                    //if the string doesn't contain any space then it will cut without word basis.
                                    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                    $string .= '...';
                                }
                                $link = asset('product/'.$i->p_slug);
                                echo "<a href='".$link."' style='letter-spacing:0em;color:#CF1D25;'>$string</a>";
                                
                               ?>
                               </h2>
                               <p>
                            <?php 
                                $string = strip_tags($i->p_short_desc);
                                if (strlen($string) > 250) {
                                    // truncate string
                                    $stringCut = substr($string, 0, 150);
                                    $endPoint = strrpos($stringCut, ' ');
                                
                                    //if the string doesn't contain any space then it will cut without word basis.
                                    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                    $string .= '...';
                                }
                                echo $string;
                               
                               ?>
                               
                                   <button style="border:none;background-color:#cf1d25;"><a style="padding-left:3px;padding-right:3px;font-size:12px;text-decoration:none;color:white;background-color:#cf1d25;border:none;" href="{{asset('product/'.$i->p_slug)}}">View Details</a></button>
                               </p>
                        <div class="btn-box">
                            <!--<a href="{{asset('uploads/pdf/'.$i->p_pdf)}}" download="{{$i->p_pdf}}"><i class="fas fa-download"></i>Download <span>Catalogue</span></a>-->
                            
                        </div>
            <h1 style="font-size:2.2rem !important;color:#282828 !important;" id="tempt"></h1>
            @forelse($tags as $j) 
             @if($i->id == $j->p_id)
             <script>
                 $("#tempt").html('Tags');
             </script>
            <a href="{{url('tag/'.$j->gt_slug)}}" class="btn btn-primary" style="display:none;margin-left: 10px;margin-right: 10px;">{{$j->gt_title}}</a>
            @endif
            @empty
            @endforelse
                        <div class="image-row">


                            <div id="demo" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ul class="carousel-indicators">
    @php $count = 1; @endphp
      @forelse($bag_images as $key=>$img)
        <li data-target="#demo" data-slide-to="0" @if($count == 1) class="active"  @php $count = 0; @endphp @endif></li>
    @empty
    @endforelse
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    @php $count2 = 1;$check = 0; @endphp
  
    <div class="carousel-item @if($count2 == 1) active  @php $count2 = 0; @endphp @endif">
      <div class="row">
           @forelse($bag_images as $key=>$img)
           @if($i->id == $img->p_id)   
           @if($check == 4) </div>
                    </div>
                    <div class="carousel-item"> 
                    <div class="row">
                        @php $check = 0; @endphp
            @endif
            <div class="col-md-3 col-3">
                <img src="{{asset('uploads/product/'.$img->p_bag_image)}}" style="width:100%;">    
            </div>
            @php ++$check; @endphp
             @endif
            @empty
            @endforelse
        </div>
    </div>
  
  </div>
  @if($check > 4)
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
  @endif


</div>

                            
                        </div>

                        <div class="yt-video-box" style="padding:0px !important;">
                            <div class="thumbnail">
                                <a href=""><i class="fa fa-youtube"></i></a>
                            </div>
                            <div class="info" style="width:100%;margin-top:-5%;margin-left:5px;">
                                <h3>PLAY</h3>
                                <a class="hidedowncap" href="javascript:;" onclick="showVideo('{{$i->p_video_link}}')">Click here to watch video</a>
                            </div>
                            <div class="thumbnail">
                                <a><i class="fa fa-download myDownload"></i></a>
                            </div>
                            <div class="info" style="width:100%;margin-top:-5%;margin-left:5px;">
                                <h3>DOWNLOAD</h3>
                                <a class="hidedowncap" href="{{asset('uploads/pdf/'.$i->p_pdf)}}" download="{{$i->p_pdf}}">Click here to download catalogue</a>
                            </div>
                            
                        </div>
                    </div>

                    <div class="hidedowncap col-md-7">
                        <div class="image">
                            <a href="{{asset('product/'.$i->p_slug)}}"><img style="margin-top:20px;height:300px!important;width:100% !important;" src="{{asset('uploads/product/'.$i->p_main_image)}}" class="img-thumbnail" alt=""></a>
                        </div>
                    </div>
                </div>

                @empty
                    <div class="alert alert-warning" style="text-align:center;width: 15%;margin-left: 30%;"><p>No Record Found</p></div>    

            @endforelse
             <?php echo  $products->links(); ?>
             
         

            </div>
            
        </div>
    </div>
<div class="modal fade" id="myVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top: 100px;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="row" id="show_gallery">
         
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <script>
    function showVideo(url)
        {
            $("#show_gallery").html(' ');
            jQuery.noConflict();
            $('#myVideo').modal('show'); 
            $('#show_gallery').append('<iframe width="560" height="315" src="'+url+'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'); 
               
        }

        // ------------------------------------- Top Five Tabs
        var timeTransition = 400;

        $(document).ready(function () {
            showChangerBox1();
        });

        // ------------------------------------- Top Five Tabs


        function subCont1() {
            $(".dc-inner").hide(timeTransition);
            $(".subCont1").show(timeTransition);
            $(".seriesLinks").removeClass("active");
            $("#subCont1").addClass("active");
        }

        function subCont2() {
            $(".dc-inner").hide(timeTransition);
            $(".subCont2").show(timeTransition);
            $(".seriesLinks").removeClass("active");
            $("#subCont2").addClass("active");
        }

        function subCont3() {
            $(".dc-inner").hide(timeTransition);
            $(".subCont3").show(timeTransition);
            $(".seriesLinks").removeClass("active");
            $("#subCont3").addClass("active");
        }

        function subCont4() {
            $(".dc-inner").hide(timeTransition);
            $(".subCont4").show(timeTransition);
            $(".seriesLinks").removeClass("active");
            $("#subCont4").addClass("active");
        }

        function subCont5() {
            $(".dc-inner").hide(timeTransition);
            $(".subCont5").show(timeTransition);
            $(".seriesLinks").removeClass("active");
            $("#subCont5").addClass("active");
        }

        function subCont6() {
            $(".dc-inner").hide(timeTransition);
            $(".subCont6").show(timeTransition);
            $(".seriesLinks").removeClass("active");
            $("#subCont6").addClass("active");
        }

        function subCont7() {
            $(".dc-inner").hide(timeTransition);
            $(".subCont7").show(timeTransition);
            $(".seriesLinks").removeClass("active");
            $("#subCont7").addClass("active");
        }

        function subCont8() {
            $(".dc-inner").hide(timeTransition);
            $(".subCont8").show(timeTransition);
            $(".seriesLinks").removeClass("active");
            $("#subCont8").addClass("active");
        }

        function subCont9() {
            $(".dc-inner").hide(timeTransition);
            $(".subCont9").show(timeTransition);
            $(".seriesLinks").removeClass("active");
            $("#subCont9").addClass("active");
        }

        function subCont10() {
            $(".dc-inner").hide(timeTransition);
            $(".subCont10").show(timeTransition);
            $(".seriesLinks").removeClass("active");
            $("#subCont10").addClass("active");
        }
    </script>
    <script>
        $(document).ready(function () {
            // $(window).scroll(function () {
            //     if ($(this).scrollTop() > 100) {
            //         $('#scrollToTop').fadeIn();
            //     } else {
            //         $('#scrollToTop').fadeOut();
            //     }
            // });
            $('#scrollToTop').click(function () {
                $("html, body").animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
        });
    </script>
@elseif($theme_mode == 2)
     <!-- Four-Tabs -->
     <style>
         .customheight{
    height:60px !important;
}
     </style>
    <div class="container-fluid">
        <div class="my-container">
            <div class="top-tabs">
                    @forelse($subcategories as $i)
                        <a style="text-decoration-line: blink;color: #9D9996;" href="{{asset('sub-category/'.$i->cat_slug)}}" id="{{$i->id}}">
                        <div style="" class="tab-sections horiFlowPack @if(isset($child_nav) && $child_nav == $i->id)active @endif">
                        
                            <div class="image">
                            <img src="{{asset('uploads/'.$i->cat_icon)}}" alt="">
                        </div>
                        <h6>{{$i->cat_title}}</h6>
                        </div>
                        </a>
                    @empty
                    <!--    <div class="alert alert-warning" style="text-align:center;"><p>No Record Found</p></div>-->
                    @endforelse
            </div>
        </div>
    </div>
    <!-- Four-Tabs -->

    <!-- ///Changer-Conatiner\\\ -->
    <div class="changer-box vertFlowPack">

        <div class="container-fluid bg-breed-crumb" style="background:#e2e2e2;">

            <div class="my-container">
                <!-- Breed Crumbs -->
                <div class="breed-crumb-box">
                    <a href="{{url('/')}}"><i style="padding-right:10px;border-right:2px solid #282828;font-size:22px !important;color:#282828;" class="fa fa-home"></i></a>
                    @if(isset($cat_bred_title))
                        <a href="{{url('category/'.$cat_bred_title->cat_slug)}}">{{ucwords(str_slug($cat_bred_title->cat_title,' '))}}</a>
                        @if(isset($slug)) <a href="{{url('sub-category/'.$slug)}}" class="active">{{ucwords(str_slug($slug,' '))}}</a>@endif
                    
                    @else 

                        @if(isset($slug)) <a href="{{url('category/'.$slug)}}" class="active">{{ucwords(str_slug($slug,' '))}}</a>@endif

                    @endif
                     
                     
                    <!--<a href="">US CREATE & CLOSE MACHINE</a>
                    <a href="">DOSING DEVICES</a>
                    <a href="">CASE PACKERS</a> -->
                </div>
                <!--  Breed Crumbs -->
            </div>
        </div>

        @if(!empty($slider_categories))
        
        <!--  Banner Machines -->
        <div class="container-fluid bg-grey-lines" style="@if( isset($sliders) && !empty($sliders))background-image: url({{asset('/uploads/'.$sliders->s_background_image)}});@endif">
            <div class="my-container">

                <!-- -Slider -->
                <div id="cIndicators" class="carousel slide" data-ride="carousel">
                    <ol style="display:none;" class="carousel-indicators">
                        <li data-target="#cIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#cIndicators" data-slide-to="1"></li>
                        <li data-target="#cIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <?php $count = 0;?>
                        @forelse($slider_categories as $i)
                            @if($count == 0)
                                <div class="carousel-item active">
                                    <div class="banner-machine">
                                        <img src="{{asset('uploads/'.$i->s_main_image)}}" alt="">

                                        <!--<div class="flow-vertical">
                                            <div>
                                                <img src="{{asset('dist/imgs/packets/packet01.png')}}" alt="">
                                                <img src="{{asset('dist/imgs/packets/packet02.png')}}" alt="">
                                                <img src="{{asset('dist/imgs/packets/packet03.png')}}" alt="">
                                                <img src="{{asset('dist/imgs/packets/packet01.png')}}" alt="">
                                            </div>
                                        </div>-->

                                    </div>
                                </div>
                                <?php $count= 1;?>
                            @else
                                <div class="carousel-item">
                                    <div class="banner-machine">
                                        <img src="{{asset('uploads/'.$i->s_main_image)}}" alt="">

                                        <!--<div class="flow-vertical">
                                            <div>
                                                <img src="{{asset('dist/imgs/packets/packet01.png')}}" alt="">
                                                <img src="{{asset('dist/imgs/packets/packet02.png')}}" alt="">
                                                <img src="{{asset('dist/imgs/packets/packet03.png')}}" alt="">
                                                <img src="{{asset('dist/imgs/packets/packet01.png')}}" alt="">
                                            </div>
                                        </div>
-->
                                    </div>
                                </div>
                            @endif
                        @empty
                        @endforelse
                    </div>
                </div>
                <!-- -Slider -->


            </div>
        </div>
        @endif

        <!-- Banner Machines -->
            <!-- <div class="container-fluid " style="margin-top:15px;margin-bottom:15px;">
                <div class="container text-right">
                <form class="example" action="{{url('search')}}">{{csrf_field()}}
                  <input type="text" style="width:50%;" placeholder="Search short description here.." name="search">
                  <button type="submit" class="search-btn" value="Search">Search</button>
                </form>
            </div>
            </div> -->
        <!-- Multi Tabs Container -->
        <div class="container-fluid">
            <div class="my-container">

                <!-- Link Slider -->
                <div class="my-slider-container">

                    <div class="my-slider">
                        @if(isset($childcategories) && count($childcategories))
                            <div class="control-left-ts">
                                <i class="far fa-arrow-alt-circle-left"></i>
                            </div>
                        @endif    
                        <div class="scroll-container ">
                            <div class="scroll-items text-center">
                                @if(isset($childcategories))
                                    @forelse($childcategories as $i)
                                        
                                        <span class="seriesLinks" id="id{{$i->id}}" onclick="getThirdLevelThemeC({{$i->id}},'{{$i->cat_title}}')">{{strtoupper($i->cat_title)}}
                                        </span>
                                        
                                    @empty

                                    @endforelse
                                
                                @endif
                                
                            </div>
                        </div>
                        @if(isset($childcategories) && count($childcategories))
                            <div class="control-right-ts">
                                <i class="far fa-arrow-alt-circle-right"></i>
                            </div>
                        @endif
                    </div>
                </div>
                <!--Link Slider -->
                <div class="dynamic-container">

                    <!-- Dynamic Container -->
                    <div class="dc-inner liquid-series">
                        <!-- <h1 id="p_title">LIQUID SERIES</h1> -->

                        <div style="top: 0;bottom:0;left: 0;right: 0; position: fixed;background: black;opacity: 0.9;z-index: 9999;display:none ;" id="overlap">
                            <img src="{{asset('loader.gif')}}" style="width: 30%;position: absolute;left: 35%;top: 20%;"></div>
                        <div class="content" id="show_products" style="flex-direction:row !important">
                             <?php $count = true;?>
                            <!--Tab -->
                            
                            @forelse($products as $p)
                            <div class="tab">
                                <a href="{{asset('product/'.$p->p_slug)}}">
                                    <div class="image">
                                        <img src="{{asset('uploads/product/'.$p->p_main_image)}}" alt="">
                                    </div>
                                    <div ><h3>
                                    <?php 
                                $string = strip_tags($p->p_title);
                                if (strlen($string) > 30) {
                                    // truncate string
                                    $stringCut = substr($string, 0, 30);
                                    $endPoint = strrpos($stringCut, ' ');
                                
                                    //if the string doesn't contain any space then it will cut without word basis.
                                    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                    $string .= '...';
                                }
                                echo $string;
                               
                               ?>
                              </h3></div>
                              <div id="hide_catalogue">
                            <?php 
                                $string = strip_tags($p->p_short_desc);
                                if (strlen($string) > 70) {
                                    // truncate string
                                    $stringCut = substr($string, 0, 70);
                                    $endPoint = strrpos($stringCut, ' ');
                                
                                    //if the string doesn't contain any space then it will cut without word basis.
                                    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                    $string .= '...';
                                }
                                echo $string;
                               
                               ?>
                              </div>
                                </a>
                                <div class="button-box">
                                    <button><a style="font-size:12px;text-decoration:none;color:white;" href="{{asset('product/'.$p->p_slug)}}">View Details</a></button>
                                </div>
                                
                            </div>
                            @empty
                                {{-- <div class="alert alert-warning" style="text-align:center;"><p>No Record Found</p></div> --}}
                                 <div class="col-md-12 mt-4">
                                    <div class="alert alert-warning" style="text-align:center;"><p>Can't find machines here on this page? <a href="{{ url('category/machines') }}">Let's Go to the machines section.</a></a></p></div>
                                </div>
                            @endforelse    

                            <!-- -Tab -->

                        </div>
                    </div>
                   
                    <!-- Dynamic Container -->

                </div>
                                        <div class="row" id="pag">
                                            <div class="col-md-5"></div>
                            <div class="col-md-2 text-center">
                            <?php echo  $products->links(); ?>
                            </div>
                            <div class="col-md-12">
                                @if(!empty($cat_head)){{$cat_head->cat_desc}}@endif
                            </div>
                        <div class="col-md-5"></div>
                        </div>
            </div>
        </div>
        <!--  Multi Tabs Container -->

    </div>
    <!-- ///Changer-Conatiner\\\ -->
<script>


    function getThirdLevelThemeC(id,title)
    {
        $("#pag").hide();
        var url = "<?php echo url('/');?>";
        $.ajax({
          url: "{{url('/get_products')}}",
          type: 'POST',
          data: {id:id,_token:'{{ csrf_token() }}'},
           beforeSend:function(){
            $("#overlap").css('display','block');
            $("#overlap").addClass("fade in");
            $("#show_products").html(null);
          },
          success: function(res)
           {
                $("#overlap").css('display','none');
                if(res == 0)
                {
                    $("#show_products").append('<div class="alert alert-warning">No Record Found</div>');
                }
                else
                {
                    $.each(res[0],function(k,v){
                    var commodity = '';
                    $.each(res[1],function(comm,commv){
                        if(v.id == commv.p_id){
                        commodity += '<button><img src="'+url+'/uploads/commodity/'+commv.p_commodity_image+'"></button>'; 
                        }
                    });
                    var sochet = '';
                    $.each(res[2],function(soch,sochv){
                        if(v.id == sochv.p_id){
                        sochet += '<div class="sachet"><img src="'+url+'/uploads/sachet/'+sochv.p_sachet_image+'" alt=""></div>'; 
                                  
                        }
                    });
                    $("#p_title").html(title);
                    var cat_str = v.cat_title;
                    var cat_lw = cat_str.toLowerCase();
                    var cat_title = cat_lw.replace(/ /g, "-");

                    var str = v.p_title;
                    var lw = str.toLowerCase();
                    var title = lw.replace(/ /g, "-");
  
                    $("#show_products").append('<div class="tab">'+
                                '<a href="'+url+'/product/'+v.p_slug+'">'+
                                    '<div class="image">'+
                                        '<img src="'+url+'/uploads/product/'+v.p_main_image+'" alt="">'+
                                    '</div>'+
                                    '<h3>'+v.p_title+'</h3>'+
                                    '<p>'+v.p_short_desc+'</p>'+
                                '</a>'+
                                '<div class="button-box">'+
                                    '<a href="'+url+'/product/'+v.p_slug+'""><button style="cursor: pointer;">Learn More</button></a>'+
                                '</div>'+
                                '</div>'+

                        '</div>');
                      });
                }
           },
           error: function(res)
           {
            console.log(res);
           }
        });
    }
    
    
</script>
@else
    <!-- Four-Tabs -->
    <div class="container-fluid">
        <div class="my-container">
            <div class="top-tabs">
                    @forelse($subcategories as $i)
                        <div class="tab-sections horiFlowPack @if(isset($child_nav) && $child_nav == $i->id)active @endif" onclick="vertFlowPack();">
                        <div class="image">
                            <a href="{{asset('sub-category/'.$i->cat_slug)}}" id="{{$i->id}}"><img src="{{asset('uploads/'.$i->cat_icon)}}" alt=""></a>
                        </div>
                        <h6>{{$i->cat_title}}</h6>
                        </div>
                    @empty
                    <!--    <div class="alert alert-warning" style="text-align:center;"><p>No Record Found</p></div>-->
                    @endforelse
            </div>
        </div>
    </div>
    <!-- Four-Tabs -->

    <!-- ///Changer-Conatiner\\\ -->
    <div class="changer-box vertFlowPack">

        <div class="container-fluid bg-breed-crumb" style="background:#e2e2e2;">
            <div class="my-container">
                <!-- Breed Crumbs -->
                <div class="breed-crumb-box">
                    <a href="{{url('/')}}"><i style="padding-right:10px;border-right:2px solid #282828;font-size:22px !important;color:#282828;" class="fa fa-home"></i></a>
                    @if(isset($cat_bred_title) && $cat_bred_title != null)
                        <a href="{{url('category/'.$cat_bred_title->cat_slug)}}"> {{ucwords(str_slug($cat_bred_title->cat_title,' '))}}</a>
                        @if(isset($slug)) <a href="{{url('sub-category/'.$slug)}}" class="active">{{ucwords(str_slug($slug,' '))}}</a>@endif
                    
                    @else 

                        @if(isset($slug)) <a href="{{url('category/'.$slug)}}" class="active">{{ucwords(str_slug($slug,' '))}}</a>@endif

                    @endif
                                              
                     
                    <!--<a href="">US CREATE & CLOSE MACHINE</a>
                    <a href="">DOSING DEVICES</a>
                    <a href="">CASE PACKERS</a> -->
                </div>
                <!--  Breed Crumbs -->
            </div>
        </div>

        @if(!empty($slider_categories))
        
        <!--  Banner Machines -->
        <div class="container-fluid bg-grey-lines" style="@if( isset($sliders) && !empty($sliders))background-image: url({{asset('/uploads/'.$sliders->s_background_image)}});@endif">
            <div class="my-container">

                <!-- -Slider -->
                <div id="cIndicators" class="carousel slide" data-ride="carousel">
                    <ol style="display:none;" class="carousel-indicators">
                        <li data-target="#cIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#cIndicators" data-slide-to="1"></li>
                        <li data-target="#cIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <?php $count = 0;?>
                        @forelse($slider_categories as $i)
                            @if($count == 0)
                                <div class="carousel-item active">
                                    <div class="banner-machine">
                                        <img src="{{asset('uploads/'.$i->s_main_image)}}" alt="">

                                        <!--<div class="flow-vertical">
                                            <div>
                                                <img src="{{asset('dist/imgs/packets/packet01.png')}}" alt="">
                                                <img src="{{asset('dist/imgs/packets/packet02.png')}}" alt="">
                                                <img src="{{asset('dist/imgs/packets/packet03.png')}}" alt="">
                                                <img src="{{asset('dist/imgs/packets/packet01.png')}}" alt="">
                                            </div>
                                        </div>-->

                                    </div>
                                </div>
                                <?php $count= 1;?>
                            @else
                                <div class="carousel-item">
                                    <div class="banner-machine">
                                        <img src="{{asset('uploads/'.$i->s_main_image)}}" alt="">

                                        <!--<div class="flow-vertical">
                                            <div>
                                                <img src="{{asset('dist/imgs/packets/packet01.png')}}" alt="">
                                                <img src="{{asset('dist/imgs/packets/packet02.png')}}" alt="">
                                                <img src="{{asset('dist/imgs/packets/packet03.png')}}" alt="">
                                                <img src="{{asset('dist/imgs/packets/packet01.png')}}" alt="">
                                            </div>
                                        </div>-->

                                    </div>
                                </div>
                            @endif
                        @empty
                        @endforelse
                    </div>
                </div>
                <!-- -Slider -->


            </div>
        </div>
        @endif

        <!-- Banner Machines -->

        <!-- Multi Tabs Container -->
        <div class="container-fluid">
            <div class="my-container">

                <!-- Link Slider -->
                <div class="my-slider-container">

                    <div class="my-slider">
                        @if(isset($childcategories) && count($childcategories))
                            <div class="control-left-ts">
                                <i class="far fa-arrow-alt-circle-left"></i>
                            </div>
                        @endif    
                        <div class="scroll-container">
                            <div class="scroll-items text-center">
                                @if(isset($childcategories))
                                    @forelse($childcategories as $i)
                                        
                                        <span class="seriesLinks" id="id{{$i->id}}" onclick="getThirdLevel({{$i->id}},'{{$i->cat_title}}')">{{strtoupper($i->cat_title)}}
                                        </span>
                                        
                                    @empty

                                    @endforelse
                                
                                @endif
                                
                            </div>
                        </div>
                        @if(isset($childcategories) && count($childcategories))
                            <div class="control-right-ts">
                                <i class="far fa-arrow-alt-circle-right"></i>
                            </div>
                        @endif
                    </div>
                </div>
                <!--Link Slider -->
                <div class="dynamic-container">

                    <!-- Dynamic Container -->
                    <div class="dc-inner liquid-series">
                        <!-- <h1 id="p_title">LIQUID SERIES</h1> -->

                        <div style="top: 0;bottom:0;left: 0;right: 0; position: fixed;background: black;opacity: 0.9;z-index: 9999;display:none ;" id="overlap">
                            <img src="{{asset('loader.gif')}}" style="width: 30%;position: absolute;left: 35%;top: 20%;"></div>
                        <div class="content" id="show_products">
                             <?php $count = true;?>
                            <!--Tab -->
                            
                            @forelse($products as $p)
                        <div class="tab">
                                <a href="{{asset('product/'.$p->p_slug)}}">
                                    <div class="image">
                                        <img src="{{asset('uploads/product/'.$p->p_main_image)}}" alt="">
                                    </div>
                                    <h3>
                                         <?php 
                                            $string = strip_tags($p->p_title);
                                            if (strlen($string) > 50) {
                                                // truncate string
                                                $stringCut = substr($string, 0, 50);
                                                $endPoint = strrpos($stringCut, ' ');
                                            
                                                //if the string doesn't contain any space then it will cut without word basis.
                                                $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                $string .= '...';
                                            }
                                            echo $string;
                                           
                                           ?>
                                    </h3>
                                    <p>
                                         <?php 
                                            $string = strip_tags($p->p_short_desc);
                                            if (strlen($string) > 70) {
                                                // truncate string
                                                $stringCut = substr($string, 0, 70);
                                                $endPoint = strrpos($stringCut, ' ');
                                            
                                                //if the string doesn't contain any space then it will cut without word basis.
                                                $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                $string .= '...';
                                            }
                                            echo $string;
                                           
                                           ?>
                                    </p>
                                    <h4>Packaged Commodity:</h4>
                                </a>
                                <div class="button-box">
                                    <div class="btns">
                                            
                                        @forelse($commodity_images as $i)
                                            @if($p->id == $i->p_id)   
                                            <button><img src="{{asset('uploads/commodity/'.$i->p_commodity_image)}}" alt="" title="{{$i->commodity_name}}"></button>
                                            @endif
                                        @empty
                                            <!--<div class="alert alert-warning" style="text-align:center;"><p>No Record Found</p></div>-->
                                        @endforelse

                                    </div>
                                    <a href="{{asset('product/'.$p->p_slug)}}"><button>Learn More</button></a>
                                </div>
                                <div class="sachet-type">
                                    <h4>Sachet Type:</h4>
                                    <div class="sachets">
                                        @forelse($sachet_images as $i)
                                            @if($p->id == $i->p_id)
                                            <div class="sachet">
                                                <img src="{{asset('uploads/sachet/'.$i->p_sachet_image)}}" alt="" title="{{$i->sachet_title}}">
                                            </div>
                                            @endif
                                        @empty
                                            <!--<div class="alert alert-warning" style="text-align:center;"><p>No Record Found</p></div>-->
                                
                                        @endforelse
                                    </div>
                                </div>
                                </div>
                            @empty
                                <div class="alert alert-warning" style="text-align:center;"><p>No Record Found</p></div>
                            @endforelse    
                        <?php echo  $products->links(); ?>
                        
                       
                            <!-- -Tab -->

                        </div>
                    </div>
                   
                    <!-- Dynamic Container -->

                </div>
            </div>
        </div>
        <!--  Multi Tabs Container -->

    </div>
    <!-- ///Changer-Conatiner\\\ -->
    
<script>


    function getThirdLevel(id,title)
    {
        $("#pag").hide();
        var url = "<?php echo url('/');?>";
        $.ajax({
          url: "{{url('/get_products')}}",
          type: 'POST',
          data: {id:id,_token:'{{ csrf_token() }}'},
           beforeSend:function(){
            $("#overlap").css('display','block');
            $("#overlap").addClass("fade in");
            $("#show_products").html(null);
          },
          success: function(res)
           {
                $("#overlap").css('display','none');
                if(res == 0)
                {
                    $("#show_products").append('<div class="alert alert-warning">No Record Found</div>');
                }
                else
                {
                    $.each(res[0],function(k,v){
                    var commodity = '';
                    $.each(res[1],function(comm,commv){
                        if(v.id == commv.p_id){
                        commodity += '<button><img src="'+url+'/uploads/commodity/'+commv.p_commodity_image+'"></button>'; 
                        }
                    });
                    var sochet = '';
                    $.each(res[2],function(soch,sochv){
                        if(v.id == sochv.p_id){
                        sochet += '<div class="sachet"><img src="'+url+'/uploads/sachet/'+sochv.p_sachet_image+'" alt=""></div>'; 
                                  
                        }
                    });
                    $("#p_title").html(title);
                    var cat_str = v.cat_title;
                    var cat_lw = cat_str.toLowerCase();
                    var cat_title = cat_lw.replace(/ /g, "-");

                    var str = v.p_title;
                    var lw = str.toLowerCase();
                    var title = lw.replace(/ /g, "-");
  
                    $("#show_products").append('<div class="tab">'+
                                '<a href="'+url+'/product/'+v.p_slug+'">'+
                                    '<div class="image">'+
                                        '<img src="'+url+'/uploads/product/'+v.p_main_image+'" alt="">'+
                                    '</div>'+
                                    '<h3>'+v.p_title+'</h3>'+
                                    '<p>'+v.p_short_desc+'</p>'+
                                    '<h4>Packaged Commodity:</h4>'+
                                '</a>'+
                                '<div class="button-box">'+
                                    '<div class="btns">'+
                
                                        commodity+

                                    '</div>'+
                                    '<a href="'+url+'/product/'+v.p_slug+'""><button style="cursor: pointer;">Learn More</button></a>'+
                                '</div>'+
                                '<div class="sachet-type">'+
                                    '<h4>Sachet Type:</h4>'+
                                    '<div class="sachets">'+
                                        sochet+
                                            
                                    '</div>'+
                                '</div>'+
                                '</div>'+

                        '</div>');
                      });
                }
           },
           error: function(res)
           {
            console.log(res);
           }
        });
    }
    
    
</script>
<script>
$(document).ready(function(){
// this part disables the right click
$('img').on('contextmenu', function(e) {
return false;
});
//this part disables dragging of image
$('img').on('dragstart', function(e) {
return false;
});

});
  
</script>
@endif
@endsection
