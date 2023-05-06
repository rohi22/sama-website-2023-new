@extends('master_layout')
@section('main')
<meta name="description" content="Please Feel Free to Contact Sama Engineering for any query and further detailing. We are just a call away and will surely resolve all the issues of our customers on time."/>
<meta name="robots" content="follow,index,"/>Please Feel Free to Contact Sama Engineering for any query and further detailing. We are just a call away and will surely resolve all the issues of our customers on time.
<link rel="canonical" href="{{URL::current()}}" />
@endsection

@section('og_page_wise')
<meta property="og:locale" content="en_PK">
<meta property="og:type" content="website">
<meta property="og:title" content="{!! $logos->meta_title !!}">
<meta property="og:description" content="Please Feel Free to Contact Sama Engineering for any query and further detailing. We are just a call away and will surely resolve all the issues of our customers on time.">
<meta property="og:url" content="{{URL::current()}}">
<meta property="og:site_name" content="SAMA ENGINEERING">
@endsection

@section('twitter')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{!! $logos->meta_title !!}">
<meta name="twitter:description" content="Please Feel Free to Contact Sama Engineering for any query and further detailing. We are just a call away and will surely resolve all the issues of our customers on time.">
<meta name="twitter:site" content="@InsectMarketing">
<meta name="twitter:creator" content="@InsectMarketing">
@endsection
@section('title')
    Contact Us -
@endsection
@section('content')
<style>
    @media  screen and (max-width: 600px) {
  #hide_catalogue {
    display:none;
  }
}
.maancaptchainputs{
    width:8% !important;height:30px;border:none!important;
}
#captcha_img > span > img{
        width: 200px;
    height: 100px;
}
#show_catalogue{
    display:none;
}
@media  screen and (max-width: 600px) {
  #show_catalogue {
    display:block !important;
  }
}
@media  screen and (max-width: 600px) {
  .contact-us .row-2 .box-cont .text-material {
    padding: 0px;
}
}
.contact-form .flex-it .box {
    margin:0 auto;
    margin-bottom: 2rem;
}
.customheight{
    height:60px !important;
}

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
                  color: black;
                  padding: 2px 6px !important;
                  font-size:1.4rem;
                  text-decoration: none;
                  display: block;
                }
