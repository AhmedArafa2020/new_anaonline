<section class="about-us-section padding-bottom"  style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">
        <div class="section-title text-center">
            <h2 id="{{ $section->service_section->section->service_title->slug ?? '' }}_preview">{!!
                    $section->service_section->section->service_title->text ?? '' !!}</h2>
        </div>
        <div class="row">
        @for ($i = 0; $i < 3 ?? 1; $i++)
            <div class="col-12 col-sm-6 col-md-4">
                <div class="about-us-box">
                    <img src="{{ get_file($section->service_section->section->image->image->{$i} ?? '', $currentTheme)}}" alt="" class="about">
                    <h3 id="{{ ($section->service_section->section->sub_title->slug ?? '') .'_'. $i}}_preview">{!! $section->service_section->section->sub_title->text->{$i} ?? '' !!}</h3>
                    <p id="{{ ($section->service_section->section->description->slug ?? '') .'_'. $i}}_preview">{!! $section->service_section->section->description->text->{$i} ?? '' !!}</p>
            </div>
        </div>
        @endfor
    </div>
</section>