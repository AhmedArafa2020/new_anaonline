@extends('front_end.layouts.app')
@section('page-title')
{{ __('Article Page') }}
@endsection
@section('content')
@include('front_end.sections.partision.header_section')
@foreach ($blogs as $blog)
<section class="blog-page-banner common-banner-section"
    style="background-image:url({{ get_file( $page_json->article_page->section->image->image ?? 'themes/' . $currentTheme . '/assets/images/blog-page-banner.jpg', $currentTheme)}});">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="common-banner-content">
                    <ul class="blog-cat">
                        <li class="active"><a href="#"> {{ __('Featured')}} </a></li>
                        <li><a href="#"><b> {{ __('Category:')}} </b> {{$blog->category->name}}</a></li>
                        <li><a href="#"><b> {{ __('Date:')}} </b> {{$blog->created_at->format('d M, Y ')}}</a></li>
                    </ul>
                    <div class="section-title">
                        <h3>{{$blog->title}}</h3>
                    </div>
                    <p>{{$blog->short_description}}</p>
                    <a href="{{ route('page.blog', $slug) }}" class="btn-secondary white-btn" tabindex="0">
                        {{ $page_json->article_page->section->button->text ?? __('Go to Article')}}
                        <svg viewBox="0 0 10 5">
                            <path
                                d="M2.37755e-08 2.57132C-3.38931e-06 2.7911 0.178166 2.96928 0.397953 2.96928L8.17233 2.9694L7.23718 3.87785C7.07954 4.031 7.07589 4.28295 7.22903 4.44059C7.38218 4.59824 7.63413 4.60189 7.79177 4.44874L9.43039 2.85691C9.50753 2.78197 9.55105 2.679 9.55105 2.57146C9.55105 2.46392 9.50753 2.36095 9.43039 2.28602L7.79177 0.69418C7.63413 0.541034 7.38218 0.544682 7.22903 0.702329C7.07589 0.859976 7.07954 1.11192 7.23718 1.26507L8.1723 2.17349L0.397965 2.17336C0.178179 2.17336 3.46059e-06 2.35153 2.37755e-08 2.57132Z">
                            </path>
                        </svg>
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
                        <img src="{{asset('themes/'.$currentTheme.'/assets/images/john.png')}}" />
                    </div>
                    <h6>
                        <span>{{ $blog->store->user->name ?? 'John Doe' }},</span>
                        {{__('company.com')}}
                    </h6>
                    <div class="post-lbl"><b> {{ __('Category:')}} </b> {{$blog->category->name}}</div>
                    <div class="post-lbl"><b> {{ __('Date:')}} </b> {{$blog->created_at->format('d M, Y ')}}</div>
                </div>
                {{-- <div class="section-title">
                       <h2>{{$blog->title}}</h2>
            </div> --}}
        </div>
        <div class="col-md-8 col-12">
            <div class="aticleleftbar">
                {!! html_entity_decode($blog->content) !!}
                <div class="art-auther">
                    <div class="art-auther"><b>{{__('Tags:')}} </b> {{$blog->category->name}}</div>
                </div>
                <ul class="article-socials d-flex align-items-center">
                    <li><span>{{__('Share:') }}</span></li>

                     @for ($i = 0; $i < $section->footer->section->footer_link->loop_number ?? 1; $i++)
                                <li>
                                    <a href="{{ $section->footer->section->footer_link->social_link->{$i} ?? '#'}}"
                                        target="_blank" id="social_link_{{ $i }}">
                                        <img src="{{ get_file($section->footer->section->footer_link->social_icon->{$i}->image ?? 'themes/' . $currentTheme . '/assets/images/youtube.svg', $currentTheme) }}"
                                            class="{{ 'social_icon_'. $i .'_preview' }}" alt="icon"
                                            id="social_icon_{{ $i }}">
                                    </a>
                                </li>
                    @endfor
                </ul>
            </div>
        </div>
        <div class="col-md-4 col-12 blog-section blog-itm">
            <div class="articlerightbar">
                <div class="section-title">
                    <h2>{{ $page_json->article_page->section->related_title->text ?? __('Related articles')}}</h2>
                </div>
                <div class="blog-grid">
                    @foreach ($datas->take(2) as $data)
                        <div class="blog-card-itm">
                            <div class="blog-card-itm-inner">
                                <div class="blog-card-image">
                                    <div class="tip-lable">
                                    <span>{{$blog->category->name}}</span>

                                    </div>
                                    <a href="{{route('page.article',[$slug,$data->id])}}">
                                        <img src="{{ get_file($data->cover_image_path, $currentTheme) }}" class="default-img">
                                    </a>
                                </div>
                                <div class="blog-card-content">
                                <div class="blog-card-heading-detail">
                                        <span>{{__('AUTHOR')}}: {{$blog->store->user->name ?? __('JOHN DOE')}}</span>
                                        <span>{{__('DATE:')}} {{$blog->created_at->format('d M,Y ')}}</span>
                                    </div>
                                    <h4>
                                        <a href="{{route('page.article',[$slug,$data->id])}}">
                                            {{$data->title}}
                                        </a>
                                    </h4>
                                    <p>{{$data->short_description}}</p>

                                    <div class="blog-card-bottom">
                                    <a href="{{route('page.article',[$slug,$data->id])}}" class=" btn">
                                        {{ $page_json->article_page->section->related_button->text ?? __('Read more')}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="8" viewBox="0 0 11 8"
                                            fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M6.92546 0.237956C6.69464 0.00714337 6.32042 0.00714327 6.08961 0.237955C5.8588 0.468767 5.8588 0.842988 6.08961 1.0738L9.01507 3.99926L6.08961 6.92471C5.8588 7.15552 5.8588 7.52974 6.08961 7.76055C6.32042 7.99137 6.69464 7.99137 6.92545 7.76055L10.2688 4.41718C10.4996 4.18636 10.4996 3.81214 10.2688 3.58133L6.92546 0.237956ZM1.91039 0.237955C1.67958 0.00714327 1.30536 0.00714337 1.07454 0.237956C0.843732 0.468768 0.843733 0.842988 1.07454 1.0738L4 3.99925L1.07454 6.92471C0.843732 7.15552 0.843733 7.52974 1.07455 7.76055C1.30536 7.99137 1.67958 7.99137 1.91039 7.76055L5.25377 4.41718C5.48458 4.18637 5.48458 3.81214 5.25377 3.58133L1.91039 0.237955Z"
                                                fill="white" />
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
    </div>
</section>
@endforeach
<section class="blog-section article-page padding-bottom">
        <div class="container">
            <div class="section-title">
                <span>
                    {!!$page_json->article_page->section->section_sub_title->text ?? __('From our blog') !!}
                </span>
            </div>
            <div class="about-card-slider">
                @foreach ($l_articles as $article)

                <div class="blog-card-itm">
                    <div class="blog-card-itm-inner">
                        <div class="blog-card-image">
                            <a href="{{route('page.article',[$slug,$article->id])}}" tabindex="0">
                                <img src="{{ get_file($article->cover_image_path, $currentTheme) }}" class="default-img">
                            </a>
                            <div class="tip-lable">
                                <span>{{$blog->category->name}}</span>
                            </div>
                        </div>
                        <div class="blog-card-content">
                            <div class="blog-card-heading-detail">
                                <span>{{ date("d M Y", strtotime($article->created_at))}}</span>
                            </div>
                            <h4>
                                <a href="{{route('page.article',[$slug,$article->id])}}" tabindex="0">
                                    {{ $article->title }}
                                </a>
                            </h4>
                            <p>
                                {{ $article->short_description }}
                            </p>
                            <div class="blog-card-bottom">
                                <a href="{{route('page.article',[$slug,$article->id])}}" class="btn" tabindex="0">
                                    {{ $page_json->blog_page->section->section_sub_button->text ??__('Read More') }}
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
