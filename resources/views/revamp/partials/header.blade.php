@php 
    $machines = DB::table('categories')->where('parent_id','=',3)->where('status', 1)->orderBy('cat_order','ASC')->get(['categories.*']);
    $processingSeries = DB::table('categories')->where('parent_id','=',79)->where('status', 1)->orderBy('cat_order','ASC')->get(['categories.*']);
    $bakerySeries = DB::table('categories')->where('parent_id','=',80)->where('status', 1)->orderBy('cat_order','ASC')->get(['categories.*']);
    $pharmaLine = DB::table('categories')->where('parent_id','=',111)->where('status', 1)->orderBy('cat_order','ASC')->get(['categories.*']);
@endphp
<style>
.hoverphone:hover .dropdown-content {
  display: block; }

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
    margin-top: 3px;
}
a.customwork {
    position: relative;
    padding: 0px !important;
    font-size: 15px !important;
}
/* .btnS {
    margin-top: 7px;
    background-color: #cf1d25;
    color: #fff;
    border: none!important;
    font-size: 1.4rem;
    padding: 0.1rem 0.5rem;
    font-size:19px !important;
} */
.Hotbg
{
    position: absolute;
    top: 50%;
    left: 70%;
    transform: translate(-50%, -50%);
    background: #cf1d25;
    height: 40px;
    border-radius: 40px;
    padding: 10px;
}

.Hotbg:hover > .Hotbg-txt
{
  width: 145px;
  padding: 0px 9px;
  margin-top: -8px;
}

.Hotbg:hover > .Hotbg-btn
{
    background: #9d1b1e;
    color: white;
}

.Hotbg-btn
{
    color: #e84118;
    float: right;
    margin-top: -10px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: white;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: 0.4s;
    color: red;
    cursor: pointer;
}

.Hotbg-btn > i
{
    font-size-adjust: 30px;
}

a
{
    text-decoration: none;
}

.Hotbg-txt
{
    border: none;
    background: none;
    outline: none;
    float: left;
    padding: 0;
    color: white;
    font-size: 16px;
    transition: 0.4s;
    line-height: 40px;
    width: 0px;
    font-weight: bold;
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
      .sama-header-row .pushy{width:60%;}
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

    .sama-header-row .sama-ul li{ 
        font-size: 15px !important;
    }
    .sama-header-row .sama-ul li button{ 
        font-size: 20px;
    }
    .sama-header-row .sama-ul a{
        font-size: 20px;
    }
    .sama-header-row .sama-ul .suby a {
        font-size: 14px; 
    }
  }
  @media screen and (max-width:767px) {
    .sama-header-row .sama-ul a, .sama-header-row .sama-ul li button{font-size: 16px;}
   .sama-header-row .pushy{width:80%;}
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
    .Hotbg-txt {
    border: none;
    background: none;
    outline: none;
    float: left;
    padding: 0;
    color: white;
    font-size: 16px;
    transition: 0.4s;
    line-height: 5px;
    width: 58px;
    font-weight: bold;
}
    .Hotbg {
    position: absolute;
    top: 50%;
    left: 62%;
    transform: translate(-50%, -50%);
    background: #cf1d25;
    height: 30px;
    border-radius: 40px;
    padding: 6px;
}
.Hotbg-btn {
    color: #e84118;
    float: right;
    margin-top: -6px;
    width: 40px;
    height: 30px;
    border-radius: 50%;
    background: white;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: 0.4s;
    color: red;
    cursor: pointer;
}

.Hotbg:hover > .Hotbg-txt
{
  width: 82px;
  padding: 0px 9px;
  margin-top: 0px;
}
img.img-responsive.main-log-navs {
  margin-right: 85px;
}
  }
  @media screen and (max-width:375px) {
    img.img-responsive.main-log-navs {
      width: 55% !important;
    }
    {
      width: 70px;
      padding: 0px 9px;
      margin-top: 0px;
    }
    .Hotbg-txt {
    border: none;
    background: none;
    outline: none;
    float: left;
    padding: 0;
    color: white;
    font-size: 16px;
    transition: 0.4s;
    line-height: 22px;
    width: 58px;
    font-weight: bold;
}
  }
  @media screen and (max-width:320px) {
    img.img-responsive.main-log-navs {
      width: 55% !important;
    }
    .Hotbg:hover > .Hotbg-txt
    {
      width: 70px;
      padding: 0px 9px;
      margin-top: 0px;
    }
    img.img-responsive.main-log-navs {
      margin-right: 100px;
    }
    .Hotbg-btn {
    color: #e84118;
    float: right;
    margin-top: -6px;
    width: 25px;
    height: 30px;
    border-radius: 50%;
    background: white;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: 0.4s;
    color: red;
    cursor: pointer;
}
.Hotbg-txt:hover {
    border: none;
    background: none;
    outline: none;
    float: left;
    padding: 0;
    color: white;
    font-size: 16px;
    transition: 0.4s;
    line-height: 0;
    width: 58px;
    font-weight: bold;
}
  }
