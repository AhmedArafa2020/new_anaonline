
@foreach ($blogs as $key => $blog)
@if($request->cat_id == '0' || $blog->category_id == $request->cat_id)

<div class="col-lg-3 col-md-4 col-sm-6 col-12 blog-itm-card">
        <div class="blog-card-inner">
            <div class="blog-card-image">
                <a href="{{route('page.article',[$slug,$blog->id])}}" tabindex="0">
                    <img src="{{ get_file($blog->cover_image_path, $currentTheme) }}" class="default-img">
                </a>
                <div class="blog-labl">
                    {{ $blog->category->name ?? ''}}
                </div>
                <div class="date-labl">
                    {{$blog->created_at->format('d M,Y ')}}
                </div>
            </div>
            <div class="blog-product-content">
                <h3 class="product-title">
                    <a href="{{route('page.article',[$slug,$blog->id])}}" tabindex="0" class="short-description">
                        {{$blog->title}}
                    </a>
                </h3>
            </div>
            <p class="descriptions">{{$blog->short_description}}</p>
            <div class="read-more-btn">
                <a href="{{route('page.article',[$slug,$blog->id])}}" class="btn-primary add-cart-btn" tabindex="0">
                    {{ $page_json->blog_page->section->section_sub_button->text ??__('Read More') }}
                </a>
            </div>
        </div>
    </div>
    @endif
    @endforeach
