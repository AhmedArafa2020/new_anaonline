<section class="meet-category-section" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"  data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
        <div class="container">
            <div class="section-title d-flex align-items-center justify-content-between">
                
                    <div class="section-title-left">
                        <div class="subtitle" id="{{ ($section->category->section->sub_title->slug ?? '') }}_preview">{!! $section->category->section->sub_title->text ?? "" !!}</div>
                        <h2 class="title" id="{{ ($section->category->section->title->slug ?? '') }}_preview">{!! $section->category->section->title->text ?? "" !!}</h2>
                    </div>
                    <a href="{{ route('page.product-list', $slug) }}" class="btn-secondary">
                        <span class="btn-txt" id="{{ ($section->category->section->button->slug ?? '') }}_preview">
            {!! $section->category->section->button->text ?? "" !!}</span>
                        <span class="btn-ic">
                            <svg viewBox="0 0 10 5">
                                <path
                                    d="M2.37755e-08 2.57132C-3.38931e-06 2.7911 0.178166 2.96928 0.397953 2.96928L8.17233 2.9694L7.23718 3.87785C7.07954 4.031 7.07589 4.28295 7.22903 4.44059C7.38218 4.59824 7.63413 4.60189 7.79177 4.44874L9.43039 2.85691C9.50753 2.78197 9.55105 2.679 9.55105 2.57146C9.55105 2.46392 9.50753 2.36095 9.43039 2.28602L7.79177 0.69418C7.63413 0.541034 7.38218 0.544682 7.22903 0.702329C7.07589 0.859976 7.07954 1.11192 7.23718 1.26507L8.1723 2.17349L0.397965 2.17336C0.178179 2.17336 3.46059e-06 2.35153 2.37755e-08 2.57132Z">
                                </path>
                            </svg>
                        </span>
                    </a>
            </div>
            <div class="row">
                {!! \App\Models\MainCategory::homePageCategory($currentTheme, $slug, $section, 3) !!}
            </div>

        </div>
    </section>