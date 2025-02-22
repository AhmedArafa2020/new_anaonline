<section class="home-blog-section" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"  data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
<div class="custome_tool_bar"></div>
            <div class="container">           
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="banner-content-inner">
                            <div class="section-title">
                                <h2 id="{{ $section->blog->section->title->slug ?? '' }}_preview">
                        {!! $section->blog->section->title->text ?? '' !!} </h2>
                            </div>
                            <p id="{{ $section->blog->description->slug ?? '' }}">{!!
                    $section->blog->section->description->text ?? '' !!} </p>
                            <a href="{{route('page.product-list',$slug)}}" class="btn white-btn" id="{{ $section->blog->section->button->slug ?? '' }}">{!!
                        $section->blog->section->button->text ?? '' !!}
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8 col-12">
                        <div class="blog-slider-main flex-slider">
                            {!! \App\Models\Blog::HomePageBlog($currentTheme, $slug,6) !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>