@media only screen and (min-width: 981px) and (max-width: 1200px) {
  .sam-nav .nav-col {
    flex-direction: row !important;
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
</style>
<header id="Header">
   <div class="THeader bg-TColor text-white top-header">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 d-flex align-items-center justify-content-lg-between justify-content-center">
               <div>
                  <ul class="THLinks">
                     <li><a href="tel:{{$footer_content->f_phone_1}}"><i class="fa fa-phone me-2"></i> <span>{{$footer_content->f_phone_1}}</span></a></li>
                     <li><a href="mailto:{{$footer_content->f_email_2}}"><i class="fa fa-envelope me-2"></i> <span>{{$footer_content->f_email_1}}</span></a></li>
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
                      <input type="text" style="width:150px !important;height:30px;font-size:12px;" placeholder="Search.." 
                      class="myeditclass form-control" name="search" value="">
                      <a class="customwork" href="{{route('revamp.search')}}">
                        <button type="submit" 
                          class="fa fa-search search-btn sb" style="padding:6px;margin-right:0px; height: 31px;" value="Search">
                        </button>
                      </a>
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
                  <a href="{{url('/revamp')}}"><img src="{{asset('uploads/logos/'.$logos->header_logo)}}" height="80px" alt="Logo"></a>
               </div>
               <nav class="sam-nav">
                  <ul class="d-flex flex-column flex-lg-row nav-col">
                     <li>
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
                     </li>
                     <li><a href="{{asset('revamp/category/snack-processing')}}">Snack Processing Line</a></li>
                     <li><a href="{{asset('revamp/category/accessories')}}">Accessories</a></li>
                     <li><a href="{{route('contactUs')}}">Contact us</a></li>
                  </ul>
               </nav>
            </div>
         </div>
      </div>
   </div>

   <div class="mobo-menu container-fluid headereffect customheight">
      <div class="row sama-header-row">
        <div class="col-2 menu-col">
            <nav class="pushy pushy-left sama-nav-mob" data-focus="#first-link">
            <div class="btn-box text-center sama-toggle sama-inner-toggle" style="padding-bottom:0px;">
            <a class="sama-toggle-selector">
            <i class="menu-btn fa fa-bars"></i>    
            </a>
         </div>
            <div class="pushy-content">
               <!--<a class="logo-sidebar "href="{{url('/revamp')}}"><img src="https://www.samaengineering.com/uploads/logos/samalogo.png" height="50px" alt="Logo"></a>-->
               <a class="logo-sidebar "href="{{url('/revamp')}}"><h2 style="color:#fff; font-size:20px; font-weight:600;">Sama Engineering</h2></a>
               <ul class="sama-ul">
                  @forelse($categories as $parent)
                  @if(sizeof($parent->subcategories) > 0)
                  <li class="pushy-submenu">
                     <button>{{$parent->cat_title}}</button>
                     <ul>
                        @forelse($parent->subcategories as $child)
                        <li class="pushy-link suby" style="font-size: 12px;"><button><a href="{{asset('sub-category/'.$child->cat_slug)}}">{{$child->cat_title}}</a></button></li>
                        @empty
                        @endforelse
                     </ul>
                  </li>
                  @else
                  <li class="pushy-link"><button><a href="{{asset('category/'.$parent->cat_slug)}}">{{$parent->cat_title}}</a></button></li>
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
                <a href="https://pk.linkedin.com/company/sama-engineering" target="_blank"><i class="fa fa-linkedin"></i></a>
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
        <div class="col-6 logo-col">
         <div class="logo">
            <a href="{{url('/revamp')}}"><img src="https://www.samaengineering.com/uploads/logos/logo-mobile.jpeg" alt="" class="img-responsive main-log-navs">
            </a>
         </div>
         <!-- <div class="Hotbg">
            <input type="text" name="" class="Hotbg-txt" placeholder="Search >>>">
            <a href="#" class="Hotbg-btn">
                <i class="fa fa-search"></i>
            </a>
        </div> -->
         <!-- <div class="button-box">
          <button class="btnS"><a style="text-decoration:none;color:white;" href="">Search</a></button>
        </div> -->
        </div>
        <div class="col-2 logo-col">
         <div class="Hotbg">
            <input type="text" name="" class="Hotbg-txt" placeholder="Search >>>">
            <a  href="{{route('revamp.search')}}" class="Hotbg-btn">
                <i class="fa fa-search"></i>
            </a>
        </div>
         <!-- <div class="button-box">
          <button class="btnS"><a style="text-decoration:none;color:white;" href="">Search</a></button>
        </div> -->
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
      </div>
   </div>
</header>

<script>
  // <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</script>

