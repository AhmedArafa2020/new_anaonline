<section class="full-width-second-section"  tyle="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
        <img src="{{asset('themes/'.$currentTheme.'/assets/images/about-us.png')}}" class="about-img">
    <div class="full-container">
        <div class="d-flex full-width-row align-items-center">
            <div class="col-xl-6 col-lg-4 col-sm-6 col-12">
                <div class="second-right-img">
                    <img  src="{{ get_file($section->product->section->image_left->image ?? '', $currentTheme) }}"
                        class="double-bluthoth {{ ($section->product->section->image_left->slug ?? '').'_preview'}}" alt="image" >
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                @if (!empty($latest_product))
                <div class="second-full-width-card product-card">
                    <div class="product-card-inner">
                        <div class="card-top">
                            <span class="slide-label">{{!empty($latest_product->ProductData) ? $latest_product->ProductData->name : ''}} </span>
                            {!! \App\Models\Product::productSalesPage($currentTheme, $slug, $latest_product->id) !!}

                            <a href="javascript:void(0)" class="wishlist wbwish  wishbtn-globaly" product_id="{{$latest_product->id}}" in_wishlist="{{ $latest_product->in_whishlist ? 'remove' : 'add'}}">
                                    <span class="wish-ic">
                                        <i class="{{ $latest_product->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}" style='color: black;'></i>
                                    </span>
                                </a>
                                {!! \App\Models\Product::actionLinks($currentTheme, $slug, $latest_product) !!}
                        </div>
                        <h3 class="product-title">
                            <a href="{{url($slug.'/product/'.$latest_product->slug)}}">
                                {{$latest_product->name}}
                            </a>
                        </h3>
                        <div class="card-info">
                            <p class="descriptions">{{strip_tags($latest_product->description)}}</p>
                        </div>
                        <div class="product-content">
                            <div class="product-content-bottom d-flex align-items-center justify-content-between">
                                @if ($latest_product->variant_product == 0)
                                    <div class="price">
                                    {!! \App\Models\Product::getProductPrice($latest_product, $store, $currentTheme) !!}
                                    </div>
                                @else
                                    <div class="price">
                                        <ins>{{ __('In Variant') }}</ins>
                                    </div>
                                @endif
                                <a href="javascript:void(0)" class="btn-primary add-cart-btn addcart-btn-globaly" product_id="{{ $latest_product->id }}" variant_id="0" qty="1">
                                    {{ $section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                                </a>
                                {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $latest_product) !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                <div class="second-left-img">
                    <img src="{{ get_file($section->product->section->image_right->image ?? '', $currentTheme) }}"
                        class="full-width-bluthooth {{ ($section->product->section->image_right->slug ?? '').'_preview'}}" alt="image">
                </div>
            </div>
        </div>
    </div>
</section>
