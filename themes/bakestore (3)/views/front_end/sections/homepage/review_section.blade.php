<section class="testimonials-sec"
    tyle="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">
        <div class="section-title-main d-flex justify-content-between align-items-center">
            <div class="left-side">
                <div class="section-title">
                    <h2 id="{{ $section->review->section->title->slug ?? '' }}_preview">{!!
                        $section->review->section->title->text ?? '' !!}</h2>
                </div>
                <p id="{{ $section->review->section->description->slug ?? '' }}_preview"> {!!
                    $section->review->section->description->text ?? '' !!}
                </p>
            </div>
            <div class="right-side">
                <a href="javascript:void(0)" class="btn-secondary" id="{{ $section->review->section->button->slug ?? '' }}_preview"> {!!
                    $section->review->section->button->text ?? '' !!}
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.18164 3.99989C0.181641 3.82416 0.324095 3.68171 0.499822 3.68171L6.73168 3.68171L4.72946 1.67942C4.60521 1.55516 4.60521 1.3537 4.72947 1.22944C4.85373 1.10519 5.05519 1.10519 5.17945 1.22945L7.72482 3.7749C7.84907 3.89916 7.84907 4.10062 7.72482 4.22487L5.17945 6.77033C5.05519 6.89459 4.85373 6.89459 4.72947 6.77034C4.60521 6.64608 4.60521 6.44462 4.72946 6.32036L6.73168 4.31807L0.499822 4.31807C0.324095 4.31807 0.181641 4.17562 0.18164 3.99989Z"
                            fill="white" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="testimonials-main">
            <div class="testi-slider flex-slider">
                @foreach ($reviews as $review)

                    <div class="testi-card">
                        <div class="testi-card-inner">
                            <div class="img-wrapper">
                                    <img src="{{  get_file($review->ProductData->cover_image_path ?? '', $currentTheme) }}"
                                        alt="review">
                            </div>
                            <div class="content">
                                <div class="title">
                                    <h3>{{ $review->title }}</h3>
                                    <div class="ratings d-flex align-items-center justify-content-end">
                                        @for ($i = 0; $i < 5; $i++)
                                            <i
                                                class="fa fa-star {{ $i < $review->rating_no ? 'text-warning' : '' }} "></i>
                                        @endfor
                                    </div>
                                </div>
                                <p class="description">
                                    {{ $review->description }}
                                </p>
                                <h6>
                                    {{ !empty($review->UserData) ? $review->UserData->first_name : '' }}
                                    <span>{{ __('client') }}</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
