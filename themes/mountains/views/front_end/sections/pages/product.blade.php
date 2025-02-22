@extends('front_end.layouts.app')
@section('page-title')
    {{ __('Products') }}
@endsection

@section('content')
@include('front_end.sections.partision.header_section')
@php
    $latestSales = \App\Models\Product::productSalesTag($currentTheme, $slug, $product->id);
@endphp
    <section class="product-page-section">
        <div class="container">
            <div class="top-row">
                <a href="{{ route('page.product-list', $slug) }}" class="back-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31"
                        fill="none">
                        <circle cx="15.5" cy="15.5" r="15.0441" stroke="white" stroke-width="0.911765" />
                        <g clip-path="url(#clip0_318_284)">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M20.5867 15.7639C20.5867 15.9859 20.4067 16.1658 20.1848 16.1658L12.3333 16.1659L13.2777 17.0834C13.4369 17.2381 13.4406 17.4925 13.2859 17.6517C13.1313 17.8109 12.8768 17.8146 12.7176 17.66L11.0627 16.0523C10.9848 15.9766 10.9409 15.8727 10.9409 15.7641C10.9409 15.6554 10.9848 15.5515 11.0627 15.4758L12.7176 13.8681C12.8768 13.7135 13.1313 13.7172 13.2859 13.8764C13.4406 14.0356 13.4369 14.29 13.2777 14.4447L12.3333 15.3621L20.1848 15.362C20.4067 15.362 20.5867 15.5419 20.5867 15.7639Z"
                                fill="white" />
                        </g>
                    </svg>
                    <span>{{ $page_json->product_page->section->button->text ?? __('Back to Category') }}</span>
                </a>
                <a href="#" class="wishbtn wishbtn-globaly" product_id="{{ $product->id }}"
                    in_wishlist="{{ $product->in_whishlist ? 'remove' : 'add' }}">
                    <span class="wish-ic" style="float: inline-end; margin-left: auto;">
                        <i class="{{ $wishlist->isNotEmpty() ? 'fa fa-heart' : 'ti ti-heart' }}"></i>

                        <input type="hidden" class="wishlist_type" name="wishlist_type" id="wishlist_type"
                            value="{{ $wishlist->isNotEmpty() ? 'remove' : 'add' }}">
                    </span>
                </a>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="slider-wrapper">
                        <div class="product-thumb-slider">
                            @foreach ($product->Sub_image($product->id)['data'] as $item)
                                <div class="product-thumb-item">
                                    <div class="thumb-img">
                                        <img src="{{ get_file($item->image_path, $currentTheme) }}" alt="product">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="product-main-slider lightbox">
                            @foreach ($product->Sub_image($product->id)['data'] as $item)
                                <div class="product-main-item">
                                    <div class="product-item-img">
                                        <img src="{{ get_file($item->image_path, $currentTheme) }}" alt="product">

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
                        <div class="border-with-custoim-arrow">
                            <div class="customarrows">
                                <div class="slick-prev1 fourth-left"><img
                                        src="{{ asset('themes/' . $currentTheme . '/assets/images/arrow.png') }}">
                                </div>
                                <div class="slick-next1 fourth-right"><img
                                        src="{{ asset('themes/' . $currentTheme . '/assets/images/right-arr.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-left-inner">
                        <div class="review-detail">
                            <span>{{ $product->ProductData->name }}</span>
                            @for ($i = 0; $i < 5; $i++)
                                <i class="ti ti-star {{ $i < $product->is_review ? 'text-warning' : '' }} "></i>
                            @endfor
                            <span><b>{{ $product->average_rating }}.0 /</b> 5.0</span>
                        </div>
                        <div class="section-title">
                            <h2>
                                {{ $product->name }} <br /> {{ $product->default_variant_name }}
                            </h2>

                            <p class="product-variant-description">{!! $product->description !!}
                            </p>
                        </div>

                        <div class="count-price-wrp">
                            <div class="count-left">
                                <div class="price product-price-amount custom-output">
                                    <ins>
                                        <ins class="min_max_price" style="display: inline;">
                                            {{ $currency_icon }}{{ $mi_price }} -
                                            {{ $currency_icon }}{{ $ma_price }} </ins>
                                    </ins>
                                </div>
                                @if ($product->variant_product == 1)
                                    <h6 class="enable_option custom-output">
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
                                    <form class="variant_form w-100">
                                        <div class="prorow-lbl">
                                            <div class="prorow-lbl-qntty">
                                                <div class="product-page-section text-white">{{ __('quantity') }} :
                                                </div>
                                                <div class="qty-spinner">
                                                    <button type="button" data-product="{{ $product->id }}" class="quantity-decrement change_price">
                                                        <svg width="12" height="2" viewBox="0 0 12 2"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0 0.251343V1.74871H12V0.251343H0Z" fill="#61AFB3">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    <input type="text" class="quantity"
                                                        data-cke-saved-name="quantity" name="qty" value="01"
                                                        min="01" max="100">

                                                    <button type="button" data-product="{{ $product->id }}" class="quantity-increment change_price">
                                                        <svg width="12" height="12" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6.74868 5.25132V0H5.25132V5.25132H0V6.74868H5.25132V12H6.74868V6.74868H12V5.25132H6.74868Z"
                                                                fill="#61AFB3"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="prorow-lbl-color">
                                            @include('front_end.common.product.variant')
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </div>
                            <div class="count-right">
                                @if ($latestSales)
                                    @foreach ($latestSales as $productId => $saleData)
                                        <input type="hidden" class="flash_sale_start_date"
                                            value={{ $saleData['start_date'] }}>
                                        <input type="hidden" class="flash_sale_end_date"
                                            value={{ $saleData['end_date'] }}>
                                        <input type="hidden" class="flash_sale_start_time"
                                            value={{ $saleData['start_time'] }}>
                                        <input type="hidden" class="flash_sale_end_time"
                                            value={{ $saleData['end_time'] }}>
                                        <div id="flipdown" class="flipdown"></div>
                                    @endforeach
                                @endif
                                @include('front_end.common.product.custom_filed')
                            </div>
                        </div>

                        <div class="price-div d-flex align-items-center">
                            @if ($product->track_stock == 0 && $product->stock_status == 'out_of_stock')
                            @else
                                <div class="product-hook">
                                    <a href="javascript:void(0)" class="btn theme-btn addcart-btn price-wise-btn product_var_option addcart-btn-globaly"
                                        product_id="{{ $product->id }}"
                                        variant_id="{{ $product->default_variant_id }}" qty="1">
                                        {{ $section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16"
                                            viewBox="0 0 14 16" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.1258 5.12599H2.87416C2.04526 5.12599 1.38823 5.82536 1.43994 6.65265L1.79919 12.4008C1.84653 13.1581 2.47458 13.7481 3.23342 13.7481H10.7666C11.5254 13.7481 12.1535 13.1581 12.2008 12.4008L12.5601 6.65265C12.6118 5.82536 11.9547 5.12599 11.1258 5.12599ZM2.87416 3.68896C1.21635 3.68896 -0.0977 5.08771 0.00571155 6.74229L0.364968 12.4904C0.459638 14.0051 1.71574 15.1852 3.23342 15.1852H10.7666C12.2843 15.1852 13.5404 14.0051 13.635 12.4904L13.9943 6.74229C14.0977 5.08771 12.7836 3.68896 11.1258 3.68896H2.87416Z"
                                                fill="#F2DFCE" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3.40723 4.4075C3.40723 2.42339 5.01567 0.814941 6.99979 0.814941C8.9839 0.814941 10.5923 2.42339 10.5923 4.4075V5.84453C10.5923 6.24135 10.2707 6.56304 9.87384 6.56304C9.47701 6.56304 9.15532 6.24135 9.15532 5.84453V4.4075C9.15532 3.21703 8.19026 2.25197 6.99979 2.25197C5.80932 2.25197 4.84425 3.21703 4.84425 4.4075V5.84453C4.84425 6.24135 4.52256 6.56304 4.12574 6.56304C3.72892 6.56304 3.40723 6.24135 3.40723 5.84453V4.4075Z"
                                                fill="#F2DFCE" />
                                        </svg>
                                    </a>
                                    {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $product) !!}
                                    @include('front_end.hooks.product_detail_info_button')</div>
                                </div>
                            @endif
                            <div class="price product-price-amount price-value d-flex align-items-center">
                                {!! \App\Models\Product::getProductPrice($product, $store, $currentTheme) !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @include('front_end.theme_common_table')
    @include('front_end.hooks.product_detail_slider')

    <section class="pdp-place place-section product-page padding-bottom">
        <div class="row no-gutters justify-content-between align-items-center flex-dairection">
            <div class="col-lg-4 col-md-4 col-12">
                <div class="place-left">
                    <img src="{{ asset('themes/' . $currentTheme  . '/assets/images/place-left-one.png') }}"
                        class="place-left-one" alt="">
                    <img src="{{ asset('themes/' . $currentTheme  . '/assets/images/place-left-two.png') }}"
                        class="place-left-two" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="place-section-center">
                    <div class="place-desc-titile">
                        <div class="section-title">
                            <span class="subtitle">{{ __('Description') }}:</span>
                        </div>
                        <p>{!! $product->description !!}</p>
                    </div>
                    @if ($product->variant_product == 1)
                        <div class="place-desc-titile">
                            <div class="section-title">
                                <span class="subtitle">{{ __('MORE') }}:</span>
                            </div>
                            <div class="place-desc">
                                <div class="place-desc-number">
                                    <span>{{ __('SKU') }}: @foreach ($product_stocks as $product_stock)
                                            <b>{{ $product_stock->sku }},</b>
                                        @endforeach
                                    </span>
                                    <span>{{ __('Category') }}: {{ $product->ProductData->name }}</span>
                                </div>
                                <div class="place-desc-size">
                                    <span>{{ __('Size') }}:@foreach ($product_stocks as $product_stock)
                                            <b>{{ $product_stock->variant }},</b>
                                        @endforeach
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="place-right">
                    <div class="place-right-image">
                        <img class="" alt="Place-right-img"
                            src="{{ asset('themes/' . $currentTheme . '/assets/images/place-right-five.png') }}"
                            class="place-left-one" alt="">
                    </div>
                    <div class="place-right-image">
                        <img alt="Place-right-img"
                            src="{{ asset('themes/' . $currentTheme . '/assets/images/place-right-four.png') }}"
                            class="place-left-one" alt="">
                    </div>
                    <div class="place-right-image">
                        <img alt="Place-right-img"
                            src="{{ asset('themes/' . $currentTheme . '/assets/images/place-right-three.png') }}"
                            class="place-left-one" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('front_end.sections.homepage.review_section')
@include('front_end.sections.homepage.newest_category_section')
@include('front_end.sections.homepage.blog_section')
@include('front_end.sections.partision.footer_section')
@endsection