<section class="banner-contant-section padding-bottom"  style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">
        <div class="section-title d-flex align-items-center justify-content-between">
            <h2 id="{{ $section->variant_background->section->title->slug ?? '' }}_preview">
                    {!! $section->variant_background->section->title->text ?? '' !!}</h2>
            <a href="{{ route('page.product-list',$slug) }}" class="btn" tabindex="0"  id="{{ $section->variant_background->section->button->slug ?? '' }}_preview">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="16" viewBox="0 0 13 16" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0 2.90909C0 1.30244 1.2934 0 2.88889 0H8.91449C9.68067 0 10.4155 0.306493 10.9572 0.852053L12.1539 2.05704C12.6956 2.6026 13 3.34254 13 4.11408V13.0909C13 14.6976 11.7066 16 10.1111 16H2.88889C1.2934 16 0 14.6976 0 13.0909V2.90909ZM11.5556 5.09091V13.0909C11.5556 13.8942 10.9089 14.5455 10.1111 14.5455H2.88889C2.09114 14.5455 1.44444 13.8942 1.44444 13.0909V2.90909C1.44444 2.10577 2.09114 1.45455 2.88889 1.45455H7.94444V2.90909C7.94444 4.11408 8.91449 5.09091 10.1111 5.09091H11.5556ZM11.4754 3.63636C11.4045 3.43098 11.2881 3.24224 11.1325 3.08556L9.93587 1.88057C9.78028 1.72389 9.59285 1.60665 9.38889 1.53523V2.90909C9.38889 3.31075 9.71224 3.63636 10.1111 3.63636H11.4754Z"
                        fill="#E8BA96"></path>
                    <path
                        d="M5.25003 7.1016L8.57902 8.83789C9.14033 9.13064 9.14033 9.86936 8.57902 10.1621L5.25003 11.8984C4.69303 12.1889 4 11.8218 4 11.2363L4 7.76372C4 7.17818 4.69303 6.8111 5.25003 7.1016Z"
                        fill="#E8BA96"></path>
                </svg>
                {!!$section->variant_background->section->button->text ?? '' !!}
            </a>
        </div>
        <div class="banner-content-main">
            <div class="banner-content-image">
                <img src="{{ get_file($section->variant_background->section->image->image ?? '', $currentTheme)}}" id="{{ $section->variant_background->section->image->slug ?? '' }}_preview" alt="bookstore">
            </div>
            @if(!empty($latest_product))
            <div class="banner-content-card-inner">
                <div class="banner-card-image">
                    <a href="{{url($slug.'/product/'.$latest_product->slug)}}" tabindex="0">
                        <img src="{{get_file($latest_product->cover_image_path, $currentTheme)}}" alt=""
                            class="responsive-img">
                    </a>
                </div>
                <div class="banner-card-content">
                    <div class="banner-cont-top">
                    {{--<span class="badge">{{ $latest_product->tag_api }}</span> --}}
                        <div class="prouct-card-heading">
                            <h4>
                                <a href="{{ url($slug.'/product/'.$latest_product->slug) }}"
                                    tabindex="0"> {{ $latest_product->name }}</a>
                            </h4>
                            <p>{{!empty($latest_product->ProductData) ? $latest_product->ProductData->name : ''}}</p>
                        </div>
                    </div>
                    <div class="banner-cont-bottom">
                        <div class="price-btn">
                            @if ($latest_product->variant_product == 0)
                            <div class="price">
                            {!! \App\Models\Product::getProductPrice($latest_product, $store, $currentTheme) !!}
                            </div>
                            @else
                            <div class="price">
                                <ins>{{ __('In Variant') }}</ins>
                            </div>
                            @endif
                            <a href="javascript:void(0)" class="btn-secondary addcart-btn-globaly"
                                product_id="{{ $latest_product->id }}" variant_id="0" qty="1">
                                <svg width="20" height="20" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M15.7424 6H4.25797C3.10433 6 2.1899 6.97336 2.26187 8.12476L2.76187 16.1248C2.82775 17.1788 3.70185 18 4.75797 18H15.2424C16.2985 18 17.1726 17.1788 17.2385 16.1248L17.7385 8.12476C17.8104 6.97336 16.896 6 15.7424 6ZM4.25797 4C1.95069 4 0.121837 5.94672 0.265762 8.24951L0.765762 16.2495C0.89752 18.3577 2.64572 20 4.75797 20H15.2424C17.3546 20 19.1028 18.3577 19.2346 16.2495L19.7346 8.24951C19.8785 5.94672 18.0496 4 15.7424 4H4.25797Z">
                                    </path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5 5C5 2.23858 7.23858 0 10 0C12.7614 0 15 2.23858 15 5V7C15 7.55228 14.5523 8 14 8C13.4477 8 13 7.55228 13 7V5C13 3.34315 11.6569 2 10 2C8.34315 2 7 3.34315 7 5V7C7 7.55228 6.55228 8 6 8C5.44772 8 5 7.55228 5 7V5Z">
                                    </path>
                                </svg>
                                {{$section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                            </a>
                            {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $latest_product) !!}
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
