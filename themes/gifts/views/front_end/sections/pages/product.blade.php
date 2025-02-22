@extends('front_end.layouts.app')
@section('page-title')
    {{ __('Products') }}
@endsection

@section('content')
    @include('front_end.sections.partision.header_section')

    <section class="pdp-section padding-top padding-bottom">
        <div class="container">
            <div class="common-banner-content">
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
            </div>
            <div class="row align-items-center col-reverse no-gutters product-info">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="review-star">
                        <div class="subtitle">{{ $product->ProductData->name ?? '' }}</div>
                        <div class="star-icon-div">
                            @for ($i = 0; $i < 5; $i++)
                                <i class="ti ti-star {{ $i < $product->rating_no ? 'text-warning' : '' }} "></i>
                            @endfor
                            <span><b>{{ $product->rating_no }}</b> / 5.0</span>
                        </div>

                    </div>
                    <div class="section-title">
                        <h2>{!! $product->name !!}</h2>
                    </div>
                    <p class="product-variant-description">{!! $product->description !!}</p>
                    <div class="price product-price-amount">
                        <ins>
                            <ins class="min_max_price">
                                {{ $currency_icon }}{{ $mi_price }} -
                                {{ $currency_icon }}{{ $ma_price }} </ins>
                        </ins>
                    </div>
                    <div class="pdp-category">
                        <div class="pdp-category-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                viewBox="0 0 30 30" fill="none">
                                <path
                                    d="M15.8759 19.6034V19.3565C19.3392 18.3856 21.9823 13.379 21.9823 7.32757C21.9823 3.27945 18.7003 0 14.6547 0C10.6081 0 7.32715 3.27945 7.32715 7.32757C7.32715 13.379 9.9702 18.3871 13.4336 19.3565V19.6034H13.4347C13.4347 23.2658 14.8621 26.7127 17.4553 29.3103L19.1846 27.5832C17.0523 25.4483 15.8777 22.6136 15.8777 19.6034H15.8759Z"
                                    fill="#49497D" />
                                <path
                                    d="M29.3102 11.6019C29.3102 8.42976 27.1086 5.77718 24.1519 5.07373C24.3237 5.79879 24.4252 6.54987 24.4252 7.32769C24.4252 13.3693 22.1006 18.4392 18.6943 20.7056C19.478 21.6395 20.3877 22.2979 21.3718 22.602V26.8681H23.8145V22.6027C26.9404 21.6439 29.3102 17.0884 29.3102 11.6019Z"
                                    fill="#49497D" />
                                <path
                                    d="M10.6158 20.7056C7.20959 18.4392 4.88492 13.3693 4.88492 7.32769C4.88492 6.54987 4.98495 5.79843 5.15824 5.07373C2.20157 5.77718 0 8.42976 0 11.6019C0 17.0884 2.3712 21.6439 5.49568 22.6027V26.8678H7.93832V22.6016C8.92241 22.2975 9.83213 21.6395 10.6158 20.7056Z"
                                    fill="#49497D" />
                            </svg>
                            <h3>{{ $product->ProductData->name }}</h3>
                        </div>
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
                                            {{ __(' in stock') }}</span>
                                    @endif
                                @endif
                            </h6>
                        @endif
                        <span class="product-price-error"></span>
                    </div>

                    @include('front_end.common.product.sale_counter')
                    @if ($product->track_stock == 0 && $product->stock_status == 'out_of_stock')
                    @else
                        <form class="variant_form w-100">
                            <div class="radio-buttons">
                            @include('front_end.common.product.variant')
                            </div>
                            <div class="product-qty-div">
                                <div class="product-labl  mb-0 inline_lable">{{ 'Quantity' }}</div>
                                <div class="inline_contant">
                                    <div class="qty-spinners ">
                                        <button type="button" data-product="{{ $product->id }}" class="quantity-decrement change_price ">
                                            <svg width="12" height="2" viewBox="0 0 12 2"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 0.251343V1.74871H12V0.251343H0Z" class="btn_cust">
                                                </path>
                                            </svg>
                                        </button>
                                        <input type="text" class="quantity qty_cust"
                                            data-cke-saved-name="quantity" name="qty" value="01"
                                            min="01" max="100">
                                        <button type="button" data-product="{{ $product->id }}" class="quantity-increment change_price ">
                                            <svg width="12" height="12" viewBox="0 0 12 12"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.74868 5.25132V0H5.25132V5.25132H0V6.74868H5.25132V12H6.74868V6.74868H12V5.25132H6.74868Z"
                                                    class="btn_cust"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                    @include('front_end.common.product.custom_filed')
                    <div class="stock_status"></div>
                    <div class="pdp-cart-btn-wrp">
                        <div class="price product-price-amount price-value">
                        {!! \App\Models\Product::getProductPrice($product, $store, $currentTheme) !!}
                        </div>
                        @if ($product->track_stock == 0 && $product->stock_status == 'out_of_stock')
                        @else
                            <a href="javascript:void(0)" class="btn addtocart-btn btn addcart-btn  addcart-btn-globaly price-wise-btn product_var_option"
                                product_id="{{ $product->id }}" variant_id="{{ $product->default_variant_id }}"
                                qty="1">
                                {{ $section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="ms-2" width="14" height="16"
                                    viewBox="0 0 14 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.1258 5.12587H2.87416C2.04526 5.12587 1.38823 5.82524 1.43994 6.65253L1.79919 12.4006C1.84653 13.158 2.47458 13.748 3.23342 13.748H10.7666C11.5254 13.748 12.1535 13.158 12.2008 12.4006L12.5601 6.65253C12.6118 5.82524 11.9547 5.12587 11.1258 5.12587ZM2.87416 3.68884C1.21635 3.68884 -0.0977 5.08759 0.00571155 6.74217L0.364968 12.4903C0.459638 14.005 1.71574 15.185 3.23342 15.185H10.7666C12.2843 15.185 13.5404 14.005 13.635 12.4903L13.9943 6.74217C14.0977 5.08759 12.7837 3.68884 11.1258 3.68884H2.87416Z"
                                        fill="#0A062D"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M3.40723 4.40738C3.40723 2.42326 5.01567 0.814819 6.99979 0.814819C8.9839 0.814819 10.5923 2.42326 10.5923 4.40738V5.8444C10.5923 6.24123 10.2707 6.56292 9.87384 6.56292C9.47701 6.56292 9.15532 6.24123 9.15532 5.8444V4.40738C9.15532 3.21691 8.19026 2.25184 6.99979 2.25184C5.80932 2.25184 4.84425 3.21691 4.84425 4.40738V5.8444C4.84425 6.24123 4.52256 6.56292 4.12574 6.56292C3.72892 6.56292 3.40723 6.24123 3.40723 5.8444V4.40738Z"
                                        fill="#0A062D"></path>
                                </svg>
                            </a>
                            {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $product) !!}
                        @endif
                    </div>
                    <div class="product-hook">
                        @include('front_end.hooks.product_detail_info_button')
                    </div>
                </div>
                <div class="col-md-6 col-12 pdp-left-col">
                    <div class="pdp-left-inner-sliders">
                        <div class="main-slider-wrp">
                            <div class="pdp-main-slider lightbox">
                                @foreach ($product->Sub_image($product->id)['data'] as $item)
                                    <div class="pdp-main-slider-itm">
                                        <div class="pdp-main-img">
                                            <a href="#" class="pdp-slider-img">
                                                {{-- <img src="assets/images/Gift-Mockup-slider.png"> --}}
                                                <img src="{{ get_file($item->image_path, $currentTheme) }}"> </a>

                                            @foreach ($latestSales as $productId => $saleData)
                                                <div class="custom-output sale-tag-product">
                                                    <div class="sale_tag_icon rounded col-1 onsale">
                                                        <div>{{ __('Sale!') }}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <a href="{{ get_file($item->image_path, $currentTheme) }}"
                                                data-caption="Caption 1" class="open-lightbox">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                    height="25" viewBox="0 0 25 25" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M0 9.375C0 14.5527 4.19733 18.75 9.375 18.75C11.5395 18.75 13.5328 18.0164 15.1196 16.7843C15.1794 16.9108 15.2615 17.0293 15.3661 17.1339L22.8661 24.6339C23.3543 25.122 24.1457 25.122 24.6339 24.6339C25.122 24.1457 25.122 23.3543 24.6339 22.8661L17.1339 15.3661C17.0293 15.2615 16.9108 15.1794 16.7844 15.1196C18.0164 13.5328 18.75 11.5395 18.75 9.375C18.75 4.19733 14.5527 0 9.375 0C4.19733 0 0 4.19733 0 9.375ZM2.5 9.375C2.5 5.57804 5.57804 2.5 9.375 2.5C13.172 2.5 16.25 5.57804 16.25 9.375C16.25 13.172 13.172 16.25 9.375 16.25C5.57804 16.25 2.5 13.172 2.5 9.375Z"
                                                        fill="white" />
                                                </svg>
                                            </a>

                                            <div class="pdp-wishlist">
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
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="pdp-thumb-slider">
                        @foreach ($product->Sub_image($product->id)['data'] as $item)
                            <div class="pdp-thumb-slider-itm">
                                <div class="pdp-thumb-img">
                                    <img src="{{ get_file($item->image_path, $currentTheme) }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="slider-navgation">
                        <div class="slider-nav"></div>
                        <span class="pagingInfo-pdp"></span>
                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                            <span class="slider__label sr-only">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- tab section.  --}}
    @include('front_end.theme_common_table')
    @include('front_end.hooks.product_detail_slider')
    @include('front_end.sections.homepage.best_product_second')
    @include('front_end.sections.homepage.bestseller_slider_section')
    @include('front_end.sections.homepage.review_section')
    @include('front_end.sections.homepage.subscribe_section')
    @include('front_end.sections.partision.footer_section')
@endsection