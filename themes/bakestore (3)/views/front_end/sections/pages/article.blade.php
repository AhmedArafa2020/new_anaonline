@extends('front_end.layouts.app')
@section('page-title')
{{ __('Article Page') }}
@endsection
@section('content')
@include('front_end.sections.partision.header_section')
@foreach ($blogs as $blog)
<section class="blog-page-banner common-banner-section"
    style="background-image: url({{ get_file( $page_json->article_page->section->image->image ?? 'themes/' . $currentTheme . '/assets/images/blog-page-banner.jpg', $currentTheme)}})">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="common-banner-content">
                    <ul class="blog-cat">
                        <li class="active"><a href="#">{{__('Featured')}}</a></li>
                        <li>
                            <a href="#"><b>{{__('Category:')}}</b>{{$blog->category->name}}</a>
                        </li>
                        <li>
                            <a href="#"><b>{{__('Date:')}}</b> {{$blog->created_at->format('d M, Y ')}}</a>
                        </li>
                    </ul>
                    <div class="section-title">
                        <h2>{{$blog->title}}</h2>
                    </div>
                    <a href="{{route('page.blog',$slug)}}" class="btn" tabindex="0">
                    {!! $page_json->article_page->section->button->text ?? __('Read more') !!}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="article-section padding-bottom padding-top">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="about-user d-flex align-items-center">
                    <div class="abt-user-img">
                        <img src="{{ get_file('themes/'.$currentTheme.'/assets/images/john.png') }}">
                    </div>
                    <h6>
                        <span>{{ $blog->store->user->name ?? 'John Doe' }},</span>
                        {{__('company.com')}}
                    </h6>
                    <div class="post-lbl"><b>{{ __('Category:')}}</b>{{$blog->category->name}}</div>
                    <div class="post-lbl"><b>{{ __('Date:')}}</b> {{$blog->created_at->format('d M, Y ')}}</div>
                </div>

            </div>
            <div class="col-md-8 col-12">
                <div class="aticleleftbar">
                    <h5>
                        {{$blog->description}}
                    </h5>
                    <p>
                        {!! html_entity_decode($blog->content) !!}
                    </p>
                    <div class="art-auther">
                        <b>{{ $blog->store->user->name ?? 'John Doe' }}</b>, <a href="company.com">{{ __('company.com')}}</a>
                    </div>
                    <div class="art-auther">
                        <b>{{__('Tags:')}}</b> {{$blog->category->name}}
                    </div>
                    <ul class="article-socials d-flex align-items-center">
                        <li><span>{{__('Share:')}}</span></li>

                        @for ($i = 0; $i < $section->footer->section->footer_link->loop_number ?? 1; $i++)
                            <li>
                                <a href="{!!$section->footer->section->footer_link->social_link->{$i} ?? '#' !!}">
                                    <img src="{{ get_file($section->footer->section->footer_link->social_icon->{$i}->image ?? 'themes/' . $currentTheme . '/assets/images/youtube.svg', $currentTheme) }}"
                                        style=" margin-bottom: 0px; width: 61%;">
                                </a>
                            </li>
                            @endfor
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="articlerightbar">
                    <div class="section-title">
                        <h2>{{ $page_json->article_page->section->related_title->text ?? __('Related articles')}}</h2>
                    </div>
                    <div class="row blog-grid">
                        @foreach ($datas->take(2) as $data)
                        <div class="col-md-12 col-sm-6 col-12 blog-widget">
                            <div class="blog-card">
                                <div class="blog-card-inner">
                                    <div class="blog-card-image">
                                        <a href="{{route('page.article',[$slug,$data->id])}}">
                                            <img src="{{ get_file($data->cover_image_path, $currentTheme) }}" class="default-img">
                                        </a>
                                    </div>
                                    <div class="blog-card-content">
                                        <span class="sub-title">{{$blog->category->name}}</span>
                                        <div class="section-title">
                                            <h3>
                                                <a class="title"
                                                    href="{{route('page.article',[$slug,$data->id])}}">{{$data->title}}
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="description">
                                            {{$data->short_description}}
                                        </p>
                                        <div class="blog-card-bottom">
                                            <a href="{{route('page.article',[$slug,$data->id])}}" class=" btn">
                                                {{ $page_json->article_page->section->related_button->text ?? __('Read more')}}
                                                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8"
                                                    viewBox="0 0 8 8" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M0.18164 3.99989C0.181641 3.82416 0.324095 3.68171 0.499822 3.68171L6.73168 3.68171L4.72946 1.67942C4.60521 1.55516 4.60521 1.3537 4.72947 1.22944C4.85373 1.10519 5.05519 1.10519 5.17945 1.22945L7.72482 3.7749C7.84907 3.89916 7.84907 4.10062 7.72482 4.22487L5.17945 6.77033C5.05519 6.89459 4.85373 6.89459 4.72947 6.77034C4.60521 6.64608 4.60521 6.44462 4.72946 6.32036L6.73168 4.31807L0.499822 4.31807C0.324095 4.31807 0.181641 4.17562 0.18164 3.99989Z"
                                                        fill="white" />
                                                </svg>
                                            </a>
                                            <span class="date">
                                                {{$blog->created_at->format('d M, Y ')}} <br>
                                                <a href="#">
                                                    @john
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<hr class="article-line">

@endforeach
<section class="blog-grid-section tabs-wrapper padding-bottom padding-top">
    {!! \App\Models\Blog::ArticlePageBlog($currentTheme, $slug) !!}
</section>


@include('front_end.sections.partision.footer_section')
@endsection
