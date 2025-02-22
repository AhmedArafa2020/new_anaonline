@foreach ($landing_blogs as $blog)
<div class="blog-card-itm">
    <div class="blog-card-itm-inner">
        <div class="blog-card-image">
            <a href="{{route('page.article',[$slug,$blog->id])}}" class="img-wrapper">
                <img src="{{ get_file($blog->cover_image_path, $currentTheme) }}">
            </a>
            <div class="tip-lable">
                <div class="live">{{$blog->Category->name}}</div>
            </div>
            <div class="tip-lable">
                <div class="blog-bagde">{{ $blog->created_at->format('d M,Y ') }}</div>
            </div>
        </div>
        <div class="blog-card-content">
            <h3>
                <a href="{{route('page.article',[$slug,$blog->id])}}">{!! $blog->title !!}</a>
            </h3>
            <p class="description">{{$blog->short_description}}
            </p>
            <div class="blog-card-bottom">
            <a class="btn" href="{{route('page.article',[$slug,$blog->id])}}">
                {!! $page_json->blog_page->section->section_sub_button->text ?? __('View Blog') !!}
            </a>
            </div>
           
        </div>
    </div>
</div>
@endforeach