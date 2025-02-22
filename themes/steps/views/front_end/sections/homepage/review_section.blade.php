<section class="testimonial-section padding-bottom padding-top" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"  data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
       
        <div class="container">
                <div class="section-title text-center">
                    <div class="subtitle" id="{{ $section->review->section->sub_title->slug ?? '' }}_preview">{!!
                            $section->review->section->sub_title->text ?? '' !!} </div>
                    <h2 id="{{ $section->review->section->title->slug ?? '' }}_preview">{!! $section->review->section->title->text ?? '' !!}</h2>
                </div>
            <div class="testimonial-slider common-arrow  dark-bg">
                @foreach ($reviews as $review)
                    <div class="testimonial-itm">

                        <div class="testimonial-itm-inner">
                            <div class="test-head">
                                <img
                                    src="{{ get_file($review->ProductData->cover_image_path ?? '', $currentTheme) }}">
                                <h3><span>{{ $review->title }}</span></h3>
                            </div>
                            <div class="testicontent">
                                <p class="rew-description">{!! $review->description !!}</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="testi-auto d-flex align-items-center">
                                    <div class="testi-img">
                                        <img src=" {{ asset('themes/' . $currentTheme . '/assets/images/john.png') }}">
                                    </div>
                                    <div class="test-auth-detail">
                                        <h4>{{ !empty($review->UserData) ? ($review->UserData->first_name ? ($review->UserData->first_name. ',') : '') : '' }}</h4>
                                        <span>{{ __('Client') }}</span>
                                    </div>
                                </div>
                                <div class="starimg">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="ti ti-star {{ $i < $review->rating_no ? 'text-warning' : '' }} "></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>