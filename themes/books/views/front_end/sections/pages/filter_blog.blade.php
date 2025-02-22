
@foreach ($blogs as $key => $blog)
@if($request->cat_id == '0' || $blog->category_id == $request->cat_id)
 <div class="col-lg-3 col-md-4 col-sm-6 col-12 blog-itm">
            <div class="blog-card-itm">
                <div class="blog-card-itm-inner">
                    <div class="blog-card-image">
                        <a href="{{route('page.article',[$slug,$blog->id])}}" tabindex="0">
                            <img src="{{ get_file($blog->cover_image_path, $currentTheme) }}" class="default-img">
                        </a>
                        <div class="tip-lable">

                        </div>
                    </div>
                    <div class="blog-card-content">
                        <div class="blog-card-heading-detail">
                            <span>{{$blog->created_at->format('d M,Y ')}}</span>
                        </div>
                        <h4>
                            <a href="{{route('page.article',[$slug,$blog->id])}}" tabindex="0">
                                {{$blog->title}}
                            </a>
                        </h4>
                        <p class="long_sting_to_dots">
                            {{$blog->short_description}}
                        </p>
                        <div class="blog-card-bottom">
                            <a href="{{route('page.article',[$slug,$blog->id])}}" class="btn" tabindex="0">
                                {!! $page_json->blog_page->section->section_sub_button->text ?? __('Read more') !!}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    @endif
    @endforeach
