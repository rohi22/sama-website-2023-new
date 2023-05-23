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
    .active>.page-link,
    .page-link.active {
        background-color: #EC2424;
        border-color: #EC2424;
    }
</style>
@endpush
@section('content')
@include('revamp.components.video_modal')
<!-- <section class="py-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 pt-5 pb-4">
                <h1>{{ ucwords(str_slug($slug, ' ')) }}</h1>
            </div>
        </div>
    </div>
</section> -->
@include('revamp.pages.sub_category_slider')
<section class="py-3 bg-LGray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="d-flex flex-row w-100 sama-breadcrumbs">
                    <li class="me-3">
                        <a href="{{ url('/') }}" class="text-TColor"><i class="fa fa-home me-2"></i> HOME
                            &nbsp;&nbsp; |</a>
                    </li>
                    <li>
                        @if (isset($slug))
                            <a href="{{ url('category/' . $slug) }}"
                                style="color:#EC2424">{{ ucwords(str_slug($slug, ' ')) }} </a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between d-none">
                <span style="color:var(--PColor)">Showing 12 of 144</span>
            </div>
            <div class="col-lg-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab"
                        tabindex="0">
                        <div class="row">
                            @forelse($products as $i)
                                <div class="col-lg-6">
                                    @include('revamp.components.product2', ['item' => $i])
                                </div>
                            @empty
                            @endforelse



                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab"
                        tabindex="0">...</div>
                    <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab"
                        tabindex="0">...</div>
                </div>
                <div class="col-lg-12 d-flex justify-content-center justify-content-lg-end">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

</section>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        var url = null;

        $(document).on('click', '.video-btn', function() {
            url = $(this).data('href');
            $('#myModal').modal('show');
        });

        $("#myModal").on('hide.bs.modal', function() {
            $("#videoFrame").attr('src', '');
        });

        $("#myModal").on('show.bs.modal', function() {
            $("#videoFrame").attr('src', url);
        });
        $('#myModal').on('click', '.close', function() {
            $('#myModal').modal('hide');
        });
    });
</script>
@endpush
