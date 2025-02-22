@extends('front_end.layouts.app')
@section('page-title')
    {{ __('Article Page') }}
@endsection
@section('content')
    @include('front_end.sections.partision.header_section')
    @foreach ($blogs as $blog)
        <section class="blog-page-banner common-banner-section"
            style="background-image:url({{ get_file($page_json->article_page->section->image->image ?? 'themes/' . $currentTheme . '/assets/images/blog-page-banner.jpg', $currentTheme) }});">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="common-banner-content">
                            <ul class="blog-cat">
                                <li class="active">{{ __('Featured') }}</li>
                                <li><b> {{ __('Category') }}: </b> {{ $blog->category->name }}</li>
                                <li><b>{{ __('Date') }}:</b> {{ $blog->created_at->format('d M,Y ') }}</li>
                            </ul>
                            <div class="article">
                                <div class="section-title">
                                    <h2>{!! $blog->title !!}</h2>
                                </div>
                                <p class="description">{!! $blog->short_description !!}</p>
                                <a href="{{ route('page.blog', $slug) }}" class="btn-secondary white-btn">
                                    <span class="btn-txt">{!! $page_json->article_page->section->button->text ?? __('Read more') !!}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="article-section padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="about-user d-flex align-items-center">
                            <div class="abt-user-img">
                                <img src="{{ asset('themes/' . $currentTheme . '/assets/images/john.png') }}">
                            </div>
                            <h6>
                                <span>{{ $blog->store->user->name ?? 'John Doe' }},</span>
                                {{ __('company.com') }}
                            </h6>
                            <div class="post-lbl"><b>{{ __('Category') }}:</b>{{ $blog->category->name }}</div>
                            <div class="post-lbl"><b>{{ __('Date') }}:</b>{{ $blog->created_at->format('d M, Y ') }}
                            </div>
                        </div>
                        {{-- <div class="section-title">
                                <h2>{!! $blog->title !!}</h2>
                            </div> --}}
                    </div>
                    <div class="col-md-8 col-12">
                        <div class="aticleleftbar">
                            {{-- <h5>{!! $blog->short_description !!}</p> --}}
                            {{-- <div class="art-auther"><b>John Doe</b>, <a href="company.com">company.com</a></div> --}}
                            <p>{!! html_entity_decode($blog->content) !!}</p>

                            <span>{{ __('Share:') }}</span>


                            <ul class="article-socials d-flex align-items-center">
                                @for ($i = 0; $i < $section->footer->section->footer_link->loop_number ?? 1; $i++)
                                    <li>
                                        <a href="{!! $section->footer->section->footer_link->social_link->{$i} ?? '#' !!}">
                                            <img src="{{ get_file($section->footer->section->footer_link->social_icon->{$i}->image ?? 'themes/' . $currentTheme . '/assets/images/youtube.svg', $currentTheme) }}"
                                                alt="twitter" viewBox="0 0 12 10" fill="none"
                                                style="margin-bottom: 0px;">
                                        </a>

                                    </li>
                                @endfor

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="articlerightbar blog-grid-section">
                            <div class="section-title">
                                <h3>{{ $page_json->article_page->section->related_title->text ?? __('Related articles') }}
                                </h3>
                            </div>
                            <div class="row blog-grid">
                                @foreach ($datas->take(2) as $data)
                                    <div class="col-md-12 col-sm-6 col-12 blog-widget">
                                        <div class="blog-card  blog-itm">
                                            <div class="blog-card-inner">
                                                <div class="blog-top">
                                                    <<<<<<< HEAD <span class="badge">{{ $blog->category->name }}</span>
                                                        <a href="{{ route('page.article', [$slug, $data]) }}"
                                                            class="img-wrapper">
                                                            =======
                                                            <span class="badge">{{ __('ARTICLES') }}</span>
                                                            <span class="badge">{{ $data->category->name }}</span>
                                                            <a href="{{ route('page.article', [$slug, $data]) }}"
                                                                class="img-wrapper">
                                                                >>>>>>> 580ec1fc4677481a9c83a92d9f96ba60e035485a
                                                                <img
                                                                    src="{{ get_file($data->cover_image_path, $currentTheme) }}">
                                                            </a>
                                                </div>
                                                <div class="blog-caption">
                                                    <div class="author-info">
                                                        <span
                                                            class="date">{{ $data->created_at->format('d M,Y ') }}</span>
                                                        <span class="auth-name">{{ $data->name }}</span>
                                                    </div>
                                                    <h4><a
                                                            href="{{ route('page.article', [$slug, $data->id]) }}">{!! $data->title !!}</a>
                                                    </h4>
                                                    <p>{{ $data->short_description }}</p>
                                                    <a class="btn blog-btn"
                                                        href="{{ route('page.article', [$slug, $data->id]) }}">
                                                        {{ $page_json->article_page->section->related_button->text ?? __('Read more') }}
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="9"
                                                            height="9" viewBox="0 0 9 9" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M8.58455 4.76994C8.79734 4.55716 8.79734 4.21216 8.58455 3.99938L5.31532 0.730146C5.10253 0.51736 4.75754 0.51736 4.54476 0.730146C4.33197 0.942931 4.33197 1.28793 4.54476 1.50071L7.4287 4.38466L4.54476 7.26861C4.33197 7.48139 4.33197 7.82639 4.54476 8.03917C4.75754 8.25196 5.10253 8.25196 5.31532 8.03917L8.58455 4.76994ZM0.956346 8.03917L4.22558 4.76994C4.43836 4.55716 4.43836 4.21216 4.22558 3.99938L0.956346 0.730146C0.74356 0.51736 0.398567 0.51736 0.185781 0.730146C-0.0270049 0.942931 -0.0270049 1.28792 0.185781 1.50071L3.06973 4.38466L0.185781 7.26861C-0.0270052 7.48139 -0.0270052 7.82639 0.185781 8.03917C0.398566 8.25196 0.74356 8.25196 0.956346 8.03917Z"
                                                                fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
        </section>




        <section class="home-blog-section blog-page">
            <div class="container">
                <div class="section-title">
                    <h2>{{ $page_json->article_page->section->latest_title->text ?? __('Latest Articles') }}</h2>
                </div>
                <div class=" blog-slider-main-blog-page flex-slider">
                    @foreach ($l_articles as $blog)
                        <div class="blog-card card">
                            <div class="blog-card-inner card-inner">
                                <div class="blog-top">
                                    <span class="badge">{{ $blog->category->name }}</span>
                                    <a href="{{ route('page.article', [$slug, $blog->id]) }}" class="img-wrapper">
                                        <img src="{{ get_file($blog->cover_image_path, $currentTheme) }}">
                                    </a>
                                </div>
                                <div class="blog-caption">
                                    <div class="author-info">
                                        <span class="date">{{ $blog->created_at->format('d M,Y ') }}</span>
                                        <span class="auth-name">{{ $blog->name }}</span>
                                    </div>
                                    <h3><a
                                            href="{{ route('page.article', [$slug, $blog->id]) }}">{!! $blog->title !!}</a>
                                    </h3>
                                    <p class="description">{{ $blog->short_description }}</p>
                                    <a class="btn blog-btn" href="{{ route('page.article', [$slug, $blog->id]) }}">
                                        {{ $page_json->article_page->section->latest_button->text ?? __('Read More') }}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9"
                                            viewBox="0 0 9 9" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.58455 4.76994C8.79734 4.55716 8.79734 4.21216 8.58455 3.99938L5.31532 0.730146C5.10253 0.51736 4.75754 0.51736 4.54476 0.730146C4.33197 0.942931 4.33197 1.28793 4.54476 1.50071L7.4287 4.38466L4.54476 7.26861C4.33197 7.48139 4.33197 7.82639 4.54476 8.03917C4.75754 8.25196 5.10253 8.25196 5.31532 8.03917L8.58455 4.76994ZM0.956346 8.03917L4.22558 4.76994C4.43836 4.55716 4.43836 4.21216 4.22558 3.99938L0.956346 0.730146C0.74356 0.51736 0.398567 0.51736 0.185781 0.730146C-0.0270049 0.942931 -0.0270049 1.28792 0.185781 1.50071L3.06973 4.38466L0.185781 7.26861C-0.0270052 7.48139 -0.0270052 7.82639 0.185781 8.03917C0.398566 8.25196 0.74356 8.25196 0.956346 8.03917Z"
                                                fill="white"></path>
                                        </svg>
                                    </a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach
    @include('front_end.sections.partision.footer_section')
@endsection
