
<style>
.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
}
.form-section .form-box form a{
    margin:0px !important;
}

.icon {
  padding: 10px;
  background: #282828;
  color: white;
  min-width: 20px;
  text-align: center;
}
.uk-alert{
    color:white !important;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}
 
.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
.maancaptchainputs{
    width:8% !important;height:30px;border:none!important;
}
.form-section .form-box form {
    width: 280px !important;
    
    display: flex;
    flex-flow: column;
}
@media screen and (max-width: 600px) {
  .carousel-control {
    top:0 !important;
    margin-top:0px !important;
    height:100%;
  }
}
.title-text span{
    font-size:2.5rem !important;
}
</style>
<style>

.carousel-indicators li{border:1px solid #282828 !important;}
.carousel .carousel-indicators { visibility: hidden; }
.carousel:hover .carousel-indicators { visibility: visible; }



</style>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  
  
  <!--MOBILE SLIDER-->
  
  
  
<div class="container-fluid" style="display:none;padding-left:0px;padding-right:0px;" id="show_catalogue">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php $counter = 0;?>
      @forelse($mobile_sliders as $i)
          @if($counter == 0)
              <li data-target="#myCarousel" data-slide-to="{{$counter}}" class="active"></li>
              <?php ++$counter;?>
          @else
              <li data-target="#myCarousel" data-slide-to="{{$counter}}"></li>
              <?php ++$counter;?>
          @endif
      @empty
      @endforelse
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
       <?php $count = 1;?>
          @forelse($mobile_sliders as $i)
            @if($count == 1)
            <div class="item active" @if($count == 1) @else @php $count = 0;@endphp @endif>
              <img src="{{asset('uploads/mobile/'.@$home_back_img->mobile_slider_back_img)}}" alt="Sama banner 1" style="width:100%;height:auto;">
              <div class="carousel-caption">
                <img class="hide" src="{{asset('uploads/mobile/'.$i->image)}}" style="height:120px;width:180px;margin-bottom:-10px;">
                <h3>{{$i->h_first}}</h3>
                <p>{{$i->h_second}}</p>
              </div>
            </div>
            <?php $count = 0;?>
            @else
             <div class="item">
              <img src="{{asset('uploads/mobile/'.@$home_back_img->mobile_slider_back_img)}}" alt="Sama banner 1" style="width:100%;height:auto;">
              <div class="carousel-caption">
                  <img class="hide" src="{{asset('uploads/mobile/'.$i->image)}}" style="height:120px;width:180px;margin-bottom:-10px;">
                <h3>{{$i->h_first}}</h3>
                <p>{{$i->h_second}}</p>
              </div>
            </div>
            @endif
            @empty
        @endforelse

    </div>

    <!-- Left and right controls -->
    <a style="" class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span style="" class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span style="" class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<!--Desktop Slider-->

<div class="container-fluid bg-fc hero" id="hide_catalogue" style="margin-bottom:1.5rem;padding-left:0px;padding-right:0px;">
        <div class="my-container" style="padding-left:0px;padding-right:0px;max-width:100% !important;position: relative; overflow:hidden;">

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php $counter = 0;?>
                    @forelse($sliders as $i)
                        @if($counter == 0)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$counter}}" class="active"></li>
                            <?php ++$counter;?>
                        @else
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$counter}}"></li>
                            <?php ++$counter;?>
                        @endif
                    @empty
                    @endforelse
                    
                </ol>
                <div class="carousel-inner">
                    <?php $count = 1;?>
                    @forelse($sliders as $i)
                        @if($count == 1)
                            <div class="carousel-item active" style="background-image: url({{asset('uploads/sliders/'.@$i->image)}});background-size: 100% 100%;">
                                <div class="hero-inner">
                                    <div class="title-text" style="margin-left:80px;">
                                        
                                        <h1 style="color: rgba(0,0,0,0.6);">{{$i->h_second}}</h1>
                                        <h1 style="width:75%; font-weight:700;">{{$i->h_first}}</h1>
                                        @if(!empty($i->h_third))<span><i class="fa fa-cog fa-spin"></i> {{$i->h_third}}</span>@endif
                                        @if(!empty($i->h_fourth))<span><i class="fa fa-cog fa-spin"></i> {{$i->h_fourth}}</span>@endif
                                        @if(!empty($i->h_fifth))<span><i class="fa fa-cog fa-spin"></i> {{$i->h_fifth}}</span>@endif
                                        @if(!empty($i->h_sixth))<span><i class="fa fa-cog fa-spin"></i> {{$i->h_sixth}}</span>@endif
                                        @if(!empty($i->h_seventh))<span><i class="fa fa-cog fa-spin"></i> {{$i->h_seventh}}</span>@endif 
                                    </div>
                                </div>
                            </div>
                            <?php $count = 0;?>
                        @else
                            <div class="carousel-item" style="background-image: url({{asset('uploads/sliders/'.@$i->image)}});background-size: 100% 100%;">
                                <div class="hero-inner">
                                    <div class="title-text" style="margin-left:80px;">
                                        <h1 style="color: rgba(0,0,0,0.6);">{{$i->h_first}}</h1>
                                        <h1>{{$i->h_second}}</h1>
                                        @if(!empty($i->h_third))<span><i class="fa fa-cog fa-spin"></i> {{$i->h_third}}</span>@endif
                                        @if(!empty($i->h_fourth))<span><i class="fa fa-cog fa-spin"></i> {{$i->h_fourth}}</span>@endif
                                        @if(!empty($i->h_fifth))<span><i class="fa fa-cog fa-spin"></i> {{$i->h_fifth}}</span>@endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                    @endforelse
                </div>
            </div>

         <div class="form-section" style="margin-top: -116px;">
                <div class="form-box" id="box_errors">
                    <h3 style="font-size:19px;">Contact Us</h3>
                    <span id="success_msg" style="#fff"></span>
                    <form action="javascript:;" method="post">{{csrf_field()}}
                        <div class="input-container">
                            <input type="text" value="{{old('name')}}" placeholder="Name" name="name" required id="u_name">
                            <i class="fa fa-user icon" style="padding-top:10px;height:37px;width:32px;margin-top:9px;"></i>
                        </div>
                        <div class="input-container">
                            <input type="text" value="{{old('company')}}" placeholder="Company" name="company" required id="u_company">
                            <i class="fa fa-building icon" style="padding-top:10px;height:37px;width:32px;margin-top:9px;"></i>
                        </div>
                        <div class="input-container">
                            <input type="email" value="{{old('email')}}" placeholder="Email" name="email" required id="u_email">
                            <i class="fa fa-envelope icon" style="padding-top:10px;height:37px;width:32px;margin-top:9px;"></i>
                        </div>
                        <div class="input-container">
                            <input type="text" value="{{old('phone')}}" placeholder="Phone" name="phone" required id="u_phone">
                            <i class="fa fa-phone icon" style="padding-top:10px;height:37px;width:32px;margin-top:9px;"></i>
                        </div>
                        
                        <div class="input-container">
                            <!--<input style="width:10%;padding:5px;" type="text" value="{{(mt_rand(10,100))}}" readonly id="num1"> -->
                            <!--<span style="color: white;margin-top: 6px;font-size: 30px;padding-left: 5px;padding-right: 5px;">+</span>-->
                            <!--<input style="width:10%;padding:5px;" type="text" value="{{(mt_rand(10,100))}}" readonly id="num2">-->
                            <!--<span style="color: white;margin-top: 6px;font-size: 30px;padding-left: 5px;padding-right: 5px;">=</span>-->
                            <!--<input style="width:15%;padding:5px;" type="text" id="captcha" onfocusout="checkSliderCaptcha()">-->
                            <!--<span id="captcha_refresh" style="color: white;margin-top: 15px;padding-left: 5px;padding-right: 5px;"><i style="cursor: pointer;" class="fa fa-refresh"></i></span>-->
                            <div class="g-recaptcha" data-sitekey="6LcHXEEaAAAAALhRDb5Pt1pHwloAfU0gUIpVeBiu" style="width: desired_width;border-radius: 4px;border-right: 1px solid #d8d8d8;overflow: hidden;"></div>
                        </div>
                        <p id="captcha_error" style='color:#fff;'>@if($errors->has('captcha')) {{ $errors->first('captcha') }} @endif</p>
                        <a style="text-align:center;"   class="" onclick="save_detail()">SUBMIT</a>
                    </form>
                </div>
            </div>
            
            <!--End form-->
        </div>
    </div>
      
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
        $('#home_contact').click(function(){
          $.ajax({
             type:'GET',
             url:"{{url('/refreshcaptcha')}}",
             data: {_token:'{{ csrf_token() }}'},
             success:function(data){
                console.log(data);
                $(".captcha span").html(data.captcha);
             }
          });
        });
 });

