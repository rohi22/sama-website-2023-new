@extends('master_layout')
@section('main')
<title>A Complete Guide with All Information | E-Catalogues | Sama Engineering</title>
<meta name="description" content=": E-catalogues are the detailed online booklets that consist of complete information plus specifications about every series of machines that Sama Engineering is manufacturing."/>
<meta name="robots" content="follow,index,"/>
<link rel="canonical" href="{{URL::current()}}" />
@endsection

@section('og_page_wise')
<meta property="og:locale" content="en_PK">
<meta property="og:type" content="website">
<meta property="og:title" content="A Complete Guide with All Information | E-Catalogues | Sama Engineering">
<meta property="og:description" content=": E-catalogues are the detailed online booklets that consist of complete information plus specifications about every series of machines that Sama Engineering is manufacturing.">
<meta property="og:url" content="{{URL::current()}}">
<meta property="og:site_name" content="SAMA ENGINEERING">
@endsection

@section('twitter')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="A Complete Guide with All Information | E-Catalogues | Sama Engineering">
<meta name="twitter:description" content=": E-catalogues are the detailed online booklets that consist of complete information plus specifications about every series of machines that Sama Engineering is manufacturing.">
<meta name="twitter:site" content="@InsectMarketing">
<meta name="twitter:creator" content="@InsectMarketing">
@endsection
@section('title')
A Complete Guide with All Information  -
@endsection
@section('content')
<style>
    @media  screen and (max-width: 600px) {
  #hide_catalogue {
    display:none;
  }
}
.customheight{
    height:60px !important;
}
@media screen and (max-width: 600px) {
  .ecatalog {
    width:50% !important;
  }
}
@media screen and (max-width: 600px) {
  .flag {
    font-size:1rem !important;
  }
}
@media screen and (max-width: 600px) {
  .machine-tab-2 {
    width:11rem !important;
    height:11rem !important;
  }
}
@media screen and (max-width: 600px) {
  .machine-tab-2 .image {
    width:11rem !important;
    height:11rem !important;
  }
}
</style>
    <div class="container-fluid bg-breed-crumb" style="background:#e2e2e2;">
        <div class="my-container" style="">
            <div class="breed-crumb-box">
                <a href="{{url('/')}}"><i style="border-right:2px solid black;padding-right:10px;" class="fa fa-home"></i></a>
                <a href="{{url('/e-catalogue')}}" class="active">E Catalogue</a>
            </div>
            <!-- Breed Crumbs -->
        </div>
    </div>
    <!-- -------------------------- Main-Heading -->
    <div class="container-fluid">
        <div class="my-container">
            <div class="heading-primary">
                <h1 style="padding-bottom:0px;"><span>E-</span>CATALOGUES</h1>
            </div>
        </div>
    </div>
    <!-- -------------------------- Main-Heading -->

    <!-- ---------------------------slider3 -->
    <div class="container-fluid">
        <div class="my-container">
            <div class="e-catalogue">
                <a class="ecatalog" href="{{url('/catalogs/index')}}" target="_blank">
                    <div class="machine-tab-2">
                        <div class="image">
                            <img src="{{asset('pharmaeuticalline/c1.webp')}}" alt="">
                        </div>
                        <span class="flag">Pharmaceutical Line</span>
                    </div>
                </a>
                <a class="ecatalog" href="{{url('/catalogs/snack-processing')}}" target="_blank">
                    <div class="machine-tab-2">
                        <div class="image">
                            <img src="{{asset('snackprocessingline/c3.webp')}}" alt="">
                        </div>
                        <span class="flag">Snack Processing Line</span>
                    </div>
                </a>
                <a class="ecatalog" href="{{url('/catalogs/bakery-series')}}" target="_blank">
                    <div class="machine-tab-2">
                        <div class="image">
                            <img src="{{asset('backeryseries/c2.webp')}}" alt="">
                        </div>
                        <span class="flag">Bakery Processing</span>
                    </div>
                </a>
                <a class="ecatalog" href="{{url('/catalogs/packaging-series')}}" target="_blank">
                    <div class="machine-tab-2">
                        <div class="image">
                            <img src="{{asset('packagingseries/c4.webp')}}" alt="">
                        </div>
                        <span class="flag">Packing Series</span>
                    </div>
                </a>
                <a class="ecatalog" href="{{url('/catalogs/kitchen-heart')}}" target="_blank">
                    <div class="machine-tab-2">
                        <div class="image">
                            <img src="{{asset('kitchenheart/c4.webp')}}" alt="">
                        </div>
                        <span class="flag">Kitchen Heart</span>
                    </div>
                </a>
                <a class="ecatalog" href="{{url('/catalogs/pick-fill-and-seal-machines')}}" target="_blank">
                    <div class="machine-tab-2">
                        <div class="image">
                            <img src="{{asset('doypack/c4.webp')}}" alt="">
                        </div>
                        <!--<span class="flag">Doypack</span>-->
                        <!--{{url('/catalogs/doypack ')}}-->
                        <span class="flag">Agriculture & Industrial Packing</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- ---------------------------slider3 -->
    <script>
    
        var mobo = 0;
        $(".mobo-menu .btn-box").click(function () {
            if (mobo == 0) {
                $(".menu-content").fadeIn(200);
                $(".dots").addClass("selected");

                mobo = 1;
            } else if (mobo == 1) {
                $(".menu-content").fadeOut(200);
                $(".dots").removeClass("selected");
                mobo = 0;
            }
        })
    </script>
@endsection