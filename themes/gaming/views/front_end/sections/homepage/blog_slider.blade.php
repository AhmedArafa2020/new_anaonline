@foreach($landing_blogs as $blog)
    <div class="blog-itm-card">
        <div class="blog-card-inner">
            <div class="blog-card-image">
                <a href="{{route('page.article',[$slug,$blog->id])}}">
                     <img src="{{ get_file($blog->cover_image_path, $currentTheme) }}" alt="blog-img">
                </a>

                <div class="date-labl">
                    {{ $blog->created_at->format('d M,Y ') }}
                </div>
            </div>
            <div class="blog-product-content">
                <h3 class="product-title">
                    <a href="{{route('page.article',[$slug,$blog->id])}}" tabindex="0" class="short-description">
                        {!! $blog->title !!}
                    </a>
                </h3>
            </div>
            <div class="read-more-btn">
                <a href="{{route('page.article',[$slug,$blog->id])}}" class="btn-primary add-cart-btn" tabindex="0">
                    {{ $page_json->blog_page->section->section_sub_button->text ??__('Read More') }}
                </a>
            </div>
        </div>
    </div>
    @endforeach
