<section class="product-prescription-section" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"  data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
                           <img src="{{ get_file($section->best_product->section->background_image->image ?? '', $currentTheme)}}"
                            id="{{ $section->best_product->section->background_image->slug }}_preview" alt="banner image" class="background-img">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="prescription-card">
                                <div class="img-wrapper">
                                    <img src="{{ get_file($section->best_product->section->image->image ?? '', $currentTheme) }}" id="{{ $section->best_product->section->image->slug ?? ''}}_preview" alt="Prescription glasses and sunglasses">
                                </div>
                                <div class="prescription-content">
                                    <h3 id="{{ $section->best_product->section->title->slug ?? '' }}">{!!
                    $section->best_product->section->title->text ?? '' !!}</h3>
                                    <p id="{{ $section->best_product->section->description->slug ?? '' }}">{!!
                    $section->best_product->section->description->text ?? '' !!}</p>
                                </div>
                            </div>
                        </div>
                        @if(!empty($latest_product))
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="product-card">
                                <div class="product-card-inner">
                                    <div class="product-content-top">

                                        <h3 class="product-title">
                                            <a href="{{url($slug.'/product/'.$latest_product->slug)}}">
                                                {{$latest_product->name}}
                                            </a>
                                        </h3>
                                        <div class="custom-output">
                                        {!! \App\Models\Product::productSalesPage($currentTheme, $slug, $latest_product->id) !!}
                                        </div>
                                        {!! \App\Models\Product::actionLinks($currentTheme, $slug, $latest_product) !!}
                                        {{-- <div class="product-type">{{ $latest_product->name }}</div> --}}
                                    </div>
                                    <div class="product-card-image">
                                        <a href="{{url($slug.'/product/'.$latest_product->slug)}}" class="img-wrapper">
                                            <img src="{{ get_file($latest_product->cover_image_path, $currentTheme)}}" class="default-img">
                                        </a>
                                    </div>
                                    <div class="product-content-bottom">
                                        @if ($latest_product->variant_product == 0)
                                            <div class="price">
                                            {!! \App\Models\Product::getProductPrice($latest_product, $store, $currentTheme) !!}
                                            </div>
                                        @else
                                            <div class="price">
                                                <ins>{{ __('In Variant') }}</ins>
                                            </div>
                                        @endif
                                        <button class="addtocart-btn btn addcart-btn-globaly" product_id="{{ $latest_product->id }}" variant_id="0" qty="1" tabindex="0">
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
                                        {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $latest_product) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="tooltip icon-top">
                        <a href="{{route('page.product-list',$slug)}}">
                        <span class="icon-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.55749 7.802C8.55749 8.21958 8.21897 8.5581 7.80139 8.5581L1.38569 8.5581C0.968109 8.5581 0.629592 8.21958 0.629592 7.802C0.629592 7.38442 0.968109 7.0459 1.38569 7.0459L7.04529 7.0459L7.04529 1.3863C7.04529 0.96872 7.38381 0.630204 7.80139 0.630204C8.21897 0.630203 8.55749 0.96872 8.55749 1.3863L8.55749 7.802Z"
                                    fill="white"></path>
                                <path
                                    d="M14.3276 7.15641L7.9119 7.15641C7.49432 7.15641 7.1558 7.49493 7.1558 7.91251L7.1558 14.3282C7.1558 14.7458 7.49432 15.0843 7.9119 15.0843C8.32948 15.0843 8.668 14.7458 8.668 14.3282L8.668 8.66861L14.3276 8.66861C14.7452 8.66861 15.0837 8.33009 15.0837 7.91251C15.0837 7.49493 14.7452 7.15641 14.3276 7.15641Z"
                                    fill="white"></path>
                            </svg>
                        </span>
                        </a>
                        <span>Stainless<br>Border</span>
                    </div>
                </div>
            </section>
