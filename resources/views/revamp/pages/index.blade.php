@extends('revamp.layouts.scaffold')
@section('main')
<meta name="description" content="{!! $logos->meta_desc !!}" />
<meta name="robots" content="follow,index," />
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
@push('styles')
<style>
   .col-slider {
      padding: 0;
   }

   .MainSlider .content-box {
      position: absolute;
      top: 25%;
   }

   .ProcessSlider-row {
      margin-right: 1%;
   }

   .ProcessSlider-image {
      min-height: 400px;
      background-color: #fff !important;
      display: flex;
      align-items: center;
   }

   @media screen and (max-width:980px) {
      .sama-fourth {
         padding-bottom: 70px;
      }

      .sama-fifth {
         margin-bottom: -40px;
      }
   }

   @media screen and (max-width:767px) {
      .sama-small-img {
         width: 46% !important;
      }

      .InSlider {
         display: flex !important;
         flex-wrap: wrap;
         justify-content: center;
      }

      .InSlider li {
         width: 31%;
         margin: 3px;
      }

      .sama-second .InSlider li a {
         min-height: 117px !important;
         padding: 7.5px 5px !important;
         font-size: 12px;
      }

      li.sama-inslider-snack {
         order: 1;
      }

      .sama-second .InSlider li a img {
         width: 30%;
      }

      .ProcessSlider-row p,
      .ProcessSlider-row a.btn {
         display: none;
      }

      .sama-sixth,
      .sama-seventh {
         display: none;
      }

      .sama-machine-des {
         display: none;
      }

      .sama-small-img {
         display: none;
      }

      .sama-small-img:first-child,
      .sama-small-img:nth-child(2) {
         display: block;
      }
   }
</style>
@endpush
@section('content')
<section class="sama-section py-0 banner-section sama-first ">
   <div class="col-slider">
      <div class="MainSlider owl-carousel">
         @foreach($sliders as $i)
         <div class="Items fa-4x text-center fw-bolder text-white">
            <div class="row slider-content-row">
               <img src="{{asset('uploads/sliders/'.$i->image)}}">
               <div class="content-box">
                  <div class="col-lg-6 col-sm-12 text-style">
                     <h2>{{$i->h_second}}</h2>
                     <h2 class="heading">{{$i->h_first}}</h2>
                     <ul class="sam-ul">
                        <li><i class="fa-solid fa-circle-radiation fa-spin"></i>{{$i->h_third}}</li>
                        <li><i class="fa-solid fa-circle-radiation fa-spin"></i>{{$i->h_fourth}}</li>
                        <li><i class="fa-solid fa-circle-radiation fa-spin"></i>{{$i->h_fifth}}</li>
                        <li><i class="fa-solid fa-circle-radiation fa-spin"></i>{{$i->h_sixth}}</li>
                        <li><i class="fa-solid fa-circle-radiation fa-spin"></i>{{$i->h_seventh}}</li>
                     </ul>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
   <div class="container-fluid">
      <div class="row">
      </div>
   </div>
