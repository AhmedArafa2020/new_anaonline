<section class="merge-client-section padding-top" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="client-logo-section common-arrows padding-bottom">
        <div class="container">
            <div class="client-logo-slider">
                @for($i=0; $i<count(objectToArray($section->logo_slider->section->image->image)); $i++)
                    <div class="client-logo-item">
                        <a href="#" tabindex="{{$i ?? 0}}">
                            <img src="{{ asset(((isset($section->logo_slider->section->image->image->{$i}) && !empty($section->logo_slider->section->image->image->{$i})) ? $section->logo_slider->section->image->image->{$i} : 'themes/' . $currentTheme. '/assets/images/clietn-logo.png'), $currentTheme) }}" alt="">
                        </a>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</section>