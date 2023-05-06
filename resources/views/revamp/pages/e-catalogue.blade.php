@extends('revamp.layouts.scaffold')
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
@push('title')
A Complete Guide with All Information  -
@endpush
@section('content')
@php
    $data = [
    	0 => [
    		'link' => '/catalogs/index',
    		'img' => 'pharmaeuticalline/c1.webp',
    		'title' => 'Pharmaceutical Line',
    	],
    	1 => [
    		'link' => '/catalogs/snack-processing',
    		'img' => 'snackprocessingline/c3.webp',
    		'title' => 'Snack Processing Line',
    	],
    	2 => [
    		'link' => '/catalogs/bakery-series',
    		'img' => 'backeryseries/c2.webp',
    		'title' => 'Bakery Processing',
    	],
    	3 => [
    		'link' => '/catalogs/packaging-series',
    		'img' => 'packagingseries/c4.webp',
    		'title' => 'Packing Series',
    	],
    	4 => [
    		'link' => '/catalogs/kitchen-heart',
    		'img' => 'kitchenheart/c4.webp',
    		'title' => 'Kitchen Heart',
    	],
    	5 => [
    		'link' => '/catalogs/pick-fill-and-seal-machines',
    		'img' => 'doypack/c4.webp',
    		'title' => 'Agriculture & Industrial Packing',
    	],
    ];
@endphp

    <section class="py-3 bg-LGray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="d-flex flex-row w-100">
                        <li class="me-3">
                            <a href="{{url('/')}}" class="text-TColor"><i class="fa fa-home me-2"></i> HOME &nbsp;&nbsp; |</a>
                        </li>
                        <li>
                            E-CATALOGUES
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>    
    <section>
        <div class="container">
            <div class="row">
                @forelse($data as $index=>$item) 
               
                <div class="col-lg-4 mb-4">
                    <div class="card w-100 text-center hoverShadow rounded-0">
                        <div class="d-flex w-100 h-250 overflow-hidden">
                            <img src="{{asset($item['img'])}}" alt="" class="card-img-top">
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title truncate-2 mb-3 mt-3">{{$item['title']}}</h5>
                            <p class="card-text truncate-3 mb-5 d-none">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex quasi sapiente deserunt obcaecati fugiat quia quis recusandae asperiores. Corrupti, labore!</p>
                            <a href="{{url($item['link'])}}" target="_blank" class="text-TColor">Read More <i class="fa fa-angle-double-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
         
            </div>
        </div>
    </section>  
@endsection