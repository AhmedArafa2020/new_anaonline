<div class="main-top">
    <img src=" {{ asset('themes/' . $currentTheme . '/assets/images/design-img-chocolate2.png') }}"
        class="design-img-chocolate2" alt="design-img-chocolate2">
    <section class="home-section padding-top padding-bottom"
        style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
        data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}"
        data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}"
        data-section="{{ $option->section_name ?? '' }}" data-store="{{ $option->store_id ?? '' }}"
        data-theme="{{ $option->theme_id ?? '' }}">
        <div class="custome_tool_bar"></div>
        <img src="{{ get_file($section->slider->section->background_image->image ?? 'themes/'.$currentTheme.'/assets/img/banner-sec-7.png', $currentTheme) }}"
            id="{{ $section->slider->section->background_image->slug ?? '' }}_preview" alt="chocolate"
            class="banner-bg-img">
        <div class=" container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="home-main-left-side">
                        <div class="home-left-side dark-p">
                            <div class="section-title">
                                <span class="sub-title"
                                    id="{{ $section->slider->section->sub_title->slug ?? ''}}_preview">
                                    {!! $section->slider->section->sub_title->text ?? ''!!}</span>
                                <h2 id="{{ $section->slider->section->title->slug ?? ''}}_preview">
                                    {!! $section->slider->section->title->text ?? ''!!}</h2>
                            </div>
                            <p id="{{ $section->slider->section->description->slug ?? ''}}_preview">
                                {!! $section->slider->section->description->text ?? ''!!}</p>
                            <div class="btn-wrapper">
                                <a href="{{ route('page.product-list', $slug) }}" class="btn"
                                    id="{{ $section->slider->section->button->slug ?? '' }}_preview"> {!!
                                    $section->slider->section->button->text ?? '' !!}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16"
                                        fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.1258 5.12596H2.87416C2.04526 5.12596 1.38823 5.82533 1.43994 6.65262L1.79919 12.4007C1.84653 13.1581 2.47458 13.7481 3.23342 13.7481H10.7666C11.5254 13.7481 12.1535 13.1581 12.2008 12.4007L12.5601 6.65262C12.6118 5.82533 11.9547 5.12596 11.1258 5.12596ZM2.87416 3.68893C1.21635 3.68893 -0.0977 5.08768 0.00571155 6.74226L0.364968 12.4904C0.459638 14.0051 1.71574 15.1851 3.23342 15.1851H10.7666C12.2843 15.1851 13.5404 14.0051 13.635 12.4904L13.9943 6.74226C14.0977 5.08768 12.7837 3.68893 11.1258 3.68893H2.87416Z"
                                            fill="white"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3.40723 4.40744C3.40723 2.42332 5.01567 0.81488 6.99979 0.81488C8.9839 0.81488 10.5923 2.42332 10.5923 4.40744V5.84447C10.5923 6.24129 10.2707 6.56298 9.87384 6.56298C9.47701 6.56298 9.15532 6.24129 9.15532 5.84447V4.40744C9.15532 3.21697 8.19026 2.2519 6.99979 2.2519C5.80932 2.2519 4.84425 3.21697 4.84425 4.40744V5.84447C4.84425 6.24129 4.52256 6.56298 4.12574 6.56298C3.72892 6.56298 3.40723 6.24129 3.40723 5.84447V4.40744Z"
                                            fill="white"></path>
                                    </svg>
                                </a>
                                <a href="javascript:void(0)" class="play-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.2" viewBox="0 0 45 44" width="45"
                                        height="44">
                                        <path fill-rule="evenodd" class="a"
                                            d="m26.9 19.9c1.5 1 1.5 3.2 0 4.2l-6.1 4.1c-1.6 1.1-3.9-0.1-3.9-2.1v-8.2c0-2 2.3-3.2 3.9-2.1zm-0.7 1.1l-6.1-4.1c-0.8-0.6-1.9 0-1.9 1v8.2c0 1 1.1 1.6 1.9 1l6.1-4c0.8-0.5 0.8-1.6 0-2.1z" />
                                        <rect class="b" x=".5" y=".5" width="44" height="43" rx="21.5" />
                                    </svg>
                                    <span id="{{ $section->slider->section->button_second->slug ?? ''}}_preview">{!!
                                                $section->slider->section->button_second->text ?? __('Play Video') !!}</span>
                                </a>
                            </div>

                        </div>
                        <div class="service-tag">
                            <div class="service-box d-flex align-items-center">
                                <img src="{{ get_file($section->slider->section->service_image->image ?? '', $currentTheme) }}" class=" {{ ($section->slider->section->service_image->slug ?? '').'_preview'}}"
                                        alt="icon">
                                <div class="service-text">
                                    <p id="{{ ($section->slider->section->service_title->slug ?? '') }}_preview">{!! ($section->slider->section->service_title->text ?? '') !!}</p>
                                </div>
                            </div>
                            <div class="service-box d-flex align-items-center">
                                <img src="{{ get_file($section->slider->section->service_second_image->image ?? '', $currentTheme) }}" class=" {{ ($section->slider->section->service_second_image->slug ?? '').'_preview'}}"
                                        alt="icon">
                                <div class="service-text">
                                    <p id="{{ ($section->slider->section->service_second_title->slug ?? '') }}_preview">{!! ($section->slider->section->service_second_title->text ?? '') !!}</p>
                                </div>
                            </div>
                            <div class="service-box d-flex align-items-center">
                                <img src="{{ get_file($section->slider->section->service_third_image->image ?? '', $currentTheme) }}" class=" {{ ($section->slider->section->service_third_image->slug ?? '').'_preview'}}"
                                        alt="icon">
                                <div class="service-text">
                                    <p id="{{ ($section->slider->section->service_third_title->slug ?? '') }}_preview">{!! ($section->slider->section->service_third_title->text ?? '') !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="home-slider-main">
                        <div class="home-slider flex-slider">
                            @foreach($products->take(3) as $product)
                            <div class="product-card card">
                                <div class="product-card-inner card-inner">
                                    <div class="card-top">
                                        <div class="custom-output">
                                            {!! \App\Models\Product::productSalesPage($currentTheme, $slug,
                                            $product->id)
                                            !!}
                                        </div>
                                        <a href="javascript:void(0)" class="wishlist-btn wishbtn-globaly "
                                            product_id="{{ $product->id }}"
                                            in_wishlist="{{ $product->in_whishlist ? 'remove' : 'add' }}">
                                            <span class="wish-ic">
                                                <i
                                                    class="{{ $product->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}"></i>
                                            </span>
                                        </a>
                                        {!! \App\Models\Product::actionLinks($currentTheme, $slug, $product) !!}
                                    </div>
                                    <div class="product-card-image">
                                        <a href="{{url($slug.'/product/'.$product->slug)}}">
                                            <img src="{{get_file($product->cover_image_path, $currentTheme)}}" class="default-img">
                                        </a>
                                    </div>
                                    <div class="card-bottom">
                                        <div class="card-title">
                                            <h3>
                                                <a href="{{url($slug.'/product/'.$product->slug)}}">
                                                    {{$product->name}}
                                                </a>
                                            </h3>
                                        </div>
                                        {{!empty($product->ProductData) ? $product->ProductData->name : ''}}
                                        <p class="description">{{ strip_tags($product->description) }}</p>
                                        <div class="card-btn-wrapper">
                                            @if ($product->variant_product == 0)
                                            <div class="price">
                                            {!! \App\Models\Product::getProductPrice($product, $store, $currentTheme) !!}
                                            </div>
                                            @else
                                            <div class="price">
                                                {{ __('In Variant') }}
                                            </div>
                                            @endif
                                            <a href="javascript:void(0)"
                                                class="btn  addtocart-btn-cart addcart-btn-globaly"
                                                product_id="{{ $product->id }}" variant_id="0" qty="1">
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
{{-- @endif --}}

<!--video popup start-->
<div id="popup-box" class="overlay-popup">
    <div class="popup-inner">
        <div class="content">
            <a class=" close-popup" href="javascript:void(0)">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34" viewBox="0 0 35 34" fill="none">
                    <line x1="2.29695" y1="1.29289" x2="34.1168" y2="33.1127" stroke="white" stroke-width="2">
                    </line>
                    <line x1="0.882737" y1="33.1122" x2="32.7025" y2="1.29242" stroke="white" stroke-width="2">
                    </line>
                </svg>
            </a>
            <iframe width="560" height="315" src="@if($section->slider->section->video->type == 'text')
                            {{ $section->slider->section->video->text }}
                        @else
                            {{ get_file($section->slider->section->video->text, $currentTheme) }}
                        @endif" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
        </div>
    </div>
</div>
