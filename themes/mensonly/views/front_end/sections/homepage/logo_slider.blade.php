<section class="partner-logo-section padding-bottom"
    style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">
        <div class="partner-itm-inner">
            <div class="partner-slider">

            @for($i=0; $i<count(objectToArray($section->logo_slider->section->image->image)); $i++)
                <div class="partner-itm">
                    <a href="#">
                        <img src="{{ get_file($section->logo_slider->section->image->image->{$i} ?? '', $currentTheme) }}"
                            alt="Client logo">
                    </a>
                </div>
            @endfor
        </div>
    </div>
    </div>
</section>