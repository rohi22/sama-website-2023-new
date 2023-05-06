@extends('master_layout')
@section('main')
<meta name="description" content="Sama Engineering is offering an opportunity for the companies present in the market to apply for working as an agent for Sama and become a part of our manufacturing industry."/>
<meta name="robots" content="follow,index,"/>
<link rel="canonical" href="{{URL::current()}}" />
@endsection

@section('og_page_wise')
<meta property="og:locale" content="en_PK">
<meta property="og:type" content="website">
<meta property="og:title" content="Opportunity to Become An Agent for Sama Engineering | Visit Website">
<meta property="og:description" content="Sama Engineering is offering an opportunity for the companies present in the market to apply for working as an agent for Sama and become a part of our manufacturing industry.">
<meta property="og:url" content="{{URL::current()}}">
<meta property="og:site_name" content="SAMA ENGINEERING">
@endsection

@section('twitter')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Opportunity to Become An Agent for Sama Engineering | Visit Website">
<meta name="twitter:description" content="Sama Engineering is offering an opportunity for the companies present in the market to apply for working as an agent for Sama and become a part of our manufacturing industry.">
<meta name="twitter:site" content="@InsectMarketing">
<meta name="twitter:creator" content="@InsectMarketing">
@endsection
@section('title')
Opportunity to Become An Agent for Sama Engineering | Visit Website -
@endsection
@section('content')
<style> 
    @media  screen and (max-width: 600px) {
  #hide_catalogue {
    display:none;
  }
  .mybox{
      display:none !important;
  }
}
.customheight{
    height:60px !important;
}
</style>
<style type="text/css">

@media screen and (max-width: 600px) {
  #removeboxmargin {
    margin-right:0px !important;
  }
}
.contact-form .flex-it .box {
    margin: 0 auto;
    margin-bottom: 2rem;
}

.flex-it{
    width: 100%;margin: 0 auto;float: none;
}
@media (max-width: 900px){
    .flex-it{
        width: 100%;margin: 0 auto;float: none;
    }
}
@media screen and (max-width: 600px) {
  #inputfields {
    width:290px!important;
  }
}
@media screen and (max-width: 600px) {
  .iinput {
    width:290px!important;
  }
}
@media screen and (max-width: 600px) {
  #inputcustom {
    margin-right:0px!important;
  }
}

