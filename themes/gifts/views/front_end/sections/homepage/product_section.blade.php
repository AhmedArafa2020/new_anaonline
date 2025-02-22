<section class="bestseller-tab-section tabs-wrapper padding-bottom" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"  data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">
            <div class="section-title d-flex align-items-center justify-content-between">
                <div class="section-title-left">
                    <h2 id="{{ ($section->product->section->title->slug ?? '') }}_preview">{!!
                    $section->product->section->title->text ?? "" !!}</h2>
                </div>

                <a href="{{ route('page.product-list', $slug) }}" class="btn" tabindex="0" id="{{ ($section->product->section->button->slug ?? '') }}_preview">{!!
                    $section->product->section->button->text ?? "" !!}
                </a>
            </div>
        <ul class="cat-tab tabs">
            @foreach ($category_options as $cat_key => $category)
                <li class="tab-link {{ $cat_key == 0 ? 'active' : '' }}" data-tab="{{ $cat_key }}">
                    <a href="javascript:;">{{ $category }}</a>
                </li>
            @endforeach
        </ul>
        <div class="tabs-container">
            @foreach ($category_options as $cat_k => $category)
                <div id="{{ $cat_k }}" class="tab-content {{ $cat_k == 0 ? 'active' : '' }}">
                    <div class="bestseller-slider flex-slider">
                        @foreach ($all_products as $all_product)
                            @if ($cat_k == '0' || $all_product->ProductData->id == $cat_k)
                                <div class="bestseller-card-itm product-card">
                                    <div class="bestseller-card-inner">
                                        <div class="bestseller-img">
                                            <a href="{{ url($slug.'/product/'.$all_product->slug) }}">
                                                <img src="{{ get_file($all_product->cover_image_path ?? '', $currentTheme) }}">
                                            </a>
                                        </div>
                                        {!! \App\Models\Product::actionLinks($currentTheme, $slug, $all_product) !!}
                                        <div class="bestseller-content">
                                            <div class="bestseller-top">
                                                <div class="bestseller-card-heading">
                                                    <span>{{!empty($all_product->ProductData) ? $all_product->ProductData->name : ''}}</span>
                                                        <a href="javascript:void(0)"
                                                            class="wishlist-btn wbwish  wishbtn-globaly"
                                                            product_id="{{ $all_product->id }}"
                                                            in_wishlist="{{ $all_product->in_whishlist ? 'remove' : 'add' }}">
                                                            <span class="wish-ic">
                                                                <i class="{{ $all_product->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}"></i>
                                                            </span>
                                                        </a>
                                                </div>

                                                <h3 class="description">
                                                    <a href="{{ url($slug.'/product/'.$all_product->slug) }}">
                                                        {!! $all_product->name !!}
                                                    </a>
                                                </h3>
                                                </a>
                                                <p class="descriptions">{{ strip_tags($all_product->description) }}</p>
                                            </div>
                                            <div class="bestseller-bottom">
                                                <div class="bestseller-price-wrapper">
                                                @if ($all_product->variant_product == 0)
                                                    <div class="price">
                                                        {!! \App\Models\Product::getProductPrice($all_product, $store, $currentTheme) !!}
                                                    </div>
                                                @else
                                                    <div class="price">
                                                        <ins>{{ __('In Variant') }}</ins>
                                                    </div>
                                                @endif
                                                
                                            </div>
                                                <a href="#" class="btn addcart-btn-globaly" type="submit"
                                                    product_id="{{ $all_product->id }}" variant_id="0"
                                                    qty="1">
                                                    {{ $section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="ms-2"
                                                        width="14" height="16" viewBox="0 0 14 16"
                                                        fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M11.1258 5.12587H2.87416C2.04526 5.12587 1.38823 5.82524 1.43994 6.65253L1.79919 12.4006C1.84653 13.158 2.47458 13.748 3.23342 13.748H10.7666C11.5254 13.748 12.1535 13.158 12.2008 12.4006L12.5601 6.65253C12.6118 5.82524 11.9547 5.12587 11.1258 5.12587ZM2.87416 3.68884C1.21635 3.68884 -0.0977 5.08759 0.00571155 6.74217L0.364968 12.4903C0.459638 14.005 1.71574 15.185 3.23342 15.185H10.7666C12.2843 15.185 13.5404 14.005 13.635 12.4903L13.9943 6.74217C14.0977 5.08759 12.7837 3.68884 11.1258 3.68884H2.87416Z"
                                                            fill="#0A062D"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M3.40723 4.40738C3.40723 2.42326 5.01567 0.814819 6.99979 0.814819C8.9839 0.814819 10.5923 2.42326 10.5923 4.40738V5.8444C10.5923 6.24123 10.2707 6.56292 9.87384 6.56292C9.47701 6.56292 9.15532 6.24123 9.15532 5.8444V4.40738C9.15532 3.21691 8.19026 2.25184 6.99979 2.25184C5.80932 2.25184 4.84425 3.21691 4.84425 4.40738V5.8444C4.84425 6.24123 4.52256 6.56292 4.12574 6.56292C3.72892 6.56292 3.40723 6.24123 3.40723 5.8444V4.40738Z"
                                                            fill="#0A062D"></path>
                                                    </svg>
                                                </a>
                                                {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $all_product) !!}
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
</section>
