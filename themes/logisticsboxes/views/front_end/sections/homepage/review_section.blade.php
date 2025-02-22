<section class="padding-top padding-bottom"style="position: relative;@if (isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="testimonial-section">
        <div class="review-slider">
            @foreach ($reviews as $review)

                <div class="testimonials-card">
                    <div class="reviews-stars-wrap d-flex align-items-center justify-content-center">
                        <div class="reviews-stars-outer">
                            @for ($i = 0; $i < 5; $i++)
                                <i
                                    class="fa fa-star review-stars {{ $i < $review->rating_no ? 'texts-warning' : '' }} "></i>
                            @endfor
                        </div>
                        <div class="point-wrap">
                            <span class="review-point">{{ $review->rating_no }}.0/ <span>5.0</span></span>
                        </div>
                    </div>
                    <div class="reviews-words">
                        <h2>{{ $review->title }}</h2>
                        <p class="descriptions"> {{ $review->description }}</p>
                        <div class="review-product">
                            <div class="product-image">
                                <a href="{{ url($slug.'/product/'.$review->ProductData->slug) }}">
                                    <img
                                        src="{{ get_file($review->ProductData->cover_image_path ?? '', $currentTheme) }}">
                                </a>
                            </div>
                            <div class="product-content-right">
                                <h5><a href="{{ url($slug.'/product/'.$review->ProductData->slug) }}" tabindex="0"><b>
                                            {{ $review->ProductData->name }}</b></a></h5>
                                <p><b>{{ !empty($review->UserData) ? ($review->UserData->first_name ? ($review->UserData->first_name. ',') : '') : '' }}</b>
                                    {{ __('Client') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
