@extends('front_end.layouts.app')
@section('page-title')
    {{ __('Products') }}
@endsection

@section('content')
    @include('front_end.sections.partision.header_section')
    <section class="product-page-first-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12 pdp-left-column">
                    <div class="pdp-left-inner-sliders">
                        <div class="main-slider-wrp">
                            <div class="pdp-main-slider lightbox">
                                @foreach ($product->Sub_image($product->id)['data'] as $item)
                                    <div class="pdp-main-slider-itm">
                                        <div class="pdp-main-img">
                                            <img src="{{ get_file($item->image_path ?? '', $currentTheme) }}">

                                            @foreach ($latestSales as $productId => $saleData)
                                                <div class="custom-output sale-tag-product">
                                                    <div class="sale_tag_icon rounded col-1 onsale">
                                                        <div>{{ __('Sale!') }}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <a href="{{ get_file($item->image_path, $currentTheme) }}" data-caption="Caption 1"
                                                class="open-lightbox">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                    viewBox="0 0 25 25" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M0 9.375C0 14.5527 4.19733 18.75 9.375 18.75C11.5395 18.75 13.5328 18.0164 15.1196 16.7843C15.1794 16.9108 15.2615 17.0293 15.3661 17.1339L22.8661 24.6339C23.3543 25.122 24.1457 25.122 24.6339 24.6339C25.122 24.1457 25.122 23.3543 24.6339 22.8661L17.1339 15.3661C17.0293 15.2615 16.9108 15.1794 16.7844 15.1196C18.0164 13.5328 18.75 11.5395 18.75 9.375C18.75 4.19733 14.5527 0 9.375 0C4.19733 0 0 4.19733 0 9.375ZM2.5 9.375C2.5 5.57804 5.57804 2.5 9.375 2.5C13.172 2.5 16.25 5.57804 16.25 9.375C16.25 13.172 13.172 16.25 9.375 16.25C5.57804 16.25 2.5 13.172 2.5 9.375Z"
                                                        fill="white" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="pdp-thumb-slider common-arrows">
                            @foreach ($product->Sub_image($product->id)['data'] as $item)
                                <div class="pdp-thumb-slider-itm">
                                    <div class="pdp-thumb-img">
                                        <img src="{{ get_file($item->image_path ?? '', $currentTheme) }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 pdp-right-column">
                    <div class="pdp-right-column-inner">
                        <div class="pdp-top-content">
                        <a href="{{ route('page.product-list',$slug) }}" class="back-btn">
                            <span class="svg-ic">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="5" viewBox="0 0 11 5"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10.5791 2.28954C10.5791 2.53299 10.3818 2.73035 10.1383 2.73035L1.52698 2.73048L2.5628 3.73673C2.73742 3.90636 2.74146 4.18544 2.57183 4.36005C2.40219 4.53467 2.12312 4.53871 1.9485 4.36908L0.133482 2.60587C0.0480403 2.52287 -0.000171489 2.40882 -0.000171488 2.2897C-0.000171486 2.17058 0.0480403 2.05653 0.133482 1.97353L1.9485 0.210321C2.12312 0.0406877 2.40219 0.044729 2.57183 0.219347C2.74146 0.393966 2.73742 0.673036 2.5628 0.842669L1.52702 1.84888L10.1383 1.84875C10.3817 1.84874 10.5791 2.04609 10.5791 2.28954Z"
                                        fill="white" />
                                </svg>
                            </span>
                            {{ $page_json->product_page->section->button->text ?? __('Back to category') }}
                        </a>
                            <div class="wishlist">
                                <a href="javascript:void(0)" class="wishbtn wishbtn-globaly" product_id="{{$product->id}}" in_wishlist="{{ $product->in_whishlist ? 'remove' : 'add'}}">
                                    <span class="wish-ic">
                                        <i class="{{ $product->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}"></i>
                                    </span>
                                </a>

                            </div>


                        <ul class="social-sharing">
                            <li><span> {{ __('Share') }} :</span></li>
                            @for ($i = 0; $i < $section->footer->section->footer_link->loop_number ?? 1; $i++)
                                <li>
                                <a href="{{ $section->footer->section->footer_link->social_link->{$i} ?? '#'}}" target="_blank" class="share-facebook">
                                                <img src="{{ get_file($section->footer->section->footer_link->social_icon->{$i}->image ?? 'themes/' . $currentTheme . '/assets/images/youtube.svg', $currentTheme) }}"
                                            class="{{ 'social_icon_'. $i .'_preview' }} svg pimage" alt="" >

                                            </a>


                                </li>
                            @endfor
                        </ul>
                        <div class="product-description">
                            <div class="section-title">
                                <h2>{{$product->name}}</h2>
                            </div>
                            <p class="product-variant-description">{!! $product->description ?? '' !!}</p>

                            @include('front_end.common.product.sale_counter')
                            @include('front_end.common.product.custom_filed')
                            <div class="pro-content-bottom">
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
                            @if ($product->track_stock == 0 && $product->stock_status == 'out_of_stock')
                            @else
                                <form class="variant_form w-100">
                                    <div class="prorow-lbl">
                                        <div class="prorow-lbl-qntty">
                                            <div class="product-labl d-block">{{ __('quantity') }}</div>
                                            <div class="qty-spinner">
                                                <button type="button" data-product="{{ $product->id }}" class="quantity-decrement change_price" data-product="{{ $product->id}}">
                                                    <svg width="12" height="2" viewBox="0 0 12 2" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0 0.251343V1.74871H12V0.251343H0Z" fill="#61AFB3"></path>
                                                    </svg>
                                                </button>
                                                <input type="text" class="quantity" data-cke-saved-name="quantity"
                                                    name="qty" value="01" min="01" max="100">

                                                <button type="button" data-product="{{ $product->id }}"  class="quantity-increment change_price" data-product="{{ $product->id}}">
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
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
                        <div class="stock_status"></div>
                    </div>
                </div>
                <div class="pdp-bottom-content">
                        <div class="product-detail-bttom-stuff">
                            <div class="price product-price-amount price-value">
                            {!! \App\Models\Product::getProductPrice($product, $store, $currentTheme) !!}

                            </div>

                            <div class="product-hook">
                                @if ($product->track_stock == 0 && $product->stock_status == 'out_of_stock')
                                @else
                                    <button class="btna addcart-btn addcart-btn-globaly price-wise-btn product_var_option" product_id="{{ $product->id }}" variant_id="{{ $product->default_variant_id }}" qty="1">
                                    {{ $section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                                        <svg viewBox="0 0 10 5">
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
                </div>
            </div>
        </div>
    </section>

    {{-- tab section.  --}}
    @include('front_end.theme_common_table')
    @include('front_end.hooks.product_detail_slider')

    @include('front_end.sections.homepage.best_product_second')
    @if($random_review->isNotEmpty())
        <section class="testimonial-section padding-top">
            <div class="container">
                <div class="section-title">
                    <h2>{{ __('Testimonials') }}</h2>
                </div>
                <div class="testimonial-slider flex-slider">
                    @foreach ($random_review as $review)
                        <div class="testimonial-itm card">
                            <div class="review-itm-inner card-inner">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="25" viewBox="0 0 22 25" fill="none">
                                    <path d="M3.80435 12.3188C4.45654 14.0814 5.84618 15.471 7.6087 16.1232C5.84618 16.7754 4.45654 18.165 3.80435 19.9275C3.15216 18.165 1.76252 16.7754 0 16.1232C1.76252 15.471 3.15216 14.0814 3.80435 12.3188Z" fill="#183A40"/>
                                    <path d="M14.3113 0C15.5225 3.27325 18.1033 5.85401 21.3765 7.06522C18.1033 8.27643 15.5225 10.8572 14.3113 14.1304C13.1001 10.8572 10.5193 8.27643 7.24609 7.06522C10.5193 5.85401 13.1001 3.27325 14.3113 0Z" fill="#183A40"/>
                                    <path d="M9.51396 20.8332C10.7728 20.1426 11.8091 19.1063 12.4997 17.8475C13.1902 19.1063 14.2266 20.1426 15.4854 20.8332C14.2266 21.5237 13.1902 22.5601 12.4997 23.8189C11.8091 22.5601 10.7728 21.5237 9.51396 20.8332Z" stroke="#183A40" stroke-width="0.983051"/>
                                </svg>
                                <p>{{$review->description}}</p>
                                <div class="review-botton d-flex align-items-center">
                                    <div class="about-user d-flex align-items-center">
                                        <div class="abt-user-img">
                                            <img src="{{asset('themes/'.$currentTheme.'/assets/images/john.png')}}">
                                        </div>
                                        <h6><span>{{ $blog->store->user->name ?? 'John Doe' }},</span>
                                            {{ __('company.com') }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @include('front_end.sections.homepage.bestseller_slider_section')
    @include('front_end.sections.partision.footer_section')
@endsection

@push('page-script')


@endpush
