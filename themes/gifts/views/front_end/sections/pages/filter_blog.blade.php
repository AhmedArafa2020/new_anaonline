
@foreach ($blogs as $key => $blog)
@if($request->cat_id == '0' || $blog->category_id == $request->cat_id)

<div class="col-lg-3 col-md-4 col-sm-6 col-12  blog-itm">
        <div class="blog-card-itm-inner">
            <div class="blog-card-image">
                <a href="{{route('page.article',[$slug,$blog->id])}}" tabindex="0">
                    <img src="{{ get_file($blog->cover_image_path, $currentTheme) }}" class="default-img" width="120" class="cover_img{{ $blog->id }}">
                </a>
                <div class="tip-lable">
                    {{-- <div class="live">{{ $blog->name }}</div> --}}
                </div>
                <div class="tip-lable">
                    <div class="blog-bagde">{{ $blog->created_at->format('d M,Y ') }}</div>
                </div>
            </div>
            <div class="blog-card-content">
                <div class="blog-card-heading-detail">
                    <span>{{ $blog->store->user->name ?? 'John Doe' }}</span>
                </div>
                <h3>
                    <a href="{{route('page.article',[$slug,$blog->id])}}" tabindex="0" class="description">
                        {!! $blog->title !!}</b>
                    </a>
                </h3>
                <p class="descriptions">{{$blog->short_description}}</p>
                <div class="blog-card-bottom">
                    <a href="{{route('page.article',[$slug,$blog->id])}}" class="btn">
                        {{ $page_json->blog_page->section->section_sub_button->text ??__('View Blog') }}
                    </a>
                </div>
            </div>
        </div>
    </div>  
    @endif
    @endforeach
