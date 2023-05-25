@extends('revamp.layouts.scaffold')
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
@push('title')
Opportunity to Become An Agent for Sama Engineering | Visit Website -
@endpush
@section('content')
    <section class="py-3 bg-LGray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="d-flex flex-row w-100">
                        <li class="me-3">
                            <a href="index.html" class="text-TColor"><i class="fa fa-home me-2"></i> HOME &nbsp;&nbsp; |</a>
                        </li>
                        <li>
                            BECOME AN AGENT
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="py-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 bgSR position-relative py-lg-5 py-sm-4 py-2">
                    <div class="row">
                        <div class="col-lg-8">
                            <h2>INTERESTED IN BEING AN AGENT OR DISTRIBUTOR FOR SAMA? <span class="text-TColor">Complete the form</span></h2>
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{session()->get('message')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <form action="{{url('/become-an-agent/submit')}}"  method="POST" class="from position-relative w-100 mt-5">
                        {{csrf_field()}}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-4 d-none">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="type_of_partner">
                                            <option value="">Select Type</option>
                                          </select>
                                        <label for="type_of_partner">Type of Partnership, you're interested in</label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="company_name" placeholder="Company Name" name="company" value="{{old('company')}}">
                                        <label for="company_name">Company Name</label>
                                        <p style="color:red;">@if($errors->has('company')) {{ $errors->first('company') }} @endif</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="full_name" placeholder="Full Name" name="name" value="{{old('name')}}">
                                        <label for="full_name">Full Name</label>
                                        <p style="color:red;">@if($errors->has('name')) {{ $errors->first('name') }} @endif</p>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-floating mb-3">
                                        <select class="form-select"  id="country" name="country" value="{{old('country')}}">
                                            <option value="">Select Country</option>
                                            @forelse($countries as $i)
                                                <option value="{{$i->Code}}">{{$i->Name}}</option>>
                                            @empty
                                            @endforelse
                                        </select>
                                        <label for="c_country">Country</label>
                                        <p style="color:red;">@if($errors->has('country')) {{ $errors->first('country') }} @endif</p>
                                      </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="city" name="city" value="{{old('city')}}">
                                          </select>
                                        <label for="c_city">City</label>
                                        <p style="color:red;">@if($errors->has('city')) {{ $errors->first('city') }} @endif</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{old('email')}}">
                                        <label for="email">Email</label>
                                        <p style="color:red;">@if($errors->has('email')) {{ $errors->first('email') }} @endif</p>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-floating mb-3">
                                        <input type="tel" class="form-control PhoneNmbr" placeholder="Phone Number" id="c_phone" name="phone" value="{{old('phone')}}">
                                        <label for="phone">Phone Number</label>
                                        <p style="color:red;">@if($errors->has('phone')) {{ $errors->first('phone') }} @endif</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="web_url" placeholder="Website URL" name="web_url" value="{{old('web_url')}}">
                                        <label for="web_url">Website URL</label>
                                        <p style="color:red;">@if($errors->has('web_url')) {{ $errors->first('web_url') }} @endif</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="which_industry" placeholder="Which industries do you cover?" name="which_industry" value="{{old('which_industry')}}">
                                        <label for="which_industry">Which industries do you cover?</label>
                                        <p style="color:red;">@if($errors->has('which_industry')) {{ $errors->first('which_industry') }} @endif</p>
                                    </div>
                                    <div class="invalid-feedback">
                                        Which industries do you cover (including products and brand types, your customers etc.) ?
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="your_industry" placeholder="Your industry experience" name="your_industry" value="{{old('your_industry')}}">
                                        <label for="your_industry">Your industry experience</label>
                                        <p style="color:red;">@if($errors->has('your_industry')) {{ $errors->first('your_industry') }} @endif</p>
                                    </div>
                                    <div class="invalid-feedback">
                                        A short description of your company and successful experience in selling food industry equipment/systems and services into your current markets:
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="territory" placeholder="In which territory you would be able to operate" name="territory" value="{{old('territory')}}">
                                        <label for="your_industry">In which territory you would be able to operate for<span class="fw-bold text-TColor">SAMA?</span></label>
                                        <p style="color:red;">@if($errors->has('territory')) {{ $errors->first('territory') }} @endif</p>
                                    </div>
                                    <div class="invalid-feedback">
                                        Country or region?-
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-floating">
                                        <textarea class="form-control w-100" style="height: auto;" rows="8" placeholder="Leave a comment here" id="c_msg" name="become_agent" >{{old('become_agent')}}</textarea>
                                        <label for="c_msg">Why are you interested in partnering with us?</label>
                                        <p style="color:red;">@if($errors->has('become_agent')) {{ $errors->first('become_agent') }} @endif</p>
                                    </div>
                                </div>
                                <div class="input-group mb-2">
                                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.sitekey') }}" style="width: desired_width;border-radius: 4px;border-right: 1px solid #d8d8d8;overflow: hidden;"></div>
                                </div>
                                <p style="color:red;" id="captcha_error" class="captcha_error">@if($errors->has('g-recaptcha-response')) {{ $errors->first('g-recaptcha-response') }} @endif</p>

                                <div class="col-lg-12">
                                    <button type="submit" class="btn rounded-0 btn-danger py-2 px-5 mt-3">Send Now</button>
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
@endpush
