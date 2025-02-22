<section class="news-letter-sec" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"  data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
        <div class="container">
            <div class="news-letter-content padding-bottom">
                <div class="section-title">
                    <h2 id="{{ $section->subscribe->section->title->slug ?? '' }}_preview">{!! $section->subscribe->section->title->text ?? '' !!}</h2>
                </div>
                <p id="{{ $section->subscribe->section->description->slug ?? '' }}_preview">{!! $section->subscribe->section->description->text ?? '' !!}
                </p>
                {!! \App\Models\Newsletter::Subscribe($currentTheme, $slug, $section) !!}
                <p id="{{ $section->subscribe->section->button->slug ?? '' }}_preview">{!! $section->subscribe->section->button->text ?? '' !!}
                </p>
                <label id="{{ $section->subscribe->section->sub_title->slug ?? '' }}_preview">
                    {!! $section->subscribe->section->sub_title->text ?? '' !!}
                </label>
            </div>

        </div>
    </section>
