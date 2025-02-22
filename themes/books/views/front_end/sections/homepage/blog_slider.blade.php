@foreach ($landing_blogs as $blog)
    <div class="blog-card-itm">
        <div class="blog-card-itm-inner">
            <div class="blog-card-image">
                <a href="{{route('page.article',[$slug,$blog->id])}}" tabindex="0">
                    <img src="{{ get_file($blog->cover_image_path, $currentTheme) }}" class="default-img">
                </a>
                <div class="tip-lable">
                    <span class="badge">{{$blog->category->name}}</span>
                </div>
            </div>
            <div class="blog-card-content">
                <div class="blog-card-heading-detail">
                    <span>{{ date("d M Y", strtotime($blog->created_at))}}</span>
                </div>
                <h4>
                    <a href="{{route('page.article',[$slug,$blog->id])}}" tabindex="0">
                        {{ $blog->title }}
                    </a>
                </h4>
                <p>
                    {{ $blog->short_description }}
                </p>
                <div class="blog-card-bottom">
                    <a href="{{route('page.article',[$slug,$blog->id])}}" class="btn" tabindex="0">
                        {!! $page_json->blog_page->section->section_sub_button->text ?? __('Read more') !!}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach

