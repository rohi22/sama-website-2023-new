@extends('master_layout')
@section('main')
<meta name="description" content="{{$product->p_meta_desc}}"/>
@endsection
@section('og_product_wise')
<meta property="og:type" content="product.item">
<meta property="og:title" content="{{ucfirst($product->p_title)}} - SAMA ENGINEERING">
<meta property="og:url" content="{{URL::current()}}">
<meta property="og:image" content="{{asset('uploads/product/'.$product->p_og_img)}}">
<meta property="product:condition" content="new">
@endsection
@section('twitter')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ucfirst($product->p_title)}} - SAMA ENGINEERING">
<meta name="twitter:description" content="{{$product->p_meta_desc}}">
<meta name="twitter:site" content="@SAMAENGINEERING">
<meta name="twitter:creator" content="@SAMAENGINEERING">
@endsection
@section('title')
{{$data->cat_title}} - {{ucwords(str_slug($title,' '))}} -
@endsection

@section('content')
@if($p_mode == 1)

<style>

@media screen and (max-width: 600px) {
  h1 {
    font-size:20px!important;
  }
  
}.col-3{padding:0px;}.carousel-indicators li {
    box-sizing: content-box;
    flex: 0 1 auto;
    width: 30px;
    height: 3px;
    margin-right: 3px;
    margin-left: 3px;
    text-indent: -999px;
    cursor: pointer;
    background-color: #cf1d25;
    background-clip: padding-box;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    opacity: .5;
    transition: opacity 0.6s ease;
}.carousel-indicators {
    position: absolute;
    right: 0;
    bottom: -30px;
    left: 0;
    z-index: 15;
    display: flex;
    justify-content: center;
    padding-left: 0;
    margin-right: 15%;
    margin-left: 15%;
    list-style: none;
}
    @media  screen and (max-width: 600px) {
  #hide_catalogue {
    display:none;
  }
}
    @media  screen and (max-width: 600px) {
  #img-onpage {
    height:100%!important;
    width:100%!important;
  }
}
#img-onpage{
    height:80px!important;
    width:80px!important;
}
@media screen and (max-width: 600px) {
  .showmobile {
    display:block !important;
  }
}
.showmobile{
    display:none;
}
@media screen and (max-width: 600px) {
  .imgs {
    height:250px!important;
  }
  
  @media screen and (max-width: 600px) {
  .imgas {
    height:auto!important;
  }
  
}
@media screen and (max-width: 600px) {
  #showmob {
    display:block !important;
  }
}




.imgs{
    height:300px;width: 100%!important;
}

.product-preview-inner .row p{
    font-size:1.7rem !important;
}

</style>
    <!-- --------------------------------------------Preview -->
    <div class="container-fluid bg-breed-crumb" style="background:#e2e2e2;">
        <div class="my-container">
            <!-- ---------------- Breed Crumbs -->
            <div class="breed-crumb-box">
                <a href="{{url('/')}}"><i class="fa fa-home" style="padding-rightborder-right:1px solid #cf1d25;"></i></a>
               <!--  <a href="">HORIZONTAL FLOW PACKING</a> -->
                 @if(isset($data) && !empty($data))<a href="{{url('category/'.$data->cat_slug)}}">{{$data->cat_title}}</a>@endif
                @if(isset($title))<a href="{{url('product/'.$title)}}" class="active">{{ucwords(str_slug($title,' '))}}</a>@endif
