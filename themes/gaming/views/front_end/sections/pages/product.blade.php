@extends('front_end.layouts.app')
@section('page-title')
{{ __('Products') }}
@endsection
@php

@endphp

@section('content')
@include('front_end.sections.partision.header_section')

<section class="product-main-section pro-main-sec">
    <img src="{{ asset('themes/' . $currentTheme . '/assets/images/design-circle-2.png') }}" class="design-circle-2"
        alt="image">
    <img src="{{ asset('themes/' . $currentTheme . '/assets/images/design-circle-1.png') }}" class="design-circle-1"
        alt="image">
    <div class="container">
        <div class="section-title-inner">
            <a href="{{ route('page.product-list', $slug) }}" class="back-btn">
                <span class="svg-ic">
                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="5" viewBox="0 0 11 5" fill="white">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M10.5791 2.28954C10.5791 2.53299 10.3818 2.73035 10.1383 2.73035L1.52698 2.73048L2.5628 3.73673C2.73742 3.90636 2.74146 4.18544 2.57183 4.36005C2.40219 4.53467 2.12312 4.53871 1.9485 4.36908L0.133482 2.60587C0.0480403 2.52287 -0.000171489 2.40882 -0.000171488 2.2897C-0.000171486 2.17058 0.0480403 2.05653 0.133482 1.97353L1.9485 0.210321C2.12312 0.0406877 2.40219 0.044729 2.57183 0.219347C2.74146 0.393966 2.73742 0.673036 2.5628 0.842669L1.52702 1.84888L10.1383 1.84875C10.3817 1.84874 10.5791 2.04609 10.5791 2.28954Z"
                            fill="white"></path>
                    </svg>
                </span>
                {{ $page_json->product_page->section->button->text ?? __('Back to Category') }}
            </a>
        </div>

        <div class="row">
            <div class="col-md-6 col-12">
                <div class="product-left-inner">
                    <div class="pro-top-row">
                        <span class="slide-label">{{!empty($product->ProductData()) ? $product->ProductData->name : ''}} </span>

                        <a href="javascript:void(0)" class="wishbtn wishbtn-globaly" product_id="{{ $product->id }}"
                            in_wishlist="{{ $product->in_whishlist ? 'remove' : 'add' }}">
                            <span class="wish-ic">
                                <i class="{{ $product->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}"></i>
                            </span>
                        </a>

                        <div class="pro-star d-flex align-items-center">
                            {!! \App\Models\Testimonial::ProductReview($currentTheme, 1, $product->id) !!}
                        </div>
                    </div>
                    <div class="common-heading">
                        <h2>{{ $product->name }}
                        </h2>
                        <p class="product-variant-description">{!! $product->description ?? '' !!}</p>
                        <div class="price product-price-amount">
                            <ins>
                                <ins class="min_max_price" style="display: inline;">
                                    {{ $currency_icon }}{{ $mi_price }} -
                                    {{ $currency_icon }}{{ $ma_price }} </ins>
                            </ins>
                        </div>
                    </div>

                    @include('front_end.common.product.sale_counter')
                    @if ($product->variant_product == 1)
                    <h6 class="enable_option">
                        @if ($product->product_stock > 0)
                        <span class="stock">{{ $product->product_stock }}</span><small>{{ __(' in stock') }}</small>
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
                    <div class="size-selectors dark-doted d-flex align-items-center">
                        <form class="variant_form w-100">
                            @csrf
                            @include('front_end.common.product.variant')
                            <div class="size-variant-swatch d-flex" style="margin-top: 20px;">
                                <p class="product-labl inline_lable">{{ __('Quantity') }} : &nbsp;</p>
                                <div class="inline_contant">
                                    <div class="qty-spinners">
                                        <button type="button" data-product="{{ $product->id }}"
                                            class="quantity-decrement change_price">
                                            <svg width="12" height="2" viewBox="0 0 12 2" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 0.251343V1.74871H12V0.251343H0Z" fill="#61AFB3">
                                                </path>
                                            </svg>
                                        </button>
                                        <input type="text" class="quantity" data-cke-saved-name="quantity" name="qty"
                                            value="01" min="01" max="100">
                                        <button type="button" data-product="{{ $product->id }}"
                                            class="quantity-increment change_price">
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.74868 5.25132V0H5.25132V5.25132H0V6.74868H5.25132V12H6.74868V6.74868H12V5.25132H6.74868Z"
                                                    fill="#61AFB3"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                    @include('front_end.common.product.custom_filed')
                    <div class="stock_status"></div>
                    <div class="product-content-bottom d-flex align-items-center justify-content-between">
                        <div class="price product-price-amount price-value">
                        {!! \App\Models\Product::getProductPrice($product, $store, $currentTheme) !!}
                        </div>

                    </div>
                    <div class="product-hook">
                        @if ($product->track_stock == 0 && $product->stock_status == 'out_of_stock')
                        @else

                        <a href="javascript:void(0)" class="btn-primary addcart-btn addcart-btn-globaly"
                            product_id="{{ $product->id }}" variant_id="{{ $product->default_variant_id }}" qty="1">
                            {{ $section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                        </a>
                        {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $product) !!}
                        @endif
                        @include('front_end.hooks.product_detail_info_button')
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="slider-wrapper">
                    <div class="product-thumb-slider">
                        @foreach ($product->Sub_image($product->id)['data'] as $item)
                        <div class="product-thumb-item">
                            <div class="thumb-img">
                                <img src="{{ get_file($item->image_path, $currentTheme) }}" alt="product-img">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="product-main-slider lightbox">
                        @foreach ($product->Sub_image($product->id)['data'] as $item)
                        <div class="product-main-item">
                            <div class="product-item-img">
                                <img src="{{ get_file($item->image_path, $currentTheme) }}" alt="">
                                @foreach ($latestSales as $productId => $saleData)
                                <div class="custom-output sale-tag-product">
                                    <div class="sale_tag_icon rounded col-1 onsale">
                                        <div>{{ __('Sale!') }}</div>
                                    </div>
                                </div>
                                @endforeach
                                <a href="{{ get_file($item->image_path, $currentTheme) }}" data-caption="Caption 1"
                                    class="open-lightbox ">
                                    <div class="img-prew-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20"
                                            viewBox="0 0 25 25" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0 9.375C0 14.5527 4.19733 18.75 9.375 18.75C11.5395 18.75 13.5328 18.0164 15.1196 16.7843C15.1794 16.9108 15.2615 17.0293 15.3661 17.1339L22.8661 24.6339C23.3543 25.122 24.1457 25.122 24.6339 24.6339C25.122 24.1457 25.122 23.3543 24.6339 22.8661L17.1339 15.3661C17.0293 15.2615 16.9108 15.1794 16.7844 15.1196C18.0164 13.5328 18.75 11.5395 18.75 9.375C18.75 4.19733 14.5527 0 9.375 0C4.19733 0 0 4.19733 0 9.375ZM2.5 9.375C2.5 5.57804 5.57804 2.5 9.375 2.5C13.172 2.5 16.25 5.57804 16.25 9.375C16.25 13.172 13.172 16.25 9.375 16.25C5.57804 16.25 2.5 13.172 2.5 9.375Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('front_end.theme_common_table')
@include('front_end.hooks.product_detail_slider')
@include('front_end.sections.homepage.best_product_second')
@include('front_end.sections.homepage.review_section')
@include('front_end.sections.homepage.best_product_section')
@include('front_end.sections.partision.footer_section')
@endsection

@push('page-script')
@endpush
