@extends('front_end.layouts.app')
@section('page-title')
    {{ __('Products') }}
@endsection
@php

@endphp

@section('content')
    @include('front_end.sections.partision.header_section')


        <section class="pdp-slider-sec">

            <div class="container">

                <div class="row no-gutters">
                    <div class="col-md-6 col-12 pdp-left-col">
                        @foreach ($latestSales as $productId => $saleData)
                            <div class="custom-output sale-tag-product">
                                <div class="sale_tag_icon rounded col-1 onsale">
                                    <div>{{ __('Sale!') }}</div>
                                </div>
                            </div>
                        @endforeach
                        <div class="slider-wrapper">
                            <div class="product-main-slider lightbox">
                                @foreach ($product->Sub_image($product->id)['data'] as $item)
                                    <div class="pro-main-itm">
                                        <div class="pro-main-itm-inner">
                                            <div class="pro-main-img">
                                                <img src= "{{ get_file($item->image_path, $currentTheme) }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="product-thumb-slider">
                                @foreach ($product->Sub_image($product->id)['data'] as $item)
                                    <div class="pdp-thumb-slider-itm">
                                        <div class="pdp-thumb-img">
                                            <img src="{{ get_file($item->image_path, $currentTheme) }}">

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 pdp-right-col">
                        <div class="pdp-right-inner">
                            <div class="top-title d-flex justify-content-between">
                                <div class="custom-output">

                                    @foreach ($latestSales as $productId => $saleData)
                                        <span class="wishlist-num">
                                            @if ($saleData['discount_type'] == 'flat')
                                                -{{ $saleData['discount_amount'] }}{{ $currency_icon }}
                                            @elseif ($saleData['discount_type'] == 'percentage')
                                                -{{ $saleData['discount_amount'] }}%
                                            @endif
                                        </span>
                                    @endforeach
                                </div>

                                    <a href="javascript:void(0)" class="wishlist-btn wishbtn-globaly "
                                        product_id="{{ $product->id }}"
                                        in_wishlist="{{ $product->in_whishlist ? 'remove' : 'add' }}">
                                        <span class="wish-ic">
                                            <i class="{{ $product->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}"></i>
                                        </span>
                                    </a>
                            </div>
                            <!-- <div class=" dark-p">
                                {!! \App\Models\Testimonial::ProductReview($currentTheme, 1, $product->id) !!}                                 
                            </div> -->
                                <div class="ratings-div d-flex align-items-center">
                                    <span>{{ ucfirst($product->label->name ?? '') }}</span>
                                    <div class="ratings d-flex align-items-center">
                                        <div class="reviews-stars-outer">
                                            @for ($i = 0; $i < 5; $i++)
                                                <i class="ti ti-star review-stars {{ $i < $product->average_rating ? 'text-warning' : '' }} "></i>
                                            @endfor
                                        </div>
                                        <div class="point-wrap">
                                            <span class="review-point">{{ $product->average_rating }}.0 /
                                                <span>{{ __('5.0') }}</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="section-title">
                                    <h2 class="name">{{ $product->name }} </h2>
                                </div>
                                <p>
                                    {{ $product->ProductData->name }}
                                </p>
                                <p class="product-variant-description">
                                    {{ strip_tags($product->description) }}
                                </p>
                                <div class="price product-price-amount">
                                        <ins class="min_max_price" style="display: inline;">
                                            {{ $currency_icon }}{{ $mi_price }} -
                                            {{ $currency_icon }}{{ $ma_price }} </ins>
                                </div>

                                <div class="count-price-wrp">
                                    <div class="count-left">
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
                                        <span class="product-price-error"></span>
                                        @if ($product->track_stock == 0 && $product->stock_status == 'out_of_stock')
                                        @else
                                            <form class="variant_form ">
                                            @include('front_end.common.product.variant')
                                                <div class="size-variant-swatch d-flex">
                                                    <div class="color-lbl d-block">{{ __('quantity :') }}</div>&nbsp;
                                                    <div class="qty-spinner">
                                                        <button type="button" data-product="{{ $product->id }}" class="quantity-decrement change_price" data-product="{{ $product->id}}">
                                                            <svg width="12" height="2" viewBox="0 0 12 2"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0 0.251343V1.74871H12V0.251343H0Z" fill="#61AFB3">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                        <input type="text" class="quantity"
                                                            data-cke-saved-name="quantity" name="qty" value="01"
                                                            min="01" max="100">
                                                        <button type="button" data-product="{{ $product->id }}" class="quantity-increment change_price" data-product="{{ $product->id}}">
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
                                    <div class="count-right">
                                        @include('front_end.common.product.sale_counter')
                                        @include('front_end.common.product.custom_filed')
                                    </div>
                                </div>
                                <div class="stock_status"></div>
                                <div class="price product-price-amount price-value">
                                {!! \App\Models\Product::getProductPrice($product, $store, $currentTheme) !!}
                                </div>

                                <div class="btn-wrapper product-hook">
                                    <a href="javascript:void(0)" class="btn  addcart-btn addcart-btn-globaly"
                                        product_id="{{ $product->id }}" variant_id="{{ $product->default_variant_id }}"
                                        qty="1">
                                        {{$section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16"
                                            viewBox="0 0 14 16" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.1258 5.12599H2.87416C2.04526 5.12599 1.38823 5.82536 1.43994 6.65265L1.79919 12.4008C1.84653 13.1581 2.47458 13.7481 3.23342 13.7481H10.7666C11.5254 13.7481 12.1535 13.1581 12.2008 12.4008L12.5601 6.65265C12.6118 5.82536 11.9547 5.12599 11.1258 5.12599ZM2.87416 3.68896C1.21635 3.68896 -0.0977 5.08771 0.00571155 6.74229L0.364968 12.4904C0.459638 14.0051 1.71574 15.1852 3.23342 15.1852H10.7666C12.2843 15.1852 13.5404 14.0051 13.635 12.4904L13.9943 6.74229C14.0977 5.08771 12.7836 3.68896 11.1258 3.68896H2.87416Z"
                                                fill="#F2DFCE"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3.40723 4.4075C3.40723 2.42339 5.01567 0.814941 6.99979 0.814941C8.9839 0.814941 10.5923 2.42339 10.5923 4.4075V5.84453C10.5923 6.24135 10.2707 6.56304 9.87384 6.56304C9.47701 6.56304 9.15532 6.24135 9.15532 5.84453V4.4075C9.15532 3.21703 8.19026 2.25197 6.99979 2.25197C5.80932 2.25197 4.84425 3.21703 4.84425 4.4075V5.84453C4.84425 6.24135 4.52256 6.56304 4.12574 6.56304C3.72892 6.56304 3.40723 6.24135 3.40723 5.84453V4.4075Z"
                                                fill="#F2DFCE"></path>
                                        </svg>
                                    </a>
                                    {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $product) !!}
                                    @include('front_end.hooks.product_detail_info_button')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


            {{-- tab section.  --}}
            @include('front_end.theme_common_table')


        @if ($reviews->isNotEmpty())

            @include('front_end.sections.homepage.review_section')
        @endif
        @include('front_end.hooks.product_detail_slider')

            @include('front_end.sections.homepage.best_product_second')

    @include('front_end.sections.partision.footer_section')
@endsection

@push('page-script')
@endpush
