@extends('front_end.layouts.app')
@section('page-title')
    {{ __('Blog Page') }}
@endsection
@section('content')
    @include('front_end.sections.partision.header_section')
    <section class="blog-page-banner common-banner-section"
    style="background-image:url({{ get_file( $page_json->blog_page->section->image->image ?? 'themes/' . $currentTheme . '/assets/images/blog-banner.jpg', $currentTheme)}});">
    <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="common-banner-content">
                        <ul class="blog-cat">
                            <li class="active">{{ __('Featured')}} </li>
                        </ul>
                        <div class="section-title">
                            <h2>{{  $page_json->blog_page->section->title->text ??  __('Blog & Articles') }}</h2>
                        </div>
                        <p>{{  $page_json->blog_page->section->description->text ??  __('The blog and article section serves as a treasure trove of valuable information.') }}</p>
                        <a href="{{route('landing_page',$slug) }}" class="btn">
                            <span class="btn-txt">{{ $page_json->blog_page->section->button->text ?? __('Read More') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-grid-section padding-top tabs-wrapper">
        <div class="container">
            <div class="section-title">
                <div class="subtitle">{{ $page_json->blog_page->section->section_title->text ?? __('All Blogs') }}</div>
                <h2>{!!$page_json->blog_page->section->section_sub_title->text ?? __('From  our blog') !!}</h2>
            </div>
            <div class="blog-head-row d-flex justify-content-between">
                <div class="blog-col-left">
                    <ul class="d-flex tabs">
                        @foreach ($BlogCategory as $cat_key =>  $category)
                            <li class="tab-link on-tab-click {{$cat_key == 0 ? 'active' : ''}}" data-tab="{{ $cat_key }}">
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
                    <div id="{{ $cat_k }}" class="tab-content tab-cat-id {{$cat_k == 0 ? 'active' : ''}}">
                        <div class="blog-grid-row row f_blog">
                            @foreach ($blogs as $blog)
                                @if($cat_k == '0' ||  $blog->category_id == $cat_k)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 blog-itm">
                                        <div class="blog-widget-inner">
                                            <div class="blog-media">
                                                <a href="{{route('page.article',[$slug,$blog->id])}}">

                                                    <img src="{{ get_file($blog->cover_image_path, $currentTheme) }}" alt="" width="120" class="cover_img{{ $blog->id }}" alt="blog">
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
                                                    <a href="{{route('page.article',[$slug,$blog->id])}}">{{$blog->title}}</a>
                                                </h4>
                                                <p>{{$blog->short_description}}</p>
                                                <a href="{{route('page.article',[$slug,$blog->id])}}" class="link-btn dark-link-btn" tabindex="0">
                                                    {{ $page_json->blog_page->section->section_sub_button->text ??__('Show More') }}
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="10" viewBox="0 0 4 6" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.65976 0.662719C0.446746 0.879677 0.446746 1.23143 0.65976 1.44839L2.18316 3L0.65976 4.55161C0.446747 4.76856 0.446747 5.12032 0.65976 5.33728C0.872773 5.55424 1.21814 5.55424 1.43115 5.33728L3.34024 3.39284C3.55325 3.17588 3.55325 2.82412 3.34024 2.60716L1.43115 0.662719C1.21814 0.445761 0.872773 0.445761 0.65976 0.662719Z" fill=""></path>
                                                    </svg>
                                                </a>
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

