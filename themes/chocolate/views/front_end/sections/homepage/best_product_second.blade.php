<section class="pro-base-slider-sec padding-bottom" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
        <div class="container">
            <div class="section-title">

                    <h2 id="{{ $section->best_product_second->section->title->slug ?? '' }}_preview"> {!!
                                     $section->best_product_second->section->title->text ?? '' !!}
                </h2>
            </div>
            <div class="pro-base-slider-main">
                @foreach ($bestSeller as $data)


                    <div class="product-card">
                        <div class="product-card-inner">
                            <div class="card-top">
                                <div class="custom-output">
                                {!! \App\Models\Product::productSalesPage($currentTheme, $slug, $data->id) !!}
                                </div>
                                <a href="javascript:void(0)" class="wishlist-btn wishbtn-globaly "
                                    product_id="{{ $data->id }}"
                                    in_wishlist="{{ $data->in_whishlist ? 'remove' : 'add' }}">
                                    <span class="wish-ic">
                                        <i class="{{ $data->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}"></i>
                                    </span>
                                </a>
                                {!! \App\Models\Product::actionLinks($currentTheme, $slug, $data) !!}
                            </div>
                            <div class="product-card-image">
                                <a href="{{ url($slug.'/product/'.$data->slug)}}">
                                    <img src="{{ get_file($data->cover_image_path, $currentTheme) }}" class="default-img">
                                </a>
                            </div>
                            <div class="card-bottom">
                                <div class="card-title">
                                    <h3>
                                        <a href="{{ url($slug.'/product/'.$data->slug)}}" class ="names">
                                            {{ $data->name }}
                                        </a>
                                    </h3>
                                </div>
                                <p class="description">{{ strip_tags($data->description) }}</p>
                                <div class="card-btn-wrapper">
                                    @if ($data->variant_product == 0)
                                        <div class="price">
                                        {!! \App\Models\Product::getProductPrice($data, $store, $currentTheme) !!}
                                        </div>
                                    @else
                                        <div class="price">
                                            <ins>{{ __('In Variant') }}</ins>
                                        </div>
                                    @endif
                                    <a href="javascript:void(0)" class="btn  addtocart-btn-cart addcart-btn-globaly"
                                        product_id="{{ $data->id }}" variant_id="{{ $data->default_variant_id }}"
                                        qty="1">
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
                                    {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $data) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