</style>
    <!-- ------------------------------------------ Contact Us -->
    <div class="container-fluid bg-breed-crumb" style="background:#e2e2e2;">
        <div class="my-container" style="">
            <div class="breed-crumb-box">
                <a href="{{url('/')}}"><i style="border-right:2px solid black;padding-right:10px;" class="fa fa-home"></i></a>
                <a href="{{url('/contact-us')}}" class="active">Contact Us </a>
            </div>
            <!-- Breed Crumbs -->
        </div>
    </div>
    <div class="container-fluid">
        <div class="my-container pt-5 pb-5" style="padding-top:0px !important;">
            <div class="heading-contact-us">
                <h1 style="text-transform:uppercase;"></br>{{$data->title}}</h1>
            </div>
            <div class="contact-us">
                <div class="row-2 show_catalogue" id="show_catalogue">
                    
                    <div class="box-cont">
                        <div class="text-material rempadmobile">
                            <h4>{{$data->s_4_name}}</h4>
                            <div class="heading-primary">
                                <h1 style="text-align: left; line-height: 1.1;">{{$data->s_4_title}}</h1>
                            </div>
                            <p>{{$data->s_4_address}}</p>
                            <div class="num-mail">
                                <a href="tel:{{$data->s_4_phone}}"><i class="fas fa-phone-volume"></i> {{$data->s_4_phone}}</a>
                                <a href="mailto:{{$data->s_4_email}}"><i class="far fa-envelope"></i> {{$data->s_4_email}}</a>
                            </div>
                            
                            <button type="button" style="border-radius:50px !important;display:none;" class="btn-main mt-3" data-toggle="modal" data-target="#exampleModal">
                                GET A QUOTE
                            </button>
                        
                        </div>
                    </div>
                                    <div class="my-row " id="show_catalogue" style="margin-top:30px;margin-bottom:30px;display:none !important;">
                    <div class="box">

                        <div class="flag-num">
                            <div class="box-2">
                                <div class="flag-image">
                                    <img src="/dist/imgs/flags/uk.jpg" alt="" class="img-thumbnail">
                                </div>
                                <div class="text">
                                    <a href="javascript:;">{{$data->s_1_name}}</a>
                                    <a href="tel:{{$data->s_1_phone}}"><i class="fas fa-phone-volume"></i>{{$data->s_1_phone}}</a>
                                    <a href="mailto:{{$data->s_1_email}}"><i class="far fa-envelope"></i>{{$data->s_1_email}}</a>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                    <div class="box">

                        <div class="flag-num">
                            <div class="box-2">
                                <div class="flag-image">
                                    <img src="/dist/imgs/flags/us.jpg" alt="" class="img-thumbnail">
                                </div>
                                <div class="text">
                                    <a href="javascript:;">{{$data->s_2_name}}</a>
                                    <a href="tel:{{$data->s_2_phone}}"><i class="fas fa-phone-volume"></i>{{$data->s_2_phone}}</a>
                                    <a href="mailto:{{$data->s_2_email}}"><i class="far fa-envelope"></i>{{$data->s_2_email}}</a>
                                </div>
                            </div>
                        </div>
                     
                    </div>
                    <div class="box">

                        <div class="flag-num">
                            <div class="box-2">
                                <div class="flag-image">
                                    <img src="/dist/imgs/flags/tollfree.png" alt="" class="img-thumbnail">
                                </div>
                                <div class="text">
                                    <a href="javascript:;">{{$data->s_3_name}}</a>
                                    <a href="tel:{{$data->s_3_phone}}"><i class="fas fa-phone-volume"></i>{{$data->s_3_phone}}</a>
                                    <a href="mailto:{{$data->s_3_email}}"><i class="far fa-envelope"></i>{{$data->s_3_email}}</a>

                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                    <div class="box-map">
                        <iframe src="https://maps.google.com/maps?q=sama%20engineering&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            width="100%" height="380" frameborder="0" style="border:0; padding-top: 1rem"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <div class="my-row" id="hide_catalogue" style="display:none;">
                    <div class="box">

                        <div class="flag-num">
                            <div class="box-2">
                                <div class="flag-image">
                                    <img src="/dist/imgs/flags/uk.jpg" alt="" class="img-thumbnail">
                                </div>
                                <div class="text">
                                    <a href="javascript:;">{{$data->s_1_name}}</a>
                                    <a href="tel:{{$data->s_1_phone}}"><i class="fas fa-phone-volume"></i>{{$data->s_1_phone}}</a>
                                    <a href="mailto:{{$data->s_1_email}}"><i class="far fa-envelope"></i>{{$data->s_1_email}}</a>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                    <div class="box">

                        <div class="flag-num">
                            <div class="box-2">
                                <div class="flag-image">
                                    <img src="/dist/imgs/flags/us.jpg" alt="" class="img-thumbnail">
                                </div>
                                <div class="text">
                                    <a href="javascript:;">{{$data->s_2_name}}</a>
                                    <a href="tel:{{$data->s_2_phone}}"><i class="fas fa-phone-volume"></i>{{$data->s_2_phone}}</a>
                                    <a href="mailto:{{$data->s_2_email}}"><i class="far fa-envelope"></i>{{$data->s_2_email}}</a>
                                </div>
                            </div>
                        </div>
                     
                    </div>
                    <div class="box">

                        <div class="flag-num">
                            <div class="box-2">
                                <div class="flag-image">
                                    <img src="/dist/imgs/flags/tollfree.png" alt="" class="img-thumbnail">
                                </div>
                                <div class="text">
                                    <a href="javascript:;">{{$data->s_3_name}}</a>
                                    <a href="tel:{{$data->s_3_phone}}"><i class="fas fa-phone-volume"></i>{{$data->s_3_phone}}</a>
                                    <a href="mailto:{{$data->s_3_email}}"><i class="far fa-envelope"></i>{{$data->s_3_email}}</a>

                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>

                <div class="row-2" id="hide_catalogue">
                    <div class="box-map">
                        <iframe src="https://maps.google.com/maps?q=sama%20engineering&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            width="100%" height="620" frameborder="0" style="border:0; padding-top: 1rem"
                            allowfullscreen></iframe>
                    </div>
                    <div class="box-cont">
                        <div class="text-material">
                            <h4>{{$data->s_4_name}}</h4>
                            <div class="heading-primary">
                                <h1 style="text-align: left; line-height: 1.1;">{{$data->s_4_title}}</h1>
                            </div>
                            <p>{{$data->s_4_address}}</p>
                            <div class="num-mail mb-2">
                                <div class='row'>
                                    <div class='col-md-6'>
                                <a href="tel:{{$data->s_4_phone}}" style="font-size:1.8rem;color:#000 !important;"><i style="padding-right:10px;" class="fa fa-mobile" aria-hidden="true"></i>{{$data->s_4_phone}}</a>
                                    </div>
                                    <div class='col-md-6'>
                                <a style="font-size:1.8rem !important;color:#000 !important;" href="mailto:{{$data->s_4_email}}"><i style="padding-right:10px;" class="fa fa-envelope"></i>{{$data->s_4_email}}</a>
                                    </div>
                                </div> 
                                <!--<a href="" style="font-size:1.8rem;"><i style="padding-right:10px;" class="fas fa-phone-volume"></i>+92 21 36602467</a>
                                <a href="" style="font-size:1.8rem;"><i style="padding-right:10px;" class="fas fa-phone-volume"></i>+92 21 36603311</a>-->
                            </div>
                            <button type="button" style="border-radius:50px !important;display:none;" id="quote" class="btn-main mt-3" data-toggle="modal" data-target="#exampleModal">
                                GET A QUOTE
                            </button>
                            @if(session()->has('message'))
                                    <div class="uk-alert uk-alert-success" data-uk-alert="">
                                        <a href="#" class="uk-alert-close uk-close"></a>
                                        {{ session()->get('message') }}
                                    </div>
                            @endif
                             <form action="javascript:;" method="post">{{csrf_field()}}
                        <div class="contact-form">
                                <h1 class="heading-form">CONTACT FORM</h1>
                                <div class="flex-it">
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            
                                            <input style="color:#888;border: 1px solid black;" type="text" class="form-control-md" placeholder="Name" name="c_name" value="{{old('name')}}" id="c_name">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div>
                                        <p style="color:red;" id="c_name_error"></p>
                                    </div>
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            <input style="color:#888;border: 1px solid black;" type="email" class="form-control-md" placeholder="Email" name="email" value="{{old('email')}}" id="c_email">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                                            </div>
                                        </div>
                                        <p style="color:red;" id="c_email_error"></p>
                                    </div>
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            <input style="color:#888;border: 1px solid black;padding: 7px;" type="text" class="form-control-md" placeholder="Contact" name="phone" value="{{old('phone')}}" id="c_phone">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-phone" style="font-size: 18px;"></i></div>
                                            </div>
                                        </div>
                                        <p style="color:red;" id="c_phone_error"></p>
                                    </div>
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            
                                            <select style="color:#888;width: 200px;" type="text" class="form-control-md" name="country" value="{{old('country')}}" id="c_country">
                                                <option value="">Select Country</option>
                                                @forelse($countries as $i)
                                                    <option value="{{$i->Code}}">{{$i->Name}}</option>>
                                                @empty
                                                @endforelse
                                            </select>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-building"></i></div>
                                            </div>
                                        </div>
                                        <p style="color:red;" id="c_country_error"></p>
                                    </div>
                                     <div class="box">
                                        <div class="input-group mb-2">
                                            
                                            <select style="color:#888;width: 200px;"class="form-control-md" name="city" value="{{old('city')}}" id="c_city">
                                                <option value="" selected>Select City</option>
                                            </select>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-building"></i></div>
                                            </div>
                                        </div>
                                        <p style="color:red;" id="c_city_error"></p>
                                    </div>
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            
                                            <input style="color:#888;border: 1px solid black;" type="text" class="form-control-md" placeholder="Company / Organization" name="company" value="{{old('company')}}" id="c_company">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-building"></i></div>
                                            </div>
                                        </div>
                                        <p style="color:red;" id="c_company_error"></p>
                                    </div>
                                </div>
                                <div class="input-group mb-2">
                                    <textarea style="color:#888;border: 1px solid black;" class="form-control" style="border-left:0px;" rows="3" placeholder="Your Message..." name="msg" value="{{old('msg')}}" id="c_msg">{{old('msg')}}</textarea>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="background-color:#282828;border:none;"><i class="fa fa-pencil" style="font-size:18px;"></i></div>
                                    </div>
                                </div>
                                
                                <div class="input-group mb-2">
                                    <div class="g-recaptcha" data-sitekey="6LcHXEEaAAAAALhRDb5Pt1pHwloAfU0gUIpVeBiu" style="width: desired_width;border-radius: 4px;border-right: 1px solid #d8d8d8;overflow: hidden;"></div>
                                </div>
                                <p style="color:red;" id="captcha_error" class="captcha_error">@if($errors->has('captcha')) {{ $errors->first('captcha') }} @endif</p>
                        
                        <!--        <p style="color:red;" id="c_msg_error"></p>-->
                        <!--        <div class="col-md-12">-->
                        <!--    <div class="box" style="margin:0 auto;">-->
                        <!--    <div class="input-group mb-2">-->
                                
                        <!--         <div class="captcha text-center" style="margin:0 auto;">-->
                               
                        <!--       <input class="maancaptchainputs" type="text" value="{{(mt_rand(10,100))}}" readonly id="num1">-->
                               
                        <!--       <span style="font-size:25px;font-weight:600;padding-left:5px;padding-right:5px;">+</span>-->
                               
                        <!--       <input class="maancaptchainputs" type="text" value="{{(mt_rand(10,100))}}" readonly id="num2">-->
                               
                        <!--       <span style="font-size:25px;font-weight:600;padding-left:5px;padding-right:5px;">=</span>-->
                               
                        <!--       <input style="border:1px solid black!important;" class="maancaptchainputs" name="captcha" type="text" id="captcha" onfocusout="checkCaptcha()">-->

                        <!--        <span style="margin-left:5px;" id="captcha_refresh"><i class="fa fa-refresh" style="cursor: pointer;"></i></span>-->
                        <!--        <p style="color:red;" id="captcha_error">@if($errors->has('captcha')) {{ $errors->first('captcha') }} @endif</p>-->
                        <!--       </div>-->
                        
                        <!--    </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--        <p style="color:red;" id="captcha_error"></p>-->
                                <button class="btn-form-submit" type="submit" id="contact_submit" onclick="contactSubmit()">SUBMIT</button>
                                <p class="alert alert-success success_msg" style="text-align: center;display:none;" id="success_msg"></p>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Button trigger modal -->

    <!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="width: 100%; height:100%; display: flex; justify-content: center; align-items: center;">
            <div class="modal-content" style="background-color: rgba(255, 255, 255, 0.952);">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: #000000; font-weight: 800; font-size: 25px;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('app.alerts')
                    <!-- {{url('/home/user-detail-submit')}} -->
                    <form action="javascript:;" method="post">{{csrf_field()}}
                        <div class="contact-form">
                                <h1 class="heading-form">CONTACT FORM</h1>
                                <div class="flex-it">
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            
                                            <input style="color:#888;" type="text" class="form-control-md" placeholder="Name" name="c_name" value="{{old('name')}}" id="c_name">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="far fa-user"></i></div>
                                            </div>
                                        </div>
                                        <p style="color:red;" id="c_name_error"></p>
                                    </div>
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            <input style="color:#888;" type="email" class="form-control-md" placeholder="Email" name="email" value="{{old('email')}}" id="c_email">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="far fa-envelope"></i></div>
                                            </div>
                                        </div>
                                        <p style="color:red;" id="c_email_error"></p>
                                    </div>
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            <input style="color:#888;" type="text" class="form-control-md" placeholder="Contact" name="phone" value="{{old('phone')}}" id="c_phone">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-mobile-alt"></i></div>
                                            </div>
                                        </div>
                                        <p style="color:red;" id="c_phone_error"></p>
                                    </div>
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            
                                            <select style="color:#888;width: 200px;" type="text" class="form-control-md" name="country" value="{{old('country')}}" id="c_country">
                                                <option value="">Select Country</option>
                                                @forelse($countries as $i)
                                                    <option value="{{$i->Code}}">{{$i->Name}}</option>>
                                                @empty
                                                @endforelse
                                            </select>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="far fa-building"></i></div>
                                            </div>
                                        </div>
                                        <p style="color:red;" id="c_country_error"></p>
                                    </div>
                                     <div class="box">
                                        <div class="input-group mb-2">
                                            
                                            <select style="color:#888;width: 200px;"class="form-control-md" name="city" value="{{old('city')}}" id="c_city">
                                                <option value="" selected>Select City</option>
                                            </select>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="far fa-building"></i></div>
                                            </div>
                                        </div>
                                        <p style="color:red;" id="c_city_error"></p>
                                    </div>
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            
                                            <input style="color:#888;" type="text" class="form-control-md" placeholder="Company / Organization" name="company" value="{{old('company')}}" id="c_company">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="far fa-building"></i></div>
                                            </div>
                                        </div>
                                        <p style="color:red;" id="c_company_error"></p>
                                    </div>
                                </div>
                                <div class="input-group mb-2">
                                    <textarea style="color:#888;" class="form-control" style="border-left:0px;" rows="3" placeholder="Your Message..." name="msg" value="{{old('msg')}}" id="c_msg">{{old('msg')}}</textarea>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="background-color:#282828;border:none;"><i class="fas fa-pencil-alt"></i></div>
                                    </div>
                                </div>
                                <p style="color:red;" id="c_msg_error"></p>
                                <div class="col-md-12">
                            <div class="box" style="margin:0 auto;">
                            <div class="input-group mb-2">
                                
                                 <div class="captcha text-center" style="margin:0 auto;">
                               
                               <input class="maancaptchainputs" type="text" value="{{(mt_rand(10,100))}}" readonly id="num1">
                               
                               <span style="font-size:25px;font-weight:600;padding-left:5px;padding-right:5px;">+</span>
                               
                               <input class="maancaptchainputs" type="text" value="{{(mt_rand(10,100))}}" readonly id="num2">
                               
                               <span style="font-size:25px;font-weight:600;padding-left:5px;padding-right:5px;">=</span>
                               
                               <input style="border:1px solid black!important;" class="maancaptchainputs" name="captcha" type="text" id="captcha" onfocusout="checkCaptcha()">

                                <span style="margin-left:5px;" id="captcha_refresh"><i class="fa fa-refresh" style="cursor: pointer;"></i></span>
                                <p style="color:red;" id="captcha_error">@if($errors->has('captcha')) {{ $errors->first('captcha') }} @endif</p>
                               </div>
                        
                            </div>
                            </div>
                        </div>
                                <p style="color:red;" id="captcha_error"></p>
                                <button class="btn-form-submit" type="submit" id="contact_submit" onclick="contactSubmit()">SUBMIT</button>
                                <p class="alert alert-success success_msg" style="text-align: center;display:none;" id="success_msg"></p>
                            </div>
                          </form>

                </div>
              
            </div>
        </div>
    </div>
    
    
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>


