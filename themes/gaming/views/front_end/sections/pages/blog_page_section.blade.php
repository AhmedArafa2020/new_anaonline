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
                    <div class="col-md-5 col-12">
                        <div class="common-banner-content">
                            <ul class="blog-cat">
                                <li class="active">{{ __('Featured')}}</li>
                            </ul>
                            <h2 class="section-title">
                            {{ $page_json->blog_page->section->title->text ??  __('Blog & Articles') }}
                            </h2>
                            <p>{{  $page_json->blog_page->section->description->text ??  __('The blog and article section serves as a treasure trove of valuable information.') }}</p>
                            <a href="{{route('landing_page',$slug) }}" class="btn">
                                <span class="btn-txt">{{ $page_json->blog_page->section->button->text ?? __('Read More') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
        </div>
    </section>

    <section class="blog-grid-section padding-top padding-bottom tabs-wrapper">
        <div class="container">
            <div class="section-title">
                <div class="subtitle">{{ $page_json->blog_page->section->section_title->text ?? __('All Blogs') }}</div>
                <h2>{!!$page_json->blog_page->section->section_sub_title->text ?? __('From  our blog') !!}</h2>
            </div>
            <div class="blog-head-row d-flex justify-content-between">
                <div class="blog-col-left">
                    <ul class="d-flex tabs">
                    @foreach ($BlogCategory->take(7) as $cat_key =>  $category)
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
            @foreach ($BlogCategory as $cat_k => $category)
                <div id="{{ $cat_k }}" class="tab-content {{$cat_k == 0 ? 'active' : ''}}">
                    <div class="blog-grid-row row f_blog">
                        @foreach ($blogs as $blog)
                            @if($cat_k == '0' ||  $blog->category_id == $cat_k)

                                <div class="col-lg-3 col-md-4 col-sm-6 col-12 blog-itm-card">
                                    <div class="blog-card-inner">
                                        <div class="blog-card-image">
                                            <a href="{{route('page.article',[$slug,$blog->id])}}" tabindex="0">
                                                <img src="{{ get_file($blog->cover_image_path, $currentTheme) }}" class="default-img">
                                            </a>
                                            <div class="blog-labl">
                                                {{$blog->category->name}}
                                            </div>
                                            <div class="date-labl">
                                                {{$blog->created_at->format('d M,Y ')}}
                                            </div>
                                        </div>
                                        <div class="blog-product-content">
                                            <h3 class="product-title">
                                                <a href="{{route('page.article',[$slug,$blog->id])}}" tabindex="0" class="short-description">
                                                    {{$blog->title}}
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="descriptions">{{$blog->short_description}}</p>
                                        <div class="read-more-btn">
                                            <a href="{{route('page.article',[$slug,$blog->id])}}" class="btn-primary add-cart-btn" tabindex="0">
                                                {{ $page_json->blog_page->section->section_sub_button->text ??__('Read More') }}
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
    </section>


    @include('front_end.sections.partision.footer_section')
@endsection

