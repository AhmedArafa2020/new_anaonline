<section class="service-tag-div padding-bottom" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class=" container">
        <div class="service-tag">
            @for ($i = 0; $i < $section->service_section->loop_number ?? 1; $i++)
                <div class="d-flex align-items-center service-tag-inner">
                    <img src="{{ get_file($section->service_section->section->image->image->{$i} ?? '', $currentTheme)}}" width="32" height="33"
                        viewBox="0 0 32 33" id="{{ ($section->service_section->section->image->slug ?? '').'_'. $i }}_preview">
                    <div class="service-text">
                        <b id="{{ ($section->service_section->section->title->slug ?? '') .'_'. $i}}_preview">{!! $section->service_section->section->title->text->{$i} ?? '' !!}</b>
                        <span id="{{ ($section->service_section->section->description->slug ?? '') .'_'. $i}}_preview">{!! $section->service_section->section->description->text->{$i} ?? '' !!}</span>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>