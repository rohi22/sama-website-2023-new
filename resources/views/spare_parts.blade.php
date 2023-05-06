@extends('master_layout')
@section('main')
<meta name="description" content="Spare Parts are the different individual pieces that are combined together to form a whole structure in the form of machines such as spare parts of the Snack Packing Machine."/>
<meta name="robots" content="follow,index,"/>
<link rel="canonical" href="{{URL::current()}}" />
@endsection

@section('og_page_wise')
<meta property="og:locale" content="en_PK">
<meta property="og:type" content="website">
<meta property="og:title" content="High Quality and Extremely Useful Spare Parts of the Machines | Sama">
<meta property="og:description" content="Spare Parts are the different individual pieces that are combined together to form a whole structure in the form of machines such as spare parts of the Snack Packing Machine.">
<meta property="og:url" content="{{URL::current()}}">
<meta property="og:site_name" content="SAMA ENGINEERING">
@endsection

@section('twitter')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="High Quality and Extremely Useful Spare Parts of the Machines | Sama">
<meta name="twitter:description" content="Spare Parts are the different individual pieces that are combined together to form a whole structure in the form of machines such as spare parts of the Snack Packing Machine.">
<meta name="twitter:site" content="@InsectMarketing">
<meta name="twitter:creator" content="@InsectMarketing">
@endsection
@section('title')
High Quality and Extremely Useful Spare Parts of the Machines | Sama - 
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
.customheight{
    height:60px !important;
}
</style>
<style type="text/css">
.flex-it{
    width: 520px;margin: 0 auto;float: none; 
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
  .imap {
    margin-top:30px;
  }
}
@media screen and (max-width: 600px) {
  .iinput {
    width:290px!important;
  }
}
.contact-form .flex-it .box {
    margin: 0 auto;
    margin-bottom: 2rem;
} 
.modal-dialog {
    max-width: 300px!important;
    margin: 1.75rem auto;
}
</style>

