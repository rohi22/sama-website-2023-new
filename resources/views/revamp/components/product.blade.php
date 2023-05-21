<div class="card PrCard rounded-0">
    <a href="{{ asset('revamp/product/' . $item->p_slug) }}" class="d-flex w-100 flex-column">
        <div class="imGBox w-100 pt-3"
            style="background-image:url('{{ asset('uploads/product/' . $item->p_main_image) }}'); background-size: cover;object-fit: contain;  background-position: center;">
            <div class="label-top shadow-sm bg-TColor text-white">
                {{$item->sku}}
            </div>
            <!--<img src="{{ asset('uploads/product/' . $item->p_main_image) }}" class="card-img-top" class="w-100" alt="...">-->
        </div>
        <div class="card-body">
            <h5 class="card-title mb-3 truncate-2">{{ $item->p_title }} {{ $item->p_category }}</h5>
            <p class="card-text mb-4 truncate-2 sama-machine-des">{!! Illuminate\Support\Str::substr($item->p_short_desc, 0,50) !!}</p>
            
            <div class="d-flex flex-row">
                @if (isset($item))
                    @php
                        $bag_images = DB::table('product_main_images')
                            ->where('p_id', '=', $item->id)
                            ->get();
                    @endphp
                    @forelse($bag_images as $gallery)
                        <div class="imgFrame bg-white p-1 w-25 sama-small-img me-1">
                            <img src="{{ asset('uploads/product/' . $gallery->p_bag_image) }}" class="w-100"
                                alt="...">
                        </div>
                    @empty
                    @endforelse
                @endif
            </div>
        </div>
    </a>
</div>
