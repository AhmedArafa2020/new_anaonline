<section class="testimonials-section padding-top" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"  data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
<div class="custome_tool_bar"></div>
                <img src="{{ get_file($section->review->section->image->image ?? '', $currentTheme)}}"
                        id="{{ $section->review->section->image->slug ?? '' }}_preview" alt="banner image" class="background-img">
                <div class="container">
                    <div class="section-title text-center">
                    <h2 id="{{ $section->review->section->title->slug ?? '' }}_preview">
                        {!! $section->review->section->title->text ?? '' !!}</h2>
                    </div>
                    <div class="testi-slider flex-slider">
                        @foreach ($reviews as $review)
                            <div class="testi-card card">
                                <div class="testi-card-inner card-inner">
                                    <div class="top-content">
                                        {{-- <h4>{{!empty($review->UserData()) ? $review->UserData->first_name : '' }}</h4> --}}
                                        <span>{{$review->title}}</span>
                                    </div>
                                    <div class="product-img">
                                        <a href="{{url($slug.'/product/'.$review->ProductData->slug)}}">
                                            <img src="{{ !empty($review->ProductData) ? get_file($review->ProductData->cover_image_path, $currentTheme) : ''  }}" alt="testimonial-product">
                                        </a>
                                    </div>
                                    <div class="bottom-content">
                                        <div class="rating d-flex justify-content-center align-items-center">
                                            <div class="rating-start-outer">
                                                <div class="reviews-stars_inner" >
                                                    @for ($i = 0; $i < 5; $i++)
                                                        <i class="ti ti-star {{ $i < $review->rating_no ? 'text-warning' : '' }}"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                            <span class="review-epoint">{{$review->rating_no}}.0<span>/ 5.0</span></span>
                                        </div>
                                        <p>{{ strip_tags($review->description)}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
        </section>