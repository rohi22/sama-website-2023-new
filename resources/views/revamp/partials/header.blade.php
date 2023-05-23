@php
$machines = DB::table('categories')->where('parent_id','=',3)->where('status',
1)->orderBy('cat_order','ASC')->get(['categories.*']);
$processingSeries = DB::table('categories')->where('parent_id','=',79)->where('status',
1)->orderBy('cat_order','ASC')->get(['categories.*']);
$bakerySeries = DB::table('categories')->where('parent_id','=',80)->where('status',
1)->orderBy('cat_order','ASC')->get(['categories.*']);
$pharmaLine = DB::table('categories')->where('parent_id','=',111)->where('status',
1)->orderBy('cat_order','ASC')->get(['categories.*']);
@endphp
<style>
  .hoverphone:hover .dropdown-content {
    display: block;
  }

  button.fa.fa-search.search-btn.sb {
    background: #ec2424;
    color: white;
  }

  .input-group {
    position: relative;
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
    width: 100%;
  }

  .form-control:focus {
    color: var(--bs-body-color);
    background-color: var(--bs-form-control-bg);
    border-color: #ec2424;
    outline: 0;
    box-shadow: 0 0 0 -0.75rem rgb(0 0 0);
  }

  a.customwork {
    position: relative;
    padding: 0px !important;
    font-size: 15px !important;
  }

  .dropdown-content {
    right: 0px;
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
  }

  .dropdown-content a {
    color: black !important;
    padding: 2px 6px;
    font-size: 1.4rem;
    text-decoration: none;
    display: block;
  }

  .header-inner .content-box .row-2 .search-plus-drowpdowns .dropdown-box .dropdown .icon-box {
    flex-flow: row !important;
    width: 3rem !important;
  }

  header.fixed {
    background-color: #fff;
  }

  .sama-header-row .fa-bars {
    font-size: 18px;
    margin-bottom: 0;
    color: #262626;
    opacity: 1;
    width: fit-content;
    background-color: transparent;
    padding: 8px 9.5px !important;
    border-radius: 5px;
  }


  .sama-header-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 2%;
    justify-content: flex-end;
  }

  .sama-header-row nav.pushy {
    overflow: visible;
  }

  .sama-inner-toggle.sama-crossicon {
    width: fit-content;
    position: absolute;
    right: 0;
  }

  .pushy-open-left .sama-toggle .fa-bars:before {
    content: '\f00d';
  }

  a.sama-toggle-selector {
    margin-left: -110%;
    background-color: transparent;
    float: left;
    color: #fff;
    display: flex;
    justify-content: center;
    width: fit-content;
    border-radius: 5px;
  }

  .sama-inner-toggle.sama-crossicon a {
    border: navajowhite;
    box-shadow: none;
  }

  .sama-header-row .sama-ul {
    display: flex;
    flex-direction: column;
    width: 100%;
  }

  .sama-header-row .sama-ul li {
    border-bottom: 1px solid #817878;
    text-transform: uppercase;
    padding: 10px 15px;
    font-family: "Source Sans Pro", sans-serif;
    text-transform: capitalize !important;
  }

  .sama-ul button {
    width: 100%;
    color: #fff;
    padding: 15px 10px !important;
    text-align: left;
    background: transparent;
    border: 0;
    text-transform: uppercase;
  }

  .sama-header-row .sama-ul li button {
    padding: 0 !important;
    font-family: "Source Sans Pro", sans-serif;
    text-transform: capitalize !important;
  }

  .sama-header-row .sama-ul a {
    padding: 0 !important;
    font-family: "Source Sans Pro", sans-serif;
    text-transform: capitalize !important;
  }

  a.logo-sidebar {
    padding: 0 10px !important;
  }

  .logo-sidebar {
    text-align: center;
    padding-bottom: 0 !important;
  }

  .transform {
    transition: all 1.5s ease;
  }

  .sama-second h2,
  .sama-third h2,
  .sama-fourth h2,
  .sama-fifth h2,
  .sama-sixth h2,
  .sama-seventh h2 {
    margin-bottom: 0;
  }

  body.pushy-open-left .sama-header-row nav.pushy {
    height: 100vh;
    overflow-y: auto;
  }

  body.pushy-open-left {
    overflow-y: auto;
    height: 100vh;
  }

  .sama-header-row .logo {
    text-align: center;
  }

  a.logo-sidebar {
    text-align: left;
  }

  .sama-info a {
    font-size: 14px !important;
  }

  .sama-second .InSlider a {
    margin: 0;
    margin: 0;
    padding: 30px 10px !important;
    min-height: 161px;
    justify-content: center;
  }

  .sama-header-row .sama-ul li.suby:last-child {
    border-bottom: none;
  }

  @media screen and (max-width:980px) {
    .sama-header-row .sama-ul li.suby:last-child {
      border-bottom: 0;
    }

    .sama-header-row .pushy {
      width: 60%;
    }

    .sama-header-row .sama-ul li .suby:before {
      content: "\f062";
      font-family: 'FontAwesome';
      transform: rotate(90deg);
      position: absolute;
      left: 11px;
      color: #ed1c25;
    }

    .sama-nav-mob {
      background-color: #262626bd;
    }

    .sama-header-row .social_Links a {
      color: #ec2424;
    }

    .sama-header-row .social_Links {
      display: flex;
      justify-content: center;
      column-gap: 5%;
      margin-top: 10px;
    }

    .pushy-open-left .site-overlay {
      height: 100vh;
    }

    .mobo-menu:before {
      content: " ";
      position: absolute;
      bottom: 0px;
      left: 0px;
      width: 100%;
      height: 360px;
      background: url(https://www.samaengineering.com/dist/revamp/images/S-Sign.svg) no-repeat bottom left;
      background-size: 150% 80%;
      pointer-events: none;
      z-index: -1;
    }

    .logo-col .logo img {
      width: 40%;
      margin: 0 auto;
    }

    .logo-col {
      text-align: center;
    }

    .sama-inner-toggle.sama-crossicon a .menu-btn {
      color: #fff;
      font-size: 24px;
    }

    img.img-responsive.main-log-navs {
      width: 40%;
    }

    .sama-header-row .sama-ul li {
      font-size: 15px !important;
    }

    .sama-header-row .sama-ul li button {
      font-size: 20px;
    }

    .sama-header-row .sama-ul a {
      font-size: 20px;
    }

    .sama-header-row .sama-ul .suby a {
      font-size: 14px;
    }
  }

  @media screen and (max-width:767px) {

    .sama-header-row .sama-ul a,
    .sama-header-row .sama-ul li button {
      font-size: 16px;
    }

    .sama-header-row .pushy {
      width: 80%;
    }

    a.logo-sidebar img {
      width: 60%;
    }

    .sama-second .InSlider a {
      min-height: 161px;
    }

    .sama-second h2,
    .sama-third h2,
    .sama-fourth h2,
    .sama-fifth h2,
    .sama-sixth h2,
    .sama-seventh h2 {
      font-size: 18px;
    }
  }

  @media screen and (max-width:767px) {
    img.img-responsive.main-log-navs {
      width: 65%;
    }
  }

  @media screen and (max-width:768px) {
    img.img-responsive.main-log-navs {
      width: 30% !important;
    }
  }

  @media only screen and (max-width:538px) {
    img.img-responsive.main-log-navs {
      width: 55% !important;
    }

    i.fa.fa-search {
      position: absolute;
      left: 93%;
      top: -290%;
      font-size: 24px;
    }

    img.img-responsive.main-log-navs {
      margin-right: 85px;
    }
  }

  @media only screen and (max-width:375px) {
    img.img-responsive.main-log-navs {
      width: 55% !important;
    }

    i.fa.fa-search {
      position: absolute;
      left: 90%;
      top: -235%;
      font-size: 16px
    }
  }

  @media screen and (max-width:320px) {
    img.img-responsive.main-log-navs {
      width: 55% !important;
    }
  }

  @media only screen and (min-width: 981px) and (max-width: 1200px) {
    .sam-nav .nav-col {
      flex-direction: row !important;
    }

    i.fa.fa-search {
      position: absolute;
      left: 92%;
      top: -440%;
      font-size: 29px;
    }


    .logo-header .container,
    .top-header .container {
      max-width: 970px;
    }

    .sam-nav .nav-col a {
      padding: 26px 5px;
      font-size: 0.82rem;
    }

    .sam-nav .nav-col .SUBLinks a {
      padding: 0;
    }

    .sam-nav .nav-col {
      width: 100%;
      margin-left: 1%;
    }

    .sama-second .InSlider a span {
      font-size: 14px;
    }
  }

  a.fa.fa-search.search-btn.sb.customwork:hover {
    background: #ec2424;
    color: #f7f7f7;
  }

  i.menu-btn.fa.fa-bars.custm {
    position: relative;
    top: -243px;
    left: 23px;
  }

  .menu li a {
    color: inherit;
    text-decoration: none;
    margin: 0 15px;
  }

  .menu li a:hover {
    text-decoration: underline;
  }

  .search {
    position: relative;
    padding-bottom: 15px;
    bottom: -7px;
  }

  .search-input::placeholder {
    color: white;
    opacity: 0.8;
  }

  .search-input {
    height: 0px;
    border: none;
    position: absolute;
    left: -11px;
    visibility: hidden;
    opacity: 0;
    top: 5px;
    background: #ec2424;
    color: white;
    padding: 6px;
    font-size: 12px;
    outline: none;
    width: 113%;
    transition: 80ms all ease-in;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    box-shadow: none;
  }

  .search-button {
    background: transparent;
    color: #262626;
    cursor: pointer;
    font-size: 14px;
    padding-top: 4px;
  }

  .search-button:hover+.search-input,
  .search-input:hover,
  .search:hover .search-input {
    visibility: visible !important;
    border-radius: inherit;
    opacity: 1 !important;
    z-index: 9 !important;
    box-shadow: 0px 3px 0px #fff;
    height: 40px !important;
  }

  @media only screen and (min-width: 992px) {
    i.fa.fa-search {
      display: none !important;
    }

    input.search-input {
      display: none !important;
    }

    .search-button:hover+.search-input,
    .search-input:hover,
    .search:hover .search-input {
      visibility: hidden;
      display: none !important;
    }
  }

  @media only screen and (min-width: 768px) {
    i.fa.fa-search {
      position: absolute;
      left: 90%;
      top: -400% !important;
      font-size: 22px !important;
    }
  }

  .container,
  .container-lg,
  .container-md,
  .container-sm,
  .container-xl,
  .container-xxl {
    max-width: 1600px;
  }
</style>
<header id="Header">
  <div class="THeader bg-TColor text-white top-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 d-flex align-items-center justify-content-lg-between justify-content-center">
          <div>
            <ul class="THLinks">
              <li><a href="tel:{{$footer_content->f_phone_1}}"><i class="fa fa-phone me-2"></i>
                  <span>{{$footer_content->f_phone_1}}</span></a></li>
              <li><a href="mailto:{{$footer_content->f_email_2}}"><i class="fa fa-envelope me-2"></i>
                  <span>{{$footer_content->f_email_1}}</span></a></li>
            </ul>
          </div>
          <div>
            <ul class="THLinks">
              <li><a href="{{url('blog')}}">Case Study</a></li>
              <li><a href="{{route('aboutUs')}}">About us</a></li>
              <li><a href="{{route('spareParts')}}">Spare Parts</a></li>
              <li><a href="{{route('becomeAnAgent')}}">Become Agent</a></li>
              <li><a href="{{route('eCatalogue')}}">E-Catalogue</a></li>
              <li>
                <div class="input-group" style="">
                  <form method="get" action="{{route('revamp.search')}}">
                    <input type="text"
                      style="width:150px !important;height: 37px; border-radius: initial; font-size:12px;"
                      placeholder="Search.." class="myeditclass form-control" name="search" value="">
                    <button type="submit" class="fa fa-search search-btn sb customwork"
                      style="position: absolute; top: 11px; right: -25px; border-inline-end-style: none; 
                        border-bottom-style: none; margin-top: -11px; border-color: #ec2424;padding:6px;margin-right:0px; height: 37px;" value="Search"
                      href="{{route('revamp.search')}}">
                    </button>
                    <!-- <button type="submit" 
                          >
                        </button> -->
                  </form>
                  <!-- </a> -->
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-white text-white position-relative shadow-sm logo-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 d-flex align-items-center justify-content-lg-between justify-content-center">
          <div class="logo py-2">
            <a href="{{url('/revamp')}}"><img src="{{asset('uploads/logos/'.$logos->header_logo)}}" height="80px"
                alt="Logo"></a>
          </div>
          <nav class="sam-nav">
            <ul class="d-flex flex-column flex-lg-row nav-col">
              @foreach($categories as $i)
              <li>
                @php
                $subcategories = DB::table('categories')->where('parent_id','=',$i->id)->where('status',
                1)->orderBy('cat_order','ASC')->get(['categories.*']);
                \Log::info(strtoupper($i->cat_title .'--'. count($subcategories)));
                @endphp
                <a href="{{asset('/revamp/category/'.$i->cat_slug)}}">{{strtoupper($i->cat_title)}}
                  @if(count($subcategories))
                  <i class="fa fa-chevron-down ms-2"></i>
                </a>
                @endif
                @if(count($subcategories))
                <div class="SUBLinks">
                  <div class="container p-0">
                    <ul class="menu-carousel">

                      @forelse($subcategories as $machine)
                      <li>
                        <a href="{{asset('revamp/sub-category/'.$machine->cat_slug)}}">
                          <span><img src="{{asset('uploads/'.$machine->cat_icon)}}" /></span>
                          <span>{{$machine->cat_title}}</span>
                        </a>
                      </li>
                      @empty
                      @endforelse
                    </ul>
                  </div>
                </div>
                @endif
              </li>
              @endforeach
              <!-- <li>
                        <a href="{{asset('revamp/category/machines')}}">Machines <i class="fa fa-chevron-down ms-2"></i></a>
                        <div class="SUBLinks">
                           <div class="container p-0">
                              <ul class="menu-carousel">
                                 @forelse($machines as $machine)
                                 <li>
                                    <a href="{{asset('revamp/sub-category/'.$machine->cat_slug)}}">
                                    <span><img src="{{asset('uploads/'.$machine->cat_icon)}}" /></span>
                                    <span>{{$machine->cat_title}}</span>
                                    </a>
                                 </li>
                                 @empty
                                 @endforelse
                              </ul>
                           </div>
                        </div>
                     </li>
                     <li>
                        <a href="{{asset('revamp/category/processing-series')}}">Processing Line <i class="fa fa-chevron-down ms-2"></i></a>
                        <div class="SUBLinks">
                           <div class="container p-0">
                              <ul class="menu-carousel owl-carousel">
                                 @forelse($processingSeries as $processing)
                                 <li>
                                    <a href="{{asset('revamp/sub-category/'.$processing->cat_slug)}}">
                                    <span><img src="{{asset('uploads/'.$processing->cat_icon)}}" /></span>
                                    <span>{{$processing->cat_title}}</span>
                                    </a>
                                 </li>
                                 @empty
                                 @endforelse
                              </ul>
                           </div>
                        </div>
                     </li>
                     <li>
                        <a href="{{asset('revamp/category/bakery-series')}}">Bakery Series <i class="fa fa-chevron-down ms-2"></i></a>
                        <div class="SUBLinks">
                           <div class="container p-0">
                              <ul class="menu-carousel owl-carousel">
                                 @forelse($bakerySeries as $bakery)
                                 <li>
                                    <a href="{{asset('revamp/sub-category/'.$bakery->cat_slug)}}">
                                    <span><img src="{{asset('uploads/'.$bakery->cat_icon)}}" /></span>
                                    <span>{{$bakery->cat_title}}</span>
                                    </a>
                                 </li>
                                 @empty
                                 @endforelse
                              </ul>
                           </div>
                        </div>
                     </li>
                     <li>
                        <a href="{{asset('revamp/category/pharmaceutical-line')}}">Pharmaceutical Line <i class="fa fa-chevron-down ms-2"></i></a>
                        <div class="SUBLinks">
                           <div class="container p-0">
                              <ul class="menu-carousel owl-carousel">
                                 @forelse($pharmaLine as $pharma)
                                 <li>
                                    <a href="{{asset('revamp/sub-category/'.$pharma->cat_slug)}}">
                                    <span><img src="{{asset('uploads/'.$pharma->cat_icon)}}" /></span>
                                    <span>{{$pharma->cat_title}}</span>
                                    </a>
                                 </li>
                                 @empty
                                 @endforelse
                              </ul>
                           </div>
                        </div>
                     </li> -->
              <!-- <li><a href="{{asset('revamp/category/snack-processing')}}">Snack Processing Line</a></li> -->
              <li><a href="{{asset('revamp/category/accessories')}}">Accessories</a></li>
              <li><a href="{{route('contactUs')}}">Contact us</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <div class="mobo-menu container-fluid headereffect customheight">
    <div class="sama-header-row">
      <div class="col-2 menu-col">
        <nav class="pushy pushy-left  sama-nav-mob" data-focus="#first-link">
          <div class="btn-box text-center sama-toggle sama-inner-toggle" style="padding-bottom:0px;">
            <a class="sama-toggle-selector">
              <i class="menu-btn fa fa-bars custm"></i>
            </a>
          </div>
          <div class="pushy-content">
            <div class="">
              <a href="#" class="close-nav" style="position: absolute; left: 84%;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="24px"
                  height="24px">
                  <path d="M0 0h24v24H0z" fill="none" />
                  <path d="M18 6L6 18M6 6l12 12" stroke="#de1a23" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
              </a>
            </div>
            <a class="logo-sidebar " href="{{url('/revamp')}}"><img
                src="https://www.samaengineering.com/uploads/logos/samalogo.png" height="50px" alt="Logo"></a>
            <a class="logo-sidebar " href="{{url('/revamp')}}">
              <h2 style="color:#fff; font-size:20px; font-weight:600;">Sama Engineering</h2>
            </a>
            <ul class="sama-ul">
              @forelse($categories as $parent)
              @if(sizeof($parent->subcategories) > 0)
              <li class="pushy-submenu">
                <button><a href="{{url('/revamp/category/'.$parent->cat_slug)}}">{{$parent->cat_title}}</a></button>
                <ul class="sub-menu" style="display:none">
                  @forelse($parent->subcategories as $child)
                  <li class="pushy-link suby" style="font-size: 12px;"><button><a
                        href="{{asset('/revamp/sub-category/'.$child->cat_slug)}}">{{$child->cat_title}}</a></button>
                  </li>
                  @empty
                  @endforelse
                </ul>
              </li>
              @else
              <li class="pushy-link"><button><a
                    href="{{asset('category/'.$parent->cat_slug)}}">{{$parent->cat_title}}</a></button></li>
              @endif
              @empty
              @endforelse
            </ul>
            <ul class="THLinks sama-ul">
              <!--<li><a href="{{url('blog')}}"><button>Case Study</button></a></li>-->
              <li><button><a href="{{route('aboutUs')}}">About us</a></button></li>
              <li><button><a href="{{route('contactUs')}}">Contact us</a></button></li>
              <!--<li><button><a href="{{route('spareParts')}}">Spare Parts</a></button></li>-->
              <li><button><a href="{{route('becomeAnAgent')}}">Become Agent</a></button></li>
              <li><button><a href="{{route('eCatalogue')}}">E-Catalogue</a></button></li>
              <!--<li><button><a href="{{route('privacyPolicy')}}">Privacy Policy</a></button></li>-->
            </ul>
            <!--<ul class="THLinks sama-ul sama-info">-->
            <!--   <li><a href="tel:{{$footer_content->f_phone_1}}"><i class="fa fa-phone me-2"></i> <span>{{$footer_content->f_phone_1}}</span></a></li>-->
            <!--   <li><a href="mailto:{{$footer_content->f_email_2}}"><i class="fa fa-envelope me-2"></i> <span>{{$footer_content->f_email_1}}</span></a></li>-->
            <!--</ul>-->
            <ul class="THLinks sama-ul sama-info">
              <div class="social_Links">
                <a href="" target="_blank"><i class="fa fa-instagram"></i></a>
                <a href="https://pk.linkedin.com/company/sama-engineering" target="_blank"><i
                    class="fa fa-linkedin"></i></a>
                <a href="https://www.youtube.com/user/SamaEng786" target="_blank"><i class="fa fa-youtube-play"></i></a>
                <a href="https://twitter.com/SAMAENGINEERING" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="https://www.facebook.com/sama.engineering" target="_blank"><i class="fa fa-facebook"></i></a>
              </div>
            </ul>
          </div>
        </nav>
        <div class="btn-box text-center sama-toggle" style="padding-bottom:0px;">
          <a class="sama-toggle-selector">
            <i class="menu-btn fa fa-bars"></i>
          </a>
        </div>
      </div>
      <div class="col-8 logo-col">
        <div class="logo">
          <a href="{{url('/revamp')}}"><img src="https://www.samaengineering.com/uploads/logos/logo-mobile.jpeg" alt=""
              class="img-responsive main-log-navs">
          </a>
        </div>
      </div>
    </div>


    <div class="col-2"></div>
    <div class="site-overlay"></div>
    <!--<div class="btn-box text-center" onclick="hoverphone()" style="margin-top:28px;width:15%;float:left;">-->
    <!--        <div class="dropdown">-->
    <!--                    <span class="icon-box">-->
    <!--                        <i style="width:0px !important;padding:0px !important;background-color:white;color:#cf1d25;font-size:24px;" class="hvr-icon-hang fa onmouse fa-phone" aria-hidden="true"></i>-->
    <!--                    </span>-->
    <!--                    <div class="dropdown-content" id="dropcontent" style="box-shadow:         inset 0 0 5px #000000;padding:10px;">-->
    <!--                        <h4>CONTACT DETAILS</h4>-->
    <!--<p>FOR SALES AND INQUIRY</p>-->
    <!--                        <a href="tel:+92 345 2266208" target="_blank" rel="noindex nofollow"><span class="custom_country">PK</span> +92 213 6602467</a>-->
    <!--                        <a href="tel:+44 20 3290 5278" target="_blank" rel="noindex nofollow"><span class="custom_country">UK</span> +44 20 3290 5278</a>-->
    <!--                        <a href="tel:+1 302 4828132" target="_blank" rel="noindex nofollow"><span class="custom_country">USA</span> +1 302 4828132</a>-->
    <!--                        <a href="tel:+18009823590" target="_blank" rel="noindex nofollow"><span class="custom_country">TOLL FREE</span> +1-800-982-3590</a>-->
    <!--                        <a href="mailto:info@Samaengineering.com" target="_blank" rel="noindex nofollow"><span style="font-size:18px;font-weight:700;color:#282828;"></span><span style="font-size:18px;color:#282828;">info@Samaengineering.com</span></a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--</div>-->
    <div class="row">
      <div class="col-md-12">
        <div class="search">
          <div class="search-content">
            <a class="search-button" id="show-search-box"><i
                style="position: absolute; left: 90%; top: -290%; font-size: 22px;" class="fa fa-search"></i></a>
            <input type="text" class="search-input" id="hidden-search-box" style="display: none;"
              placeholder="Search Here...">
            <i class="fa fa-times close-icon"
              style="position: absolute; left: 90%; top: -290%; font-size: 22px; display: none;"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</header>

<script>
//   $('.sama-toggle-selector').click(function(){
//   $("body").toggleClass("pushy-open-left");
// })
  // <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js">
  // </script>

</script>
<script>
  $(document).ready(function () {
    $('.sama-toggle-selector').click(function (e) {
      e.stopPropagation();
      $("body").toggleClass("pushy-open-left");
    });

    $('.close-nav').click(function (e) {
      e.preventDefault();
      $("body").removeClass("pushy-open-left");
    });

    $(document).on('click', function (e) {
      if ($("body").hasClass("pushy-open-left") && !$(e.target).closest('.pushy').length && !$(e.target).hasClass('sama-toggle-selector')) {
        $("body").removeClass("pushy-open-left");
        // $(".close-icon").css("display","block")
      }
    });

    $('.pushy-submenu').on('click', function() {
      $(this).find('.sub-menu:first').toggle();
    });
    // $('.pushy-submenu').click(function () {

    //   $(this).find('.sub-menu:first').toggle();
    // });
    
  });
</script>
<script>
  $(document).ready(function () {
    $('#show-search-box').click(function () {
      $('#show-search-box').hide();
      $('#hidden-search-box').show();
      $('.close-icon').show();
    });

    $('.close-icon').click(function () {
      $('#hidden-search-box').hide();
      $('.close-icon').hide();
      $('#show-search-box').show();
    });
  });
</script>