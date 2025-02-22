<section class="newsletter-section padding-bottom padding-top  style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"  data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
<div class="custome_tool_bar"></div>
<img src="{{ get_file($section->subscribe->section->image_right->image ?? '', $currentTheme)}}"
                        id="{{ $section->subscribe->section->image_right->slug ?? '' }}_preview" alt="banner image" class="subs-design-img">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class=" banner-content-inner">
                            <div class="section-title">
                                <h2 id="{{ ($section->subscribe->section->title->slug ?? '')}}_preview">
                                            {!! $section->subscribe->section->title->text ?? '' !!}</h2>
                            </div>
                            <p id="{{ ($section->subscribe->section->description->slug ?? '')}}_preview">
                                        {!! ($section->subscribe->section->description->text ?? '') !!}</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        {!! \App\Models\Newsletter::Subscribe($currentTheme, $slug, $section) !!}
                    </div>
                </div>
            </div>
        </section>