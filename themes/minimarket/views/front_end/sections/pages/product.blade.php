@extends('front_end.layouts.app')
@section('page-title')
{{ __('Products') }}
@endsection
@php

@endphp

@section('content')
@include('front_end.sections.partision.header_section')

<div class="main-parent-top">
    <img src="{{ asset('themes/' . $currentTheme . '/assets/images/circle-design.png') }}" class="desk-only"
        id="circle-design7" alt="circle-design">
    <!-- product slider sec start  -->
    <section class="product-sec padding-top">

        <div class=" container">
            <div class=" row">
                <div class=" col-md-6 col-12">
                    <div class="product-left-inner">
                        <div class="top-row">
                            <a href="{{ route('page.product-list',$slug) }}" class="back-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31"
                                    fill="none">
                                    <circle cx="15.5" cy="15.5" r="15.0441" stroke="white" stroke-width="0.911765" />
                                    <g clip-path="url(#clip0_318_284)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M20.5867 15.7639C20.5867 15.9859 20.4067 16.1658 20.1848 16.1658L12.3333 16.1659L13.2777 17.0834C13.4369 17.2381 13.4406 17.4925 13.2859 17.6517C13.1313 17.8109 12.8768 17.8146 12.7176 17.66L11.0627 16.0523C10.9848 15.9766 10.9409 15.8727 10.9409 15.7641C10.9409 15.6554 10.9848 15.5515 11.0627 15.4758L12.7176 13.8681C12.8768 13.7135 13.1313 13.7172 13.2859 13.8764C13.4406 14.0356 13.4369 14.29 13.2777 14.4447L12.3333 15.3621L20.1848 15.362C20.4067 15.362 20.5867 15.5419 20.5867 15.7639Z"
                                            fill="white" />
                                    </g>
                                </svg>
                                <span> {{ $page_json->product_page->section->button->text ?? __('Back to category') }}	</span>
                            </a>
                            <a href="javascript:void(0)" class="wishbtn variant_form wishbtn-globaly"
                                product_id="{{$product->id}}"
                                in_wishlist="{{ $product->in_whishlist ? 'remove' : 'add'}}">
                               
                                <span class="wish-ic">
                                    <i class="{{ $product->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}"></i>
                                </span>
                            </a>

                        </div>

                        <div class="common-heading">
                            <span class="sub-heading "> {{$product->name}}</span>
                            <h2>{{ $product->ProductData->name }} </h2>
                            <p class="product-variant-description"> {!! $product->description ?? '' !!}</p>
                            <div class="price product-price-amount">
                                <ins class="min_max_price" style="display: inline;">
                                    {{ $currency_icon }}{{ $mi_price }} -
                                    {{ $currency_icon }}{{ $ma_price }}
                                </ins>
                            </div>
                        </div>
                        <div class="pdp-counter">
                            <div class="count-right">
                                <div class="count-right-inner">
                                @include('front_end.common.product.sale_counter')
                                    @include('front_end.common.product.custom_filed')
                                </div>
                            </div>
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
                                <form class="variant_form w-100">
                                    @csrf
                                    @if ($product->track_stock == 0 && $product->stock_status == 'out_of_stock')
                                    @else
                                    <div class="top-content">
                                        <div class="prorow-lbl-qntty">
                                            <div class="product-labl ">{{__('quantity')}}</div>
                                            <div class="qty-spinner">
                                                <button type="button" data-product="{{ $product->id }}"  class="quantity-decrement change_price">
                                                    <svg width="12" height="2" viewBox="0 0 12 2" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0 0.251343V1.74871H12V0.251343H0Z" fill="#61AFB3">
                                                        </path>
                                                    </svg>
                                                </button>
                                                <input type="text" class="quantity" data-cke-saved-name="quantity"
                                                    name="qty" value="01" min="01" max="100">
                                                <button type="button" data-product="{{ $product->id }}"  class="quantity-increment change_price">
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M6.74868 5.25132V0H5.25132V5.25132H0V6.74868H5.25132V12H6.74868V6.74868H12V5.25132H6.74868Z"
                                                            fill="#61AFB3"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="select-container">
                                              @include('front_end.common.product.variant')
                                            {{-- <div class="details">Height: 78cm </div> --}}
                                        </div>
                                    </div>
                                    @endif
                                    <div class="price-div d-flex align-items-center variant-price">
                                        <div class="price d-flex align-items-end product-price-amount price-value">
                                        {!! \App\Models\Product::getProductPrice($product, $store, $currentTheme) !!}
                                        </div>
                                    </div>

                                    <div class="product-hook">
                                    @if ($product->track_stock == 0 && $product->stock_status == 'out_of_stock')
                                        @else    
                                    <a href="javascript:void(0)"
                                        class="addtocart-btn addcart-btn variant_form addcart-btn-globaly common-btn price-wise-btn product_var_option"
                                        product_id="{{ $product->id }}"
                                        variant_id="{{ $product->default_variant_id }}" qty="1">
                                        <span> {{ $section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}	</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16"
                                            viewBox="0 0 14 16" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.1258 5.12596H2.87416C2.04526 5.12596 1.38823 5.82533 1.43994 6.65262L1.79919 12.4007C1.84653 13.1581 2.47458 13.7481 3.23342 13.7481H10.7666C11.5254 13.7481 12.1535 13.1581 12.2008 12.4007L12.5601 6.65262C12.6118 5.82533 11.9547 5.12596 11.1258 5.12596ZM2.87416 3.68893C1.21635 3.68893 -0.0977 5.08768 0.00571155 6.74226L0.364968 12.4904C0.459638 14.0051 1.71574 15.1851 3.23342 15.1851H10.7666C12.2843 15.1851 13.5404 14.0051 13.635 12.4904L13.9943 6.74226C14.0977 5.08768 12.7837 3.68893 11.1258 3.68893H2.87416Z"
                                                fill="white" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3.40723 4.40744C3.40723 2.42332 5.01567 0.81488 6.99979 0.81488C8.9839 0.81488 10.5923 2.42332 10.5923 4.40744V5.84447C10.5923 6.24129 10.2707 6.56298 9.87384 6.56298C9.47701 6.56298 9.15532 6.24129 9.15532 5.84447V4.40744C9.15532 3.21697 8.19026 2.2519 6.99979 2.2519C5.80932 2.2519 4.84425 3.21697 4.84425 4.40744V5.84447C4.84425 6.24129 4.52256 6.56298 4.12574 6.56298C3.72892 6.56298 3.40723 6.24129 3.40723 5.84447V4.40744Z"
                                                fill="white" />
                                        </svg>
                                    </a>
                                    {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $product) !!}
                                    @endif
                                        @include('front_end.hooks.product_detail_info_button')
                                    </div>
                                </form>
                                <div class="stock_status"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="slider-wrapper">
                        <div class="product-thumb-slider">
                            @foreach ($product->Sub_image($product->id)['data'] as $item)
                            <div class="product-thumb-item">
                                <div class="thumb-img">
                                    <img src="{{ get_file($item->image_path, $currentTheme) }}" class="product-img">

                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="product-main-slider lightbox">
                            @foreach ($product->Sub_image($product->id)['data'] as $item)
                            <div class="product-main-item">
                                <div class="product-item-img">
                                    <img src="{{ get_file($item->image_path, $currentTheme) }}" class="product-img">

                                    @foreach ($latestSales as $productId => $saleData)
                                    <div class="custom-output sale-tag-product">
                                        <div class="sale_tag_icon rounded col-1 onsale">
                                            <div>{{ __('Sale!') }}</div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <a href="{{ get_file($item->image_path, $currentTheme) }}" data-caption="{{$product->name}}"
                                        class="open-lightbox ">
                                        <div class="img-prew-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20"
                                                viewBox="0 0 25 25" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M0 9.375C0 14.5527 4.19733 18.75 9.375 18.75C11.5395 18.75 13.5328 18.0164 15.1196 16.7843C15.1794 16.9108 15.2615 17.0293 15.3661 17.1339L22.8661 24.6339C23.3543 25.122 24.1457 25.122 24.6339 24.6339C25.122 24.1457 25.122 23.3543 24.6339 22.8661L17.1339 15.3661C17.0293 15.2615 16.9108 15.1794 16.7844 15.1196C18.0164 13.5328 18.75 11.5395 18.75 9.375C18.75 4.19733 14.5527 0 9.375 0C4.19733 0 0 4.19733 0 9.375ZM2.5 9.375C2.5 5.57804 5.57804 2.5 9.375 2.5C13.172 2.5 16.25 5.57804 16.25 9.375C16.25 13.172 13.172 16.25 9.375 16.25C5.57804 16.25 2.5 13.172 2.5 9.375Z"
                                                    fill="white" />
                                            </svg>
                                        </div>
                                        <span class="img-prew-text">{{__('click to preview')}}</span>
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
    {{-- tab section.  --}}
    @include('front_end.theme_common_table')
    @include('front_end.hooks.product_detail_slider')

    <!-- description sec end  -->
</div>

<div class="main-parent-bottom">

    <img src="{{asset('themes/'.$currentTheme.'/assets/images/right.png')}}" class="d-right" style="top: -15%;">

    <!-- testimonials slider start  -->
    @include('front_end.sections.homepage.review_section')
    <!-- testimonials slider end  -->
    <!-- filter gallary start -->
    @include('front_end.sections.homepage.product_section')
    <!-- filter gallary end -->

    <!-- subcscribe banner start  -->
    @include('front_end.sections.homepage.subscribe_section')
    <!-- subcscribe banner end  -->
</div>

@include('front_end.sections.partision.footer_section')
@endsection

@push('page-script')
@endpush
