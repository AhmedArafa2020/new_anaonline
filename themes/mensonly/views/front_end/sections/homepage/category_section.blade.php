<section class="category-section padding-bottom"
    style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">
        <div class="category-bg">
            <div class="section-title d-flex justify-content-between align-items-center">
                <div class="section-title-left">
                    <h2 id="{{ ($section->category->section->title->slug ?? '') }}_preview">{!!
                        $section->category->section->title->text ?? "" !!}</h2>
                </div>
                <a href="{{ route('page.product-list', $slug) }}" class="btn-secondary" tabindex="0"
                    id="{{ ($section->category->section->button->slug ?? '') }}_preview">{!!
                    $section->category->section->button->text ?? "" !!}
                </a>
            </div>
            <div class="row">
                {!! \App\Models\MainCategory::homePageCategory($currentTheme, $slug, $section, 4) !!}
            </div>
        </div>
    </div>
</section>