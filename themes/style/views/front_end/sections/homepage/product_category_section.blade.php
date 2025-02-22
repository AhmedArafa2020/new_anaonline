<section class="our-products-shop-section padding-bottom"  style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">
        <div class="section-title d-flex align-items-center justify-content-between">
            <h2 id="{{ $section->product_category->section->title->slug ?? '' }}_preview"> {!!
                                    $section->product_category->section->title->text ?? '' !!}</h2>
            <ul class="cat-tab tabs">
            @foreach ($category_options as $cat_key => $category)
                <li class="tab-link {{ $cat_key == 0 ? 'active' : '' }}" data-tab="{{ $cat_key }}">
                    <a href="javascript:">
                        {{ $category }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        @foreach ($category_options as $cat_k => $category)
            <div id="{{ $cat_k }}" class="tab-content tab-cat-id {{ $cat_k == 0 ? 'active' : '' }}">
                <div class="shop-protab-slider f_blog">
                @foreach ($products as $homeproduct)
                    @if($cat_k == '0' || $homeproduct->ProductData->id == $cat_k)
                    <div class="shop-protab-itm product-card">
                            <div class="product-card-inner">
                                <div class="product-card-image">
                                    <a href="{{url($slug.'/product/'.$homeproduct->slug)}}">
                                        <img src="{{ get_file($homeproduct->cover_image_path ?? '', $currentTheme) }}" class="default-img">
                                        @if ($homeproduct->Sub_image($homeproduct->id)['status'] == true)
                                        <img src="{{ get_file($homeproduct->Sub_image($homeproduct->id)['data'][0]->image_path, $currentTheme) }}"
                                            class="hover-img">
                                        @else
                                        <img src="{{ get_file($homeproduct->Sub_image($homeproduct->id), $currentTheme) }}"
                                            class="hover-img">
                                        @endif
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-content-top">
                                        <h3 class="product-title">
                                            <a href="{{url($slug.'/product/'.$homeproduct->slug)}}">
                                                {{$homeproduct->name}}
                                            </a>
                                        </h3>
                                        <div class="product-type">{{ $homeproduct->ProductData->name }} /
                                            {{ $homeproduct->SubCategoryctData->name }}</div>
                                        
                                            {!! \App\Models\Product::actionLinks($currentTheme, $slug, $homeproduct) !!}
                                    </div>
                                    <div class="product-content-bottom d-flex align-items-center justify-content-between">
                                        @if ($homeproduct->variant_product == 0)
                                        <div class="price">
                                        {!! \App\Models\Product::getProductPrice($homeproduct, $store, $currentTheme) !!}
                                        </div>
                                        @else
                                        <div class="price">
                                            <ins>{{ __('In Variant') }}</ins>
                                        </div>
                                        @endif
                                            {!! \App\Models\Product::productSalesPage($currentTheme, $slug,
                                            $homeproduct->id) !!}
                                        <button class="addtocart-btn addcart-btn-globaly"
                                            product_id="{{ $homeproduct->id }}" variant_id="0" qty="1">
                                            <span>{{ $section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}</span>
                                            <svg viewBox="0 0 10 5">
                                                <path
                                                    d="M2.37755e-08 2.57132C-3.38931e-06 2.7911 0.178166 2.96928 0.397953 2.96928L8.17233 2.9694L7.23718 3.87785C7.07954 4.031 7.07589 4.28295 7.22903 4.44059C7.38218 4.59824 7.63413 4.60189 7.79177 4.44874L9.43039 2.85691C9.50753 2.78197 9.55105 2.679 9.55105 2.57146C9.55105 2.46392 9.50753 2.36095 9.43039 2.28602L7.79177 0.69418C7.63413 0.541034 7.38218 0.544682 7.22903 0.702329C7.07589 0.859976 7.07954 1.11192 7.23718 1.26507L8.1723 2.17349L0.397965 2.17336C0.178179 2.17336 3.46059e-06 2.35153 2.37755e-08 2.57132Z">
                                                </path>
                                            </svg>
                                        </button>
                                        {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $homeproduct) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @endforeach
                </div>
            </div>
            @endforeach
        <div class="d-flex justify-content-center see-all-probtn">
            <a href="{{route('page.product-list',$slug)}}" class="btn-secondary white-btn" id="{{ $section->product_category->section->button->slug ?? '' }}_preview"> {!!
                                    $section->product_category->section->button->text ?? '' !!}
                <svg viewBox="0 0 10 5">
                    <path
                        d="M2.37755e-08 2.57132C-3.38931e-06 2.7911 0.178166 2.96928 0.397953 2.96928L8.17233 2.9694L7.23718 3.87785C7.07954 4.031 7.07589 4.28295 7.22903 4.44059C7.38218 4.59824 7.63413 4.60189 7.79177 4.44874L9.43039 2.85691C9.50753 2.78197 9.55105 2.679 9.55105 2.57146C9.55105 2.46392 9.50753 2.36095 9.43039 2.28602L7.79177 0.69418C7.63413 0.541034 7.38218 0.544682 7.22903 0.702329C7.07589 0.859976 7.07954 1.11192 7.23718 1.26507L8.1723 2.17349L0.397965 2.17336C0.178179 2.17336 3.46059e-06 2.35153 2.37755e-08 2.57132Z">
                    </path>
                </svg>
            </a>
        </div>
    </div>
</section>
