@extends('revamp.layouts.scaffold')
@if(!empty($row))
@section('main')
<meta name="description" content="{{ $row->gt_meta_desc }}"/>
<link rel="canonical" href="{{URL::current()}}" />
@endsection

@section('og_page_wise')
<meta property="og:locale" content="en_PK">
<meta property="og:type" content="website">
<meta property="og:title" content="{{ $row->gt_title }}">
<meta property="og:description" content="{{ $row->gt_meta_desc }}">
<meta property="og:url" content="{{URL::current()}}">
<meta property="og:site_name" content="SAMA ENGINEERING">
@endsection

@section('twitter')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $row->gt_title }}">
<meta name="twitter:description" content="{{ $row->gt_meta_desc }}">
<meta name="twitter:site" content="@InsectMarketing">
<meta name="twitter:creator" content="@InsectMarketing">
@endsection

@push('title')
    {{$row->gt_title}} -
@endpush
@endif

@section('content')
 <section class="py-3 bg-LGray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="d-flex flex-row w-100">
                        <li class="me-3">
                            <a href="{{url('/')}}" class="text-TColor"><i class="fa fa-home me-2"></i> HOME &nbsp;&nbsp; |</a>
                        </li>
                        <li class="text-TColor">
                           @if(isset($slug)) <a href="javascript:;"  style="color:#EC2424">{{ucwords(str_slug($slug,' '))}}</a>@endif
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </section>    
    <section class="pt-5">
        <div class="container">
            <div class="row">          
                <div class="col-lg-12">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab" tabindex="0">
                            <div class="row">
                                @forelse($products as $index=>$item)
                                <div class="col-lg-3">
                                    @include('revamp.components.product',['item' => $item])
                                </div>
                                @empty
                                @endforelse
                      
                            </div>
                        </div>
                        
                    </div>
                    
                </div>        
            </div>
        </div>
    </section>
@endsection