@extends('revamp.layouts.scaffold')
@section('main')
    <meta name="description" content="{{ $product->p_meta_desc }}" />
@endsection
@section('og_product_wise')
    <meta property="og:type" content="product.item">
    <meta property="og:title" content="{{ ucfirst($product->p_title) }} - SAMA ENGINEERING">
    <meta property="og:url" content="{{ URL::current() }}">
    <meta property="og:image" content="{{ asset('uploads/product/' . $product->p_og_img) }}">
    <meta property="product:condition" content="new">
@endsection
@section('twitter')
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ ucfirst($product->p_title) }} - SAMA ENGINEERING">
    <meta name="twitter:description" content="{{ $product->p_meta_desc }}">
    <meta name="twitter:site" content="@SAMAENGINEERING">
    <meta name="twitter:creator" content="@SAMAENGINEERING">
@endsection
@push('title')
    {{ $data->cat_title }} - {{ ucwords(str_slug($title, ' ')) }} -
@endpush

@push('styles')
    <style>
        .nav-pills .nav-item .nav-link {
            padding: 0px !important;
            padding: 10px !important;

        }

        .active>.page-link,
        .page-link.active {
            background-color: #EC2424;
            border-color: #EC2424;
        }

        .PLBanner .imGBox img {
            width: 100%;
        }

        .top-banner {
            height: 300px;
            display: flex;
            align-items: center;
        }
    </style>
