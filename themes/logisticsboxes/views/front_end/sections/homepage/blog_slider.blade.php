
@foreach ($landing_blogs as $blog)

    <div class="blog-widget">
        <div class="blog-widget-inner">
            <div class="blog-media">
                <a href="{{ route('page.article', ['storeSlug' => $slug, 'id' => $blog->id]) }}">
                    <img src="{{ get_file($blog->cover_image_path, $currentTheme) }}" alt="">
                </a>
            </div>
            <div class="blog-caption">
                <div class="captio-top d-flex justify-content-between align-items-center">
                    <span class="badge">{{$blog->category->name}}</span>
                    <span class="date">{{ $blog->created_at->format('d M,Y ') }}</span>
                </div>
                <h4>
                    <a href="{{ route('page.article', ['storeSlug' => $slug, 'id' => $blog->id]) }}" class="name">{{ $blog->title }}</a>
                </h4>
                <p class="description">{{ $blog->short_description }}</p>
                <strong class="auth-name">@johndoe</strong>
                <a class="btn-secondary blog-btn" href="{{ route('page.article', ['storeSlug' => $slug, 'id' => $blog->id]) }}">
                    {!! $page_json->blog_page->section->section_sub_button->text ?? __('Read more') !!}
                </a>
            </div>
        </div>
    </div>
@endforeach

