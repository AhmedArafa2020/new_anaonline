<section class="offer-section padding-bottom padding-top" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">
        <div class="section-title text-center">
            <h2 id="{{ $section->product->section->title->slug ?? '' }}_preview">{!! $section->product->section->title->text ?? '' !!} </h2>
        </div>
    </div>
    <div class="offer-pro-slider common-arrows">
        @foreach ($discount_products as $discount_product)
        <div class="offer-pro-itm product-card">
            <div class="product-card-inner">
                <div class="product-card-image">
                    <a href="{{url($slug.'/product/'.$discount_product->slug)}}">
                        <img src="{{ get_file($discount_product->cover_image_path, $currentTheme)}}"
                            class="default-img">
                        @if ($discount_product->Sub_image($discount_product->id)['status'] == true)
                        <img src="{{ get_file($discount_product->Sub_image($discount_product->id)['data'][0]->image_path) }}"
                            class="hover-img">
                        @else
                        <img src="{{ get_file($discount_product->Sub_image($discount_product->id)) }}"
                            class="hover-img">
                        @endif
                    </a>
                </div>
                <div class="product-content">
                    <div class="product-content-top">
                        <h3 class="product-title">
                            <a href="{{url($slug.'/product/'.$discount_product->slug)}}">
                                {{$discount_product->name}}
                            </a>
                        </h3>
                        <div class="product-type">{{ $discount_product->ProductData->name }} / {{ $discount_product->SubCategoryctData->name }}</div>

                        {!! \App\Models\Product::actionLinks($currentTheme, $slug, $discount_product) !!}
                    </div>
                    <div class="product-content-bottom d-flex align-items-center justify-content-between">
                        @if ($discount_product->variant_product == 0)
                        <div class="price">
                        {!! \App\Models\Product::getProductPrice($discount_product, $store, $currentTheme) !!}
                        </div>
                        @else
                        <div class="price">
                            <ins>{{ __('In Variant') }}</ins>
                        </div>
                        @endif
                            {!! \App\Models\Product::productSalesPage($currentTheme, $slug, $discount_product->id) !!}

                        <a href="javascript:void(0)" class="btn-secondary addcart-btn-globaly"
                            product_id="{{ $discount_product->id }}" variant_id="0" qty="1">
                            {{ $section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                            <svg viewBox="0 0 10 5">
                                <path
                                    d="M2.37755e-08 2.57132C-3.38931e-06 2.7911 0.178166 2.96928 0.397953 2.96928L8.17233 2.9694L7.23718 3.87785C7.07954 4.031 7.07589 4.28295 7.22903 4.44059C7.38218 4.59824 7.63413 4.60189 7.79177 4.44874L9.43039 2.85691C9.50753 2.78197 9.55105 2.679 9.55105 2.57146C9.55105 2.46392 9.50753 2.36095 9.43039 2.28602L7.79177 0.69418C7.63413 0.541034 7.38218 0.544682 7.22903 0.702329C7.07589 0.859976 7.07954 1.11192 7.23718 1.26507L8.1723 2.17349L0.397965 2.17336C0.178179 2.17336 3.46059e-06 2.35153 2.37755e-08 2.57132Z">
                                </path>
                            </svg>
                        </a>
                        {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $discount_product) !!}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
