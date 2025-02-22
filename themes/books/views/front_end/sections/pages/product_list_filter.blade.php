{{-- <div class="row"> --}}
    @foreach ($products as $product)
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 product-page-card">
            <div class="product-card-inner">
            <div class="product-image">
                <a href="{{url($slug.'/product/'.$product->slug)}}">
                    <img src="{{get_file($product->cover_image_path, $currentTheme)}}">
                </a>
                {{--<span class="badge">{{ $product->tag_api }}</span> --}}
            </div>
            <div class="product-content">
                <div class="product-cont-top">
                    <div class="subtitle">
                        {{-- <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="13" viewBox="0 0 11 13"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M0 2.36364C0 1.05824 1.09442 0 2.44444 0H7.54303C8.19134 0 8.8131 0.249025 9.27152 0.692293L10.284 1.67134C10.7425 2.11461 11 2.71581 11 3.34269V10.6364C11 11.9418 9.90558 13 8.55556 13H2.44444C1.09441 13 0 11.9418 0 10.6364V2.36364ZM9.77778 4.13636V10.6364C9.77778 11.2891 9.23057 11.8182 8.55556 11.8182H2.44444C1.76943 11.8182 1.22222 11.2891 1.22222 10.6364V2.36364C1.22222 1.71094 1.76943 1.18182 2.44444 1.18182H6.72222V2.36364C6.72222 3.34269 7.54303 4.13636 8.55556 4.13636H9.77778ZM9.70998 2.95455C9.64997 2.78767 9.55145 2.63432 9.4198 2.50702L8.40728 1.52796C8.27562 1.40066 8.11702 1.3054 7.94444 1.24737V2.36364C7.94444 2.68999 8.21805 2.95455 8.55556 2.95455H9.70998Z"
                                    fill="#E8BA96" />
                                <path
                                    d="M3.625 7C3.27982 7 3 7.22386 3 7.5C3 7.77614 3.27982 8 3.625 8H7.375C7.72018 8 8 7.77614 8 7.5C8 7.22386 7.72018 7 7.375 7H3.625Z"
                                    fill="#E8BA96" />
                                <path
                                    d="M3.625 9C3.27982 9 3 9.22386 3 9.5C3 9.77614 3.27982 10 3.625 10H5.5C5.84518 10 6.125 9.77614 6.125 9.5C6.125 9.22386 5.84518 9 5.5 9H3.625Z"
                                    fill="#E8BA96" />
                            </svg>
                            {{ __('Get Sample') }}
                        </a> --}}
                    </div>
                    <div class="prouct-card-heading long_sting_to_dot">
                        <h5>
                            <a href="{{ url($slug.'/product/'.$product->slug) }}"
                                tabindex="0">{{ $product->name }}</a>
                        </h5>
                        <div class="play-time">
                            <a href="javascript:void(0)" class="wishbtn wishlist-btn wishbtn-globaly"
                                product_id="{{ $product->id }}"
                                in_wishlist="{{ $product->in_whishlist ? 'remove' : 'add' }}">
                                <span class="wish-ic">
                                    <i class="{{ $product->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}"></i>
                                    <input type="hidden" class="wishlist_type" name="wishlist_type" id="wishlist_type"
                                        value="{{ $product->in_whishlist ? 'remove' : 'add' }}">
                                </span>
                            </a>
                            {!! \App\Models\Product::actionLinks($currentTheme, $slug, $product) !!} 
                        </div>
                    </div>
                    <p>{{!empty($product->ProductData) ? $product->ProductData->name : ''}}</p>
                </div>
                <div class="product-cont-bottom">
                    <div class="size-selectors align-items-center">
                    </div>
                    <div class="price-btn">
                        <div class="pdp-variant-price">
                            @if ($product->variant_product == 0)
                            <div class="price">
                            {!! \App\Models\Product::getProductPrice($product, $store, $currentTheme) !!}
                            </div>
                            @else
                            <div class="price">
                                <ins>{{ __('In Variant') }}</ins>
                            </div>
                            @endif

                            {!! \App\Models\Product::productSalesPage($currentTheme, $slug, $product->id) !!}
                        </div>
                        <a href="javascript:void(0)" class="btn checkout-btn addcart-btn-globaly"
                            product_id="{{ $product->id }}" variant_id="0" qty="1">
                            <svg width="20" height="20" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.7424 6H4.25797C3.10433 6 2.1899 6.97336 2.26187 8.12476L2.76187 16.1248C2.82775 17.1788 3.70185 18 4.75797 18H15.2424C16.2985 18 17.1726 17.1788 17.2385 16.1248L17.7385 8.12476C17.8104 6.97336 16.896 6 15.7424 6ZM4.25797 4C1.95069 4 0.121837 5.94672 0.265762 8.24951L0.765762 16.2495C0.89752 18.3577 2.64572 20 4.75797 20H15.2424C17.3546 20 19.1028 18.3577 19.2346 16.2495L19.7346 8.24951C19.8785 5.94672 18.0496 4 15.7424 4H4.25797Z">
                                </path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5 5C5 2.23858 7.23858 0 10 0C12.7614 0 15 2.23858 15 5V7C15 7.55228 14.5523 8 14 8C13.4477 8 13 7.55228 13 7V5C13 3.34315 11.6569 2 10 2C8.34315 2 7 3.34315 7 5V7C7 7.55228 6.55228 8 6 8C5.44772 8 5 7.55228 5 7V5Z">
                                </path>
                            </svg>
                            {{$section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                        </a>
                        {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $product) !!}
                    </div>
                </div>
            </div>
            </div>
        </div>
    @endforeach
{{-- </div> --}}
@php
$page_no = !empty($page) ? $page : 1;
@endphp
<!-- a Tag for previous page -->
{{ $products->onEachSide(0)->links('pagination::bootstrap-4') }}
