<section class="testimonials-section padding-bottom" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
        <div class="container">
            <div class="section-title text-center">
                <h2 id="{{ $section->review->section->title->slug ?? '' }}_preview">{!!
                        $section->review->section->title->text ?? '' !!}</h2>
            </div>
            <div class="testimonial-slider">
                @foreach ($reviews as $review)
                    <div class="testimonial-itm">
                        <div class="testimonial-itm-inner">
                            <div class="testimonial-itm-image">
                                <a href="#" tabindex="0">
                                    <img src="{{ get_file($review->ProductData->cover_image_path, $currentTheme) }}"
                                        class="default-img" alt="review">
                                </a>
                            </div>
                            <div class="testimonial-itm-content">
                                <span>{{ !empty($review->UserData->first_name) ? $review->UserData->first_name : '' }}</span>
                                <div class="testimonial-content-top">
                                    <h3 class="testimonial-title">
                                        {{ $review->title }}
                                    </h3>
                                </div>
                                <p>{{ strip_tags($review->description) }}</p>
                                <div class="testimonial-star">
                                    <div class="d-flex align-items-center">
                                        @for ($i = 0; $i < 5; $i++)
                                            <i
                                                class="ti ti-star {{ $i < $review->rating_no ? 'text-warning' : '' }} "></i>
                                        @endfor
                                        <span><b>{{ $review->rating_no }}.0/</b> 5.0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>