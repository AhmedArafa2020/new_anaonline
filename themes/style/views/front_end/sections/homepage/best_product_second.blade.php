<section class="pro-two-column product-description-col" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
        <div class="container">
            <div class="row align-items-end">
                <div class="col-sm-5 col-12">
                    <div class="two-column-variant-right">
                        <div class="product-card">
                            <div class="product-card-inner">
                                <div class="product-card-image">
                                    <a href="{{ url($slug.'/product/'.$latest_product->slug)}}">
                                        <img src="{{get_file($latest_product->cover_image_path, $currentTheme )}}" class="default-img">
                                        @if ($latest_product->Sub_image($latest_product->id)['status'] == true)
                                        <img src="{{ get_file($latest_product->Sub_image($latest_product->id)['data'][0]->image_path, $currentTheme ) }}"
                                            class="hover-img">
                                    @else
                                        <img src="{{ get_file($latest_product->Sub_image($latest_product->id), $currentTheme ) }}" class="hover-img">
                                    @endif
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-content-top">
                                        <h3 class="product-title">
                                            <a href="{{ url($slug.'/product/'.$latest_product->slug) }}">
                                                {{ $latest_product->name }}
                                            </a>
                                        </h3>
                                        <div class="product-type">{{ $latest_product->ProductData->name }} / {{ $latest_product->SubCategoryctData->name }}</div>
                                        
                                        {!! \App\Models\Product::actionLinks($currentTheme, $slug, $latest_product) !!}
                                    </div>
                                    <div class="product-content-bottom d-flex align-items-center justify-content-between">
                                        @if ($latest_product->variant_product == 0)
                                            <div class="price">
                                            {!! \App\Models\Product::getProductPrice($latest_product, $store, $currentTheme) !!}
                                            </div>
                                        @else
                                            <div class="price">
                                                <ins>{{ __('In Variant') }}</ins>
                                            </div>
                                        @endif
                                        <a href="javascript:void(0)" class="btn-secondary addcart-btn-globaly" product_id="{{ $latest_product->id }}" variant_id="0" qty="1">
                                            <span>{{ $section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}</span>
                                            <svg viewBox="0 0 10 5">
                                                <path
                                                    d="M2.37755e-08 2.57132C-3.38931e-06 2.7911 0.178166 2.96928 0.397953 2.96928L8.17233 2.9694L7.23718 3.87785C7.07954 4.031 7.07589 4.28295 7.22903 4.44059C7.38218 4.59824 7.63413 4.60189 7.79177 4.44874L9.43039 2.85691C9.50753 2.78197 9.55105 2.679 9.55105 2.57146C9.55105 2.46392 9.50753 2.36095 9.43039 2.28602L7.79177 0.69418C7.63413 0.541034 7.38218 0.544682 7.22903 0.702329C7.07589 0.859976 7.07954 1.11192 7.23718 1.26507L8.1723 2.17349L0.397965 2.17336C0.178179 2.17336 3.46059e-06 2.35153 2.37755e-08 2.57132Z">
                                                </path>
                                            </svg>
                                        </a>
                                        {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $latest_product) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7 col-12">
                    <div class="pro-two-column-content">
                        <div class="section-title" id="{{ $section->best_product_second->section->service_title->slug ?? ''}}_preview">
                            <h2>
                                {!! $section->best_product_second->section->service_title->text ?? ''!!}</h2>
                        </div>
                        <p  id="{{ $section->best_product_second->section->service_description->slug ?? ''}}_preview">
                        {!! $section->best_product_second->section->service_description->text ?? ''!!}</p>
                        <ul class="stylelist">
                        @if ($has_subcategory)
                        @foreach ($MainCategoryList as $key => $MainCategory)
                        <li class="active">
                            <a href="{{ route('page.product-list', [$slug, 'main_category' => $MainCategory->id]) }}">
                                <div class="list-ic">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="22.000000pt"
                                        height="22.000000pt" viewBox="0 0 22.000000 22.000000"
                                        preserveAspectRatio="xMidYMid meet">

                                        <g transform="translate(0.000000,22.000000) scale(0.100000,-0.100000)"
                                            fill="#000000" stroke="none">
                                            <path d="M109 181 l-26 -26 29 -24 29 -23 25 25 25 25 -26 26 c-14 14 -27 25
                                        -28 25 -1 -1 -14 -13 -28 -28z" />
                                            <path d="M31 86 c-8 -10 -8 -16 3 -25 10 -9 16 -8 26 3 12 15 6 36 -9 36 -5 0
                                        -14 -6 -20 -14z" />
                                            <path d="M105 50 c-4 -6 -1 -17 5 -26 10 -11 16 -12 26 -3 11 9 11 15 3 25
                                        -14 17 -25 18 -34 4z m26 -13 c-1 -12 -15 -9 -19 4 -3 6 1 10 8 8 6 -3 11 -8
                                        11 -12z" />
                                        </g>
                                    </svg>
                                </div>
                                <h5>{{ $MainCategory->name }}</h5>
                            </a>
                        </li>
                        @endforeach
                        @else
                        @foreach ($MainCategoryList as $key => $MainCategory)
                        <li class="active">
                            <a href="{{ route('page.product-list', [$slug, 'main_category' => $MainCategory->id]) }}">
                                <div class="list-ic">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="22.000000pt"
                                        height="22.000000pt" viewBox="0 0 22.000000 22.000000"
                                        preserveAspectRatio="xMidYMid meet">

                                        <g transform="translate(0.000000,22.000000) scale(0.100000,-0.100000)"
                                            fill="#000000" stroke="none">
                                            <path d="M109 181 l-26 -26 29 -24 29 -23 25 25 25 25 -26 26 c-14 14 -27 25
                                        -28 25 -1 -1 -14 -13 -28 -28z" />
                                            <path d="M31 86 c-8 -10 -8 -16 3 -25 10 -9 16 -8 26 3 12 15 6 36 -9 36 -5 0
                                        -14 -6 -20 -14z" />
                                            <path d="M105 50 c-4 -6 -1 -17 5 -26 10 -11 16 -12 26 -3 11 9 11 15 3 25
                                        -14 17 -25 18 -34 4z m26 -13 c-1 -12 -15 -9 -19 4 -3 6 1 10 8 8 6 -3 11 -8
                                        11 -12z" />
                                        </g>
                                    </svg>
                                </div>
                                <h5>{{ $MainCategory->name }}</h5>
                            </a>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
