<section class="bestseller-card padding-top padding-bottom" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>

        <div class="container">
            <div class="home-card-slider-heading">
                <div class="section-title">
                    <span class="subtitle"
                        id="{{ $section->newest_category->section->sub_title->slug ?? '' }}_preview">
                        {!! $section->newest_category->section->sub_title->text ?? '' !!} </span>
                    <h2 id="{{ $section->newest_category->section->title->slug ?? '' }}_preview"> {!!
                        $section->newest_category->section->title->text ?? '' !!}
                    </h2>
                </div>
                <div class="section-title-btn">
                    <a href="" class="btn" tabindex="0"
                        id="{{ ($section->newest_category->section->button->slug ?? '') }}_preview">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.9 4.2C11.0598 4.2 12 3.2598 12 2.1C12 0.940202 11.0598 0 9.9 0C8.7402 0 7.8 0.940202 7.8 2.1C7.8 3.2598 8.7402 4.2 9.9 4.2ZM9.9 3C9.40294 3 9 2.59706 9 2.1C9 1.60294 9.40294 1.2 9.9 1.2C10.3971 1.2 10.8 1.60294 10.8 2.1C10.8 2.59706 10.3971 3 9.9 3ZM2.57574 11.8241C2.81005 12.0584 3.18995 12.0584 3.42426 11.8241C3.65858 11.5898 3.65858 11.2099 3.42426 10.9756L2.64853 10.1999L3.42417 9.42421C3.65849 9.18989 3.65849 8.81 3.42417 8.57568C3.18986 8.34137 2.80996 8.34137 2.57564 8.57568L1.8 9.35133L1.02436 8.57568C0.790041 8.34137 0.410142 8.34137 0.175827 8.57568C-0.0584871 8.81 -0.0584871 9.18989 0.175827 9.42421L0.951472 10.1999L0.175736 10.9756C-0.0585786 11.2099 -0.0585786 11.5898 0.175736 11.8241C0.410051 12.0584 0.789949 12.0584 1.02426 11.8241L1.8 11.0484L2.57574 11.8241ZM3.22027 0.197928C3.10542 0.07071 2.94164 -0.00131571 2.77025 1.8239e-05C2.59886 0.00135223 2.43623 0.0759186 2.32337 0.204908L0.748444 2.00491C0.530241 2.2543 0.555521 2.63335 0.804908 2.85156C1.0543 3.06976 1.43335 3.04448 1.65156 2.79509L2.17492 2.19693V2.58746C2.17492 5.1349 4.24003 7.2 6.78746 7.2C8.67215 7.2 10.2 8.72785 10.2 10.6125V11.4C10.2 11.7314 10.4686 12 10.8 12C11.1314 12 11.4 11.7314 11.4 11.4V10.6125C11.4 8.0651 9.3349 6 6.78746 6C4.90277 6 3.37492 4.47215 3.37492 2.58746V2.15994L3.95465 2.80207C4.17671 3.04803 4.55611 3.06741 4.80207 2.84535C5.04803 2.62329 5.06741 2.24389 4.84535 1.99793L3.22027 0.197928Z"
                                fill="black"></path>
                        </svg>
                        {!! $section->newest_category->section->button->text ?? "" !!}
                    </a>
                </div>
            </div>
            <div class="bestseller-card-slider flex-slider">
                @foreach ($bestSeller as $best)
                <div class="card product-card">
                    <div class="seller-slider-inner card-inner">
                        <div class="bestseller-card-bg">
                            <div class="product-content">
                                <div class="custom-output">
                                    {!! \App\Models\Product::productSalesPage($currentTheme, $slug, $best->id) !!}
                                </div>
                                <div class="product-content-top long_sting_to_dot">
                                    <h3 class="product-title">
                                        <a href="{{ url($slug.'/product/'.$best->slug) }}"
                                            class="short-description">
                                            {{ $best->name }} {{ $best->default_variant_name }}
                                        </a>
                                    </h3>
                                    {!! \App\Models\Product::actionLinks($currentTheme, $slug, $best) !!}
                                </div>
                                <div class="product-content-bottom">
                                    @if ($best->variant_product == 0)
                                    <div class="price">
                                    {!! \App\Models\Product::getProductPrice($best, $store, $currentTheme) !!}
                                    </div>
                                    @else
                                    <div class="price">
                                        <ins>{{ __('In Variant') }}</ins>
                                    </div>
                                    @endif
                                    <a href="javascript:void(0)" class="btn btn-secondary addcart-btn-globaly"
                                        product_id="{{ $best->id }}" variant_id="0" qty="1">
                                        {{ $section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                                    </a>
                                    {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $best) !!}
                                </div>
                            </div>
                            <div class="seller-product-card-image">
                                <a href="javascript:void(0)" class="wishbtn wishbtn-globaly" product_id="{{ $best->id }}" style="color: white;" in_wishlist="{{ $best->in_whishlist ? 'remove' : 'add' }}">
                                    <span class="wish-ic">
                                        <i
                                            class="{{ $best->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}"></i>
                                        <input type="hidden" class="wishlist_type" name="wishlist_type"
                                            id="wishlist_type"
                                            value="{{ $best->in_whishlist ? 'remove' : 'add' }}">
                                    </span>
                                </a>
                                <a href="{{ url($slug.'/product/'.$best->slug) }}">
                                    <img src="{{ get_file($best->cover_image_path, $currentTheme) }}" class="default-img">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="border-with-custoim-arrow">
                <div class="customarrows">
                    <div class="slick-prev1 third-left"><img
                            src="{{ asset('themes/' . $currentTheme . '/assets/img/arrow.png') }}"></div>
                    <div class="slick-next1 third-right"><img
                            src="{{ asset('themes/' . $currentTheme . '/assets/img/right-arr.png') }}"></div>
                </div>
            </div>
        </div>
</section>
