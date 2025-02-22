<section class="second-sec padding-top padding-bottom" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"  data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
            <img src="{{ asset('themes/'.$currentTheme.'/assets/images/cs.png') }}" class="design-img-chocolate"
                alt="design-img-chocolate">
            <div class=" container">
                <div class="row justify-content-between align-items-center">
                    <div class=" col-md-6 col-sm-6 col-12">
                        <div class=" dark-p">
                                <div class="section-title">
                                    <span class="sub-title" id="{{ $section->product_category->section->subtitle->slug ?? '' }}_preview"> {!!
                                    $section->product_category->section->subtitle->text ?? '' !!}</span>
                                    <h2 id="{{ $section->product_category->section->title->slug ?? '' }}_preview"> {!!
                                    $section->product_category->section->title->text ?? '' !!}</h2>
                                </div>
                            <div class="second-sec-btn">
                                <div class="btn-wrapper">
                                    @if ($has_subcategory)
                                        <div class="btn-wrapper">
                                            @foreach ($MainCategory as $cat_key => $category)
                                                <a href="{{ route('page.product-list', [$slug, 'main_category' => $category->id]) }}"
                                                    class="btn-secondary">
                                                    {{ $category->name }}
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16"
                                                        viewBox="0 0 14 16" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M11.1258 5.12596H2.87416C2.04526 5.12596 1.38823 5.82533 1.43994 6.65262L1.79919 12.4007C1.84653 13.1581 2.47458 13.7481 3.23342 13.7481H10.7666C11.5254 13.7481 12.1535 13.1581 12.2008 12.4007L12.5601 6.65262C12.6118 5.82533 11.9547 5.12596 11.1258 5.12596ZM2.87416 3.68893C1.21635 3.68893 -0.0977 5.08768 0.00571155 6.74226L0.364968 12.4904C0.459638 14.0051 1.71574 15.1851 3.23342 15.1851H10.7666C12.2843 15.1851 13.5404 14.0051 13.635 12.4904L13.9943 6.74226C14.0977 5.08768 12.7837 3.68893 11.1258 3.68893H2.87416Z"
                                                            fill="white"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M3.40723 4.40744C3.40723 2.42332 5.01567 0.81488 6.99979 0.81488C8.9839 0.81488 10.5923 2.42332 10.5923 4.40744V5.84447C10.5923 6.24129 10.2707 6.56298 9.87384 6.56298C9.47701 6.56298 9.15532 6.24129 9.15532 5.84447V4.40744C9.15532 3.21697 8.19026 2.2519 6.99979 2.2519C5.80932 2.2519 4.84425 3.21697 4.84425 4.40744V5.84447C4.84425 6.24129 4.52256 6.56298 4.12574 6.56298C3.72892 6.56298 3.40723 6.24129 3.40723 5.84447V4.40744Z"
                                                            fill="white"></path>
                                                    </svg>
                                                </a>
                                            @endforeach
                                        </div>
                                    @else
                                        @foreach ($MainCategoryList as $category)
                                            <a href="{{ route('page.product-list', [$slug, 'main_category' => $category->id]) }}"
                                                class="btn-secondary">{{ $category->name }}
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16"
                                                    viewBox="0 0 14 16" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M11.1258 5.12596H2.87416C2.04526 5.12596 1.38823 5.82533 1.43994 6.65262L1.79919 12.4007C1.84653 13.1581 2.47458 13.7481 3.23342 13.7481H10.7666C11.5254 13.7481 12.1535 13.1581 12.2008 12.4007L12.5601 6.65262C12.6118 5.82533 11.9547 5.12596 11.1258 5.12596ZM2.87416 3.68893C1.21635 3.68893 -0.0977 5.08768 0.00571155 6.74226L0.364968 12.4904C0.459638 14.0051 1.71574 15.1851 3.23342 15.1851H10.7666C12.2843 15.1851 13.5404 14.0051 13.635 12.4904L13.9943 6.74226C14.0977 5.08768 12.7837 3.68893 11.1258 3.68893H2.87416Z"
                                                        fill="white"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M3.40723 4.40744C3.40723 2.42332 5.01567 0.81488 6.99979 0.81488C8.9839 0.81488 10.5923 2.42332 10.5923 4.40744V5.84447C10.5923 6.24129 10.2707 6.56298 9.87384 6.56298C9.47701 6.56298 9.15532 6.24129 9.15532 5.84447V4.40744C9.15532 3.21697 8.19026 2.2519 6.99979 2.2519C5.80932 2.2519 4.84425 3.21697 4.84425 4.40744V5.84447C4.84425 6.24129 4.52256 6.56298 4.12574 6.56298C3.72892 6.56298 3.40723 6.24129 3.40723 5.84447V4.40744Z"
                                                        fill="white"></path>
                                                </svg>
                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-6  col-sm-6 col-12">
                        <div class="second-sec-right-side dark-p">
                            <div class="img-wrapper">
                                <img src="{{ get_file($section->product_category->section->image->image ?? 'themes/'.$currentTheme.'/assets/img/banner-sec-7.png', $currentTheme) }}"id="{{ $section->product_category->section->image->slug ?? '' }}_preview" alt="chocolate">
                            </div>
                                <p id="{{ $section->product_category->section->description->slug ?? '' }}_preview"> {!!
                                    $section->product_category->section->description->text ?? '' !!}</p>
                                <a href="{{ route('page.product-list', $slug) }}"
                                    class="link-btn" id="{{ $section->product_category->section->button->slug ?? '' }}_preview"> {!!
                                    $section->product_category->section->button->text ?? '' !!}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>