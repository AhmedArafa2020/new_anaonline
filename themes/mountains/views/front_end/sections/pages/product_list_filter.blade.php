@foreach ($products as $product)
    <div class="col-lg-4 col-xl-4 col-md-4 col-sm-6 col-12 product-card">
        <div class="product-card-inner product-card-bg">
            <div class="product-card-img">
                <a href="{{url($slug.'/product/'.$product->slug)}}">
                    <img src="{{get_file($product->cover_image_path),$currentTheme}}" alt="">
                </a>
            </div>
            <div class="product-card-content">
                <div class="about-subtitle">

                    <div class="subtitle-pointer">
                        <span>{{$product->ProductData->name}}</span>
                        <div class="about-title">
                            {!! \App\Models\Product::productSalesPage($currentTheme, $slug, $product->id) !!}
                        </div>
                    </div>
                    <div class="card-title">
                    {!! \App\Models\Product::actionLinks($currentTheme, $slug, $product) !!}
                        <div class="card-add-to-list long_sting_to_dot" class="wishlist">
                            <h3>
                                <a href="{{url($slug.'/product/'.$product->slug)}}">{{ $product->name}} <br/> {{ $product->default_variant_name }}</a>
                            </h3>
                                <a href="JavaScript:void(0)" class="wishbtn wishbtn-globaly"  product_id="{{$product->id}}" in_wishlist="{{ $product->in_whishlist ? 'remove' : 'add'}}">
                                    <span class="wish-ic">
                                    <i class="{{ $product->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}"></i>
                                    <input type="hidden" class="wishlist_type" name="wishlist_type" id="wishlist_type" value="{{ $product->in_whishlist ? 'remove' : 'add'}}">
                                </span>
                                </a>

                        </div>
                        <div class="product-card-itm-datail">
                            @if ($product->variant_product == 0)
                                <div class="price">
                                {!! \App\Models\Product::getProductPrice($product, $store, $currentTheme) !!}
                                </div>
                            @else
                                <div class="price">
                                    <ins>{{ __('In Variant') }}</ins>
                                </div>
                            @endif
                            <a href="javascript:void(0)" class="btn btn-secondary addcart-btn-globaly" product_id="{{ $product->id }}" variant_id="0" qty="1">
                            {{ $section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.1258 5.12599H2.87416C2.04526 5.12599 1.38823 5.82536 1.43994 6.65265L1.79919 12.4008C1.84653 13.1581 2.47458 13.7481 3.23342 13.7481H10.7666C11.5254 13.7481 12.1535 13.1581 12.2008 12.4008L12.5601 6.65265C12.6118 5.82536 11.9547 5.12599 11.1258 5.12599ZM2.87416 3.68896C1.21635 3.68896 -0.0977 5.08771 0.00571155 6.74229L0.364968 12.4904C0.459638 14.0051 1.71574 15.1852 3.23342 15.1852H10.7666C12.2843 15.1852 13.5404 14.0051 13.635 12.4904L13.9943 6.74229C14.0977 5.08771 12.7836 3.68896 11.1258 3.68896H2.87416Z"
                                        fill="#F2DFCE" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M3.40723 4.4075C3.40723 2.42339 5.01567 0.814941 6.99979 0.814941C8.9839 0.814941 10.5923 2.42339 10.5923 4.4075V5.84453C10.5923 6.24135 10.2707 6.56304 9.87384 6.56304C9.47701 6.56304 9.15532 6.24135 9.15532 5.84453V4.4075C9.15532 3.21703 8.19026 2.25197 6.99979 2.25197C5.80932 2.25197 4.84425 3.21703 4.84425 4.4075V5.84453C4.84425 6.24135 4.52256 6.56304 4.12574 6.56304C3.72892 6.56304 3.40723 6.24135 3.40723 5.84453V4.4075Z"
                                        fill="#F2DFCE" />
                                </svg>
                            </a>
                            {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $product) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

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