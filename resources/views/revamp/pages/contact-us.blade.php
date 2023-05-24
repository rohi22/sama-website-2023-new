@extends('revamp.layouts.scaffold')
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
@push('title') Contact us -
@endpush
@push('styles')

@endpush
@section('content')
    <section class="py-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-5 pb-4">
                    <h1>CONTACT US</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="py-3 bg-LGray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="d-flex flex-row w-100">
                        <li class="me-3">
                            <a href="index.html" class="text-TColor"><i class="fa fa-home me-2"></i> HOME &nbsp;&nbsp; |</a>
                        </li>
                        <li>
                            CONTACT US
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="py-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 px-0">
                    <iframe src="https://maps.google.com/maps?q=sama%20engineering&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" width="100%" height="320" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </section>
    <section class="py-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 devider position-relative py-lg-5 py-sm-4 pt-4 pb-2">
                    <h4>{{$data->s_4_title}} - <span class="text-TColor">{{$data->s_4_name}}</span></h4>
                    <div class="d-flex mt-4 align-items-center">
                        <i class="fa fa-map-marker-alt text-TColor me-3"></i>
                        <p class="mb-0">{!! $data->s_4_address!!}</p>
                    </div>
                    <div class="d-flex mt-4 align-items-center">
                        <i class="fa fa-phone text-TColor me-3"></i>
                        <p class="m-0">{{$data->s_4_phone}}</p>
                    </div>
                    <div class="d-flex mt-4 align-items-center">
                        <i class="fa fa-envelope text-TColor me-3"></i>
                        <p class="m-0">{{$data->s_4_email}}</p>
                    </div>

                    <h4 class="mt-5">INTERNATIONAL OFFICE - <span class="text-TColor">{{$data->s_2_name}}</span></h4>
                    <div class="d-flex mt-4 d-none align-items-center">
                        <i class="fa fa-map-marker-alt text-TColor me-3"></i>
                        <p class="mb-0">Nazimabad # 2, Block-A, Plot No. 1/32, Opposite Firdous <br>
                            Colony KHI-74600, Pakistan</p>
                    </div>
                    <div class="d-flex mt-4 align-items-center">
                        <i class="fa fa-phone text-TColor me-3"></i>
                        <p class="m-0">{{$data->s_2_phone}}</p>
                    </div>
                    <div class="d-flex mt-4 align-items-center">
                        <i class="fa fa-envelope text-TColor me-3"></i>
                        <p class="m-0">{{$data->s_2_email}}</p>
                    </div>


                    <h4 class="mt-5">INTERNATIONAL OFFICE - <span class="text-TColor">{{$data->s_1_name}}</span></h4>
                    <div class="d-flex mt-4 d-none align-items-center">
                        <i class="fa fa-map-marker-alt text-TColor me-3"></i>
                        <p class="mb-0">Nazimabad # 2, Block-A, Plot No. 1/32, Opposite Firdous <br>
                            Colony KHI-74600, Pakistan</p>
                    </div>
                    <div class="d-flex mt-4 align-items-center">
                        <i class="fa fa-phone text-TColor me-3"></i>
                        <p class="m-0">{{$data->s_1_phone}}</p>
                    </div>
                    <div class="d-flex mt-4 align-items-center">
                        <i class="fa fa-envelope text-TColor me-3"></i>
                        <p class="m-0">{{$data->s_1_email}}</p>
                    </div>


                     <h4 class="mt-5">{{$data->s_3_name}}</h4>
                    <div class="d-flex mt-4 d-none align-items-center">
                        <i class="fa fa-map-marker-alt text-TColor me-3"></i>
                        <p class="mb-0">Nazimabad # 2, Block-A, Plot No. 1/32, Opposite Firdous <br>
                            Colony KHI-74600, Pakistan</p>
                    </div>
                    <div class="d-flex mt-4 align-items-center">
                        <i class="fa fa-phone text-TColor me-3"></i>
                        <p class="m-0">{{$data->s_3_phone}}</p>
                    </div>
                    <div class="d-flex mt-4 align-items-center">
                        <i class="fa fa-envelope text-TColor me-3"></i>
                        <p class="m-0">{{$data->s_3_email}}</p>
                    </div>



                </div>
                <div class="col-lg-6 col-sm-6 bgSR position-relative py-lg-5 py-sm-4 pt-2 pb-4">
                <form action="javascript:;" method="post" class="from position-relative w-100 mt-lg-5 mt-sm-0">
                    {{csrf_field()}}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4>{{$data->title}}</h4>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control"  name="c_name" value="{{old('name')}}" id="c_name" placeholder="Full Name">
                                        <label for="name">Full Name</label>
                                        <small id="c_name_error" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="email" value="{{old('email')}}" id="c_email" placeholder="abc@domain.com">
                                        <label for="emailid">Email</label>
                                        <small id="c_email_error" class="text-danger"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <input type="tel" class="form-control PhoneNmbr" placeholder="Phone Number" name="phone" value="{{old('phone')}}" id="c_phone">
                                        <small id="c_phone_error" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="company" value="{{old('company')}}" id="c_company" placeholder="Company / Organization">
                                        <label for="company">Company / Organization</label>
                                        <small id="c_company_error" class="text-danger"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" name="country" value="{{old('country')}}" id="c_country">
                                            <option value="">Please Select</option>
                                             @forelse($countries as $i)
                                                <option value="{{$i->Code}}">{{$i->Name}}</option>>
                                            @empty
                                            @endforelse
                                        </select>
                                        <label for="c_country">Country</label>
                                        <small id="c_country_error" class="text-danger"></small>
                                      </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" name="city" value="{{old('city')}}" id="c_city">
                                            <option value="">Select City</option>
                                          </select>
                                        <label for="c_city">City</label>
                                        <small id="c_city_error" class="text-danger"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-floating">
                                        <textarea class="form-control w-100" style="height: auto;" rows="8" placeholder="Leave a comment here" name="msg" value="{{old('msg')}}" id="c_msg"></textarea>
                                        <label for="c_msg">Messge</label>
                                        <small id="c_msg_error" class="text-danger"></small>
                                    </div>
                                </div>
                            </div>
                            <div id="RecaptchaField3"></div>
                                <p style="color:red;" id="captcha_error" class="captcha_error">@if($errors->has('captcha')) {{ $errors->first('captcha') }} @endif</p>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" id="contact_submit" onclick="contactSubmit()" class="btn rounded-0 btn-danger py-2 px-5 mt-3">Send Now</button>
                                         <p class="alert alert-success success_msg" style="text-align: center;display:none;" id="success_msg"></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
<script src="https://www.google.com/recaptcha/api.js"></script>
@push('scripts')

<script>

function contactSubmit()
{
    var c_name      = $('#c_name').val();
    var c_email     = $('#c_email').val();
    var c_phone     = $('#c_phone').val();
    var c_country   = $('#c_country').val();
    var c_city      = $('#c_city').val();
    var c_company   = $('#c_company').val();
    var c_msg       = $('#c_msg').val();
    // var c_captcha   = $('#captcha').val();

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
          captcha: grecaptcha.getResponse(2),
          msg:c_msg,
        //   captcha:c_captcha,
        // captcha: grecaptcha.getResponse(),
          _token:'{{ csrf_token() }}'

      },
      beforeSend:function(){
        $("#c_name_error").html(' ');
        $("#c_email_error").html(' ');
        $("#c_phone_error").html(' ');
        $("#c_company_error").html(' ');
        $("#c_msg_error").html(' ');
        // $(".captcha_error").html(' ');
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
                // $("#captcha").val(null);
                $("#c_country").val(null);
                $("#c_city").val(null);

                 grecaptcha.reset(2);

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
@endpush
