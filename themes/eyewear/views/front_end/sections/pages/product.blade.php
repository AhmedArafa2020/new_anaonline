@extends('front_end.layouts.app')
@section('page-title')
    {{ __('Products') }}
@endsection
@php

@endphp

@section('content')
    @include('front_end.sections.partision.header_section')


    <section class="product-page-first-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-12 pdp-left-column">
                    <div class="pdp-left-column-inner">
                        <div class="product-description">
                            <div class="section-title">
                                <div class="row">

                                    <div class="wishlist favorite-icon">
                                        <a href="javascript:void(0)" class=" wishbtn wishbtn-globaly"
                                            product_id="{{ $product->id }}"
                                            in_wishlist="{{ $product->in_whishlist ? 'remove' : 'add' }}">
                                            <span class="wish-ic">
                                                <i class="{{ $product->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}"
                                                    style='color: white'></i>
                                            </span>
                                        </a>
                                    </div>
                                    <span class="subtitle">{{ $product->ProductData->name }}</span>
                                </div>
                                <h2>{{ $product->name }}</h2>
                                <div class="product-type">{{ $product->ProductData->name }}</div>
                            </div>
                            <div class="count-price-wrp">
                                <div class="count-left">
                                    <div class="price product-price-amount">
                                        <ins>
                                            <ins class="min_max_price" style="display: inline;">
                                                {{ $currency_icon }}{{ $mi_price }} -
                                                {{ $currency_icon }}{{ $ma_price }} </ins>
                                        </ins>
                                    </div>
                                    <span class="product-price-error"></span>
                                    @if ($product->track_stock == 0 && $product->stock_status == 'out_of_stock')
                                    @else
                                        <form class="variant_form w-100">
                                        @include('front_end.common.product.variant')
                                            <div class="size-variant-swatch d-flex">
                                                <div class="product-labl mb-0">{{ __('quantity :') }}</div>
                                                &nbsp;
                                                <div class="qty-spinners">
                                                    <button data-product="{{ $product->id }}" type="button"
                                                        class="quantity-decrement change_price" data-product="{{ $product->id}}">
                                                        <svg width="12" height="2" viewBox="0 0 12 2" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0 0.251343V1.74871H12V0.251343H0Z" fill="#61AFB3">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    <input type="text" class="quantity" data-cke-saved-name="quantity"
                                                        name="qty" value="01" min="01" max="100">
                                                    <button data-product="{{ $product->id }}" type="button"
                                                        class="quantity-increment change_price" data-product="{{ $product->id}}">
                                                        <svg width="12" height="12" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6.74868 5.25132V0H5.25132V5.25132H0V6.74868H5.25132V12H6.74868V6.74868H12V5.25132H6.74868Z"
                                                                fill="#61AFB3"></path>
                                                        </svg>
                                                    </button>
                                                </div>

                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>
                            <div class="stock_status"></div>
                            <div class="price product-price-amount price-value">
                            {!! \App\Models\Product::getProductPrice($product, $store, $currentTheme) !!}
                            </div>
                            <div class="row">
                                <div class="col-6  tax-price">{{ __('Tax') }}: <span
                                        class="product_tax_price">{{ $currency }}</span> </div>
                                @if ($product->variant_product == 1)
                                    <h6 class="enable_option">
                                        @if ($product->product_stock > 0)
                                            <span
                                                class="stock">{{ $product->product_stock }}</span><small>{{ __(' in stock') }}</small>
                                        @endif
                                    </h6>
                                @else
                                    <h6>
                                        @if ($product->track_stock == 0)
                                            @if ($product->stock_status == 'out_of_stock')
                                                <span>{{ __('Out of Stock') }}</span>
                                            @elseif ($product->stock_status == 'on_backorder')
                                                <span>{{ __('Available on backorder') }}</span>
                                            @else
                                                <span></span>
                                            @endif
                                        @else
                                            @if ($product->product_stock > 0)
                                                <span>{{ $product->product_stock }}
                                                    {{ __('  in stock') }}</span>
                                            @endif
                                        @endif
                                    </h6>
                                @endif
                            </div>
                            <div class="product-hook">
                            <a href="{{ route('page.product-list', $slug) }}" class="btn white-btn"
                                style="margin-bottom: 10px;margin-top: 10px;">
                                {!! $section->product->section->button->text ?? __('Shop Now') !!}
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.4605 6.00095C11.7371 5.72433 11.7371 5.27584 11.4605 4.99921L7.2105 0.749214C6.93388 0.472592 6.48539 0.472592 6.20877 0.749214C5.93215 1.02584 5.93215 1.47433 6.20877 1.75095L9.9579 5.50008L6.20877 9.24921C5.93215 9.52584 5.93215 9.97433 6.20877 10.2509C6.48539 10.5276 6.93388 10.5276 7.2105 10.2509L11.4605 6.00095ZM1.54384 10.2509L5.79384 6.00095C6.07046 5.72433 6.07046 5.27584 5.79384 4.99921L1.54384 0.749214C1.26721 0.472592 0.818723 0.472592 0.542102 0.749214C0.26548 1.02583 0.26548 1.47433 0.542102 1.75095L4.29123 5.50008L0.542101 9.24921C0.26548 9.52584 0.26548 9.97433 0.542101 10.2509C0.818722 10.5276 1.26721 10.5276 1.54384 10.2509Z"
                                        fill="white"></path>
                                </svg>
                            </a>

                                @if ($product->track_stock == 0 && $product->stock_status == 'out_of_stock')
                                @else
                                    <button
                                        class="btn addtocart-btn white-btn addcart-btn addcart-btn-globaly price-wise-btn product_var_option"
                                        product_id="{{ $product->id }}" variant_id="0" qty="1">
                                        {{$section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                                        <svg viewBox="0 0 10 5" width="12" height="11" viewBox="0 0 12 11"
                                            fill="none">
                                            <path
                                                d="M2.37755e-08 2.57132C-3.38931e-06 2.7911 0.178166 2.96928 0.397953 2.96928L8.17233 2.9694L7.23718 3.87785C7.07954 4.031 7.07589 4.28295 7.22903 4.44059C7.38218 4.59824 7.63413 4.60189 7.79177 4.44874L9.43039 2.85691C9.50753 2.78197 9.55105 2.679 9.55105 2.57146C9.55105 2.46392 9.50753 2.36095 9.43039 2.28602L7.79177 0.69418C7.63413 0.541034 7.38218 0.544682 7.22903 0.702329C7.07589 0.859976 7.07954 1.11192 7.23718 1.26507L8.1723 2.17349L0.397965 2.17336C0.178179 2.17336 3.46059e-06 2.35153 2.37755e-08 2.57132Z">
                                            </path>
                                        </svg>
                                    </button>
                                    {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $product) !!}
                                @endif
                                @include('front_end.hooks.product_detail_info_button')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-12 pdp-center-column">
                    <div class="pdp-center-inner-sliders">
                        <div class="main-slider-wrp">
                            <div class="pdp-main-slider">
                                @foreach ($product->Sub_image($product->id)['data'] as $item)
                                    <div class="pdp-main-slider-itm">
                                        <div class="pdp-main-img img-wrapper wdef">
                                            <img src="{{ get_file($item->image_path, $currentTheme) }}" alt="" />
                                            @foreach ($latestSales as $productId => $saleData)
                                                <div class="custom-output sale-tag-product">
                                                    <div class="sale_tag_icon rounded col-1 onsale">
                                                        <div>{{ __('Sale!') }}</div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="view-lbl">
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12"
                                        viewBox="0 0 13 12" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M1.49569 4.86808C1.49569 6.72102 2.9978 8.22312 4.85074 8.22312L10.4039 8.22312L9.30495 7.12416C9.11778 6.93698 9.11778 6.63351 9.30495 6.44634C9.49213 6.25916 9.7956 6.25916 9.98278 6.44634L11.8999 8.3635C11.9898 8.45339 12.0403 8.5753 12.0403 8.70242C12.0403 8.82953 11.9898 8.95144 11.8999 9.04133L9.98278 10.9585C9.7956 11.1457 9.49213 11.1457 9.30495 10.9585C9.11778 10.7713 9.11778 10.4678 9.30495 10.2807L10.4039 9.18171L4.85074 9.18171C2.46839 9.18171 0.537109 7.25043 0.537109 4.86808C0.53711 2.48572 2.46839 0.554444 4.85074 0.554444L9.64387 0.554445C9.90857 0.554445 10.1232 0.769032 10.1232 1.03374C10.1232 1.29844 9.90857 1.51303 9.64387 1.51303L4.85074 1.51303C2.9978 1.51303 1.49569 3.01514 1.49569 4.86808Z"
                                            fill="white" />
                                    </svg>
                                </span>
                                <div>{{ __('View 360*') }}</div>
                                <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="13"
                                        height="12" viewBox="0 0 13 12" fill="none">
                                        <g clip-path="url(#clip0_9_1927)">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.3168 6.78524C11.3168 4.9323 9.8147 3.4302 7.96176 3.4302L2.40858 3.4302L3.50755 4.52916C3.69472 4.71634 3.69472 5.01981 3.50755 5.20699C3.32037 5.39416 3.0169 5.39416 2.82972 5.20699L0.912553 3.28982C0.822668 3.19993 0.772172 3.07802 0.772172 2.9509C0.772172 2.82379 0.822668 2.70188 0.912553 2.61199L2.82972 0.694825C3.0169 0.507649 3.32037 0.507649 3.50755 0.694825C3.69472 0.882 3.69472 1.18547 3.50755 1.37265L2.40858 2.47161L7.96176 2.47161C10.3441 2.47161 12.2754 4.40289 12.2754 6.78524C12.2754 9.1676 10.3441 11.0989 7.96176 11.0989L3.16863 11.0989C2.90393 11.0989 2.68934 10.8843 2.68934 10.6196C2.68934 10.3549 2.90393 10.1403 3.16863 10.1403L7.96176 10.1403C9.8147 10.1403 11.3168 8.63819 11.3168 6.78524Z"
                                                fill="white" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_9_1927">
                                                <rect width="11.503" height="11.503" fill="white"
                                                    transform="translate(0.771484 0.0751953)" />
                                            </clipPath>
                                        </defs>
                                    </svg></span>
                            </div>
                        </div>
                        <div class="pdp-thumb-wrap">
                            <div class="pdp-thumb-slider common-arrows">
                                @foreach ($product->Sub_image($product->id)['data'] as $item)
                                    <div class="pdp-thumb-slider-itm">
                                        <div class="pdp-thumb-img img-wrapper">
                                            <img src="{{ get_file($item->image_path, $currentTheme) }}" />
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pdp-thumb-nav-wrap">
                                <div class="pdp-thumb-nav">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12 pdp-right-column">
                    <div class="pdp-right-column-inner">

                        {!! \App\Models\Testimonial::ProductReview($currentTheme, 1, $product->id) !!}

                        <div class="product-description-right">
                            @if ($product->variant_product == 1)
                                <div class="pdp-block pdp-variable">
                                    <span><b>{{ __('SKU') }}:</b>
                                        @foreach ($product_stocks as $product_stock)
                                            {{ $product_stock->sku }},
                                        @endforeach
                                    </span>
                                </div>
                                <div class="pdp-block pdp-variable">
                                    <span><b>{{ __('Category:') }}</b>
                                        @foreach ($product_stocks as $product_stock)
                                            {{ $product_stock->variant }},
                                        @endforeach
                                    </span>
                                </div>
                            @endif
                            <div class="pdp-block pdp-info-block product-variant-description">
                                <p>
                                    {!! strip_tags($product->description) !!}
                                </p>
                            </div>

                            @include('front_end.common.product.sale_counter')
                            @include('front_end.common.product.custom_filed')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('front_end.sections.homepage.best_product_second_section')
    {{-- tab section.  --}}
    @include('front_end.theme_common_table')
    @include('front_end.hooks.product_detail_slider')

    @include('front_end.sections.homepage.product_section')


    @include('front_end.sections.homepage.review_section')
    @include('front_end.sections.homepage.blog_section')
    @include('front_end.sections.partision.footer_section')
@endsection

@push('page-script')
@endpush
