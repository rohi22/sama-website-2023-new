@extends('revamp.layouts.scaffold')
@section('main')
    <meta name="description"
        content="One of the best leading companies that are dealing with the manufacturing of High-Quality Packaging and Food Processing machinery and all types of Packaging services in Pakistan." />
    <meta name="robots" content="follow,index," />
    <link rel="canonical" href="{{ URL::current() }}" One of the best leading companies that are dealing with the
        manufacturing of High-Quality Packaging and Food Processing machinery and all types of Packaging services in
        Pakistan. />
@endsection

@section('og_page_wise')
    <meta property="og:locale" content="en_PK">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{!! $logos->meta_title !!}">
    <meta property="og:description"
        content="One of the best leading companies that are dealing with the manufacturing of High-Quality Packaging and Food Processing machinery and all types of Packaging services in Pakistan.">
    <meta property="og:url" content="{{ URL::current() }}">
    <meta property="og:site_name" content="SAMA ENGINEERING">
@endsection

@section('twitter')
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{!! $logos->meta_title !!}">
    <meta name="twitter:description"
        content="One of the best leading companies that are dealing with the manufacturing of High-Quality Packaging and Food Processing machinery and all types of Packaging services in Pakistan.">
    <meta name="twitter:site" content="@InsectMarketing">
    <meta name="twitter:creator" content="@InsectMarketing">
@endsection


@section('content')
    <style>
        .search-btn {
            background: #cf1d25;
            color: white;
            border: 1px solid #cf1d25;
            padding-left: 5px;
            padding-right: 5px;
        }

        .customheight {
            height: 60px !important;
        }

        .image.custom .img {
            width: 90% !important;
        }

        .btnbox {
            margin-top: 10px;
            background-color: #cf1d25;
            color: #fff;
            border: none !important;
            font-size: 1.4rem;
            padding: 0.1rem 0.5rem;
        }

        .pagination a {
            color: #cf1d25;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
        }

        .pagination {
            justify-content: center;
        }

        .pagination a.active {
            background-color: #cf1d25;
            color: white;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }
        a.active.custom {
        color: #ec2424;
        font-weight: bold;
        }
        h4.handlefont {
        color: black;
        font-size: 13px;
        }
        div#hide_catalogue {
        color: black;
        font-size: 13px;
        margin-top: -10px;
        }
    </style>

    <!-- Four-Tabs -->
    <div class="changer-box vertFlowPack">
        <div class="container-fluid bg-breed-crumb" style="background:#e2e2e2;">
            <div class="container">
                <!-- Breed Crumbs -->
                <div class="breed-crumb-box">
                    <i style="padding-right:10px;border-right:2px solid #282828;font-size:22px !important;color:#282828;"
                        class="fa fa-home"></i>
                    <a href="javascript:;" class="active"></a>
                    <a href="">
                        @if (isset($slug))
                            <a href="javascript:;" class="active custom">{{ ucwords(str_slug($slug, ' ')) }}</a>
                        @endif
                    </a>
                    <!-- <a href="">DOSING DEVICES</a>
                                                  <a href="">CASE PACKERS</a> -->
                </div>
                <!--  Breed Crumbs -->
            </div>
        </div>

        <!--  Banner Machines -->
        <div class="container">
            <div class="">
                <div class="">
                    <!--Link Slider -->
                    <div class="dynamic-container">
                        <!-- Dynamic Container -->
                        <div class="dc-inner liquid-series">
                            <!-- <h1 id="p_title">LIQUID SERIES</h1> -->
                            <div style="top: 0;bottom:0;left: 0;right: 0; position: fixed;background: black;opacity: 0.9;z-index: 9999;display:none ;"
                                id="overlap">
                                <img src="{{ asset('loader.gif') }}"
                                    style="width: 30%;position: absolute;left: 35%;top: 20%;">
                            </div>
                            <div class="row mt-5 mb-4">
                                <!--Tab -->
                                @forelse($products as $p)
                                    <div class="col-md-3 mb-4 tab">
                                        <a href="{{ url('revamp/product/' . $p->p_slug) }}">
                                            <div class="image custom">
                                                <img class="img" src="{{ asset('uploads/product/' . $p->p_main_image) }}"
                                                    alt="">
                                            </div>
                                            <div>
                                                <h4 class="handlefont">
                                                    <?php
                                                    $string = strip_tags($p->p_title);
                                                    if (strlen($string) > 30) {
                                                        // truncate string
                                                        $stringCut = substr($string, 0, 30);
                                                        $endPoint = strrpos($stringCut, ' ');
                                                    
                                                        //if the string doesn't contain any space then it will cut without word basis.
                                                        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                        $string .= '...';
                                                    }
                                                    echo $string;
                                                    ?>
                                                </h4>
                                            </div>
                                            <div id="hide_catalogue" class="catg">
                                                <?php
                                                $string = strip_tags($p->p_short_desc);
                                                if (strlen($string) > 70) {
                                                    // truncate string
                                                    $stringCut = substr($string, 0, 70);
                                                    $endPoint = strrpos($stringCut, ' ');
                                                
                                                    //if the string doesn't contain any space then it will cut without word basis.
                                                    $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                    $string .= '...';
                                                }
                                                echo $string;
                                                ?>
                                            </div>
                                        </a>
                                        <div class="button-box">
                                            <button class="btnbox"><a
                                                    style="font-size:12px;text-decoration:none;color:white;"
                                                    href="{{ url('revamp/product/' . $p->p_slug) }}">View
                                                    Details</a></button>
                                        </div>
                                    </div>


                                @empty
                                    <div class="alert alert-warning" style="text-align:center;">
                                        <p>No Record Found</p>
                                    </div>
                                @endforelse

                            </div>
                        </div>
                    </div>
                    <!-- -Tab -->
                </div>
            </div>
            <!-- Dynamic Container -->
        </div>
    </div>
    </div>
    </div>
    </div>
    <div class="pagination">
        <div class="row" id="pag">
            <div class="col-md-5"></div>
            <div class="col-md-2 text-center">
                <?php echo $products->links(); ?>
            </div>
            <div class="col-md-5"></div>
        </div>
    </div>
@endsection
