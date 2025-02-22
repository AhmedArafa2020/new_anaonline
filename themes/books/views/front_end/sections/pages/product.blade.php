@extends('front_end.layouts.app')
@section('page-title')
    {{ __('Products') }}
@endsection

<style>
    .product-hook .quick-checkout-button {
        margin: 0;
        width: auto !important;
    }
</style>

@section('content')
    @include('front_end.sections.partision.header_section')

    <section class="pro-home-section padding-bottom padding-top">
        <div class=" container">
                <div class="row">
                    <div class="col-lg-5 col-12 left-col">
                        <div class="left-side-wrapper dark-p">
                            <a href="{{ route('page.product-list',$slug) }}" class="back-btn">
                                <span class="svg-ic">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="5" viewBox="0 0 11 5" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5791 2.28954C10.5791 2.53299 10.3818 2.73035 10.1383 2.73035L1.52698 2.73048L2.5628 3.73673C2.73742 3.90636 2.74146 4.18544 2.57183 4.36005C2.40219 4.53467 2.12312 4.53871 1.9485 4.36908L0.133482 2.60587C0.0480403 2.52287 -0.000171489 2.40882 -0.000171488 2.2897C-0.000171486 2.17058 0.0480403 2.05653 0.133482 1.97353L1.9485 0.210321C2.12312 0.0406877 2.40219 0.044729 2.57183 0.219347C2.74146 0.393966 2.73742 0.673036 2.5628 0.842669L1.52702 1.84888L10.1383 1.84875C10.3817 1.84874 10.5791 2.04609 10.5791 2.28954Z" fill="white"></path>
                                    </svg>
                                </span>
                                {!! $page_json->product_page->section->button->text ?? __('Back to category') !!}
                            </a>
                            <div class="left-slide-content">
                                {{--<span class="badge">{{ $product->tag_api }}</span>--}}
                                <h3>{{ $product->name }}</h3>
                                <span>{{ $product->category_name }}</span>
                                <p class="product-variant-description">
                                    {!! $product->description !!}
                                </p>
                                <div class="price product-price-amount">
                                    <ins>
                                        <ins class="min_max_price" style="display: inline;">
                                            {{ $currency_icon }}{{ $mi_price }} -
                                            {{ $currency_icon }}{{ $ma_price }} </ins>
                                    </ins>
                                </div>

                                <div class="pdp-content-bottom">
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
                                    <div class="bottom-content">
                                        @if ($product->variant_id != 0)
                                            <b> {!! \App\Models\ProductVariant::variantlist($product->attribute_id) !!} </b>
                                        @endif
                                        <div class="stock_status"></div>
                                        @if ($product->track_stock == 0 && $product->stock_status == 'out_of_stock')
                                        @else
                                            <form class="variant_form ">
                                            @include('front_end.common.product.variant')

                                                <div class="size-variant-swatch d-flex">
                                                    <div class="color-lbl d-block">{{__('quantity :')}}</div>
                                                    <div class="qty-spinner">
                                                        <button type="button" class="quantity-decrement change_price" data-product="{{ $product->id}}">
                                                            <svg width="12" height="2" viewBox="0 0 12 2" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0 0.251343V1.74871H12V0.251343H0Z" fill="#61AFB3"></path>
                                                            </svg>
                                                        </button>
                                                        <input type="text" class="quantity" data-cke-saved-name="quantity"
                                                            name="qty" value="01" min="01" max="100">
                                                        <button type="button" class="quantity-increment change_price" data-product="{{ $product->id}}">
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
                                        <div class="price product-price-amount price-value" style="margin-top: 10px;">
                                        {!! \App\Models\Product::getProductPrice($product, $store, $currentTheme) !!}
                                        </div>
                                        <div class="price-btn">
                                            <div class="product-hook d-flex align-items-center">
                                                @if ($product->track_stock == 0 && $product->stock_status == 'out_of_stock')
                                                @else
                                                    <a href="javascript:void(0)" class="btn addcart-btn checkout-btn addcart-btn-globaly" product_id="{{ $product->id }}" variant_id="{{ $product->default_variant_id }}" qty="1">
                                                        {{$section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16"
                                                            fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M11.1258 5.12599H2.87416C2.04526 5.12599 1.38823 5.82536 1.43994 6.65265L1.79919 12.4008C1.84653 13.1581 2.47458 13.7481 3.23342 13.7481H10.7666C11.5254 13.7481 12.1535 13.1581 12.2008 12.4008L12.5601 6.65265C12.6118 5.82536 11.9547 5.12599 11.1258 5.12599ZM2.87416 3.68896C1.21635 3.68896 -0.0977 5.08771 0.00571155 6.74229L0.364968 12.4904C0.459638 14.0051 1.71574 15.1852 3.23342 15.1852H10.7666C12.2843 15.1852 13.5404 14.0051 13.635 12.4904L13.9943 6.74229C14.0977 5.08771 12.7836 3.68896 11.1258 3.68896H2.87416Z"
                                                                fill="#F2DFCE" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M3.40723 4.4075C3.40723 2.42339 5.01567 0.814941 6.99979 0.814941C8.9839 0.814941 10.5923 2.42339 10.5923 4.4075V5.84453C10.5923 6.24135 10.2707 6.56304 9.87384 6.56304C9.47701 6.56304 9.15532 6.24135 9.15532 5.84453V4.4075C9.15532 3.21703 8.19026 2.25197 6.99979 2.25197C5.80932 2.25197 4.84425 3.21703 4.84425 4.4075V5.84453C4.84425 6.24135 4.52256 6.56304 4.12574 6.56304C3.72892 6.56304 3.40723 6.24135 3.40723 5.84453V4.4075Z"
                                                                fill="#F2DFCE" />
                                                        </svg>
                                                    </a>
                                                    {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $product) !!}
                                                @endif
                                                @include('front_end.hooks.product_detail_info_button')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 slider-col">
                        <div class="product-main-div">
                            <div class="slider-wrapper">
                                <div class="product-main-slider">
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
                                <div class="product-thumb-slider">
                                    @foreach ($product->Sub_image($product->id)['data'] as $item)
                                        <div class="product-thumb-item">
                                            <div class="thumb-img">
                                                <img src="{{ get_file($item->image_path, $currentTheme) }}" alt="product">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-12 right-col">
                        @foreach ($all_products->take(2) as $pro)

                            <div class="category-card-inner">
                                <div class="category-card-image">
                                    <a href="{{url($slug.'/product/'.$pro->slug) }}" tabindex="0">
                                        <img src="{{ get_file($pro->cover_image_path, $currentTheme) }}" alt="">
                                    </a>
                                </div>
                                <div class="category-card-content">
                                    <div class="category-cont-top">

                                        <div class="prouct-card-heading">
                                            <h6>
                                                <a href="{{ url($slug.'/product/'.$pro->slug) }}" tabindex="0">{{ $pro->name }}</a>
                                            </h6>
                                            <p>{{ $pro->ProductData->name }}</p>
                                        </div>
                                    </div>
                                    <div class="category-cont-bottom">
                                        <div class="price-btn">
                                            @if ($pro->variant_product == 0)
                                                <div class="price">
                                                {!! \App\Models\Product::getProductPrice($pro, $store, $currentTheme) !!}
                                                </div>
                                            @else
                                                <div class="price">
                                                    <ins>{{ __('In Variant') }}</ins>
                                                </div>
                                            @endif
                                            <a href="javascript:void(0)" class="link-btn addcart-btn-globaly" product_id="{{ $pro->id }}" variant_id="0" qty="1">
                                                {{$section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16"
                                                    fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M11.1258 5.12599H2.87416C2.04526 5.12599 1.38823 5.82536 1.43994 6.65265L1.79919 12.4008C1.84653 13.1581 2.47458 13.7481 3.23342 13.7481H10.7666C11.5254 13.7481 12.1535 13.1581 12.2008 12.4008L12.5601 6.65265C12.6118 5.82536 11.9547 5.12599 11.1258 5.12599ZM2.87416 3.68896C1.21635 3.68896 -0.0977 5.08771 0.00571155 6.74229L0.364968 12.4904C0.459638 14.0051 1.71574 15.1852 3.23342 15.1852H10.7666C12.2843 15.1852 13.5404 14.0051 13.635 12.4904L13.9943 6.74229C14.0977 5.08771 12.7836 3.68896 11.1258 3.68896H2.87416Z"
                                                        fill="#F2DFCE" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M3.40723 4.4075C3.40723 2.42339 5.01567 0.814941 6.99979 0.814941C8.9839 0.814941 10.5923 2.42339 10.5923 4.4075V5.84453C10.5923 6.24135 10.2707 6.56304 9.87384 6.56304C9.47701 6.56304 9.15532 6.24135 9.15532 5.84453V4.4075C9.15532 3.21703 8.19026 2.25197 6.99979 2.25197C5.80932 2.25197 4.84425 3.21703 4.84425 4.4075V5.84453C4.84425 6.24135 4.52256 6.56304 4.12574 6.56304C3.72892 6.56304 3.40723 6.24135 3.40723 5.84453V4.4075Z"
                                                        fill="#F2DFCE" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
        </div>
    </section>
    <section class="paroduct-page testimonials-section padding-bottom">
        <div class="container">
            <div class="testimonial-slider">
                @foreach ($random_review as $review)
                    <div class="testimonial-itm">
                        <div class="testimonial-itm-inner">
                            <div class="testimonial-itm-image">
                                <a href="#" tabindex="0">
                                    <img src="{{ get_file($review->ProductData->cover_image_path, $currentTheme) }}" class="default-img" alt="review">
                                </a>
                            </div>
                            <div class="testimonial-itm-content">
                                <span>{{!empty($review->UserData) ? $review->UserData->first_name : '' }}</span>
                                <div class="testimonial-content-top">
                                    <h3 class="testimonial-title">
                                        {{ $review->title }}
                                    </h3>
                                </div>
                                <p>{{ $review->description }}</p>
                                <div class="testimonial-star">
                                    <div class="d-flex align-items-center">
                                        @for ($i = 0; $i < 5; $i++)
                                            <i class="ti ti-star {{ $i < $review->rating_no ? 'text-warning' : '' }} "></i>
                                        @endfor
                                        <span><b>{{ $review->rating_no }}/</b> 5.0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- tab section . --}}
    @include('front_end.theme_common_table')
    @include('front_end.hooks.product_detail_slider')
    @include('front_end.sections.homepage.blog_section')
    @include('front_end.sections.partision.footer_section')
@endsection