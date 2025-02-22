<section class="about-product padding-top"
    style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="row align-items-center justify-content-center">
        <div class="col-lg-6 col-12">
            <div class="about card">
                @foreach ($products->take(1) as $product)
                <div class="about-product-main product-card">
                    <div class="about-product-img">
                        <a href="{{ url($slug.'/product/'.$product->slug) }}">
                            <img src="{{ get_file($product->cover_image_path, $currentTheme) }}" alt="">
                        </a>
                    </div>
                    <div class="about-product-content">
                        <div class="about-subtitle">
                            <div class="about-subtitle-inner">
                                <div class="subtitle-pointer">
                                    <img src="{{ asset('themes/' . $currentTheme . '/assets/images/slider-inner-line-right.png') }}" alt="">
                                    <span>{!! $section->category->section->title->text ?? '' !!}</span>
                                </div>
                                <a href="javascript:void(0)" class="wishbtn wishbtn-globaly"
                                    product_id="{{ $product->id }}"
                                    in_wishlist="{{ $product->in_whishlist ? 'remove' : 'add' }}">
                                    <span class="wish-ic">
                                        <i
                                            class="{{ $product->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}"></i>
                                        <input type="hidden" class="wishlist_type" name="wishlist_type"
                                            id="wishlist_type"
                                            value="{{ $product->in_whishlist ? 'remove' : 'add' }}">
                                    </span>
                                </a>
                            </div>

                            <div class="about-title">
                                <h3>
                                    <a href="{{ url($slug.'/product/'.$product->slug) }}">{{ $product->name }}</a>
                                </h3>
                                {!! \App\Models\Product::actionLinks($currentTheme, $slug, $product) !!}
                                <div class="about-itm-datail">
                                    @if ($product->variant_id != 0)
                                    <b> {!! \App\Models\ProductVariant::variantlist($product->variant_id) !!} </b>
                                    @endif
                                    @if ($product->variant_product == 0)
                                    <div class="price">
                                    {!! \App\Models\Product::getProductPrice($product, $store, $currentTheme) !!}
                                    </div>
                                    @else
                                    <div class="price">
                                        <ins>{{ __('In Variant') }}</ins>
                                    </div>
                                    @endif
                                    <a href="javascript:void(0)" class="btn addcart-btn-globaly" product_id="{{ $product->id }}" variant_id="0" qty="1">
                                        {{ $section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                                    </a>
                                    {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $product) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach ($products->take(1) as $product)
                <div class="about-product-main about-product-bg product-card">
                    <div class="about-product-img">
                        <a href="{{ url($slug.'/product/'.$product->slug) }}">
                            <img src='{{ get_file($product->cover_image_path, $currentTheme) }}' alt="">
                        </a>
                    </div>
                    <div class="about-product-content">
                        <div class="about-subtitle">
                            <div class="about-subtitle-inner">
                                <div class="subtitle-pointer">
                                    <img src="{{ asset('themes/' . $currentTheme . '/assets/images/slider-inner-line-right.png') }}"
                                        alt="">
                                    <span>{!! $section->category->section->title->text ?? '' !!}</span>
                                </div>
                                <a href="javascript:void(0)" class="wishbtn wishbtn-globaly"
                                    product_id="{{ $product->id }}"
                                    in_wishlist="{{ $product->in_whishlist ? 'remove' : 'add' }}">
                                    <span class="wish-ic">
                                        <i
                                            class="{{ $product->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}"></i>
                                        <input type="hidden" class="wishlist_type" name="wishlist_type"
                                            id="wishlist_type"
                                            value="{{ $product->in_whishlist ? 'remove' : 'add' }}">
                                    </span>
                                </a>
                            </div>

                            <div class="about-title">
                                <h3>
                                    <a href="{{ url($slug.'/product/'.$product->slug) }}">{{ $product->name }}</a>
                                </h3>
                                {!! \App\Models\Product::actionLinks($currentTheme, $slug, $product) !!}
                                <div class="about-itm-datail">
                                    @if ($product->variant_id != 0)
                                        <b> {!! \App\Models\ProductVariant::variantlist($product->variant_id) !!} </b>
                                    @endif
                                    @if ($product->variant_product == 0)
                                        <div class="price">
                                            {!! \App\Models\Product::getProductPrice($product, $store, $currentTheme) !!}
                                        </div>
                                    @else
                                        <div class="price">
                                            <ins>{{ __('In Variant') }}</ins>
                                        </div>
                                    @endif
                                    <a href="javascript:void(0)" class="btn btn-secondary addcart-btn-globaly"
                                        product_id="{{ $product->id }}" variant_id="0" qty="1">
                                        {{ $section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                                    </a>
                                    {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $product) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @foreach ($all_products->take(1) as $product)
        <div class="col-lg-6 col-12">
            <div class="about-product-main-wrp">
                <div class="about-product-content">
                    <div class="about-subtitle">
                        <div class="about-subtitle-inner">
                            <div class="subtitle-pointer">
                                <img src="{{ asset('themes/' . $currentTheme . '/assets/images/slider-inner-line-right.png') }}" alt="">
                                <span>{!! $section->category->section->title->text ?? '' !!}</span><br>
                            </div>
                        </div>
                        <div class="about-title">
                            <h3>
                                <a href="{{ url($slug.'/product/'.$product->slug) }}">{{ $product->name }}</a>
                            </h3>
                            <div class="about-itm-datail">
                                @if ($product->variant_product == 0)
                                <div class="price">
                                {!! \App\Models\Product::getProductPrice($product, $store, $currentTheme) !!}
                                </div>
                                @else
                                <div class="price">
                                    <ins>{{ __('In Variant') }}</ins>
                                </div>
                                @endif
                                <a href="javascript:void(0)" class="btn addcart-btn-globaly"
                                    product_id="{{ $product->id }}" variant_id="0" qty="1">
                                    {{ $section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                                </a>
                                {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $product) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-product-img-wrp">
                    <a href="{{ url($slug.'/product/'.$product->slug) }}">
                        <img src="{{ get_file($product->cover_image_path, $currentTheme) }}" alt="">
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>