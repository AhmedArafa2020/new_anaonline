<section class="all-showes-second-grid padding-bottom padding-top" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"  data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
        <img src="{{ get_file($section->product_category->section->image_left->image ?? '', $currentTheme) }}" id="{{ $section->product_category->section->image_left->slug ?? '' }}_preview" alt="" class="all-shes-left">
        <img src="{{ get_file($section->product_category->section->image_right->image ?? '', $currentTheme) }}" id="{{ $section->product_category->section->image_right->slug ?? '' }}_preview" alt="" class="all-shes-right">
        <div class="container">
            <div class="section-title d-flex align-items-center justify-content-between">

                    <div class="section-title-left">
                        <div class="subtitle" id="{{ $section->product_category->section->sub_title->slug ?? ''}}_preview">
                {!! $section->product_category->section->sub_title->text ?? '' !!}</div>
                        <h2 id="{{ $section->product_category->section->title->slug ?? ''}}_preview">
                {!! $section->product_category->section->title->text ?? '' !!}</h2>
                    </div>
                    <a href="{{ route('page.product-list', $slug) }}" class="btn-secondary">
                        <span class="btn-txt" id="{{ $section->product_category->section->button->slug ?? ''}}_preview">
                {!! $section->product_category->section->button->text ?? '' !!}</span>
                        <span class="btn-ic">
                            <svg viewBox="0 0 10 5">
                                <path
                                    d="M2.37755e-08 2.57132C-3.38931e-06 2.7911 0.178166 2.96928 0.397953 2.96928L8.17233 2.9694L7.23718 3.87785C7.07954 4.031 7.07589 4.28295 7.22903 4.44059C7.38218 4.59824 7.63413 4.60189 7.79177 4.44874L9.43039 2.85691C9.50753 2.78197 9.55105 2.679 9.55105 2.57146C9.55105 2.46392 9.50753 2.36095 9.43039 2.28602L7.79177 0.69418C7.63413 0.541034 7.38218 0.544682 7.22903 0.702329C7.07589 0.859976 7.07954 1.11192 7.23718 1.26507L8.1723 2.17349L0.397965 2.17336C0.178179 2.17336 3.46059e-06 2.35153 2.37755e-08 2.57132Z">
                                </path>
                            </svg>
                        </span>
                    </a>
            </div>
            <div class="all-shes-second-slider common-arrow">
                @foreach ($all_products as $product)
                    <div class="all-shes-second-itm product-card">
                        <div class="all-shes-second-itm-inner">
                            <div class="all-shes-second-img">
                                <a href="{{ url($slug.'/product/'.$product->slug) }}">
                                    <img src="{{ get_file($product->cover_image_path, $currentTheme) }}">
                                </a>
                            </div>
                            <div class="all-shes-second-content ">
                                <div class="product-title">

                                <h3><a href="{{ url($slug.'/product/'.$product->slug, $currentTheme) }}"
                                        class="name">{{ $product->name }}
                                    </a>
                                </h3>

                                {!! \App\Models\Product::actionLinks($currentTheme, $slug, $product) !!}
                               
                                {!! \App\Models\Product::productSalesPage($currentTheme, $slug, $product->id) !!}
                               
                            </div>
                                <p class="description">{{ strip_tags($product->description) }}</p>

                                @if ($product->variant_product == 0)
                                    <div class="price">
                                    {!! \App\Models\Product::getProductPrice($product, $store, $currentTheme) !!}
                                    </div>
                                @else
                                    <div class="price">
                                        <ins>{{ __('In Variant') }}</ins>
                                    </div>
                                @endif
                                <a href="javascript:void(0)" class="add-cart-btn addcart-btn-globaly"
                                    product_id="{{ $product->id }}" variant_id="0"
                                    qty="1" tabindex="0">
                                    <span>{{ $section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}</span>
                                    <span class="atc-ic">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="8"
                                            viewBox="0 0 9 8" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.35342 5.2252H3.43344C2.90305 5.22535 2.44792 4.84736 2.35068 4.32595L1.84049 1.56215C1.8082 1.38557 1.65294 1.25825 1.47345 1.26118H0.621922C0.419212 1.26118 0.254883 1.09685 0.254883 0.894139C0.254883 0.691429 0.419212 0.5271 0.621922 0.5271H1.48079C2.01119 0.52695 2.46632 0.904941 2.56356 1.42635L3.07374 4.19015C3.10603 4.36673 3.2613 4.49405 3.44078 4.49112H7.35709C7.53657 4.49405 7.69184 4.36673 7.72413 4.19015L8.1866 1.69428C8.20641 1.58612 8.17667 1.47476 8.10558 1.39087C8.03448 1.30698 7.92951 1.25938 7.81956 1.26118H3.55824C3.35553 1.26118 3.1912 1.09685 3.1912 0.894139C3.1912 0.691429 3.35553 0.5271 3.55824 0.5271H7.81589C8.14332 0.527007 8.45381 0.672642 8.66308 0.924473C8.87235 1.1763 8.95868 1.50821 8.89865 1.83009L8.43619 4.32595C8.33895 4.84736 7.88381 5.22535 7.35342 5.2252ZM5.02645 6.69462C5.02645 6.08649 4.53347 5.59351 3.92534 5.59351C3.72263 5.59351 3.5583 5.75783 3.5583 5.96055C3.5583 6.16326 3.72263 6.32758 3.92534 6.32758C4.12805 6.32758 4.29238 6.49191 4.29238 6.69462C4.29238 6.89733 4.12805 7.06166 3.92534 7.06166C3.72263 7.06166 3.5583 6.89733 3.5583 6.69462C3.5583 6.49191 3.39397 6.32758 3.19126 6.32758C2.98855 6.32758 2.82422 6.49191 2.82422 6.69462C2.82422 7.30275 3.31721 7.79574 3.92534 7.79574C4.53347 7.79574 5.02645 7.30275 5.02645 6.69462ZM7.22865 7.4287C7.22865 7.22599 7.06433 7.06166 6.86162 7.06166C6.65891 7.06166 6.49458 6.89733 6.49458 6.69462C6.49458 6.49191 6.65891 6.32758 6.86162 6.32758C7.06433 6.32758 7.22865 6.49191 7.22865 6.69462C7.22865 6.89733 7.39298 7.06166 7.59569 7.06166C7.7984 7.06166 7.96273 6.89733 7.96273 6.69462C7.96273 6.08649 7.46975 5.59351 6.86162 5.59351C6.25349 5.59351 5.7605 6.08649 5.7605 6.69462C5.7605 7.30275 6.25349 7.79574 6.86162 7.79574C7.06433 7.79574 7.22865 7.63141 7.22865 7.4287Z"
                                                fill="white"></path>
                                        </svg>
                                    </span>
                                </a>
                                {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $product) !!}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