</section>
<section class="sama-section bgSR sama-second">
   <div class="container">
      <div class="row">
         <div class="col-lg-6 mx-auto text-center mb-3 mt-3">
            <h2>What’s your <span class="text-TColor">industry?</span></h2>
         </div>
      </div>
   </div>
   <div class="container position-relative">
      <div class="row">
         <div class="col-lg-12">
            <ul class="InSlider owl-carousel mt-3" style="--SH:50px;">`
               @foreach($industry as $indus)
               <li>
                  <a href="{{$indus->url}}" class="d-flex py-5 px-3 flex-column text-center">
                     <span>
                        <img class="SvgImage" src="{{asset('dist/revamp/images/'.$indus->image)}}" />
                     </span>
                     <span class="mt-4">
                        {{$indus->title}}
                     </span>
                  </a>
               </li>
               @endforeach
            </ul>
         </div>
      </div>
   </div>
</section>
<section class="sama-section sama-third">
   <div class="container">
      <div class="row">
         <div class="col-lg-6 mx-auto text-center mb-3 mt-3">
            <h2>packaging <span class="text-TColor">machines</span></h2>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="row">
         <div class="col-lg-12 MachineSlider owl-carousel mt-3">
            @forelse($home_machine_slider as $index=>$homeSlider)
            @include('revamp.components.product',['item' => $homeSlider])
            @empty
            @endforelse
         </div>
      </div>
   </div>
</section>
<section class="sama-section bg-LGray bgSR  sama-fourth">
   <div class="container">
      <div class="row">
         <div class="col-lg-6 mx-auto text-center mb-3 mt-3">
            <h2>Processing <span class="text-TColor">Lines</span></h2>
         </div>
      </div>
   </div>
   <div class="container ProcessSlider owl-carousel mt-3">
      @forelse($home_processing_slider as $processingSlider)
      <div class="row d-lg-flex flex-lg-row-reverse align-items-center justify-content-between ProcessSlider-row">
         <div class="col-lg-6 ProcessSlider-image">
            <img src="{{asset('uploads/product/'.$processingSlider->p_main_image)}}" class="w-100" />
         </div>
         <div class="col-lg-5">
            <h4 class="mb-4">{{$processingSlider->p_title}}</h4>
            <p class="mb-4">{!! $processingSlider->p_short_desc !!}</p>
            <div class="mb-4 Gridimg">
               @if(isset($processingSlider))
               @php $prcessing_gallery =
               DB::table('product_main_images')->where('p_id','=',$processingSlider->id)->get(); @endphp
               @forelse($prcessing_gallery as $g)
               <img src="{{asset('uploads/product/'.$g->p_bag_image)}}" class="me-2" width="80px" alt="">
               @empty
               @endforelse
               @endif
            </div>
            <a href="{{asset('product/'.$processingSlider->p_slug)}}" class="btn btn-danger rounded-0 px-3 py-2">Read
               More</a>
         </div>
      </div>
      @empty
      @endforelse
   </div>
</section>
<section class="sama-section sama-fifth">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 shadow bg-white d-flex align-items-center p-3">
            <div class="CLogoSlider owl-carousel">
               <img src="{{asset('dist/revamp/images/clients/CL1.png')}}" />
               <img src="{{asset('dist/revamp/images/clients/CL2.png')}}" />
               <img src="{{asset('dist/revamp/images/clients/CL3.png')}}" />
               <img src="{{asset('dist/revamp/images/clients/CL4.png')}}" />
               <img src="{{asset('dist/revamp/images/clients/CL5.png')}}" />
               <img src="{{asset('dist/revamp/images/clients/CL6.png')}}" />
               <img src="{{asset('dist/revamp/images/clients/CL7.png')}}" />
               <img src="{{asset('dist/revamp/images/clients/CL8.png')}}" />
               <img src="{{asset('dist/revamp/images/clients/CL9.png')}}" />
            </div>
         </div>
      </div>
   </div>
</section>
<section class="sama-section bgSB  sama-sixth">
   <div class="container">
      <div class="row">
         <div class="col-lg-6">
            <h2 class="mb-4">Sama's List of their <span class="text-TColor">Awards</span></h2>
            <p>Sama is ranking no. 1 among all of its competitors throughout Pakistan. It is a Karachi based company.
               However, it is dealing with high quality, huge and heavy-duty machines all over Pakistan.
            </p>
            <ul class="py-3 fa-ul ms-0">
               <li class="mb-4"><span class="fa-li"><i class="fa fa-check"></i></span> KCCI (export award)</li>
               <li class="mb-4"><span class="fa-li"><i class="fa fa-check"></i></span> ISO certified</li>
               <li class="mb-4"><span class="fa-li"><i class="fa fa-check"></i></span> CE Marked</li>
               <li class="mb-4"><span class="fa-li"><i class="fa fa-check"></i></span> Brand of the year</li>
               <li class="mb-4"><span class="fa-li"><i class="fa fa-check"></i></span> Pakistan fast growth 100
                  companies</li>
            </ul>
         </div>
         <div class="col-lg-5 offset-lg-1">
            <div class="AwardSlider owl-carousel">
               <img src="{{asset('dist/revamp/images/award-1.png')}}" alt="Awards1" />
               <img src="{{asset('dist/revamp/images/award-2.png')}}" alt="Awards2" />
            </div>
         </div>
      </div>
   </div>
</section>
<section class="sama-section bg-LGray  sama-seventh">
   <div class="container">
      <div class="row">
         <div class="col-lg-6 mx-auto text-center mb-3 mt-3">
            <h2>Case <span class="text-TColor">Studies</span></h2>
         </div>
      </div>
   </div>
   <div class="container ProcessSlider owl-carousel mt-4">
      @forelse($castStudies as $index=>$cs)
      <div class="row align-items-center">
         <div class="col-lg-5">
            <img src="{{asset('uploads/blog/post/'.$cs->p_image)}}" class="" style="width:528px;height:428px " />
         </div>
         <div class="col-lg-6 offset-lg-1">
            <h4 class="mb-4">{{$cs->p_title}}</h4>
            <p class="mb-4">{!! str_limit($cs->p_desc, 500, '&raquo'); !!}
            </p>
            <a href="{{url('/blog/events/'.$cs->p_slug)}}" class="btn btn-danger rounded-0 px-3 py-2">Read More</a>
         </div>
      </div>
      @empty
      @endforelse
   </div>
</section>
<section class="sama-section d-none  sama-eighth">
   <div class="container">
      <div class="row">
         <div class="col-lg-6 mx-auto text-center mb-3">
            <h2>Blog <span class="text-TColor">Posts</span></h2>
         </div>
      </div>
   </div>
   <div class="container mt-5">
      <div class="row">
         <div class="col-lg-3 col-md-6 mb-4">
            <div class="BlogPost d-fles w-100 border">
               <div class="IMGBox">
                  <img src="{{asset('dist/revamp/images/blog-1.jpg')}}" class="card-img-top" alt="...">
               </div>
               <div class="card-body p-5">
                  <h5 class="card-title truncate-2 mb-3">Horizontal Packaging Machine MR-2000</h5>
                  <p class="card-text truncate-3 mb-4">Horizontal Flow+G17 Packaging Machine is now available in model #
                     MR-2000 with advanced</p>
                  <span>
                     <i class="fa fa-clock-o me-1"></i>
                     Dec 23rd, 2022
                  </span>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 mb-4">
            <div class="BlogPost d-fles w-100 border">
               <div class="IMGBox">
                  <img src="{{asset('dist/revamp/images/blog-2.jpg')}}" class="card-img-top" alt="...">
               </div>
               <div class="card-body p-5">
                  <h5 class="card-title truncate-2 mb-3">Horizontal Packaging Machine MR-2000</h5>
                  <p class="card-text truncate-3 mb-4">Horizontal Flow+G17 Packaging Machine is now available in model #
                     MR-2000 with advanced</p>
                  <span>
                     <i class="fa fa-clock-o me-1"></i>
                     Dec 23rd, 2022
                  </span>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 mb-4">
            <div class="BlogPost d-fles w-100 border">
               <div class="IMGBox">
                  <img src="{{asset('dist/revamp/images/blog-3.jpg')}}" class="card-img-top" alt="...">
               </div>
               <div class="card-body p-5">
                  <h5 class="card-title truncate-2 mb-3">Horizontal Packaging Machine MR-2000</h5>
                  <p class="card-text truncate-3 mb-4">Horizontal Flow+G17 Packaging Machine is now available in model #
                     MR-2000 with advanced</p>
                  <span>
                     <i class="fa fa-clock-o me-1"></i>
                     Dec 23rd, 2022
                  </span>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 mb-4">
            <div class="BlogPost d-fles w-100 border">
               <div class="IMGBox">
                  <img src="{{asset('dist/revamp/images/blog-4.jpg')}}" class="card-img-top" alt="...">
               </div>
               <div class="card-body p-5">
                  <h5 class="card-title truncate-2 mb-3">Horizontal Packaging Machine MR-2000</h5>
                  <p class="card-text truncate-3 mb-4">Horizontal Flow+G17 Packaging Machine is now available in model #
                     MR-2000 with advanced</p>
                  <span>
                     <i class="fa fa-clock-o me-1"></i>
                     Dec 23rd, 2022
                  </span>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

@endsection