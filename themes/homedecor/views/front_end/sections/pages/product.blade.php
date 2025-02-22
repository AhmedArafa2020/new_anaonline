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
            <div class="row align-items-start">
                <div class="col-lg-4 col-md-6 col-12 pdp-left-column">
                    <a href="{{ route('page.product-list', $slug) }}" class="back-btn">
                        <span class="svg-ic">
                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="5" viewBox="0 0 11 5"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10.5791 2.28954C10.5791 2.53299 10.3818 2.73035 10.1383 2.73035L1.52698 2.73048L2.5628 3.73673C2.73742 3.90636 2.74146 4.18544 2.57183 4.36005C2.40219 4.53467 2.12312 4.53871 1.9485 4.36908L0.133482 2.60587C0.0480403 2.52287 -0.000171489 2.40882 -0.000171488 2.2897C-0.000171486 2.17058 0.0480403 2.05653 0.133482 1.97353L1.9485 0.210321C2.12312 0.0406877 2.40219 0.044729 2.57183 0.219347C2.74146 0.393966 2.73742 0.673036 2.5628 0.842669L1.52702 1.84888L10.1383 1.84875C10.3817 1.84874 10.5791 2.04609 10.5791 2.28954Z"
                                    fill="white"></path>
                            </svg>
                        </span>
                        {{ $page_json->product_page->section->button->text ?? __('Back to Category') }}
                    </a>
                    <div class="pdp-left-inner-sliders">
                        <div class="main-slider-wrp">
                            <div class="pdp-main-slider lightbox">
                                @foreach ($product->Sub_image($product->id)['data'] as $item)
                                    <div class="pdp-main-slider-itm">
                                        <div class="pdp-main-img">
                                            <img src="{{ get_file($item->image_path ?? '', $currentTheme) }}"
                                                alt="lamp">

                                            @foreach ($latestSales as $productId => $saleData)
                                                <div class="custom-output sale-tag-product">
                                                    <div class="sale_tag_icon rounded col-1 onsale">
                                                        <div>{{ __('Sale!') }}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <a href="{{ get_file($item->image_path, $currentTheme) }}"
                                                data-caption="Caption 5" class="open-lightbox" class="product-img">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                    viewBox="0 0 25 25" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M0 9.375C0 14.5527 4.19733 18.75 9.375 18.75C11.5395 18.75 13.5328 18.0164 15.1196 16.7843C15.1794 16.9108 15.2615 17.0293 15.3661 17.1339L22.8661 24.6339C23.3543 25.122 24.1457 25.122 24.6339 24.6339C25.122 24.1457 25.122 23.3543 24.6339 22.8661L17.1339 15.3661C17.0293 15.2615 16.9108 15.1794 16.7844 15.1196C18.0164 13.5328 18.75 11.5395 18.75 9.375C18.75 4.19733 14.5527 0 9.375 0C4.19733 0 0 4.19733 0 9.375ZM2.5 9.375C2.5 5.57804 5.57804 2.5 9.375 2.5C13.172 2.5 16.25 5.57804 16.25 9.375C16.25 13.172 13.172 16.25 9.375 16.25C5.57804 16.25 2.5 13.172 2.5 9.375Z"
                                                        fill="white"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pdp-thumb-slider common-arrows">
                                @foreach ($product->Sub_image($product->id)['data'] as $item)
                                    <div class="pdp-thumb-slider-itm">
                                        <div class="pdp-thumb-img">
                                            <img src="{{ get_file($item->image_path ?? '', $currentTheme) }}"
                                                alt="product">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-12  pdp-right-column">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 pdp-right-inner">
                            <div class="pdp-right-column-inner">
                                <a href="javascript:void(0)" class="back-btn wishbtn wishbtn-globaly"
                                    product_id="{{ $product->id }}"
                                    in_wishlist="{{ $product->in_whishlist ? 'remove' : 'add' }}">
                                    <span class="wish-ic">
                                        <i class="{{ $product->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}"></i>
                                    </span>
                                </a>
                                <div class="product-description">
                                    <div class="review-star">
                                        <span>{{ $product->ProductData->name }}</span>
                                        <div class="d-flex align-items-center">
                                            @for ($i = 0; $i < 5; $i++)
                                                <i
                                                    class="fa fa-star review-stars {{ $i < $product->average_rating ? 'text-warning' : '' }} "></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="section-title">
                                        <h2>{{ $product->name }}</h2>
                                    </div>
                                    <p class="product-variant-description">{!! $product->description ?? '' !!}</p>
                                    <div class="price product-price-amount">

                                        <ins class="min_max_price" style="display: inline;">
                                            {{ $currency_icon }}{{ $mi_price }} -
                                            {{ $currency_icon }}{{ $ma_price }} </ins>

                                    </div>
                                </div>

                                <div class="pdb-content-bottom">
                                @include('front_end.common.product.sale_counter')
                                    @include('front_end.common.product.custom_filed')

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
                                    <form class="variant_form w-100">
                                        @if ($product->track_stock == 0 && $product->stock_status == 'out_of_stock')
                                        @else
                                            @csrf
                                            <div class="prorow-lbl-qntty">
                                                <div class="product-labl d-block">{{ __('quantity') }} :</div>
                                                <div class="qty-spinner" style="background: white;">
                                                    <button type="button" data-product="{{ $product->id }}"
                                                        class="quantity-decrement change_price">
                                                        <svg width="12" height="2" viewBox="0 0 12 2" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0 0.251343V1.74871H12V0.251343H0Z" fill="#61AFB3">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    <input type="text" class="quantity" data-cke-saved-name="quantity"
                                                        name="qty" value="01" min="01" max="100">
                                                    <button type="button" data-product="{{ $product->id }}"
                                                        class="quantity-increment change_price">
                                                        <svg width="12" height="12" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6.74868 5.25132V0H5.25132V5.25132H0V6.74868H5.25132V12H6.74868V6.74868H12V5.25132H6.74868Z"
                                                                fill="#61AFB3"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="product-detail-bttom-stuff">
                                            @if ($product->track_stock == 0 && $product->stock_status == 'out_of_stock')
                                            @else
                                            @include('front_end.common.product.variant')
                                            @endif
                                            <div class="stock_status"></div>
                                            <div class="price product-price-amount price-value">
                                                {!! \App\Models\Product::getProductPrice($product, $store, $currentTheme) !!}
                                            </div>
                                            <div class="product-hook">
                                                @if ($product->track_stock == 0 && $product->stock_status == 'out_of_stock')
                                                @else
                                                    <a href="javascript:void(0)"
                                                        class="btn-secondary addcart-btn-globaly addcart-btn  addcart-btn-globaly price-wise-btn product_var_option"
                                                        product_id="{{ $product->id }}"
                                                        variant_id="{{ $product->default_variant_id }}" qty="1">
                                                        {{ $section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="8"
                                                            height="10" viewBox="0 0 4 6" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M0.65976 0.662719C0.446746 0.879677 0.446746 1.23143 0.65976 1.44839L2.18316 3L0.65976 4.55161C0.446747 4.76856 0.446747 5.12032 0.65976 5.33728C0.872773 5.55424 1.21814 5.55424 1.43115 5.33728L3.34024 3.39284C3.55325 3.17588 3.55325 2.82412 3.34024 2.60716L1.43115 0.662719C1.21814 0.445761 0.872773 0.445761 0.65976 0.662719Z"
                                                                fill=""></path>
                                                        </svg>
                                                    </a>
                                                    {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $product) !!}

                                                    @include('front_end.hooks.product_detail_info_button')
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 pdp-right-inner">
                            <div class="pdp-right-column-inner">
                                <div class="product-description  position-relative">
                                    <img src="{{ asset('themes/' . $currentTheme . '/assets/images/pdt-right.png') }}"
                                        alt="bed">
                                    <div class="home-banner-content">
                                        <div class="home-banner-content-inner">
                                            <p>{{ __('Lorem Ipsum is simply dummy text of the printing and typesetting
                                                                                                industry.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-detail-bttom-stuff">
                                    @if ($product_stocks->isNotEmpty())
                                        <div class="about-product">
                                            <h5>{{ __('About Product') }}:</h5>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <ul>
                                                    <li>{{ __('SKU') }}: @foreach ($product_stocks as $product_stock)
                                                            <b>{{ $product_stock->sku }},</b>
                                                        @endforeach
                                                    </li>
                                                    <li>{{ __('Category') }}:{{ $product->ProductData->name }}</li>
                                                </ul>
                                                <ul>
                                                    <li>{{ __('Size') }}: @foreach ($product_stocks as $product_stock)
                                                            <b>{{ $product_stock->variant }},</b>
                                                        @endforeach
                                                    </li>
                                                    {{-- <li>Weight: 60 lbs</li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                    <h5>{{ __('DESCRIPTION') }}:</h5>
                                    <p>{!! $product->detail ?? '' !!} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('front_end.sections.homepage.variant_section')
    @include('front_end.theme_common_table')
    @include('front_end.hooks.product_detail_slider')
    @include('front_end.sections.homepage.best_product_second')
    @include('front_end.sections.homepage.modern_product_section')
    @include('front_end.sections.homepage.review_section')
    @include('front_end.sections.homepage.blog_section')
    @include('front_end.sections.partision.footer_section')
@endsection

@push('page-script')
@endpush
