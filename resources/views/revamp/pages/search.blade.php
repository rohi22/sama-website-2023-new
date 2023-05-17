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


@section('content')


<style>
    .search-btn{
    background:#cf1d25;color:white;border:1px solid #cf1d25;padding-left:5px;padding-right:5px;
    }
        .customheight{
    height:60px !important;
    }
.image.custom .img {
    width: 90% !important;
}
.btnbox {
    margin-top: 10px;
    background-color: #cf1d25;
    color: #fff;
    border: none!important;
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

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
    
    <!-- Four-Tabs -->
    <div class="changer-box vertFlowPack">
    <div class="container-fluid bg-breed-crumb" style="background:#e2e2e2;">
      <div class="container">
        <!-- Breed Crumbs -->
        <div class="breed-crumb-box">
          <i style="padding-right:10px;border-right:2px solid #282828;font-size:22px !important;color:#282828;" class="fa fa-home"></i>
          <a href="javascript:;" class="active"></a>
          <a href="">US CREATE & CLOSE MACHINE</a>
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
              <div style="top: 0;bottom:0;left: 0;right: 0; position: fixed;background: black;opacity: 0.9;z-index: 9999;display:none ;" id="overlap">
                <img src="{{asset('loader.gif')}}" style="width: 30%;position: absolute;left: 35%;top: 20%;">
              </div>
              <div class="row mt-5 mb-4">
                <!--Tab -->
                <div class="col-md-3 mb-4 tab">
                <div class="image custom">
                    <img class="img" src="https://www.samaengineering.com/uploads/product/61d2a58c51ac9Bread-crumb-snack.png" alt="">
                </div>
                    <div>
                      <h4>Bread Crumb/Panko/Tempura Line</h4>
                    </div>
                    <div id="hide_catalogue">
                      Mixer&nbsp;→ Twin-screw extruder&nbsp;→ Automatic...
                    </div>
                  </a>
                  <div class="button-box">
                    <button class="btnbox"><a style="font-size:12px;text-decoration:none;color:white;" href="https://www.samaengineering.com/product/bread-crumbpankotempura-line">View Details</a></button>
                  </div>
                </div>


                <div class="col-md-3 mb-4 tab">
                <div class="image custom">
                    <img class="img" src="https://www.samaengineering.com/uploads/product/61d2a58c51ac9Bread-crumb-snack.png" alt="">
                </div>
                    <div>
                      <h4>Bread Crumb/Panko/Tempura Line</h4>
                    </div>
                    <div id="hide_catalogue">
                      Mixer&nbsp;→ Twin-screw extruder&nbsp;→ Automatic...
                    </div>
                  </a>
                  <div class="button-box">
                    <button class="btnbox"><a style="font-size:12px;text-decoration:none;color:white;" href="https://www.samaengineering.com/product/bread-crumbpankotempura-line">View Details</a></button>
                  </div>
                </div>


                <div class="col-md-3 mb-4 tab">
                    <div class="image custom">
                      <img class="img" src="https://www.samaengineering.com/uploads/product/5c97ac317447219-1.jpg" alt="">
                    </div>
                    <div>
                      <h4>Bread Crumb/Panko/Tempura Line</h4>
                    </div>
                    <div id="hide_catalogue">
                      Mixer&nbsp;→ Twin-screw extruder&nbsp;→ Automatic...
                    </div>
                  </a>
                  <div class="button-box">
                    <button class="btnbox"><a style="font-size:12px;text-decoration:none;color:white;" href="https://www.samaengineering.com/product/bread-crumbpankotempura-line">View Details</a></button>
                  </div>
                </div>

                <div class="col-md-3 mb-4 tab">
                    <div class="image custom">
                      <img class="img" src="https://www.samaengineering.com/uploads/product/5c97a2ee7894aPopcorn-Machine.png" alt="">
                    </div>
                    <div>
                      <h4>Bread Crumb/Panko/Tempura Line</h4>
                    </div>
                    <div id="hide_catalogue">
                      Mixer&nbsp;→ Twin-screw extruder&nbsp;→ Automatic...
                    </div>
                  </a>
                  <div class="button-box">
                    <button class="btnbox"><a style="font-size:12px;text-decoration:none;color:white;" href="https://www.samaengineering.com/product/bread-crumbpankotempura-line">View Details</a></button>
                  </div>
                </div>

                <!-- <div class="alert alert-warning text-center mt-5">
                  <p>No Record Found</p>
                </div> -->
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
  <a href="#">&laquo;</a>
  <a href="#">1</a>
  <a class="active" href="#">2</a>
  <a href="#">3</a>
  <a href="#">4</a>
  <a href="#">5</a>
  <a href="#">6</a>
  <a href="#">&raquo;</a>
</div>

@endsection
