<section class="hot-selling-product padding-bottom"
    style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">
        <div class="banner-main-content">
            <div class="client-area-wrap">
                <h2 class="title" id="{{ $section->logo_slider->section->title->slug ?? '' }}">{!!
                    $section->logo_slider->section->title->text ?? '' !!}</h2>
                <div class="client-logo-slider">
                    @for($i=0; $i<count(objectToArray($section->logo_slider->section->image->image)); $i++)
                        <div class="client-logo-item">
                            <a href="#">
                                <img src="{{ get_file($section->logo_slider->section->image->image->{$i} ?? '', $currentTheme) }}"
                                    alt="logo">
                            </a>
                        </div>
                        @endfor
                </div>
            </div>
        </div>
    </div>
</section>