<!--                 <a href="">DOSING DEVICES</a>
                <a href="">CASE PACKERS</a> -->
            </div>
            <!-- ---------------- Breed Crumbs -->
        </div>
    </div>

    <div class="container-fluid" style="margin-top:20px;">
        <div class="my-container">
            <div class="product-preview-inner">
{{-- text-align:left;line-height:1.5;font-size:2.2rem !important;color:#282828 !important; --}}
                <div class="row">
                    <div class="image-box showmobile">
                        <div class="image text-right">
                            <img src="{{asset('uploads/product/'.$product->p_main_image)}}" class="imgas img-thumbnail" alt="" style="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h1 class="heading-tab-preview" style="font-weight:900;padding-top:20px;padding-bottom:5px;">{{$product->p_title}}</h1>

                        <h2 style="font-weight:700;">APPLICATION:</h2>
                        <div class="description-box">
                        <p style="font-size:1.7rem"><?php echo $product->p_short_desc; ?></p>
                        </div>
                        <div class="" style="display:none;">
        @if(!empty($product->p_long_desc))<h2 style="font-weight:700;" class="heading-tab-preview">DESCRIPTION</h2>@endif
        <div class="description-box">
            <p style="font-size:1.7rem"> <?php echo $product->p_long_desc; ?></p>
        </div>
                        <div class="" style="display:none">
            
            @if(count($attributes))<h1 class="heading-tab-preview" style=" border-bottom: 2px solid grey;">SPECIFICATIONS</h1>@endif

            <div class="overflow-table-box">
                <div class="col-md-12">
                    <div class="row">
                        @forelse($attributes as $i)
                            <div class="col-md-4">
                                    <label><strong>{{$i->label}}</strong></label>
                                    <p>{{$i->name}}</p>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
               
    </div>

    <div class="">
        @if(!empty($product->p_long_desc))<h2 class="heading-tab-preview" style="font-weight:700; text-align:left;line-height:1.5;font-size:2.2rem !important;color:#282828 !important;">DESCRIPTION:</h2>@endif
        <div class="description-box">
            <?php echo $product->p_long_desc; ?>
        </div>
        
    </div>
     <style>
         .customheight{
    height:60px !important;
}
     </style>

<div id="demo" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ul class="carousel-indicators">
    @if($bag_images->count() > 4)
        @php $count = 1; @endphp
          @forelse($bag_images as $key=>$i)
            <li data-target="#demo" data-slide-to="0" @if($count == 1) class="active"  @php $count = 0; @endphp @endif></li>
        @empty
        @endforelse
    @endif
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    @php $count2 = 1;$check = 0; @endphp
  
    <div class="carousel-item @if($count2 == 1) active  @php $count2 = 0; @endphp @endif">
      <div class="row">
           @forelse($bag_images as $key=>$i)
           @if($check == 4) </div>
                    </div>
                    <div class="carousel-item"> 
                    <div class="row">
                        @php $check = 0; @endphp
            @endif
            <div class="col-md-3 col-3">
                <img src="{{asset('uploads/product/'.$i->p_bag_image)}}" style="width:100%;">    
            </div>
            @php ++$check; @endphp
             @empty
            @endforelse
        </div>
    </div>
  
  </div>
  
  <!-- Left and right controls -->
  <!--<a class="carousel-control-prev" href="#demo" data-slide="prev">-->
  <!--  <span class="carousel-control-prev-icon"></span>-->
  <!--</a>-->
  <!--<a class="carousel-control-next" href="#demo" data-slide="next">-->
  <!--  <span class="carousel-control-next-icon"></span>-->
  <!--</a>-->
</div>

</div>
<div class="col-md-6 hidedowncap">
    <div class="image text-center">
        <img src="{{asset('uploads/product/'.$product->p_main_image)}}" class="img-thumbnail" alt="" style="height:425px;">
    </div>
</div>
                </div>
            </div>
        </div>
    </div>

    <!--<div class="container-fluid text-center" style="padding-left:0px;padding-right:0px;">-->
    <!--    <h1 class="heading-tab-preview"><span style="background-color:#cf1d25;color:white;margin-bottom:0px;padding:5px;">MACHINE BAGS</span></h1>-->
    <!--</div>-->
    <!--<div class="container-fluid bg-m-bags">-->
    <!--    <div class="my-container">-->
    <!--        <div class="machine-bags">-->
    <!--            <div class="images">-->
    <!--                @forelse($bag_images as $i)-->
    <!--                    <div class="image">-->
    <!--                        <img src="{{asset('uploads/product/'.$i->p_bag_image)}}" alt="">-->
    <!--                    </div>-->
    <!--                @empty-->
    <!--                @endforelse-->
                    
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

    <div class="container-fluid hidedowncap" style="background-color: #e0e0e0;margin-top:20px;">
        <div class="my-container">
            <div class="yt-video-box">
                <div class="box-yt">
                    <div class="thumbnail">
                        <a href=""><i class="fa fa-youtube"></i></a>
                    </div>
                    <div class="info">
<!--{{$product->p_title}}-->
                        <h3>PLAY</h3><!--
                        <h5>TP-Series/Horizontal-Flow-Packing</h5>href="#myVideo"-->
                            <a data-toggle="modal" href="javascript:;" onclick="showMOdal()">Click here to watch video</a>
                    </div>
                </div>
                <div class="box-yt">
                    <div class="thumbnail">
                        <a href=""><i class="fa fa-download"></i></a>
                    </div>
                    <div class="info">
                        <h3>DOWNLOAD CATALOGUE</h3>
                        <!--<h5>Get the updated digital product detail</h5>-->
                        <a href="{{asset('uploads/pdf/'.$product->p_pdf)}}" download="{{$product->p_pdf}}">Click here to download the file</a>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
        <div class="container-fluid" id="showmob" style="margin-top:20px;display:none;background-color: #e0e0e0;">
        <div class="my-container">
            <div class="yt-video-box">
                <div class="box-yt" style="width:100% !important;">
                    <div class="thumbnail">
                        <a href=""><i style="margin-top:25px;" class="fa fa-youtube"></i></a>
                        <h3 style="font-weight:bold;margin-top:7px;">PLAY</h3>
                    </div>
                    <div class="thumbnail" style="margin-top:5px;">
                        <a href=""><i style="color:#e0e0e0;margin-left:30%;font-size:3rem;" class="fa fa-download"></i></a>
                        <h3 style="font-weight:bold;margin-left:20px;margin-top:5px;">DOWNLOAD</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="my-container">
            
            @if(count($attributes))<h1 class="heading-tab-preview" style="font-size:2.2rem !important;text-align:left;color:#282828 !important;margin-top:20px;">SPECIFICATIONS</h1>@endif

            <div class="overflow-table-box">
                <div class="col-md-12">
                    <div class="row">
                        @forelse($attributes as $i)
                            <div class="col-md-4">
                                    <label><strong>{{$i->label}}</strong></label>
                                    <p>{{$i->name}}</p>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <div class="my-container">
        <div class="col-md-12" style="margin-top: 10px;margin-bottom: 20px;">
        @if($tags->count())
            <h1 class="heading-tab-preview" style="text-align:left;line-height:1.5;font-size:2.2rem !important;color:#282828 !important;">Tags</h1>
        @endif
            @forelse($tags as $i)  
            <a href="{{url('tag/'.$i->gt_slug)}}" class="btn btn-lg btn-danger" style="margin:5px;">{{$i->gt_title}}</a>
            @empty
            @endforelse
    </div>
    </div>
    </div>
    <!-- --------------------------------------------Preview -->
@elseif($p_mode == 2)
     <style>
         .customheight{
    height:60px !important;
}
     </style>
        <!-- --------------------------------------------Preview -->
    <div class="container-fluid bg-breed-crumb" style="background:#e2e2e2;">
        <div class="my-container">
            <!-- ---------------- Breed Crumbs -->
            <div class="breed-crumb-box">
                <a href="{{url('/')}}"><i class="fa fa-home"></i></a>
               <!--  <a href="">HORIZONTAL FLOW PACKING</a> -->
                 @if(isset($data) && !empty($data))<a href="{{url('category/'.$data->cat_slug)}}">{{$data->cat_title}}</a>@endif
                @if(isset($title))<a href="{{url('product/'.$title)}}" class="active">{{ucwords(str_slug($title,' '))}}</a>@endif
<!--                 <a href="">DOSING DEVICES</a>
                <a href="">CASE PACKERS</a> -->
            </div>
            <!-- ---------------- Breed Crumbs -->
        </div>
    </div>

    <div class="container-fluid" style="margin-top:20px;">
        <div class="my-container">
            <div class="product-preview-inner">

                <div class="box">

                    <div class="text-box">
                        <h1 class="heading-tab-preview">{{$product->p_title}}</h1>

                        <h2>APPLICATION:</h2>
                        <p style="font-size:1.7rem"><?php echo $product->p_short_desc; ?></p>
                            <div class="col-md-12" style="margin-top: 20px;">
        @if($tags->count())
            <h1 class="heading-tab-preview" style="text-align:left;line-height:1.5;font-size:2.2rem !important;color:#282828 !important;">Tags</h1>
        @endif
            @forelse($tags as $i)  
            <a href="{{url('tag/'.$i->gt_slug)}}" class="btn btn-lg btn-danger" style="margin:5px;">{{$i->gt_title}}</a>
            @empty
            @endforelse
    </div>
                        <div class="" style="display:none;">
        @if(!empty($product->p_long_desc))<h1 class="heading-tab-preview">DESCRIPTION</h1>@endif
        <div class="description-box">
            <?php echo $product->p_long_desc; ?>
        </div>
                        <div class="" style="text-align:left;display:none">
            
            @if(count($attributes))<h1 class="heading-tab-preview">SPECIFICATIONS</h1>@endif

            <div class="overflow-table-box">
                <div class="col-md-12">
                    <div class="row">
                        @forelse($attributes as $i)
                            <div class="col-md-4">
                                    <label><strong>{{$i->label}}</strong></label>
                                    <p>{{$i->name}}</p>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
               
            </div>
        </div>
        
        
    </div>
                    </div>
                    <div class="image-box">
                        <div class="image">
                            <img src="{{asset('uploads/product/'.$product->p_main_image)}}" class="img-thumbnail" alt="" style="max-width: 100%">
                        </div>
                    </div>
                    
                
                
                
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid text-center" style="padding-left:0px;padding-right:0px;">
        <h1 class="heading-tab-preview"><span style="background-color:red;color:white;margin-bottom:0px;padding:5px;">MACHINE BAGS</span></h1>
    </div>
    <div class="container-fluid bg-m-bags">
        <div class="my-container">
            <div class="machine-bags">
                <div class="images">
                    <div id="demo" class="carousel slide" data-ride="carousel" style="
    padding: 10px 30px 10px 30px;
">
  <!-- Indicators -->
  <ul class="carousel-indicators">
    @if($bag_images->count() > 4)
        @php $count = 1; @endphp
          @forelse($bag_images as $key=>$i)
            <li data-target="#demo" data-slide-to="0" @if($count == 1) class="active"  @php $count = 0; @endphp @endif></li>
        @empty
        @endforelse
    @endif
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    @php $count2 = 1;$check = 0; @endphp
  
    <div class="carousel-item @if($count2 == 1) active  @php $count2 = 0; @endphp @endif">
      <div class="row">
           @forelse($bag_images as $key=>$i)
           @if($check == 4) </div>
                    </div>
                    <div class="carousel-item"> 
                    <div class="row">
                        @php $check = 0; @endphp
            @endif
            <div class="col-md-3 col-3">
                <img src="{{asset('uploads/product/'.$i->p_bag_image)}}" style="width:100%;height: 300px;padding: 30px;">    
            </div>
            @php ++$check; @endphp
             @empty
            @endforelse
        </div>
    </div>
  
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
                    
                </div>

            </div>
        </div>
    </div>

    </div>
    <!-- --------------------------------------------Preview -->
@else
     <style>
         .customheight{
    height:60px !important;
}
     </style>
<!--Snack Processing-->

    <!-- --------------------------------------------Preview -->
    <div class="container-fluid bg-breed-crumb" style="background:#e2e2e2;">
        <div class="my-container">
            <div class="tab-preview-inner">
                <!-- ---------------- Breed Crumbs --> 
                <div class="breed-crumb-box">
                <a href="{{url('/')}}"><i class="fa fa-home"></i></a>    
                @if(isset($data) && !empty($data))<a href="{{url('category/'.$data->cat_slug)}}">{{$data->cat_title}}</a>@endif
                @if(isset($title))<a href="" class="active">{{ucwords(str_slug($title,' '))}} </a>@endif
                
                  <!--   <a href="{{url('/')}}"><i class="fa fa-home"></i></a>
                    <a href="">MACHINE</a>
                    <a href="">HORIZONTAL FLOW PACKING</a>
                    <a href="" class="active"></a> -->
                </div>
                <!-- ---------------- Breed Crumbs -->
            </div>
        </div>
    </div>
    <div class="my-container col-md-12 text-center" style="display:noe">
            
<h1 style="margin-top:20px;margin-bottom:5px;color:#cf1d25;font-weight:700;">{{$product->p_title}}</h1>
        <!-- <h1 class="heading-tab-preview">MACHINE BAGS</h1> -->
    </div>
    <!-- --------------------------------------- Banner -->
    <style>
        @media screen and (max-width: 600px) {
  .showdowncap {
    display:block!important;
  }
}
.onpadding{
    padding: 60px 0px;
}
.onmargin{
    margin-bottom: 20px;
}
@media screen and (max-width: 600px) {
  .onpadding {
    padding:20px 0px !important;
  }.onmargin{
    margin-bottom: 0px !important;
}
}

    </style>
    <div class="container-fluid" style="margin-top:10px;">
    <div class="row">
        <div class="col-md-8 showdowncap" style="display:none;">
                    <div class="my-container">

            <!-- -----------------------------------------------------------------------------------------------------Slider -->
            <div id="cIndicators" class="carousel slide" data-ride="carousel">
                <ol style="display:none;" class="carousel-indicators">
                    <li data-target="#cIndicators" data-slide-to="0" class="active"></li>
<!--                     <li data-target="#cIndicators" data-slide-to="1"></li>
                    <li data-target="#cIndicators" data-slide-to="2"></li> -->
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="banner-machine">
                            <img src="{{asset('uploads/product/'.$product->p_main_image)}}" alt="">
                        </div>
                    </div>
                   <!--  <div class="carousel-item">
                        <div class="banner-machine">
                            <img src="https://via.placeholder.com/2000x600?" alt="">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="banner-machine">
                            <img src="https://via.placeholder.com/2000x600?" alt="">
                        </div>
                    </div> -->
                </div>


            </div>
            <!-- -----------------------------------------------------------------------------------------------------Slider -->


            <!-- <div class="banner-machine">
                <img src="https://via.placeholder.com/2000x600?" alt="">
            </div> -->
        </div>
        </div>
        <div class="col-md-4" style="display:none;">
            <h2 style="margin-top:20px;margin-bottom:5px;color:#cf1d25;font-weight:700;font-size:30px;">{{$product->p_title}}</h2>
            <h2 style="font-weight:bold;">APPLICATION</h2>
        </div>
        <div class="col-md-12 hidedowncap">
                    <div class="my-container">

            <!-- -----------------------------------------------------------------------------------------------------Slider -->
            <div id="cIndicators" class="carousel slide" data-ride="carousel">
                <ol style="display:none;" class="carousel-indicators">
                    <li data-target="#cIndicators" data-slide-to="0" class="active"></li>
<!--                     <li data-target="#cIndicators" data-slide-to="1"></li>
                    <li data-target="#cIndicators" data-slide-to="2"></li> -->
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="banner-machine">
                            <img src="{{asset('uploads/product/'.$product->p_main_image)}}" alt="">
                        </div>
                    </div>
                   <!--  <div class="carousel-item">
                        <div class="banner-machine">
                            <img src="https://via.placeholder.com/2000x600?" alt="">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="banner-machine">
                            <img src="https://via.placeholder.com/2000x600?" alt="">
                        </div>
                    </div> -->
                </div>


            </div>
            <!-- -----------------------------------------------------------------------------------------------------Slider -->


            <!-- <div class="banner-machine">
                <img src="https://via.placeholder.com/2000x600?" alt="">
            </div> -->
        </div>
        </div>
        <div class="col-md-12 onpadding">
            <div class="my-container onmargin" style="border-bottom:1px solid #e2e2e2;">
            <h1 class="heading-products " style="max-width:15rem;">PRODUCTS</h1>

        <!-- <h1 class="heading-tab-preview">MACHINE BAGS</h1> -->
    </div>
                  <div id="demo2" class="carousel slide my-container" data-ride="carousel">
  <!-- Indicators -->
  <ul class="carousel-indicators">
    @if($bag_images->count() > 4)
        @php $count = 1; @endphp
          @forelse($bag_images as $key=>$i)
            <li data-target="#demo2" data-slide-to="0" @if($count == 1) class="active"  @php $count = 0; @endphp @endif></li>
        @empty
        @endforelse
    @endif
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    @php $count2 = 1;$check = 0; @endphp
  
    <div class="carousel-item @if($count2 == 1) active  @php $count2 = 0; @endphp @endif">
      <div class="row">
           @forelse($bag_images as $key=>$i)
           @if($check == 4) </div>
                    </div>
                    <div class="carousel-item"> 
                    <div class="row">
                        @php $check = 0; @endphp
            @endif
            <div class="col-md-3 col-3">
                <img src="{{asset('uploads/product/'.$i->p_bag_image)}}" style="width:100%;">    
            </div>
            @php ++$check; @endphp
             @empty
            @endforelse
        </div>
    </div>
  
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo2" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo2" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
    <!--<div class="hidedowncap container-fluid bg-m-bags" style="border:none !important;">-->
    <!--    <div class="my-container">-->
    <!--        <div class="machine-bags">-->
    <!--            <div class="images">-->
      
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--<div class="showdowncap container-fluid bg-m-bags" style="border:none !important;">-->
    <!--    <div class="my-container">-->
    <!--        <div class="">-->
    <!--            <div class="" style="margin-left:-25px;display:flex;">-->
<!--                   <div id="demo3" class="carousel slide" data-ride="carousel">-->
  <!-- Indicators -->
<!--  <ul class="carousel-indicators">-->
<!--    @php $count = 1; @endphp-->
<!--      @forelse($bag_images as $key=>$i)-->
<!--        <li data-target="#demo3" data-slide-to="0" @if($count == 1) class="active"  @php $count = 0; @endphp @endif></li>-->
<!--    @empty-->
<!--    @endforelse-->
<!--  </ul>-->
  
  <!-- The slideshow -->
<!--  <div class="carousel-inner">-->
<!--    @php $count2 = 1;$check = 0; @endphp-->
  
<!--    <div class="carousel-item @if($count2 == 1) active  @php $count2 = 0; @endphp @endif">-->
<!--      <div class="row">-->
<!--           @forelse($bag_images as $key=>$i)-->
<!--           @if($check == 4) </div>-->
<!--                    </div>-->
<!--                    <div class="carousel-item"> -->
<!--                    <div class="row">-->
<!--                        @php $check = 0; @endphp-->
<!--            @endif-->
<!--            <div class="col-md-3 col-3">-->
<!--                <img src="{{asset('uploads/product/'.$i->p_bag_image)}}" style="width:100%;">    -->
<!--            </div>-->
<!--            @php ++$check; @endphp-->
<!--             @empty-->
<!--            @endforelse-->
<!--        </div>-->
<!--    </div>-->
  
<!--  </div>-->
  
  <!-- Left and right controls -->
<!--  <a class="carousel-control-prev" href="#demo3" data-slide="prev">-->
<!--    <span class="carousel-control-prev-icon"></span>-->
<!--  </a>-->
<!--  <a class="carousel-control-next" href="#demo3" data-slide="next">-->
<!--    <span class="carousel-control-next-icon"></span>-->
<!--  </a>-->
<!--</div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
        </div>
        
    </div>
    </div>
    <!-- --------------------------------------- Banner -->

    
    <div class="container-fluid hidedowncap" style="background-color: #e0e0e0;">
        <div class="my-container">
            <div class="yt-video-box">
                <div class="box-yt">
                    <div class="thumbnail">
                        <a href=""><i class="fa fa-youtube"></i></a>
                    </div>
                    <div class="info">
                        <h3>PLAY</h3>
                        <!--<h5>TP-Series/Horizontal-Flow-Packing</h5>-->
                        <a data-toggle="modal" href="javascript:;" onclick="showMOdal()">Click here to watch video</a>
                        
                    </div>
                </div>  
                <div class="box-yt">
                    <div class="thumbnail">
                        <a href=""><i class="fa fa-download"></i></a>
                    </div>
                    <div class="info">
                        <h3>DOWNLOAD CATALOGUE</h3>
                        <!--<h5>Get the updated digital product detail</h5>-->
                        <a class="hidedowncap" href="{{asset('uploads/pdf/'.$product->p_pdf)}}" download="{{$product->p_pdf}}">Click here to download the file</a>
                    </div>
                </div>
                <!-- <span class="box-download">
                    <a href=""><i class="fas fa-download"></i>Download Catalogue</a>
                </span> -->
            </div>
        </div>
    </div>
    
    <div class="showdowncap container-fluid" style="background-color: #e0e0e0;">
        <div class="my-container">
            <div class="yt-video-box">
                <div class="box-yt" style="width:100% !important;">
                    <div class="thumbnail">
                        <a href=""><i style="margin-top:25px;" class="fa fa-youtube"></i></a>
                        <h3 style="font-weight:bold;margin-top:7px;">PLAY</h3>
                    </div>
                    <div class="thumbnail" style="margin-top:5px;">
                        <a href=""><i style="margin-left:30%;font-size:3rem;" class="fa fa-download"></i></a>
                        <h3 style="font-weight:bold;margin-left:20px;margin-top:5px;">DOWNLOAD</h3>
                    </div>

                </div>
            </div>
        </div>
    </div>

    
    <div class="container-fluid" style="margin-top:20px;">
        <div class="my-container pb-5" style="padding-bottom:0rem !important;">
            @if(!empty($product->p_long_desc))<h1 style="text-align:left;color:#cf1d25;" class="heading-tab-preview">DESCRIPTION</h1>@endif
            <div class="description-box">
                <?php echo $product->p_long_desc; ?>
            </div>  
        </div>
        <div class="my-container">
            @if(count($attributes))<h1 class="heading-tab-preview" style="color:#cf1d25;margin-top:20px;text-align:left;">SPECIFICATIONS</h1>@endif

            <div class="overflow-table-box">
                <div class="col-md-12">
                    <div class="row">
                        @forelse($attributes as $i)
                                <div class="col-md-4">
                                    <label><strong>{{$i->label}}</strong></label>
                                    <p>{{$i->name}}</p>
                                </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="my-container">
            <div class="col-md-12" style="margin-top: 20px;margin-bottom: 20px;">
        @if($tags->count())
            <h1  class="heading-tab-preview" style="color:#cf1d25;margin-top:20px;text-align:left;">Tags</h1>
        @endif
            @forelse($tags as $i)  
            <a href="{{url('tag/'.$i->gt_slug)}}" class="btn btn-lg btn-danger" style="margin:5px;">{{$i->gt_title}}</a>
            @empty
            @endforelse
    </div>
        </div>
    </div>
    
    </div>
    <!-- --------------------------------------------Preview -->

@endif

<div class="modal" id="myVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Video</h5>
        <button type="button" onclick= "hideMOdal()" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="row" id="show_gallery">
           <iframe id ="productvideo" width="560" height="315" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="modal_close" onclick= "hideMOdal()" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
function showMOdal(){
    $('#myVideo').show();
    $('#productvideo').attr("src", "{{$product->p_video_link}}");
}
function hideMOdal(){
    $('#productvideo').attr('src', '');
    $('#myVideo').hide();
}

$(document).ready(function(){
  if(!$('#myVideo').hasClass('show')){
    $('#productvideo').attr('src', ' ');
  }  
});


  
</script>

@endsection
