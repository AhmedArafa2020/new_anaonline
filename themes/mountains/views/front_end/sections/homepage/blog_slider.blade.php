<div class="blog-card-slider">
    @foreach ($landing_blogs->take(5) as $blogs)
        <div class="about-card-main">
            <div class="blog-card-inner">
                <div class="blog-card">
                    <div class="blog-card-image">
                        <a href="{{route('page.article',[$slug,$blogs->id])}}">
                            <img src="{{ get_file($blogs->cover_image_path, $currentTheme)}}" class="default-img">
                        </a>
                        <div class="tip-lable">
                            <span>{{$blogs->category->name}}</span>
                        </div>
                    </div>
                    <div class="blog-card-content">
                        <div class="blog-card-heading-detail">
                            <span>{{ __('AUTHOR:') }} {{ $blogs->store->user->name ?? 'John Doe' }} </span>
                            <span>{{ __('DATE:') }} {{ date("d M Y", strtotime($blogs->created_at))}}</span>
                        </div>
                        <h3 class="blog_text">
                            <a href="{{route('page.article',[$slug,$blogs->id])}}" >
                                {{ $blogs->title }}
                            </a>
                        </h3>
                        <p class="blog_descrip">
                            {{ $blogs->short_description }}
                        </p>
                        <div class="blog-card-bottom">
                            <a href="{{route('page.article',[$slug,$blogs->id])}}" class=" btn">
                                {{ $page_json->blog_page->section->section_sub_button->text ??__('Read More') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>