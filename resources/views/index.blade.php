@extends('master_layout')
@section('main')
<meta name="description" content="{!! $logos->meta_desc !!}"/>
<meta name="robots" content="follow,index,"/>
<link rel="canonical" href="{{URL::current()}}" />
@endsection

@section('og_page_wise')
<meta property="og:locale" content="en_PK">
<meta property="og:type" content="website">
<meta property="og:title" content="{!! $logos->meta_title !!}">
<meta property="og:description" content="{!! $logos->meta_desc !!}">
<meta property="og:url" content="{{URL::current()}}">
<meta property="og:site_name" content="SAMA ENGINEERING">
@endsection

@section('twitter')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{!! $logos->meta_title !!}">
<meta name="twitter:description" content="{!! $logos->meta_desc !!}">
<meta name="twitter:site" content="@InsectMarketing">
<meta name="twitter:creator" content="@InsectMarketing">
@endsection
@section('content')

<style>
.sb{ 
    padding:7.2px !important;
}
@media screen and (max-width: 600px) {
  #paddingmobile {
    padding:0px !important;
    margin:10px !important;
  }
}
    .flag {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis; 
    max-width: 25ch;
}
#more {display: none;}

.btnMore{
    font-size: 50px;width: 100px;background: none;border: none;
}
.btnMore:focus{
    font-size: 50px;width: 100px;background: none;border: none;
}
p{
    font-family: Helvetica;
}
.opacity8{
        opacity: 0.6;
}

</style>    
    <!-- --------------------------------------------Hero -->

    @include('slider')

    <!-- --------------------------------------------Hero -->

    <!-- -------------------------- Main-Heading -->
    <div class="container-fluid">
        <div class="my-container">
            <div class="heading-primary">
                <h1 id="paddingmobile" style="margin-top:20px !important;padding-top: 0px !important;">MACHINES</h1>
            </div>
        </div>
    </div>
    <!-- -------------------------- Main-Heading -->

    <!-- ---------------------------Slider-1 -->
    <div class="container-fluid bg-split-grey" id="hide_catalogue" style="width:1583px;height:350px;">
        <div class="my-container">

            <div id="home-slider-1">
                <div class="MS-content">
                    @forelse($home_machine_slider as $i)
                        <div class="item" style="padding-left:0px;padding-right:0px;">
                            <a href="{{asset('product/'.$i->p_slug)}}">
                                <div class="machine-tab" style="">
                                    <div class="image">
                                        <img style="background-size:cover;height:85%;width:100%;object-fit:fill;" src="{{asset('uploads/product/'.$i->p_main_image)}}" alt="" width="230" height="250" />
                                    </div>
                                    <span class="flag" style="margin-top:-20px;margin-bottom:-10px;">{{$i->p_title}}</span>
                                </div>
                            </a>
                        </div>
                    @empty
                    @endforelse
                    
                </div>
                <div class="MS-controls">
                    <button class="MS-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    <button class="MS-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="my-container">
            <div class="row" style="display:none" id="show_catalogue">
                    <?php $count = 0;?>
                    @forelse($home_machine_slider as $i)
                      @if($count == 4) @break @endif
                      <div class="my-col-xs-6 col-6 text-center" style="float:left;padding:10px;min-height: 160px;">
                        
                          <a href="{{asset('product/'.$i->p_slug)}}">
                          <img style="margin-top:4px;box-shadow:0 7px 16px rgba(0,0,0,0.4);max-height:100px;object-fit:fill;" src="{{asset('uploads/product/'.$i->p_main_image)}}" width="100%" />
                          </a>
                      </div>
                      <?php ++$count;?>
                    @empty
                    @endforelse
                </div>
        </div>
    </div>
    <!-- ---------------------------Slider-1 -->

    <!-- -------------------------- Main-Heading -->
    <div class="container-fluid">
        <div class="my-container">
            <div id="paddingmobile" class="heading-primary">
                <h1 id="paddingmobile">PROCESSING LINE</h1>
            </div>
        </div>
    </div>
    <!-- -------------------------- Main-Heading -->

    <!-- ---------------------------Slider-2 -->
    <div class="container-fluid bg-split-red">
        <div class="my-container" style="padding-top:15px;padding-bottom:15px;">
            <div id="carouselExampleControls" class="carousel slide" data-interval="2000" data-ride="carousel">
              <div class="carousel-inner text-center">
                <div class="carousel-item active">
                      <a href="https://www.samaengineering.com/product/2d-3d-pellet-fryum-processing-line"><img id="processing-line" class="machine-tab-custom" style="box-shadow: 0px 0px 10px 2px #333;margin: 1rem auto;width:70%;height:280px;object-fit:fill;" 
                            src="{{asset('dist/imgs/banners/2d-&-3d-pellet-fryum-processing-line.webp')}}" alt="First slide" width="959" height="280" />
                      </a>
                      <div class="carousel-caption d-none d-md-block">
                        <!--<p><span id="fflag">{{$i->p_title}} title</span></p>-->
                      </div> 
                    </div>
                    
                    <div class="carousel-item">
                      <a href="{{url('/product/bread-crumbpankotempura-line')}}"><img id="processing-line" class="machine-tab-custom" style="box-shadow: 0px 0px 10px 2px #333;margin: 1rem auto;width:70%;height:280px;object-fit:fill;" src="{{asset('dist/imgs/banners/bread-crumb-panko-tempura-line.webp')}}" alt="First slide"  width="959" height="280" />
                      </a>
                    </div>
                    <div class="carousel-item">
                      <a href="{{url('/product/potato-chips-french-fries-line')}}"><img id="processing-line" class="machine-tab-custom" style="box-shadow: 0px 0px 10px 2px #333;margin: 1rem auto;width:70%;height:280px;object-fit:fill;" 
                      src="{{asset('dist/imgs/banners/potato-chips-french-fries-line.webp')}}" alt="First slide"  width="959" height="280" />
                      </a>
                    </div>
                    <div class="carousel-item">
                      <a href="{{url('/product/cheetos-kurkure-nik-nak-processing-line')}}"><img id="processing-line" class="machine-tab-custom" style="box-shadow: 0px 0px 10px 2px #333;margin: 1rem auto;width:70%;height:280px;object-fit:fill;" src="{{asset('dist/imgs/banners/cheetos-kurkure-nik-nak-processing-line.webp')}}" alt="First slide" width="959" height="280" />
                      </a>
                    </div>
                    <div class="carousel-item">
                      <a href="{{url('/product/direct-puffcore-filled-snack-line')}}"><img id="processing-line" class="machine-tab-custom" style="box-shadow: 0px 0px 10px 2px #333;margin: 1rem auto;width:70%;height:280px;object-fit:fill;" src="{{asset('dist/imgs/banners/direct-puff-core-filled-snack-line.webp')}}" alt="First slide" width="959" height="280" />
                      </a>
                    </div>
                    <div class="carousel-item">
                      <a href="{{url('/product/doritos-tortilla-corn-chip-processing-line')}}"><img id="processing-line" class="machine-tab-custom" style="box-shadow: 0px 0px 10px 2px #333;margin: 1rem auto;width:70%;height:280px;object-fit:fill;" src="{{asset('dist/imgs/banners/doritos-tortilla-corn-chip-processing-line.webp')}}" alt="First slide" width="959" height="280" />
                      </a>
                    </div>
                    <div class="carousel-item">
                      <a href="{{url('/product/fried-wheat-flour-processing-line')}}"><img id="processing-line" class="machine-tab-custom" style="box-shadow: 0px 0px 10px 2px #333;margin: 1rem auto;width:70%;height:280px;object-fit:fill;" src="{{asset('dist/imgs/banners/fried-wheat-flour-processing-line.webp')}}" alt="First slide" width="959" height="280" />
                      </a>
                    </div>
                    
                    <div class="carousel-item">
                      <a href="{{url('/product/high-moisture-tvp-tsp-soya-protien-line')}}"><img id="processing-line" class="machine-tab-custom" style="box-shadow: 0px 0px 10px 2px #333;margin: 1rem auto;width:70%;height:280px;object-fit:fill;" src="{{asset('dist/imgs/banners/high-moisture-tvp-tsp-soya-protien-line.webp')}}" alt="First slide" width="959" height="280" />
                      </a>
                    </div>
                    <div class="carousel-item"> 
                      <a href="{{url('/product/nuts-roaster-line')}}"><img id="processing-line" class="machine-tab-custom" style="box-shadow: 0px 0px 10px 2px #333;margin: 1rem auto;width:70%;height:280px;object-fit:fill;" src="{{asset('dist/imgs/banners/nuts-roaster-line.webp')}}" alt="First slide" width="959" height="280" />
                      </a>
                    </div>
                    <div class="carousel-item">
                      <a href="{{url('/product/pet-food-animal-feed-line')}}"><img id="processing-line" class="machine-tab-custom" style="box-shadow: 0px 0px 10px 2px #333;margin: 1rem auto;width:70%;height:280px;object-fit:fill;" src="{{asset('dist/imgs/banners/pet-food-animal-feed-line.webp')}}" alt="First slide" width="959" height="280" />
                      </a>
                    </div>
                    <div class="carousel-item">
                      <a href="{{url('/product/popcorn-processing-line')}}"><img id="processing-line" class="machine-tab-custom" style="box-shadow: 0px 0px 10px 2px #333;margin: 1rem auto;width:70%;height:280px;object-fit:fill;" src="{{asset('dist/imgs/banners/popcorn-processing-line.webp')}}" alt="First slide" width="959" height="280" />
                      </a>
                    </div>
              </div>
              <style>
                @media screen and (max-width: 600px) {
                  .fa-angle-left {
                    font-size:35px !important;
                    opacity:1;
                    color:black;
                  }
                }
                @media screen and (max-width: 600px) {
                  .fa-angle-right {
                    font-size:35px !important;
                    opacity:1;
                    color:black;
                  }
                }
                  .fa-angle-left{
                      color:white;font-size:80px;
                  }
                  .fa-angle-right{
                      color:white;font-size:80px;
                  }
              </style>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
              </a>
            </div>

        </div>
    </div>
    <!-- ---------------------------Slider-2 -->

    <!-- -------------------------- Main-Heading -->
    <div class="container-fluid">
        <div class="my-container">
            <div class="heading-primary">
                <h1 id="paddingmobile">E-CATALOGUES</h1>
            </div>
        </div>
    </div>
    
    
    <!-- -------------------------- Main-Heading --> 
<style>
    @media screen and (max-width: 600px) {
  #hide_catalogue {
    display:none;
  }
}
@media screen and (max-width: 600px) {
  #show_catalogue {
    display:block !important;
  }
}
@media screen and (max-width: 600px) {
  .my-col-xs-6 {
   width:49%;
   
  }
}
.btn-maan{
    color:white;
    background-color:#cf1d25;
    border:none;
    width:100%;
    padding-top:5px;
    padding-bottom:5px;
    padding-left:20px;
    padding-right:20px;
    display:block;
}
</style>

    <!-- ---------------------------slider3 -->
    <div class="container-fluid" id="hide_catalogue">
        <div class="my-container">
            <div class="e-catalogue">
                <a class="ecatalog" href="{{url('/catalogs/index')}}" target="_blank">
                    <div class="machine-tab-2">
                        <div class="image">
                            <img src="{{asset('pharmaeuticalline/c1.webp')}}" alt="" width="230" height="200" />
                        </div>
                        <span class="flag">Pharmaceutical Line</span>
                    </div>
                </a>
                <a class="ecatalog" href="{{url('/catalogs/snack-processing')}}" target="_blank">
                    <div class="machine-tab-2">
                        <div class="image">
                            <img src="{{asset('snackprocessingline/c3.webp')}}" alt="" width="230" height="200" />
                        </div>
                        <span class="flag">Snack Processing Line</span>
                    </div>
                </a>
                <a class="ecatalog" href="{{url('/catalogs/bakery-series')}}" target="_blank">
                    <div class="machine-tab-2">
                        <div class="image">
                            <img src="{{asset('backeryseries/c2.webp')}}" alt="" width="230" height="200" />
                        </div>
                        <span class="flag">Bakery Processing</span>
                    </div>
                </a>
                <a class="ecatalog" href="{{url('/catalogs/packaging-series')}}" target="_blank">
                    <div class="machine-tab-2">
                        <div class="image">
                            <img src="{{asset('packagingseries/c4.webp')}}" alt="" width="230" height="200" />
                        </div>
                        <span class="flag">Packing Series</span>
                    </div>
                </a>
                <a class="ecatalog" href="{{url('/catalogs/kitchen-heart')}}" target="_blank">
                    <div class="machine-tab-2">
                        <div class="image">
                            <img src="{{asset('kitchenheart/c4.webp')}}" alt="" width="230" height="200" />
                        </div>
                        <span class="flag">Kitchen Heart</span>
                    </div>
                </a>
                <a class="ecatalog" href="{{url('/catalogs/pick-fill-and-seal-machines')}}" target="_blank">
                    <div class="machine-tab-2">
                        <div class="image">
                            <img src="{{asset('doypack/c4.webp')}}" alt="" width="230" height="200" />
                        </div>
                        <!--<span class="flag">Doypack</span>-->
                        <!--{{url('/catalogs/doypack ')}}-->
                        <span class="flag">Agriculture & Industrial Packing</span>
                    </div>
                </a>
            </div>
            
            
            <!--<div class='row' id="home-slider-3">-->
            <!--    <div class='col-md-2'>-->
            <!--         <div class="item">-->
            <!--            <a href="{{url('/catalogs/index')}}" target="_blank">-->
            <!--                <div class="machine-tab-2" style="">-->
            <!--                    <div class="image" >-->
            <!--                <img style="" src="{{asset('pharmaeuticalline/c1.webp')}}" alt="">-->
            <!--            </div>-->
            <!--            <span class="flag" style="margin-bottom:-8px;">Pharmaceutical Line</span>-->
            <!--                </div>-->
            <!--            </a>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--    <div class='col-md-2'>-->
            <!--        <div class="item">-->
            <!--            <a href="{{url('/catalogs/snack-processing')}}" target="_blank">-->
            <!--                <div class="machine-tab-2" style="">-->
            <!--                    <div class="image">-->
            <!--                <img style="" src="{{asset('snackprocessingline/c3.webp')}}" alt="">-->
            <!--            </div>-->
            <!--            <span class="flag" style="margin-bottom:-8px;">Snack Processing Line</span>-->
            <!--                </div>-->
            <!--            </a>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--    <div class='col-md-2'>-->
            <!--        <div class="item">-->
            <!--            <a href="{{url('/catalogs/bakery-series')}}" target="_blank">-->
            <!--                <div class="machine-tab-2" style="">-->
            <!--                  <div class="image">-->
            <!--                <img style="" src="{{asset('backeryseries/c2.webp')}}" alt="">-->
            <!--            </div>-->
            <!--            <span class="flag" style="margin-bottom:-8px;">Bakery Processing</span>-->
            <!--                </div>-->
            <!--            </a>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--    <div class='col-md-2'>-->
            <!--        <div class="item">-->
            <!--            <a href="{{url('/catalogs/packaging-series')}}" target="_blank">-->
            <!--                <div class="machine-tab-2" style="">-->
            <!--                   <div class="image">-->
            <!--                <img style="" src="{{asset('packagingseries/c4.webp')}}" alt="">-->
            <!--            </div>-->
            <!--            <span class="flag" style="margin-bottom:-8px;">Packaging Series</span>-->
            <!--                </div>-->
            <!--            </a>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--    <div class='col-md-2'>-->
            <!--          <div class="item">-->
            <!--            <a href="{{url('/catalogs/kitchen-heart')}}" target="_blank">-->
            <!--                <div class="machine-tab-2" style="">-->
            <!--                   <div class="image">-->
            <!--                <img style="" src="{{asset('kitchenheart/c4.webp')}}" alt="">-->
            <!--            </div>-->
            <!--            <span class="flag" style="margin-bottom:-8px;">Kitchen Heart</span>-->
            <!--                </div>-->
            <!--            </a>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--    <div class='col-md-2'>-->
            <!--        <div class="item">-->
            <!--            <a href="{{url('/catalogs/pick-fill-and-seal-machines')}}" target="_blank">-->
            <!--                <div class="machine-tab-2" style="">-->
            <!--                   <div class="image">-->
            <!--                <img style="" src="{{asset('doypack/c4.webp')}}" alt="">-->
            <!--            </div>-->
            <!--            <span class="flag" style="margin-bottom:-8px;">Pick Fill and Seal Machines</span>-->
            <!--                </div>-->
            <!--            </a>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div id="home-slider-3" >-->
                <!--<div class="MS-content">-->
                   
                    
                    
                    
                  
                    
                <!--</div>-->
                <!--<div class="MS-controls">-->
                <!--    <button class="MS-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>-->
                <!--    <button class="MS-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>-->
                <!--</div>-->
            <!--</div>-->

        </div>
    </div>
    
        <div class="container-fluid">
        <div class="my-container">
            <!--<div class="heading-primary">-->
            <!--    <h1><span>E-</span>CATALOGUES</h1>-->
            <!--</div>--> 
            <div class="row">
                <div class="row" style="margin-bottom:20px;display:none" id="show_catalogue">
                  
                    <div class="my-col-xs-6 text-center" style="float:left;padding:10px;">
                        <h3 style="font-weight:500;font-size:14px;">Pharmaceutical Line</h3>
                        <a href="{{url('/catalogs/index')}}" target="_blank">
                        <img style="box-shadow:0 7px 16px rgba(0,0,0,0.4);" src="{{asset('pharmaeuticalline/c1.webp')}}" width="150">
                        </a>
                    </div>
                 
                    <div class="my-col-xs-6 text-center" style="float:left;padding:10px;">
                        <h3 style="font-weight:500;font-size:14px;">Snack Processing Line</h3>
                        <a href="{{url('/catalogs/snack-processing')}}" target="_blank">
                        <img style="box-shadow:0 7px 16px rgba(0,0,0,0.4);" src="{{asset('snackprocessingline/c3.webp')}}" width="150">
                        </a>
                    </div>
                    <div class="my-col-xs-6 text-center" style="float:left;padding:10px;">
                        <h3 style="font-weight:500;font-size:14px;">Bakery Processing</h3>
                        <a href="{{url('/catalogs/bakery-series')}}" target="_blank">
                        <img style="box-shadow:0 7px 16px rgba(0,0,0,0.4);" src="{{asset('backeryseries/c2.webp')}}" width="150">
                        </a>
                    </div>
                    <div class="my-col-xs-6 text-center" style="float:left;padding:10px;">
                        <h3 style="font-weight:500;font-size:14px;">Packaging Series</h3>
                        <a href="{{url('/catalogs/packaging-series')}}" target="_blank">
                        <img style="box-shadow:0 7px 16px rgba(0,0,0,0.4);" src="{{asset('packagingseries/c4.webp')}}" width="150">
                        </a>
                    </div>
                     <div class="my-col-xs-6 text-center" style="float:left;padding:10px;">
                        <h3 style="font-weight:500;font-size:14px;">Kitchen Heart</h3>
                        <a href="{{url('/catalogs/packaging-series')}}" target="_blank">
                        <img style="box-shadow:0 7px 16px rgba(0,0,0,0.4);" src="{{asset('kitchenheart/c4.webp')}}" width="150">
                        </a>
                    </div>
                     <div class="my-col-xs-6 text-center" style="float:left;padding:10px;">
                        <h3 style="font-weight:500;font-size:14px;">Doypack</h3>
                        <a href="{{url('/catalogs/packaging-series')}}" target="_blank">
                        <img style="box-shadow:0 7px 16px rgba(0,0,0,0.4);" src="{{asset('doypack/c4.webp')}}" width="150">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="container-fluid shownBlock opacity8" style="font-family:Times New Roman;display:noe !important;">
        <p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">Sama Engineering is a name that is known in the market as the premium quality machine manufacturers. It provides services regarding the packaging of the numerous kinds of products using the ultimate and uniquely designed machines as well as the selling of <strong>Packaging Machines</strong>, <strong>Food Processing System</strong> by highly equipped and efficient machines, and <strong>Pharmaceutical Line</strong> solutions via exceptional and useful built-in features of the machines.</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">Sama is ranking no. 1 among all of its competitors throughout Pakistan. It is a Karachi based company. However, it is dealing with high quality, huge and heavy-duty machines all over Pakistan. All the machines offering here are tremendously used by industries that are involved in the production of different processed foods, packaging of all kinds of products, and pharmacy-related business daily to meet the targets of bulk quantity with efficient end-user outputs. Our highly satisfied clients belong to the well-known industries that are using Sama Engineering&rsquo;s numerous equipment for a long time with remarkable reviews and will remain on the list of our valued customers.</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">We aim to provide our customers with the best quality packaging services. We are offering all kinds of packaging, cartooning, and wrapping services for our clients with high-level satisfaction standards using the different <strong>Packaging Machines</strong>, <strong>Cartooning Machines,&nbsp;</strong>and wrapping machines respectively. Furthermore, all of the packaging procedures are taken place professionally through various step by step processes under the supervision of our highly experienced, talented, skilled, trained and expert staff members who are contributing and playing their best efforts to meet the needs and fulfill all the requirements of the clients or customers for the better growth of the company.</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>

    </div>
    
    
    <div class="container-fluid" style="font-family:Times New Roman;" id="more">
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">Moreover, for providing the packaging services, Sama Engineering has a wide collection of different types of machines in this regard. Despite using the same machine for a different type of packaging, Sama has innovatively introduced and created many different high-quality machines for every other different kind of packaging to obtain the accurate and genuine final results that completely satisfy the customers.</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">The packaging of every other product purely depends upon the nature of the product. Some products are safe in normal quality material and use little budget while on the other hand some other products are required to pack in multiple layers due to their sensitive and delicate nature.</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">Few of the machines among the huge <strong>Packaging Machines&nbsp;</strong>collection that is amazingly designed and launched by Sama Engineering are as follows:</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:18.0pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><strong><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">o) Milk Packing Machine In Pakistan</span></strong></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:18.0pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><strong><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">o) Sachet Packing Machine</span></strong></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:18.0pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><strong><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">o) &nbsp;Milk Packaging Machine</span></strong></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:18.0pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><strong><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">o) Nimco Packing Machine</span></strong></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:18.0pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><strong><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">o) Sachet Multi Lane Machine</span></strong></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">and many more that are extremely efficient and works at a super quick speed that saves time and labor costs. This collection is a combination of automatic and semi-automatic machines with the latest technology-based operating systems.</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">This range also includes multiple <strong>Cartooning Machines&nbsp;</strong>and wrapping machines as well that work according to the product&#39;s and client&#39;s requirements.</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">Now, in addition to the above description of Sama Engineering here we would like to add the discussion about this company&rsquo;s machine manufacturing range and services.</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">We are providing the brilliant quality and international standards-based complete range of <strong>Packaging Machines,&nbsp;</strong>Food<strong>&nbsp;Processing Line,&nbsp;</strong>and <strong>Pharmaceutical Line.</strong></span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><strong><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">Food Processing System</span></strong><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;includes a wide variety of machines that works perfectly without any damage. Each process is highly hygienic and it produces super delicious and extra divine quality fresh products that further processed for packaging services to provide the safety and security to the products. They are uniquely designed and loaded with simple cum smart features that enable the machine to give an outstanding output at a rapid speed to produce the products in a bulk quantity that easily meet the daily targets.</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">A few of the food processing range of series that are also contains further machines within its category are as follows:</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><strong><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></strong></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><strong><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp; &nbsp; &nbsp; o) Snack Processing Line</span></strong></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp; &nbsp; &nbsp; <strong>o) Processing Line</strong></span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp; &nbsp; &nbsp; <strong>o) Bakery Series</strong></span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp; &nbsp; &nbsp; <strong>o) Namkeen Baking Machine,&nbsp;</strong>etc.</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">The mentioned food processing series consists of a more different machine that lies in these categories are as follows:</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:18.0pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><a href="https://www.samaengineering.com/product/direct-puffcore-filled-snack-processing-line" target="_blank"><span style="font-size:16px;font-family:"Times New Roman",serif;color:windowtext;text-decoration:none;">Puff Core-Filled Snack processing Line</span></a><span style="font-size:16px;font-family:"Times New Roman",serif;">,&nbsp;</span><a href="https://www.samaengineering.com/product/breakfast-cerealcorn-flake-processing-line" target="_blank"><span style="font-size:16px;font-family:"Times New Roman",serif;color:windowtext;text-decoration:none;">Breakfast Cereal/Corn Flake Processing Line</span></a><span style="font-size:16px;font-family:"Times New Roman",serif;">,&nbsp;</span><a href="https://www.samaengineering.com/product/bread-crumbpankotempura-line" target="_blank"><span style="font-size:16px;font-family:"Times New Roman",serif;color:windowtext;text-decoration:none;">Bread Crumb/Panko/Tempura Line</span></a><span style="font-size:16px;font-family:"Times New Roman",serif;">,&nbsp;</span><a href="https://www.samaengineering.com/product/cheetos-kurkure-nik-nak-processing-line" target="_blank"><span style="font-size:16px;font-family:"Times New Roman",serif;color:windowtext;text-decoration:none;">Cheetos Kurkure Nik Nak Processing Line</span></a><span style="font-size:16px;font-family:"Times New Roman",serif;">,&nbsp;</span><a href="https://www.samaengineering.com/product/doritos-tortilla-corn-chips-processing-line" target="_blank"><span style="font-size:16px;font-family:"Times New Roman",serif;color:windowtext;text-decoration:none;">Doritos Processing Line</span></a><span style="font-size:16px;font-family:"Times New Roman",serif;">, Tortilla Processing Line, Corn Chips Processing Line, Fryum Processing Line,&nbsp;</span><a href="https://www.samaengineering.com/product/fried-wheat-flour-snack-processing-line" target="_blank"><span style="font-size:16px;font-family:"Times New Roman",serif;color:windowtext;text-decoration:none;">Fried Wheat Flour snack Processing Line</span></a><span style="font-size:16px;font-family:"Times New Roman",serif;">,&nbsp;</span><a href="https://www.samaengineering.com/product/2d-3d-pellet-fryum-processing-line" target="_blank"><span style="font-size:16px;font-family:"Times New Roman",serif;color:windowtext;text-decoration:none;">2D &amp; 3D Pellet,&nbsp;</span></a><a href="https://www.samaengineering.com/product/popcorn-processing-line" target="_blank"><span style="font-size:16px;font-family:"Times New Roman",serif;color:windowtext;text-decoration:none;">Popcorn Processing Line</span></a><span style="font-size:16px;font-family:"Times New Roman",serif;">,&nbsp;</span><a href="https://www.samaengineering.com/product/potato-chips-french-fries-line" target="_blank"><span style="font-size:16px;font-family:"Times New Roman",serif;color:windowtext;text-decoration:none;">Potato Chips or French Fries Line</span></a><span style="font-size:16px;font-family:"Times New Roman",serif;">,&nbsp;</span><a href="https://www.samaengineering.com/product/pet-food-animal-feed-line" target="_blank"><span style="font-size:16px;font-family:"Times New Roman",serif;color:windowtext;text-decoration:none;">Pet Food or Animal Feed Line</span></a><span style="font-size:16px;font-family:"Times New Roman",serif;">, High Moisture Textured Vegetable Protein, Textured Soya Protein,&nbsp;</span><a href="https://www.samaengineering.com/product/high-moisture-tvp-tsp-soya-protien-line" target="_blank"><span style="font-size:16px;font-family:"Times New Roman",serif;color:windowtext;text-decoration:none;">Soya Protien Line</span></a><span style="font-size:16px;font-family:"Times New Roman",serif;">, and&nbsp;</span><a href="https://www.samaengineering.com/product/nuts-roaster-line" target="_blank"><span style="font-size:16px;font-family:"Times New Roman",serif;color:windowtext;text-decoration:none;">Nuts Roaster Line</span></a></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">These food processing machines are easily available at Sama that are useful for preparing snacks for children, producing baking items on a large scale, creating namkeen snacks for every age group, making delicious frozen foods, and quick traditional desserts formation.</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">Now, last but not least Sama Engineering is also dealing with the full range of <strong>Pharmaceutical Line&nbsp;</strong>that is an excellent collection of the most reliable and the best machines related to pharmaceutical industries. This <strong>Pharmaceutical Line&nbsp;</strong>has many different ranges of series that consists of further related kinds of machines.</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">The list of complete range of series of <strong>Pharmaceutical Line&nbsp;</strong>by Sama Engineering is as under:</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:18.0pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">o) Blister Series</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:18.0pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">o) Tablet and Capsule series</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:18.0pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">o) Filling Series</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:18.0pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">o) &nbsp;Mixer/ Blender and Tray Dryer</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:18.0pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">o) Capping and Induction Series</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:18.0pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">o) Labelling Series</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:18.0pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">o) Cartoning Machine</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:18.0pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">o) Twin/ Multilane (Sachet Machine)</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:18.0pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">o) Printer and Coder Series</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:36.0pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">All of the above-mentioned series have multiple machines that are highly useful for pharmaceutical industries and it can fulfill all the requirements of such industries. From the manufacturing of the product to the packaging and sealing, each and everything that is required can be done by these machines with complete trust.</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">A complete collection of different pharmaceutical machines for pharmaceutical industries that we are offering under these series are as follows:</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:18.0pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">Automatic-blister packing machine (fb-140), DEBLISTNG MACHINE (DB - 07), DOUBLE - ALMUNIUM - FOIL (DAB - 150), Table Top DE-Blisting Machine, Counting Tablets / Capsules Machines: TC-2A, Counting Tablets/Capsules Machines TC-4, Counting Tablets / Capsules Machines TC-8C, Automatic Capsule Filling Machine, Tablet Compression Machine, Tablet DE-Dusting Machine, Tablet Polishing Machine, Coating Pan, DESICANT INSERTING MACHINE Dl-100, AUTOMATIC FILLING MACHINE SFM-6, Eye Drop Filling &amp; Capping Machine ED-04, Tube Filling &amp; Sealing Machine TFS-60, FILLING &amp; CAPPING MACHINE SAMA 4DX, Automatic Powder Filler PF &ndash; 60, Bottle Filling Machine, FILLING &amp; CAPPING MACHINE SAMA 4DX, V-Blender VB-100, Ribbon Blender RB-100, Ointment Mixer OM &ndash; 100, TRAY DRYER, Double Cone Blender DC-100, Crawler Capping Machine SC-01, Rotary Capping Machine SC-03, Capping Machine SC-02, Induction Sealing INS &ndash; 01, Table Top Induction Sealing INS - T1, ANY ROUND &amp; FLAT OBJECT LABELLING MACHINE (LA-3), SLEEVES SHRINK LABELLING (SSL-75), Round Object Labelling Machine LA-1, Glue Labeling Machine GLA &ndash; 01, Flat Object Labelling Machine LA-2, CASE PACKER CP-200, Case Sealer Pack C-100, <strong>Automatic Blister Cartoning Machine&nbsp;</strong>CM &ndash; 200, Automatic Cartoning Machine For Bottle CM &ndash; 100, Multilane Machine 3L &ndash; AG, <strong>Sachet Multilane Machine</strong> Universal - SAMA 6L, Multilane Stick Packing Machine Universal - SAMA 10L, Twin Multilane Machine TW 3S-2L, Twin Multilane Machine TW 3S &ndash; V, Twin Multilane Machine TS - 101 &ndash; AG, Flow Wrap Machine TP &ndash; 150, BUNDILING SERIES TB &ndash; 150, MULTI HEAD PRINTERS SP &ndash; M, Single Head Printer Sp &ndash; 1, HANDY PRINTER NH &ndash; 3, HOT INK CODER DK - 110A, THERMAL TRANSFER PRINTER TTP &ndash; 03, and MULTILANE PRINTER NS - 506M.</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">All of the machines are highly reliable for the manufacturing of pharmaceutical products with high-level security of hygiene and protection against germs.</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;"><span style="font-size:16px;font-family:"Times New Roman",serif;color:#0E101A;">&nbsp;</span></p>
<p style="margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;">&nbsp;</p>
        
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <a class="btnMore" onclick="myFunction()" id="myBtn"><i class="btnAngle fa fa-angle-down"></i></a>
            </div>
        </div>
    </div>
<script>
function myFunction() {
  var moreText = document.getElementById("more");
//   var btnText = document.getElementById("myBtn");

  if (moreText.style.display === "none") {
    // btnText.innerHTML = "Read more"; 
        $('.shownBlock').removeClass("opacity8");
        $('.btnAngle').addClass("fa-angle-up");
        $('.btnAngle').removeClass("fa-angle-down");
        moreText.style.display = "block";
  } else {
        $('.shownBlock').addClass("opacity8");
        $('.btnAngle').addClass("fa-angle-down");
        $('.btnAngle').removeClass("fa-angle-up");
        // btnText.innerHTML = "Read less"; 
        moreText.style.display = "none";
  }
}
</script>


    <!-- ---------------------------slider3 -->
    
@endsection