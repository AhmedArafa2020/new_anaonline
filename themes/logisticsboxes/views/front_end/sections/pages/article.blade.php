@extends('front_end.layouts.app')
@section('page-title')
{{ __('Article Page') }}
@endsection
@section('content')
@include('front_end.sections.partision.header_section')
@foreach ($blogs as $blog)
<section class="blog-page-banner common-banner-section"
style="background-image:url({{ get_file( $page_json->article_page->section->image->image ?? 'themes/' . $currentTheme . '/assets/images/blog-banner.jpg', $currentTheme)}});">
<div class="container">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="common-banner-content">
                    <ul class="blog-cat">
                        <li class="active">{{__('Featured')}}</li>
                        <li><b>{{__('Category:')}}</b>{{$blog->category->name}}</li>
                        <li><b>{{__('Date:')}}</b> {{$blog->created_at->format('d M, Y ')}}</li>
                    </ul>
                    <div class="section-title">
                        <h2>{{$blog->title}}</h2>
                    </div>
                    <p> {{$blog->description}}</p>
                    <a href="{{ route('page.blog', $slug) }}" class="btn-secondary white-btn">
                        <span class="btn-txt">{!! $page_json->article_page->section->button->text ?? __('Read more') !!}</span>
                    </a>
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
                        <img src="{{ asset('themes/'.$currentTheme.'/assets/images/john.png') }}">
                    </div>
                    <h6>
                        <span>{{ $blog->store->user->name ?? 'John Doe' }},</span>
                        {{__('company.com')}}
                    </h6>
                    <div class="post-lbl"><b>{{__('Category:')}}</b>{{$blog->category->name}}</div>
                    <div class="post-lbl"><b>{{__('Date:')}}</b> {{$blog->created_at->format('d M, Y ')}}</div>
                </div>
            </div>
            <div class="col-md-8 col-12">
                <div class="aticleleftbar">
                    <h5>{{$blog->description}}</h5>
                    <p> {!! html_entity_decode($blog->content) !!}</p>
                    {{-- <img src="assets/images/article-img.jpg" alt="article"> --}}
                    <div class="art-auther"><b>{{ $blog->store->user->name ?? 'John Doe' }}</b>, <a href="company.com">{{__('company.com')}}</a>
                    </div>

                    <div class="art-auther"><b>Tags:</b> {{$blog->category->name}}</div>
                    <ul class="article-socials d-flex align-items-center">
                        <li><span>{{__('Share:')}}</span></li>

                        @for ($i = 0; $i < $section->footer->section->footer_link->loop_number ?? 1; $i++)
                            <li>
                                <a href="{{ $section->footer->section->footer_link->social_link->{$i} ?? '#'}}"
                                    target="_blank">
                                    <img src="{{ get_file($section->footer->section->footer_link->social_icon->{$i}->image ?? 'themes/' . $currentTheme . '/assets/images/youtube.svg', $currentTheme) }}"
                                        class="{{ 'social_icon_'. $i .'_preview' }}" alt="icon">
                                </a>
                            </li>
                            @endfor

                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="articlerightbar blog-grid-section">
                    <div class="section-title">
                        <h3>{{ $page_json->article_page->section->related_title->text ?? __('Related articles')}}</h3>
                    </div>
                    @foreach ($datas as $data)
                    <div class="blog-widget">
                        <div class="blog-widget-inner">
                            <div class="blog-media">
                                <a href="{{route('page.article',[$slug,$data->id])}}">
                                    <img src="{{ get_file($data->cover_image_path, $currentTheme) }}" alt="">
                                </a>
                            </div>
                            <div class="blog-caption">
                                <div class="captio-top d-flex justify-content-between align-items-center">
                                    <span class="badge">{{$data->category->name}}</span>
                                    <span class="date">{{$data->created_at->format('d M, Y ')}}</span>
                                </div>
                                <h4>
                                    <a href="{{route('page.article',[$slug,$data->id])}}">{{$data->title}}</a>
                                </h4>
                                <p>{{$data->short_description}}</p>
                                <strong class="auth-name">@johndoe</strong>
                                <a class="btn-secondary blog-btn" href="{{route('page.article',[$slug,$data->id])}}">
                                    {{ $page_json->article_page->section->related_button->text ?? __('Read more')}}
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

@endforeach
<section class="padding-top blog-grid-section padding-bottom">
    <div class="container">
        <div class="section-title">
            <h2>{{ $page_json->article_page->section->latest_title->text ?? __('Latest Articles') }}</h2>
        </div>
        <div class="blog-slider2 post-slider">
            @foreach ($l_articles as $article)

            <div class="blog-widget">
                <div class="blog-widget-inner">
                    <div class="blog-media">
                        <a href="{{route('page.article',[$slug,$article->id])}}">
                            <img src="{{ get_file($article->cover_image_path, $currentTheme) }}" alt="">
                        </a>
                    </div>
                    <div class="blog-caption">
                        <div class="captio-top d-flex justify-content-between align-items-center">
                            <span class="badge">{{$article->category->name}}</span>
                            <span class="date"> {{$article->created_at->format('d M, Y ')}}</span>
                        </div>
                        <h4>
                            <a href="{{route('page.article',[$slug,$article->id])}}"
                                class="name">{{$article->title}}</a>
                        </h4>
                        <p class="description">{{$article->short_description}}</p>
                        <strong class="auth-name">@johndoe</strong>
                        <a class="btn-secondary blog-btn" href="{{route('page.article',[$slug,$article->id])}}">
                            {{ $page_json->article_page->section->latest_button->text ?? __('Read more')}}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@include('front_end.sections.partision.footer_section')
@endsection
