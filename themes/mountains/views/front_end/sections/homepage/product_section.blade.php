<section class="prodcut-card-section padding-top"
    style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                <div class="prodcut-card-heading">
                    <div class="section-title">
                        <span class="subtitle" id="{{ $section->product->section->sub_title->slug ?? '' }}_preview">{!! $section->product->section->sub_title->text ?? '' !!}</span>
                        <h2 id="{{ $section->product->section->title->slug ?? '' }}_preview"> {!!
                            $section->product->section->title->text ?? '' !!}
                        </h2>
                        <p id="{{ $section->product->section->description->slug ?? '' }}_preview">{!! $section->product->section->description->text ?? '' !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-8 col-12">
                <div class="product-card-slider">
                    @foreach ($modern_products->take(6) as $m_pro)
                    <div class="product-card-main product-card">
                        <div class="product-card-inner product-card-bg">
                            <div class="product-card-img">
                                <a href="{{ url($slug.'/product/'.$m_pro->slug) }}">
                                    <img src="{{ get_file($m_pro->cover_image_path, $currentTheme) }}" alt="">
                                </a>
                            </div>
                            <div class="product-card-content">
                                <div class="about-subtitle">
                                    <div class="subtitle-pointer">
                                        <span>{{ !empty($m_pro->ProductData->name) ? $m_pro->ProductData->name : '' }}</span>
                                        <div class="about-title">
                                        {!! \App\Models\Product::productSalesPage($currentTheme, $slug, $m_pro->id) !!}
                                        </div>
                                    </div>
                                    {!! \App\Models\Product::actionLinks($currentTheme, $slug, $m_pro) !!}
                                    <div class="card-title">
                                        <div class="card-add-to-list long_sting_to_dot" class="wishlist">
                                            <h3>
                                                <a href="{{ url($slug.'/product/'.$m_pro->slug) }}"
                                                    class="short-description">{{ $m_pro->name }}
                                                    <br /> {{ $m_pro->default_variant_name }} </a>
                                            </h3>
                                            <a href="javascript:void(0)" class="wishbtn wishbtn-globaly"
                                                product_id="{{ $m_pro->id }}"
                                                in_wishlist="{{ $m_pro->in_whishlist ? 'remove' : 'add' }}">
                                                <span class="wish-ic">
                                                    <i
                                                        class="{{ $m_pro->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}"></i>
                                                    <input type="hidden" class="wishlist_type" name="wishlist_type"
                                                        id="wishlist_type"
                                                        value="{{ $m_pro->in_whishlist ? 'remove' : 'add' }}">
                                                </span>
                                            </a>
                                        </div>
                                        <div class="product-card-itm-datail">
                                            @if ($m_pro->variant_product == 0)
                                            <div class="price">
                                            {!! \App\Models\Product::getProductPrice($m_pro, $store, $currentTheme) !!}
                                            </div>
                                            @else
                                            <div class="price">
                                                <ins>{{ __('In Variant') }}</ins>
                                            </div>
                                            @endif
                                            <a href="javascript:void(0)" class="btn btn-secondary addcart-btn-globaly"
                                                product_id="{{ $m_pro->id }}" variant_id="0" qty="1">
                                                {{ $section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                                            </a>
                                            {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $m_pro) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
