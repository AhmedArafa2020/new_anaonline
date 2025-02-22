<section class="about-us-section padding-bottom"
    style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">
        <div class="section-title">
            <h2 id="{{ $section->newest_category->section->service_title->slug ?? '' }}_preview"> {!!
                $section->newest_category->section->service_title->text ?? '' !!}</h2>
            <p id="{{ $section->newest_category->section->service_description->slug ?? '' }}_preview"> {!!
                $section->newest_category->section->service_description->text ?? '' !!}
            </p>
        </div>
        <div class="row">
            @for ($i = 0; $i < 4 ?? 1; $i++) <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                <div class="about-us-box">
                    <h3 class="h2" id="{{ ($section->newest_category->section->title->slug ?? '') .'_'. $i}}_preview">
                        {!! $section->newest_category->section->title->text->{$i} ?? '' !!}</h3>
                    <h4 class="h3"
                        id="{{ ($section->newest_category->section->sub_title->slug ?? '') .'_'. $i}}_preview">{!!
                        $section->newest_category->section->sub_title->text->{$i} ?? '' !!}Quality</h4>
                    <p id="{{ ($section->newest_category->section->description->slug ?? '') .'_'. $i}}_preview">{!!
                        $section->newest_category->section->description->text->{$i} ?? '' !!}</p>
                </div>
        </div>
         @endfor
    </div>
</section>