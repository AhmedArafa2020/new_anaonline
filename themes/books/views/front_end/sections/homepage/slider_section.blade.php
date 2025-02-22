<section class="main-home-first-section padding-bottom"  style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="offset-container offset-left">
        <div class="hero-main-row d-flex w-100 ">
            <div class="home-left-col">
                <div class="home-left-inner">
                    <div class="section-title">
                        <h2 class="h1" id="{{ $section->slider->section->title->slug ?? '' }}_preview">{!!
                        $section->slider->section->title->text ?? '' !!}
                        </h2>
                    </div>
                    <div class="home-search-bar-out">
                        <form class="home-search-bar">
                            <form>
                                <div class="form-row row">
                                    <div class="col-md-5 col-12">
                                        <div class="input-wrapper">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14"
                                                viewBox="0 0 15 14" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.2122 11.3214C9.14028 12.1539 7.79329 12.6497 6.33041 12.6497C2.83422 12.6497 0 9.81797 0 6.32485C0 2.83173 2.83422 0 6.33041 0C9.82659 0 12.6608 2.83173 12.6608 6.32485C12.6608 7.78645 12.1646 9.13226 11.3313 10.2033L13.78 12.6496C14.089 12.9583 14.089 13.4589 13.78 13.7677C13.4709 14.0764 12.9699 14.0764 12.6609 13.7677L10.2122 11.3214ZM11.0782 6.32485C11.0782 8.94469 8.95255 11.0685 6.33041 11.0685C3.70827 11.0685 1.5826 8.94469 1.5826 6.32485C1.5826 3.70501 3.70827 1.58121 6.33041 1.58121C8.95255 1.58121 11.0782 3.70501 11.0782 6.32485Z"
                                                    fill="black"></path>
                                            </svg>
                                            <input type="text" placeholder="Search audiobook..." class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-12">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="nice-select form-control" tabindex="0">
                                                <span class="current">{{ __('Category') }}</span>
                                                <ul class="list">
                                                    @foreach ($MainCategoryList as $category)
                                                    <li class="option">
                                                        <a
                                                            href="{{ route('page.product-list', [$slug,'main_category' => $category->id]) }}">{{ $category->name }}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <button class="btn-subscibe " type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.2122 11.3214C9.14028 12.1539 7.79329 12.6497 6.33041 12.6497C2.83422 12.6497 0 9.81797 0 6.32485C0 2.83173 2.83422 0 6.33041 0C9.82659 0 12.6608 2.83173 12.6608 6.32485C12.6608 7.78645 12.1646 9.13226 11.3313 10.2033L13.78 12.6496C14.089 12.9583 14.089 13.4589 13.78 13.7677C13.4709 14.0764 12.9699 14.0764 12.6609 13.7677L10.2122 11.3214ZM11.0782 6.32485C11.0782 8.94469 8.95255 11.0685 6.33041 11.0685C3.70827 11.0685 1.5826 8.94469 1.5826 6.32485C1.5826 3.70501 3.70827 1.58121 6.33041 1.58121C8.95255 1.58121 11.0782 3.70501 11.0782 6.32485Z" fill="black"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                    <div class="hero-left-slider">
                        <div class="hero-slider-title">
                            <h5>{!! $section->slider->section->sub_title->text ?? ''!!}</h5>
                        </div>
                        <div class="home-slider flex-slider">
                            @foreach ($products->take(5) as $product)
                            <div class="hero-slider-itm card">
                                <div class="hero-slider-itm-inner card-inner">
                                    <div class="home-slider-itm-image">
                                        <img src="{{ get_file($product->cover_image_path, $currentTheme)}}" alt="">
                                    </div>
                                    <div class="hero-slider-itm-content">
                                        <a href="{{ url($slug.'/product/'.$product->slug) }}">
                                            <h6>{{ $product->name }}</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="hero-left-btns">
                        <a href="{{ route('page.product-list',$slug) }}" class="btn" tabindex="0" id="{{ $section->slider->section->button->slug ?? ''}}_preview">

                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="16" viewBox="0 0 13 16"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M0 2.90909C0 1.30244 1.2934 0 2.88889 0H8.91449C9.68067 0 10.4155 0.306493 10.9572 0.852053L12.1539 2.05704C12.6956 2.6026 13 3.34254 13 4.11408V13.0909C13 14.6976 11.7066 16 10.1111 16H2.88889C1.2934 16 0 14.6976 0 13.0909V2.90909ZM11.5556 5.09091V13.0909C11.5556 13.8942 10.9089 14.5455 10.1111 14.5455H2.88889C2.09114 14.5455 1.44444 13.8942 1.44444 13.0909V2.90909C1.44444 2.10577 2.09114 1.45455 2.88889 1.45455H7.94444V2.90909C7.94444 4.11408 8.91449 5.09091 10.1111 5.09091H11.5556ZM11.4754 3.63636C11.4045 3.43098 11.2881 3.24224 11.1325 3.08556L9.93587 1.88057C9.78028 1.72389 9.59285 1.60665 9.38889 1.53523V2.90909C9.38889 3.31075 9.71224 3.63636 10.1111 3.63636H11.4754Z"
                                    fill="#E8BA96"></path>
                                <path
                                    d="M5.25003 7.1016L8.57902 8.83789C9.14033 9.13064 9.14033 9.86936 8.57902 10.1621L5.25003 11.8984C4.69303 12.1889 4 11.8218 4 11.2363L4 7.76372C4 7.17818 4.69303 6.8111 5.25003 7.1016Z"
                                    fill="#E8BA96"></path>
                            </svg>
                            {!! $section->slider->section->button->text ?? ''!!}
                        </a>
                        <a href="{{ route('page.product-list',$slug) }}" class="btn-secondary" tabindex="0" id="{{ $section->slider->section->button_second->slug ?? ''}}_preview">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.97487 11.0098C8.98031 11.7822 7.73058 12.2422 6.37332 12.2422C3.12957 12.2422 0.5 9.61492 0.5 6.37402C0.5 3.13313 3.12957 0.505859 6.37332 0.505859C9.61706 0.505859 12.2466 3.13313 12.2466 6.37402C12.2466 7.73009 11.7863 8.97872 11.0131 9.97241L13.285 12.2421C13.5717 12.5285 13.5717 12.993 13.285 13.2794C12.9983 13.5659 12.5334 13.5659 12.2467 13.2794L9.97487 11.0098ZM10.7783 6.37402C10.7783 8.8047 8.80612 10.7751 6.37332 10.7751C3.94051 10.7751 1.96833 8.8047 1.96833 6.37402C1.96833 3.94335 3.94051 1.9729 6.37332 1.9729C8.80612 1.9729 10.7783 3.94335 10.7783 6.37402Z"
                                    fill="#494949"></path>
                            </svg>
                            {!! $section->slider->section->button_second->text ?? ''!!}
                        </a>
                    </div>
                </div>
            </div>
            <div class="home-right-col">
                <div class="home-right-inner">
                    <img src="{{ get_file($section->slider->section->image->image ?? '', $currentTheme)}}"
                        id="{{ $section->slider->section->image->slug ?? '' }}_preview" alt="">
                    </img>
                </div>
            </div>
        </div>
    </div>
</section>
