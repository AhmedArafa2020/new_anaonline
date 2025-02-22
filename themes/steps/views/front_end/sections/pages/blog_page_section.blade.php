@extends('front_end.layouts.app')
@section('page-title')
    {{ __('Blog Page') }}
@endsection
@section('content')
    @include('front_end.sections.partision.header_section')
    <section class="blog-page-banner common-banner-section" 
    style="background-image: url({{ get_file( $page_json->blog_page->section->image->image ?? 'themes/' .$currentTheme.'/assets/images/blog-page-banner.jpg')}});">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-12">
                        <div class="common-banner-content">
                            <div class="section-title">
                                <h2> {{ $page_json->blog_page->section->title->text ?? __('Blog & Articles') }} </h2>
                            </div>
                            <p> {{ $page_json->blog_page->section->description->text ?? __('The blog and article section serves as a treasure trove of valuable information.') }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="blog-grid-section padding-top">
            <div class="container">
                <div class="section-title">
                    <div class="subtitle">{{ $page_json->blog_page->section->section_title->text ?? __('All Products') }}</div>
                    <h2>{!!$page_json->blog_page->section->section_sub_title->text ?? __('From  our blog') !!}</h2>
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
                        <span class="select-lbl">{{__('Sort by')}}</span>
                        <select class="position">
                            <option value="lastest">{{ __('Lastest')}}</option>
                            <option value="new"> {{ __('new')}}</option>
                        </select>
                    </div>
                </div>
                @foreach ($BlogCategory as $cat_k => $category)
                    <div id="{{ $cat_k }}" class="tab-content tab-cat-id {{ $cat_k == 0 ? 'active' : '' }}">
                        <div class= "blog-grid-row row f_blog">
                            @foreach ($blogs as $key => $blog)
                                    @if($cat_k == '0' || $blog->category_id == $cat_k)
                                    
                                        <div class="blog-widget col-6 col-12" >
                                            <div class="blog-widget-inner big-blog-widget">
                                                <img src="{{ get_file($blog->cover_image_path, $currentTheme) }}" alt="">
                                                <div class="blog-widget-content">
                                                    <ul class="blog-cat">
                                                        <li class="active">{{__('Featured')}}</li>
                                                        <li><b> {{__('Category:')}}</b> {{ $blog->category->name }}</li>
                                                        <li><b>{{__('Date:')}}</b> {{$blog->created_at->format('d M,Y ')}}</li>
                                                    </ul>
                                                    {{-- <div class="{{$key== 0 ? '' :  'd-flex blg-btn align-items-center justify-content-between'}}"> --}}
                                                        <h3><a href="{{ route('page.article', [$slug,$blog->id]) }}">{{ $blog->title }}</a></h3>
                                                        <p> {{ $key ==0 ? $blog->short_description : '' }}</p>
                                                        <a href="{{ route('page.article', [$slug,$blog->id]) }}"
                                                            class="btn-secondary white-btn">
                                                            <span class="btn-txt">{{ $page_json->blog_page->section->section_sub_button->text ??__('Read More') }}</span>
                                                            <span class="btn-ic">
                                                                <svg viewBox="0 0 10 5">
                                                                    <path
                                                                        d="M2.37755e-08 2.57132C-3.38931e-06 2.7911 0.178166 2.96928 0.397953 2.96928L8.17233 2.9694L7.23718 3.87785C7.07954 4.031 7.07589 4.28295 7.22903 4.44059C7.38218 4.59824 7.63413 4.60189 7.79177 4.44874L9.43039 2.85691C9.50753 2.78197 9.55105 2.679 9.55105 2.57146C9.55105 2.46392 9.50753 2.36095 9.43039 2.28602L7.79177 0.69418C7.63413 0.541034 7.38218 0.544682 7.22903 0.702329C7.07589 0.859976 7.07954 1.11192 7.23718 1.26507L8.1723 2.17349L0.397965 2.17336C0.178179 2.17336 3.46059e-06 2.35153 2.37755e-08 2.57132Z">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                    {{-- <div> --}}
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        getProducts('lastest', '0');
        $(".position").change(function() {
            var value = $(this).val();
            var cat_id = $('.tabs .active').attr('data-tab');
            getProducts(value, cat_id);
        });
        $(".on-tab-click").click(function() {
            var value = $(".position").val();
            var cat_id = $(this).attr('data-tab');
            getProducts(value, cat_id);
        });
    });

    function getProducts(value, cat_id) {
        $.ajax({
            url: "{{ route('blogs.filter.view',$slug) }}",
            type: 'POST',
            data: {
                'value': value,
                'cat_id': cat_id
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                $('.f_blog').html(data.html);
            }
        });
    }
</script>

