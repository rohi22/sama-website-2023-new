<style>
.nav-box a{
    color:#282828 !important;
}
.header-inner .content-box .row-1 .btn-box a
{
    font-weight:100 !important;
}
.fa-caret-down{}
.fa-caret-down:hover{
    color:#cf1d25;
}
.custom_country{
    color:#282828;
    font-weight:bold;
    padding-right:5px;
}
@media screen and (max-width: 600px) {
  .hidedowncap {
    display:none;
  }
}
@media screen and (max-width: 600px) {
  .showdowncap {
    display:block;
  }
}
.showdowncap{
    display:none;
}


@media screen and (max-width: 600px) {
  .bg-split-red {
    background-image: none;
    background-color: white;
}
}
.search-btn{
    background:#cf1d25;color:white;border:1px solid #cf1d25;padding-left:5px;padding-right:5px;
}
.getQuote{
    position:fixed;
    bottom:15%;
    right:10px;
    z-index:999;
    padding:10px 15px;
    border-radius:20px;
    background-color:#cf1d25;
    box-shadow: rgb(0 0 0 / 20%) 0px 4px 12px 0px;
    transition:all 0.3s;
    cursor:pointer;
}
.getQuote span{
    color:white;
    font-size:16px;
    font-weight:600;
}
.getQuote:hover{
    box-shadow: rgb(0 0 0 / 35%) 0px 8px 18px 0px;
}
.getQuoteForm{
     z-index:999;
     display:none;
    position:fixed;
    bottom:23%;
    right:25px;
  
    background-color:white;
    box-shadow: rgb(0 0 0 / 35%) 0px 8px 18px 0px;
    border-radius:20px;
}
.getQuoteFormInner{
 padding:0 10px 10px 10px;
    
}
.quote-form-input{
    font-size: 1.4rem;
    padding: .6rem 1rem .6rem 1.5rem;
    margin: 1rem 0;
    border: .1rem solid #afafaf;
    width: 25rem;
    font-weight: 500;
    border: .1rem solid #afafaf;
    width: 25rem;
}
.quote-form-btn{
   
     font-size: 2rem;
    font-weight: 500;
    
    cursor: pointer;
    background-color: #cf1d25 !important;
    color: #fff;
    transition: .5s all ease;
    border: 0;
    font-family: 'Source Sans Pro',sans-serif;
    transition: 300ms ease-out;
}
.showFrm{
    display:block;
}
.quote-form-input:focus{
    transition: .5s all ease;
     transition: 300ms ease-out;
    outline-color:#cf1d25;
}
.quoteHeading{
    border-top-right-radius:20px;
    border-top-left-radius:20px;
    background-color: #cf1d25 !important;
    color: #fff;
    padding:8px 6px;
}
</style>
<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<div class="getQuote">
    <span>Get a Quote</span>
</div>
<div id="openQuoteFrm" class="getQuoteForm animated fadeInDown">
    <div class="quoteHeading">
        <h2 class="text-center font-weight-bold" >Get a Quote</h2>
    </div>
    <form class="getQuoteFormInner" id="quoteForm"> @csrf
    
        {{--
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        --}}
    
        <div class="m-2">
            <textarea  height="100" width="100" class="quote-form-input" placeholder="Message" name="q_message" id="q-message"></textarea>
        </div>
        <div class="m-2"><input class="quote-form-input" type="email" placeholder="Email" name="q_email" id="q-email"></div>
        <div class="m-2"><input class="quote-form-input" type="text" placeholder="Mob/Whatsapp" name="q_num" id="q-num"></div>
        <div class="m-2"><input class="quote-form-btn btn save-quote" id="openQuotebtn" type="button" value="Send"></div>
    </form>
</div>

