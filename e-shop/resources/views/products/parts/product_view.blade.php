<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
        <img src="{{$product->thumbnail}}" alt="" class="card-img-top" height="225">
        <div class="card-body">
            <p class="card-title" style="height: 20px;">{{__($product->title)}}</p>
            <hr>
            <p class="card-text" style="height: 150px;">{{__($product->short_description)}}</p>
            <div class="d-flex justify-content-start align-items-center">
                <small class="text-muted mr-2">Category:</small>
                <div class="btn-group align-self-end">
                    @if(isset($product->category))
                        @include('categories.parts.category_view', ['category' => $product->category] )
                    @endif
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{route('products.show', $product->id)}}" class="btn btn-sm btn-outline-dark">{{__('Show')}}</a>
                </div>
                <span class="text-muted">{{__($product->price)}}$</span>
            </div>
        </div>
    </div>

</div>
