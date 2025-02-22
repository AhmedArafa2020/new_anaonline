<section class="gaming-categories-section tabs-wrapper" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="gaming-leftbar">
                        <div class="section-title">
                        <h2 id="{{ $section->bestseller_slider->section->title->slug ?? ''}}_preview">
                            {!! $section->bestseller_slider->section->title->text ?? ''!!}</h2>
                        </div>
                        <ul class="cat-tab tabs">
                            @foreach ($category_options->take(4) as $cat_key =>  $category)
                                <li class="tab-link {{$cat_key == 0 ? 'active' : ''}}" data-tab="{{ $cat_key }}" >
                                    <a href="javascript:;">{{ $category }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="more-categories">
                        <a href="{{route('page.product-list',$slug)}}" id="{{ $section->bestseller_slider->section->button->slug ?? ''}}_preview">
                            {!! $section->bestseller_slider->section->button->text ?? ''!!}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="tabs-container">
                        @foreach ($category_options  as $cat_k => $category)
                            <div id="{{ $cat_k }}" class="tab-content {{$cat_k == 0 ? 'active' : ''}}">
                                <div class="product-list shop-protab-slider product-card-row">
                                @foreach($all_products as $product)
                                @if($cat_k == '0' ||  $product->ProductData->id == $cat_k)
                                <div class="product-card">
                                    <div class="product-card-inner">
                                    <div class="card-top">
                                        <span class="slide-label">{{!empty($product->ProductData) ? $product->ProductData->name : ''}} </span>
                                        {!! \App\Models\Product::productSalesPage($currentTheme, $slug, $product->id) !!}

                                        <a href="javascript:void(0)" class="wishlist wbwish  wishbtn-globaly" product_id="{{$product->id}}" in_wishlist="{{ $product->in_whishlist ? 'remove' : 'add'}}">
                                                <span class="wish-ic">
                                                    <i class="{{ $product->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}" style='color: black;'></i>
                                                </span>
                                            </a>
                                            {!! \App\Models\Product::actionLinks($currentTheme, $slug, $product) !!}
                                    </div>
                                    <h3 class="product-title">
                                        <a href="{{url($slug.'/product/'.$product->slug)}}">
                                            {{$product->name}}
                                        </a>
                                    </h3>
                                    <div class="product-card-image">
                                        <a href="{{url($slug.'/product/'.$product->slug)}}">
                                            <img src="{{ get_file($product->cover_image_path, $currentTheme) }}" class="default-img">
                                            @if($product->Sub_image($product->id)['status'] == true)
                                                <img src="{{ get_file($product->Sub_image($product->id)['data'][0]->image_path, $currentTheme) }}" class="hover-img">
                                            @else
                                                <img src="{{ get_file($product->Sub_image($product->id), $currentTheme) }}" class="hover-img">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-content-bottom d-flex align-items-center justify-content-between">
                                            @if ($product->variant_product == 0)
                                                <div class="price">
                                                {!! \App\Models\Product::getProductPrice($product, $store, $currentTheme) !!}
                                                </div>
                                            @else
                                                <div class="price">
                                                    <ins>{{ __('In Variant') }}</ins>
                                                </div>
                                            @endif
                                            <a href="javascript:void(0)" class="btn-primary add-cart-btn addcart-btn-globaly" product_id="{{ $product->id }}" variant_id="0" qty="1">
                                                {{ $section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                                            </a>
                                            {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $product) !!}
                                        </div>
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
