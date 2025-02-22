<section class="img-product-card padding-top"
    style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <img src="{{ get_file($section->bestseller_slider->section->image->image ?? '', $currentTheme)}}" class="desing-img-1"
        id="{{ $section->bestseller_slider->section->image->slug ?? '' }}_preview" alt="cat-img">
    <div class="container">
        <div class="img-product-card-heading">
            <div class="section-title">
                <h2 id="{{ $section->bestseller_slider->section->title->slug ?? '' }}">{!!
                    $section->bestseller_slider->section->title->text ?? '' !!} </h2>
                <p id="{{ $section->bestseller_slider->section->description->slug ?? '' }}">{!!
                    $section->bestseller_slider->section->description->text ?? '' !!}</p>
                <a href="{{ route('page.product-list', $slug) }}" class="btn" tabindex="0"
                    id="{{ ($section->bestseller_slider->section->button->slug ?? '') }}_preview">
                    {!! $section->bestseller_slider->section->button->text ?? "" !!}
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="13" viewBox="0 0 17 13" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.50042 10.6026C11.6248 10.6026 13.8466 8.63934 15.1477 7.00428C15.599 6.43718 15.599 5.68012 15.1477 5.11301C13.8466 3.47795 11.6248 1.51466 8.50042 1.51466C5.37605 1.51466 3.15427 3.47795 1.85313 5.11301C1.40184 5.68012 1.40184 6.43718 1.85313 7.00428C3.15427 8.63934 5.37605 10.6026 8.50042 10.6026ZM16.3329 7.94743C17.2235 6.82829 17.2235 5.289 16.3329 4.16986C14.918 2.39185 12.3072 0 8.50042 0C4.69367 0 2.08284 2.39185 0.66794 4.16986C-0.222646 5.289 -0.222647 6.82829 0.66794 7.94743C2.08284 9.72545 4.69367 12.1173 8.50042 12.1173C12.3072 12.1173 14.918 9.72545 16.3329 7.94743Z"
                            fill="#12131A" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M10.0127 6.05862C10.0127 6.89514 9.3346 7.57328 8.49807 7.57328C7.66155 7.57328 6.98341 6.89514 6.98341 6.05862C6.98341 6.03712 6.98386 6.01573 6.98475 5.99445C7.10281 6.03601 7.2298 6.05862 7.36208 6.05862C7.98947 6.05862 8.49807 5.55002 8.49807 4.92262C8.49807 4.79035 8.47546 4.66335 8.4339 4.54529C8.45518 4.54441 8.47658 4.54396 8.49807 4.54396C9.3346 4.54396 10.0127 5.2221 10.0127 6.05862ZM11.5274 6.05862C11.5274 7.73167 10.1711 9.08794 8.49807 9.08794C6.82502 9.08794 5.46875 7.73167 5.46875 6.05862C5.46875 4.38557 6.82502 3.0293 8.49807 3.0293C10.1711 3.0293 11.5274 4.38557 11.5274 6.05862Z"
                            fill="#12131A" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="img-product-card-slider">
            @foreach ($all_products as $products)
            <div class="product-card-main product-card">
                <div class="product-card-inner product-card-bg">
                    <div class="product-card-img">
                        <a href="{{ url($slug.'/product/'.$products->slug) }}">
                            <img src="{{ get_file($products->cover_image_path, $currentTheme) }}" alt="">
                        </a>
                    </div>
                    <div class="product-card-content">
                        <div class="about-subtitle">
                            <div class="subtitle-pointer">
                                <span>{{ !empty($products->ProductData->name) ? $products->ProductData->name : '' }}</span>
                                <div class="about-title">
                                    {!! \App\Models\Product::productSalesPage($currentTheme, $slug, $products->id) !!}
                                </div>
                            </div>
                            <div class="card-title">
                                {!! \App\Models\Product::actionLinks($currentTheme, $slug, $products) !!}
                                <div class="card-add-to-list long_sting_to_dot" title="{{ $products->name }} {{ $products->default_variant_name }} ">
                                    <h3>
                                        <a href="{{ url($slug.'/product/'.$products->slug) }}"
                                            class="short-description">{{ $products->name }} <br>
                                            {{ $products->default_variant_name }} </a>
                                    </h3>
                                    <a href="JavaScript:void(0)" class="wishbtn wishbtn-globaly"
                                        product_id="{{ $products->id }}"
                                        in_wishlist="{{ $products->in_whishlist ? 'remove' : 'add' }}">
                                        <span class="wish-ic">
                                            <i class="{{ $products->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}"></i>
                                            <input type="hidden" class="wishlist_type" name="wishlist_type"
                                                id="wishlist_type"
                                                value="{{ $products->in_whishlist ? 'remove' : 'add' }}">
                                        </span>
                                    </a>
                                </div>
                                <div class="product-card-itm-datail">
                                    @if ($products->variant_product == 0)
                                        <div class="price">
                                            {!! \App\Models\Product::getProductPrice($products, $store, $currentTheme) !!}
                                        </div>
                                    @else
                                        <div class="price">
                                            <ins>{{ __('In Variant') }}</ins>
                                        </div>
                                    @endif
                                    <a href="javascript:void(0)" class="btn btn-secondary addcart-btn-globaly"
                                        product_id="{{ $products->id }}" variant_id="0" qty="1">
                                        {{ $section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                                    </a>
                                    {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $products) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>