@extends('front_end.layouts.app')
@section('page-title')
    {{ __('Article Page') }}
@endsection
@section('content')
    @include('front_end.sections.partision.header_section')
    @foreach ($blogs as $blog)
        <section class="blog-page-banner article-banner common-banner-section" 
        style="background-image:url({{ get_file( $page_json->article_page->section->image->image ?? 'themes/' .$currentTheme.'/assets/images/blog-banner.jpg') }});">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-xl-7 col-md-8 col-12">
                        <div class="common-banner-content">
                            <a href="{{ route('page.blog',$slug)}}" class="back-btn">
                                <span class="svg-ic">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="5" viewBox="0 0 11 5" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5791 2.28954C10.5791 2.53299 10.3818 2.73035 10.1383 2.73035L1.52698 2.73048L2.5628 3.73673C2.73742 3.90636 2.74146 4.18544 2.57183 4.36005C2.40219 4.53467 2.12312 4.53871 1.9485 4.36908L0.133482 2.60587C0.0480403 2.52287 -0.000171489 2.40882 -0.000171488 2.2897C-0.000171486 2.17058 0.0480403 2.05653 0.133482 1.97353L1.9485 0.210321C2.12312 0.0406877 2.40219 0.044729 2.57183 0.219347C2.74146 0.393966 2.73742 0.673036 2.5628 0.842669L1.52702 1.84888L10.1383 1.84875C10.3817 1.84874 10.5791 2.04609 10.5791 2.28954Z" fill="white"></path>
                                    </svg>
                                </span>
                                {{ $page_json->article_page->section->button->text ?? __('Back To Blog') }}
                            </a>
                            <div class="section-title text-center">
                                <h2>{{$blog->title}} </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="article-section padding-bottom padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @php
                                $store = App\Models\Store::find($blog->store_id);
                                $user = App\Models\User::find($store->created_by);
                            @endphp
                        <div class="about-user d-flex align-items-center">
                            <div class="abt-user-img">
                                <img src="{{ asset('themes/'.$currentTheme.'/assets/images/john.png') }}">
                            </div>
                            <h6>
                                <span>{{ $user->name }}</span>
                                {{-- {{ __('company.com')}} --}}
                            </h6>
                            <div class="post-lbl"><b>{{__('Category:')}}</b> {{$blog->category->name}}</div>
                            <div class="post-lbl"><b>{{__('Date:')}}</b>{{$blog->created_at->format('d M, Y ')}}</div>
                        </div>
                    </div>
                    <div class="col-md-8 col-12">
                        <div class="aticleleftbar">
                            <h5></h5>
                            <p> {!! html_entity_decode($blog->content) !!} </p>

                            {{-- <img src="{{ get_file($blog->cover_image_path, $currentTheme) }}" alt="article"> --}}
                            <div class="art-auther"><b>{{ $user->name }}</b>,
                                {{-- <a href="company.com">{{__('company.com')}}</a> --}}
                            </div>

                            <div class="art-auther"><b>{{__('Tags:')}}</b> {{$blog->category->name}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="articlerightbar">
                            <div class="section-title">
                                <h3>{{ $page_json->article_page->section->related_title->text ?? __('Related articles') }}</h3>
                            </div>
                            <div>
                                @foreach ($datas->take(1) as $data)
                                <div class="blog-widget">
                                    <div class="blog-widget-inner big-blog-widget">
                                                                             
                                                <img src="{{ get_file($data->cover_image_path, $currentTheme) }}">
                                           
                                        <div class="blog-widget-content">
                                            <h3><a href="{{route('page.article',['storeSlug'=> $slug, $data->id])}} " class ="name">{{$data->title}}</a></h3>
                                                <p>{{$data->short_description}}</p>
                                            <div class="blog-lbl-row d-flex align-items-center justify-content-between">
                                                <a class="btn blog-btn" href="{{route('page.article',['storeSlug'=> $slug, $data->id])}}">
                                                {{ $page_json->article_page->section->related_button->text ?? __('Read More') }}
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="3" height="6" viewBox="0 0 3 6" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.15976 0.662719C-0.0532536 0.879677 -0.0532536 1.23143 0.15976 1.44839L1.68316 3L0.15976 4.55161C-0.0532533 4.76856 -0.0532532 5.12032 0.15976 5.33728C0.372773 5.55424 0.718136 5.55424 0.931149 5.33728L2.84024 3.39284C3.05325 3.17588 3.05325 2.82412 2.84024 2.60716L0.931149 0.662719C0.718136 0.445761 0.372773 0.445761 0.15976 0.662719Z" fill="white"/>
                                                        </svg>
                                                </a>
                                                <div class="author-info">
                                                    <strong class="auth-name">{{ $blog->store->user->name ?? 'John Doe' }},</strong>
                                                    <span class="date">{{$data->created_at->format('d M, Y ')}}</span>
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

  <section class="our-blog-section">
        <div class="container">
            <div class="section-title padding-top d-flex align-items-center justify-content-between">
                <div class="section-title">
                                     <h2>{{__('Last')}} <b>{{__('articles')}}</b></h2>
                </div>
            </div>
            <div class="our-blogs-slider common-arrow ">
                @foreach ($l_articles as $article)

                <div class="our-blog-itm">
                    <div class="our-blog-itm-inner">
                            <div class="our-blog-img">
                                <a href="{{route('page.article',[$slug,$article->id])}}" class="blog-img">
                                    <img src="{{get_file($article->cover_image_path , $currentTheme)}} ">
                                </a>
                                <a href="{{route('page.article',[$slug,$article->id])}}" class="btn article-btn">Article</a>
                            </div>
                            <div class="our-blog-content">
                                <div class="our-blog-content-top">
                                    <div class="date-blg">
                                        {{$article->created_at->format('d M, Y ')}}
                                    </div>
                                    <h3><a href="{{route('page.article',[$slug,$article->id])}}" class ="name">{{$article->title}}</a></h3>
                                    <p>{{$article->short_description}}</p>
                                </div>
                                <div class="our-blog-content-bottom">
                                    <div class="our-blog-contnt-btm-row d-flex align-items-center justify-content-between">
                                        <h4>{{__('John Due')}}</h4>
                                        <a href="{{route('page.article',[$slug,$article->id])}}" class="btn-secondary">
                                            <span class="btn-txt">{{ $page_json->blog_page->section->section_sub_button->text ??__('Read More') }}</span>
                                            <span class="btn-ic">
                                                <svg viewBox="0 0 10 5">
                                                    <path d="M2.37755e-08 2.57132C-3.38931e-06 2.7911 0.178166 2.96928 0.397953 2.96928L8.17233 2.9694L7.23718 3.87785C7.07954 4.031 7.07589 4.28295 7.22903 4.44059C7.38218 4.59824 7.63413 4.60189 7.79177 4.44874L9.43039 2.85691C9.50753 2.78197 9.55105 2.679 9.55105 2.57146C9.55105 2.46392 9.50753 2.36095 9.43039 2.28602L7.79177 0.69418C7.63413 0.541034 7.38218 0.544682 7.22903 0.702329C7.07589 0.859976 7.07954 1.11192 7.23718 1.26507L8.1723 2.17349L0.397965 2.17336C0.178179 2.17336 3.46059e-06 2.35153 2.37755e-08 2.57132Z"></path>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @endforeach
    @include('front_end.sections.partision.footer_section')
@endsection