<div class="container-fluid">
        <div class="my-container">
            <div class="header-inner"> 
                <div class="logo-box">
                    <a href="{{url('/')}}"><img src="{{asset('uploads/logos/'.$logos->header_logo)}}" alt="" class="img-responsive w-100" width="150" height="95" /></a>
                </div> 
                <!---->
                <div class="content-box">
                <div class="row-1 animated fadeInTop" style="margin-top:0px">
                

                        <div class="btn-box animated fadeInDown">

                            <a href="{{url('contact-us')}}" class="btn-top-red">CONTACT US</a>
                            <a href="{{url('about')}}" class="btn-top-red">ABOUT</a>
                            <a href="{{url('spare-parts')}}" class="btn-top-red">SPARE PARTS</a>
                            <a href="{{url('become-an-agent')}}" class="btn-top-red">BECOME AGENT</a>
                            <a href="{{url('e-catalogue')}}" class="btn-top-red">E-CATALOGUE</a>
                            <form style="margin-right:2px;" action="{{url('search')}}">{{csrf_field()}}
                                <div class="input-group" style="">
                                  <input type="text" style="width:150px !important;height:30px;font-size:12px;" placeholder="Search.." class="myeditclass form-control" name="search" value="{{request('search')}}">
                                  <button type="submit" class="fa fa-search search-btn sb" style="padding:6px;margin-right:0px;" value="Search"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                  <!--   <div class="container-fluid " style="margin-top:15px;margin-bottom:15px;">
                <div class="container text-right">
                
                </div>
            </div> -->  
                    <div class="row-2">
                        <div class="nav-box">
                            <a href="{{url('/')}}" class="@if(isset($nav)) @else active @endif"id="navhome">@if(isset($logos->home_icon)) <?php echo $logos->home_icon; ?>@endif</a>
                            @forelse($categories as $i)
                                <a class="hvr-underline-reveal @if(isset($nav) && $nav == $i->id)active @endif" href="{{asset('category/'.$i->cat_slug)}}"  id="{{$i->id}}">{{strtoupper($i->cat_title)}}</a>
                            @empty
                                
                            @endforelse
                        </div>

                        <div class="search-plus-drowpdowns">
                            <div class="dropdown-box">

                                <div class=" dropdown" style="opacity: 0;">
                                    <span class="icon-box">
                                        <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-caret-down"></i>
                                    </span>
                                    <div class="dropdown-content">
                                        <h4>CONTACT DETAILS</h4>
                                        <p>FOR SALES AND INQUIRY</p>
                                        <a href="tel:+{{$footer_content->f_phone_1}}"  target="_blank"rel="noindex nofollow">{{$footer_content->f_phone_1}}</a>
                                        <a href="tel:+{{$footer_content->f_phone_2}}"  target="_blank"rel="noindex nofollow">{{$footer_content->f_phone_2}}</a>
                                        <a href="mailto:{{$footer_content->f_email_1}}" target="_blank"rel="noindex nofollow">{{$footer_content->f_email_1}}</a>
                                        <a href="mailto:{{$footer_content->f_email_2}}" target="_blank"rel="noindex nofollow">{{$footer_content->f_email_2}}</a>

                                    </div>
                                </div>

                                <div class="dropdown">
                                    <span class="icon-box">
                                        <i class="hvr-icon-hang fa fa-phone" aria-hidden="true"></i>
                                        <i class="fa fa-caret-down"></i>
                                    </span>
                                    <div class="dropdown-content" style="padding:0px;">
                                        <h4 style="padding:0px;">CONTACT DETAILS</h4>
                                        <!--<p>FOR SALES AND INQUIRY</p>-->
                                        <!--<a href="tel:+92 345 2266208"  target="_blank" rel="noindex nofollow"><span class="custom_country">PK</span> +92 213 6602467</a>-->
                                        <a style="display:none;" href="tel:+44 20 3290 5278"  target="_blank" rel="noindex nofollow"><span class="custom_country">UK</span> +44 20 3290 5278</a>
                                        <a style="display:none;" href="tel:+1 302 4828132"  target="_blank" rel="noindex nofollow"><span class="custom_country">USA</span> +1 302 4828132</a>
                                        <a style="display:none;" href="tel:+18009823590"  target="_blank" rel="noindex nofollow"><span class="custom_country">TOLL FREE</span> +1-800-982-3590</a>
                                        <a href="mailto:talk@Samaengineering.com" target="_blank" rel="noindex nofollow"><span style="font-size:18px;font-weight:700;color:#282828;"></span><span style="font-size:18px;color:#282828;">talk@Samaengineering.com</span></a>