<div class="container-fluid bg-breed-crumb" style="background:#e2e2e2;">
        <div class="my-container" style="">
            <div class="breed-crumb-box">
                <a href="{{url('/')}}"><i style="border-right:2px solid black;padding-right:10px;" class="fa fa-home"></i></a>
                <a href="{{url('/spare-parts')}}" class="active">Spare Parts </a>
            </div>
            <!-- Breed Crumbs -->
        </div>
    </div>
    <!-- ------------------------------------------ Contact Us -->
    <div class="container-fluid">
        <div class="my-container pt-5">
            <div class="col-md-12 heading-contact-us" style="padding:0px;">
                <h1>SPARE PARTS</span></h1>
            </div>
        </div>    
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="contact-us">             
                <p style="text-align: -webkit-center;padding:10px;">
                    We are the leading manufacturers and suppliers of Packaging Machine Spare Parts and Processing Systems. We are the only organization who works on Sales, Services & Spare Parts availability <b style="font-size:18px;">(3S)</b> from more than 35 years. We keep numerous range of all packaging machines and processing systems, spare parts which meets the high quality standards. We deliver as we promise in multiple varieties & specialist spare parts.</p>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="container">
        <div class="row">
                    <div class="col-md-8" style="background-color:#f5f5f5;margin-bottom:20px;height:100%;box-shadow: 0px 5px 8px 5px #ddd;">
                    @if(session()->has('message'))
                            <div class="uk-alert uk-alert-success" data-uk-alert="" style="text-align: center;padding-top: 10px;">
                                <a href="#" class="uk-alert-close uk-close"></a>
                                {{ session()->get('message') }}
                            </div>
                             <button type="button" style="border-radius:50px !important;display:none;" id="quote" class="btn-main mt-3" data-toggle="modal" data-target="#exampleModal">
                                GET A QUOTE
                            </button>
                            <script>
                            
                            $(document).ready(function(){
    $("#quote").trigger("click");
});
                                // alert('asdsa');
                            </script>
                    @endif
                    <form method="post" action="{{url('/spare-parts/submit')}}">{{csrf_field()}}
                        <div class="contact-form" style="max-width:100%;">
                                <div class="flex-it" style="padding-top:20px;margin-left:0px;margin-right:0px;width:100%;">
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            
                                            <input id="sp_name" style="width:300px;color:#888;" type="text" class="form-control-md" placeholder="Name (Required)" name="name" value="{{old('name')}}">
                                            <div class="input-group-prepend">
                                                <div  class="input-group-text"><i class="far fa-user"></i></div>
                                            </div>
                                        </div>

                                        <p style="color:red;">@if($errors->has('name')) {{ $errors->first('name') }} @endif</p>
                                    </div>
                                    
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            
                                            <input id="sp_company" style="width:300px;color:#888;" type="text" class="form-control-md" placeholder="Company (Required)" name="company" value="{{old('company')}}">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="far fa-envelope"></i></div>
                                            </div>
                                        </div>
                                        <p style="color:red;">@if($errors->has('company')) {{ $errors->first('company') }} @endif</p>
                                    </div>
                                    
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            
                                            <select style="background-color:white;color:#888;width:300px;border:none;border-bottom:1px solid #282828;border-right:1px solid #282828;font-size: 1.5rem;
                                                padding: 0 0.5rem;" class="iinput form-control-md" name="country" id="country">
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
                                            
                                            <select style="color:#888;font-size: 1.5rem;background-color:white;
                                                padding: 0 0.5rem;width:300px;border:none;border-bottom:1px solid #282828;border-right:1px solid #282828;background-color:white;" class="iinput form-control-md" name="city" id="city">
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
                                            
                                            <input id="sp_address" style="width:300px;color:#888;" type="text" class="form-control-md"  placeholder="Address (Required)" name="address" value="{{old('address')}}">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i style="padding:0.5rem 0.3rem;font-size:14px;" class="fa fa-address-card-o"></i></div>
                                            </div>
                                        </div>
                                         <p style="color:red;">@if($errors->has('address')) {{ $errors->first('address') }} @endif</p>
                                    </div>
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            
                                            <input id="sp_contact" style="width:300px;color:#888;" type="text" class="form-control-md" placeholder="Contact (Required)" name="phone" value="{{old('phone')}}">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i style="padding:0.5rem 0.3rem;font-size:14px;" class="fa fa-phone"></i></div>
                                            </div>
                                        </div>
                                         <p style="color:red;">@if($errors->has('phone')) {{ $errors->first('phone') }} @endif</p>
                                    </div>
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            
                                            <textarea class="form-control" id="sp_machine_name" style="width:300px;border-left:0px;color:#888;" rows="3" placeholder="Machine Name..." name="machine_name" value="{{old('machine_name')}}">{{old('machine_name')}}</textarea>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-pencil-alt"></i></div>
                                            </div>
                                        </div>
                                        <p style="color:red;">@if($errors->has('machine_name')) {{ $errors->first('machine_name') }} @endif</p>
                                    </div>
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            
                                            <textarea class="form-control" id="sp_model" style="width:300px;border-left:0px;color:#888;" rows="3" placeholder="Machine Model..." name="model" value="{{old('model')}}">{{old('model')}}</textarea>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-pencil-alt"></i></div>
                                            </div>
                                        </div>
                                        <p style="color:red;">@if($errors->has('model')) {{ $errors->first('model') }} @endif</p>
                                    </div>
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            
                                            <textarea class="form-control" id="sp_parts" style="width:300px;border-left:0px;color:#888;" rows="3" placeholder="Parts..." name="parts" value="{{old('parts')}}">{{old('parts')}}</textarea>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-pencil-alt"></i></div>
                                            </div>
                                        </div>
                                         <p style="color:red;">@if($errors->has('parts')) {{ $errors->first('parts') }} @endif</p>
                                    </div>
                                    <div class="box">
                                        <div class="input-group mb-2">
                                            
                                            <textarea class="form-control" id="sp_any_detail" style="width:300px;border-left:0px;color:#888;" rows="3" placeholder="Any Detail..." name="any_detail" value="{{old('any_detail')}}">{{old('any_detail')}}</textarea>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-pencil-alt"></i></div>
                                            </div>
                                        </div>
                                         <p style="color:red;">@if($errors->has('any_detail')) {{ $errors->first('any_detail') }} @endif</p>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="box" style="margin:0 auto;">
                            <div class="input-group mb-2">
                                
                                 <div class="captcha text-center" style="margin:0 auto;">
                               
                               <input class="maancaptchainputs" type="text" value="{{(mt_rand(10,100))}}" readonly id="num1">
                               
                               <span style="font-size:25px;font-weight:600;padding-left:5px;padding-right:5px;">+</span>
                               
                               <input class="maancaptchainputs" type="text" value="{{(mt_rand(10,100))}}" readonly id="num2">
                               
                               <span style="font-size:25px;font-weight:600;padding-left:5px;padding-right:5px;">=</span>
                               
                               <input style="border:1px solid black!important;" class="maancaptchainputs" type="text" name="captcha" id="captcha" onfocusout="checkCaptcha()">

                                <span style="margin-left:5px;" id="captcha_refresh"><i class="fa fa-refresh" style="cursor: pointer;"></i></span>
                                <p style="color:red;" id="captcha_error">@if($errors->has('captcha')) {{ $errors->first('captcha') }} @endif</p>
                               </div>
                        
                            </div>
                            </div>
                        </div>
                <div class="row" style="margin-bottom:10px;">
                    <div class="col-md-4"></div>
                    <div class="col-md-4" style="">
                        <button class="btn" type"submit" style="margin-left;20px!important;margin-right:20px!important;display:block;color:white;background-color:#cf1d25;width:100%;text-align:center;font-size:14px;">Submit</button>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                 
        </div>
        <div class="col-md-4 imap" >

        <iframe style="margin-top:1px;border-right:1px solid #fc0000;border:2px solid #282828;width:100%;height:445px;" class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d28949.72073022507!2d67.02869765600587!3d24.907698128923847!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33fb1eaec1597:0x9850a5e92d0f6977!2sSama+Engineering,+Syed+Altaf+Ali+Barelvi+Rd,+Karachi,+Pakistan!5e0!3m2!1sen!2sus!4v1450248945600"></iframe>

        </div>
        </div>
    </div>




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
                   
                        <div class="contact-form">
                                <h3 class="heading-form">Thank You</h3>
                               
                                
                                <p class="alert alert-success" style="text-align: center;" id="success_msg">Your data submitted successfully!</p>
                            </div>
                        

                </div>
              
            </div>
        </div>
    </div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

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
 
@endsection

