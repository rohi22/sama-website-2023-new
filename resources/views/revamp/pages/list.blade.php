@extends('revamp.layouts.scaffold')
@section('main')
<meta name="description" content="{{ $cat_head->cat_meta_desc }}" />
@endsection
@section('og_product_wise')
<meta property="og:type" content="product.item">
<meta property="og:title" content="{{ ucfirst($cat_head->cat_meta_title) }} - SAMA ENGINEERING">
<meta property="og:url" content="{{ URL::current() }}">
<meta property="og:image" content="{{ asset('uploads/' . $cat_head->cat_og_img) }}">
<meta property="product:condition" content="new">
@endsection
@section('twitter')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ ucfirst($cat_head->cat_meta_title) }} - SAMA ENGINEERING">
<meta name="twitter:description" content="{{ $cat_head->cat_meta_desc }}">
<meta name="twitter:site" content="@SAMAENGINEERING">
<meta name="twitter:creator" content="@SAMAENGINEERING">
@endsection
@push('title') @if (!empty($cat_head))
{{ $cat_head->cat_meta_title }} -
@endif
@endpush
@push('styles')
<style>
    .nav-pills .nav-item .nav-link {
        padding: 0px !important;
        padding: 10px !important;

    }

    .active>.page-link,
    .page-link.active {
        background-color: #EC2424;
        border-color: #EC2424;
    }
</style>
@endpush
@section('content')
<section class="p-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="menu-carousel owl-carousel py-5">
                    @forelse($subcategories as $i)
                    <li>
                        <a href="{{ asset('revamp/sub-category/' . $i->cat_slug) }}">
                            <span><img src="{{ asset('uploads/' . $i->cat_icon) }}" /></span>
                            <span>{{ $i->cat_title }}</span>
                        </a>
                    </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Sub catergory slider -->
@include('revamp.pages.sub_category_slider')
<section class="py-3 bg-LGray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="d-flex flex-row w-100 sama-breadcrumbs">
                    <li class="me-3">
                        <a href="{{ url('/') }}"><i class="fa fa-home me-2"></i> HOME &nbsp;&nbsp; </a>|
                    </li>
                    <li class="text-TColor active">
                        @if (isset($slug))
                        <a href="{{ url('category/' . $slug) }}">{{ ucwords(str_slug($slug, ' ')) }} </a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="pt-5 sama-tabs">
    <div class="container">
        <div class="row">
            @if (isset($childcategories))
            <div class="col-lg-12 d-flex justify-content-between">
                <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                    @forelse($childcategories as $cc)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="id{{ $cc->id }}" data-bs-toggle="pill"
                            data-bs-target="#{{ $cc->id }}" type="button" role="tab" aria-controls="{{ $cc->id }}"
                            aria-selected="true" onclick="getThirdLevelThemeC({{ $cc->id }},'{{ $cc->cat_title }}')">{{
                            $cc->cat_title }}</button>
                    </li>
                    @empty
                    @endforelse
                </ul>
                <!--<span style="color:var(--PColor)">Showing 8 of 150</span>-->
            </div>
            @endif
            <div class="col-lg-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab"
                        tabindex="0">
                        <div class="row" id="ajaxContent">

                            @foreach($products as $p)
                                @if($currentCat->theme_mode==0 || $currentCat->theme_mode==2 || request()->segment(3) == 'accessories')
                                <div class="col-lg-3">
                                    @include('revamp.components.product', ['item' => $p])
                                </div>


                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="col-lg-12 d-flex justify-content-center justify-content-lg-end ajaxContent">
                    <?php echo $products->links(); ?>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    function getThirdLevelThemeC(id, title) {

        $("#pag").hide();
        var url = "<?php echo url('/'); ?>";
        $.ajax({
            url: "{{ route('get_products') }}",
            type: 'GET',
            data: {
                id: id,
                _token: '{{ csrf_token() }}'
            },
            beforeSend: function () {
                $(".ajaxContent").empty();
                $("#ajaxContent").empty();

            },
            success: function (res) {
                $(".ajaxContent").empty();
                $("#ajaxContent").html(res.data);

            },
            error: function (res) {
                console.log(res);
            }
        });
    }
</script>
@endpush