.modal-dialog {
    max-width: 300px!important;
    margin: 1.75rem auto;
}
.maancaptchainputs{
    width:8% !important;height:30px;border:none!important;
}
</style>

    <div class="container-fluid bg-breed-crumb" style="background:#e2e2e2;">
        <div class="my-container" style="">
            <div class="breed-crumb-box">
                <a href="{{url('/')}}"><i style="border-right:2px solid black;padding-right:10px;" class="fa fa-home"></i></a>
                <a href="{{url('/become-an-agent')}}" class="active">Become An Agent </a>
            </div>
            <!-- Breed Crumbs -->
        </div>
    </div>
    <!-- ------------------------------------------ Contact Us -->
    <div class="container-fluid">
        <div class="my-container pt-5">
            <div class="heading-contact-us" style="padding:0px;">
                <h1>BECOME AN AGENT</span></h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="contact-us">            
                <p style="text-align: -webkit-center;padding:10px;">
                    Since <b style="font-size:18px;">1978</b> we manufacture quality packaging machines and processing systems in <b style="font-size:18px;">Pakistan</b> as well as in international market, now <b style="font-size:18px;">Sama</b> Engineering is looking for experienced and dynamic company to became a part of Sama Engineering.</p>
                    <p style="text-align: -webkit-center;padding:5px;"> 
                    We promise to build a long term healthy business relationship.</p>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
                <div class="container">
        <div class="row">
                    <div class="col-md-12" style="margin-bottom:20px;box-shadow: 0px 5px 8px 5px #ddd;background-color:#f5f5f5;">
                    @if(session()->has('message'))
                            <div class="uk-alert uk-alert-success" data-uk-alert="" style="text-align: center;padding-top: 10px;">
                                <a href="#" class="uk-alert-close uk-close"></a>
                                {{ session()->get('message') }}
                            </div>
                    @endif
                    <form method="post" action="{{url('/become-an-agent/submit')}}">{{csrf_field()}}
                        <div class="contact-form" style="max-width:100%;">
                          
                                <div class="flex-it" style="padding-top:20px;margin-left:0px;margin-right:0px;width:100%;">
                                    <div class="box">
                                        <div class="input-group mb-2">

                                            <input id="inputfields" style="width:300px;color:#888;" type="text" class="form-control-md" id="inlineFormInputGroup" placeholder="Name (Required)" name="name" value="{{old('name')}}" >
                                        <div class="input-group-prepend">
                                                <div  class="input-group-text"><i class="far fa-user"></i></div>
                                            </div>
                                            
                                        </div>

                                        <p style="color:red;">@if($errors->has('name')) {{ $errors->first('name') }} @endif</p>
                                    </div>
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            
                                            <input id="inputfields" style="width:300px;color:#888;" type="email" class="form-control-md" id="inlineFormInputGroup" placeholder="Email (Required)" name="email" value="{{old('email')}}" ><div class="input-group-prepend">
                                                <div class="input-group-text"><i class="far fa-envelope"></i></div>
                                            </div>
                                        </div>
                                         <p style="color:red;">@if($errors->has('email')) {{ $errors->first('email') }} @endif</p>
                                    </div>
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            
                                            <input id="inputfields" style="width:300px;color:#888;" type="text" class="form-control-md" id="inlineFormInputGroup" placeholder="Contact" name="phone" value="{{old('phone')}}" >
                                        <div class="input-group-prepend">
                                                <div class="input-group-text"><i style="padding:0.5rem 0.35rem;font-size:16px;" class="fa fa-phone"></i></div>
                                            </div>
                                        </div>
                                        <p style="color:red;">@if($errors->has('phone')) {{ $errors->first('phone') }} @endif</p>
                                    </div>
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            
                                            <input id="inputfields" style="width:300px;color:#888;" type="text" class="form-control-md" id="inlineFormInputGroup" placeholder="Company (Required)" name="company" value="{{old('company')}}" >
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i style="padding:0.5rem 0.3rem;font-size:16px;" class="fa fa-users"></i></div>
                                            </div>
                                        </div>
                                        <p style="color:red;">@if($errors->has('company')) {{ $errors->first('company') }} @endif</p>
                                    </div>
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            
                                            <select style="background-color:white;width:300px;border:none;border-bottom:1px solid #282828;border-right:1px solid #282828;color:#888;font-size: 1.5rem;
                                                padding: 0 0.5rem;" class="iinput form-control-md" name="country" id="country" >
                                                <option value="">Select Country</option>
                                                @forelse($countries as $i)
                                                    <option value="{{$i->Code}}">{{$i->Name}}</option>>
                                                @empty
                                                @endforelse
                                            </select>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i style="padding:0.5rem 0.3rem;font-size:16px;" class="fa fa-globe"></i></div>
                                            </div>
                                        </div>
                                          <p style="color:red;">@if($errors->has('country')) {{ $errors->first('country') }} @endif</p>
                                    </div>
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            
                                            <select style="color:#888;font-size: 1.5rem;
                                                padding: 0 0.5rem;width:300px;border:none;background-color:white;border-bottom:1px solid #282828;border-right:1px solid #282828;" class="iinput form-control-md" name="city" id="city">
                                                <option value="">Select City</option>
                                                
                                            </select>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i style="padding:0.5rem 0.3rem;font-size:16px;" class="fa fa-building"></i></div>
                                            </div>
                                        </div>
                                         <p style="color:red;">@if($errors->has('city')) {{ $errors->first('city') }} @endif</p>
                                    </div>
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            
                                            <textarea style="font-size: 1.5rem;
                                                padding: 0 1rem;width:300px;border:none;border-bottom:1px solid #282828;border-right:1px solid #282828;color:#888;" class="iinput form-control" id="" rows="3" placeholder="Why you want to become an agent?" name="become_agent" value="{{old('become_agent')}}">{{old('become_agent')}}</textarea>
                                                <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-pencil-alt"></i>
                                                </div>
                                            </div>
                                    </div>
                                     <p style="color:red;">@if($errors->has('become_agent')) {{ $errors->first('become_agent') }} @endif</p>
                                    </div>
                                    
                                    
                                    <div class="box" style="margin:0 auto;">
                                        <div class="input-group mb-2">
                                            
                                            <textarea style="font-size: 1.5rem;
                                            padding: 0 1rem;width:300px;border:none;border-bottom:1px solid #282828;border-right:1px solid #282828;color:#888;" class="iinput form-control"  rows="3" placeholder="Do you represent any other company (Yes No)" name="other_company" value="{{old('other_company')}}">{{old('other_company')}}</textarea>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-pencil-alt"></i>
                                                </div>
                                            </div>
                                    </div>
                                     <p style="color:red;">@if($errors->has('other_company')) {{ $errors->first('other_company') }} @endif</p>
                                    </div>
                                    <div class="box mybox" style="visibility:hidden !important;">
                                        <div class="input-group mb-2">
                                            
                                            <textarea style="font-size: 1.5rem;
                                                padding: 0 1rem;width:300px;border:none;border-bottom:1px solid #282828;border-right:1px solid #282828;color:#888;" class="iinput form-control" id="" rows="3" placeholder="Why you want to become an agent?" name="become_agent" value="{{old('become_agent')}}">{{old('become_agent')}}</textarea>
                                                <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-pencil-alt"></i>
                                                </div>
                                            </div>
                                    </div>
                                     <p style="color:red;">@if($errors->has('become_agent')) {{ $errors->first('become_agent') }} @endif</p>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="box" style="margin:0 auto;">
                                        <div class="input-group mb-2">
                                            
                                             <div class="captcha text-center" style="margin:0 auto;">
                                           
                                           <input class="maancaptchainputs" type="text" value="{{(mt_rand(10,100))}}" readonly id="num1">
                                           
                                           <span style="font-size:25px;font-weight:600;padding-left:5px;padding-right:5px;">+</span>
                                           
                                           <input class="maancaptchainputs" type="text" value="{{(mt_rand(10,100))}}" readonly id="num2">
                                           
                                           <span style="font-size:25px;font-weight:600;padding-left:5px;padding-right:5px;">=</span>
                                           
                                           <input style="border:1px solid black!important;" class="maancaptchainputs" type="text" id="captcha" name="captcha" onfocusout="checkCaptcha()">

                                            <span style="margin-left:5px;" id="captcha_refresh"><i class="fa fa-refresh" style="cursor: pointer;"></i></span>
                                             <p style="color:red;" id="captcha_error">@if($errors->has('captcha')) {{ $errors->first('captcha') }} @endif</p>
                                           </div>
                                        
                                        </div>
                                        </div>

                                    </div>
                                    </div>
                                    </div>
                                    <div class="box" style="margin:0 auto;width: 200px;">
                                        <div class="input-group mb-2">
                                            <button type="submit"  class="btn" style="margin-top:10px;margin-left;20px!important;display:block;color:white;background-color:#cf1d25;width:100%;text-align:center;font-size:14px;">SUBMIT</button>
                                    </div>
                                    </div>
                                    
                          </form>

                </div>
                
        </div>
            </div>
        </div>
    </div>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>


$(document).ready(function(){
      $("#country").change(function(){
        var country = $(this).val();

        $.ajax({
              url: "{{url('/get_city')}}",
              type: 'POST',
              data: {country:country,_token:'{{ csrf_token() }}'},
              success: function(res)
               {
                $("#city").html(res);
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
 <script type="text/javascript">
    $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).is(":checked")){
                $("#become_agent").css('display','block');
            }
            else if($(this).is(":not(:checked)")){
                $("#become_agent").css('display','none');   
            }
        });
    });
</script>

@endsection

