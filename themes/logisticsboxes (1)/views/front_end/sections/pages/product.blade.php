@extends('front_end.layouts.app')
@section('page-title')
{{ __('Products') }}
@endsection
@php

@endphp

@section('content')
@include('front_end.sections.partision.header_section')

<section class="product-main-section padding-bottom padding-top">
            <div class="container">
                <a href="{{ route('page.product-list',$slug) }}" class="back-btn mobile-only">
                    <span class="svg-ic">
                        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="5" viewBox="0 0 11 5" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.5791 2.28954C10.5791 2.53299 10.3818 2.73035 10.1383 2.73035L1.52698 2.73048L2.5628 3.73673C2.73742 3.90636 2.74146 4.18544 2.57183 4.36005C2.40219 4.53467 2.12312 4.53871 1.9485 4.36908L0.133482 2.60587C0.0480403 2.52287 -0.000171489 2.40882 -0.000171488 2.2897C-0.000171486 2.17058 0.0480403 2.05653 0.133482 1.97353L1.9485 0.210321C2.12312 0.0406877 2.40219 0.044729 2.57183 0.219347C2.74146 0.393966 2.73742 0.673036 2.5628 0.842669L1.52702 1.84888L10.1383 1.84875C10.3817 1.84874 10.5791 2.04609 10.5791 2.28954Z"
                                fill="white"></path>
                        </svg>
                    </span>
                    {!! $page_json->product_page->section->button->text ?? __('Back to category') !!}
                </a>
                <div class="row pdp-summery-row">

                    <div class="col-lg-6 col-md-6 col-12 pdp-left-side">

                        <div class="pdp-summery">
                            <div class="pdp-top d-flex align-items-center">
                                <a href="{{ route('page.product-list',$slug) }}" class="back-btn">
                                    <span class="svg-ic">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="5"
                                            viewBox="0 0 11 5" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M10.5791 2.28954C10.5791 2.53299 10.3818 2.73035 10.1383 2.73035L1.52698 2.73048L2.5628 3.73673C2.73742 3.90636 2.74146 4.18544 2.57183 4.36005C2.40219 4.53467 2.12312 4.53871 1.9485 4.36908L0.133482 2.60587C0.0480403 2.52287 -0.000171489 2.40882 -0.000171488 2.2897C-0.000171486 2.17058 0.0480403 2.05653 0.133482 1.97353L1.9485 0.210321C2.12312 0.0406877 2.40219 0.044729 2.57183 0.219347C2.74146 0.393966 2.73742 0.673036 2.5628 0.842669L1.52702 1.84888L10.1383 1.84875C10.3817 1.84874 10.5791 2.04609 10.5791 2.28954Z"
                                                fill="white"></path>
                                        </svg>
                                    </span>
                                    {!! $page_json->product_page->section->button->text ?? __('Back to category') !!}
                                </a>
                                <div class="subtitle">{{ $product->ProductData->name }}</div>
                                    <a href="javascript:void(0)" class="wish-btn wishbtn-globaly" tabindex="0"
                                        product_id="{{ $product->id }}"
                                        in_wishlist="{{ $product->in_whishlist ? 'remove' : 'add' }}">
                                        <span class="">
                                            <i class="{{ $product->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}"
                                                style='color:aliceblue;'></i>
                                        </span>
                                    </a>
                            </div>
                            <div class="section-title">
                                <h2>{{ $product->name }}</h2>
                            </div>
                            <p class="product-variant-description">{!! $product->description !!} </p>
                            <div class="price product-price-amount">
                                <ins>
                                    <ins class="min_max_price" style="display: inline;">
                                        {{ $currency_icon }}{{ $mi_price }} -
                                        {{ $currency_icon }}{{ $ma_price }} </ins>
                                </ins>
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
                                                {{ __('  in stock') }}</span>
                                        @endif
                                    @endif
                                </h6>
                            @endif
                            <span class="product-price-error"></span>

                            <div class="pdp-content-bottom">
                            @include('front_end.common.product.sale_counter')
                                @include('front_end.common.product.custom_filed')
                                <div class="stock_status"></div>
                                @if ($product->track_stock == 0 && $product->stock_status == 'out_of_stock')
                                @else
                                    <form class="variant_form ">
                                        <div class="cart-variable row">
                                        @include('front_end.common.product.variant')
                                        </div>
                                       <div class="size-variant-swatch d-flex">
                                            <div class="color-lbl d-block">{{ __('quantity :') }}</div>                 <div class="qty qty-spinner">
                                                <button type="button" data-product="{{ $product->id }}" class="quantity-decrement change_price">
                                                    <svg width="12" height="2" viewBox="0 0 12 2" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0 0.251343V1.74871H12V0.251343H0Z" fill="#61AFB3"></path>
                                                    </svg>
                                                </button>
                                                <input type="text" class="quantity" data-cke-saved-name="quantity" name="qty"
                                                    value="01" min="01" max="100">
                                                <button type="button" data-product="{{ $product->id }}" class="quantity-increment change_price">
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M6.74868 5.25132V0H5.25132V5.25132H0V6.74868H5.25132V12H6.74868V6.74868H12V5.25132H6.74868Z"
                                                            fill="#61AFB3"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                    </form>
                                @endif
                                <div class="price product-price-amount price-value">
                                {!! \App\Models\Product::getProductPrice($product, $store, $currentTheme) !!}
                                </div>
                                <div class="sku-cart-btn-wrp">
                                    <div class="product-hook cart-btn-wrap d-flex align-items-center">
                                        @if ($product->track_stock == 0 && $product->stock_status == 'out_of_stock')
                                        @else
                                            <a href="javascript:void(0)"
                                                class="btn-secondary addcart-btn addtocart-btn-cart addcart-btn-globaly"
                                                product_id="{{ $product->id }}" variant_id="{{ $product->default_variant_id }}"
                                                qty="1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="10"
                                                    viewBox="0 0 16 10" fill="none">
                                                    <path
                                                        d="M15.9364 2.84781L14.6014 0.344242C14.5459 0.241023 14.4611 0.154221 14.3562 0.0934596C14.2514 0.0326985 14.1306 0.000350315 14.0073 0H1.99235C1.86909 0.000350315 1.74834 0.0326985 1.64348 0.0934596C1.53862 0.154221 1.45375 0.241023 1.39828 0.344242L0.0632809 2.84781C0.0216041 2.93104 0 3.02186 0 3.11381C0 3.20576 0.0216041 3.29658 0.0632809 3.37981C0.103334 3.46476 0.163045 3.54028 0.23809 3.60091C0.313135 3.66153 0.401627 3.70573 0.497151 3.73031L1.34488 3.96189V7.6609C1.34877 7.93557 1.44889 8.20141 1.62983 8.41745C1.81077 8.63348 2.06247 8.78771 2.34613 8.85636L7.19217 9.99548C7.24538 10.0015 7.29917 10.0015 7.35237 9.99548H7.48587L13.6335 8.84384C13.9268 8.78184 14.1892 8.62883 14.3782 8.4096C14.5672 8.19037 14.6717 7.91774 14.6748 7.63587V3.88052L15.4892 3.71153C15.5877 3.69014 15.6798 3.64804 15.7584 3.58841C15.837 3.52878 15.9002 3.45316 15.9431 3.36729C15.9817 3.2853 16.0011 3.19649 16 3.10687C15.9988 3.01724 15.9771 2.9289 15.9364 2.84781ZM13.5935 1.25178L14.3611 2.69133L9.68862 3.66146L8.40035 1.25178H13.5935ZM2.4062 1.25178H6.251L4.98275 3.63642L1.64525 2.73514L2.4062 1.25178ZM2.65985 4.31865L5.14962 4.98209C5.20931 4.9912 5.27017 4.9912 5.32985 4.98209C5.45312 4.98174 5.57387 4.94939 5.67873 4.88863C5.78358 4.82787 5.86846 4.74107 5.92392 4.63785L6.66485 3.25463V8.56219L2.65985 7.63587V4.31865ZM13.3398 7.62335L7.99985 8.62477V3.27967L8.74077 4.66288C8.79624 4.7661 8.88111 4.85291 8.98597 4.91367C9.09083 4.97443 9.21158 5.00678 9.33485 5.00713H9.4817L13.3398 4.19973V7.62335Z"
                                                        fill="white"></path>
                                                </svg>{{$section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                                            </a>
                                            {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $product) !!}
                                        @endif
                                        @include('front_end.hooks.product_detail_info_button')
                                            <a href="javascript:void(0)" class="wish-btn  wishbtn-globaly"
                                                product_id="{{ $product->id }}"
                                                in_wishlist="{{ $product->in_whishlist ? 'remove' : 'add' }}">
                                                <span class="">
                                                    <i class="{{ $product->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}"></i>
                                                </span>
                                            </a>
                                    </div>
                                    <div class="sku-variable">
                                        <ul class="sku-list d-flex justify-content-between">
                                            <li>
                                                @if ($product_stocks->isNotEmpty())
                                                    <span><b>{{ __('SKU:') }}</b>
                                                        @foreach ($product_stocks as $product_stock)
                                                            {{ $product_stock->sku }},</b>
                                                        @endforeach
                                                    </span>
                                                @endif
                                            </li>
                                            <li>
                                                <span><b>{{ __('Category:') }}</b> {{ $product->ProductData->name }}</span>
                                            </li>
                                            @if ($product_stocks->isNotEmpty())
                                                <li>
                                                    <span><b>{{ __('Size:') }}</b>
                                                        {{ $product->default_variant_name }}</span>
                                                    {{-- <span><b>Weight:</b> 60 lbs</span> --}}
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 pdp-right-side">
                        <div class="pdp-detail-wrapper">
                            <div class="pdp-detail-top">
                                <div class="size-location d-flex">
                                    <p><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                            viewBox="0 0 21 21" fill="none">
                                            <path
                                                d="M18.2601 0H2.2322C1.64078 0.00192961 1.07413 0.237729 0.65593 0.655929C0.237729 1.07413 0.00192961 1.64078 0 2.2322V18.2967C0.00192961 18.8881 0.237729 19.4548 0.65593 19.873C1.07413 20.2912 1.64078 20.527 2.2322 20.5289H18.2601C18.8452 20.5174 19.4025 20.2774 19.8128 19.8602C20.2231 19.4431 20.4539 18.8819 20.4557 18.2967V2.2688C20.4636 1.67732 20.2371 1.10676 19.8257 0.681682C19.4143 0.256608 18.8515 0.0115466 18.2601 0ZM8.01395 1.46374H12.4052V7.31868H8.01395V1.46374ZM18.992 18.2967C18.992 18.4908 18.9149 18.677 18.7776 18.8142C18.6404 18.9515 18.4542 19.0286 18.2601 19.0286H2.2322C2.13012 19.0388 2.02702 19.0275 1.9296 18.9954C1.83217 18.9632 1.7426 18.9109 1.66669 18.8419C1.59078 18.7729 1.53022 18.6887 1.48895 18.5948C1.44768 18.5008 1.42663 18.3993 1.42714 18.2967V2.2688C1.42188 2.16649 1.43817 2.06422 1.47493 1.9686C1.51168 1.87299 1.5681 1.78615 1.64054 1.71372C1.71297 1.64128 1.7998 1.58486 1.89541 1.54811C1.99103 1.51135 2.0933 1.49507 2.1956 1.50033H6.55022V7.54556C6.55022 7.8833 6.68438 8.2072 6.9232 8.44602C7.16201 8.68484 7.48593 8.81901 7.82367 8.81901H12.5954C12.9332 8.81901 13.2571 8.68484 13.4959 8.44602C13.7347 8.2072 13.8689 7.8833 13.8689 7.54556V1.46374H18.2601C18.3624 1.45848 18.4647 1.47476 18.5603 1.51152C18.6559 1.54828 18.7427 1.6047 18.8152 1.67713C18.8876 1.74957 18.944 1.83639 18.9808 1.93201C19.0175 2.02762 19.0338 2.1299 19.0286 2.2322L18.992 18.2967Z"
                                                fill="#05103B" />
                                            <path
                                                d="M16.7936 13.1738H13.1342C12.9401 13.1738 12.754 13.2509 12.6167 13.3882C12.4795 13.5254 12.4023 13.7116 12.4023 13.9057C12.4023 14.0998 12.4795 14.286 12.6167 14.4232C12.754 14.5605 12.9401 14.6376 13.1342 14.6376H16.7936C16.9877 14.6376 17.1738 14.5605 17.3111 14.4232C17.4483 14.286 17.5254 14.0998 17.5254 13.9057C17.5254 13.7116 17.4483 13.5254 17.3111 13.3882C17.1738 13.2509 16.9877 13.1738 16.7936 13.1738Z"
                                                fill="#05103B" />
                                            <path
                                                d="M16.7977 16.0977H10.9428C10.7487 16.0977 10.5625 16.1748 10.4253 16.312C10.288 16.4493 10.2109 16.6354 10.2109 16.8295C10.2109 17.0236 10.288 17.2098 10.4253 17.347C10.5625 17.4843 10.7487 17.5614 10.9428 17.5614H16.7977C16.9919 17.5614 17.178 17.4843 17.3153 17.347C17.4525 17.2098 17.5296 17.0236 17.5296 16.8295C17.5296 16.6354 17.4525 16.4493 17.3153 16.312C17.178 16.1748 16.9919 16.0977 16.7977 16.0977Z"
                                                fill="#05103B" />
                                            <path
                                                d="M5.60229 12.6559C5.53269 12.5892 5.45061 12.537 5.36077 12.5022C5.18259 12.429 4.98273 12.429 4.80455 12.5022C4.71471 12.537 4.63263 12.5892 4.56303 12.6559L3.09929 14.1196C3.0307 14.1876 2.97625 14.2686 2.9391 14.3578C2.90194 14.4469 2.88281 14.5426 2.88281 14.6392C2.88281 14.7358 2.90194 14.8315 2.9391 14.9207C2.97625 15.0099 3.0307 15.0908 3.09929 15.1588C3.16733 15.2274 3.24828 15.2819 3.33746 15.319C3.42665 15.3562 3.52231 15.3753 3.61892 15.3753C3.71554 15.3753 3.8112 15.3562 3.90039 15.319C3.98957 15.2819 4.07052 15.2274 4.13856 15.1588L4.35079 14.9393V16.8348C4.35079 17.0289 4.4279 17.2151 4.56515 17.3523C4.7024 17.4896 4.88856 17.5667 5.08266 17.5667C5.27676 17.5667 5.46292 17.4896 5.60017 17.3523C5.73742 17.2151 5.81453 17.0289 5.81453 16.8348V14.9393L6.02676 15.1588C6.09515 15.2267 6.17625 15.2803 6.26542 15.3168C6.35459 15.3532 6.45008 15.3716 6.5464 15.3711C6.64271 15.3716 6.7382 15.3532 6.82737 15.3168C6.91654 15.2803 6.99764 15.2267 7.06603 15.1588C7.13462 15.0908 7.18907 15.0099 7.22622 14.9207C7.26338 14.8315 7.28251 14.7358 7.28251 14.6392C7.28251 14.5426 7.26338 14.4469 7.22622 14.3578C7.18907 14.2686 7.13462 14.1876 7.06603 14.1196L5.60229 12.6559Z"
                                                fill="#05103B" />
                                        </svg> {{ $product->default_variant_name }}</p>

                                </div>
                                <p>{!! $product->detail !!} </p>
                                <div class="date-wrap">
                                    <p><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                            viewBox="0 0 21 21" fill="none">
                                            <path
                                                d="M18.6375 2.25H18V1.5C17.9905 1.10517 17.8294 0.729145 17.5501 0.449877C17.2709 0.170609 16.8948 0.00951808 16.5 0H15.075C14.6738 0.00978914 14.2923 0.176087 14.012 0.46337C13.7317 0.750653 13.5749 1.13614 13.575 1.5375V2.25H7.575V1.5C7.56548 1.10517 7.40439 0.729145 7.12513 0.449877C6.84586 0.170609 6.46983 0.00951808 6.075 0H4.65C4.24877 0.00978914 3.86726 0.176087 3.58699 0.46337C3.30671 0.750653 3.14989 1.13614 3.15 1.5375V2.25H2.5125C2.18987 2.22947 1.86646 2.27538 1.56229 2.38488C1.25811 2.49438 0.979647 2.66515 0.744128 2.88661C0.508609 3.10806 0.321047 3.3755 0.193052 3.67237C0.0650574 3.96924 -0.000647509 4.28922 4.80991e-06 4.6125V17.8875C4.80991e-06 18.5141 0.248911 19.115 0.691966 19.558C1.13502 20.0011 1.73593 20.25 2.36251 20.25H18.6375C19.2641 20.25 19.865 20.0011 20.308 19.558C20.7511 19.115 21 18.5141 21 17.8875V4.6125C21 3.98593 20.7511 3.38501 20.308 2.94196C19.865 2.49891 19.2641 2.25 18.6375 2.25ZM16.5 1.5V3.75H15V1.5H16.5ZM6 1.5V3.75H4.5V1.5H6ZM2.36251 3.75H3C3 4.14782 3.15804 4.52935 3.43934 4.81066C3.72065 5.09196 4.10218 5.25 4.5 5.25H6C6.39783 5.25 6.77936 5.09196 7.06066 4.81066C7.34197 4.52935 7.5 4.14782 7.5 3.75H13.5C13.5 4.14782 13.658 4.52935 13.9393 4.81066C14.2206 5.09196 14.6022 5.25 15 5.25H16.5C16.8978 5.25 17.2794 5.09196 17.5607 4.81066C17.842 4.52935 18 4.14782 18 3.75H18.6375C18.8656 3.75196 19.0839 3.84346 19.2452 4.00478C19.4065 4.16611 19.498 4.38436 19.5 4.6125V6.75H1.5V4.6125C1.50196 4.38436 1.59346 4.16611 1.75479 4.00478C1.91612 3.84346 2.13436 3.75196 2.36251 3.75ZM18.6375 18.75H2.36251C2.13436 18.748 1.91612 18.6565 1.75479 18.4952C1.59346 18.3339 1.50196 18.1156 1.5 17.8875V8.25H19.5V17.8875C19.498 18.1156 19.4065 18.3339 19.2452 18.4952C19.0839 18.6565 18.8656 18.748 18.6375 18.75Z"
                                                fill="#05103B" />
                                            <path
                                                d="M9.43342 9.89077C9.33726 9.82108 9.22592 9.77521 9.10857 9.75696C8.99122 9.73871 8.87121 9.74858 8.75842 9.78577L6.50842 10.5358C6.41471 10.5671 6.32811 10.6166 6.2536 10.6815C6.17908 10.7464 6.11812 10.8253 6.07422 10.9138C6.03031 11.0023 6.00433 11.0986 5.99776 11.1972C5.99118 11.2958 6.00415 11.3947 6.03592 11.4883C6.06723 11.582 6.11675 11.6686 6.18162 11.7431C6.2465 11.8176 6.32546 11.8786 6.41397 11.9225C6.50248 11.9664 6.5988 11.9924 6.69738 11.9989C6.79596 12.0055 6.89487 11.9925 6.98842 11.9608L8.24842 11.5408V16.4983C8.24842 16.6972 8.32744 16.8879 8.46809 17.0286C8.60874 17.1693 8.79951 17.2483 8.99842 17.2483C9.19733 17.2483 9.3881 17.1693 9.52875 17.0286C9.6694 16.8879 9.74842 16.6972 9.74842 16.4983V10.4983C9.74787 10.3793 9.71902 10.2621 9.66424 10.1565C9.60947 10.0509 9.53035 9.95978 9.43342 9.89077Z"
                                                fill="#05103B" />
                                            <path
                                                d="M12.75 9.74805C12.1533 9.74805 11.581 9.9851 11.159 10.4071C10.7371 10.829 10.5 11.4013 10.5 11.998V14.998C10.5 15.5948 10.7371 16.1671 11.159 16.589C11.581 17.011 12.1533 17.248 12.75 17.248C13.3467 17.248 13.919 17.011 14.341 16.589C14.7629 16.1671 15 15.5948 15 14.998V11.998C15 11.4013 14.7629 10.829 14.341 10.4071C13.919 9.9851 13.3467 9.74805 12.75 9.74805ZM13.5 14.998C13.5 15.197 13.421 15.3877 13.2803 15.5284C13.1397 15.669 12.9489 15.748 12.75 15.748C12.5511 15.748 12.3603 15.669 12.2197 15.5284C12.079 15.3877 12 15.197 12 14.998V11.998C12 11.7991 12.079 11.6084 12.2197 11.4677C12.3603 11.3271 12.5511 11.248 12.75 11.248C12.9489 11.248 13.1397 11.3271 13.2803 11.4677C13.421 11.6084 13.5 11.7991 13.5 11.998V14.998Z"
                                                fill="#05103B" />
                                        </svg>{{ $product->created_at->format('d M,Y ') }}</p>
                                </div>
                            </div>
                            <div class="pdp-sliders-wrapper">
                                <div class="pdp-main-slider">
                                    @foreach ($product->Sub_image($product->id)['data'] as $item)
                                        <div class="pdp-main-itm">
                                            <div class="pdp-main-media">
                                                <img src="{{ get_file($item->image_path, $currentTheme) }}" alt="">

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="pdp-thumb-slider">
                                    @foreach ($product->Sub_image($product->id)['data'] as $item)
                                        <div class="pdp-thumb-itm">
                                            <div class="pdp-thumb-media">
                                                <img src="{{ get_file($item->image_path, $currentTheme) }}" alt="">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            @foreach ($latestSales as $productId => $saleData)
                                <div class="custom-output sale-tag-product">
                                    <div class="sale_tag_icon rounded col-1 onsale">
                                        <div>{{ __('Sale!') }}</div>
                                    </div>
                                </div>
                            @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if ($product->reviewData()->count() > 0)
            <section class="padding-top product-page-review  testimonial-section padding-bottom">
                <div class="container">
                    <div class="review-slider">
                        @foreach ($product->reviewData as $review)
                            <div class="testimonials-card">
                                <div class="reviews-stars-wrap d-flex align-items-center">
                                    <div class="reviews-stars-outer">
                                        @for ($i = 0; $i < 5; $i++)
                                            <i
                                                class="fa fa-star review-stars {{ $i < $product->average_rating ? 'text-warning' : '' }} "></i>
                                        @endfor
                                    </div>
                                    <div class="point-wrap">
                                        <span class="review-point">{{ $review->rating_no }} / <span>5.0</span></span>
                                    </div>
                                </div>
                                <div class="reviews-words">
                                    <h2>{{ $review->title }}</h2>
                                    <p class="descriptions">{{ $review->description }}</p>
                                    <div class="review-bottom d-flex align-items-center">
                                        <div class="about-product">
                                            <p> {{ $review->ProductData->name }}<span>
                                                    {{ $product->default_variant_name }}</span></p>
                                        </div>
                                        <div class="about-user">
                                            <h6><span>{{ !empty($review->UserData) ? $review->UserData->first_name : '' }}</span>
                                                {{ __('Client') }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <section class="product-page-products padding-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 col-md-6 col-12">
                        <div class="related-product-one product-row">
                            @foreach ($lat_product as $lat)
                                <div class="product-card">
                                    <div class="product-card-inner">
                                        {!! \App\Models\Product::productSalesPage($currentTheme, $slug, $lat->id) !!}
                                        <div class="product-img">
                                            <a href="{{ url($slug.'/product/'.$lat->slug) }}">
                                                <img src="{{ get_file($lat->cover_image_path, $currentTheme) }}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-top">
                                                <div
                                                    class="top-subtitle d-flex align-items-center justify-content-between">
                                                  {{--  <div class="subtitle">{{ $lat->ProductData->name }}</div>--}}
                                                    <p><svg xmlns="http://www.w3.org/2000/svg" width="13"
                                                            height="13" viewBox="0 0 13 13" fill="none">
                                                            <path
                                                                d="M11.5592 0H1.41305C1.03866 0.0012215 0.679958 0.15049 0.415224 0.415224C0.15049 0.679958 0.0012215 1.03866 0 1.41305V11.5824C0.0012215 11.9568 0.15049 12.3155 0.415224 12.5802C0.679958 12.8449 1.03866 12.9942 1.41305 12.9954H11.5592C11.9296 12.9882 12.2824 12.8362 12.5421 12.5722C12.8019 12.3081 12.948 11.9528 12.9491 11.5824V1.43622C12.9541 1.06179 12.8107 0.70061 12.5503 0.431525C12.2899 0.162441 11.9336 0.00730934 11.5592 0ZM5.07308 0.92659H7.85285V4.63295H5.07308V0.92659ZM12.0225 11.5824C12.0225 11.7052 11.9737 11.8231 11.8868 11.91C11.7999 11.9969 11.6821 12.0457 11.5592 12.0457H1.41305C1.34843 12.0522 1.28317 12.045 1.22149 12.0246C1.15982 12.0043 1.10312 11.9712 1.05507 11.9275C1.00701 11.8838 0.968677 11.8305 0.942553 11.7711C0.916428 11.7116 0.903098 11.6473 0.903424 11.5824V1.43622C0.900096 1.37146 0.910404 1.30671 0.933674 1.24619C0.956943 1.18566 0.992658 1.13069 1.03851 1.08484C1.08436 1.03898 1.13933 1.00327 1.19985 0.979999C1.26038 0.956729 1.32512 0.946428 1.38989 0.949756H4.14649V4.77657C4.14649 4.99037 4.23142 5.19541 4.3826 5.34659C4.53378 5.49777 4.73882 5.58271 4.95262 5.58271H7.9733C8.1871 5.58271 8.39215 5.49777 8.54333 5.34659C8.69451 5.19541 8.77944 4.99037 8.77944 4.77657V0.92659H11.5592C11.624 0.923262 11.6887 0.93357 11.7492 0.95684C11.8098 0.980109 11.8647 1.01582 11.9106 1.06168C11.9564 1.10753 11.9922 1.16249 12.0154 1.22302C12.0387 1.28355 12.049 1.34829 12.0457 1.41305L12.0225 11.5824Z"
                                                                fill="#5EA5DF" />
                                                            <path
                                                                d="M10.6313 8.33984H8.31486C8.19198 8.33984 8.07414 8.38865 7.98726 8.47554C7.90037 8.56242 7.85156 8.68027 7.85156 8.80314C7.85156 8.92601 7.90037 9.04385 7.98726 9.13074C8.07414 9.21762 8.19198 9.26643 8.31486 9.26643H10.6313C10.7542 9.26643 10.872 9.21762 10.9589 9.13074C11.0458 9.04385 11.0946 8.92601 11.0946 8.80314C11.0946 8.68027 11.0458 8.56242 10.9589 8.47554C10.872 8.38865 10.7542 8.33984 10.6313 8.33984Z"
                                                                fill="#5EA5DF" />
                                                            <path
                                                                d="M10.6306 10.1914H6.92423C6.80136 10.1914 6.68352 10.2402 6.59663 10.3271C6.50975 10.414 6.46094 10.5318 6.46094 10.6547C6.46094 10.7776 6.50975 10.8954 6.59663 10.9823C6.68352 11.0692 6.80136 11.118 6.92423 11.118H10.6306C10.7535 11.118 10.8713 11.0692 10.9582 10.9823C11.0451 10.8954 11.0939 10.7776 11.0939 10.6547C11.0939 10.5318 11.0451 10.414 10.9582 10.3271C10.8713 10.2402 10.7535 10.1914 10.6306 10.1914Z"
                                                                fill="#5EA5DF" />
                                                            <path
                                                                d="M3.54964 8.01095C3.50558 7.96877 3.45362 7.93571 3.39675 7.91366C3.28396 7.86732 3.15744 7.86732 3.04464 7.91366C2.98777 7.93571 2.93581 7.96877 2.89175 8.01095L1.96516 8.93754C1.92174 8.98061 1.88728 9.03185 1.86375 9.0883C1.84023 9.14476 1.82812 9.20532 1.82812 9.26648C1.82812 9.32764 1.84023 9.3882 1.86375 9.44466C1.88728 9.50111 1.92174 9.55235 1.96516 9.59542C2.00823 9.63885 2.05947 9.67331 2.11593 9.69683C2.17239 9.72035 2.23295 9.73246 2.29411 9.73246C2.35527 9.73246 2.41582 9.72035 2.47228 9.69683C2.52874 9.67331 2.57998 9.63885 2.62305 9.59542L2.7574 9.45643V10.6564C2.7574 10.7792 2.80621 10.8971 2.8931 10.984C2.97998 11.0708 3.09782 11.1197 3.2207 11.1197C3.34357 11.1197 3.46141 11.0708 3.5483 10.984C3.63518 10.8971 3.68399 10.7792 3.68399 10.6564V9.45643L3.81834 9.59542C3.86163 9.63836 3.91298 9.67233 3.96942 9.69538C4.02587 9.71844 4.08631 9.73013 4.14729 9.72978C4.20826 9.73013 4.2687 9.71844 4.32515 9.69538C4.3816 9.67233 4.43294 9.63836 4.47623 9.59542C4.51965 9.55235 4.55412 9.50111 4.57764 9.44466C4.60116 9.3882 4.61327 9.32764 4.61327 9.26648C4.61327 9.20532 4.60116 9.14476 4.57764 9.0883C4.55412 9.03185 4.51965 8.98061 4.47623 8.93754L3.54964 8.01095Z"
                                                                fill="#5EA5DF" />
                                                        </svg>{{ $lat->default_variant_name }}</p>
                                                </div>
                                                <h5><a href="{{ url($slug.'/product/'.$lat->slug) }}"><b>{{ $lat->name }}</b>
                                                    </a>
                                                </h5>
                                            </div>

                                            <div class="product-content-bottom">
                                                @if ($lat->variant_product == 0)
                                                    <div class="price">
                                                    {!! \App\Models\Product::getProductPrice($lat, $store, $currentTheme) !!}
                                                    </div>
                                                @else
                                                    <div class="price">
                                                        <ins>{{ __('In Variant') }}</ins>
                                                    </div>
                                                @endif
                                                <div class="product-action-btn d-flex align-items-center justify-content-between">
                                                    <a href="javascript:void(0)"
                                                        class="btn-secondary  addtocart-btn-cart addcart-btn-globaly"
                                                        product_id="{{ $lat->id }}"
                                                        variant_id="0"
                                                        qty="1"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="10" viewBox="0 0 16 10"
                                                            fill="none">
                                                            <path
                                                                d="M15.9364 2.84781L14.6014 0.344242C14.5459 0.241023 14.4611 0.154221 14.3562 0.0934596C14.2514 0.0326985 14.1306 0.000350315 14.0073 0H1.99235C1.86909 0.000350315 1.74834 0.0326985 1.64348 0.0934596C1.53862 0.154221 1.45375 0.241023 1.39828 0.344242L0.0632809 2.84781C0.0216041 2.93104 0 3.02186 0 3.11381C0 3.20576 0.0216041 3.29658 0.0632809 3.37981C0.103334 3.46476 0.163045 3.54028 0.23809 3.60091C0.313135 3.66153 0.401627 3.70573 0.497151 3.73031L1.34488 3.96189V7.6609C1.34877 7.93557 1.44889 8.20141 1.62983 8.41745C1.81077 8.63348 2.06247 8.78771 2.34613 8.85636L7.19217 9.99548C7.24538 10.0015 7.29917 10.0015 7.35237 9.99548H7.48587L13.6335 8.84384C13.9268 8.78184 14.1892 8.62883 14.3782 8.4096C14.5672 8.19037 14.6717 7.91774 14.6748 7.63587V3.88052L15.4892 3.71153C15.5877 3.69014 15.6798 3.64804 15.7584 3.58841C15.837 3.52878 15.9002 3.45316 15.9431 3.36729C15.9817 3.2853 16.0011 3.19649 16 3.10687C15.9988 3.01724 15.9771 2.9289 15.9364 2.84781ZM13.5935 1.25178L14.3611 2.69133L9.68862 3.66146L8.40035 1.25178H13.5935ZM2.4062 1.25178H6.251L4.98275 3.63642L1.64525 2.73514L2.4062 1.25178ZM2.65985 4.31865L5.14962 4.98209C5.20931 4.9912 5.27017 4.9912 5.32985 4.98209C5.45312 4.98174 5.57387 4.94939 5.67873 4.88863C5.78358 4.82787 5.86846 4.74107 5.92392 4.63785L6.66485 3.25463V8.56219L2.65985 7.63587V4.31865ZM13.3398 7.62335L7.99985 8.62477V3.27967L8.74077 4.66288C8.79624 4.7661 8.88111 4.85291 8.98597 4.91367C9.09083 4.97443 9.21158 5.00678 9.33485 5.00713H9.4817L13.3398 4.19973V7.62335Z"
                                                                fill="white"></path>
                                                        </svg>{{$section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                                                    </a>
                                                    
                                                    <a href="javascript:void(0)" class="wish-btn  wishbtn-globaly"
                                                        product_id="{{ $lat->id }}"
                                                        in_wishlist="{{ $lat->in_whishlist ? 'remove' : 'add' }}">
                                                        <span class="">
                                                            <i class="{{ $lat->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}"
                                                                style="color: white"></i>
                                                        </span>
                                                    </a>
                                                    {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $lat) !!}
                                                    {!! \App\Models\Product::actionLinks($currentTheme, $slug, $lat) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 col-md-6 col-12">
                        <div class="newproduct-right">

                            <div class="offer-announcement second-style">
                                <span class="new-labl">{!! __('Special Offer') ?? '' !!}</span>
                                <p><b>{!! __('Get 1 storage for 30 days free. More') ?? '' !!}
                                   </b></p>
                            </div>
                            <div class="section-title">
                                <h2>{!! __('Choose package and send for whomever you want') ?? '' !!}</h2>
                            </div>
                            <p>{!! __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.') !!}
</p>
                            <a href="{{ route('page.product-list',$slug) }}" class="btn"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="10" viewBox="0 0 16 10"
                                    fill="none">
                                    <path
                                        d="M15.9364 2.84781L14.6014 0.344242C14.5459 0.241023 14.4611 0.154221 14.3562 0.0934596C14.2514 0.0326985 14.1306 0.000350315 14.0073 0H1.99235C1.86909 0.000350315 1.74834 0.0326985 1.64348 0.0934596C1.53862 0.154221 1.45375 0.241023 1.39828 0.344242L0.0632809 2.84781C0.0216041 2.93104 0 3.02186 0 3.11381C0 3.20576 0.0216041 3.29658 0.0632809 3.37981C0.103334 3.46476 0.163045 3.54028 0.23809 3.60091C0.313135 3.66153 0.401627 3.70573 0.497151 3.73031L1.34488 3.96189V7.6609C1.34877 7.93557 1.44889 8.20141 1.62983 8.41745C1.81077 8.63348 2.06247 8.78771 2.34613 8.85636L7.19217 9.99548C7.24538 10.0015 7.29917 10.0015 7.35237 9.99548H7.48587L13.6335 8.84384C13.9268 8.78184 14.1892 8.62883 14.3782 8.4096C14.5672 8.19037 14.6717 7.91774 14.6748 7.63587V3.88052L15.4892 3.71153C15.5877 3.69014 15.6798 3.64804 15.7584 3.58841C15.837 3.52878 15.9002 3.45316 15.9431 3.36729C15.9817 3.2853 16.0011 3.19649 16 3.10687C15.9988 3.01724 15.9771 2.9289 15.9364 2.84781ZM13.5935 1.25178L14.3611 2.69133L9.68862 3.66146L8.40035 1.25178H13.5935ZM2.4062 1.25178H6.251L4.98275 3.63642L1.64525 2.73514L2.4062 1.25178ZM2.65985 4.31865L5.14962 4.98209C5.20931 4.9912 5.27017 4.9912 5.32985 4.98209C5.45312 4.98174 5.57387 4.94939 5.67873 4.88863C5.78358 4.82787 5.86846 4.74107 5.92392 4.63785L6.66485 3.25463V8.56219L2.65985 7.63587V4.31865ZM13.3398 7.62335L7.99985 8.62477V3.27967L8.74077 4.66288C8.79624 4.7661 8.88111 4.85291 8.98597 4.91367C9.09083 4.97443 9.21158 5.00678 9.33485 5.00713H9.4817L13.3398 4.19973V7.62335Z"
                                        fill="white"></path>
                                </svg>{!! __('Get your storage') !!}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>




{{-- tab section.  --}}
        @include('front_end.theme_common_table')  

        @include('front_end.hooks.product_detail_slider')

@include('front_end.sections.homepage.best_product_section')
@include('front_end.sections.partision.footer_section')
@endsection

@push('page-script')
@endpush
