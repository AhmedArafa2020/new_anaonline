<section class="blog-section padding-top padding-bottom" style="position: relative; @if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-6 col-12">
                <div class="prodcut-card-heading">
                    <div class="section-title">
                        <span class="subtitle" id="{{ $section->blog->section->sub_title->slug ?? '' }}_preview">
                            {!! $section->blog->section->sub_title->text ?? '' !!} </span>
                        <h2 id="{{ $section->blog->section->title->slug ?? '' }}_preview"> {!!
                            $section->blog->section->title->text ?? '' !!}
                        </h2>

                        <p id="{{ $section->blog->section->description->slug ?? '' }}_preview">
                            {!! $section->blog->section->description->text ?? '' !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 col-12">
                {!! \App\Models\Blog::HomePageBlog($currentTheme,$slug, $no = 10) !!}
            </div>
        </div>
    </div>
</section>