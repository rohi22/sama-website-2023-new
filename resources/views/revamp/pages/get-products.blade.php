    @forelse($products as $index=>$product)
<div class="col-lg-3">
      @include('revamp.components.product',['item' => $product])
</div>     
   @empty
   @endforelse