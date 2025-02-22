@foreach ($blogs as $key => $blog)
    @if($request->cat_id == '0' || $blog->category_id == $request->cat_id)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 blog-itm">
            <div class="about-card-main">
                <div class="blog-card-inner">
                    <div class="blog-card">
                        <div class="blog-card-image">
                            <a href="{{ route('page.article', [$slug,$blog->id]) }}" tabindex="-1">
                                <img src="{{ get_file($blog->cover_image_path, $currentTheme) }}" class="default-img {{ $blog->id }}">
                            </a>
                        </div>
                        <div class="blog-card-content">
                            <div class="blog-card-heading-detail">
                                <span>{{ __('Category:')}} {{$blog->category->name}}</span>
                                <span>{{ __('DATE:')}} {{$blog->created_at->format('d M,Y ')}}</span>
                            </div>
                            <h3>
                                <a href="{{ route('page.article', [$slug,$blog->id]) }}" tabindex="-1">{{ $blog->title }}
                                </a>
                            </h3>
                            <p>
                                {{ $blog->short_description }}
                            </p>
                            <div class="blog-card-bottom">
                                <a href="{{ route('page.article', [$slug,$blog->id]) }}" class=" btn" tabindex="-1">
                                    {{ $page_json->blog_page->section->section_sub_button->text ??__('Read More') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach