@extends('front_end.layouts.app')
@section('page-title')
    {{ __('Blog Page') }}
@endsection
@section('content')
    @include('front_end.sections.partision.header_section')
    <section class="blog-page-banner common-banner-section"
            style="background-image:url({{ get_file( $page_json->blog_page->section->image->image ?? 'themes/' . $currentTheme . '/assets/images/blog-page-banner.jpg', $currentTheme)}});">

            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="common-banner-content">
                            <ul class="blog-cat">
                                <li class="active">{{ __('Featured') }}</li>
                            </ul>
                            <div class="section-title">
                                <h2> {{ $page_json->blog_page->section->title->text ?? __('Blog & Articles') }}</h2>
                                <p> {{ $page_json->blog_page->section->description->text ?? __('The blog and article section serves as a treasure trove of valuable information.') }} </p>
                                    <a href="{{ route('landing_page',$slug) }}" class="btn-secondary">
                                        <span class="btn-txt"> {{ $page_json->blog_page->section->button->text ?? __('Go to Articles') }}</span>
                                        <span class="btn-ic">
                                            <svg viewBox="0 0 10 5">
                                                <path
                                                    d="M2.37755e-08 2.57132C-3.38931e-06 2.7911 0.178166 2.96928 0.397953 2.96928L8.17233 2.9694L7.23718 3.87785C7.07954 4.031 7.07589 4.28295 7.22903 4.44059C7.38218 4.59824 7.63413 4.60189 7.79177 4.44874L9.43039 2.85691C9.50753 2.78197 9.55105 2.679 9.55105 2.57146C9.55105 2.46392 9.50753 2.36095 9.43039 2.28602L7.79177 0.69418C7.63413 0.541034 7.38218 0.544682 7.22903 0.702329C7.07589 0.859976 7.07954 1.11192 7.23718 1.26507L8.1723 2.17349L0.397965 2.17336C0.178179 2.17336 3.46059e-06 2.35153 2.37755e-08 2.57132Z">
                                                </path>
                                            </svg>
                                        </span>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <section class="blog-grid-section blog-section padding-top padding-bottom tabs-wrapper">
            <div class="container">
                <div class="blog-page-header">
                    <div class="section-title">
                        <div class="subtitle">{{ $page_json->blog_page->section->section_title->text ?? __('All Products') }}</div>
                        <h2>{!!$page_json->blog_page->section->section_sub_title->text ??__('From our blog') !!}</h2>
                    </div>
                    {{-- <button class="btn continue-btn" type="submit">
                    {{ __('Continue') }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="14" viewBox="0 0 35 14" fill="none">
                        <path d="M25.0749 14L35 7L25.0805 0L29.12 6.06667H0V7.93333H29.12L25.0749 14Z"></path>
                    </svg>
                </button> --}}
                </div>
                <div class="blog-head-row d-flex justify-content-between">
                    <div class="blog-col-left">
                        <ul class="d-flex tabs">
                            @foreach ($BlogCategory as $cat_key => $category)
                                <li class="tab-link on-tab-click {{ $cat_key == 0 ? 'active' : '' }}"
                                    data-tab="{{ $cat_key }}">
                                    <a href="javascript:;">{{ $category }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="blog-col-right d-flex align-items-center justify-content-end">
                        <span class="select-lbl"> {{ __('Sort by') }} </span>
                        <select class="position">
                            <option value="lastest"> {{ __('Lastest') }} </option>
                            <option value="new"> {{ __('new') }} </option>
                        </select>
                    </div>
                </div>
                <div class="tabs-container">
                    @foreach ($BlogCategory as $cat_k => $category)
                        <div id="{{ $cat_k }}" class="tab-content {{ $cat_k == 0 ? 'active' : '' }}">
                            <div class="blog-grid-row row f_blog">
                                @foreach ($blogs as $blog)
                                    @if ($cat_k == '0' || $blog->category_id == $cat_k)

                                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 blog-itm">
                                            <div class="blog-card-itm">
                                                <div class="blog-card-itm-inner">
                                                    <div class="blog-card-image">
                                                        <a href="{{ route('page.article', [$slug,$blog->id]) }}" tabindex="0">
                                                            <img src="{{ get_file($blog->cover_image_path, $currentTheme) }}"
                                                                class="default-img">
                                                        </a>
                                                        <div class="tip-lable">
                                                        </div>
                                                    </div>
                                                    <div class="blog-card-content">
                                                        <div class="blog-card-heading-detail">
                                                            <span>{{ $blog->created_at->format('d M,Y ') }}</span>
                                                        </div>
                                                        <h4>
                                                            <a href="{{ route('page.article', [$slug,$blog->id]) }}" tabindex="0">
                                                                {{ $blog->title }}
                                                            </a>
                                                        </h4>
                                                        <p class="long_sting_to_dots">
                                                            {{ $blog->short_description }}
                                                        </p>
                                                        <div class="blog-card-bottom">
                                                            <a href="{{ route('page.article', [$slug,$blog->id]) }}" class="btn"
                                                                tabindex="0">
                                                                {!! $page_json->blog_page->section->section_sub_button->text ?? __('Read more') !!}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @include('front_end.sections.partision.footer_section')
@endsection

