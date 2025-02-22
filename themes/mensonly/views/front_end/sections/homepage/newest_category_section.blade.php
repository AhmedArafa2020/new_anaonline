<section class="review-section padding-bottom" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"  data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
            <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-12">
                            <div class="left-review-wrapper">   
                            <div class="section-title">
                                    <h2 id="{{ ($section->newest_category->section->title->slug ?? '') }}_preview">{!!
                                $section->newest_category->section->title->text ?? "" !!}</h2>
                                </div>
                                <p id="{{ ($section->newest_category->section->description->slug ?? '') }}_preview">{!!
                                $section->newest_category->section->description->text ?? "" !!}</p>
                                <div class="reiview-slider flex-slider">
                                    @foreach ($reviews as $review)
                                        {{-- @dd($reviews) --}}
                                        <div class="review-itm">
                                            <div class="review-inner">
                                                <div class="review-img">
                                                    <img src="{{ asset('themes/' . $currentTheme . '/assets/img/review2.png') }}"
                                                        alt="">
                                                </div>
                                                <div class="review-content">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="cauma" width="13"
                                                        height="10" viewBox="0 0 13 10" fill="none">
                                                        <path
                                                            d="M6.01356 1.12356L3.97535 4.8505L2.691 5.20675C2.83991 4.93271 3.00743 4.71348 3.19357 4.54906C3.37971 4.36636 3.59377 4.27502 3.83575 4.27502C4.37555 4.27502 4.85951 4.49425 5.28763 4.93271C5.73436 5.35291 5.95772 5.90099 5.95772 6.57695C5.95772 7.28945 5.70644 7.90148 5.20386 8.41302C4.7199 8.92456 4.11496 9.18033 3.38902 9.18033C2.70031 9.18033 2.09536 8.93369 1.57417 8.44042C1.0716 7.92888 0.820312 7.30772 0.820312 6.57695C0.820312 6.28464 0.876154 5.94666 0.987837 5.563C1.11813 5.17935 1.35081 4.67694 1.68585 4.05579L3.91951 0L6.01356 1.12356ZM12.2957 1.12356L10.2575 4.8505L9.00108 5.20675C9.13138 4.93271 9.28959 4.71348 9.47573 4.54906C9.68048 4.36636 9.89454 4.27502 10.1179 4.27502C10.6577 4.27502 11.151 4.49425 11.5977 4.93271C12.0444 5.35291 12.2678 5.90099 12.2678 6.57695C12.2678 7.28945 12.0165 7.90148 11.5139 8.41302C11.03 8.92456 10.425 9.18033 9.6991 9.18033C9.01039 9.18033 8.40544 8.93369 7.88425 8.44042C7.38168 7.92888 7.13039 7.30772 7.13039 6.57695C7.13039 6.28464 7.18623 5.94666 7.29792 5.563C7.4096 5.17935 7.63296 4.67694 7.96801 4.05579L10.2296 0L12.2957 1.12356Z"
                                                            fill="#5FFFCA"></path>
                                                    </svg>
                                                    <h6 class="description">{{ $review->description }}</h6>
                                                    <span><b>{{ !empty($review->UserData) ? $review->UserData->first_name : '' }},</b>
                                                        Client</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="right-review-wrapper">
                                <img src="{{ asset('themes/' . $currentTheme . '/assets/img/review-main.png') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
            </div>
        </section>