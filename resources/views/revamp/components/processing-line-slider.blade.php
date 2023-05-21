<div class="d-lg-flex flex-lg-row-reverse align-items-center justify-content-between ProcessSlider-row">
         <div class="col-lg-6 ProcessSlider-image">
            <img src="{{asset('uploads/product/'.$item->p_main_image)}}" class="w-100" />
         </div>
         <div class="col-lg-5">
            <h4 class="mb-4">{{$item->p_title}}</h4>
            <p class="mb-4">{!! $item->p_short_desc !!}</p>
            <div class="mb-4 Gridimg">
               @if(isset($item))
               @php $prcessing_gallery =
               DB::table('product_main_images')->where('p_id','=',$item->id)->get(); @endphp
               @forelse($prcessing_gallery as $g)
               <img src="{{asset('uploads/product/'.$g->p_bag_image)}}" class="me-2" width="80px" alt="">
               @empty
               @endforelse
               @endif
            </div>
            <a href="{{asset('product/'.$item->p_slug)}}" class="btn btn-danger rounded-0 px-3 py-2">Read
               More</a>
         </div>
      </div>