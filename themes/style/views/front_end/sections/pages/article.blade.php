@extends('front_end.layouts.app')
@section('page-title')
    {{ __('Article Page') }}
@endsection
@section('content')
    @include('front_end.sections.partision.header_section')
        @foreach ($blogs as $blog)
        <section class="blog-page-banner article-banner common-banner-section" 
        style="background-image:url({{ get_file( $page_json->article_page->section->image->image ?? 'themes/' . $currentTheme.'/assets/images/blog-banner.jpg')}});">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-12"> 
                <div class="common-banner-content">
                    <a href="{{ route('page.blog',$slug)}}" class="back-btn">
                        <span class="svg-ic">
                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="5" viewBox="0 0 11 5" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5791 2.28954C10.5791 2.53299 10.3818 2.73035 10.1383 2.73035L1.52698 2.73048L2.5628 3.73673C2.73742 3.90636 2.74146 4.18544 2.57183 4.36005C2.40219 4.53467 2.12312 4.53871 1.9485 4.36908L0.133482 2.60587C0.0480403 2.52287 -0.000171489 2.40882 -0.000171488 2.2897C-0.000171486 2.17058 0.0480403 2.05653 0.133482 1.97353L1.9485 0.210321C2.12312 0.0406877 2.40219 0.044729 2.57183 0.219347C2.74146 0.393966 2.73742 0.673036 2.5628 0.842669L1.52702 1.84888L10.1383 1.84875C10.3817 1.84874 10.5791 2.04609 10.5791 2.28954Z" fill="white"></path>
                            </svg>
                        </span>
                        {{ $page_json->article_page->section->button->text ?? __('Back To Home') }}
                    </a>
                    <ul class="blog-cat justify-content-center">
                        <li class="active"><a href="#"> {{ __('Featured')}} </a></li>
                        <li><a href="#"><b> {{ __('Category:')}} </b> {{$blog->category->name}}</a></li>
                        <li><a href="#"><b> {{ __('Date:')}} </b> {{$blog->created_at->format('d M, Y ')}}</a></li>
                    </ul> 
                    <div class="section-title text-center">
                        <h2>{{$blog->title}} </h2>
                    </div>
                    <div class="about-user d-flex align-items-center justify-content-center">
                        <div class="abt-user-img">
                            <img src="{{asset('themes/'.$currentTheme.'/assets/images/john.png')}}">
                        </div>
                        <h6>
                            <span>{{ $blog->store->user->name ?? 'John Doe' }},</span>
                             company.com
                        </h6> 
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
                <div class="about-user d-flex align-items-center">
                    <div class="abt-user-img">
                        <img src="{{asset('themes/'.$currentTheme.'/assets/images/john.png')}}">
                    </div>
                    <h6>
                        <span>{{ $blog->store->user->name ?? 'John Doe' }},</span>
                         company.com
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
                   
                    <ul class="article-socials d-flex align-items-center">
                        <li><span> {{ __('Share:')}} </span></li>
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
                        <h3> {{ $page_json->article_page->section->related_title->text ?? __('Related articles') }}</h3>
                    </div>
                    <div class="row blog-grid">
                        @foreach ($datas as $data)
                       
                        <div class="col-md-12 col-sm-6 col-12 blog-widget">
                            <div class="blog-widget-inner">
                                <div class="blog-media">
                                    <a href="#">
                                        <img src="{{ get_file($data->cover_image_path, $currentTheme) }}">
                                    </a>
                                    <a class="blog-btn" href="{{route('page.article',[$slug,$data->id])}}" target="_blank">
                                        <svg viewBox="0 0 10 5">
                                            <path d="M2.37755e-08 2.57132C-3.38931e-06 2.7911 0.178166 2.96928 0.397953 2.96928L8.17233 2.9694L7.23718 3.87785C7.07954 4.031 7.07589 4.28295 7.22903 4.44059C7.38218 4.59824 7.63413 4.60189 7.79177 4.44874L9.43039 2.85691C9.50753 2.78197 9.55105 2.679 9.55105 2.57146C9.55105 2.46392 9.50753 2.36095 9.43039 2.28602L7.79177 0.69418C7.63413 0.541034 7.38218 0.544682 7.22903 0.702329C7.07589 0.859976 7.07954 1.11192 7.23718 1.26507L8.1723 2.17349L0.397965 2.17336C0.178179 2.17336 3.46059e-06 2.35153 2.37755e-08 2.57132Z">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="blog-caption">
                                    <h4><a href="{{route('page.article',[$slug,$data->id])}}">{{$data->title}}</a></h4>
                                    <p>{{$data->short_description}}</p>  
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
        <section class="latest-article-slider-section">
            <div class="container">
                <div class="section-title">
                    <h2> {{ $page_json->article_page->section->latest_title->text ?? __('Latest Blogs') }}</h2>
                </div>
                <div class="latest-article-slider blog-grid common-arrows"> 
                    @foreach ($l_articles as $article)
                        <div class="blog-widget">
                            <div class="blog-widget-inner">
                                <div class="blog-media">
                                    <a href="#">
                                        <img src="{{ get_file($article->cover_image_path, $currentTheme) }}">
                                    </a>
                                </div>
                                <div class="blog-caption">
                                    <h4><a href="{{route('page.article',[$slug,$article->id])}}">{{$article->title}}</a></h4>
                                    <p>{{$article->short_description}}</p>
                                    <div class="blog-lbl-row d-flex">
                                        <div class="blog-labl">
                                            <b> {{ __('Category:')}} </b> {{$article->category->name}}
                                        </div>
                                        <div class="blog-labl">
                                            <b> {{ __('Date:')}} </b> {{$article->created_at->format('d M, Y ')}}
                                        </div>
                                    </div>
                                    <a class="blog-btn" href="{{route('page.article',[$slug,$article->id])}}" target="_blank">
                                        <svg viewBox="0 0 10 5">
                                            <path d="M2.37755e-08 2.57132C-3.38931e-06 2.7911 0.178166 2.96928 0.397953 2.96928L8.17233 2.9694L7.23718 3.87785C7.07954 4.031 7.07589 4.28295 7.22903 4.44059C7.38218 4.59824 7.63413 4.60189 7.79177 4.44874L9.43039 2.85691C9.50753 2.78197 9.55105 2.679 9.55105 2.57146C9.55105 2.46392 9.50753 2.36095 9.43039 2.28602L7.79177 0.69418C7.63413 0.541034 7.38218 0.544682 7.22903 0.702329C7.07589 0.859976 7.07954 1.11192 7.23718 1.26507L8.1723 2.17349L0.397965 2.17336C0.178179 2.17336 3.46059e-06 2.35153 2.37755e-08 2.57132Z">
                                            </path>
                                        </svg>
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

