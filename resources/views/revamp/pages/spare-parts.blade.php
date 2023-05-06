@extends('revamp.layouts.scaffold')
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
@push('title')
High Quality and Extremely Useful Spare Parts of the Machines | Sama - 
@endpush
@section('content')
   <section class="py-3 bg-LGray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="d-flex flex-row w-100">
                        <li class="me-3">
                            <a href="{{url('/')}}" class="text-TColor"><i class="fa fa-home me-2"></i> HOME &nbsp;&nbsp; |</a>
                        </li>
                        <li>
                            Spare Parts
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>    
    <section class="py-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 devider position-relative py-8">
                    <div class="row">
                        <div class="col-9">
                            <img src="https://www.samaengineering.com/uploads/about/6014133e5768bWhatsApp Image 2021-01-29 at 6.50.32 PM.jpeg" class="img-thumbnail mb-5" alt="...">
                            <p class="mb-4">We are the leading manufacturers and suppliers of Packaging Machine Spare Parts and Processing Systems. We are the only organization who works on Sales, Services & Spare Parts availability (3S) from more than 35 years.</p>
                            <p class="mb-4">We keep numerous range of all packaging machines and processing systems, spare parts which meets the high quality standards. We deliver as we promise in multiple varieties & specialist spare parts.</p>
                        </div>
                    </div>                    
                </div>
                <div class="col-lg-6 bgSR position-relative py-8">
                    <h2>GET A <span class="text-TColor">CALL</span></h2>
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session()->get('message')}}
                    </div>
                    @endif
                    <div class="d-flex mt-3">
                        <i class="fa fa-phone text-TColor me-3"></i>
                        <p class="mb-0">+92-345-2266203</p>
                    </div>
                    <form method="post" class="from position-relative w-100 mt-4" action="{{url('/spare-parts/submit')}}">
                        {{csrf_field()}}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="fullname" placeholder="Full Name" name="name" value="{{old('name')}}">
                                        <label for="name">Full Name</label>
                                        <p style="color:red;">@if($errors->has('name')) {{ $errors->first('name') }} @endif</p> 
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="company" placeholder="Company / Organization" name="company" value="{{old('company')}}">
                                        <label for="company">Company / Organization</label>
                                        <p style="color:red;">@if($errors->has('company')) {{ $errors->first('company') }} @endif</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select"  id="country" name="country">
                                            <option value="">Please Select</option>
                                            @forelse($countries as $i)
                                                <option value="{{$i->Code}}">{{$i->Name}}</option>>
                                            @empty
                                            @endforelse
                                        </select>
                                        <label for="c_country">Country</label>
                                        <p style="color:red;">@if($errors->has('country')) {{ $errors->first('country') }} @endif</p>
                                      </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="city" name="city" >
                                            <option value="">Select City</option>
                                          </select>
                                        <label for="c_city">City</label>
                                        <p style="color:red;">@if($errors->has('city')) {{ $errors->first('city') }} @endif</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <input type="tel" class="form-control PhoneNmbr" placeholder="Phone Number" id="c_phone" name="phone" value="{{old('phone')}}">
                                        <p style="color:red;">@if($errors->has('phone')) {{ $errors->first('phone') }} @endif</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="comaddressany" placeholder="Address" name="address" value="{{old('address')}}">
                                        <label for="address">Address</label>
                                        <p style="color:red;">@if($errors->has('address')) {{ $errors->first('address') }} @endif</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="machine_name" placeholder="Machine Name" name="machine_name" value="{{old('machine_name')}}">
                                        <label for="machine_name">Machine Name</label>
                                        <p style="color:red;">@if($errors->has('machine_name')) {{ $errors->first('machine_name') }} @endif</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="machine_modal" placeholder="Machine Modal" name="model" value="{{old('model')}}">
                                        <label for="machine_modal">Machine Modal</label>
                                        <p style="color:red;">@if($errors->has('model')) {{ $errors->first('model') }} @endif</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="parts" placeholder="Parts" name="parts" value="{{old('parts')}}">
                                        <label for="parts">Parts</label>
                                        <p style="color:red;">@if($errors->has('parts')) {{ $errors->first('parts') }} @endif</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="any_detail" placeholder="Any Detail" name="any_detail" value="{{old('any_detail')}}">
                                        <label for="any_detail">Any Detail</label>
                                        <p style="color:red;">@if($errors->has('any_detail')) {{ $errors->first('any_detail') }} @endif</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-none">
                                <div class="col-lg-12">
                                    <div class="form-floating mb-3">
                                        <input type="file" class="form-control" id="browse" placeholder="Browse">
                                        <label for="browse">Browse</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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


</script>@endpush