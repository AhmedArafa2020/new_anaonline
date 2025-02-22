<section class="our-bestseller-section tabs-wrapper"
    style="position: relative;@if (isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>

    <div class="left-side-image">
        <img src="{{ asset('themes/' . $currentTheme . '/assets/images/left-2.png') }}" alt="bestseller">
    </div>
    <div class="right-side-image">
        <img src="{{ asset('themes/' . $currentTheme . '/assets/images/left-2.png') }}" alt="bestseller">
    </div>
    <div class="container">
        <div class="section-title d-flex align-items-center justify-content-between">
            <div>
                <h3 id="{{ $section->bestseller_slider->section->title->slug ?? '' }}_preview">
                    {!! $section->bestseller_slider->section->title->text ?? '' !!}</h3>
                <ul class="cat-tab tabs">
                    @foreach ($category_options as $cat_key => $category)
                        <li class="tab-link {{ $cat_key == 0 ? 'active' : '' }}" data-tab="{{ $cat_key }}">
                            <a href="javascript:;">{{ $category }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div>
                <a href="{{ route('page.product-list', $slug) }}"
                    class="btn-secondary btn-secondary-theme-color"id="{{ $section->bestseller_slider->section->button->slug ?? '' }}_preview">
                    {!! $section->bestseller_slider->section->button->text ?? '' !!}
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="10" viewBox="0 0 4 6"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.65976 0.662719C0.446746 0.879677 0.446746 1.23143 0.65976 1.44839L2.18316 3L0.65976 4.55161C0.446747 4.76856 0.446747 5.12032 0.65976 5.33728C0.872773 5.55424 1.21814 5.55424 1.43115 5.33728L3.34024 3.39284C3.55325 3.17588 3.55325 2.82412 3.34024 2.60716L1.43115 0.662719C1.21814 0.445761 0.872773 0.445761 0.65976 0.662719Z"
                            fill=""></path>
                    </svg>
                </a>
            </div>
        </div>
        <div class="tabs-container">
            @foreach ($category_options as $cat_k => $category)
                <div id="{{ $cat_k }}" class="tab-content tab-cat-id {{ $cat_k == 0 ? 'active' : '' }}">
                    <div class="shop-protab-slider">
                        @foreach ($home_products as $product)
                            @if ($cat_k == '0' || $product->ProductData->id == $cat_k)
                                <div class="shop-protab-itm product-card">
                                    <div class="product-card-inner">
                                        <div class="product-card-image">
                                            <a href="{{ url($slug.'/product/'.$product->slug) }}"
                                                class="product-img">
                                                <img src="{{ get_file($product->cover_image_path, $currentTheme) }}"
                                                    class="default-img">
                                            </a>
                                            <div class="new-labl">
                                                <a href="javascript:void(0)" class="wishbtn wishbtn-globaly"
                                                    product_id="{{ $product->id }}"
                                                    in_wishlist="{{ $product->in_whishlist ? 'remove' : 'add' }}">
                                                    <span class="wish-ic">
                                                        <i
                                                            class="{{ $product->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}"></i>
                                                    </span>
                                                </a>

                                            </div>
                                            {!! \App\Models\Product::actionLinks($currentTheme, $slug, $product) !!}
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-top">
                                                <div class="review-star">
                                                    <span>{{ $product->ProductData->name }}</span>
                                                    <div class="d-flex align-items-center">
                                                        @for ($i = 0; $i < 5; $i++)
                                                            <i
                                                                class="fa fa-star review-stars {{ $i < $product->average_rating ? 'text-warning' : '' }} "></i>
                                                        @endfor
                                                    </div>
                                                </div>
                                                <h3 class="product-title">
                                                    <a class="title"
                                                        href="{{ url($slug.'/product/'.$product->slug) }}">
                                                        {{ $product->name }}</a>
                                                </h3>
                                            </div>
                                            <div class="product-content-bottom">
                                                <div class="pro-bottom-price">
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
                                                <a href="JavaScript:void(0)"
                                                    class="link-btn btn-secondary m-0 w-100 addtocart-btn addcart-btn-globaly"
                                                    product_id="{{ $product->id }}" variant_id="0" qty="1">
                                                    {{ $section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="8"
                                                        height="10" viewBox="0 0 4 6" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M0.65976 0.662719C0.446746 0.879677 0.446746 1.23143 0.65976 1.44839L2.18316 3L0.65976 4.55161C0.446747 4.76856 0.446747 5.12032 0.65976 5.33728C0.872773 5.55424 1.21814 5.55424 1.43115 5.33728L3.34024 3.39284C3.55325 3.17588 3.55325 2.82412 3.34024 2.60716L1.43115 0.662719C1.21814 0.445761 0.872773 0.445761 0.65976 0.662719Z"
                                                            fill=""></path>
                                                    </svg>
                                                </a>
                                                {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $product) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
