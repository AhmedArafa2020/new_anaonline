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
                        <li class="active"><a href="#">{{__('Featured')}}</a></li>
                        <li><a href="#"><b>{{__('Category:')}}</b>{{$blog->category->name}}</a></li>
                        <li><a href="#"><b>{{__('Date:')}}</b> {{$blog->created_at->format('d M, Y ')}}</a></li>
                    </ul>
                    <div class="section-title">
                        <h2>{{$blog->title}}</h2>
                    </div>
                    <p>{{$blog->short_description}}</p>
                    <a href="{{route('page.blog',$slug)}}" class="btn">
                        <span class="btn-txt">{{ $page_json->article_page->section->button->text ?? __('BACK TO CATEGORY') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="article-section padding-top padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="about-user d-flex align-items-center">
                    <div class="abt-user-img">
                        <img src="{{ asset('themes/' . $currentTheme . '/assets/images/john.png')}}">
                    </div>
                    <h6><span>{{ $blog->store->user->name ?? 'John Doe' }},</span>
                        {{ __('company.com') }}
                    </h6>
                    <div class="post-lbl"><b> {{ __('Category:')}} </b> {{$blog->category->name}}</div>
                    <div class="post-lbl"><b> {{ __('Date:')}} </b> {{$blog->created_at->format('d M, Y ')}}</div>
                </div>
                {{-- <div class="section-title">
                                <h2>Article title first with light weight</h2>
                            </div> --}}
            </div>
            <div class="col-md-8 col-12">
                <div class="aticleleftbar">
                    {!! html_entity_decode($blog->content) !!}
                    <div class="art-auther"><b> {{ __('Tags:')}} </b>{{$blog->category->name}}</div>
                    <ul class="article-socials d-flex align-items-center">
                        <li><span>{{ __('Share:')}}</span></li>
                        @for($i=0 ; $i < $section->footer->section->footer_link->loop_number ?? 1;$i++)
                            <li>
                                <a href="{{ $section->footer->section->footer_link->social_link->{$i} ?? '#'}}"
                                    target="_blank">
                                    <img src="{{ get_file($section->footer->section->footer_link->social_icon->{$i}->image ?? 'themes/' . $currentTheme . '/assets/images/youtube.svg', $currentTheme) }}"
                                        alt=" icon">
                                </a>
                            </li>
                            @endfor
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="articlerightbar">
                    <div class="section-title">
                        <h3>{{$page_json->article_page->section->related_title->text ?? __('Related articles')}}</h3>
                    </div>
                    @foreach ($datas->take(2) as $data)
                    <div class="blog-itm">
                        <div class="blog-widget-inner">
                            <div class="blog-media">
                                <a href="{{route('page.article',[$slug,$data->id])}}">
                                    <img src="{{ get_file($data->cover_image_path, $currentTheme) }}" alt="blog">
                                </a>
                            </div>
                            <div class="blog-caption">
                                <div class="blog-lbl-row d-flex justify-content-between">
                                    <div class="blog-labl">
                                        {{$blog->category->name}}
                                    </div>
                                    <div class="blog-labl">
                                        {{$blog->created_at->format('d M,Y ')}}
                                    </div>
                                </div>
                                <h4>
                                    <a href="{{route('page.article',[$slug,$data->id])}}">{{$data->title}}</a>
                                </h4>
                                <p>{{$data->short_description}}</p>
                                <a href="{{route('page.article',[$slug,$data->id])}}" class="link-btn dark-link-btn"
                                    tabindex="0">
                                    {{ $page_json->article_page->section->related_button->text ?? __('Read More') }}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="10" viewBox="0 0 4 6"
                                        fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.65976 0.662719C0.446746 0.879677 0.446746 1.23143 0.65976 1.44839L2.18316 3L0.65976 4.55161C0.446747 4.76856 0.446747 5.12032 0.65976 5.33728C0.872773 5.55424 1.21814 5.55424 1.43115 5.33728L3.34024 3.39284C3.55325 3.17588 3.55325 2.82412 3.34024 2.60716L1.43115 0.662719C1.21814 0.445761 0.872773 0.445761 0.65976 0.662719Z"
                                            fill=""></path>
                                    </svg>
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
 @include('front_end.sections.homepage.blog_section')
@include('front_end.sections.partision.footer_section')
@endsection
