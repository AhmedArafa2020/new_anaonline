<section class="categories-section padding-top padding-bottom" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"  data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
<div class="custome_tool_bar"></div>
        <div class="container">
                <div class="section-title d-flex align-items-center justify-content-between">
                    <h2 id="{{ $section->category->section->title->slug ?? '' }}_preview">
                                        {!! $section->category->section->title->text ?? '' !!}</h2>
                    <a id="{{ $section->category->section->button->slug ?? '' }}_preview" href="{{route('page.product-list',$slug)}}" class="btn">
                    {!! $section->category->section->button->text ?? '' !!}
                    </a>
                </div>
                <div class="tabs-wrapper">
                    <div class="row ">
                        <div class="col-lg-2 col-md-3 col-12">
                            <ul class="cat-tab tabs">
                                @foreach ($category_options as $cat_key =>  $category)
                                    <li class="tab-link {{$cat_key == 0 ? 'active' : ''}}" data-tab="{{ $cat_key }}">
                                        <a href="javascript:;">{{ $category }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <a class="link-btn" href="{{route('page.product-list',$slug)}}">{!! $section->category->section->check_more_button->text ?? __('Check More') !!}</a>

                        </div>
                        <div class="col-lg-10 col-md-9 col-12 tabs-container">
                            @foreach ($category_options as $cat_k => $category)
                                <div id="{{ $cat_k }}" class="tab-content {{$cat_k == 0 ? 'active' : ''}}">
                                    <div class="product-tab-slider flex-slider">
                                        @foreach ($home_products as $homeproduct)
                                            @if($cat_k == '0' ||  $homeproduct->ProductData->id == $cat_k)
                                                <div class="product-card card">
                                                    <div class="product-card-inner card-inner">
                                                        <div class="product-content-top ">
                                                            <span class="new-labl">{{!empty($homeproduct->ProductData()) ? $homeproduct->ProductData->name : ''}}
                                                            </span>
                                                            <h3 class="product-title">
                                                                <a href="{{url($slug.'/product/'.$homeproduct->slug)}}" class="description">
                                                                    {{ $homeproduct->name }}
                                                                </a>
                                                            </h3>
                                                            <div class="custom-output">
                                                            {!! \App\Models\Product::productSalesPage($currentTheme, $slug, $homeproduct->id) !!}
                                                            </div>
                                                            {!! \App\Models\Product::actionLinks($currentTheme, $slug, $homeproduct) !!}
                                                            {{-- <div class="product-type">{{ $homeproduct->name }}</div> --}}
                                                        </div>
                                                        <div class="product-card-image">
                                                            <a href="{{url($slug.'/product/'.$homeproduct->slug)}}" class="img-wrapper">
                                                                <img src="{{ get_file($homeproduct->cover_image_path, $currentTheme) }}" class="default-img">
                                                            </a>
                                                        </div>
                                                        <div class="product-content-bottom">
                                                            @if ($homeproduct->variant_product == 0)
                                                                <div class="price">
                                                                {!! \App\Models\Product::getProductPrice($homeproduct, $store, $currentTheme) !!}
                                                                </div>
                                                            @else
                                                                <div class="price">
                                                                    <ins>{{ __('In Variant') }}</ins>
                                                                </div>
                                                            @endif
                                                            <button class="addtocart-btn btn addcart-btn-globaly" product_id="{{ $homeproduct->id }}" variant_id="0" qty="1">
                                                                <span>{{$section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}</span>
                                                                <span class="roun-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9"
                                                                        viewBox="0 0 9 9" fill="none">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M8.58455 4.76994C8.79734 4.55716 8.79734 4.21216 8.58455 3.99938L5.31532 0.730146C5.10253 0.51736 4.75754 0.51736 4.54476 0.730146C4.33197 0.942931 4.33197 1.28793 4.54476 1.50071L7.4287 4.38466L4.54476 7.26861C4.33197 7.48139 4.33197 7.82639 4.54476 8.03917C4.75754 8.25196 5.10253 8.25196 5.31532 8.03917L8.58455 4.76994ZM0.956346 8.03917L4.22558 4.76994C4.43836 4.55716 4.43836 4.21216 4.22558 3.99938L0.956346 0.730146C0.74356 0.51736 0.398567 0.51736 0.185781 0.730146C-0.0270049 0.942931 -0.0270049 1.28792 0.185781 1.50071L3.06973 4.38466L0.185781 7.26861C-0.0270052 7.48139 -0.0270052 7.82639 0.185781 8.03917C0.398566 8.25196 0.74356 8.25196 0.956346 8.03917Z"
                                                                            fill="white" />
                                                                    </svg>
                                                                </span>
                                                            </button>
                                                            {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $homeproduct) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    </section>
