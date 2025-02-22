<section class="newslatter-section padding-bottom"
    style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">
        <div class="newslatter-bg">
            <div class="row justify-content-between">
                <div class="col-lg-6 col-12">
                    <div class="newslatter-content">
                        <div class="section-title">
                            <h2 class="dark" id="{{ $section->subscribe->section->title->slug ?? '' }}_preview">{!!
                                $section->subscribe->section->title->text ?? '' !!}</h2>
                        </div>
                        <p id="{{ $section->subscribe->section->description->slug ?? '' }}_preview">{!!
                            $section->subscribe->section->description->text ?? '' !!}</p>

                        {!! \App\Models\Newsletter::Subscribe($currentTheme, $slug, $section) !!}
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <div class="newslatter-images">
                        <img  src="{{ get_file($section->subscribe->section->image->image ?? '', $currentTheme)}}"
                            id="{{ $section->subscribe->section->image->slug ?? '' }}_preview" class="newslattwer-1" alt="newslatter">
                        <img src="{{ get_file($section->subscribe->section->image_left->image ?? '', $currentTheme)}}"
                            id="{{ $section->subscribe->section->image_left->slug ?? '' }}_preview" class="newslattwer-2" alt="newslatter">
                        <img src="{{ get_file($section->subscribe->section->image_right->image ?? '', $currentTheme)}}"
                            id="{{ $section->subscribe->section->image_right->slug ?? '' }}_preview" class="newslattwer-3" alt="newslatter">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>