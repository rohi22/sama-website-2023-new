@extends('revamp.layouts.scaffold')
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
@push('title')
About Us - 
@endpush
@section('content')
 <section class="py-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-5 pb-4">                    
                    <h1>About us</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="py-3 bg-LGray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="d-flex flex-row w-100">
                        <li class="me-3">
                            <a href="{{url('/')}}" class="text-TColor"><i class="fa fa-home me-2"></i> HOME &nbsp;&nbsp; |</a>
                        </li>
                        <li>
                            About us
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>    
    <section>
        <div class="container">
            <div class="row d-lg-flex flex-lg-row-reverse align-items-center">                
                <div class="col-lg-6 offset-lg-1">
                    <h2 class="mb-4">{!! $about->title !!}</h2>
                    <p class="mb-4">
                        {!! $about->desc !!}
                    </p>
                </div>
                <div class="col-lg-5">
                    <div class="AboutSlider owl-carousel">
                        @forelse($images as $i)
                            <img class="d-block w-100" src="{{asset('uploads/about/'.$i->about_image)}}" alt="{{$i->about_image}}">
                        @empty
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-0 bgSB">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h2 class="mb-4">{{$about->heading}}</h2>
              <p>{!! $about->description !!}</p>
              <ul class="py-3 fa-ul ms-0">
                  @forelse(json_decode($about->points) as $index=>$item)
                    <li class="mb-4"><span class="fa-li"><i class="fa fa-check"></i></span> {{$item}}</li>
                  @empty
                  @endforelse
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
@endsection