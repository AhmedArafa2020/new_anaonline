<section
    class="our-client-section"style="position: relative;@if (isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>

    <div class="container">
        <div class="client-logo-wrap">
            <div class="client-logo-slider common-arrows">
                @for ($i = 0; $i <= 7; $i++)
                    <div class="client-logo-item">
                        <a href="#">
                            <img src="{{ get_file($section->logo_slider->section->image->text->{$i} ?? '', $currentTheme) }}" alt="logo">
                        </a>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</section>
