<section class="main-hiro-section"
    style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">
        <div class="main-hiro-container">
            <div class="big-title-center">
                <h2 id="{{ $section->header->section->title->slug ?? ''}}_preview"> {!!
    $section->slider->section->title->text ?? '' !!}</h2>
                <p id="{{ $section->header->section->sub_title->slug ?? ''}}_preview"> {!!
    $section->slider->section->sub_title->text ?? '' !!}</p>
            </div>
            <a href="#" class="explor-link vertical-ex"
                id="{{ $section->header->section->lable_y->slug ?? ''}}_preview"> {!!
    $section->slider->section->lable_y->text ?? '' !!}
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10" fill="none">
                        <path d="M20 1.99967L13.6667 8.33301L7.33333 1.99968L1 8.33301" stroke="black"
                            stroke-width="1.72727" />
                    </svg>
                </span>
            </a>

            <div class="hiro-row">
                <div class="hiro-column-left">
                    <div class="hiro-column-left-inner">
                        <a href="#" class="explor-link horizontal-ex"
                            id="{{ $section->header->section->lable_x->slug ?? ''}}_preview"> {!!
    $section->slider->section->lable_x->text ?? '' !!}
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10"
                                    fill="none">
                                    <path d="M20 1.99967L13.6667 8.33301L7.33333 1.99968L1 8.33301" stroke="black"
                                        stroke-width="1.72727" />
                                </svg>
                            </span>
                        </a>
                        <div class="hiro-image-slider">
                            @foreach ($home_products as $product)
                                <div class="hiro-image-item">
                                    <div class="hiro-image-item-inner">
                                        <a href="{{ url($slug . '/product/' . $product->slug) }}" class="shoe-img">
                                            <img src=" {{ get_file($product->cover_image_path, $currentTheme) }}">
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <img class="ellipse-ring"
                            src="{{ get_file($section->slider->section->background_image->image ?? '', $currentTheme) }}"
                            class="img-fluid {{ ($section->slider->section->background_image->slug ?? '') . '_preview'}}">
                    </div>
                    <div class="hiro-tab-bottom-inner d-flex">
                        <div class="video-play-colum">
                            <span class="playbutton-sec">
                                <span class="poster-button">
                                    <svg viewBox="0 0 10 21" fill="none">
                                        <path d="M8.00033 20L1.66699 13.6667L8.00033 7.33333L1.66699 1" stroke="white"
                                            stroke-width="1.72727">
                                        </path>
                                    </svg>
                                </span>
                                <a href="javascript:void(0)" class="play-btn">
                                    <span
                                        id="{{ $section->slider->section->button_second->slug ?? '' }}_preview"><b>{!! $section->slider->section->button_second->text ?? __('Play Video') !!}</b></span>
                                    {{-- <span> <b>{{__('Play Video')}}</b> {!! $homepage_Play_Icon_Image ?? '' !!}</span> --}}
                            </span>
                            </a>
                        </div>
                        <div class="hiro-slider-thumb-column">
                            <div class="hiro-thumb-slider no-transform">
                                @foreach ($home_products as $key => $product)
                                    <div class="hiro-thumb-itm">
                                        <div class="hiro-thumb-itm-inner">
                                            <div class="thumb-cntnt">
                                                <p>
                                                    <span class="mnumber">{{ ++$key }}</span>
                                                    <span class="desk-only-text description"><b
                                                            class="description">{{ $product->name }}</b>
                                                        {!! strip_tags($product->description) !!}
                                                    </span>
                                                </p>
                                                <svg viewBox="0 0 10 5">
                                                    <path
                                                        d="M2.37755e-08 2.57132C-3.38931e-06 2.7911 0.178166 2.96928 0.397953 2.96928L8.17233 2.9694L7.23718 3.87785C7.07954 4.031 7.07589 4.28295 7.22903 4.44059C7.38218 4.59824 7.63413 4.60189 7.79177 4.44874L9.43039 2.85691C9.50753 2.78197 9.55105 2.679 9.55105 2.57146C9.55105 2.46392 9.50753 2.36095 9.43039 2.28602L7.79177 0.69418C7.63413 0.541034 7.38218 0.544682 7.22903 0.702329C7.07589 0.859976 7.07954 1.11192 7.23718 1.26507L8.1723 2.17349L0.397965 2.17336C0.178179 2.17336 3.46059e-06 2.35153 2.37755e-08 2.57132Z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="hiro-column-right">
                    <div class="hiro-column-right-inner common-block commonblock-white">
                        <div class="hiro-side-slider">
                            @foreach ($home_products as $product)

                                <div class="hiro-side-item">
                                    <div class="hiro-side-item-inner">
                                        <svg class="top-left-pulse" xmlns="http://www.w3.org/2000/svg" width="13" height="6"
                                            viewBox="0 0 13 6" fill="none">
                                            <path d="M1 4.66667L4.66667 1L8.33333 4.66667L12 1" stroke="white" />
                                        </svg>
                                        <div class="wishlist">
                                            <a href="javascript:void(0)" class="wsh-btn wishbtn-globaly "
                                                product_id="{{ $product->id }}"
                                                in_wishlist="{{ $product->in_whishlist ? 'remove' : 'add' }}">
                                                <span class="wish-ic">
                                                    <i
                                                        class="{{ $product->in_whishlist ? 'fa fa-heart' : 'ti ti-heart' }}"></i>
                                                </span>
                                            </a>
                                            {!! \App\Models\Product::actionLinks($currentTheme, $slug, $product) !!}
                                        </div>

                                        <h3><a href="{{ url($slug . '/product/' . $product->slug) }}"
                                                class="name">{{ $product->name }}</a></h3>
                                        <div class="subtitle">
                                            {{ !empty($product->SubCategoryctData) ? $product->SubCategoryctData->name : '' }}
                                        </div>
                                        <p class="description">{!! strip_tags($product->description) !!}</p>
                                        <div class="thumb-pro-list">
                                            @if ($product->Sub_image($product->id)['status'] == true)
                                                @foreach ($product->Sub_image($product->id)['data'] as $key => $value)
                                                    <div class="thumb-pro-li">
                                                        <div class="thumb-pro-inner">
                                                            <img src="{{ get_file($value->image_path, $currentTheme) }}"
                                                                class="hover-img">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18"
                                                                    viewBox="0 0 19 18" fill="none">
                                                                    <circle r="8.61532" transform="matrix(-1 0 0 1 9.51847 9.18661)"
                                                                        fill="white" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M12.024 9.04785C12.024 8.79857 11.8219 8.59649 11.5726 8.59649L10.109 8.59649L10.109 7.13287C10.109 6.88359 9.90691 6.6815 9.65763 6.6815C9.40835 6.6815 9.20626 6.88359 9.20626 7.13287L9.20626 8.59649L7.74265 8.59649C7.49336 8.59649 7.29128 8.79857 7.29128 9.04785C7.29128 9.29713 7.49336 9.49922 7.74265 9.49922H9.20626L9.20626 10.9628C9.20626 11.2121 9.40835 11.4142 9.65763 11.4142C9.90691 11.4142 10.109 11.2121 10.109 10.9628L10.109 9.49922L11.5726 9.49922C11.8219 9.49922 12.024 9.29713 12.024 9.04785Z"
                                                                        fill="#F3734D" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>


                                        <div class="d-flex price-wrap-flex align-items-end justify-content-between">
                                            @if ($product->variant_product == 0)
                                                <div class="price">
                                                    <div class="price-lbl">{{ __('Price:') }}</div>
                                                    {!! \App\Models\Product::getProductPrice($product, $store, $currentTheme) !!}
                                                </div>
                                            @else
                                                <div class="price">
                                                    <ins>{{ __('In Variant') }}</ins>
                                                </div>
                                            @endif
                                            <a href="javascript:void(0)" class="add-cart-btn addcart-btn-globaly"
                                                product_id="{{ $product->id }}" variant_id="0" qty="1">
                                                <span>{{ $section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="8"
                                                    viewBox="0 0 9 8" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M7.35342 5.2252H3.43344C2.90305 5.22535 2.44792 4.84736 2.35068 4.32595L1.84049 1.56215C1.8082 1.38557 1.65294 1.25825 1.47345 1.26118H0.621922C0.419212 1.26118 0.254883 1.09685 0.254883 0.894139C0.254883 0.691429 0.419212 0.5271 0.621922 0.5271H1.48079C2.01119 0.52695 2.46632 0.904941 2.56356 1.42635L3.07374 4.19015C3.10603 4.36673 3.2613 4.49405 3.44078 4.49112H7.35709C7.53657 4.49405 7.69184 4.36673 7.72413 4.19015L8.1866 1.69428C8.20641 1.58612 8.17667 1.47476 8.10558 1.39087C8.03448 1.30698 7.92951 1.25938 7.81956 1.26118H3.55824C3.35553 1.26118 3.1912 1.09685 3.1912 0.894139C3.1912 0.691429 3.35553 0.5271 3.55824 0.5271H7.81589C8.14332 0.527007 8.45381 0.672642 8.66308 0.924473C8.87235 1.1763 8.95868 1.50821 8.89865 1.83009L8.43619 4.32595C8.33895 4.84736 7.88381 5.22535 7.35342 5.2252ZM5.02645 6.69462C5.02645 6.08649 4.53347 5.59351 3.92534 5.59351C3.72263 5.59351 3.5583 5.75783 3.5583 5.96055C3.5583 6.16326 3.72263 6.32758 3.92534 6.32758C4.12805 6.32758 4.29238 6.49191 4.29238 6.69462C4.29238 6.89733 4.12805 7.06166 3.92534 7.06166C3.72263 7.06166 3.5583 6.89733 3.5583 6.69462C3.5583 6.49191 3.39397 6.32758 3.19126 6.32758C2.98855 6.32758 2.82422 6.49191 2.82422 6.69462C2.82422 7.30275 3.31721 7.79574 3.92534 7.79574C4.53347 7.79574 5.02645 7.30275 5.02645 6.69462ZM7.22865 7.4287C7.22865 7.22599 7.06433 7.06166 6.86162 7.06166C6.65891 7.06166 6.49458 6.89733 6.49458 6.69462C6.49458 6.49191 6.65891 6.32758 6.86162 6.32758C7.06433 6.32758 7.22865 6.49191 7.22865 6.69462C7.22865 6.89733 7.39298 7.06166 7.59569 7.06166C7.7984 7.06166 7.96273 6.89733 7.96273 6.69462C7.96273 6.08649 7.46975 5.59351 6.86162 5.59351C6.25349 5.59351 5.7605 6.08649 5.7605 6.69462C5.7605 7.30275 6.25349 7.79574 6.86162 7.79574C7.06433 7.79574 7.22865 7.63141 7.22865 7.4287Z"
                                                        fill="white" />
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
                </div>
            </div>
        </div>
    </div>
</section>
<!--video popup start-->
<div id="popup-box" class="overlay-popup">
    <div class="popup-inner">
        <div class="content">
            <a class=" close-popup" href="javascript:void(0)">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34" viewBox="0 0 35 34" fill="none">
                    <line x1="2.29695" y1="1.29289" x2="34.1168" y2="33.1127" stroke="white" stroke-width="2">
                    </line>
                    <line x1="0.882737" y1="33.1122" x2="32.7025" y2="1.29242" stroke="white" stroke-width="2">
                    </line>
                </svg>
            </a>
            <iframe width="560" height="315" src="@if($section->slider->section->video->type == 'text')
                            {{ $section->slider->section->video->text }}
                        @else
                            {{ get_file($section->slider->section->video->text, $currentTheme) }}
                        @endif" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
        </div>
    </div>
</div>
