@extends('master_layout')
@if(!empty($row))
@section('main')
<meta name="description" content="{{ $row->gt_meta_desc }}"/>
<link rel="canonical" href="{{URL::current()}}" />
@endsection

@section('og_page_wise')
<meta property="og:locale" content="en_PK">
<meta property="og:type" content="website">
<meta property="og:title" content="{{ $row->gt_title }}">
<meta property="og:description" content="{{ $row->gt_meta_desc }}">
<meta property="og:url" content="{{URL::current()}}">
<meta property="og:site_name" content="SAMA ENGINEERING">
@endsection

@section('twitter')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $row->gt_title }}">
<meta name="twitter:description" content="{{ $row->gt_meta_desc }}">
<meta name="twitter:site" content="@InsectMarketing">
<meta name="twitter:creator" content="@InsectMarketing">
@endsection

@section('title')
    {{$row->gt_title}} -
@endsection
@endif

@section('content')


     <style>
     .search-btn{
    background:#cf1d25;color:white;border:1px solid #cf1d25;padding-left:5px;padding-right:5px;
}
         .customheight{
    height:60px !important;
}
#show_products{
    flex-direction: row !important;
}
     </style>
    
    <!-- Four-Tabs -->

    <!-- ///Changer-Conatiner\\\ -->
    <div class="changer-box vertFlowPack">

        <div class="container-fluid bg-breed-crumb" style="background:#e2e2e2;">
            <div class="my-container">
                <!-- Breed Crumbs -->
                <div class="breed-crumb-box">
                    <i style="padding-right:10px;border-right:2px solid #282828;font-size:22px !important;color:#282828;" class="fa fa-home"></i>
                                
                        @if(isset($slug)) <a href="javascript:;" class="active">{{ucwords(str_slug($slug,' '))}}</a>@endif

                     
                     
                    <!--<a href="">US CREATE & CLOSE MACHINE</a>
                    <a href="">DOSING DEVICES</a>
                    <a href="">CASE PACKERS</a> -->
                </div>
                <!--  Breed Crumbs -->
            </div>
        </div>

        
        <!--  Banner Machines -->
            <div class="my-container">

                 <div class="container-fluid">
            <div class="my-container">

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
                            @if(!empty($row)){!! $row->gt_desc !!}@endif
                        </div>
                    </div>
                    
                   
                    <!-- Dynamic Container -->

                </div>
                                        <div class="row" id="pag">
                                            <div class="col-md-5"></div>
                            <div class="col-md-2 text-center">
                            <?php echo  $products->links(); ?>
                            <!--{!! $row->gt_desc !!}-->
                        </div>
                        <div class="col-md-5"></div>
                        </div>
            </div>
        </div>
            </div>
        </div>
@endsection