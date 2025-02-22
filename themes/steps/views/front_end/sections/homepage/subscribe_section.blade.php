<section class="subscription-section padding-top padding-bottom" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
        <img src="{{ get_file($section->subscribe->section->image_left->image, $currentTheme) }}" id="{{ $section->subscribe->section->image_left->slug ?? '' }}_preview" alt="" class="sub-left">
        <img src="{{ get_file($section->subscribe->section->image_right->image ?? '', $currentTheme) }}" id="{{ $section->subscribe->section->image_right->slug ?? '' }}_preview" alt="" class="sub-right">
    <div class="container">
    

        <div class="row align-items-center">
            <div class="col-md-5 col-12">
                <div class="subscription-left-column">
                        <div class="section-title">
                            <div class="subtitle" id="{{ $section->subscribe->section->sub_title->slug ?? '' }}_preview">{!! $section->subscribe->section->sub_title->text ?? '' !!}</div>
                            <h2 id="{{ $section->subscribe->section->title->slug ?? '' }}_preview">{!! $section->subscribe->section->title->text ?? '' !!}</h2>
                        </div>
                </div>
            </div>
            <div class="col-md-7 col-12">
             {!! \App\Models\Newsletter::Subscribe($currentTheme, $slug, $section) !!}
            </div>           
           
        </div>
    </div>
</section>
