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
                        <li><b> {{__('Category')}}: </b> {{ $blog->category->name }}</li>
                        <li><b>{{__('Date')}}:</b> {{ $blog->created_at->format('d M,Y ') }}</li>
                    </ul>
                    <div class="section-title">
                        <h2>{!! $blog->title !!}</h2>
                    </div>
                    <p class="description">{!!$blog->short_description!!}</p>
                    <a href="{{ route('page.blog', $slug) }}" class="btn-secondary white-btn">
                        <span class="btn-txt">{!! $page_json->article_page->section->button->text ?? __('View Blog') !!}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="article-section article-page padding-top padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="about-user d-flex align-items-center">
                    <div class="abt-user-img">
                        <img src="{{asset('themes/'.$currentTheme.'/assets/images/john.png')}}">
                    </div>
                    <h6>
                        <span>{{ $blog->store->user->name ?? 'John Doe' }},</span>
                        {{__('company.com')}}
                    </h6>
                    <div class="post-lbl"><b>{{__('Category')}}:</b>{{$blog->category->name}}</div>
                    <div class="post-lbl"><b>{{__('Date')}}:</b>{{$blog->created_at->format('d M, Y ')}}</div>
                </div>
                {{-- <div class="section-title">
                            <h2>{!! $blog->title !!}</h2>
                        </div> --}}
            </div>
            <div class="col-md-8 col-12">
                <div class="aticleleftbar">
                    {{-- <h5 class="">{!! $blog->short_description !!}</h5> --}}

                    <p>{!! html_entity_decode($blog->content) !!}</p>

                    <div class="art-auther"><b>{{ $blog->store->user->name ?? 'John Doe' }}</b>, <a href="company.com">{{__('company.com')}}</a></div>

                    <div class="art-auther"><b>{{ __('Tags:')}}</b> {{$blog->category->name}}</div>
                    <ul class="article-socials d-flex align-items-center">
                        <li><span>{{__('Share:')}}</span></li>

                        @for ($i = 0; $i < $section->footer->section->footer_link->loop_number ?? 1; $i++)
                            <li>
                                <a href="{{ $section->footer->section->footer_link->social_link->{$i} ?? '#'}}"
                                    target="_blank">
                                    <img src="{{ get_file($section->footer->section->footer_link->social_icon->{$i}->image ?? 'themes/' . $currentTheme . '/assets/images/youtube.svg', $currentTheme) }}"
                                        class="{{ 'social_icon_'. $i .'_preview' }}" alt="icon"
                                        style="margin-bottom: inherit;">
                                </a>
                            </li>
                            @endfor
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="articlerightbar blog-section blog-grid-section">
                    <div class="section-title">
                        <h3>{{ $page_json->article_page->section->related_title->text ?? __('Related articles')}}</h3>
                    </div>
                    <div class="row blog-grid">
                        @foreach ($datas as $data)
                        <div class="col-md-12 col-sm-6 col-12 blog-itm">
                            <div class="blog-card-itm-inner">
                                <div class="blog-card-image">
                                    <a href="{{route('page.article',[$slug,$data->id])}}" tabindex="0">
                                        <img src="{{ get_file($data->cover_image_path, $currentTheme) }}">
                                    </a>
                                    <div class="tip-lable">
                                        <div class="live">{{$data->category->name}}</div>
                                    </div>
                                    <div class="tip-lable">
                                        <div class="blog-bagde">{{$data->created_at->format('d M,Y ')}}</div>
                                    </div>
                                </div>
                                <div class="blog-card-content">
                                    <div class="blog-card-heading-detail">
                                        <span>{{ __('@') }}{{ $blog->store->user->name ?? 'John Doe' }}</span>
                                    </div>
                                    <h3>
                                        <a href="{{route('page.article',[$slug,$data->id])}}" tabindex="0"
                                            class="description">{{$data->title}}
                                        </a>
                                    </h3>
                                    <p class="description">{{$data->short_description}}</p>
                                    <div class="blog-card-bottom">
                                        <a href="{{route('page.article',[$slug,$data->id])}}" class="btn">
                                            {{ $page_json->article_page->section->related_button->text ?? __('View Blog')}}
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
    </div>
</section>

@endforeach
<section class="blog-section padding-bottom">
    <div class="container">
    <div class="section-title d-flex align-items-center justify-content-between">
                    <div class="section-title-left">
                        <h2>{{ $page_json->article_page->section->latest_title->text ?? __('Latest Blogs')}}</h2>
                    </div>
                    <a href="{{route('page.blog',$slug)}}" class="btn">
                        {{ $page_json->blog_page->section->button->text ?? __('View Blog') }}
                    </a>
                </div>

                <div class="blog-slider">
                    @foreach ($l_articles as $blog)

                        <div class="blog-card-itm">
                            <div class="blog-card-itm-inner">
                                <div class="blog-card-image">
                                    <a href="{{route('page.article',[$slug,$blog->id])}}" tabindex="0">
                                        <img src="{{ get_file($blog->cover_image_path, $currentTheme) }}" class="default-img">
                                    </a>
                                    <div class="tip-lable">
                                        <div class="live">{{$blog->category->name}}</div>
                                    </div>
                                    <div class="tip-lable">
                                        <div class="blog-bagde">{{ $blog->created_at->format('d M,Y ') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-card-content">
                                    <div class="blog-card-heading-detail">
                                        <span>{{ __('@') }}{{ $blog->store->user->name ?? 'John Doe' }}</span>
                                    </div>
                                    <h3>
                                        <a href="{{route('page.article',[$slug,$blog->id])}}" tabindex="0" class="description">
                                            {!! $blog->title !!}
                                        </a>
                                    </h3>
                                    <p class="description">{!! $blog->short_description !!}</p>
                                    <div class="blog-card-bottom">
                                        <a href="{{route('page.article',[$slug,$blog->id])}}" class="btn">
                                            {{ $page_json->article_page->section->latest_button->text ?? __('View Blog')}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
    </div>
</section>
@include('front_end.sections.partision.footer_section')
@endsection
