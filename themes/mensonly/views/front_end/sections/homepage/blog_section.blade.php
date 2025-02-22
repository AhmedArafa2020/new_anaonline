
<section class="blog-section padding-bottom"  style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"  data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
            <div class="container">
                    <div class="section-title d-flex align-items-center justify-content-between">
                        <div class="section-title-left">
                            <h2 id="{{ $section->blog->section->title->slug ?? '' }}">{!!
                    $section->blog->section->title->text ?? '' !!}</h2>
                        </div>
                        <a href="{{ route('page.blog', $slug) }}" class="btn" id="{{ $section->blog->section->button->slug ?? '' }}">{!!
                    $section->blog->section->button->text ?? '' !!}
                        </a>
                    </div>
                <div class="blog-slider">
                {!! \App\Models\Blog::HomePageBlog($currentTheme, $slug,6) !!}
                </div>
            </div>
        </section>