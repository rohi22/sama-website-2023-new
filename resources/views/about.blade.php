@extends('master_layout')
@section('main')
<meta name="description" content="One of the best leading companies that are dealing with the manufacturing of High-Quality Packaging and Food Processing machinery and all types of Packaging services in Pakistan."/>
<meta name="robots" content="follow,index,"/>
<link rel="canonical" href="{{URL::current()}}" One of the best leading companies that are dealing with the manufacturing of High-Quality Packaging and Food Processing machinery and all types of Packaging services in Pakistan./>
@endsection

@section('og_page_wise')
<meta property="og:locale" content="en_PK">
<meta property="og:type" content="website">
<meta property="og:title" content="{!! $logos->meta_title !!}">
<meta property="og:description" content="One of the best leading companies that are dealing with the manufacturing of High-Quality Packaging and Food Processing machinery and all types of Packaging services in Pakistan.">
<meta property="og:url" content="{{URL::current()}}">
<meta property="og:site_name" content="SAMA ENGINEERING">
@endsection

@section('twitter')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{!! $logos->meta_title !!}">
<meta name="twitter:description" content="One of the best leading companies that are dealing with the manufacturing of High-Quality Packaging and Food Processing machinery and all types of Packaging services in Pakistan.">
<meta name="twitter:site" content="@InsectMarketing">
<meta name="twitter:creator" content="@InsectMarketing">
@endsection
@section('title')
    About Us -
@endsection
@section('content')
<style>
    @media  screen and (max-width: 600px) {
  #hide_catalogue {
    display:none;
  }
}
    @media  screen and (max-width: 600px) {
  .show_catalogue {
    display:block !important;
  }
}

@media  screen and (max-width: 600px) {
  .rempadmobile {
    padding:0px;
  }
}
.customheight{
    height:60px !important;
}
</style>
    <!-- Breadcrumb -->
    <div class="container-fluid bg-breed-crumb" style="background:#e2e2e2;">
        <div class="my-container" style="">
            <div class="breed-crumb-box">
                <a href="{{url('/')}}"><i style="border-right:2px solid black;padding-right:10px;" class="fa fa-home"></i></a>
                <a href="{{url('/about')}}" class="active">About Us </a>
            </div>
            <!-- Breed Crumbs -->
        </div>
    </div>
    <!-- ------------------------------------------ Section About -->
    <!-- -------------------------- Main-Heading -->
    <div class="container-fluid">
        <div class="my-container">
            <div style="padding:0px;" class="heading-contact-us">
                <h1 style="margin-top:30px;color:#282828 !important;"><?php echo $about->title; ?></h1>
            </div>
        </div>
    </div>
    <!-- -------------------------- Main-Heading -->

    <!-- -------------------------- Main-Heading -->
    <div class="container-fluid">
        <div class="my-container">
            <div class="row section-about">
                <div class="col-lg-5 show_catalogue" style="display:none;">
                    <div class="about-slider">
                        <div id="sliderAbout" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php $count = 1;?>
                                @forelse($images as $i)
                                    @if($count == 1)
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="{{asset('uploads/about/'.$i->about_image)}}" alt="First slide">
                                        </div>
                                        <?php $count = 0;?>
                                    @else
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="{{asset('uploads/about/'.$i->about_image)}}" alt="Second slide">
                                        </div>
                                    @endif
                                @empty
                                @endforelse
                               
                            </div>
                            <a class="carousel-control-prev" href="#sliderAbout" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#sliderAbout" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <p class="about-text">
                        <?php echo $about->desc; ?>
                    </p>
                </div>
                <div class="col-lg-5 hidedowncap">
                    <div class="about-slider">
                        <div id="sliderAbt" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php $count = 1;?>
                                @forelse($images as $i)
                                    @if($count == 1)
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="{{asset('uploads/about/'.$i->about_image)}}" alt="First slide">
                                        </div>
                                        <?php $count = 0;?>
                                    @else
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="{{asset('uploads/about/'.$i->about_image)}}" alt="Second slide">
                                        </div>
                                    @endif
                                @empty
                                @endforelse
                            </div>
                            <a class="carousel-control-prev" href="#sliderAbt" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#sliderAbt" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- -------------------------- Main-Heading -->

    <!-- ------------------------------------------ Section About -->
@endsection