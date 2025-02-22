@extends('front_end.layouts.app')
@section('page-title')
{{ __('Article Page') }}
@endsection
@section('content')
@include('front_end.sections.partision.header_section')
@foreach ($blogs as $blog)

<section class="blog-page-banner article-banner common-banner-section" style="background-image:url({{ get_file( $page_json->article_page->section->image->image ?? 'themes/' . $currentTheme . '/assets/images/blog-page-banner.jpg', $currentTheme)}});">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-8 col-12">
                <div class="common-banner-content">
                    <a href="{{route('page.blog',$slug)}}" class="back-btn">
                        <span class="svg-ic">
                            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31"
                                fill="none">
                                <circle cx="15.5" cy="15.5" r="15.0441" stroke="white" stroke-width="0.911765"></circle>
                                <g clip-path="url(#clip0_318_284)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M20.5867 15.7639C20.5867 15.9859 20.4067 16.1658 20.1848 16.1658L12.3333 16.1659L13.2777 17.0834C13.4369 17.2381 13.4406 17.4925 13.2859 17.6517C13.1313 17.8109 12.8768 17.8146 12.7176 17.66L11.0627 16.0523C10.9848 15.9766 10.9409 15.8727 10.9409 15.7641C10.9409 15.6554 10.9848 15.5515 11.0627 15.4758L12.7176 13.8681C12.8768 13.7135 13.1313 13.7172 13.2859 13.8764C13.4406 14.0356 13.4369 14.29 13.2777 14.4447L12.3333 15.3621L20.1848 15.362C20.4067 15.362 20.5867 15.5419 20.5867 15.7639Z"
                                        fill="white"></path>
                                </g>
                            </svg>
                        </span>
                        {{ $page_json->article_page->section->button->text ??__('Back to Home')}}
                    </a>
                    <ul class="blog-cat">
                        <li class="active"><a href="#">{{ __('Featured') }}</a></li>
                        <li><b>{{ __('Category:') }}</b> {{$blog->category->name}}</li>
                        <li><b>{{ __('Date:') }} </b> {{$blog->created_at->format('d M, Y ')}}</li>
                    </ul>
                    <div class="section-title">
                        <h2>{!! $blog->title !!}</h2>
                    </div>
                    <p class="description">{!!$blog->short_description!!}</p>
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
                        <img src="{{asset('themes/'.$currentTheme.'/assets/img/john.png')}}" />
                    </div>
                    <h6><span>{{ $blog->store->user->name ?? 'John Doe' }},</span> {{ __('company.com') }}</h6>
                    <div class="post-lbl"><b>{{__('Category')}}:</b> {{$blog->category->name}}</div>
                    <div class="post-lbl"><b>Date:</b> {{$blog->created_at->format('d M, Y ')}}</div>
                </div>
            </div>
            <div class="col-md-8 col-12">
                <div class="aticleleftbar">
                    <p>
                        {!! $blog->content !!}
                    </p>
                    <div class="art-auther">
                        <b>{{ __('Tags:') }} </b> {{ $blog->category->name}}
                    </div>
                    <ul class="header-list-social">
                        @for ($i = 0; $i < $section->footer->section->footer_link->loop_number ?? 1; $i++)
                            <li>
                                <a href="{{ $section->footer->section->footer_link->social_link->{$i} ?? '#'}}" target="_blank">
                                    <img src="{{ get_file($section->footer->section->footer_link->social_icon->{$i}->image ?? 'themes/' . $currentTheme . '/assets/images/youtube.svg', $currentTheme) }}" class="{{ 'social_icon_'. $i .'_preview' }}" alt="icon">
                                </a>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="articlerightbar">
                    <div class="section-title">
                        <h3>{{$page_json->article_page->section->related_title->text ?? __('Related Articles')}}</h3>
                    </div>
                    @foreach ($datas as $data)
                        <div class="row blog-grid">
                            <div class="col-md-12 col-sm-6 col-12 blog-widget">
                                <div class="blog-card">
                                    <div class="blog-card-image">
                                        <a href="{{route('page.article',[$slug,$data->id])}}">
                                            <img src="{{ get_file($data->cover_image_path, $currentTheme) }}" class="default-img" />
                                        </a>
                                    </div>
                                    <div class="blog-card-content">
                                        <span>{{$data->category->name}}</span>
                                        <h3>
                                            <a href="{{route('page.article',[$slug,$data->id])}}">
                                                {{$data->title}}
                                            </a>
                                        </h3>
                                        <p>
                                            {{$data->short_description}}
                                        </p>
                                        <div class="blog-card-bottom">
                                            <a href="{{route('page.article',[$slug,$data->id])}}" class="btn">
                                                {{ $page_json->article_page->section->related_button->text ?? __('Read More') }}
                                            </a>
                                            <span class="date">
                                                {{$data->created_at->format('d M, Y ')}}<br />
                                                <a href="#">{{ $blog->store->user->name ?? 'John Doe' }}</a>
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
</section>
@endforeach
@include('front_end.sections.homepage.blog_section')
@include('front_end.sections.partision.footer_section')
@endsection