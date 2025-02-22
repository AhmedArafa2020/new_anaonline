<section class="main-home-first-section"
    style="@if (isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="banner-image">
        <img src="{{ get_file($section->slider->section->background_image->image, $currentTheme) }}" alt="">
    </div>
    <div class="container">
        <div class="home-banner-content">
            <div class="home-banner-content-inner">

                <div class="offer-announcement">
                    <span class="new-labl"
                        id="{{ $section->slider->section->button->slug ?? '' }}_preview">{!! $section->slider->section->button->text ?? '' !!}</span>
                    <p id="{{ $section->slider->section->sub_title->slug ?? ''}}_preview">
                        {!! $section->slider->section->sub_title->text ?? '' !!} <a href="#">More</a></p>
                </div>
                <h2 class="h1" id="{{ $section->slider->section->title->slug ?? ''}}_preview">
                    {!! $section->slider->section->title->text ?? '' !!}
                </h2>
                <p id="{{ $section->slider->section->description->slug ?? ''}}_preview">
                    {!! $section->slider->section->description->text ?? '' !!}
                </p>
                <div class="search-package">
                    <form>
                        <label
                            id="{{ $section->slider->section->service_title->slug ?? '' }}_preview">{!! $section->slider->section->service_title->text ?? '' !!}</label>
                        <div class="form-inputs">
                            <input type="search" placeholder="Shipping number" class="form-control">
                            <button type="submit" class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14"
                                    viewBox="0 0 13 14" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.47487 11.0098C8.48031 11.7822 7.23058 12.2422 5.87332 12.2422C2.62957 12.2422 0 9.61492 0 6.37402C0 3.13313 2.62957 0.505859 5.87332 0.505859C9.11706 0.505859 11.7466 3.13313 11.7466 6.37402C11.7466 7.73009 11.2863 8.97872 10.5131 9.97241L12.785 12.2421C13.0717 12.5285 13.0717 12.993 12.785 13.2794C12.4983 13.5659 12.0334 13.5659 11.7467 13.2794L9.47487 11.0098ZM10.2783 6.37402C10.2783 8.8047 8.30612 10.7751 5.87332 10.7751C3.44051 10.7751 1.46833 8.8047 1.46833 6.37402C1.46833 3.94335 3.44051 1.9729 5.87332 1.9729C8.30612 1.9729 10.2783 3.94335 10.2783 6.37402Z"
                                        fill="white" />
                                </svg>
                                {!! $section->slider->section->service_button->text ?? '' !!}
                            </button>
                        </div>
                        <p id="{{ $section->slider->section->slider_sub_description->slug ?? ''}}_preview">
                            {!! $section->slider->section->slider_sub_description->text ?? '' !!} </p>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
