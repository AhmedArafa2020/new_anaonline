{{-- <div class="row"> --}}
    @foreach ($products as $product)

    <div class="col-lg-4 col-md-4 col-sm-6 col-12 product-card">
        <div class="product-card-inner">
        <div class="card-top">
            <span class="slide-label">{{ $product->ProductData->name }}</span>
            {!! \App\Models\Product::productSalesPage($currentTheme, $slug, $product->id) !!}

                <a href="javascript:void(0)" class="wishlist wbwish  wishbtn-globaly" product_id="{{$product->id}}" in_wishlist="{{ $product->in_whishlist ? 'remove' : 'add'}}">
                    <span class="wish-ic">
                        <i class="{{ $product->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}" style='color: black'></i>
                    </span>
                </a>
                {!! \App\Models\Product::actionLinks($currentTheme, $slug, $product) !!}
        </div>
        <h3 class="product-title">
            <a href="{{url($slug.'/product/'.$product->slug)}}" class="description">
                {{$product->name}}
            </a>
        </h3>
        <div class="product-card-image">
            <a href="{{url($slug.'/product/'.$product->slug)}}">
                <img src="{{ get_file($product->cover_image_path, $currentTheme) }}" class="default-img">
                @if($product->Sub_image($product->id)['status'] == true)
                    <img src="{{ get_file($product->Sub_image($product->id)['data'][0]->image_path, $currentTheme) }}" class="hover-img">
                @else
                    <img src="{{ get_file($product->Sub_image($product->id), $currentTheme) }}" class="hover-img">
                @endif
            </a>
        </div>
        <div class="product-content">
            <div class="product-content-bottom d-flex align-items-center justify-content-between">
                @if ($product->variant_product == 0)
                    <div class="price">
                    {!! \App\Models\Product::getProductPrice($product, $store, $currentTheme) !!}
                    </div>
                @else
                    <div class="price">
                        <ins>{{ __('In Variant') }}</ins>
                    </div>
                @endif
                <a href="javascript:void(0)" class="btn-primary add-cart-btn addcart-btn-globaly" type="submit" product_id="{{ $product->id }}" variant_id="0" qty="1">
                    {{ $section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                </a>
                {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $product) !!}
            </div>
        </div>
        </div>
    </div>

    @endforeach
{{-- </div> --}}

@php
$page_no = !empty($page) ? $page : 1;
@endphp
<div class="d-flex justify-content-end col-12">
    <nav class="dataTable-pagination">
        <ul class="dataTable-pagination-list">
            <li class="pagination">
                {{ $products->onEachSide(0)->links('pagination::bootstrap-4') }}
            </li>
        </ul>
    </nav>
</div>
