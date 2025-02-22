<section class="home-banner-section"
    style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">
        <div class="banner-main-content">
            <div class="banner-left-side">
                <div class="banner-img-slider">

                    <div class="banner-img">
                        <img src="{{ get_file($section->slider->section->background_image->image ?? '', $currentTheme)}}"
                            id="{{ $section->slider->section->background_image->slug }}_preview" alt="banner image">
                    </div>
                </div>
                <div class="slides-numbers">
                    <span class="active">01</span> <span>/</span> <span
                        class="total">0{{ $section->slider->loop_number ?? 1 }}</span>
                </div>
                <div class="banner-slider">
                    @for ($i = 0; $i < $section->slider->loop_number ?? 1; $i++)
                        <div class="home-banner-content home-slider">
                            <div class="home-banner-content-inner">
                                <div class=" banner-content-inner">
                                    <div class="section-title">
                                        <h2 id="{{ ($section->slider->section->title->slug ?? '').'_'. $i }}_preview">
                                            {!! $section->slider->section->title->text->{$i} ?? '' !!}</h2>
                                    </div>
                                    <p id="{{ ($section->slider->section->description->slug ?? '').'_'. $i }}_preview">
                                        {!! ($section->slider->section->description->text->{$i} ?? '') !!}</p>
                                    <a href="{{route('page.product-list',$slug)}}" class="btn"
                                        id="{{ ($section->slider->section->button_first->slug ?? '').'_'. $i }}_preview">
                                        {{ ($section->slider->section->button_first->text->{$i} ?? __('Shop Now')) }} <svg
                                            xmlns="http://www.w3.org/2000/svg" width="12" height="11"
                                            viewBox="0 0 12 11" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.4605 6.00095C11.7371 5.72433 11.7371 5.27584 11.4605 4.99921L7.2105 0.749214C6.93388 0.472592 6.48539 0.472592 6.20877 0.749214C5.93215 1.02584 5.93215 1.47433 6.20877 1.75095L9.9579 5.50008L6.20877 9.24921C5.93215 9.52584 5.93215 9.97433 6.20877 10.2509C6.48539 10.5276 6.93388 10.5276 7.2105 10.2509L11.4605 6.00095ZM1.54384 10.2509L5.79384 6.00095C6.07046 5.72433 6.07046 5.27584 5.79384 4.99921L1.54384 0.749214C1.26721 0.472592 0.818723 0.472592 0.542102 0.749214C0.26548 1.02583 0.26548 1.47433 0.542102 1.75095L4.29123 5.50008L0.542101 9.24921C0.26548 9.52584 0.26548 9.97433 0.542101 10.2509C0.818722 10.5276 1.26721 10.5276 1.54384 10.2509Z"
                                                fill="white" />
                                        </svg>
                                    </a>
                                    <div class="tooltip icon-top">
                                        <a href="{{route('page.product-list',$slug)}}">
                                            <span class="icon-circle">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M8.55749 7.802C8.55749 8.21958 8.21897 8.5581 7.80139 8.5581L1.38569 8.5581C0.968109 8.5581 0.629592 8.21958 0.629592 7.802C0.629592 7.38442 0.968109 7.0459 1.38569 7.0459L7.04529 7.0459L7.04529 1.3863C7.04529 0.96872 7.38381 0.630204 7.80139 0.630204C8.21897 0.630203 8.55749 0.96872 8.55749 1.3863L8.55749 7.802Z"
                                                        fill="white"></path>
                                                    <path
                                                        d="M14.3276 7.15641L7.9119 7.15641C7.49432 7.15641 7.1558 7.49493 7.1558 7.91251L7.1558 14.3282C7.1558 14.7458 7.49432 15.0843 7.9119 15.0843C8.32948 15.0843 8.668 14.7458 8.668 14.3282L8.668 8.66861L14.3276 8.66861C14.7452 8.66861 15.0837 8.33009 15.0837 7.91251C15.0837 7.49493 14.7452 7.15641 14.3276 7.15641Z"
                                                        fill="white"></path>
                                                </svg>
                                            </span>
                                        </a>
                                        <span>{{ __('Stainless')}}<br>{{ __('Border') }}</span>
                                    </div>
                                    <div class="tooltip icon-right">
                                        <a href="{{route('page.product-list',$slug)}}">
                                            <span class="icon-circle">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M8.55749 7.802C8.55749 8.21958 8.21897 8.5581 7.80139 8.5581L1.38569 8.5581C0.968109 8.5581 0.629592 8.21958 0.629592 7.802C0.629592 7.38442 0.968109 7.0459 1.38569 7.0459L7.04529 7.0459L7.04529 1.3863C7.04529 0.96872 7.38381 0.630204 7.80139 0.630204C8.21897 0.630203 8.55749 0.96872 8.55749 1.3863L8.55749 7.802Z"
                                                        fill="white"></path>
                                                    <path
                                                        d="M14.3276 7.15641L7.9119 7.15641C7.49432 7.15641 7.1558 7.49493 7.1558 7.91251L7.1558 14.3282C7.1558 14.7458 7.49432 15.0843 7.9119 15.0843C8.32948 15.0843 8.668 14.7458 8.668 14.3282L8.668 8.66861L14.3276 8.66861C14.7452 8.66861 15.0837 8.33009 15.0837 7.91251C15.0837 7.49493 14.7452 7.15641 14.3276 7.15641Z"
                                                        fill="white"></path>
                                                </svg>
                                            </span>
                                        </a>
                                        <span>{{ __('Black solid')}}<br>{{ __('titanium') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
                </div>

            </div>

            <div class="banner-right-side">
                <div class="trending-products">
                    <div class="trending-slider flex-slider">
                        @foreach ($modern_products->take(3) as $m_product)
                        <div class="product-card card">
                            <div class="product-card-inner card-inner">
                                <div class="product-content-top ">
                                <div class="new-labl">
                                    {{!empty($m_product->ProductData()) ? $m_product->ProductData->name : ''}}
                                    </div>
                                    <h3 class="product-title">
                                        <a href="{{url($slug.'/product/'.$m_product->slug)}}">
                                            {{$m_product->name}}
                                        </a>
                                    </h3>
                                    <div class="custom-output">
                                        {!! \App\Models\Product::productSalesPage($currentTheme, $slug, $m_product->id) !!}
                                    </div>
                                    {!! \App\Models\Product::actionLinks($currentTheme, $slug, $m_product) !!}
                                    {{-- <div class="product-type">{{ $m_product->name }}
                                </div> --}}
                            </div>
                            <div class="product-card-image">
                                <a href="{{url($slug.'/product/'.$m_product->slug)}}" class="img-wrapper">
                                    <img src="{{ get_file($m_product->cover_image_path, $currentTheme)}}" class="default-img">
                                </a>
                            </div>
                            <div class="product-content-bottom">
                                @if ($m_product->variant_product == 0)
                                <div class="price">
                                {!! \App\Models\Product::getProductPrice($m_product, $store, $currentTheme) !!}
                                </div>
                                @else
                                <div class="price">
                                    <ins>{{ __('In Variant') }}</ins>
                                </div>
                                @endif
                                <button class="addtocart-btn btn addcart-btn-globaly" product_id="{{ $m_product->id }}"
                                    variant_id="0" qty="1">
                                    <span>{{$section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}</span>
                                    <span class="roun-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 9 9"
                                            fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.58455 4.76994C8.79734 4.55716 8.79734 4.21216 8.58455 3.99938L5.31532 0.730146C5.10253 0.51736 4.75754 0.51736 4.54476 0.730146C4.33197 0.942931 4.33197 1.28793 4.54476 1.50071L7.4287 4.38466L4.54476 7.26861C4.33197 7.48139 4.33197 7.82639 4.54476 8.03917C4.75754 8.25196 5.10253 8.25196 5.31532 8.03917L8.58455 4.76994ZM0.956346 8.03917L4.22558 4.76994C4.43836 4.55716 4.43836 4.21216 4.22558 3.99938L0.956346 0.730146C0.74356 0.51736 0.398567 0.51736 0.185781 0.730146C-0.0270049 0.942931 -0.0270049 1.28792 0.185781 1.50071L3.06973 4.38466L0.185781 7.26861C-0.0270052 7.48139 -0.0270052 7.82639 0.185781 8.03917C0.398566 8.25196 0.74356 8.25196 0.956346 8.03917Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                </button>
                                {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $m_product) !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    <div class="social-links">
            <span>{{ __('Share Us') }}</span>
            <ul>
                @for ($i = 0; $i < $section->footer->section->footer_link->loop_number ?? 1; $i++)
                    <li>
                        <a href="{{ $section->footer->section->footer_link->social_link->{$i} ?? '#'}}" target="_blank">
                            <img src="{{ get_file($section->footer->section->footer_link->social_icon->{$i}->image ?? 'themes/' . $currentTheme . '/assets/images/youtube.svg', $currentTheme) }}"
                                class="{{ 'social_icon_'. $i .'_preview' }}" alt="icon">
                        </a>
                    </li>
                    @endfor
            </ul>
        </div>
    </div>
    </div>
    <div class="bac-shadow desk-only">
        <img src="{{asset('themes/'.$currentTheme.'/assets/images/right-shadow.png')}}" alt="shadow">
    </div>
</section>