function save_detail()
{
  var u_name    = $("#u_name").val();
  var u_email   = $("#u_email").val();
  var u_company = $("#u_company").val();
  var u_phone   = $("#u_phone").val();
  var u_captcha = $("#captcha").val();
    
    // console.log(grecaptcha.getResponse()); return false;
    
    $.ajax({
      url: "{{asset('home/user-detail')}}",
      type: 'POST',
      data: {
          name:u_name,
          email:u_email,
          company:u_company,
          phone:u_phone,
        //   captcha:u_captcha,
          captcha: grecaptcha.getResponse(),
          _token:'{{ csrf_token() }}'},
      beforeSend:function(){
        $("#u_name").attr('placeholder','Name');
        $("#u_company").attr('placeholder','Company');
        $("#u_email").attr('placeholder','Email');
        $("#u_phone").attr('placeholder','Phone');
        $("#success_msg").css('display','block').html(null);
      },
      success: function(res)
       {    
           if(res.error){
               $("#captcha_error").html(res.error); return false;
           }else{
                $("#u_name").val(null);
                $("#u_email").val(null);
                $("#u_phone").val(null);
                $("#u_company").val(null);
                $("#captcha").val(null);
                $("#captcha_error").html(null);
                
                grecaptcha.reset();
                
                $("#success_msg").css('display','block').css('color','#fff').html(res);
           }
       },
       error: function(res)
       {

            $("#u_name").val(null);
            $("#u_email").val(null);
            $("#u_phone").val(null);
            $("#u_company").val(null);
            $("#captcha").val(null);
           $("#success_msg").css('display','block').html(null);
           var data = res.responseJSON;
            $.each(data.errors,function(k,v){
                if(k == 'name')
                {
                  $("#u_name").attr('placeholder',v);
                }
                else if(k == 'email')
                {
                  $("#u_email").attr('placeholder',v);
                }
                else if(k == 'phone')
                {
                  $("#u_phone").attr('placeholder',v);
                }
                else if(k == 'company')
                {
                  $("#u_company").attr('placeholder',v);
                }
                else if(k == 'captcha')
                {
                  $("#captcha_error").html(v);
                }
            });
        
       }
    });
  
}
function checkSliderCaptcha()
{
    var num1 = parseInt($("#num1").val());
    var num2 = parseInt($("#num2").val());
    var captcha_sum = $("#captcha").val();
    var sum = num1+num2;
   
    if(captcha_sum == sum)
    {
        $("#captcha_error").html(null);
    }
    else
    {
        $("#captcha_error").html('Kindly type correct value').css('color','#fff');
    }
}
</script>