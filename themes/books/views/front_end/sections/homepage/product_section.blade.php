<section class="category-section padding-bottom" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">
        <div class="section-title">
            <h2 id="{{ $section->product->section->title->slug ?? '' }}_preview">{!!
                        $section->product->section->title->text ?? '' !!}</h2>
            <p id="{{ $section->product->section->description->slug ?? '' }}_pproduct">{!!
                        $section->product->section->description->text ?? '' !!}
            </p>
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="category-image-box">
                    <a href="{{ route('page.product-list',$slug) }}">
                        <img src="{{ get_file($section->product->section->image->image ?? '', $currentTheme) }}" id="{{ ($section->product->section->image->slug ?? '').'_preview'}}" >
                        @if (!empty($latest_product))
                        <div class="category-image-text">
                            <h3> {{ $latest_product->name }}</h3>
                            <div class="link-btn justify-content-start">
                                {!! $section->product->section->show_more_button->text ?? __('Show more') !!}
                                <svg width="6" height="5" viewBox="0 0 6 5" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.89017 2.75254C6.03661 2.61307 6.03661 2.38693 5.89017 2.24746L3.64017 0.104605C3.49372 -0.0348681 3.25628 -0.0348681 3.10984 0.104605C2.96339 0.244078 2.96339 0.470208 3.10984 0.609681L5.09467 2.5L3.10984 4.39032C2.96339 4.52979 2.96339 4.75592 3.10984 4.8954C3.25628 5.03487 3.49372 5.03487 3.64016 4.8954L5.89017 2.75254ZM0.640165 4.8954L2.89017 2.75254C3.03661 2.61307 3.03661 2.38693 2.89017 2.24746L0.640165 0.104605C0.493719 -0.0348682 0.256282 -0.0348682 0.109835 0.104605C-0.0366115 0.244078 -0.0366115 0.470208 0.109835 0.609681L2.09467 2.5L0.109835 4.39032C-0.0366117 4.52979 -0.0366117 4.75592 0.109835 4.8954C0.256282 5.03487 0.493719 5.03487 0.640165 4.8954Z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        @endif
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="category-card-reverse">
                    <div class="category-itm">
                        @foreach ($products as $product)
                        <div class=" product-card">
                            <div class="category-card-inner">
                                <div class="category-card-image">
                                        <a href="{{url($slug.'/product/'.$product->slug)}}">
                                            <img src="{{get_file($product->cover_image_path, $currentTheme)}}">
                                        </a>
                                        {!! \App\Models\Product::actionLinks($currentTheme, $slug, $product) !!}
                                </div>
                                <div class="category-card-content">
                                    <div class="category-cont-top">
                                        {{--<span class="badge">{{ $product->tag_api }}</span> --}}

                                        <div class="prouct-card-heading long_sting_to_dot">
                                            <h3>
                                                <a href="{{ url($slug.'/product/'.$product->slug) }}"
                                                    tabindex="0">{{ $product->name }}</a>
                                            </h3>
                                            <p>{{!empty($product->ProductData) ? $product->ProductData->name : ''}}</p>
                                        </div>
                                    </div>

                                    <div class="category-cont-bottom">
                                        <div class="price-btn">
                                            @if ($product->variant_product == 0)
                                            <div class="price">

                                            {!! \App\Models\Product::getProductPrice($product, $store, $currentTheme) !!}
                                            </div>
                                            @else
                                            <div class="price">
                                                <ins>{{ __('In Variant') }}</ins>
                                            </div>
                                            @endif
                                            <a href="javascript:void(0)" class="link-btn addcart-btn-globaly"
                                                product_id="{{ $product->id }}" variant_id="0" qty="1">
                                                <svg width="20" height="20" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M15.7424 6H4.25797C3.10433 6 2.1899 6.97336 2.26187 8.12476L2.76187 16.1248C2.82775 17.1788 3.70185 18 4.75797 18H15.2424C16.2985 18 17.1726 17.1788 17.2385 16.1248L17.7385 8.12476C17.8104 6.97336 16.896 6 15.7424 6ZM4.25797 4C1.95069 4 0.121837 5.94672 0.265762 8.24951L0.765762 16.2495C0.89752 18.3577 2.64572 20 4.75797 20H15.2424C17.3546 20 19.1028 18.3577 19.2346 16.2495L19.7346 8.24951C19.8785 5.94672 18.0496 4 15.7424 4H4.25797Z">
                                                    </path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5 5C5 2.23858 7.23858 0 10 0C12.7614 0 15 2.23858 15 5V7C15 7.55228 14.5523 8 14 8C13.4477 8 13 7.55228 13 7V5C13 3.34315 11.6569 2 10 2C8.34315 2 7 3.34315 7 5V7C7 7.55228 6.55228 8 6 8C5.44772 8 5 7.55228 5 7V5Z">
                                                    </path>
                                                </svg>
                                                {{$section->common_page->section['cart_button']['text'] ?? __('Add to cart')}}
                                            </a>
                                            {!! \App\Models\Product::ProductcardButton($currentTheme, $slug, $product) !!}
                                        </div>
                                    </div>
                                </div>
                                    {!! \App\Models\Product::productSalesPage($currentTheme, $slug, $product->id) !!}

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