@endpush
@section('content')
    @include('revamp.components.video_modal')
    <section class="py-0 product-detail-banner">
        <div class="banner-breadcrumb bg-LGray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="d-flex flex-row w-100 sama-breadcrumbs">
                            <li>
                                <a href="{{ url('/') }}" class=""><i class="fa fa-home me-2"></i> HOME
                                    &nbsp;&nbsp; |</a>
                            </li>

                            @if (isset($data) && !empty($data))
                                <li class="text-TColor">
                                    &nbsp;&nbsp; <a href="{{ url('category/' . $data->cat_slug) }}"
                                        style="color:#EC2424">{{ $data->cat_title }}</a> &nbsp;&nbsp; |
                                </li>
                            @endif

                            <li class="text-TColor">
                                &nbsp;&nbsp; {{ $product->p_title }} &nbsp;&nbsp;
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="imGBox">
                        <img src="{{ asset('uploads/product/' . $product->p_main_image) }}" alt="...">
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!--<section class="py-3 bg-LGray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="d-flex flex-row w-100">
                            <li>
                                <a href="{{ url('/') }}" class="text-TColor"><i class="fa fa-home me-2"></i> HOME
                                    &nbsp;&nbsp; |</a>
                            </li>

                            @if (isset($data) && !empty($data))
    <li class="text-TColor">
                                    &nbsp;&nbsp; <a href="{{ url('category/' . $data->cat_slug) }}"
                                        style="color:#EC2424">{{ $data->cat_title }}</a> &nbsp;&nbsp; |
                                </li>
    @endif

                            <li class="text-TColor">
                                &nbsp;&nbsp; {{ $product->p_title }} &nbsp;&nbsp;
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>-->
    <section class="py-0 bgSR">
        <div class="container">
            <div class="row d-flex align-items-center py-5">
                <div class="col-lg-6 py-5 pb-4">

                    @php

                        $title = $product->p_title;

                        // Split the title into an array of words using either space or hyphen as separators
                        $words = preg_split('/[\s-]+/', $title);
                        if (strpos($title, '-') !== false) {
                            // Get the first three words of the title
                            $firstThreeWords = implode('-', array_slice($words, 0, 3));
                        } else {
                            $firstThreeWords = implode(' ', array_slice($words, 0, 3));
                        }
                        // Wrap the first three words in a span element with a CSS class for styling
                        $redText = "<span style='color: red;'>{$firstThreeWords}</span>";

                        // Replace the original first three words with the colored text
                        $coloredTitle = str_replace($firstThreeWords, $redText, $title);

                    @endphp
                    <h1 class="mb-2">@php echo $coloredTitle @endphp
                        <!-- <br>
                                         <span class="text-TColor">{{ $product->cat_title }}</span> -->
                    </h1>

                    <h3 class="mt-0 mb-4">
                        @if (isset($product->sku))
                            {{ $product->sku }}
                        @else
                            P-{{ $product->id + 1000 }}
                        @endif
                    </h3>
                    <p>
                        {!! $product->p_short_desc !!}
                    </p>
                    <!--<ul class="py-3 fa-ul ms-0">-->
                    <!--  <li class="mb-4"><span class="fa-li"><i class="fa fa-check"></i></span> Provide, operate, and maintain our-->
                    <!--    website</li>-->
                    <!--  <li class="mb-4"><span class="fa-li"><i class="fa fa-check"></i></span> Improve, personalize, and expand our-->
                    <!--    website</li>-->
                    <!--  <li class="mb-4"><span class="fa-li"><i class="fa fa-check"></i></span> Understand and analyze how you use-->
                    <!--    our website</li>-->
                    <!--</ul>-->
                    <div class="mb-4 d-flex flex-wrap">
                        @forelse($tags as $i)
                            <a href="{{ url('revamp/tag/' . $i->gt_slug) }}"><label
                                    class="bg-TColor-Light px-3 py-2 text-TColor rounded me-2 mb-2">{{ $i->gt_title }}</label></a>
                        @empty
                        @endforelse

                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="product-detail-wrapper">


                        <!--<div class="mb-4 Gridimg">


                            @php
                                $bag_images = DB::table('product_main_images')
                                    ->where('p_id', '=', $product->id)
                                    ->get();
                            @endphp
                            @forelse($bag_images as $index=>$gallery)
    <img src="{{ asset('uploads/product/' . $gallery->p_bag_image) }}" width="120px"
                                    alt="{{ $gallery->p_bag_image }}" />
                        @empty
    @endforelse

                        </div>-->

                        <div class="detail-slider-list">

                            @php
                                $bag_images = DB::table('product_main_images')
                                    ->where('p_id', '=', $product->id)
                                    ->get();
                            @endphp
                            @forelse($bag_images as $index=>$gallery)
                                <div class="col-xl-12">
                                    <div class="slider-list-item">
                                        <img src="{{ asset('uploads/product/' . $gallery->p_bag_image) }}" width="120px"
                                            alt="{{ $gallery->p_bag_image }}" />
                                    </div>
                                </div>
                            @empty
                            @endforelse

                        </div>



                        <div class="product-detail-btn">
                            <button type="button" data-href="{{ $product->p_video_link }}" class="product-btn video-btn">
                                <span class="dot text-white"><i class="fa fa-youtube-play fa-2x"></i></span>
                                <span class="btn-text">Play Video</span>
                            </button>
                            <button type="button" class="product-btn catalogue"
                                onClick="return window.open('{{ asset('uploads/pdf/' . $product->p_pdf) }}', '_blank')">
                                <span class="dot text-white"><i class="fa fa-file-pdf fa-2x"></i></span>
                                <span class="btn-text">Download E-catalogue</span>
                            </button>
                        </div>


                    </div>
                </div>
            </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-5 pb-4">
                    <h2>Additional Accessories</h2>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-1" role="tabpanel"
                            aria-labelledby="pills-1-tab" tabindex="0">

                            <div class="row">
                                <div class="col-lg-12 MachineSlider owl-carousel mt-3">
                                    @forelse($relatedProduct as $item)
                                        @php
                                            $similar = App\Product::find($item->child_product);
                                        @endphp
                                        @include('revamp.components.product', ['item' => $similar])
                                    @empty
                                        @foreach ($categoryProduct as $item)
                                            @include('revamp.components.product', ['item' => $item])
                                        @endforeach
                                    @endforelse
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-0 @if (count($accessoriesProduct) == 0) d-none @endif">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-5 pb-4">
                    <h2>Additional Accessories</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-1" role="tabpanel"
                                aria-labelledby="pills-1-tab" tabindex="0">

                                <div class="row">
                                    <div class="col-lg-12 MachineSlider owl-carousel mt-3">
                                        @forelse($accessoriesProduct as $item)
                                            @php
                                                $similar = App\Product::find($item->child_product);
                                            @endphp
                                            @include('revamp.components.product', ['item' => $similar])
                                        @empty
                                        @endforelse
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pb-4">
                    @if ($data->cat_title)
                        <h2>Similar {{ $data->cat_title }}</h2>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-6 TwoItemSlider owl-carousel mt-3">
                        @forelse ($processingProduct as $item)
                            @php
                                $similar = App\Product::find($item->child_product);
                            @endphp
                            @include('revamp.components.product2', ['item' => $similar])
                        @empty
                            @foreach ($similarProduct as $item)
                                @include('revamp.components.product2', ['item' => $item])
                            @endforeach
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pb-4">
                    <h2>Other Machines</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-1" role="tabpanel"
                            aria-labelledby="pills-1-tab" tabindex="0">

                            <div class="row">
                                <div class="col-lg-12 MachineSlider owl-carousel mt-3">
                                    @forelse($relatedProduct as $item)
                                        @php
                                            $similar = App\Product::find($item->child_product);
                                        @endphp
                                        @include('revamp.components.product', ['item' => $similar])
                                    @empty
                                        @foreach ($categoryProduct as $item)
                                            @include('revamp.components.product', ['item' => $item])
                                        @endforeach
                                    @endforelse
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var url = null;

            $(document).on('click', '.video-btn', function() {
                url = $(this).data('href');
                $('#myModal').modal('show');
            });

            $("#myModal").on('hide.bs.modal', function() {
                $("#videoFrame").attr('src', '');
            });

            $("#myModal").on('show.bs.modal', function() {
                $("#videoFrame").attr('src', url);
            });
            $('#myModal').on('click', '.close', function() {
                $('#myModal').modal('hide');
            });
        });
    </script>
    <script>
        // trending-carousel
        $('.detail-slider-list').slick({
            arrows: false,
            infinite: false,
            speed: 800,
            slidesToShow: 3,
            slidesToScroll: 2,
            prevArrow: "<button type='button' class='slick-prev pull-left'><span class='material-symbols-outlined'>arrow_right_alt</span></button>",
            nextArrow: "<button type='button' class='slick-next pull-right'><span class='material-symbols-outlined'>arrow_right_alt</span></button>",
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        arrows: false,
                        slidesToShow: 3,
                        slidesToScroll: 2,
                        infinite: false
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        slidesToShow: 2,
                        slidesToScroll: 1

                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    </script>
@endpush