$(document).ready(function(){
    // $("#quote").trigger("click");
});


//  alert('dfdsf');
//  $('#exampleModal').css('display','block');
 
// $('#exampleModal').modal('show');

function contactSubmit()
{
    var c_name      = $('#c_name').val();
    var c_email     = $('#c_email').val();
    var c_phone     = $('#c_phone').val();
    var c_country   = $('#c_country').val();
    var c_city      = $('#c_city').val();
    var c_company   = $('#c_company').val();
    var c_msg       = $('#c_msg').val();
    var c_captcha   = $('#captcha').val();

    $.ajax({
      url: "{{url('/home/user-detail-submit')}}",
      type: 'POST',
      data: {
          name:c_name,
          email:c_email,
          phone:c_phone,
          country:c_country,
          city:c_city,
          company:c_company,
          msg:c_msg,
        //   captcha:c_captcha,
        captcha: grecaptcha.getResponse(),
          _token:'{{ csrf_token() }}'
          
      },
      beforeSend:function(){
        $("#c_name_error").html(' ');
        $("#c_email_error").html(' ');
        $("#c_phone_error").html(' ');
        $("#c_company_error").html(' '); 
        $("#c_msg_error").html(' ');   
        $(".captcha_error").html(' ');
        $("#c_country_error").html(' ');
        $("#c_city_error").html(' ');
        // $(".success_msg").css('display','block').html(null);
      },
      success: function(res)
       {
        //   console.log(res);  return false;
            if(res.error){
                $(".captcha_error").html(res.error); return false;
            }else{
                $("#c_name").val(null);
                $("#c_email").val(null);
                $("#c_phone").val(null);
                $("#c_company").val(null); 
                $("#c_msg").val(null);   
                $("#captcha").val(null);
                $("#c_country").val(null);
                $("#c_city").val(null);
                
                grecaptcha.reset();
                
                $(".success_msg").css('display','block').html(res);
            }

       },
       error: function(res)
       {
           $(".success_msg").css('display','none').html(null);
           var data = res.responseJSON;
            $.each(data.errors,function(k,v){
                if(k == 'name')
                {
                    $("#c_name_error").html(v);
                }
                else if(k == 'email')
                {
                    $("#c_email_error").html(v);
                }
                else if(k == 'phone')
                {
                    $("#c_phone_error").html(v);
                }
                else if(k == 'country')
                {
                    $("#c_country_error").html(v);
                }
                else if(k == 'city')
                {
                    $("#c_city_error").html(v);
                }
                else if(k == 'company')
                {
                    $("#c_company_error").html(v);
                }
                else if(k == 'msg')
                {
                    $("#c_msg_error").html(v);
                }
                else if(k == 'captcha')
                {
                    $("#captcha_error").html(v);
                }
            });
        
       }
    });

}
$(document).ready(function(){
    
//   
    
    
    // $('#exampleModal').show();
    
      $("#c_country").change(function(){
        var country = $(this).val();

        $.ajax({
              url: "{{url('/get_city')}}",
              type: 'POST',
              data: {country:country,_token:'{{ csrf_token() }}'},
              success: function(res)
               {
                $("#c_city").html(res);
                console.log(res);
                
               },
               error: function(res)
               {
                console.log(res);
               }
            });
      });
});
</script>

@endsection