<a style="display:;" href="tel:{{$footer_content->f_phone_4}}"  target="_blank" rel="noindex nofollow"><span class="custom_country"></span> {{$footer_content->f_phone_4}}</a>
                                    </div>
                                </div>
                                <div class="dropdown" style="display:none;">
                                    <span class="icon-box">
                                         <i class="fa fa-language" aria-hidden="true"></i> 
                                        <strong class="cus_hover">EN</strong>
                                        <i class="fa fa-caret-down"></i>
                                    </span>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        @media screen and (max-width: 600px) {
  #showlogo {
    display: block !important;
  }
}
@media screen and (max-width: 600px) {
  #hidelogo {
    display: none;
  }
}
@media screen and (max-width: 600px) {
  .dynamic-container .dc-inner .content .tab {
    width: 40% !important;
    padding:0px;
  }
}
.sidenav {
  height: 100%;
  width: 180px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color:#710014;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 40px;
}

.sidenav a {
    /*font-weight:bold;*/
  padding: 1px 0px 0px 20px;
  text-decoration: none;
  font-size: 16px;
  color: #fff;
  font-family:'Open Sans', sans-serif;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
    text-decoration:none;
  color: #fff;
}
.sidenav a:active {
    text-decoration:none;
  color: #cf1d25;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  text-decoration:none;
  right: 8px;
  font-size: 18px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
  .sidenav a:active {
      border:none;
      font-size: 18px;}
}
.menutogglebar{
    display:none;
}
@media screen and (max-width: 600px) {
  .menutogglebar{
    display:block;
}
}
.accordion {
    font-family:'Open Sans', sans-serif;
    /*font-weight:bold;*/
  background-color: #710014;
  color: #fff;
  cursor: pointer;
  padding-left: 20px;
  width: 100%;
  
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
  border:none !important;
}

.active, .accordion:hover {
  
}

.panel {
    font-family:'Open Sans', sans-serif;
    /*font-weight:bold;*/
    margin-bottom:0px!important;
  padding: 0px !important;
  display: none;
  background-color: #710014 !important;
  overflow: hidden;
  color:white;
}
.left .right{
    width:25%;
}
.middle{
    width:50%;
}
.column {
  float: left;
  width: 33.33%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
#cusaccordion{
    border:1px solid #282828;
}
.carousel-control{
    height:20%;
    margin-top:25%;
    
} 
.carousel-control.right{
    background-image:none !important;
}
.carousel-control.left{
    background-image:none !important; 
}
.headereffect{
    -webkit-box-shadow: 0 10px 6px -6px #777;
       -moz-box-shadow: 0 10px 6px -6px #777;
            box-shadow: 0 10px 6px -6px #777;
}
.main-log-navs{
    margin-top:16px;margin-left:23%;height:50px;width:54%;
}
@media screen and (max-width:1025px){
    .main-log-navs{
    margin-top: 10px;
    margin-left: 40%;
    height: 50px;
    width: 25%;
    }
}
    </style>
    
    
    
<!--Mobile sidebar-->
    <div class="mobo-menu container-fluid headereffect customheight" style="margin-top:-10px;height:75px !important;padding:0px;">
        <div class="row-1">
                <div class="btn-box text-center" style="padding-bottom:0px;">
                <a class="" style="margin-top:19px;width:15%;float:left;">
                    <i class="menu-btn fa fa-bars" style="margin-top:10px;width:0px !important;padding:0px !important;background-color:white;color:#cf1d25;font-size:22px;"></i>    
                </a>
                </div>
                <div class="logo" style="width:70%;float:left;margin:0 auto;">
                    <a href="https://www.samaengineering.com/">
                        <img src="{{asset('uploads/logos/samalogo.png')}}" alt="" class="img-responsive main-log-navs" width="100%">
                    </a>
                </div>
                <div class="btn-box text-center" onclick="hoverphone()" style="margin-top:28px;width:15%;float:left;">
                        <div class="dropdown">
                                    <span class="icon-box">
                                        <i style="width:0px !important;padding:0px !important;background-color:white;color:#cf1d25;font-size:24px;" class="hvr-icon-hang fa onmouse fa-phone" aria-hidden="true"></i>
                                    </span>
                                    <div class="dropdown-content" id="dropcontent" style="box-shadow:         inset 0 0 5px #000000;padding:10px;">
                                        <h4>CONTACT DETAILS</h4>
                                        <!--<p>FOR SALES AND INQUIRY</p>-->
                                        <a href="tel:+92 345 2266208" target="_blank" rel="noindex nofollow"><span class="custom_country">PK</span> +92 213 6602467</a>
                                        <a href="tel:+44 20 3290 5278" target="_blank" rel="noindex nofollow"><span class="custom_country">UK</span> +44 20 3290 5278</a>
                                        <a href="tel:+1 302 4828132" target="_blank" rel="noindex nofollow"><span class="custom_country">USA</span> +1 302 4828132</a>
                                        <a href="tel:+18009823590" target="_blank" rel="noindex nofollow"><span class="custom_country">TOLL FREE</span> +1-800-982-3590</a>
                                        <a href="mailto:info@Samaengineering.com" target="_blank" rel="noindex nofollow"><span style="font-size:18px;font-weight:700;color:#282828;"></span><span style="font-size:18px;color:#282828;">info@Samaengineering.com</span></a>

                                    </div>
                                </div>
                </div>
                  <!--<div class="dropdown-content">-->
                  <!--  <a href="#">Link 1</a>-->
                  <!--  <a href="#">Link 2</a>-->
                  <!--  <a href="#">Link 3</a>-->
                  <!--</div>-->
    
        </div>
        <style>
            .hoverphone:hover .dropdown-content {display: block;}
            .dropdown-content {
                right:0px;
                display:none;
                  position: absolute;
                  background-color: #f1f1f1;
                  min-width: 160px;
                  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                  z-index: 1;
                }
                
                .dropdown-content a {
                  color: black !important;
                  padding: 2px 6px;
                  font-size:1.4rem;
                  text-decoration: none;
                  display: block;
                }
                .header-inner .content-box .row-2 .search-plus-drowpdowns .dropdown-box .dropdown .icon-box{
                    flex-flow:row !important;
                    width:3rem !important;
                }
        </style>  
        
        <nav class="pushy pushy-left" data-focus="#first-link">
            <div class="pushy-content">
                <ul>
                    @forelse($categories as $parent)
                        @if(sizeof($parent->subcategories) > 0)
                           <li class="pushy-submenu">
                              <button>{{$parent->cat_title}}</button>
                              <ul>
                                @forelse($parent->subcategories as $child)
                                  <li class="pushy-link suby" style="font-size: 12px;"><a href="{{asset('sub-category/'.$child->cat_slug)}}">{{$child->cat_title}}</a></li>
                                @empty
                                @endforelse
                              </ul>
                          </li>
                        @else
                          <li class="pushy-link"><a href="{{asset('category/'.$parent->cat_slug)}}">{{$parent->cat_title}}</a></li>
                        @endif
                      @empty
                    @endforelse
                </ul>
            </div>
        </nav>
        <div class="site-overlay"></div>
    </div>
</header>

<div class="wrapper">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    
    $(document).ready(function(){
    $('.getQuote').click(()=>{
        $('#openQuoteFrm').toggleClass("showFrm")
    })
  $(".onmouse").mouseover(function(){
    $(".dropdown-content").css("display", "block");
  });
  $(".onmouse").mouseout(function(){
    $(".dropdown-content").css("display", "none");
  });
});

    $('.save-quote').click( function(){
       
       $.ajax({
            url: "{{ url('save-quote') }}",
            type: 'post',
            dataType: 'json',
            data: $('#quoteForm').serialize(),
            success: function(res) {
                
                if(res.status == 'success'){
                    
                }
                else if(res.status == 'success'){
                    
                }
                $('#quoteForm').trigger("reset")
                location.reload();
                // console.log('res', res);
            }
        });
        
    });

    </script>